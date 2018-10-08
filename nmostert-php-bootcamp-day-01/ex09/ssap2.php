#!/usr/bin/php
<?php

function value($c1)
{
    $val = ord($c1);
    $val += ctype_lower($c1) ? -32 : 0;
    $val += ctype_alnum($c1) ? -1000 : 0;
    $val += ctype_alpha($c1) ? -1000 : 0;
    return($val);
}

function cmp($s1, $s2)
{
    $s1 .= "\0";
    $s2 .= "\0";
    $i = 0;
    while ($s1[$i] != "\0" && $s2[$i] != "\0")
    {
        if (!(strcasecmp($s1[$i], $s2[$i])))
            $i++;
        else
        {
            return value($s1[$i]) - value($s2[$i]);
        }
    }
    return value($s2[$i]) - value($s1[$i]);
}

$special = array();
$string = array();
unset($argv[0]);
$str = join(" ", $argv);
$array = array();
    $temp = trim($str);
    $temp = explode(" ", $temp);
    foreach ($temp as $val)
    {
        if (!(empty($val)))
            $array[] = $val;
    }
usort($array, "cmp");
foreach ($array as $print)
    echo $print."\n";
?>