<?php
$host = "localhost";
$user = "root";
$pass = "3gsimplified";

$connect = mysql_connect($host,$user,$pass) or die(mysql_error());
$db = mysql_select_db("mtc",$connect) or die(mysql_error());
if($connect)
	echo "connection established";
else
	echo "try again";
?>
