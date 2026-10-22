<?php
include('small-handlers/links.php');
session_start();
require_once('include/connection.php');

if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    $sql = "SELECT id FROM korisnik WHERE username = '$username'";
    $result = mysqli_query($con, $sql);
    $items = mysqli_fetch_assoc($result);
    $id = $items['id'];
    $sql = "SELECT COUNT(*) AS broj_stavki FROM poredjenje WHERE korisnik = '$id'";
    $result = mysqli_query($con, $sql);
    $items = mysqli_fetch_assoc($result);
    $brojStavki = $items['broj_stavki'];
    $sql2 = "SELECT COUNT(*) AS broj_stavki FROM poredjenje2 WHERE korisnik = '$id'";
    $result2 = mysqli_query($con, $sql2);
    $items2 = mysqli_fetch_assoc($result2);
    $brojStavki2 = $items2['broj_stavki'];
    $dodavanjeId = $_POST['dodavanje-id'];
    if ($brojStavki == 0) {
      $sql = "INSERT INTO poredjenje(proizvod,korisnik) VALUES('$dodavanjeId','$id')";
      $result = mysqli_query($con, $sql);
      sleep(1.5);
      header('location:poredjenje.php');
    } elseif($brojStavki >= 1 and $brojStavki2 == 0) {
      $sql = "INSERT INTO poredjenje2(proizvod,korisnik) VALUES('$dodavanjeId','$id')";
      $result = mysqli_query($con, $sql);
      sleep(1.5);
      header('location:poredjenje.php');
    } elseif($brojStavki >= 1 and $brojStavki2 >= 1){
      $sql = "DELETE FROM poredjenje WHERE korisnik = '$id'";
      $sql1 = "DELETE FROM poredjenje2 WHERE korisnik = '$id'";
      $result = mysqli_query($con,$sql);
      $result1 = mysqli_query($con,$sql1);
      $sql = "INSERT INTO poredjenje(proizvod,korisnik) VALUES('$dodavanjeId','$id')";
      $result = mysqli_query($con, $sql);
      sleep(1.5);
      header('location:poredjenje.php');
    };
  } else{
    sleep(1.5);
    header("location:".$_SESSION['page'].".php?compare=error");
  }

?>
