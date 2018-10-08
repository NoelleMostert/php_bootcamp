#!/usr/bin/php
<?php

$var = array();
$i = 1;
$j = 0;
$ret;

if ($argc > 1)
{
	$ret = strtok($argv[1], " ");
	while ($ret != false)
	{
		$var[$j++] = $ret;
		$ret = strtok(" ");
	}
}
$i = 1;
while($i < $j)
{
	print("$var[$i]\n");
	$i++;
}
if ($argc > 1)
	print("$var[0]\n")
?>