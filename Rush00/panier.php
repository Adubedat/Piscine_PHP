<?php
	session_start();
	$tab = $_SESSION['panier']['liste'];
	include("accueil.php");
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
				if ($_SESSION['state'] == "log")
					echo '<a href="index.php?msg=24" class="valider_panier"><div><p class="flex_txt">Valider le panier</p></div></a>';
				else
					echo '<div class="valider_panier"><p class="flex_txt">You must log in to validate your shopping cart</p></div>';
			}
		?>
		</div>
	</body>
</html>