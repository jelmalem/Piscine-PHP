<?php
session_start();
require_once('connection.php');
$link = connection();
$req_pre = mysqli_prepare($link, 'SELECT * FROM t_users WHERE login=?');
mysqli_stmt_bind_param($req_pre, "s", $_SESSION['logged_user']);
mysqli_stmt_execute($req_pre);
mysqli_stmt_bind_result($req_pre,$donnes['id'], $donnees['login'], $donnees['prenom'], $donnees['nom'], $donnees['adresse_de_livraison'], $donnees['mot_de_passe']);
if (mysqli_stmt_fetch($req_pre) != NULL) {
	?>
	<div style='margin: 30px; width: 200px; height: 200px'>Votre login : <?=$donnees['login']?><br />
	Votre prenom : <?=$donnees['prenom']?><br />
	Votre nom : <?=$donnees['nom']?><br />
	Votre adresse : <?=$donnees['adresse_de_livraison']?><br /></div>
	<?php
}
mysqli_close($link);
?>
