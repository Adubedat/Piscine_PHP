<?php
session_start();
if ($_POST['login'] != "" && $_POST['oldpw'] != "" && $_POST['newpw'] != "")
{
	$login = $_POST['login'];
	$pw = hash("whirlpool", $_POST['oldpw']);
	if (file_exists("bdd.txt"))
	{
		$users_tab = unserialize(file_get_contents("bdd.txt"));
		foreach($users_tab as $len => $elem)
		{
			if ($elem['login'] === $login && $elem['passwd'] === $pw)
			{
				$users_tab[$len]['passwd'] = hash("whirlpool", $_POST['newpw']);
				file_put_contents("bdd.txt", serialize($users_tab));
				header('Location: index.php?msg=4');
				exit();
			}
		}
	}
	header('Location: account.php?msg=3');
	exit();
}

function is_super_user($login)
{
	if ($_SESSION['loggued_on_user'] === "admin")
		return True;
	if (file_exists("bdd.txt"))
	{
		$users_tab = unserialize(file_get_contents("bdd.txt"));
		foreach($users_tab as $len => $elem)
		{
			if ($elem['login'] === $login && $elem['rights'] == 1)
				return True;
		}
		return False;
	}

}
include ("accueil.php");
if ($_GET['msg'] === "2")
	echo '<p class="error_msg">Wrong parameters</p>';
if ($_GET['msg'] === "3")
	echo '<p class="error_msg">Wrong password</p>';
?>
<html>
	<body>
		<br />
		<div class='formulaire'>
			<?php echo '<p class="welcome">Bienvenue '.$_SESSION["loggued_on_user"].'</p>';?>
			<p class="form_name"><u>Changer de mot de passe:</u></p>
			<form method="post">
			Identifiant: <input type="text" name="login" value="" />
			<br />
			Ancien mot de passe: <input type="text" name="oldpw" value="" />
			<br />
			Nouveau mot de passe: <input type="text" name="newpw" value="" />
			<br />
			<input type="submit" name="submit" value="OK">
			<a href="delete.php"><div id="delete"><p class="welcome">Supprimer mon compte</p></div></a>
			<?php
			if (is_super_user($_SESSION['loggued_on_user']))
			{?>
				<a href="gestion_admin.php"><div id="delete"><p class="welcome">Gestion administrateur</p></div></a>
			<?php
			}
			?>
			</form>
			<?php
			if ($_SESSION['loggued_on_user'] === "admin")
			{?>
			<p class="form_name"><u>Liste des commandes:</u></p>
			<?php
			if(file_exists('commande.txt'))
			{
				$commandes = unserialize(file_get_contents("commande.txt"));
				if ($commandes)
				{
					foreach($commandes as $elem)
					{
						echo '<p class="list_commande">Commande de '.$elem['login'].' : <a href="print_commande.php?id='.$elem['id'].'">ici</a></p>';
					}
				}
			}
			}	
			?>
		</div>
	</body>
</html>