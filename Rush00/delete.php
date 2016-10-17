<?php
session_start();
header('Location: index.php?msg=5');
$users_tab = unserialize(file_get_contents("bdd.txt"));
foreach($users_tab as $len => $elem)
{
	if ($elem['login'] === $_SESSION['loggued_on_user'])
	{
		unset($users_tab[$len]);
		$users_tab = array_merge($users_tab);
		$_SESSION['loggued_on_user'] = "";
		$_SESSION['state'] = "";
		file_put_contents("bdd.txt", serialize($users_tab));
		exit();
	}
}
?>