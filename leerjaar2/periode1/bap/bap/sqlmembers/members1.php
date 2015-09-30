<?php
require_once 'config/config.php';
require_once 'library/database.php';

$UserID	= (empty($_POST['UserID'])) ? '' : $_POST['UserID']
$myfullname = (empty($_POST['myfirstname'])) ? '' : $_POST['myfirstname'];
$myusername = (empty($_POST['myusername'])) ? '' : $_POST['myusername'];
$mypassword = (empty($_POST['mypassword'])) ? '' : $_POST['mypassword'];

INSERT INTO members (UserID, Name, Username, Password)
VALUES ('$UserID','$myfullname','$myusername','$mypassword');


 ?>