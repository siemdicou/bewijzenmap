<?php

$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
mysqli_set_charset($mysqli, "utf8");

if($mysqli->connect_errno) {
    echo 'Failed to connect to MySQL: ( ' . $mysqli->connect_errno .  ') ' . $mysqli->connect_error;
}