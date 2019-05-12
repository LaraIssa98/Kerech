<?php 
 require('config.php');
 $user=$_GET['q'];
 
$stmt = $mysqli->prepare("SELECT u.username, u.first_name, u.last_name, u.birthdate, u.sex, a.city, a.country, a.postal_code, a.state, a.street FROM Users u, Addresses a where username=? and u.ip_address=a.ip_address");
$stmt->bind_param('s',$user);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($un, $fn, $ln, $bd,$s,$c,$co,$po,$s,$str);
 
 echo "<div class='CSSTableGenerator'>
 <table >
 <tr>
 <td><b>Username</b></td> 
 <td><b>First Name</b></td>
  <td><b>Last Name</b></td>
  <td><b>D.O.B</b></td>
   <td><b>Sex</b></td>
  <td><b>City</b></td>
   <td><b>Country</b></td>
  <td><b>Po Code</b></td>
  <td><b>State</b></td>
  <td><b>Street</b></td>
  </tr> ";
 while($stmt->fetch()){
	 echo "<tr><td>".$un."</td> 
 <td>".$fn."</td>
  <td>".$ln."</td>
  <td>".$bd."</td>
   <td>".$s."</td>
  <td>".$c."</td>
   <td>".$co."</td>
  <td>".$po."</td>
  <td>".$s."</td>
    <td>".$str."</td>
	</tr>
	 ";	 
	 
 }
 echo "</table></div>";
 
?>