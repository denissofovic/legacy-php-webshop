<?php
  require_once('include/connection.php');
  include_once('include/frame.php');
  $_SESSION['desc'] = 'Traženje artikala';
  $_SESSION['page'] = 'trazi';
  if(isset($_POST['submit-search'])){
    $search = mysqli_real_escape_string($con,$_POST['artikal-pretraga']);
    $sql = "SELECT * FROM proizvod WHERE naziv LIKE '%$search%' OR opis LIKE '%$search%' OR vrsta LIKE '%$search%' OR cijena LIKE '$search'";
    $result = mysqli_query($con,$sql);
    $numOfItems = mysqli_num_rows($result);
    echo '<div class="search-container">';
    ?>
    <div>
      <span id="desc">
        <h3 style="color:gray"><?php echo $_SESSION["desc"]; ?></h3>
      </span>
      <hr id="separator">
    </div>
    <center><div style="width:70%;background-color:whitesmoke;border-radius:16px;">
      <center><h4 style="padding-top:0.3cm;padding-bottom:0.3cm;font-size:16px;"><b><i class="zmdi zmdi-search material-icons-name"></i></b>
        <?php if($numOfItems == 1){
          echo 'Pronađen '.$numOfItems.' proizvod koji odgovara pretrazi</h4></center>';
        }elseif($numOfItems > 1){
          echo 'Pronađeno '.$numOfItems.' proizvoda koji odgovaraju pretrazi</h4></center>';
        }else{
          echo 'Nije pronađen niti jedan proizvod koji odgovara pretrazi</h4></center>';
        };
        ?>
    </div></center>

    <?php
    while ($item = mysqli_fetch_assoc($result)) {
      $id = $item['id'];
      echo '<div class="search-box">';
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
  }
 ?>
