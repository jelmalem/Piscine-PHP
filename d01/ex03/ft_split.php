#!/usr/bin/php
<?PHP
	function ft_split($str)
	{
		$str = trim($str);
		$tab = explode(" ", $str);
		asort($tab);
		$tab = array_filter($tab);
		$tab = array_values($tab);
		return($tab);
	}
?>