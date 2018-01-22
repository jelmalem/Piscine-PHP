#!/usr/bin/php
<?PHP
	if ($argc < 2)
		return;
	$tab = implode(" ", $argv);
	$tab = explode (" ", $tab);
	$tab = array_filter($tab, 'strlen');
	unset($tab[0]);
	sort($tab);
	for ($i = 0; $i != sizeof($tab); $i++)
	{
		echo $tab[$i]."\n";
	}
?>