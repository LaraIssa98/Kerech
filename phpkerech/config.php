<?php
$mysql_host = "localhost";
$mysql_db = "dbproj";
$mysql_user = "root";
$mysql-password= " ";

$mysqli = mysqli_connect($mysql_host, $mysql_user, "", $mysql_db);
if (mysqli_connect_errno())
{
	print("Connect failed: ". mysqli_connect_error());
	exit();
}







?>