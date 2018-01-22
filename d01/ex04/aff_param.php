#!/usr/bin/php
<?PHP
	$param = count($argv);
	for ($i = 1; $i != $param; $i++)
	{
		echo $argv[$i]."\n";
	}
?>