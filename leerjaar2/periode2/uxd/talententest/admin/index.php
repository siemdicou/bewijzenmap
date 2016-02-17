<?php
    session_cache_limiter(false);
    session_start();

    require(dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'backend'.DIRECTORY_SEPARATOR.'admin.php');

    $app->run();
?>
