<?php
#login-callback.php

require_once __DIR__ . '/vendor/autoload.php';

session_start();

$fb = new Facebook\Facebook([
    'app_id' => '1685947078320113',
    'app_secret' => 'e6dad6b6fc477188872914a1835522ef',
    'default_graph_version' => 'v2.5',
    'default_access_token' => isset($_SESSION['facebook_access_token']) ? $_SESSION['facebook_access_token'] : 'e6dad6b6fc477188872914a1835522ef'

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
