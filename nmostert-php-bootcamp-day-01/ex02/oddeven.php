#!/usr/bin/php
<?php
	while (1)
	{
		print "Enter a number: ";
		$line = fgets(STDIN);
		if($line == NULL)
		{
			print("^D\n");
			break ;
		}
		$line = trim($line);
		if (!(is_numeric($line)))
			print("'$line' is not a number\n");
		elseif ($line % 2 == 0)
			print("The number $line is even\n");
		else if ($line % 2 != 0)
			print("The number $line is odd\n");
	}
?>