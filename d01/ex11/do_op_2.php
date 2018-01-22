#!/usr/bin/php
<?PHP
	if ($argc != 2)
	{
		echo "Incorrect Parameters"."\n";
		return;
	}
	$tab = sscanf($argv[1], "%d %c %d");
	if ($tab[0] && $tab[1] && $tab[2])
	{
		if (!strcmp("+", $tab[1]))
			$res = $tab[0] + $tab[2];
		if (!strcmp("-", $tab[1]))
			$res = $tab[0] - $tab[2];
		if (!strcmp("*", $tab[1]))
			$res = $tab[0] * $tab[2];
		if (!strcmp("/", $tab[1]))
			$res = $tab[0] / $tab[2];
		if (!strcmp("%", $tab[1]))
			$res = $tab[0] % $tab[2];
		echo $res."\n";
	}
	else
		echo "Syntax Error"."\n";
?>
