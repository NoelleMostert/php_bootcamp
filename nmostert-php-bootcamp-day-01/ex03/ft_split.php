<?php
function ft_split($str)
{
	$last = preg_replace("([ ]+)", " ", trim($str));
	$array = explode(" ", $last);
	sort($array, SORT_STRING);
	return($array);
}
?>
