<?php
if (($_POST['login'] == "" || $_POST['passwd'] == "") && $_POST['submit'] === "OK")
{
	header('Location: inscription.php?msg=6');
	exit();
}
if ($_POST['login'] != "" && $_POST['passwd'] != "")
{
	$tab['login'] = $_POST['login'];
	$tab['passwd'] = hash("whirlpool", $_POST['passwd']);
	$tab['rights'] = 0;
	$len = 0;
	if (file_exists("bdd.txt"))
	{
		$users_tab = unserialize(file_get_contents("bdd.txt"));
		if ($users_tab)
		{
			foreach($users_tab as $elem)
			{
				if ($elem['login'] === $_POST['login'])
				{
					header('Location: inscription.php?msg=7');
					exit();
				}
				$len++;
			}
		}
	}
	$users_tab[$len] = $tab;
	file_put_contents("./bdd.txt", serialize($users_tab));
	header('Location: index.php?msg=1');
}
include ("accueil.php");
if ($_GET['msg'] === "6")
	echo '<p class="error_msg">Wrong parameters</p>';
if ($_GET['msg'] === "7")
	echo '<p class="error_msg">Login already taken</p>';
?>
<html>
	<body>
	<div class="formulaire">
		<br />
		<br />
		<form method="post">
		Identifiant: <input type="text" name="login" value="" />
		<br />
		Mot de passe: <input type="text" name="passwd" value="" />
		<br />
		<input type="submit" name="submit" value="OK">
		</form>
	</div>
	</body>
</html>