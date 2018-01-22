#!/usr/bin/php
<?PHP
	$tab = explode("//", $argv[1]);
	$tab2 = explode(" ", $tab[1]);
	exec("mkdir ".$tab2[0]);
	$read = file_get_contents($argv[1]);
	preg_match("/<img src=\"(.+)\".+/U", $read, $matches);
	$img2 = file_get_contents($img[0]);
	if (!($fd = fopen($tab2[0]."/".basename($matches[1]), 'w')))
		return;
	fwrite($fd, $img2);
	fclose($fd);
?>


