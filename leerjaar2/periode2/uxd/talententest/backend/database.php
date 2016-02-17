<?php

    date_default_timezone_set('Europe/Amsterdam');

    use Illuminate\Database\Capsule\Manager as Capsule;
    use Illuminate\Events\Dispatcher;
    use Illuminate\Container\Container;


    $capsule = new Capsule;
    $capsule->addConnection(array(
        'driver'    => 'mysql',
        'host'      => 'localhost',
        'database'  => 'projectpas_talent',
        'username'  => 'projectpas_pas',
        // 'password'  => 'T5NKlYo1',
        // 'charset'   => 'utf8',
        // 'collation' => 'utf8_unicode_ci',
        // 'prefix'    => '',
    ));
    $capsule->setEventDispatcher(new Dispatcher(new Container));
    $capsule->setAsGlobal();
    $capsule->bootEloquent();

?>
