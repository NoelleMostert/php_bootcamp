#!/usr/bin/php
<?php
function	ft_do_op($argv, $n1, $n2)
{
	$result = 0;
	if ($argv == '+')
		$result = $n1 + $n2;
	else if ($argv == '-')
		$result = $n1 - $n2;
	else if ($argv == '*')
		$result = $n1 * $n2;
	else if ($argv == '/')
		$result = $n1 / $n2;
	else if ($argv == '%')
		$result = $n1 % $n2;
	return ($result);
}
if ($argc == 4 && is_numeric($argv[1]) && is_numeric($argv[3]))
	{		
		$n1 = $argv[1];
		$n2 = $argv[3];
		$n3 = trim($argv[2]);
		$result = ft_do_op($n3, $n1, $n2);
		print($result."\n");
	}
else
	print("Incorrect Parameters\n");
?>
