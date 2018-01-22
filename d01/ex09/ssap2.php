#!/usr/bin/php
<?PHP
	function is_alpha($c) 
	{
		return (('a' <= $c && $c <= 'z') || ('A' <= $c && $c <= 'Z'));
	}
	function is_digit($c) {
		return ('0' <= $c && $c <= '9');
	}
	function ft_sort($s1, $s2) 
	{
		if (is_alpha($s1[0]) && !is_alpha($s2[0]))
			return (-1);
		if (is_alpha($s2[0]) && !is_alpha($s1[0]))
			return (1);
		if (is_digit($s1[0]) && !is_digit($s2[0]))
			return (-1);
		if (is_digit($s2[0]) && !is_digit($s1[0]))
			return (1);
		return (strcoll(strtolower($s1), strtolower($s2)));
	}

	$tab = implode(" ", $argv);
	$tab = explode (" ", $tab);
	$tab = array_filter($tab, 'strlen');
	unset($tab[0]);
	usort($tab, 'ft_sort');
	foreach($tab as $v)
		fwrite(STDOUT, $v."\n");
?>