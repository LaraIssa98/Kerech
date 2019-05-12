<?php
require('config.php');
$user=$_GET['q'];

$stmt2 = $mysqli->prepare("SELECT up.brand_name from Users_preferences up, Brands b, Users u where u.username=? and u.username=up.Users_username");
$stmt2->bind_param('s',$user);
$stmt2->execute();
$stmt2->store_result();
$stmt2->bind_result($bname);
echo "<h2>Preferred Brands</h2>
          <hr>
          <ul>";
            
         
while($stmt2->fetch()){
	echo "<li><a href='#' title='Link' id='brand1' class='links1'>".$bname."</a></li>";
}
echo "</ul> </nav>";

$stmt2->close();


?>