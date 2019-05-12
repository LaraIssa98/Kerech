<?php
require('config.php');
//double check if shld be post orget
$pid=$_GET['q'];
$u=$_GET['w'];
//update quantity and insert into cart
$query="UPDATE Products SET quantity=quantity-1 WHERE products_id=?";
$stmt=$mysqli->prepare($query);
$stmt->bind_param('i',$pid);

$stmt->execute();
$stmt->close();

$quan=0;
$query="DELETE FROM products WHERE quantity=?";
$stmt2=$mysqli->prepare($query);
$stmt2->bind_param('i',$quan);
$stmt2->execute();
$stmt2->close();
//fix dis
$stmt3 = $mysqli->prepare("INSERT into Cart_has_products(cart_id,products_id) VALUES ( (Select cart_id from cart where Users_username=?), ?)");
$stmt3->bind_param('si',$u,$pid);
$stmt3->execute();
$stmt3->close();

?>


