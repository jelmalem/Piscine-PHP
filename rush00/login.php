<?php
session_start();
require_once('auth.php');
if ($_POST['submit'] && $_POST['submit'] == 'OK' && $_POST['login'] && $_POST['passwd']) {
    if (authentificate($_POST['login'], $_POST['passwd']) === TRUE) {
      $_SESSION['logged_user'] = $_POST['login'];
	     include("add_to_panier.php");
       $_SESSION['panier'] = NULL;
       include("index.php");
    }
    else {
      include("message.html");
      echo "Mauvaise Combinaison login/mot de passe";
    }
}
else {
  $_SESSION['loggued_on_user'] = "";
  include("message.html");
  echo "Vous devez remplir le champ login et mot de passe avant de cliquer";
}
?>
