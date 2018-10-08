#!/usr/bin/php
<?php
$argv[1] = preg_replace('/\s+/', ' ', $argv[1]);
if ($argc > 1)
	print(trim($argv[1])."\n");
?>