<?php

include_once('include/frame.php');
$_SESSION['page'] = 'monitori';
$_SESSION['desc'] = 'Monitori';
require_once('include/connection.php');


$sql = "SELECT * FROM proizvod WHERE vrsta = 'monitor'";
$result = mysqli_query($con, $sql);
echo '<div class="item-container">';
$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if(strpos($fullUrl,"verify=success") == true){
  echo'<script>alert("Vaš nalog je uspješno verifikovan")</script>';
}elseif(strpos($fullUrl,"signup=success") == true){
  echo '<script>alert("Uspješno registrovani!Pri sljedećoj prijave unesite verifikacioni kod koji Vam je poslan na email!")</script>';
};

?>

<div>
  <span id="desc">
    <h3 style="color:gray"><?php echo $_SESSION["desc"]; ?></h3>
  </span>
  <hr id="separator">
</div>

<?php
while ($item = mysqli_fetch_assoc($result)) {

  $id = $item['id'];
  echo '<div class="floating-box">';
  echo '<div id="hoverbar">
      <form action="dodavanje-poredjenje.php" method="post">
      <input type="hidden" value="'. $id .'" name="dodavanje-id">
      <button type="submit" id="compareButton" name="poredjenje-dodaj">
        <span class="glyphicon glyphicon-align-center" aria-hidden="true" title="Dodaj u poređenje"></span>
      </form>
      <form action="pregled-proizvoda.php" >
      <input type="hidden" value="'. $id .'" name="pregled-id">
      <button type="submit" id="previewButton" name="brzi-pregled">
        <span class="glyphicon glyphicon-eye-open" aria-hidden="true" title="Prikaži više"></span>
      </form>
      </div>';
  echo '<form action="dodavanje-korpa.php" method="post">';
  echo '<h6><input id="idInput" type="text" name="korpa-id" value= "' . $id . '"></h6>';
  echo '<hr>';
  echo '<img src="images/uploads/' . $item['slika'] . '" style="width:240;height:188;">';
  echo '<label><h5 id="name">' . mb_strtoupper($item['naziv']) . '</h5></label>';
  echo '<br>';
  echo '<label style="font-size:14px;color:#696969">' . $item['cijena'] . ',00KM </label>';
  echo '<br>';
  echo '<br>';
  echo '<button type="submit" class="btn" id="cartButton" ><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Dodaj u korpu</button>';
  echo '</form>';
  echo '</div>';

}
echo '</div>';

?>
