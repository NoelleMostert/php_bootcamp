<?php
session_start();
echo (($_SESSION["logged_on_user"]) && $_SESSION["logged_on_user"] != "") ? $_SESSION["logged_on_user"] ."\n" : "ERROR\n";
?>