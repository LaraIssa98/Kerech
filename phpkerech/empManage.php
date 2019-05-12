<?php 
session_start();
if(!isset($_SESSION['username'])){
  header("location:login.html");
}

require('config.php');
$user=$_SESSION['username'];
$date=date('d/m/y');

$query="SELECT O.id_cart, C.Users_username, A.city,A.country,A.street,A.state from Addresses A, Users U, Orders O,Employees E, Cart C where E.id_employee=? AND E.id_employee=O.Employees_id_employee AND O.id_cart=C.cart_id AND C.Users_username=U.username AND U.ip_address=A.ip_address AND O.dateDelivered=?"  ;
$stmt=$mysqli->prepare($query);
$stmt->bind_param('is',$user,$date);
$stmt->execute();
$stmt->bind_result($cart,$un,$c,$co,$street,$state);




?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>eBUY - Home</title>
<link href="eCommerceAssets/styles/eCommerceStyle.css" rel="stylesheet" type="text/css">

<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/montserrat:n4:default;source-sans-pro:n2:default.js" type="text/javascript"></script>
<script src="js/prototype.js"> </script>



</head>

<body>
  
<div id="mainWrapper">
  
  <header> 
    <!-- This is the header content. It contains Logo and links -->
    <div id="logo"> <!-- <img src="logoImage.png" alt="sample logo"> --> 
      <!-- Company Logo text --> 
    TREK </div>
    <div id="headerLinks"><a href="logout.php">Logout</a></div>
  </header>
  <section id="offer"> 
    <!-- The offer section displays a banner text for promotions -->
    <h2></h2>
    <p>Employee Manage Page</p>
    
    
  </section>
  <div id="content">
    <section class="sidebar"> 
      <!-- This adds a sidebar with 1 searchbox,2 menusets, each with 4 links -->
      <div id="menubar">
        <nav class="menu">
          <h2><!-- Title for menuset 1 -->MENU ITEM 1 </h2>
          <hr>
          <ul>
            <!-- List of links under menuset 1 -->
            <li><a href="#" title="Link" id="brand1">All Orders</a></li>
            <li><a href="#" title="Link" id="brand2">My orders</a></li>
            </ul>
        </nav>
        <nav class="menu">
          <h2>MENU ITEM 2 </h2>
          <!-- Title for menuset 2 -->
          <hr>
          <ul>
            <!--List of links under menuset 2 -->
            
            <li class="notimp"><!-- notimp class is applied to remove this link from the tablet and phone views --><a href="#" title="Link">Link 4</a></li>
          </ul>
        </nav>
      </div>
    </section>
    <section class="mainContent" id="mainsec">
      <h2> Today's Deliveries </h2>
      <table class="CSSTableGenerator">
        <tr>
        <td><b>Cart id</b></td> 
        <td><b>username</b></td>
          <td><b>city</b></td>
          <td><b>country</b></td>
          <td><b>Street</b></td>
          <td><b>State</b></td>
          </tr>
     <?php while($stmt->fetch()){ ?>
            <tr>
        <td>"<?php echo $cart?>"</td> 
        <td>"<?php echo $un?>"</td>
          <td>"<?php echo $c?>"</td>
          <td>"<?php echo $co?>"</td>
          <td>"<?php echo $street?>"</td>
          <td>"<?php echo $state?>"</td>
          </tr>
       <?php } ?>
</table>

<h2> All My Deliveries </h2>
<table>
        <tr>
        <td><b>Cart id</b></td> 
        <td><b>username</b></td>
          <td><b>city</b></td>
          <td><b>country</b></td>
          <td><b>Street</b></td>
          <td><b>State</b></td>
          </tr>
     <?php
      $query3="SELECT O.id_cart, C.Users_username, A.city,A.country,A.street,A.state from Addresses A, Users U, Orders O,Employees E, Cart C where E.id_employee=? AND E.id_employee=O.Employees_id_employee AND O.id_cart=C.cart_id AND C.Users_username=U.username AND U.ip_address=A.ip_address";
      $stmt3=$mysqli->prepare($query3);
      $stmt3->bind_param('i',$user);
      $stmt3->execute();
      $stmt3->bind_result($cart,$un,$c,$co,$street,$state);
      while($stmt3->fetch()){ ?>
            <tr>
        <td>"<?php echo $cart?>"</td> 
        <td>"<?php echo $un?>"</td>
          <td>"<?php echo $c?>"</td>
          <td>"<?php echo $co?>"</td>
          <td>"<?php echo $street?>"</td>
          <td>"<?php echo $state?>"</td>
          </tr>
       <?php } $stmt3->close(); ?>
</table>
      
	  <!-- USE AJAX TO WRITE CONTENT OF ALL ORDERS EVER BASED ON TIME OF ORDER
	  CREATE QUERIES FOR AN EMPLOYEE TO CLAIM AN ORDER
	  CONFIRM ORDER DONE 
	  1 - FIX DB 
	  2 - WRITE QUERIES
	  3 - IMPLEMENT QUERIES
	  4 - DATA ENTRY
	  5 - EMAIL CONF
	  6 - TEST 
	  -->
	  
	  
    </section>
  </div>
  <footer> 
    <!-- This is the footer with default 3 divs -->
    <div>
      <p> SORI.</p>
    </div>
    <div>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam varius sem neque. Integer ornare.</p>
    </div>
    <div class="footerlinks">
      <p><a href="#" title="Link">Link 1 </a></p>
      <p><a href="#" title="Link">Link 2</a></p>
      <p><a href="#" title="Link">Link 3</a></p>
    </div>
  </footer>
</div>
<script>
  /*
   document.observe('dom:loaded',function(){
    global var user=php shit
    
    //display all orders
    $('brand1').observe('click',function(){
    
    new Ajax.Request("getAllOrders.php",{
      method:"GET",
      onSuccess: function(response){
        $('mainsec').innerHTML=response.responseText;
      }
      })
    })
      //display orders for specific user
    $('brand2').observe('click',function(){
      new Ajax.Request("getMyOrders.php?q="+user,{
      method:"GET",
      onSuccess:function(response){
        $('mainsec').innerHTML=response.responseText;
      }  
      })
    }) 
    
     
    })
  
  
  
  </script>


</body>
</html>