<?php
session_start();
if (($_POST['login'] == "" || $_POST['passwd'] == "") && $_POST['submit'] === "OK")
{
	header('Location: connexion.php?msg=10');
	exit();
}
else if ($_POST['login'] != "" && $_POST['passwd'] != "")
{
	if (auth($_POST['login'], $_POST['passwd']))
	{
		$_SESSION['loggued_on_user'] = $_POST['login'];
		$_SESSION['state'] = 'log';
		header('Location: index.php');
		exit();
	}
	else if (user_exist($_POST['login'], $_POST['passwd']))
	{
		$_SESSION['loggued_on_user'] = "";
		header('Location: connexion.php?msg=8');
		exit();
	}
	else
	{
		$_SESSION['loggued_on_user'] = "";
		header('Location: connexion.php?msg=9');
		exit();
	}
}

function user_exist($login)
{
	if (file_exists("bdd.txt"))
	{
		$users_tab = unserialize(file_get_contents("bdd.txt"));
		if ($users_tab)
		{
			foreach($users_tab as $len => $elem)
			{
				if ($elem['login'] === $login)
					return True;
			}
		}
		return False;
	}
}

function auth($login, $passwd)
{
	if (file_exists("bdd.txt"))
	{
		$users_tab = unserialize(file_get_contents("bdd.txt"));
		$passwd = hash("whirlpool", $passwd);
		if ($users_tab)
		{
			foreach($users_tab as $len => $elem)
			{
				if ($elem['login'] === $login && $elem['passwd'] === $passwd)
					return True;
			}
		}
		return False;
	}
}
include ("accueil.php");
if ($_GET['msg'] === "10")
	echo '<p class="error_msg">Wrong parameters</p>';
if ($_GET['msg'] === "8")
	echo '<p class="error_msg">Wrong password</p>';
if ($_GET['msg'] === "9")
	echo '<p class="error_msg">This login is not registered</p>';
?>
<html>
	<body>
	<div class="formulaire">
		<form method="post">
		<br />
		<br />
		Identifiant: <input type="text" name="login" value="" />
		<br />
		Mot de passe: <input type="text" name="passwd" value="" />
		<br />
		<input type="submit" name="submit" value="OK">
		</form>
	</div>
	</body>
</html>