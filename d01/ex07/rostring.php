#!/usr/bin/php
<?PHP
	if ($argc == 1)
		return;
	$tab = trim($argv[1]);
	$tab = preg_split('/[\s]+/', $argv[1]);
	$tab = array_filter($tab);
	$tab = array_values($tab);
	for ($i = 1; $i != sizeof($tab); $i++)
	{
		echo $tab[$i]." ";
	}
	echo $tab[0]."\n";
?>