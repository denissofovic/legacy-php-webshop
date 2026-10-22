<?php
  require_once('include/connection.php');
  $username = $_POST['brisanje-ime'];
  $sql = "SELECT id FROM korisnik WHERE username = '$username'";
  $result = mysqli_query($con,$sql);
  $item = mysqli_fetch_assoc($result);
  $id = $item['id'];
  $sql = "DELETE FROM kodovi WHERE korisnik = '$id'";
  $result = mysqli_query($con,$sql);
  $sql = "DELETE FROM poredjenje2 WHERE korisnik = '$id'";
  $result = mysqli_query($con,$sql);
  $sql = "DELETE FROM poredjenje WHERE korisnik = '$id'";
  $result = mysqli_query($con,$sql);
  $sql = "DELETE FROM prodaja WHERE korisnik = '$id'";
  $result = mysqli_query($con,$sql);
  $sql = "DELETE FROM korpa WHERE korisnik = '$id'";
  $result = mysqli_query($con,$sql);
  $sql = "DELETE FROM korisnik WHERE username = '$username'";
  $result = mysqli_query($con,$sql);
  header('location:admin-panel.php');

 ?>
