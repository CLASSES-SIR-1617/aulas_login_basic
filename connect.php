<?php
$userdb = "php";
$passdb = "php";
$hostdb = "localhost";
$namedb = "ex_login";


$dbconn = new mysqli($hostdb,$userdb,$passdb,$namedb);

if ($dbconn->connect_error) {
	// erro
	die("azar!!!");
}

?>