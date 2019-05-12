<?php
require('config.php');


$stmt = $mysqli->prepare("SELECT photo, products_id, product name,price FROM products");
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($photo, $id, $pname, $price);

echo "<div class='productRow'>";
   
require('getQueriedProducts.php');

?>


