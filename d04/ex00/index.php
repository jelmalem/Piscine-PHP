<?PHP
	session_start();
	if ($_GET != null)
	{
		$_SESSION["login"] = $_GET["login"];
		$_SESSION["passwd"] = $_GET["passwd"];
		$_SESSION["submit"] = $_GET["submit"];
	}
?>
<html><body>
<form action="index.php" method="GET">
	Identifiant: <input type="text" name="login" <?php echo "value="."\042".$_SESSION["login"]."\042" ?> />
	<br />
	Mot de passe: <input type="password" name="passwd" <?php echo "value="."\042".$_SESSION["passwd"]."\042" ?> />
	<input type="submit" name="submit" value="OK"/>
</form>
</body></html>