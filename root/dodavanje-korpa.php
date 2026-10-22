<?php
session_start();
include('small-handlers/links.php');
require_once('include/connection.php');

if (isset($_SESSION['username'])) {
  $buyer = $_SESSION['username'];
  $productID = $_POST['korpa-id'];
  $sqlID = "SELECT id FROM korisnik WHERE username = '$buyer'";
  $resultID = mysqli_query($con, $sqlID);
  $temp = mysqli_fetch_assoc($resultID);
  $id = $temp['id'];
  $sql = "SELECT proizvod FROM korpa WHERE korisnik = '$id' ";
  $result = mysqli_query($con,$sql);
  $item = mysqli_fetch_assoc($result);
  $proizvod = $item['proizvod'];
  $sql = "INSERT INTO korpa(korisnik,proizvod) VALUES('$id','$productID')";
  $result = mysqli_query($con, $sql);
  sleep(1);
  if($_SESSION['page'] == 'trazi'){
    header('location:index.php');
  }else{
    header('location:' . $_SESSION['page'] . '.php');
  }

} else {
    header("location:". $_SESSION['page'] .".php?cart=error");
}

?>
