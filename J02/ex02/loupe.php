#!/usr/bin/php
<?php

function uppercase($matches)
{
	$matches[0] = strtoupper($matches[0]);
	return ($matches[0]);
}

function replace($match)
{
	$match[0] = preg_replace_callback("/(?<=title=\")(.*)\"|>(.*?)<|/", 'uppercase', $match[0]);
	return ($match[0]);
}

if ($argc != 2)
	return ;

$str = file_get_contents($argv[1]);
$str = preg_replace_callback("/<a.*?\/a>/", 'replace', $str);
echo $str;

?>
