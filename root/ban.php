<?php
  require_once('include/connection.php');
  $username = $_POST['ban-ime'];
  $sql = "SELECT banovan FROM korisnik WHERE username = '$username'";
  $result = mysqli_query($con,$sql);
  $ban = mysqli_fetch_assoc($result);
  if($ban['banovan'] == 0){
    $sql = "UPDATE korisnik SET banovan = 1 WHERE username = '$username' ";
    $result = mysqli_query($con,$sql);
    if($result){
      sleep(1.5);
      header('location:admin-panel.php');
    }
  }
 ?>
