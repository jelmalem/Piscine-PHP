<?php
session_start();
require_once('connection.php');
$link = connection();
$categories = mysqli_query($link, "SELECT nom FROM t_categorie");
while (($array = mysqli_fetch_array($categories, MYSQLI_ASSOC)) != NULL) {
  echo "<a style='display: inline; margin-left: 20px' href='http://localhost:8080/rush00/index.php?name=";
  echo $array['nom'];
  echo "'>";
  echo $array['nom'];
  echo "</a>";
}
mysqli_close($link);
?>
