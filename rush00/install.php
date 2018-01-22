<?php
require_once('connection.php');
$link = connection();
mysqli_query($link, "CREATE DATABASE miniboutique");
mysqli_query($link, "USE miniboutique");
$file = file_get_contents("base/base.sql");
$array = explode (";", $file);
foreach ($array as $elem) {
	mysqli_query($link, $elem);
};
mysqli_close($link);
?>
