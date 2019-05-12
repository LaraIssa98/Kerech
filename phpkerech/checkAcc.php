<?php

require("config.php");

$q=$_GET['q'];

$stmt = $mysqli->prepare("SELECT username FROM users WHERE username = ? ");
$stmt->bind_param('s', $q);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($username, $password);
$size=$stmt->num_rows();

if($size==1){
	echo "<p> Username unavailable. Try another </p>";
}
else {
	echo "<p> Username available </p>";
}

$stmt->close();
?>