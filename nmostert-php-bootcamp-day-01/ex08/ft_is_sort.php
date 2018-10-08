<?php
function ft_is_sort($sort)
{
$default = $sort;
sort($sort);

$flag = true;
foreach($sort as $key=>$value)
	{
		if($value!=$default[$key])
			$flag = false;
	}
if ($flag == true)
	return ($flag);

$reverse = $default;
rsort($reverse);
$flag = true;
foreach($reverse as $key=>$value)
	{
		if($value!=$default[$key])
			$flag = false;
	}
	return ($flag);
}
?>