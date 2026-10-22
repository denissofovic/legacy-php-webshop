<?php
include('include/frame.php');
$_SESSION['page'] = 'korpa';
require_once('include/connection.php');
$username = $_SESSION['username'];
$sqlUsername = "SELECT id FROM korisnik WHERE username ='$username'";
$resultUsername = mysqli_query($con, $sqlUsername);
$temp = mysqli_fetch_assoc($resultUsername);
$id = $temp['id'];
$sqlIDS = "SELECT id,proizvod FROM korpa WHERE korisnik = '$id' ";
$resultIDS = mysqli_query($con, $sqlIDS);
$sum = 0;
$ids =  array();
echo '<div class ="cart-container">';
while ($item = mysqli_fetch_assoc($resultIDS)) {
  $t = $item['proizvod'];
  $sql = "SELECT * FROM proizvod WHERE id = '$t'";
  $result = mysqli_query($con, $sql);
  $articles = mysqli_fetch_assoc($result);
  $id = $articles['id'];
  array_push($ids, $id);
  echo '<div class="floating-box" id="buyBox" style="display:inline-grid;height:230px;">';
  echo '<form action="izbaci-korpa.php" method="post">';
  echo '<input type="hidden" name="korpa-id" value="'.$item['id'].'"> ';
  echo '<h5><input id="idInput"  type="hidden"" name="kupi-id" value= "' . $id . '"></h5>';
  echo '<div style="float:left;margin-left:1cm;margin-bottom:1cm;">';
  echo '<img src="images/uploads/' . $articles['slika'] . '"  id="itemImage">';
  echo '<br>';
  echo '</div>';
  echo '<div>';
  echo '<label ><h4 style="font-size:22px">' . $articles['naziv'] .' </h4></label>';
  echo '<br>';
  echo '<label><h6 style="font-size:15px">' . $articles['opis'] . '</h6></label>';
  echo '<br>';
  echo '<label><h5 style="font-size:16px">Status: <b><span style="color:green">dostupno</span></h5></b>';
  echo '</div>';
  echo '<label id="itemPrice" style="padding-left:1.2cm;padding-top:0.3cm;font-size:18px;">Cijena:' . $articles['cijena'] . '<span style="">KM</span></label>';
  echo '<button type="submit" class="btn btn-secondary" id="removeButton" style= "color:darkgray;float:right;font-size:18px;margin-top:40px;margin-right:0.2cm;" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>';
  echo '</form>';
  echo '</div>';
  $sum += $articles['cijena'];
}

if (count($ids) != 0) {
  echo '<div class="summary">';
  echo '<form action="kupi.php" method="post">';
  for ($i = 0; $i < count($ids); $i++) {
    echo '<h5><input id="idInput"  type="hidden"" name="kupi-id' . $i . '" value= "' . $ids[$i] . '"></h5>';
  }
  echo '<label>Ukupno: <span style="color:#000">' . $sum . ',00KM</span></label>';
  echo '<hr>';
  echo '<label>Dostava: <span style="color:#000"> 0,00KM</span></label>';
  echo '<hr>';
  echo '<label>Sveukupno: <span style="color:#000">' . $sum . ',00KM</span></label>';
  echo '<hr>';
  echo '<button type="submit" class="btn btn-primary" id="buyButton" style= "width:200px;margin-right:2%;color:#fff;background-color:green;border-color:green;"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Naruči</button>';
  echo '</form>';
  echo '<form action="index.php">';
  echo '<button type="submit" class="btn btn-primary" id="proceedButton" style= "width:200px;margin-right:2%;color:#fff;background-color:#000;border-color:#000;"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span> Nastavi sa kupovinom</button>';
  echo '</form>';
  echo '</div>';
  echo '</div>';
} else {
  echo '<table style="margin-top:1.5cm">
    <tr>
      <td style = "width:100%;color:red;"><center>Korpa je trenutno prazna!</center></td>
    </tr>
  </table>';
}

$resultIDS = mysqli_query($con, $sqlIDS);
$IDS = mysqli_fetch_assoc($resultIDS);

?>
