#!/usr/bin/php
<?PHP

function	is_digit($str)
{
	$len = strlen($str);
	$i = 0;

	if ($len == 0)
		return (0);
	while ($i < $len)
	{
		if ($str[$i] < "0" || $str[$i] > "9")
			return (0);
		$i++;
	}
	return (1);
}

while (1)
{
	echo "Entre un nombre: ";
	$input = fgets(STDIN);
	if (!$input)
		return ;
	$input = rtrim($input);
	if (is_digit($input) == 0)
		echo "'$input' n'est pas un chiffre\n";
	else if (is_digit($input) == 1 && $input % 2 == 0)
		echo "Le chiffre $input est Pair\n";
	else
		echo "Le chiffre $input est Impair\n";	
}
?>
