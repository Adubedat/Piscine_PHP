<?php
session_start();
$_SESSION['loggued_on_user'] = "";
$_SESSION['state'] = "";
$_SESSION['panier']['liste']= "";
header('Location: index.php');
?>