<?php
if($_SERVER['PHP_AUTH_USER'] != NULL && $_SERVER['PHP_AUTH_USER'] != "zaz" && $_SERVER['PHP_AUTH_PW'] != "Ilovemylittlepony" )
{
    $_SERVER['PHP_AUTH_USER'] = NULL;
    $_SERVER['PHP_AUTH_PW'] = NULL;
}
if (!($_SERVER['PHP_AUTH_USER'])){
	header('WWW-Authenticate: Basic realm="Members Only"');
	header('HTTP/1.0 401 Unauthorized');
	echo 'You have cancelled this action';
	exit;
}
else if($_SERVER['PHP_AUTH_USER'] == "zaz" && $_SERVER['PHP_AUTH_PW'] == "Ilovemylittlepony")
{
    header('Content-Type: text/html');
   echo "<html><body>\nHello Zaz<br />\n<img src='data:image/png;base64,";
   echo base64_encode(file_get_contents("../img/42.png", "png"));
   echo "'>\n</body></html>\n";
}    else
    {
    header('HTTP/1.0 401 Unauthorized');
    header('WWW-Authenticate: Basic realm="Members Only"');
    exit;
    }
?>