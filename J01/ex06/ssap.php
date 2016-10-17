#!/usr/bin/php
<?php

if ($argc < 2)
	return ;
$str = implode (" ", $argv);
$str = explode (" ", $str);
$i = 0;

foreach ($str as $elem)
{
	$str[$i] = trim($str[$i]);
	if ($i == 0 || empty($str[$i]))
		unset($str[$i]);
	$i++;
}

sort($str);
$str = implode (" ", $str);
echo $str."\n";

?>
