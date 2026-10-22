<?php
session_start();
require_once('include/connection.php');
$kod = $_POST['kod-unos'];
$username = $_SESSION['username'];
$sql = "SELECT id FROM korisnik WHERE username = '$username'";
$result = mysqli_query($con, $sql);
$fetch = mysqli_fetch_assoc($result);
$id = $fetch['id'];
$sql = "SELECT kod FROM kodovi WHERE korisnik = '$id'";
$result = mysqli_query($con, $sql);
$fetch = mysqli_fetch_assoc($result);
$kodDB = $fetch['kod'];
if ($kod == $kodDB) {
  $sql = "UPDATE korisnik SET verifikovan = 1 WHERE id = '$id'";
  $result = mysqli_query($con, $sql);
  if ($result) {
    $_SESSION['verified'] = 'true';
    $_SESSION['success'] = 'success';
    sleep(2);
    header('location:index.php?verify=success');
    $sql = "DELETE FROM kodovi WHERE kod ='$kodDB' ";
    $result = mysqli_query($con, $sql);
  }
} else {
  header("location:login-verification-form.php?verify=error");
}

?>
