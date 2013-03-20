<?php
// connect to database
$dbhost = 'localhost';
$dbuser = 'recepcion';
$dbpass = '-*/763456recepcion';
$dbname = 'recepcion';

$conn = mysql_connect($dbhost, $dbuser, $dbpass);
mysql_select_db($dbname);

?>