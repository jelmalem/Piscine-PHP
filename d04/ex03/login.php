<?PHP
	include ("auth.php");
	session_start();
	$login = $_GET["login"];
	$passwd = hash(whirlpool, $_GET["passwd"]);
	if (auth($login, $passwd) == true)
	{
		echo "OK\n";
		$_SESSION["loggued_on_user"] = $login;
	}
	else
	{
		echo "ERROR\n";
		$_SESSION["loggued_on_user"] = "";
	}
?>