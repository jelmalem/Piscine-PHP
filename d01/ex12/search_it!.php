#!/usr/bin/php
<?PHP
	if ($argc < 2)
		return;
	$arg = $argv[1];
	$res = false;
	$i = 2;
	while ($i < $argc)
	{
		$tmp = explode(":", $argv[$i]);
		if (!strcmp($arg, $tmp[0]))
			$res = $tmp[1];
		$i++;
	}
	if ($res)
		echo $res."\n";
?>
