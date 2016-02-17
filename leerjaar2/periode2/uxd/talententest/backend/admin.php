<?php
    require(dirname(__FILE__).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');
    require(dirname(__FILE__).DIRECTORY_SEPARATOR.'database.php');
    require(dirname(__FILE__).DIRECTORY_SEPARATOR.'models.php');

    use Illuminate\Database\Query\Expression as raw;

    $app = new \Slim\Slim(array(
        'debug'=> true,
        'templates.path' => dirname(__FILE__).DIRECTORY_SEPARATOR.'templates',
        'view' => new \Slim\Views\Twig()
    ));
    $app->setName('Talententest Admin');

    // Include Wordpress header for authentication
    if($app->request->getResourceUri() == '/login') {
        define('WP_USE_THEMES', false); // Do not show themes
        require($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'wp-blog-header.php');
    }

    $view = $app->view();
    $view->parserOptions = array(
        'debug' => true,
        'cache' => dirname(__FILE__) . '/cache'
    );
    $view->parserExtensions = array(
        new \Slim\Views\TwigExtension(),
        new Twig_Extension_Debug()
    );

    $data                 = array();
    $data['base_url']     = '/admin/';
    $data['current_url']  = rtrim($data['base_url'], '/').$app->request->getResourceUri();
    $data['mainmenu']     = array(
      array(
        'title' => 'Dashboard',
        'url'   => 'dashboard',
        'icon'  => 'fa-dashboard'
      ),
      array(
        'title' => 'Gebruikers',
        'url'   => 'users_overview',
        'icon'  => 'fa-users'
      ),
      array(
        'title' => 'Scholen',
        'url'   => 'schools_overview',
        'icon'  => 'fa-university'
      ),
      array(
        'title' => 'Talenten',
        'url'   => 'talents_overview',
        'icon'  => 'fa-tasks'
      ),
      array(
        'title' => 'Vaardigheden',
        'url'   => 'skills_overview',
        'icon'  => 'fa-sliders'
      ),
      array(
        'title' => 'Beroepen',
        'url'   => 'occupations_overview',
        'icon'  => 'fa-briefcase'
        ),
      array(
        'title' => 'Uitloggen',
        'url'   => 'logout',
        'icon'  => 'fa-lock'
        )
    );

    $app->notFound(function () use ($app, $data) {
        $app->render('404.html', $data);
    });

    $app->get('/dashboard(/:school_id)', function($school_id = null) use ($app, $data) {
        $data['active_school_id'] = $school_id;
        if($school_id == null)
            $users = User::with('talents', 'skills', 'educationLevel')->get();
        else
            $users = User::with('talents', 'skills', 'educationLevel')->where('school_id', '=', (int)$school_id)->get();

        $occupations = Occupation::all();
        $schools = School::orderBy('name', 'ASC')->get();
        $talents = Talent::all();

        $data['schools'] = $schools->toArray();
        $data['total_occupations'] = $occupations->count();
        $data['total_users'] = $users->count();

        $users_male = $users->filter(function($user){
            return $user->gender == 'm';
        });
        $users_female = $users->filter(function($user){
            return $user->gender == 'f';
        });

        $data['users_gender'] = array(
            array(
                'label'  =>  'vrouw',
                'value'  =>  $users_female->count()
            ),
            array(
                'label'  =>  'man',
                'value'  =>  $users_male->count()
            )
        );


        // Get amount of people picking talents
        $picked_talents = array();
        $users->each(function($user) use (&$picked_talents)
        {
            $user->talents->each(function($talent) use (&$user, &$picked_talents) {
                if($talent->pivot->picked == 1) {
                    $gender = ($user->gender == 'm' ? 'male' : 'female');

                    if(!isset($picked_talents[$talent->id])) {
                        $picked_talents[$talent->id] = array(
                            'label' => $talent->name,
                            'male'  => 0,
                            'female'=> 0
                        );
                    }
                    $picked_talents[$talent->id][$gender] ++;
                }
            });
        });

        // Get it ready for the graphs
        $data['most_picked_talents'] = array();
        foreach($picked_talents as $picked_talent) {
            array_push($data['most_picked_talents'], $picked_talent);
        }

        // Get amount of people picking what skills
        $picked_skills = array();
        $users->each(function($user) use (&$picked_skills)
        {
            $gender = ($user->gender == 'm' ? 'male' : 'female');
            foreach($user->skills as $skill) {
                if(!isset($picked_skills[$skill->id])) {
                    $picked_skills[$skill->id] = array(
                        'label' => $skill->name,
                        'male'  => 0,
                        'female'=> 0
                    );
                }
                $picked_skills[$skill->id][$gender] ++;
            }
        });

        // Get it ready for the graphs
        $data['most_picked_skills'] = array();
        foreach($picked_skills as $picked_skill) {
            array_push($data['most_picked_skills'], $picked_skill);
        }

        // Get amount of people picking what schooladvice
        $picked_advice = array();
        $users->each(function($user) use (&$picked_advice)
        {
            $gender = ($user->gender == 'm' ? 'male' : 'female');
            if(!isset($picked_advice[$user->education_level->id])) {
                $picked_advice[$user->education_level->id] = array(
                    'label' => $user->education_level->name,
                    'male'  => 0,
                    'female'=> 0
                );
            }
            $picked_advice[$user->education_level->id][$gender] ++;
        });

        // Get it ready for the graphs
        $data['most_schooladvices'] = array();
        foreach($picked_advice as $picked_adv) {
            array_push($data['most_schooladvices'], $picked_adv);
        }

        // Get all users registered by day
        if($school_id == null) {
            $users_by_day = User::groupBy('day')
            ->get(
                array(
                    new raw('DATE(created_at) as day'),
                    new raw('count(id) as amount')
                )
            );
        }
        else {
            $users_by_day = User::groupBy('day')
            ->where('school_id', '=', $school_id)
            ->get(
                array(
                    new raw('DATE(created_at) as day'),
                    new raw('count(id) as amount')
                )
            );
        }

        $data['users']['created_by_day'] = $users_by_day->toArray();

        $app->render('dashboard.html', $data);
    })->name('dashboard');

    $app->group('/users', function () use ($app, $data) {

        $app->get('/', function() use ($app, $data) {
            $data['users'] = User::with('talents', 'educationLevel', 'skills', 'school')
                                    ->orderBy('created_at', 'DESC')
                                    ->get()
                                    ->toArray();
            $app->render('users/overview.html', $data);
        })->name('users_overview');

    });

    $app->group('/talents', function () use ($app, $data) {

        $app->get('/', function() use ($app, $data) {
            $data['talents'] = Talent::all()->toArray();
            $app->render('talents/overview.html', $data);
        })->name('talents_overview');

        $app->map('/edit/:id', function($id) use ($app, $data) {
            $data['request_method'] = $app->request->getMethod();
            $talent = Talent::with('questions')->find($id);

            if($app->request->isGet()) {
                $data['talent'] = $talent->toArray();
            } else if ($app->request->isPost()) {

                foreach($app->request->post('question') as $key => $value) {
                    $question = $talent->questions->find((int)$key);
                    if($question->question != $value) {
                        $question->question = $value;
                        $question->save();
                    }
                }
                $data['new_talent'] = $talent->toArray();
            }

            $app->render('talents/edit.html', $data);
        })->via('POST', 'GET')->name('talents_edit');

    });

    $app->group('/occupations', function () use ($app, $data) {
        $data['request_method'] = $app->request->getMethod();

        $app->get('/', function() use ($app, $data) {
            $data['occupations'] = Occupation::with('talent', 'educationLevel')->get()->toArray();
            $app->render('occupations/overview.html', $data);
        })->name('occupations_overview');

        $app->map('/delete/:id', function($id) use ($app, $data) {
            $data['occupation'] = Occupation::find($id);

            if ($app->request->isPost()) {
                $data['occupation']->delete();
            }

            $app->render('occupations/delete.html', $data);
        })->via('GET', 'POST')->name('occupations_delete');

        $app->map('/new', function() use ($app, $data) {
            if ($app->request->isGet()) {
                $data['education_levels'] = EducationLevel::NoSchoolAdvice()->get();
                $data['talents'] = Talent::all();
            } else if ($app->request->isPost()) {

                $edu_level = EducationLevel::find($app->request->post('educationlevel'));
                $talent = Talent::find($app->request->post('talent'));

                parse_str( parse_url( $app->request->post('yt-video'), PHP_URL_QUERY ), $urlvars );

                $job = new Occupation();
                $job->name = $app->request->post('title');
                $job->description = $app->request->post('description');
                $job->youtube = $urlvars['v'];
                $job->educationLevel()->associate($edu_level);
                $job->talent()->associate($talent);
                $job->save();

                $data['new_occupation'] = $job;
            }
            $app->render('occupations/new.html', $data);
        })->via('GET', 'POST')->name('occupations_new');

        $app->map('/edit/:id', function($id) use ($app, $data) {
            $data['request_method'] = $app->request->getMethod();

            if ($app->request->isGet()) {
                $data['occupation'] = Occupation::with('talent', 'educationLevel')->find($id);
                $data['education_levels'] = EducationLevel::NoSchoolAdvice()->get();
                $data['talents'] = Talent::all();
            } else if ($app->request->isPost()) {

                $edu_level = EducationLevel::find($app->request->post('educationlevel'));
                $talent = Talent::find($app->request->post('talent'));

                parse_str( parse_url( $app->request->post('yt-video'), PHP_URL_QUERY ), $urlvars );

                $job = Occupation::find($id);
                $job->name = $app->request->post('title');
                $job->description = $app->request->post('description');
                $job->youtube = $urlvars['v'];
                $job->educationLevel()->associate($edu_level);
                $job->talent()->associate($talent);
                $job->save();

                $data['new_occupation'] = $job;
            }
            $app->render('occupations/edit.html', $data);
        })->via('GET', 'POST')->name('occupations_edit');

    });

    $app->group('/skills', function () use ($app, $data) {
        $data['request_method'] = $app->request->getMethod();

        $app->get('/', function() use ($app, $data) {
            $data['skills'] = Skill::all();
            $app->render('skills/overview.html', $data);
        })->name('skills_overview');

        $app->map('/delete/:id', function($id) use ($app, $data) {
            $data['skill'] = Skill::find($id);

            if ($app->request->isPost()) {
                $data['skill']->delete();
            }

            $app->render('skills/delete.html', $data);
        })->via('GET', 'POST')->name('skills_delete');

        $app->map('/new', function() use ($app, $data) {
            if ($app->request->isPost()) {
                $edu_level = EducationLevel::find($app->request->post('educationlevel'));

                $skill = new Skill();
                $skill->name = $app->request->post('title');
                $skill->save();

                $data['new_skill'] = $skill;
            }
            $app->render('skills/new.html', $data);
        })->via('GET', 'POST')->name('skills_new');

        $app->map('/edit/:id', function($id) use ($app, $data) {
            $data['request_method'] = $app->request->getMethod();
            $skill = Skill::find($id);

            if ($app->request->isGet()) {
                $data['skill'] = $skill->toArray();
            } else if ($app->request->isPost()) {

                $skill->name = $app->request->post('title');
                $skill->save();

                $data['new_skill'] = $skill->toArray();
            }
            $app->render('skills/edit.html', $data);
        })->via('GET', 'POST')->name('skills_edit');

    });

    $app->group('/schools', function () use ($app, $data) {
        $data['request_method'] = $app->request->getMethod();

        $app->get('/', function() use ($app, $data) {
            $data['schools'] = School::with('User')->orderBy('name', 'ASC')->get()->toArray();
            $app->render('schools/overview.html', $data);
        })->name('schools_overview');

        $app->map('/delete/:id', function($id) use ($app, $data) {
            $data['school'] = School::find($id);

            if ($app->request->isPost()) {
                $data['school']->delete();
            }

            $app->render('schools/delete.html', $data);
        })->via('GET', 'POST')->name('schools_delete');

        $app->map('/new', function() use ($app, $data) {
            if ($app->request->isPost()) {
                $school = new School();
                $school->name = $app->request->post('name');
                $school->save();

                $data['new_school'] = $school;
            }
            $app->render('schools/new.html', $data);
        })->via('GET', 'POST')->name('schools_new');

        $app->map('/edit/:id', function($id) use ($app, $data) {
            $data['request_method'] = $app->request->getMethod();
            $school = School::find($id);

            if ($app->request->isGet()) {
                $data['school'] = $school->toArray();
            } else if ($app->request->isPost()) {

                $school->name = $app->request->post('name');
                $school->save();

                $data['new_school'] = $school->toArray();
            }
            $app->render('schools/edit.html', $data);
        })->via('GET', 'POST')->name('schools_edit');

    });

    $app->map('/login', function() use ($app) {
        $data = array();

        if ($app->request->isPost()) {
            $auth = wp_authenticate_username_password( NULL, $app->request->post('username'), $app->request->post('password') );
            if (is_wp_error($auth))
            {
                $data['error'] = 'Gebruikersnaam of wachtwoord is fout';
            } else {
                $_SESSION['loggedin'] = true;
                $app->redirect($app->urlFor('dashboard'));
            }
        }
        $app->render('login.html', $data);
    })->via('GET', 'POST')->name('login');

    $app->get('/logout', function() use ($app) {
        session_destroy();
        $app->redirect($app->urlFor('login'));
    })->name('logout');

    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
        if($app->request->getResourceUri() != '/login') {
            try {
                $app->redirect($app->urlFor('login'));
            }catch(Exception $e) {

            }
        }
    }
?>
