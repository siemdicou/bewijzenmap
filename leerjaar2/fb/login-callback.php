<?php
#login-callback.php

require_once __DIR__ . '/vendor/autoload.php';

session_start();

$fb = new Facebook\Facebook([
    'app_id' => '1759462614340133',
    'app_secret' => 'e1ae1b3e004a3a54a12bc8bb389ba070',
    'default_graph_version' => 'v2.5',
    'default_access_token' => isset($_SESSION['facebook_access_token']) ? $_SESSION['facebook_access_token'] : '1759462614340133'

]);


$helper = $fb->getRedirectLoginHelper();

try{
    $accessToken = $helper->getAccessToken();
} catch (Facebook\Exceptions\FacebookResponseException $e){
    //echo 'Graph returned an error: ' . $e->getMessage();
} catch (Facebook\Exceptions\FacebookSDKException $e){
    //echo 'Facebook SDK returned an error: ' . $e->getMessage();
}

if (isset($accessToken)){
    //Logged in!
    $_SESSION['facebook_access_token'] = (string) $accessToken;
} elseif ($helper->getError()){
    //The user denied the request
}

header('Location: index.php');
