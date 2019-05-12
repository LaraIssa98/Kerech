<?php
require('config.php');

$q=$_GET['q'];

$str = "%". $q . "%";
$stmt = $mysqli->prepare("SELECT photo,products_id, product_name, price FROM products where product_name like ?");
$stmt->bind_param('s',$str);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($photo, $id, $pname, $price);

echo "<div class='productRow'>";
   
require('getQueriedProducts.php');

?>


