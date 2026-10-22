<?php
  session_start();
  require_once('include/connection.php');
  $username = $_SESSION['username'];
  $sql = "SELECT id FROM korisnik WHERE username = '$username'";
  $result = mysqli_query($con,$sql);
  $items = mysqli_fetch_assoc($result);
  $id = $items['id'];
  $sql = "DELETE FROM poredjenje2 WHERE korisnik = $id";
  $result = mysqli_query($con,$sql);
  header('location:poredjenje.php');

 ?>
