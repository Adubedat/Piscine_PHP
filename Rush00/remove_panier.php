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

function clear_tab($tab)
{
	foreach ($tab as $key => $value) 
	{
		if (empty($value['qte']))
			unset($tab[$key]);
	}
	return($tab);
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
			$categorie = search_categorie($elem['name']);
			if (!$tab[$len]['qte'] || $tab[$len]['qte'] <= 0)
			{
				header('Location: article.php?categorie='.$categorie);
				exit();
			}
			$tab[$len]['qte'] -= 1;
			$tab = clear_tab($tab);
			$_SESSION['panier']['liste'] = $tab;
			header('Location: article.php?categorie='.$categorie);
			exit();
		}
	}	
}
$categorie = search_categorie($_GET['name']);
header('Location: article.php?categorie='.$categorie);
exit();
?>