#!/usr/bin/php
<?php

$str = $argv[1];
$str = trim($str);

function double_space($str)
{
	$len = strlen($str);
	$i = 0;

	while ($i < $len)
	{
		if ($str[$i] == " " && $str[$i + 1] == " ")
			return (1);
		$i++;
	}
	return (0);
}
if ($argc == 2)
{
	while (double_space($str))
		$str = str_replace("  ", " ", $str);
	if ($str)
		echo $str."\n";
}
?>
