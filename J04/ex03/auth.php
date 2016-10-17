<?php
function auth($login, $passwd)
{
	if (file_exists("../ex01/private/passwd"))
	{
		$users_tab = unserialize(file_get_contents("../ex01/private/passwd"));
		$passwd = hash("whirlpool", $passwd);
		foreach($users_tab as $len => $elem)
		{
			if ($elem['login'] === $login && $elem['passwd'] === $passwd)
				return True;
		}
		return False;
	}
}
?>