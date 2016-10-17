<?php
session_start();
if ($_POST['add_name'] != "" && $_POST['add_price'] != "" && $_POST['add_categorie'])
{
	$tab['name'] = $_POST['add_name'];
	$tab['price'] = $_POST['add_price'];
	$tab['img'] = $_POST['add_url'];
	$tab['categorie'] = $_POST['add_categorie'];
	$len = 0;
	if (file_exists("bdd_articles.txt"))
	{
		$article_tab = unserialize(file_get_contents("bdd_articles.txt"));
		if ($article_tab)
		{
			foreach($article_tab as $elem)
			{
				if ($elem['name'] === $_POST['add_name'])
				{
					header('Location: gestion_admin.php?msg=12');
					exit();
				}
				$len++;
			}
		}
	}
	$article_tab[$len] = $tab;
	file_put_contents("./bdd_articles.txt", serialize($article_tab));
	header('Location: gestion_admin.php?msg=17');
	exit();
}
else if ($_POST['modif_name'] != "" && $_POST['new_name'] && $_POST['modif_url'] && $_POST['modif_price'] && $_POST['modif_categorie'])
{
	$len = 0;
	if (file_exists("bdd_articles.txt"))
	{
		$articles = unserialize(file_get_contents("./bdd_articles.txt"));
		if ($articles)
		{
			foreach($articles as $elem)
			{
				if ($elem['name'] === $_POST['modif_name'])
				{
					$articles[$len]['name'] = $_POST['new_name'];
					$articles[$len]['img'] = $_POST['modif_url'];
					$articles[$len]['price'] = $_POST['modif_price'];
					$articles[$len]['categorie'] = $_POST['modif_categorie'];
					file_put_contents("./bdd_articles.txt", serialize($articles));				
					header('Location: gestion_admin.php?msg=18');
					exit();
				}
				$len++;
			}
			header('Location: gestion_admin.php?msg=19');
			exit();
		}
	}
}
else if ($_POST['delete_name'] != "")
{
	$len = 0;
	if (file_exists("bdd_articles.txt"))
	{
		$articles = unserialize(file_get_contents("./bdd_articles.txt"));
		if ($articles)
		{
			foreach($articles as $elem)
			{
				if ($elem['name'] === $_POST['delete_name'])
				{
					unset($articles[$len]);
					$articles = array_merge($articles);
					file_put_contents("./bdd_articles.txt", serialize($articles));
					header('Location: gestion_admin.php?msg=20');
					exit();
				}
				$len++;
			}
		}
		header('Location: gestion_admin.php?msg=19');
		exit();
	}
}
else if ($_POST['cat_name'] != "")
{
	$tab['name'] = $_POST['cat_name'];
	$tab['img'] = $_POST['cat_url'];
	$len = 0;
	if (file_exists("bdd_categories.txt"))
	{
		$categorie_tab = unserialize(file_get_contents("./bdd_categories.txt"));
		if ($categorie_tab)
		{
			foreach($categorie_tab as $elem)
			{
				if ($elem['name'] === $_POST['cat_name'])
				{
					header('Location: gestion_admin.php?msg=13');
					exit();
				}
				$len++;
			}
		}
	}
	$categorie_tab[$len] = $tab;
	file_put_contents("./bdd_categories.txt", serialize($categorie_tab));
	header('Location: gestion_admin.php?msg=16');
	exit();
}
else if ($_POST['cat_modif_name'] != "" && $_POST['new_cat_name'])
{
	$len = 0;
	if (file_exists("bdd_categories.txt"))
	{
		$categorie_tab = unserialize(file_get_contents("./bdd_categories.txt"));
		if ($categorie_tab)
		{
			foreach($categorie_tab as $elem)
			{
				if ($elem['name'] === $_POST['cat_modif_name'])
				{
					$categorie_tab[$len]['name'] = $_POST['new_cat_name'];
					$categorie_tab[$len]['img'] = $_POST['cat_modif_url'];
					file_put_contents("./bdd_categories.txt", serialize($categorie_tab));				
					header('Location: gestion_admin.php?msg=15');
					exit();
				}
				$len++;
			}
			header('Location: gestion_admin.php?msg=14');
			exit();
		}
	}
}
else if ($_POST['cat_delete_name'] != "")
{
	$len = 0;
	if (file_exists("bdd_categories.txt"))
	{
		$categories = unserialize(file_get_contents("./bdd_categories.txt"));
		if ($categories)
		{
			foreach($categories as $elem)
			{
				if ($elem['name'] === $_POST['cat_delete_name'])
				{
					unset($categories[$len]);
					$categories = array_merge($categories);
					file_put_contents("./bdd_categories.txt", serialize($categories));
					header('Location: gestion_admin.php?msg=21');
					exit();
				}
				$len++;
			}
		}
		header('Location: gestion_admin.php?msg=15');
		exit();
	}
}
else if ($_POST['login_super_user'] != "")
{
	$len = 0;
	if (file_exists("bdd.txt"))
	{
		$users = unserialize(file_get_contents("./bdd.txt"));
		if ($users)
		{
			foreach($users as $elem)
			{
				if ($elem['login'] === $_POST['login_super_user'])
				{
					$users[$len]['rights'] = 1;
					file_put_contents("./bdd.txt", serialize($users));
					header('Location: gestion_admin.php?msg=22');
					exit();
				}
				$len++;
			}
		}
		header('Location: gestion_admin.php?msg=23');
		exit();
	}
}
include ("accueil.php");
if ($_GET['msg'] === "11")
	echo '<p class="error_msg">Wrong parameters</p>';
if ($_GET['msg'] === "12")
	echo '<p class="error_msg">Article already in base</p>';
if ($_GET['msg'] === "13")
	echo '<p class="error_msg">Categorie already in base</p>';
if ($_GET['msg'] === "14")
	echo '<p class="error_msg">This categorie does not exist</p>';
if ($_GET['msg'] === "15")
	echo '<p class="error_msg">Categorie modified</p>';
if ($_GET['msg'] === "16")
	echo '<p class="error_msg">Categorie added</p>';
if ($_GET['msg'] === "17")
	echo '<p class="error_msg">Article added</p>';
if ($_GET['msg'] === "18")
	echo '<p class="error_msg">Article modified</p>';
if ($_GET['msg'] === "19")
	echo '<p class="error_msg">This article does not exist</p>';
if ($_GET['msg'] === "20")
	echo '<p class="error_msg">Article deleted</p>';
if ($_GET['msg'] === "21")
	echo '<p class="error_msg">Categorie deleted</p>';
if ($_GET['msg'] === "22")
	echo '<p class="error_msg">Super user added</p>';
if ($_GET['msg'] === "23")
	echo '<p class="error_msg">This user does not exist</p>';
?>
<html>
	<body>
	<div class="formulaire">
		<br />
		<br />
		<p class="form_name"><u>Ajouter un article:</u></p>
		<form method="post">
		Nom de l'article: <input type="text" name="add_name" value="" />
		<br />
		Prix de l'article: <input type="text" name="add_price" value="" />
		<br />
		URL de l'image: <input type="text" name="add_url" value="" />
		<br />
		Categorie de l'article: <input type="text" name="add_categorie" value="" />
		<br />
		<input type="submit" name="submit_add" value="OK">
		</form>
	</div>
	<div class="formulaire">
		<br />
		<br />
		<p class="form_name"><u>Modifier un article:</u></p>
		<form method="post">
		Nom de l'article: <input type="text" name="modif_name" value="" />
		<br />
		Nouveau nom de l'article: <input type="text" name="new_name" value="" />
		<br />
		Prix de l'article: <input type="text" name="modif_price" value="" />
		<br />
		URL de l'image: <input type="text" name="modif_url" value="" />
		<br />
		Categorie de l'article: <input type="text" name="modif_categorie" value="" />
		<br />
		<input type="submit" name="submit_add" value="OK">
		</form>
	</div>
	<div class="formulaire">
		<br />
		<br />
		<p class="form_name"><u>Supprimer un article:</u></p>
		<form method="post">
		Nom de l'article: <input type="text" name="delete_name" value="" />
		<br />
		<input type="submit" name="submit_add" value="OK">
		</form>
	</div>
	<div class="formulaire">
		<br />
		<br />
		<p class="form_name"><u>Ajouter une catégorie:</u></p>
		<form method="post">
		Nom de la catégorie: <input type="text" name="cat_name" value="" />
		<br />
		URL de l'image: <input type="text" name="cat_url" value="" />
		<br />
		<input type="submit" name="submit_add" value="OK">
		</form>
	</div>
	<div class="formulaire">
		<br />
		<br />
		<p class="form_name"><u>Modifier une catégorie:</u></p>
		<form method="post">
		Nom de la catégorie: <input type="text" name="cat_modif_name" value="" />
		<br />
		Nouveau nom: <input type="text" name="new_cat_name" value="" />
		<br />
		URL de l'image: <input type="text" name="cat_modif_url" value="" />
		<br />
		<input type="submit" name="submit_add" value="OK">
		</form>
	</div>
	<div class="formulaire">
		<br />
		<br />
		<p class="form_name"><u>Supprimer une catégorie:</u></p>
		<form method="post">
		Nom de la catégorie: <input type="text" name="cat_delete_name" value="" />
		<br />
		<input type="submit" name="submit_add" value="OK">
		</form>
	</div>
	<?php if ($_SESSION['loggued_on_user'] === "admin")
	{?>
	<div class="formulaire">
		<br />
		<br />
		<p class="form_name"><u>Ajouter un super utilisateur:</u></p>
		<form method="post">
		Login de l'utilisateur: <input type="text" name="login_super_user" value="" />
		<br />
		<input type="submit" name="submit_add" value="OK">
		</form>
	</div>
	<p class="form_name"><u>Liste des commandes:</u></p>
	<?php
	}
	?>
	</body>
</html>