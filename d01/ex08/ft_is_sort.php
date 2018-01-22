#!/usr/bin/php
<?PHP
	function ft_is_sort($str1)
	{
		$str2 = $str1;
		sort($str1);
		if ($str2 === $str1)
			return(1);
		else
			return(0);
	}
?>