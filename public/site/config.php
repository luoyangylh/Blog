<?php
$host='127.0.0.1';
$user='root';
$pass='luoyang';
$db='timeline';
	
$con = mysql_connect($host, $user, $pass) or die(mysql_error() . 'Oops! there is a problem connecting to database');
mysql_select_db($db, $con) or die('Error selecting database '. mysql_error());
?>

