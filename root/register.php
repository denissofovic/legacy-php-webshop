<?php
session_start();
include('small-handlers/links.php');
require_once('include/connection.php');
require_once __DIR__ . '/include/config.php';


$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$username = $_POST['username'];
$lozinka = $_POST['lozinka'];
$potvrda_lozinka = $_POST['potvrda-lozinka'];
$email = $_POST['email'];
$adresa = $_POST['adresa'];
$telefon = $_POST['telefon'];
$sql = "SELECT * FROM korisnik WHERE username = '$username' or email = '$email'";
$result2 = mysqli_query($con, $sql);
if ($lozinka != $potvrda_lozinka) {
    header("location:register-form.php?signup=invalid-password");
} elseif (mysqli_num_rows($result2) > 0) {
    header("location:register-form.php?signup=already-taken");
} else {
  $six_digit_random_number = mt_rand(100000, 999999);
  $verified = 0;
  $sql = "INSERT INTO korisnik(ime,prezime,email,lozinka,username,adresa,broj_telefona,verifikovan) VALUES ('$ime','$prezime','$email','$lozinka','$username','$adresa','$telefon','0')";
  $result = mysqli_query($con, $sql);
  if ($result) {
    $selectID = "SELECT id FROM korisnik WHERE username = '$username'";
    $resultID = mysqli_query($con, $selectID);
    $fetch = mysqli_fetch_assoc($resultID);
    $id = $fetch['id'];
    $sql = "INSERT INTO kodovi(korisnik,kod) VALUES('$id','$six_digit_random_number')";
    $result = mysqli_query($con, $sql);
    $_SESSION['username'] = $username;
    $_SESSION['verified'] = 'false';
    require_once('PHPMailer/PHPMailerAutoload.php');
    $mail = new PHPMailer(true);
    try {

      $mail->isSMTP();
      $mail->SMTPAuth = true;
      $mail->SMTPSecure = MAIL_SECURE;
      $mail->Host = MAIL_HOST;
      $mail->Port = MAIL_PORT;
      $mail->Username = MAIL_USER;
      $mail->Password = MAIL_PASS;
      $mail->CharSet = 'UTF-8';
      $mail->setFrom(MAIL_FROM, MAIL_FROM_NAME);            
      $mail->Debugoutput = 'html';
      $mail->isHTML(true);
      $mail->Subject = 'Verifikacijski kod';
      $mail->Body = 'Vaš verifikacijski kod je: <span style="color:#228B22"><b>' . $six_digit_random_number . '</b></span><br>Unesite ovaj kod prilikom sljedeće prijave na Vaš nalog.';
      $mail->addAddress($email);

      if (!$mail->send()) {
          echo 'Greška: ' . $mail->ErrorInfo;
      }
    } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    include('logout.php');
    header("location:index.php?signup=success");
  };
}


?>
