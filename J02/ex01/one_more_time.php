#!/usr/bin/php
<?php

function check_day($day)
{
	if (preg_match("/^[Ll]undi$/", $day) || preg_match("/^[Mm]ardi$/", $day) || preg_match("/^[Mm]ercredi$/", $day) || preg_match("/^[Jj]eudi$/", $day)
		|| preg_match("/^[Vv]endredi$/", $day) || preg_match("/^[Ss]amedi$/", $day) || preg_match("/^[Dd]imanche$/", $day))
		return (1);
	else
		return (0);
}

function check_month($month)
{
	if (preg_match("/^[Jj]anvier$/", $month))
		return (1);
	else if (preg_match("/^[Ff]evrier$/", $month))
		return (2);
	else if (preg_match("/^[Mm]ars$/", $month))
		return (3);
	else if (preg_match("/^[Aa]vril$/", $month))
		return (4);
	else if (preg_match("/^[Mm]ai$/", $month))
		return (5);
	else if (preg_match("/^[Jj]uin$/", $month))
		return (6);
	else if (preg_match("/^[Jj]uillet$/", $month))
		return (7);
	else if (preg_match("/^[Aa]out$/", $month))
		return (8);
	else if (preg_match("/^[Ss]eptembre$/", $month))
		return (9);
	else if (preg_match("/^[Oo]ctobre$/", $month))
		return (10);
	else if (preg_match("/^[Nn]ovembre$/", $month))
		return (11);
	else if (preg_match("/^[Dd]ecembre$/", $month))
		return (12);
	else
		return (0);
}

function check_hours($str)
{
	if (($len = strlen($str)) != 8)
		return (0);
	$i = 0;
	while ($i < $len)
	{
		if (($str[$i] < "0" && $str[$i] != ":") || ($str[$i] > "9" && $str[$i] != ":"))
			return (0);
		$i++;
	}
	return (1);
}

if ($argc != 2)
	return ;
$tab = explode(" ", $argv[1]);
if (count($tab) !== 5 || check_day($tab[0]) === 0 || is_numeric($tab[1]) == 0 
	|| is_numeric($tab[3]) == 0 || strlen($tab[3]) != 4 || check_hours($tab[4]) == 0)
{
	echo "Wrong format\n";
	return ;
}
if (($month = check_month($tab[2])) === 0)
{
	echo "Wrong format\n";
	return ;
}
date_default_timezone_set('Europe/Paris');
$time = strtotime("$tab[1]-$month-$tab[3] $tab[4]");
if ($time === FALSE)
{
	echo "Wrong format\n";
	return ;
}
else
	echo $time."\n";

?>
