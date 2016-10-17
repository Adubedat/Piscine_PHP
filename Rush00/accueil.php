<?php
session_start();
?>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Super 42 Café</title>
		<link rel="stylesheet" href="index.css" />
	</head>
	<body>
		<div id="header">
			<div id="accueil" class="inline_block"><a href="index.php"><img id="accueil_img" src='http://www.sothink.com/page/images/cafe-logo-3.gif' /></a></div>
			<div id="right_buttons" class="inline_block">
			<?php
			if ($_SESSION['loggued_on_user'] !== "")
				echo '<a href="account.php"><div id="account" class="inline_block"><p id="user_name">'.$_SESSION['loggued_on_user'].'</p></div></a>';
			else
				echo '<a href="inscription.php"><img id="inscription_img" src="http://www.assisesdelaterre.com/wp-content/uploads/sites/4/2015/06/Bouton-sinscrire-436.png"/></a>';
			?>			
			<a href="panier.php"><img id="panier_img" src='http://image.flaticon.com/icons/png/512/2/2772.png' /></a>
			<?php
			if ($_SESSION['state'] === 'log')
				echo "<div id='log'><a href='deconnexion.php'><img id='log_img' src='http://www.clker.com/cliparts/9/6/0/5/1194983927973663421io_anthony_liekens_01.svg.med.png' /></a></div>";
			else
				echo '<div id="log"><a href="connexion.php"><img id="log_img" src="https://cdn1.iconfinder.com/data/icons/windows-8-metro-style/512/login.png"/></a></div>';
			?>
			</div>
		</div>
	</body>
</html>