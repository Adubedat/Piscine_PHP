#!/usr/bin/php
<?php

$tab = explode(" ", $argv[1]);

foreach ($tab as $i => $elem)
{
	$tab[$i] = trim($tab[$i]);
	if ($i == 0)
		$first_word = $tab[$i];
	if ($i == 0 || empty($tab[$i]))
		unset($tab[$i]);
}

$str = implode(" ", $tab);
echo $str;
if ($str)
	echo " ";
echo "$first_word\n";
?>
