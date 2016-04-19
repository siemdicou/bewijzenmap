<style type="text/css">
    html body{
    /*background: url(https://upload.wikimedia.org/wikipedia/commons/8/8a/Huis_te_Echten_park_en_tuin.JPG);*/
background-size:cover; 
color: blue;
font-size: 33px;
}

</style>
<?php

#index.php
$destroy = session_destroy();

require_once __DIR__ . '/vendor/autoload.php';
session_start();


$fb = new Facebook\Facebook([
    'app_id' => '1685947078320113',
    'app_secret' => 'e6dad6b6fc477188872914a1835522ef',
    'default_graph_version' => 'v2.5',
    'default_access_token' => isset($_SESSION['facebook_access_token']) ? $_SESSION['facebook_access_token'] : '1685947078320113'
]);

try {
    $response = $fb->get('/me?fields=id,name,bio,birthday,context,cover,currency,devices,education,email,favorite_athletes,favorite_teams,first_name,gender,hometown,inspirational_people,install_type,installed,interested_in,is_shared_login,is_verified,languages,last_name,link,locale,location,meeting_for,middle_name,name_format,payment_pricepoints,political,public_key,quotes,relationship_status,religion,security_settings,shared_login_upgrade_required_by,significant_other,sports,test_group,third_party_id,timezone,updated_time,verified,video_upload_limits,viewer_can_send_gift,website,work&debug=all');

    $user = $response->getGraphObject();
    // var_dump($user);
    echo "welcome ".$user['name'];


    include 'drag.php';

    echo '<a href="'. $destroy.'">logout</a>';
    exit;
} catch (Facebook\Exceptions\FacebookResponseException $e){
    // echo 'Graph returned an error: ' . $e->getMessage();
} catch (Facebook\Exceptions\FacebookSDKException $e){
    // echo 'Facebook SDK returned an error: ' . $e->getMessage();
}

$helper = $fb->getRedirectLoginHelper();
$permissions = ['email', 'user_likes',];
$loginUrl = $helper->getLoginUrl('http://www.siemdicou.com/fb/login-callback.php', $permissions);

echo '<a href="'. $loginUrl . '">Log in with Facebook!</a>';

?>

