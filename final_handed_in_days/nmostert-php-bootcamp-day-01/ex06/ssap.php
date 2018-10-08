#!/usr/bin/php
<?php

$var = array();
$i = 1;
$j = 0;
$ret;

while ($i < $argc)
{
	$ret = strtok($argv[$i], " ");
	while ($ret != false)
	{
		$var[$j++] = $ret;
		$ret = strtok(" ");
	}
	$i++;
}
$i = 0;
sort($var);
while($i < $j)
{
	print("$var[$i]\n");
	$i++;
}
?>