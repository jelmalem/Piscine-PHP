<?php
session_start();
include('auth.php');
require_once('connection.php');
if ($_POST['submit'] && $_POST['submit'] == 'OK' && $_POST['newpwd'] && $_POST['oldpwd']) {
	if (authentificate($_SESSION['logged_user'], $_POST['oldpwd']) === TRUE) {
		$passwd = hash('whirlpool', $_POST['newpwd']);
		$link = connection();
		$req_pre = mysqli_prepare($link, 'UPDATE t_users SET mot_de_passe = ? WHERE login = ?');
		mysqli_stmt_bind_param($req_pre, "ss", $passwd, $_SESSION['logged_user']);
		mysqli_stmt_execute($req_pre);
		include "message.html";
		echo "votre mot de passe a bien ete change\n";
		mysqli_close($link);
	}
	else
	{
		include "message.html";
		echo "bad password\n";
	}
}
?>
