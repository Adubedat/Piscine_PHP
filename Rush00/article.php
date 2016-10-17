<?php
	$categorie = $_GET['categorie'];
	if (file_exists("bdd_articles.txt"))
		$articles = unserialize(file_get_contents("bdd_articles.txt"));
	include('accueil.php');
?>
<html>
	<body>
		<div id="middle_div">
		<?php
			if ($articles)
			{
				foreach($articles as $elem)
				{
					if ($elem['categorie'] === $categorie)
						echo '<div id="articles" class="flex inline_block"><a href="add_panier.php?name='.$elem['name'].'"><img class="flex_img" src="'.$elem["img"].'"/></a><p class="flex_txt">'.$elem["name"].'<br /><br />Prix : '.$elem['price'].'</p><a href="add_panier.php?name='.$elem['name'].'"><input id="add_pan" type="submit" name="submit" value="Ajouter au panier"></a><a href="remove_panier.php?name='.$elem['name'].'"><input id="remove_pan" type="submit" name="submit" value="Enlever du panier"></a></div>';
				}
			}
		?>
		</div>
	</body>
</html>