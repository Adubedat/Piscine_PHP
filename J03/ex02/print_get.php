<?php

$str = $_SERVER['argv'];
$i = 0;
while ($str[0][$i])
{
	if ($str[0][$i] === "=")
		echo ": ";
	else if ($str[0][$i] === "&")
		echo "\n";
	else
		echo $str[0][$i];
	$i++;
}
echo "\n";
?>
