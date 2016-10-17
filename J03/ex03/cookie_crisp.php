<?php

$action = $_GET['action'];
$name = $_GET['name'];
$value = $_GET['value'];

if ($action === "set")
	setcookie($name, $value);
else if ($action === "get")
{
	echo $_COOKIE["$name"];
	if ($_COOKIE["$name"])
		echo "\n";
}
else if ($action === "del")
	setcookie($name, "", time(now));
?>
