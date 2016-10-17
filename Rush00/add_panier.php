<?php

function search_categorie($name)
{
	if (file_exists("bdd_articles.txt"))
	{
		$articles = unserialize(file_get_contents("./bdd_articles.txt"));
		if ($articles)
		{
			foreach($articles as $elem)
			{
				if ($elem['name'] === $name)
					return $elem['categorie'];
			}
		}
	}
}

session_start();
$len = 0;
if($_SESSION['panier']['liste'])
{
	$tab = $_SESSION['panier']['liste'];
	foreach ($tab as $len => $elem)
	{
		if ($elem['name'] === $_GET['name'])
		{
			$tab[$len]['qte'] += 1;
			$_SESSION['panier']['liste'] = $tab;
			$categorie = search_categorie($elem['name']);
			header('Location: article.php?categorie='.$categorie);
			exit();
		}
	}
}
if (file_exists("bdd_articles.txt"))
{
	$articles = unserialize(file_get_contents("./bdd_articles.txt"));
	if ($articles)
	{
		foreach($articles as $elem)
		{
			if ($elem['name'] === $_GET['name'])
			{
				$tab[$len + 1]['name'] = $_GET['name'];
				$tab[$len + 1]['qte'] = 1;
				$tab[$len + 1]['price'] = $elem['price'];
				$_SESSION['panier']['liste'] = $tab;
				header('Location: article.php?categorie='.$elem['categorie']);
				exit();
			}
		}
	}
}
?>