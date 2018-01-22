<?php
if ($_POST['categorie1'] && $_POST['submit'] == "OK" && $_POST['nom'] && $_POST['prix'] && $_POST['image'])
{
	$link = connection();
	$req_pre = mysqli_prepare($link, 'INSERT INTO t_produit (nom, prix, categorie1, categorie2, image) VALUES (?, ?, ?, ?, ?)');
	mysqli_stmt_bind_param($req_pre, "sssss", $_POST['nom'], $_POST['prix'], $_POST['categorie1'], $_POST['categorie2'], $_POST['image']);
	mysqli_stmt_execute($req_pre);
	mysqli_close($link);
}
?>
