<?php
ob_start();
session_start();
include('small-handlers/links.php');
$error = array();
require_once('include/connection.php');
require_once __DIR__ . '/include/config.php';
$ime = $_POST["username"];
$lozinka = $_POST["lozinka"];
$namequery = "SELECT * FROM korisnik WHERE username = '$ime' AND lozinka = '$lozinka'";
$query = "SELECT email,adresa,broj_telefona FROM korisnik WHERE username = '$ime' AND lozinka = '$lozinka'";
$result = mysqli_query($con, $namequery);
$user = mysqli_fetch_assoc($result);
$result1 = mysqli_query($con, $query);
$infoStrings = mysqli_fetch_assoc($result1);
$codequery = "SELECT verifikovan FROM korisnik WHERE username = '$ime' AND lozinka = '$lozinka'";
$coderesult = mysqli_query($con, $codequery);
$codefetch = mysqli_fetch_assoc($coderesult);
if (mysqli_num_rows($result) == 0) {
  header("location:login-form.php?signin=error");
} elseif($user['banovan'] == 1){
  header("location:login-form.php?signin=banned");
} elseif ($ime == ADMIN_USER and $lozinka == ADMIN_PASS) {
  $_SESSION['admin'] = $ime;
  $_SESSION['success'] = "Sada si ulogovan kao admin";
  $_SESSION['username'] = $ime;
  $_SESSION['email'] = $infoStrings['email'];
  $_SESSION['address'] = $infoStrings['adresa'];
  $_SESSION['phone'] = $infoStrings['broj_telefona'];
  sleep(1.5);
  header('location:index.php');
} else{
$_SESSION['username'] = $ime;
if ($codefetch['verifikovan'] == 1) {
  if(!empty($_POST['remember-me'])){
    setcookie('member_login',$_POST['username'],time() + (10 * 365 * 24 * 60 * 60));
    setcookie('member_password',$_POST['lozinka'],time() + (10 * 365 * 24 * 60 * 60));
  }else{
    if(isset($_COOKIE['member_login'])){
      setcookie('member_login',"",0);
    }
    if(isset($_COOKIE['member_password'])){
        setcookie('member_password',"",0);
    };
  }
  $_SESSION['username'] = $ime;
  $_SESSION['email'] = $infoString['email'];
  $_SESSION['address'] = $infoString['adresa'];
  $_SESSION['phone'] = $infoString['broj_telefona'];
  $_SESSION['password'] = $infoString['lozinka'];
  $_SESSION['success'] = "Sada si ulogovan";
  $_SESSION['page'] = '';
  $_SESSION['cartitems'] = '';
  sleep(1.5);
  header('location:index.php');
} else {
    sleep(1.5);
    header('location:login-verification-form.php');
  }
}

?>
