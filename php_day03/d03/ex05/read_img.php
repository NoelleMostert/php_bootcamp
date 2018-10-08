<?php
$file = '../img/42.png';

if ($file) {
    header('Content-Type: image/png');
    readfile($file);
    exit;
}
?>