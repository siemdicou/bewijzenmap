<?php

$sql = "SELECT * FROM events";
$result = $mysqli->query($sql);
$result = resultToArray($result);
?>