<?php
require('config.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Kerech - Create an account</title>
    <link rel="stylesheet" href="css/style.css">

    <script>
        function showUser(str) {
            if (str == "") {
                document.getElementById("freeSlots").innerHTML = "";
                return;
            } else {
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, chrome...
                    xmlhttp = new XMLHttpRequest();
                } else {
                    //code for ie6 
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById("freeSlots").innerHTML = xmlhttp.responseText;
                    }

                }
                xmlhttp.open("GET", "checkAcc.php?q=" + str, true);
                xmlhttp.send();
            }
        }

    </script>
</head>

<body>
    <div class="container">
        <div class="profile">
            <h1> Create a new Profile </h1>

            <form method="post" action="addUser.php">
                First name:
                <input type="text" name="new_fn"><br> Last name:
                <input type="text" name="new_ln"><br> E-mail Address:
                <input type="text" name="new_em"><br> Username:
                <input type="text" name="new_un" onkeyup="showUser(this.value)"><br> Password:
                <input type="password" name="new_pw"><br> Phone:
                <input type="text" name="new_pn"><br> Gender:
                <select name="gender">
					<option value="M"> M </option>
					<option value="F"> F </option>
					<option value="O"> Other </option>
					</select> Birthdate:
                <input type="text" name="dob"><br> Address:
                <hr> Street Name:
                <input type="text" name="new_sn"> City:
                <input type="text" name="new_t"><br> State:
                <input type="text" name="new_r"> Country:
                <input type="text" name="new_cnt"><br> Po-box:
                <input type="number" name="new_po"> Preferences:
                <select name="brandChoice1">
					<?php
					$query="SELECT brand_name from brands";
						$stmt=$mysqli->prepare($query);
						$stmt->execute();
						$stmt->bind_result($bname1);
						while($stmt->fetch()){
						?>
						<option value=<?php echo $bname1 ?>><?php echo $bname1 ?></option>
						
					<?php } 
					$stmt->close();?>
					</select>
                <select name="brandChoice2">
						
						
					<?php
					$stmt2=$mysqli->prepare("SELECT brand_name from brands");
					$stmt2->execute();
					$stmt2->bind_result($bname2);

					 while($stmt2->fetch()){
						?>
						<option value=<?php echo $bname2 ?>><?php echo $bname2 ?></option>
						
					<?php } 
					$stmt2->close();?>
					</select>
                <select name="brandChoice3">
					<?php
					$stmt3=$mysqli->prepare("SELECT brand_name from brands");
						$stmt3->execute();
						$stmt3->bind_result($bname3);
						while($stmt3->fetch()){
						?>
						<option value= "<?php echo $bname3 ?>" >
						<?php echo $bname3 ?></option>
						
					<?php }
					$stmt3->close();
					?>
					</select>
                <input type="Submit" name="submit" value="submit">
            </form>
        </div>
    </div>

</body>

</html>
