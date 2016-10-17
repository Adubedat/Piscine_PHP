<?php
include("install.php");
if (file_exists("bdd_categories.txt"))
	$categorie_tab = unserialize(file_get_contents("bdd_categories.txt"));
include ("accueil.php");
if ($_GET['msg'] === "1")
	echo "<p id='success_msg'>Inscription réussie.</p><br />";
if ($_GET['msg'] === "4")
	echo "<p id='success_msg'>Mot de passe changé.</p><br />";
if ($_GET['msg'] === "5")
	echo "<p id='success_msg'>Compte supprimé.</p><br />";
if ($_GET['msg'] === "24")
{
	echo "<p id='success_msg'>Commande validée</p><br />";
	if (file_exists("commande.txt"))
	{
		$commande = unserialize(file_get_contents("commande.txt"));
		$len = 0;
		if ($commande)
		{
			foreach($commande as $osef)
				$len++;
		}
		$commande[$len]['login'] = $_SESSION['loggued_on_user'];
		$commande[$len]['commande'] = $_SESSION['panier']['liste'];
		$commande[$len]['id'] = $len;
		$_SESSION['panier']['liste'] = '';
		file_put_contents("./commande.txt", serialize($commande));
	}
}
?>
<html>
	<body>
		<div id="middle_div">
		<?php
			if ($categorie_tab)
			{
				foreach($categorie_tab as $elem)
				{
					echo '<div class="flex inline_block"><a href="article.php?categorie='.$elem['name'].'"><img class="flex_img" src="'.$elem["img"].'"/></a><p class="flex_txt">'.$elem["name"].'</p></div>';
				}
			}
		?>
		</div>
	</body>
</html>