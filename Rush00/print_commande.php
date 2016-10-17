<?php
if (file_exists("commande.txt"))
{
	$id = $_GET['id'];
	$commande = unserialize(file_get_contents("commande.txt"));
	foreach($commande as $elem)
	{
		if ($elem['id'] == $id)
			$tab = $elem['commande'];
	}
	include("accueil.php");
}
?>
<html>
	<body>
		<div id="panier_div">
		<?php
			if ($tab)
			{
				foreach($tab as $elem)
				{
					echo '<div class="panier"><p class="flex_txt">'.$elem["qte"].' X '.$elem['name'].' : '.$elem['qte'] * $elem['price'].' EUR</p></div>';
					$total += $elem['price'] * $elem['qte'];
				}
				echo '<div class="panier"><p class="flex_txt">Somme totale : '.$total.' EUR</p></div>';
			}
		?>
		</div>
	</body>
</html>