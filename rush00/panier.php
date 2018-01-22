<?php
session_start();
require_once('connection.php');
if ($_GET['validation'] === "ok" && $_SESSION['logged_user'] == '') {
	include('message.html');
	echo "Veuillez vous connecter pour valider votre commande";
	exit ();
}
if ($_SESSION['logged_user'] != "")
{
	$link = connection();
	$req_pre = mysqli_prepare($link, 'SELECT t_produit.id, nom, image, prix, t_paniers.quantite FROM t_produit INNER JOIN t_paniers ON t_produit.id = t_paniers.id_produit WHERE t_paniers.login = ?');
	mysqli_stmt_bind_param($req_pre, "s", $_SESSION['logged_user']);
	mysqli_stmt_execute($req_pre);
	mysqli_stmt_bind_result($req_pre, $data['id'], $data['nom'], $data['image'], $data['prix'], $data['quantite']);
	if ($_GET['validation'] === 'ok')
	{
		while (mysqli_stmt_fetch($req_pre) != NULL){
			$insert_table[] = array('id_produit' => $data['id'], 'quantite' => $data['quantite']);
		}
		mysqli_close($link);
		foreach ($insert_table as $elem) {
			$link = connection();
			$req_pre2 = mysqli_prepare($link, 'INSERT INTO t_achats (id_produit, login, quantite) VALUES (?, ?, ?)');
			mysqli_stmt_bind_param($req_pre2, "dsd", $elem['id_produit'], $_SESSION['logged_user'], $elem['quantite']);
			mysqli_stmt_execute($req_pre2);
			mysqli_close($link);
		}
		include ('delete_panier.php');
		include('message.html');
		echo"Commande validée, votre panier est vide";
	}
	else
	{
		$total = 0;
		while (mysqli_stmt_fetch($req_pre) != NULL)
		{
			$total += $data['prix'] * $data['quantite'];
			$img = file_get_contents($data['image']);
			$file = base64_encode($img);
			?>
			<tr>
			<td align="center" width=20%>'<?=$data['nom']?></td>
			<td align="center" width=30%><img style="width: 160px; height:160px" src="data:image/png;base64,<?=$file?>"></td>
			<td align="center" width=20%><?=$data['prix']?> € </td>
			<td align="center" width=20%><?=$data['quantite']?></td>
			<td align="center" width=20%><form action="base/ajoutpanier.php" method="post">
			<input type="hidden" name="id" value='<?=intval($data["id"])?>'>
			<input type="number" name="quantite" value=''>
			<input type="submit" name="submit" value="Actualiser" class="btn_buy">
			</form></td>
			</tr>
			<?php
		}
		?>
		<tr><td colspan="3"><h2>TOTAL : </h2></td><td><?=$total?> €</td></tr>
		<?php
		mysqli_close($link);
	}
}
else if ($_SESSION['panier'] && $_GET['validation'] !== "ok")
{
	$i = 0;
	$link = connection();
	while ($_SESSION['panier'][$i]) {
		$link = connection();
		$req_pre = mysqli_prepare($link, 'SELECT id, nom, image, prix FROM t_produit WHERE id = ?');
		mysqli_stmt_bind_param($req_pre, "s", $_SESSION['panier'][$i]['id']);
		mysqli_stmt_execute($req_pre);
		mysqli_stmt_bind_result($req_pre, $data['id'], $data['nom'], $data['image'], $data['prix']);
		mysqli_stmt_fetch($req_pre);
		$total += $data['prix'] * $_SESSION['panier'][$i]['quantite'];
				$img = file_get_contents($data['image']);
		$file = base64_encode($img);
		?>
		<tr><td align="center" width=20%><?=$data['nom']?></td>
		<td align="center" width=30%><img style="width: 160px; height:160px" src="data:image/png;base64,<?=$file?>"></td>
		<td align="center" width=20%><?=$data['prix']?> € </td>
		<td align="center" width=20%><?=$_SESSION['panier'][$i]['quantite']?></td>
		<td align="center" width=20%><form action="base/ajoutpanier.php" method="post">
		<input type="hidden" name="id" value="<?=$data['id']?>">
		<input type="number" name="quantite" value=''>
		<input type="submit" name="submit" value="Actualiser" class="btn_buy">
		</form></td></tr>
		<?php
		mysqli_close($link);
		$i++;
	}
	?>
	<tr><td colspan="3"><h2>TOTAL : </h2></td><td><?=$total?> €</td></tr>
	<?php
}
?>
