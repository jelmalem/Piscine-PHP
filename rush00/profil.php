<?php
session_start();
?>
<html>
	<head>
	</head>
	<body>
	<div class="main_screen">
		<?php
	if ($_SESSION['logged_user'] == '') {
	?>
	<div class="creation">
			<br /> <a href="create.html">Creer votre compte !</a><br />
		</div>
		<?php
	}
	else {
		include('get_user_info.php');?>
	<div>
	Modifier son mot de passe<br />
	<form method="POST" action="modif.php">
		Ancien mot de passe :<input style="width: 500px; height: 25px" type="password" size="80" name="oldpwd" value=""><br />
		Nouveau mot de passe :<input style="width: 500px; height: 25px" type="password" size="80" name="newpwd" value=""><br />
		<input style="width: 200px; height: 25px" type="submit" size="80" name="submit" value="OK">
	</form>
	</div>
	<div>
	Supprimer son compte<br />
	<form method="POST" action="delete_user.php">
		mot de passe :<input style="width: 500px; height: 25px" type="password" size="80" name="pwd" value=""><br />
		<input style="width: 200px; height: 25px" type="submit" size="80" name="submit" value="OK">
	</form>
	</div>

<?php } ?>
</div>
	</body>
</html>
