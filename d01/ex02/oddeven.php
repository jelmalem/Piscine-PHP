#!/usr/bin/php
<?php
	while(1)
	{
		echo "Entrez un nombre: ";
		if ($line = fgets(STDIN))
		{
			$line = rtrim($line);
			$drap = 0;
			if (!is_numeric($line))
				$drap = 1;
			$limit = 9223372036854775807;
			if ($drap == 1)
			{
				echo "'".$line."' n'est pas un chiffre\n";
			}
			else if ($line == $limit || $line == -9223372036854775808)
			{
				echo "Error: le nombre et trop grand.\n";
			}
			else if ($line % 2 == 0)
			{
				echo "Le chiffre ".$line." est Pair\n";
			}
			else
			{
				echo "Le chiffre ".$line." est Impair\n";
			}
		}
		else
		{
			echo "\n";
			return;
		}
	}
?>