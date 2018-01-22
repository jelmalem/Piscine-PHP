#!/usr/bin/php
<?PHP
	function ft_split($str)
	{
		$str = trim($str);
		$tab = preg_split('/[\s]+/', $str);
		$tab = array_filter($tab);
		$tab = array_values($tab);
		return($tab);
	}

	if ($argc != 2)
		return;
	$tab = ft_split($argv[1]);
	$size = count($tab);
	for ($i = 0; $i != $size; $i++)
	{
		echo $tab[$i];
		if (($i + 1) != $size)
			echo " ";
	}
	echo "\n";
?>