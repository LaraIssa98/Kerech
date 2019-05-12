<?php
require('config.php');
$user=$_GET['q'];
$date=date('dd/mm/yyyy');
$query="SELECT O.id_cart, C.username, A.city,A.country,A.street,A.state from Addresses A, Users U, Orders O,Employees E, Cart C where E.id_employee=? AND E.id_employee=O.Employees_id_employee AND O.id_cart=C.cart_id AND C.Users_username=U.username AND U.ip_address=A.ip_address AND O.dateDelivered=?"  ;
$stmt=$mysqli->prepare($query);
$stmt->bind_param('sd',$user,$date);
$stmt->execute();
$stmt->bind_result($cart,$un,$c,$co,$street,$state);

echo"<h2> Today's Deliveries </h2>
<table>
 <tr>
 <td><b>Cart id</b></td> 
 <td><b>username</b></td>
  <td><b>city</b></td>
  <td><b>country</b></td>
   <td><b>Street</b></td>
  <td><b>State</b></td>
  </tr>";

while($stmt->fetch()){
	echo"<tr>
 <td>".$cart."</td> 
 <td>".$un."</td>
  <td>".$c."</td>
  <td>".$co."</td>
   <td>".$street."</td>
  <td>".$state."</td>
  </tr>";
}
echo "</table>";
//query to get current employees orders
//remove orders with delivery date of yesterday
//write query to assign order jobs in cart page


?>