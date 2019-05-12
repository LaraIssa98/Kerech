<?php
require('config.php');
$brand=$_GET['q'];
$stmt = $mysqli->prepare("SELECT photo, products_id, product_name,price FROM products where brand_name=?");
$stmt->bind_param('s',$brand);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($photo, $id, $pname, $price);

echo "<div class='productRow'>";
   
require('getQueriedProducts.php');
?>