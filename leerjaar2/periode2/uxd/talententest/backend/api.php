<?php
    require(dirname(__FILE__).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');
    require(dirname(__FILE__).DIRECTORY_SEPARATOR.'database.php');
    require(dirname(__FILE__).DIRECTORY_SEPARATOR.'models.php');

    use Illuminate\Database\Eloquent\ModelNotFoundException as ModelNotFoundException;

    $app = new \Slim\Slim(array(
        'debug'=> true
    ));
    $app->setName('Talententest API');

    // modifies header to only a token
    class AuthTokenMiddleware extends \Slim\Middleware
    {
        public function call()
        {
            // Get reference to application
            $app = $this->app;

            // Strip 'Authorization: Token {{key}}' from header
            $auth_token = $app->request->headers->get('Authorization');
            if($auth_token) {
                $key = ltrim($auth_token, 'Token ');
                $app->request->headers->set('Authorization', $key);
            }
            // Run inner middleware and application
            $this->next->call();
        }
    }
    $app->add(new \AuthTokenMiddleware());

    $app->get('/test', function() use ($app) {
        $app->response()->header('Content-Type', 'application/json');


        $user = User::with('talents', 'educationLevel')->where('nickname', '=', 'test')->first();
        echo $user;
    });

    $app->post('/authenticate', function() use ($app) {
        $app->response()->header('Content-Type', 'application/json');

        $req_body = json_decode($app->request->getBody());
        $nickname = $req_body->nickname;
        $password = sha1($req_body->password);

        try {
            $user = User::where('nickname', '=', $nickname)
                        ->where('password', '=', $password)
                        ->firstOrFail();


            if ($user->token == NULL) {
                // Create a new token object
                $token = new Token;
                $token->generateToken();
                $token->user()->associate($user);
                $token->save();
            } else {
                // Generate a new token value
                $user->token->generateToken();
                $user->token->save();
            }

        } catch (ModelNotFoundException $e) {
            $app->halt(401, 'wrong_credentials');
        }
        echo $user->token->toJson();
    });

    $app->post('/user', function() use ($app) {
        $app->response()->header('Content-Type', 'application/json');

        $req_body = json_decode($app->request->getBody());

        // Check if all fields are present
        if ($req_body->gender == NULL|| $req_body->nickname == NULL || $req_body->password1 == NULL ||
            $req_body->password2 == NULL || $req_body->school == NULL) {
            $app->halt(400, '{"message": "er is iets fout gegeaan"}');
        }

        // Check if username exists
        if (User::where('nickname', 'like', $req_body->nickname)->count()) {
            $app->halt(400, 'nickname_exists');
        }

        try {
            $user = new User;
            $user->nickname = $req_body->nickname;
            $user->gender = $req_body->gender;
            $user->password = sha1($req_body->password1);
            $user->educationLevel()->associate(EducationLevel::find((int)$req_body->schoolAdvice));
            $user->school()->associate(School::find((int)$req_body->school));
            $user->save();

            // Create token
            $token = new Token;
            $token->generateToken();
            $token->user()->associate($user);
            $token->save();

        } catch (Exception $e) {
            $app->halt(500, 'something_went_wrong');
        }

        echo $token->toJson();
    });


    $app->get('/user', function () use ($app) {
        $app->response()->header('Content-Type', 'application/json');
        $token_key = $app->request->headers->get('Authorization');

        try {
            $user = User::with('talents', 'token')->whereHas('token', function($q) use ($token_key) {
                $q->where('key', '=', $token_key);
            })->firstOrFail();
        } catch (ModelNotFoundException $e) {
            $app->halt(401, 'Gebruiker niet gevonden');
        }

        echo $user->toJson();
    });

    $app->post('/user/talent/:name', function ($name) use ($app) {
        $app->response()->header('Content-Type', 'application/json');
        $token_key = $app->request->headers->get('Authorization');

        if (!$token_key) {
            $app->halt(401, 'no token');
        }

        try {
            $user = User::with('talents')->whereHas('token', function($q) use ($token_key) {
                $q->where('key', '=', $token_key);
            })->firstOrFail();

            $req_body = json_decode($app->request->getBody());

            if (!$req_body)
                $app->halt(400, 'invalid data');

            if ($user->talents->contains($req_body->id))
                $app->halt(400, 'Je hebt deze vragen al beantwoord!');

            $user->talents()->attach(
                $req_body->id,
                array('score' => $req_body->score)
            );

        } catch (ModelNotFoundException $e) {
            $app->halt(401, 'Gebruiker niet gevonden');
        }
        echo true;
    });

    $app->post('/user/talent', function () use ($app) {
        $app->response()->header('Content-Type', 'application/json');
        $token_key = $app->request->headers->get('Authorization');

        if (!$token_key) {
            $app->halt(401, 'no token');
        }

        try {
            $user = User::with('talents')->whereHas('token', function($q) use ($token_key) {
                $q->where('key', '=', $token_key);
            })->firstOrFail();

            $req_body = json_decode($app->request->getBody());

            foreach($user->talents as $talent) {
                foreach($req_body as $req_talent) {
                    if($talent->id === $req_talent->id) {
                        $talent->pivot->picked = true;
                        $talent->pivot->save();
                    }
                }
            }

        } catch (ModelNotFoundException $e) {
            $app->halt(401, 'Gebruiker niet gevonden');
        }
        echo true;
    });

    $app->get('/user/talent', function () use ($app) {
        $app->response()->header('Content-Type', 'application/json');
        $token_key = $app->request->headers->get('Authorization');

        if (!$token_key) $app->halt(401, 'no token');

        try
        {
            $user = User::with('talents')->whereHas('token', function($q) use ($token_key) {
                $q->where('key', '=', $token_key);
            })->firstOrFail();
        }
        catch (ModelNotFoundException $e) {
            $app->halt(401, 'Gebruiker niet gevonden');
        }
        echo $user->talents->toJson();
    });

    $app->get('/user/progress', function () use ($app) {
        $app->response()->header('Content-Type', 'application/json');
        $token_key = $app->request->headers->get('Authorization');

        if (!$token_key) $app->halt(401, 'no token');

        try
        {
            $user = User::with('talents', 'skills', 'occupations', 'mindmap')->whereHas('token', function($q) use ($token_key) {
                $q->where('key', '=', $token_key);
            })->firstOrFail();
        }
        catch (ModelNotFoundException $e) {
            $app->halt(401, 'Gebruiker niet gevonden');
        }
        if(!$user->token->isValid()) {
            $app->halt(401, 'Token expired');
        }
        $progress = array(
            'skills' => $user->skills->count(),
            'talents' => $user->talents->count(),
            'talentsPicked' => 0,
            'occupations' => $user->occupations->count(),
            'mindmap' => ($user->mindmap ? 1 : 0)
        );
        foreach($user->talents as $talent) {
            if($talent->pivot->picked > 0) {
                $progress['talentsPicked'] ++;
            }
        }
        echo json_encode($progress);
    });

    $app->post('/user/skills', function() use ($app) {
        $app->response()->header('Content-Type', 'application/json');
        $token_key = $app->request->headers->get('Authorization');

        if (!$token_key) $app->halt(401, 'no token');

        try
        {
            $user = User::with('skills')->whereHas('token', function($q) use ($token_key) {
                $q->where('key', '=', $token_key);
            })->firstOrFail();
        }
        catch (ModelNotFoundException $e) {
            $app->halt(401, 'Gebruiker niet gevonden');
        }

        $req_body = json_decode($app->request->getBody());

        foreach($req_body as $skill) {
            if($user->skills->contains($skill->id)) continue;
            $user->skills()->attach($skill->id);
        }
        echo true;
    });

    $app->get('/user/skills', function() use ($app) {
        $app->response()->header('Content-Type', 'application/json');
        $token_key = $app->request->headers->get('Authorization');

        if (!$token_key) $app->halt(401, 'no token');

        try
        {
            $user = User::with('skills')->whereHas('token', function($q) use ($token_key) {
                $q->where('key', '=', $token_key);
            })->firstOrFail();
        }
        catch (ModelNotFoundException $e) {
            $app->halt(401, 'Gebruiker niet gevonden');
        }
        echo $user->skills->toJson();
    });

    $app->get('/user/occupation', function() use ($app) {
        $app->response()->header('Content-Type', 'application/json');
        $token_key = $app->request->headers->get('Authorization');

        if (!$token_key) $app->halt(401, 'no token');

        try
        {
            $user = User::with('occupations')->whereHas('token', function($q) use ($token_key) {
                $q->where('key', '=', $token_key);
            })->firstOrFail();
        }
        catch (ModelNotFoundException $e) {
            $app->halt(401, 'Gebruiker niet gevonden');
        }

        $talent_ids = Array();
        foreach($user->talents as $talent)
            if($talent->pivot->picked)
                array_push($talent_ids, $talent->id);
        $jobs = Occupation::with('educationLevel')->whereIn('talent_id', $talent_ids)->get();

        echo $jobs->toJson();
    });

    $app->get('/user/schooladvice', function() use ($app) {
        $app->response()->header('Content-Type', 'application/json');
        $token_key = $app->request->headers->get('Authorization');

        if (!$token_key) $app->halt(401, 'no token');

        try
        {
            $user = User::with('educationLevel')->whereHas('token', function($q) use ($token_key) {
                $q->where('key', '=', $token_key);
            })->firstOrFail();
        }
        catch (ModelNotFoundException $e) {
            $app->halt(401, 'Gebruiker niet gevonden');
        }
        echo $user->educationLevel;
    });

    $app->post('/user/mindmap', function() use ($app) {
        $app->response()->header('Content-Type', 'application/json');
        $token_key = $app->request->headers->get('Authorization');

        if (!$token_key) $app->halt(401, 'no token');

        try
        {
            $user = User::whereHas('token', function($q) use ($token_key) {
                $q->where('key', '=', $token_key);
            })->firstOrFail();
        }
        catch (ModelNotFoundException $e) {
            $app->halt(401, 'Gebruiker niet gevonden');
        }


        if(!$user->mindmap) {
            $mindmap = new Mindmap();
            $mindmap->mindmap = $app->request->getBody();
            $mindmap->user()->associate($user);
            $mindmap->save();
        }
        echo true;
    });

    $app->get('/user/mindmap(/:token)', function($token=null) use ($app) {
        $app->response()->header('Content-Type', 'text/html');
        $token_key = $app->request->headers->get('Authorization');
        $token_set_by_url = false;

        if(!$token_key && $token != null) {
            $token_set_by_url = true;
            $token_key = $token;
        }

        if (!$token_key) $app->halt(401, 'no token');

        try
        {
            $user = User::with('mindmap')->whereHas('token', function($q) use ($token_key) {
                $q->where('key', '=', $token_key);
            })->firstOrFail(array('id'));
        }
        catch (ModelNotFoundException $e) {
            $app->halt(401, 'Gebruiker niet gevonden');
        }
        if($user->mindmap) {
            if ($token_set_by_url == true) {
                $app->response()->header('Content-Type', 'image/png');
                $data = explode(',', $user->mindmap->mindmap);
                $img = imagecreatefromstring(base64_decode($data[1]));
                imagesavealpha($img, true);
                imagepng($img);
                imagedestroy($img);
            } else {
                echo $user->mindmap->mindmap;
            }
        }
    });

    $app->get('/user/certificate', function() use ($app) {
        $app->response()->header('Content-Type', 'application/json');
        $token_key = $app->request->headers->get('Authorization');

        if (!$token_key) $app->halt(401, 'no token');

        try
        {
            $user = User::with('skills', 'talents', 'school')->whereHas('token', function($q) use ($token_key) {
                $q->where('key', '=', $token_key);
            })->firstOrFail(array('id', 'nickname', 'school_id'));
        }
        catch (ModelNotFoundException $e) {
            $app->halt(401, 'Gebruiker niet gevonden');
        }

        $resp = array();
        $resp['nickname'] = $user->nickname;
        $resp['school'] = $user->school->name;
        $resp['talents'] = array();
        $resp['skills'] = $user->skills->take(5)->toArray();
        foreach($user->talents as $talent) {
            if($talent->pivot->picked) {
                array_push($resp['talents'], $talent->toArray());
            }
        }
        echo json_encode($resp);
    });

    $app->get('/talent', function() use ($app) {
        $app->response()->header('Content-Type', 'application/json');
        $talent = Talent::with('questions')->get();
        echo $talent->toJson();
    });

    $app->get('/talent/:name', function($name) use ($app) {
        $app->response()->header('Content-Type', 'application/json');

        try {
            $talent = Talent::with('questions')->where('name', '=', $name)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            $app->halt(404, 'Talent niet gevonden');
        }
        echo $talent->toJson();
    });

    $app->get('/schooladvice', function() use ($app) {
        $app->response()->header('Content-Type', 'application/json');
        echo EducationLevel::SchoolAdvice()->get()->toJson();
    });

    $app->get('/schools', function() use ($app) {
        $app->response()->header('Content-Type', 'application/json');
        echo School::all()->toJson();
    });

    $app->get('/skills', function() use ($app) {
        $app->response()->header('Content-Type', 'application/json');
        echo Skill::all()->toJson();
    });

    $app->get('/occupation', function() use ($app) {
        $app->response()->header('Content-Type', 'application/json');
        echo Skill::all()->toJson();
    });

    $app->group('/user', function () use ($app) {
        $app->options('/:name', function ($name) use ($app) {
            $app->response()->header('Access-Control-Allow-Methods', 'PUT, GET, POST, DELETE, OPTIONS');
        });
        $app->options('/', function () use ($app) {
            $app->response()->header('Access-Control-Allow-Methods', 'PUT, GET, POST, DELETE, OPTIONS');
        });
        $app->options('/progress', function () use ($app) {
            $app->response()->header('Access-Control-Allow-Methods', 'GET, OPTIONS');
        });
        $app->options('/talent/:name', function () use ($app) {
            $app->response()->header('Access-Control-Allow-Methods', 'PUT, GET, POST, DELETE, OPTIONS');
        });
        $app->options('/occupation', function () {
            $app->response()->header('Access-Control-Allow-Methods', 'GET, OPTIONS');
        });
        $app->options('/skills', function () use ($app) {
            $app->response()->header('Access-Control-Allow-Methods', 'PUT, GET, POST, DELETE, OPTIONS');
        });
        $app->options('/mindmap', function () use ($app) {
            $app->response()->header('Access-Control-Allow-Methods', 'POST, OPTIONS');
        });
    });
    $app->options('/authenticate', function () {
        $app->response()->header('Access-Control-Allow-Methods', 'POST, OPTIONS');
    });
    $app->options('/schooladvice', function () {
        $app->response()->header('Access-Control-Allow-Methods', 'GET, OPTIONS');
    });
    $app->options('/skills', function () {
        $app->response()->header('Access-Control-Allow-Methods', 'GET, OPTIONS');
    });
    $app->options('/talent', function () {
        $app->response()->header('Access-Control-Allow-Methods', 'GET, OPTIONS');
    });
    $app->options('/talent/:name', function () {
        $app->response()->header('Access-Control-Allow-Methods', 'GET, OPTIONS, POST');
    });

?>
