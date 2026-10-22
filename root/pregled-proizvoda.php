<?php
  require_once('include/connection.php');
  include_once('include/frame.php');
  $id = $_GET['pregled-id'];
  sleep(1.5);
  if(isset($_GET['brzi-pregled'])){
    $sql = "SELECT * FROM proizvod WHERE id = '$id'";
    $result = mysqli_query($con,$sql);
    $item = mysqli_fetch_assoc($result);
    echo '<div class="preview-container">';
    echo '<div class="preview-box">';
    echo '<form action="dodavanje-korpa.php" method="post">';
    echo '<h6><input id="idInput" type="text" name="korpa-id" value= "' . $id . '"></h6>';
    echo '<hr class="sep">';
    echo '<img src="images/uploads/' . $item['slika'] . '" id="previewImg">';
    echo '<div class="text-box">';
    echo '<label style="font-size:26px">' . mb_strtoupper($item['naziv']) . '</label>';
    echo '<hr class="sep">';
    echo '<label style="font-size:18px;color:#696969;">' . $item['cijena'] . ',00KM </label>';
    echo '<hr class="sep">';
    echo '<label><h5 id="name">' . $item['opis'] . '</h6></label>';
    echo '<hr class="sep">';
    echo '<h5>Status: <b><span style="color:green">dostupno</span></b></h5>';
    echo '<hr class="sep">';
    echo '<div class="buttons">';
    echo '<button type="submit" class="btn" id="cartButtonPreview" ><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Dodaj u korpu</button>';
    echo '</form>';
    echo '<form action="dodavanje-poredjenje.php" method="post">';
    echo '<input type="hidden" name="dodavanje-id" value= "' . $id . '">';
    echo '<button type="submit" class="btn" id="compareButtonPreview"><span class="glyphicon glyphicon-align-center" aria-hidden="true"></span> Dodaj u poređenje</button>';
    echo '</form>';

    echo '</div>';
    echo '</div>';
    echo '</div>';

  }



 ?>
