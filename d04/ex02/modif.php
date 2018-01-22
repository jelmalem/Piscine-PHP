<?PHP
	if (!$_POST['login'] || !$_POST['oldpw'] || !$_POST['newpw'] || $_POST['submit'] !== "OK" || !($tab = file_get_contents("../ex01/private/passwd")))
	{
		echo "ERROR\n";
		return ;
	}
	$tab = unserialize($tab);
	$hash_oldpw = hash('whirlpool', $_POST['oldpw']);
	foreach ($tab as &$val)
	{
		if ($val['login'] === $_POST['login'] && $val['passwd'] === $hash_oldpw)
		{
			$val['passwd'] = hash('whirlpool', $_POST['newpw']);
			echo "OK\n";
			$tab = serialize($tab);
			file_put_contents("../ex01/private/passwd", $tab);
			return ;
		}
	}
	echo "ERROR\n";
?>