<?php 
require("config.php");


	
$username = $_POST["user"];
$password = $_POST["pass"];
$query = "SELECT id_employee,password FROM Employees WHERE id_employee=? AND password=?";

$exist=$mysqli->prepare($query);
$exist->bind_param('is', $username, $password);
$exist->execute();
$exist->store_result();
$size = $exist->num_rows;
$exist->bind_result($username,$password);
$exist->fetch();

if($size==1){
	session_start();
	$_SESSION['username']=$username;
	header("location:empManage.php");
}
else{
	header("location:empLogin.html");
	$mysqli.close();
	exit();
}




?>