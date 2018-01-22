<?php
function connection() {
$server = "localhost";
$link = mysqli_connect($server);
if (!$link)
  die("Error " . mysqli_error($link));
else {
  mysqli_query($link, "USE miniboutique");
  return $link;
  }
}
?>
