<?php
	if (!file_exists("commande.txt"))
		fopen("commande.txt", "w+");
	if (!file_exists("bdd.txt"))
	{
		fopen("bdd.txt", "w+");
	}
?>