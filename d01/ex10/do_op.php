#!/usr/bin/php
<?PHP
	if ($argc != 4)
	{
		echo "Incorrect Parameters\n";
		return;
	}
	$tab = implode(" ", $argv);
	$tab = trim($tab);
	$tab = explode (" ", $tab);
	$tab = array_filter($tab, 'strlen');
	$tab = array_values($tab);
	unset($tab[0]);
	if ($tab[2] == "+")
		$res = $tab[1] + $tab[3];
	if ($tab[2] == "-")
		$res = $tab[1] - $tab[3];
	if ($tab[2] == "*")
		$res = $tab[1] * $tab[3];
	if ($tab[2] == "%")
		$res = $tab[1] % $tab[3];
	if ($tab[2] == "/")
		$res = $tab[1] / $tab[3];
	echo $res."\n";
?>