<?php
session_start();
include('message.html');
require_once('connection.php');
if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] == "OK" && $_POST['nom'] && $_POST['prenom'] && $_POST['adresse']) {
    $link = connection();
    $req_pre = mysqli_prepare($link, 'SELECT login FROM t_users WHERE login=?');
    mysqli_stmt_bind_param($req_pre, "s", $_POST['login']);
    mysqli_stmt_execute($req_pre);
    if (mysqli_stmt_fetch($req_pre) != NULL) {
      mysqli_close($link);
      echo "Cet utilisateur existe déja";
      exit ();
    }
    $passwd = hash('whirlpool', $_POST['passwd']);
    $req_pre = mysqli_prepare($link, 'INSERT INTO t_users (login, nom, prenom, adresse_de_livraison, mot_de_passe) VALUES (?, ?, ?, ?, ?)');
    mysqli_stmt_bind_param($req_pre, "sssss", $_POST['login'], $_POST['nom'], $_POST['prenom'], $_POST['adresse'], $passwd);
    mysqli_stmt_execute($req_pre);
    mysqli_close($link);
	  $_SESSION['logged_user'] = $_POST['login'];
    include('add_to_panier.php');
    echo "Votre compte a bien été créé !\n Bonjour " . $_POST['login']  . "!\n";
    exit ();
}
exit();
?>
