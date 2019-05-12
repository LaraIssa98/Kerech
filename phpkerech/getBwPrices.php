<?php
require('config.php');
$min=$_GET['q'];
$max=$_GET['w'];
$query="Select photo, if, product name, price from products where price Between ? and ?";
$stmt=$mysqli->prepare($query);
$stmt->bind_param('ii',$min,$max);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($photo, $id, $pname, $price);
echo "<div class='productRow'>";
   
require('getQueriedProducts.php');
?>