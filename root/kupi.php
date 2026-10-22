


<?php
require_once('PHPMailer/PHPMailerAutoload.php');

$mail = new PHPMailer(true);
session_start();
require_once('include/connection.php');
$user = $_SESSION['username'];
$sql = "SELECT email FROM korisnik WHERE username = '$user'";
$result = mysqli_query($con,$sql);
$temp = mysqli_fetch_assoc($result);
$email = $temp['email'];
$sql = "SELECT id FROM korisnik WHERE username = '$user'";
$result = mysqli_query($con, $sql);
$temp = mysqli_fetch_assoc($result);
$userID = $temp['id'];

$numSql = "SELECT COUNT(*) AS broj FROM korpa WHERE korisnik = '$userID'";
$numResult = mysqli_query($con, $numSql);
$cnt = mysqli_fetch_assoc($numResult);
$num = $cnt['broj'];

for ($i = 0; $i < $num; $i++) {
  $id = $_POST['kupi-id' . $i];
  $user = $_SESSION['username'];
  $sql2 = "INSERT INTO prodaja(korisnik,proizvod,potvrdjena) VALUES('$userID','$id','0')";
  $sql1 = "DELETE FROM korpa WHERE proizvod = '$id'";
  $result2 = mysqli_query($con, $sql2);
  $result1 = mysqli_query($con, $sql1);

  try {
    $sql = "SELECT * FROM proizvod WHERE id = '$id'";
    $result = mysqli_query($con, $sql);
    $articles = mysqli_fetch_assoc($result);


    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMPTSecure = 'tls';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = '587';
    $mail->isHTML();
    $mail->Username = 'aotcomputers153@gmail.com';
    $mail->Password = 'lordbenz';
    $mail->SetFrom('no-reply@aotcomputers.com');
    $mail->Subject = 'Potvrda kupovine proizvoda #' . $id;
    $mail->Body =
      'Hvala Vam na kupovini proizvoda<span color=yellow> ' .$id. ' </span>Vaši proizvodi će biti isporučeni u roku od nekoliko dana na Vašu adresu!


        ';
    $mail->AddAddress($email);

    $mail->send();

    sleep(1.5);
  
    
    header('location:korpa.php');
  }

  
  catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}
?>

<script>
  alert("Hvala Vam na obavljenoj kupovini. Pogledajte Vaš mail za više podataka!")
</script>

