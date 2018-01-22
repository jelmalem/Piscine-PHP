<?php
session_start();
require_once('../connection.php');
if ($_SESSION['logged_user'] !== NULL)
{
	if ($_POST['submit'] === "Acheter")
	{
		$link = connection();
		$objet = array("id" => $_POST['id'], "quantite" => $_POST['quantite']);
		$produit = mysqli_query($link, "SELECT * FROM t_produit");
		$found = FALSE;
		while (($array = mysqli_fetch_array($produit, MYSQLI_ASSOC)) !== NULL) {
				if ($array['id'] == $objet['id'])
						$found = TRUE;
		}
		if ($found == TRUE) {
			$req_pre = mysqli_prepare($link, 'UPDATE t_paniers SET quantite=? WHERE id_produit=?');
			mysqli_stmt_bind_param($req_pre, "dd", $_POST['quantite'], $_POST['id']);
			mysqli_stmt_execute($req_pre);
			mysqli_close($link);
		}
		else {
			$req_pre = mysqli_prepare($link, 'INSERT INTO t_paniers (login, quantite, id_produit) VALUES (?, ?, ?)');
			mysqli_stmt_bind_param($req_pre, "sdd", $_SESSION['logged_user'], $_POST['quantite'], $_POST['id']);
			mysqli_stmt_execute($req_pre);
			mysqli_close($link);
		}
		header('location: ../index.php');
	}
	else if ($_POST['submit'] === "Actualiser")
	{
		$link = connection();
		if ($_POST['quantite'] == 0)
		{
			$req_pre = mysqli_prepare($link, 'DELETE FROM t_paniers WHERE id_produit=?');
			mysqli_stmt_bind_param($req_pre, "d", $_POST['id']);
			mysqli_stmt_execute($req_pre);
			mysqli_close($link);
		}
		else
		{
			$req_pre = mysqli_prepare($link, 'UPDATE t_paniers SET quantite=? WHERE id_produit=?');
			mysqli_stmt_bind_param($req_pre, "dd", $_POST['quantite'], $_POST['id']);
			mysqli_stmt_execute($req_pre);
			mysqli_close($link);
		}
		header('location: ../cart.php');
	}
}
else
{
	if ($_POST['submit'] === "Acheter")
	{
			$objet = array("id" => $_POST['id'], "quantite" => $_POST['quantite']);
			if ($_SESSION['panier']) {
					$found = FALSE;
					$i = 0;
					while ($_SESSION['panier'][$i]) {
						if ($_SESSION['panier'][$i]['id'] == $objet['id']) {
							$_SESSION['panier'][$i]['quantite'] += $objet['quantite'];
							$found = TRUE;
						}
						$i++;
					}
			}
			if (!$_SESSION['panier'] || $found == FALSE)
				$_SESSION['panier'][] = $objet;
			header('location: ../index.php');
	}
	if ($_POST['submit'] === "Actualiser")
	{
		$link = connection();
		if ($_POST['quantite'] == 0)
		{
			$req_pre = mysqli_prepare($link, 'DELETE FROM t_paniers WHERE id=?');
			mysqli_stmt_bind_param($req_pre, "d", $_POST['id']);
			mysqli_stmt_execute($req_pre);
			mysqli_close($link);
		}
		else
		{
			$i = 0;
			foreach ($_SESSION['panier'] as $elem) {
				if ($elem['id'] == $_POST['id']) {
					$_SESSION['panier'][$i]['quantite'] = $_POST['quantite'];
				}
				$i++;
			}
		}
		header('location: ../cart.php');
	}
}
?>
