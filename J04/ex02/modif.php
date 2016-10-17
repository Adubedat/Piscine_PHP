<?php
	if (($_POST['login'] == "" || $_POST['oldpw'] == "") || $_POST['newpw'] == "" && $_POST['submit'] === "OK")
		echo "ERROR\n";
	else if ($_POST['login'] != "" && $_POST['oldpw'] != "" && $_POST['newpw'])
	{
		$login = $_POST['login'];
		$pw = hash("whirlpool", $_POST['oldpw']);
		if (file_exists("../ex01/private/passwd"))
		{
			$users_tab = unserialize(file_get_contents("../ex01/private/passwd"));
			foreach($users_tab as $len => $elem)
			{
				if ($elem['login'] === $login && $elem['passwd'] === $pw)
				{
					$users_tab[$len]['passwd'] = hash("whirlpool", $_POST['newpw']);
					file_put_contents("../ex01/private/passwd", serialize($users_tab));
					echo "OK\n";
					die;
				}
			}
		}
		echo "ERROR\n";
	}
?>