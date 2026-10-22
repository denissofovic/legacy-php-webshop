<?php
include_once('include/frame.php');
$_SESSION['page'] = 'admin-panel';
$_SESSION['desc'] = 'ADMIN PANEL';

require_once('include/connection.php');

echo '<div class="stats-container">';
?>
<div>
  <span id="desc">
    <h3 style="color:gray"><?php echo 'Admin panel' ?></h3>
  </span>
  <hr id="separator">
</div>
<?php
echo '<br>';
echo '<h3><b>Dodavanje i brisanje proizvoda</b></h3>';
echo '<br>';
echo '<div style = "display:inline-flex">';
echo '<center><a href="#" class="add-modal"> <span><img src="images/add-icon1.png" style="margin-right:0.8cm;width:45px;"></span></a></center>';
echo '<center><a href="#" class="remove-modal"> <span><img src="images/remove-icon1.png" style="width:45px;"></span></a></center>';
echo '</div>';
echo '<hr>';
echo '<br>';
echo '<section">';



?>

<!-- .-----------------------------------------------------DODAVANJE PROIZVODA--------------------------------------. -->
<div  class="modal fade" id="addItemsModal" tabindex="-1" role="dialog" >
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <h5 class="modal-title"><b>Dodavanje proizvoda</b></h5>
  </div>
  <div class="modal-body">
    <form action ="dodavanje-proizvoda.php" method="post" enctype="multipart/form-data">
      <div class="form group">
        Unesi naziv proizvoda:<br><input type="text" name="proizvod-ime">
      </div>
      <div class="form group">
        Unesi cijenu proizvoda:<br><input type="text" name="proizvod-cijena">
      </div>
      <div class="form group">
      Unesi vrstu proizvoda:<br><input type = 'text' list="browsers" name="proizvod-vrsta"/>
                        <datalist id="browsers">
                          <option value="racunar">
                          <option value="procesor">
                          <option value="graficka">
                          <option value="kuciste">
                          <option value="maticna">
                          <option value="ram">
                          <option value="ssd">
                          <option value="hdd">
                          <option value="flash">
                          <option value="ostalo-memorija">
                          <option value="mis">
                          <option value="tastatura">
                          <option value="zvucnik">
                          <option value="kamera">
                          <option value="slusalice">
                          <option value="monitor">
                        </datalist>
      </div>

      <div class="form group">
        Unesi opis proizvoda:<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="proizvod-opis"></textarea>
      </div>
      <br>
      <div class="form group">
        <center>Unesi sliku proizvoda:<input type="file" name="proizvod-slika"></center>
      </div>
      <br>
          <button type="submit" class="btn btn-primary" id="#save" name="submit">Dodaj</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Odustani</button>
        </div>

    </form>
  </div>
</div>
</div>
</div>


<!-- .-----------------------------------------------------BRISANJE PROIZVODA--------------------------------------. -->
<div  class="modal fade" id="removeItemsModal" tabindex="-1" role="dialog" >
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <h5 class="modal-title"><b>Brisanje proizvoda</b></h5>
  </div>
  <div class="modal-body">
    <form action ="brisanje-proizvoda.php" method="post">
      <div class="form group">
        Unesi id proizvoda:<br><input type="number" name="proizvod-id">
      </div>
      <br>
          <button type="submit" class="btn btn-primary" id="#save">Obriši</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Odustani</button>
        </div>
    </form>
  </div>
</div>
</div>
</div>
