<?php
require_once('include/connection.php');
if (isset($_POST['submit'])) {
  $file = $_FILES['proizvod-slika'];
  echo $file;
  $fileName = $_FILES['proizvod-slika']['name'];
  $fileType = $_FILES['proizvod-slika']['type'];
  $fileTmpName = $_FILES['proizvod-slika']['tmp_name'];
  $fileError = $_FILES['proizvod-slika']['error'];
  $fileSize = $_FILES['proizvod-slika']['size'];
  $fileExt = explode('.', $fileName);
  $fileAcutalExt = strtolower(end($fileExt));
  $allowed = array('jpg', 'jpeg', 'png');
  if (in_array($fileAcutalExt, $allowed)) {
    if ($fileError == 0) {
      if ($fileSize < 1000000) {
        $fileNameNew = uniqid('', true) . "." . $fileAcutalExt;
        $fileDestination = 'images/uploads/' . $fileNameNew;
        move_uploaded_file($fileTmpName, $fileDestination);
      } else {
        echo 'Slika je prevelika!';
      }
    } else {
      echo 'Desila se greška tokom uploada slike!';
    }
  } else {
    echo 'Greška!Fajl mora biti .png, .jpeg, .jpg formata';
  }
}

$itemName = $_POST['proizvod-ime'];
$itemPrice = $_POST['proizvod-cijena'];
$itemDesc = $_POST['proizvod-opis'];
$itemGroup = $_POST['proizvod-vrsta'];
$sql = "INSERT INTO proizvod(naziv,cijena,opis,vrsta,slika) VALUES('$itemName','$itemPrice','$itemDesc','$itemGroup','$fileNameNew')";
$result = mysqli_query($con, $sql);
header('location:admin-panel.php');

?>
