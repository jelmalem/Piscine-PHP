#!/usr/bin/php
<?PHP
	function replace1($tab)
	{
		return strtoupper($tab[0]);
	}
	function replace2($tab)
	{
		$str = preg_replace_callback("/>(.|\n)*</U", "replace1", $tab[0]);
		return($str);
	}

	if ($argc != 2)
		return;
	$fd = fopen($argv[1], 'r');
	if ($fd === false)
	{
		echo "Error";
		return;
	}
	$data = fread($fd, filesize($argv[1]));
	$data = preg_replace_callback("/\".*\"/", "replace1", $data);
	$data = preg_replace_callback("/<a(.|\n)*<\/a>/", "replace2", $data);
	echo $data."\n";
?>