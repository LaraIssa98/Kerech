<?php
$count=0;
while ($stmt->fetch()) {
  $count++;
  if($count==3){
    echo "</div>";
    echo "<div class='productRow'>";
    $count=0;
  }
  echo "<article class='productInfo'>";
  echo "<div><img alt='" . $id . "'src='".$photo."'</div>";
  echo "<p class='price'>" . $price . "</p>";
  echo "<p class='productContent'>" . $pname . "</p>";
  echo "<input type='button' name='button' value='Buy' class='buyButton' >";
  echo "</article>";
}

$stmt->free_result();

$stmt->close();
?>