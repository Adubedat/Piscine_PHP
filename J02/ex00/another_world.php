#!/usr/bin/php
<?php

$str = $argv[1];
$str = trim($str);
$str = preg_replace("/[ \t]+/", " ", $str);
echo $str."\n";

?>
