<?PHP
	function auth($login, $passwd)
	{
		$tab = unserialize(file_get_contents("../ex01/private/passwd"));
		foreach ($tab as $val)
		{
			if ($val["login"] == $login && $val["passwd"] == $passwd)
				return true;
		}
		return false;
	}
?>