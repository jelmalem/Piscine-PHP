#!/usr/bin/php
<?PHP
	$fd = fopen("/var/run/utmpx", "r");
	if ($fd == false)
		exit ;
	date_default_timezone_set("Europe/Paris");
	$array = array();
	$user = array();
	$name = array();
	$time = array();
	$i = 0;
	while ($line = fread($fd, 628))
	{
		$array = unpack("a256user/a4id/a32line/ipid/itype/I2time/", $line);
		if ($array['type'] == 7)
		{
			$user[$i] = $array["user"];
			$name[$i] = $array["line"];
			$time[$i] = $array["time1"];
			$i++;
		}
	}
	sort($name);
	sort($time);
	for ($j=0; $j < $i; $j++)
	{ 
		echo $user[$j]. " ";
		echo $name[$j]. " ";
		echo date("M j H:i", $time[$j])."\n";
	}
	fclose($fd);
?>