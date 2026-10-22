<?php
  require_once('include/connection.php');
  $username = $_SESSION['username'];
  $sql1 = "SELECT id FROM korisnik WHERE username = '$username'";
  $result1 = mysqli_query($con,$sql1);
  $temp = mysqli_fetch_assoc($result1);
  $id = $temp['id'];
  $counter = 0;
  $sql = "SELECT COUNT(*) AS broj FROM korpa WHERE korisnik = '$id' ";
  $result = mysqli_query($con,$sql);
  $items = mysqli_fetch_assoc($result);

  if(!empty($items)){
    $_SESSION["cartitems"] = $items['broj'];
    $numOfItems = $_SESSION["cartitems"];
  }else{
    $numOfItems = 0;
  }
  echo '<li><a href="korpa.php"> <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span><span class="badge" id="cart-badge" name = "cart-item-number">'.$numOfItems.'</span></a></li>';
 ?>

 <style>
    #cart-badge{
      background-color:		#ff0000;
    }
</style>
