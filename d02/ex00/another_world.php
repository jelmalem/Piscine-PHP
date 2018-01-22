#!/usr/bin/php
<?PHP
	if ($argc < 2)
		return;
	$arg = preg_replace('/[\t\s]+/', ' ', $argv[1]);
	$arg = trim($arg, " ");
	echo $arg."\n";
?>