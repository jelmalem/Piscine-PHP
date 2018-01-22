#!/usr/bin/php
<?PHP
	function error()
	{
		exit("Wrong Format\n");
	}

	if ($argc != 2)
	$jours_maj = explode(";", "Lundi;Mardi;Mercredi;Jeudi;Vendredi;Samedi;Dimache");
	$jours_minute = explode(";", "lundi;mardi;mercredi;jeudi;vendredi;samedi;dimache");
	$mois_maj = explode(";", "Janvier;Février;Mars;Avril;Mai;Juin;Juillet;Août;Septembre;Octobre;Novembre;Décembre");
	$mois_min = explode(";", "janvier;février;mars;avril;mai;juin;juillet;août;septembre;octobre;novembre;décembre");
	$tab = preg_split("/ /", $argv[1]);
	if (count($tab) != 5)
		error();
	$jours = array_search("$tab[0]", $jours_maj);
	if ($jours === false)
		$jours = array_search("$tab[0]", $jours_min);
	if ($jours === false)
		error();
	$date_nb = $tab[1];
	if (strlen($date_nb) > 2)
		error();
	$mois = array_search("$tab[2]", $mois_maj);
	if ($mois === false)
		$mois = array_search("$tab[2]", $mois_min);
	if ($mois === false)
		error();
	$year = $tab[3];
	if (strlen($year) > 4)
		error();
	if (!ctype_digit($year))
		error();
	$time = $tab[4];
	if (strlen($time) != 8)
		error();
	$testtime = explode(":", $time);
	for ($i = 0; $i < sizeof($testtime); $i++)
		if (!ctype_digit($testtime[$i]))
			error();
	$time = explode(":", $time);
	$heure = $time[0];
	$minute = $time[1];
	$sec = $time[2];
	print(mktime($heure, $minute, $sec, $mois + 1, $date_nb, $year));
	print("\n");
?>