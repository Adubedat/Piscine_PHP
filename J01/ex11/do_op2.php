#!/usr/bin/php
<?php
if ($argc != 2)
{
	echo "Incorrect Parameters\n";
	return ;
}
function	check_signe($str)
{
	$len = strlen($str);
	$i = 0;

	while ($i < $len)
	{
		if ($str[$i] == "+" || $str[$i] == "-" || $str[$i] == "%" || $str[$i] == "*" || $str[$i] == "/")
			return ($str[$i]);
		$i++;
	}
	return (0);
}

$signe = check_signe($argv[1]);
$tab = explode($signe, $argv[1]);
if (count($tab) != 2)
{
	echo "Syntax Error";
	return ;
}

foreach ($tab as $i => $elem)
{
	$tab[$i] = trim($tab[$i]);
	if (!is_numeric($tab[$i]))
	{
		echo "Syntax Error";
		return ;
	}

}
if ($signe == "%")
	echo $tab[0] % $tab[1]."\n";
else if ($signe == "+")
	echo $tab[0] + $tab[1]."\n";
else if ($signe == "-")
	echo $tab[0] - $tab[1]."\n";
else if ($signe == "*")
	echo $tab[0] * $tab[1]."\n";
else if ($signe == "/")
	echo $tab[0] / $tab[1]."\n";
?>
