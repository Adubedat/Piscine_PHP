#!/usr/bin/php
<?php

function is_alpha_num($elem)
{
	if (($elem >= "A" && $elem <= "Z") || ($elem >= "a" && $elem <= "z") || ($elem >= "0" && $elem <= "9"))
		return (1);
	else
		return (0);
}

function change_value($elem)
{
	if (is_numeric($elem))
		return ($elem);
	else if (!is_alpha_num($elem))
		return ($elem + 200);
	else
		return ($elem - 200);
}

function ft_strcmp($elem1, $elem2)
{
	$i = 0;
	while ($elem1[$i] && $elem2[$i] && $elem1[$i] == $elem2[$i])
		$i++;
	if (!$elem1[$i] || $elem1[$i] == $elem2[$i])
		return (0);
	else if (!$elem2[$i])
		return (1);
	$elem1 = change_value($elem1[$i]);
	$elem2 = change_value($elem2[$i]);
	if ($elem1 > $elem2)
		return (1);
	return (0);
}

function my_sort($tab)
{
	$i = 0;
	while ($tab[$i + 1])
	{
		if (ft_strcmp($tab[$i], $tab[$i + 1]))
		{
			$temp = $tab[$i];
			$tab[$i] = $tab[$i + 1];
			$tab[$i + 1] = $temp;
			$i = -1;
		}
		$i++;
	}
	return ($tab);
}

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

sort($str, SORT_FLAG_CASE | SORT_NATURAL);
$str = my_sort($str);
$str = implode ("\n", $str);
echo $str."\n";

?>
