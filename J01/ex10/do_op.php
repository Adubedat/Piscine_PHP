#!/usr/bin/php
<?php

if ($argc != 4)
{
	echo "Incorrect Parameters\n";
	return ;
}

$str = implode (" ", $argv);
$str = explode (" ", $str);

foreach ($str as $i => $elem)
{
	$str[$i] = trim($str[$i]);
	if ($i == 0 || empty($str[$i]))
		unset($str[$i]);
}
$str = array_merge($str);
if ($str[1] == "%")
	echo $str[0] % $str[2]."\n";
else if ($str[1] == "+")
	echo $str[0] + $str[2]."\n";
else if ($str[1] == "-")
	echo $str[0] - $str[2]."\n";
else if ($str[1] == "*")
	echo $str[0] * $str[2]."\n";
else if ($str[1] == "/")
	echo $str[0] / $str[2]."\n";
?>
