<?PHP

function ft_split($str)
{
	$i = 0;
	$tab = explode(" ", $str);
	foreach($tab as $elem)
	{
		$tab[$i] = trim ($tab[$i]);
		if (empty($tab[$i]))
			unset ($tab[$i]);
		$i++;
	}
	sort($tab);
	return ($tab);
}

?>
