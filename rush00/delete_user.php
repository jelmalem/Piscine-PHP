<?php
session_start();
require_once('auth.php');
if ($_POST['submit'] && $_POST['submit'] == 'OK' && $_POST['pwd']) {
	if (authentificate($_SESSION['logged_user'], $_POST['pwd']) === TRUE) {
		$link = connection();
		$req_pre = mysqli_prepare($link, 'DELETE FROM t_users WHERE login = ?');
		mysqli_stmt_bind_param($req_pre, "s", $_SESSION['logged_user']);
		mysqli_stmt_execute($req_pre);
		$_SESSION['loggued_on_user'] = "";
		session_destroy();
		include "message.html";
		echo "votre compte a ete supprimé avec succes\n";
		mysqli_close($link);
	}
	else
	{
		include "message.html";
		echo "bad password\n";
	}
}
?>
