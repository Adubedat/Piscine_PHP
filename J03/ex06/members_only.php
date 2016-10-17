<?php
$user = $_SERVER['PHP_AUTH_USER'];
$password = $_SERVER['PHP_AUTH_PW'];
if ($user === "zaz" && $password === "jaimelespetitsponeys")
{
	$img = file_get_contents("../img/42.png");
	$img = base64_encode($img);
	echo "<html><body>\nBonjour Zaz<br />\n<img src='data:image/png;base64,$img'>\n</body></html>\n";
}
else
{
	header('WWW-Authenticate: Basic realm=\'\'Espace membres\'\'');
	header('Connection: close');
	echo "<html><body>Cette zone est accessible uniquement aux membres du site</body></html>\n";
}
?>
