<?php
require('config.php');

$q=$_GET['q'];
//fix
$stmt = $mysqli->prepare("SELECT p.products_id, p.product_name, p.price FROM products p, Users u,Cart c, Cart_has_products cp where u.username=? and c.Users_username=u.username  and c.cart_id=cp.cart_id and cp.products_id=p.products_id");

$stmt->bind_param('s',$q);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($pid, $pname, $price);
$totalp=0;
echo"<h2> Cart </h2> <table> 
<tr>
<td><b> Product ID </b></td>
<td><b> Product Name </b></td>
<td><b> Price </b></td></tr>";
while($stmt->fetch()){
	$totalp+=$price;
	echo"<tr><td>".$pid."</td>
	<td>".$pname."</td>
	<td>".$price."</td> </tr>";
	
}
echo "<tr>
<td> - </td>
<td> Total price </td>
<td>".$totalp."</td></tr></table>";
echo"<input type='button' name='button' value=".$q." class='buyButton' onclick='checkOut(this.value)'>";
   
?>


