<?php 
require('config.php');
$q=$_GET['q'];
$stmt=$mysqli->prepare("SELECT photo,products_id, product_name, price FROM products where categories=?");

$stmt->bind_param('s',$q);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($photo, $id, $pname, $price);

echo "<div class='productRow'>";
   
require('getQueriedProducts.php');

?>