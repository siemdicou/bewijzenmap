<?php
$sql = "SELECT * FROM cds";
$result = $mysqli->query($sql);
$result = resultToArray($result);
?>