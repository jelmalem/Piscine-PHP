<?php
session_start();
require_once('connection.php');
if ($_SESSION['logged_user'] !== NULL)
{
	$link = connection();
	$req_pre = mysqli_prepare($link, 'DELETE FROM t_paniers WHERE login = ?');
	mysqli_stmt_bind_param($req_pre, "s", $_SESSION['logged_user']);
	mysqli_stmt_execute($req_pre);
	mysqli_close($link);
}
?>
