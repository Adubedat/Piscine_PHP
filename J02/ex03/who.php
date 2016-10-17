#!/usr/bin/php
<?php
$fd = fopen("/var/run/utmpx", "r");
$i = 0;
date_default_timezone_set('Europe/Paris');
while ($data = fread($fd, 628))
{
	$tab = unpack("a256user/a4id/a32line/ipid/itype/L2time/a256host/Luse", $data);
	if ($i !== 0 && $i != 1)
	{
		$tab[user] = trim($tab[user]);
		$tab[line] = trim($tab[line]);
		$date = date("M  j H:i", $tab[time1]);
		if ($tab[type] === 7)
			echo "$tab[user] $tab[line]  $date\n";
	}
	$i++;
}
?>
