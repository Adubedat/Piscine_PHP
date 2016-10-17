<?php
	if (($_POST['login'] == "" || $_POST['passwd'] == "") && $_POST['submit'] === "OK")
		echo "ERROR\n";
	else if ($_POST['login'] != "" && $_POST['passwd'] != "")
	{
		if (!file_exists("./private"))
		mkdir("./private");
		$tab['login'] = $_POST['login'];
		$tab['passwd'] = hash("whirlpool", $_POST['passwd']);
		$len = 0;
		if (file_exists("./private/passwd"))
		{
			$users_tab = unserialize(file_get_contents("./private/passwd"));
			foreach($users_tab as $elem)
			{
				if ($elem['login'] === $_POST['login'])
				{
					echo "ERROR\n";
					die;
				}
				$len++;
			}
		}
		$users_tab[$len] = $tab;
		file_put_contents("./private/passwd", serialize($users_tab));
		echo "OK\n";
	}
?>