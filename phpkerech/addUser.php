<?php
	session_start();
	ob_start();
	require("config.php");
	
	
	
	if(isset($_POST['new_fn'])){
	$fn=$_POST['new_fn'];	
	}
	else{
		echo "ERROR IEUDN";
	}
	
	$ln=$_POST['new_ln'];
	$em= $_POST["new_em"];
	$un= $_POST["new_un"];
	$pw= $_POST["new_pw"];
	$dob= $_POST["dob"];
	$sn= $_POST["new_sn"];
	$t= $_POST["new_t"];
	$r= $_POST["new_r"];
	$cnt= $_POST["new_cnt"];
	$pn= $_POST["new_pn"];
	$po=$_POST["new_po"];
	$g= $_POST["gender"];

	$q3="Select count(*) from addresses";
	$ss=$mysqli->prepare($q3);
	$ss->execute();
	$ss->store_result();
	$ss->bind_result($num);
	while($ss->fetch()){
		$num1=$num;
	}
	$num2=$num1+1;

	$ss->close();
	
	$query="INSERT into addresses(city, country, postal_code, state, street) values(?,?,?,?,?)";
	$stmt=$mysqli->prepare($query);
	$stmt->bind_param('ssiss',$t,$cnt,$po,$r,$sn);
	$stmt->execute();
	$stmt->close();
	
	//AJAX FOR USERNAME CHECK IN DB
	
	$query="INSERT INTO Users(username, first_name,last_name,birthdate, sex, ip_address, phone, email, password) VALUES(?,?,?,?,?,?,?,?,?)";
	$insert=$mysqli->prepare($query);
	$insert->bind_param('sssssisss',$un,$fn,$ln,$dob,$g,$num2,$pn,$em,$pw);
	$insert->execute();

	
	$query2="Insert into users_preferences(Users_username, brand_name) values(?,?)";
	$stat=$mysqli->prepare($query2);
	$stat->bind_param('ss',$un,$bname);
	$bname=$_POST['brandChoice1'];
	$stat->execute();
	
	$stat->close();
	
	$query3="Insert into users_preferences(Users_username, brand_name) values(?,?)";
	$stat3=$mysqli->prepare($query3);
	$bname2=$_POST['brandChoice2'];
	$stat3->bind_param('ss',$un,$bname2);
	$stat3->execute();
	$stat3->close();
	
	$query4="Insert into users_preferences(Users_username, brand_name) values(?,?)";
	$stat4=$mysqli->prepare($query4);
	$bname3=$_POST['brandChoice3'];
	$stat4->bind_param('ss',$un,$bname3);
	$stat4->execute();
	$stat4->close();
	
	
	
	$quee="Insert into cart(cart_id, Users_username) values(?,?)";
	$sttmt=$mysqli->prepare($quee);
	$sttmt->bind_param('is',$rownum1,$un);
	$sttmt->execute();
	$sttmt->close();
	
	$_SESSION['username']=$un;
	header("location: home.php");
	?>		 