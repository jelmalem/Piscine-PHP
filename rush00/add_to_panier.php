<?php
session_start();
require_once ('connection.php');
if ($_SESSION['panier'])
{
	foreach ($_SESSION['panier'] as $elem) {
		$link = connection();
		$elem['id'] = (int)($elem['id']);
		$elem['quantite'] = (int)($elem['quantite']);
		$req_pre = mysqli_prepare($link, 'INSERT INTO t_paniers (id_produit, login, quantite) VALUES (?, ?, ?)');
		mysqli_stmt_bind_param($req_pre, "dsd", $elem['id'], $_SESSION['logged_user'], $elem['quantite']);
		mysqli_stmt_execute($req_pre);
		mysqli_close($link);
	}
}
?>
