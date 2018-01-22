<?php
session_start();
if ($_POST['submit'] == "Actualiser")
	{
		$link = connection();
		$req_pre = mysqli_prepare($link, 'UPDATE t_paniers SET quantite=? WHERE id=?');
		mysqli_stmt_bind_param($req_pre, "dd", $_POST['quantite'], $_POST['id']);
		mysqli_stmt_execute($req_pre);
		mysqli_close($link);
	}
?>
