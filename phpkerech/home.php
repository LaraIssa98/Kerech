<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['username'])){
  header("location:login.html");
}

require('config.php');

$stmt = $mysqli->prepare("SELECT photo, products_id, product_name,price FROM products order by rand() limit 50");
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($photo, $id, $pname, $price);


$user=$_SESSION['username'];
$stmt2 = $mysqli->prepare("SELECT up.brand_name from users_preferences up, brands b, users u where u.username=? and u.username=up.Users_username limit 3");
$stmt2->bind_param('s',$user);
$stmt2->execute();
$stmt2->store_result();
$stmt2->bind_result($bname);


$stmt3=$mysqli->prepare("SELECT distinct categories from products");
$stmt3->execute();
$stmt3->store_result();
$stmt3->bind_result($cat);


?>



<html>
<head>
<meta charset="utf-8">
<title>eBUY - Home</title>
<link href="eCommerceAssets/styles/eCommerceStyle.css" rel="stylesheet" type="text/css">

<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/montserrat:n4:default;source-sans-pro:n2:default.js" type="text/javascript"></script>
<script src="js/prototype.js"></script>
<script>
  
  function showProducts(str) 
  {
                if (str == "") {
                    document.getElementById("mainsec").innerHTML = "";
                    return;
                } else {
                    if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    } else {
                        // code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function() {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            document.getElementById("mainsec").innerHTML = xmlhttp.responseText;
                        }
                    }
                    xmlhttp.open("GET", "getSearchingProducts.php?q=" + str, true);
                    xmlhttp.send();
                }
            }
            
  function showBrandProd(str) 
  {
                if (str == "") {
                    document.getElementById("mainsec").innerHTML = "";
                    return;
                } else {
                    if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    } else {
                        // code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function() {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            document.getElementById("mainsec").innerHTML = xmlhttp.responseText;
                        }
                    }
                    xmlhttp.open("GET", "brandQuery.php?q=" + str, true);
                    xmlhttp.send();
                }
            }          
   function showUserInfo(str) 
  {
                if (str == "") {
                    document.getElementById("mainsec").innerHTML = "";
                    return;
                } else {
                    if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    } else {
                        // code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function() {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            document.getElementById("mainsec").innerHTML = xmlhttp.responseText;
                        }
                    }
                    xmlhttp.open("GET", "getUserInfo.php?q=" + str, true);
                    xmlhttp.send();
                }
            }              
    
    function showCart(str) 
  {
                if (str == "") {
                    document.getElementById("mainsec").innerHTML = "";
                    return;
                } else {
                    if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    } else {
                        // code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function() {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            document.getElementById("mainsec").innerHTML = xmlhttp.responseText;
                        }
                    }
                    xmlhttp.open("GET", "getUserCart.php?q=" + str, true);
                    xmlhttp.send();
                }
            }
    function addToCart(str,str2){
            if (str == "") {
                          document.getElementById("mainsec").innerHTML = "";
                          return;
                      } else {
                          if (window.XMLHttpRequest) {
                              // code for IE7+, Firefox, Chrome, Opera, Safari
                              xmlhttp = new XMLHttpRequest();
                          } else {
                              // code for IE6, IE5
                              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                          }
                          
                          xmlhttp.open("GET", "addToCart.php?q=" + str + "&w="+str2, true);
                          xmlhttp.send();
                          alert("Item added to cart!");
                      }
    }                    
    function checkOut(str) 
  {
                if (str == "") {
                    document.getElementById("mainsec").innerHTML = "";
                    return;
                } else {
                    if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    } else {
                        // code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                     xmlhttp.onreadystatechange = function() {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            document.getElementById("mainsec").innerHTML = xmlhttp.responseText;
                        }
                    }
                    
                    xmlhttp.open("GET", "purchase.php?q=" + str, true);
                    xmlhttp.send();
                   
                }      
  }         
  function showCat(str) 
  {
                 if (str == "") {
                    document.getElementById("mainsec").innerHTML = "";
                    return;
                } else {
                    if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    } else {
                        // code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function() {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            document.getElementById("mainsec").innerHTML = xmlhttp.responseText;
                        }
                    }
                    xmlhttp.open("GET", "getCat.php?q=" + str, true);
                    xmlhttp.send();
                }
  }         
  
  </script>

</head>

<body>
  
<div id="mainWrapper">
  
  <header> 
    <!-- This is the header content. It contains Logo and links -->
    <div id="logo"> 
      <!-- Company Logo text --> 
      TREK </div>
    <div id="headerLinks"><a href="logout.php"> Logout </a><a href="home.php"> Home</a><a href="#" title="userInfo" id='uinfo' onclick="showUserInfo(this.innerHTML)"><?php echo $_SESSION['username']?></a><a href="#" id="cart" title=<?php echo $_SESSION['username']?> onclick="showCart(this.title)"><?php echo $_SESSION['username'].' \'s ';   ?>Cart</a></div>
  </header>
  <section id="offer"> 

    <h2>Welcome!</h2>
    <p>Enjoy browsing!</p>
  </section>
  <div id="content">
    <section class="sidebar"> 
      <!-- This adds a sidebar with 1 searchbox,2 menusets, each with 4 links -->
      <input type="text"  id="search" value="" placeholder="search" onkeyup="showProducts(this.value);">
      <div id="menubar">
        <nav class="menu" id="nav1">
          <h2>Insert Price Range:</h2>
          <input type="number" id="from" placeholder="from"  onkeyup="showPricePref();">
          <input type="number" id="to" placeholder="to"   onkeyup="showPricePref();">

          
          
          </nav>
        <nav class="menu">
          <h2>Preferred Brands </h2>

          <hr>
          <ul>
            <?php 
            while($stmt2->fetch()){
              ?>
              <li><a href='#' title='Link' id='brand1' class='links1' onclick="showBrandProd(this.innerHTML);"><?php echo $bname?></a></li>
              
            <?php } ?> 
            </ul> 
            
            <?php
             $stmt2->close();
              ?>
              <h2> Category Search </h2>
              <hr>
              <ul>
                
            <?php
            while($stmt3->fetch()){?>
              <li><a href='#' title='Link' id='cat1' class='links1' onclick="showCat(this.innerHTML);"><?php echo $cat?></a></li>
           <?php }
            ?>
            
          </ul>
          </nav>
        </nav>
      </div>
    </section>
    <section class="mainContent" id="mainsec">
   <div class='productRow'>
    <?php
    
    $count=0;
    while($stmt->fetch())
    { 
      
   $count++;
  if($count==3){
    $count=0;
     ?>
   </div>
    <div class='productRow'>
   
  
 <?php  } ?>
  <article class='productInfo'>
  <div><img  src=<?php echo"'". $photo."'" ?> alt=<?php echo"'".$id."'"; ?>></div>
  <p class='price'><?php echo"$".$price; ?></p>
 <p class='productContent'><?php echo $pname; ?></p>
  <input type='button' name='button' value='Buy' class='buyButton' onclick="addToCart(<?php echo"'".$id."'"; ?>,<?php echo "'".$user."'";  ?>)">
  </article>
      
 <?php  } ?>
   
   <?php
    $stmt->close();
    ?>
    
    </section>
  </div>
  <footer> 
    <!-- This is the footer with default 3 divs -->
    <div>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam varius sem neque. Integer ornare.</p>
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
  
  document.observe('doc:loaded',function(){
    global var user=$('uinfo').innerHTML;
    //create as we go
    new Ajax.Request("getAllProducts.php",{
    method:"GET",
    onSuccess: function(response){
      $('mainsec').innerHTML=response.responseText;
    },
    onFailure: function(response){
      alert("lol fail get rekt");
    }
  });
  //show brand preferences
  new Ajax.Request("getBrandPref.php?q="+user,{
    method:"GET",
    onSuccess: function(response){
      $('nav1').innerHTML+=response.responseText;
    }
  });
  
  
    
    //keyword search ajax
    $('search').observe('change',function(str){
      new Ajax.Request("getSearchingProducts.php?q="+str,{
        method="GET",
        onSuccess: function(response){
           $('mainsec').innerHTML=response.responseText;
        }
         onFailure: function(response){
      alert("lol fail get rekt");
      })
    });
    //opening cart
    
    $('cart').observe('click',function(){
      new Ajax.Request("getUserCart.php?q="+user,{
        method:"GET",
        onSuccess: function(response){
          $('mainsec').innerHTML=response.responseText;
        }
        onFailure: function(response){
         alert("lol fail get rekt");
        
      })
    });*/
    //adding to cart
    window.onload=function(){
      
    
   var b1=$('from').value;
    var b2=$('to').value;
    b1.addEventListener('keyup',showPricePref,false);
        b2.addEventListener('keyup',showPricePref,false);
      }
      
    }
    function showPricePref() 
  {
    var str=$('from').value;
    var str2=$('to').value;
                if (str == "") {
                    document.getElementById("mainsec").innerHTML = "";
                    return;
                } else {
                    if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    } else {
                        // code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function() {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            document.getElementById("mainsec").innerHTML = xmlhttp.responseText;
                        }
                    }
                    xmlhttp.open("GET", "getUserInfo.php?q=" + str+"&w="+str2, true);
                    xmlhttp.send();
                }
            }              
      /*
      current.observe('click',function(){
        //parent
        var parent=current.parentNode;
        var children=parent.childNodes;
        var id=children[0].childNodes[0].alt;
        new Ajax.Request("addToCart.php",{
          method:"POST",
          postbody:"id="+id+"user="+user;
          onSuccess:function(response){
            alert("Item added to cart!");
          }
        })
      })
    }
  //brand searches based on preferences
  global var links=$$(.links1);
  for(var j=0;j<links.length;j++){
    var currentLink=links[j];
    currentLink.observe('click',function(){
      var currentBrand=currentLink.innerHTML;
      new Ajax.Request("brandQuery.php?q="+currentBrand,{
        method:"GET",
        onSuccess:function(response){
          $('mainsec').innerHTML=response.responseText;
        }
      })
    })
  }
  
      //user info
      $('uinfo').observe('click',function(){
        new Ajax.Request("getUserInfo.php?q="+user,{
          method:"GET",
          onSuccess:function(response){
            
            $('mainsec').innerHTML=response.responseText;
          }
        })
      })
      
      //get products bw two prices
      $('sub').observe('click',function(){
        var min=$('from').value;
        var max=$('to').value;
        new Ajax.Request("getBwPrices.php",{
          method:"GET",
          postBody:"min="+min+"max="+max;,
          onSuccess: function(response){
            $('mainsec').innerHTML=response.responseText;
          }
        })
      })
    
   
  });
 </script> 

</body>
</html>
