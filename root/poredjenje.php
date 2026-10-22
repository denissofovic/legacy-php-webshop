<?php
include('include/frame.php');
$_SESSION['page'] = 'poredjenje';
$_SESSION['desc'] = 'Poređenje artikala';
require_once('include/connection.php');
$username = $_SESSION['username'];
echo '<div class="compare-container">';
?>


<div>
  <span id="desc">
    <h3 style="color:gray"><?php echo $_SESSION["desc"]; ?></h3>
  </span>
  <hr id="separator">
</div>

<div class="alert alert-warning" role="alert">
  NAPOMENA:Proizvodi koji su kompatibilni za poređenje su: Monitor, Računar, Procesor, Grafička kartica, Miš i Tastatura
</div>

<?php

$nazivPrvogProizvoda = '';
$cijenaPrvogProizvoda = '';
$vrstaPrvogProizvoda = '';
$opisPrvogProizvoda = '';
$nazivDrugogProizvoda = '';
$cijenaDrugogProizvoda = '';
$vrstaDrugogProizvoda = '';
$opisDrugogProizvoda = '';
$sql = "SELECT id FROM korisnik WHERE username = '$username'";
$result = mysqli_query($con, $sql);
$items = mysqli_fetch_assoc($result);
$id = $items['id'];
$sql = "SELECT proizvod FROM poredjenje WHERE korisnik = '$id'";
$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result) != 0){
  $items = mysqli_fetch_assoc($result);
  $id = $items['proizvod'];
  $sql = "SELECT * FROM proizvod WHERE id = '$id'";
  $result = mysqli_query($con, $sql);
  echo '<div>';
  $item = mysqli_fetch_assoc($result);
  $vrstaPrvogProizvoda = $item['vrsta'];
  echo '<div class="compare-box" style="margin-left:4.5cm;margin-right:1cm;">';
  echo '<form action="izbaci-poredjenje-prvo.php" method="post">';
  echo '<h6><input id="idInput" type="text" name="korpa-id" value= "' . $id . '"></h6>';
  echo '<hr>';
  echo '<img src="images/uploads/' . $item['slika'] . '" style="width:350;height:200;">';
  echo '<br>';
  echo '<br>';
  echo '<hr>';
  echo '<div class="buttons">';
  echo '<button type="submit" class="btn btn-secondary" id="removeButton" style="margin-bottom:0.5cm;" title="Izbaci iz poređenja"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>';
  echo '</form>';
  echo '<form action="dodavanje-korpa.php" method="post">';
  echo '<input type="hidden" name="korpa-id" value= "' . $id . '">';
  echo '<button type="submit" class="btn" id="compareCart"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true" title="Dodaj u korpu"></span></button>';
  echo '</form>';
  echo '</div>';
  echo '<br>';
  echo '</div>';
  $nazivPrvogProizvoda = $item['naziv'];
  $cijenaPrvogProizvoda = $item['cijena'];
  $vrstaPrvogProizvoda = $item['vrsta'];
  $opisPrvogProizvoda = $item['opis'];

}else{
  echo '<div class="compare-box" style="margin-right:1cm;margin-left:4.5cm;">';
  echo '<h3>Nema stavke </h3>';
  echo '<form action="index.php">';
  echo '<button type="submit" id="addCompare" style="margin-top: 3cm;
  color:lightgray;
  background-color: Transparent;
  background-repeat: no-repeat;
  border: none;
  cursor: pointer;
  overflow: hidden;
  outline: none;
  font-size: 64px;">
    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>';
  echo '</form>';
  echo '</div>';

};

$sql = "SELECT id FROM korisnik WHERE username = '$username'";
$result = mysqli_query($con, $sql);
$items = mysqli_fetch_assoc($result);
$id = $items['id'];
$sql = "SELECT proizvod FROM poredjenje2 WHERE korisnik = '$id'";
$result = mysqli_query($con, $sql);

if(mysqli_num_rows($result) != 0){
  $items = mysqli_fetch_assoc($result);
  $id = $items['proizvod'];
  $sql1 = "SELECT * FROM proizvod WHERE id = '$id'";
  $result1 = mysqli_query($con, $sql1);
  $item1 = mysqli_fetch_assoc($result1);
  $vrstaDrugogProizvoda = $item1['vrsta'];
  echo '<div class="compare-box" style="margin-right:4cm;margin-left:1cm;">';
  echo '<form action="izbaci-poredjenje-drugo.php" method="post">';
  echo '<h6><input id="idInput" type="text" name="korpa-id" value= "' . $id . '"></h6>';
  echo '<hr>';
  echo '<img src="images/uploads/' . $item1['slika'] .'" style="width:350;height:200;">';
  echo '<br>';
  echo '<br>';
  echo '<hr>';
  echo '<div class="buttons">';
  echo '<button type="submit" class="btn btn-secondary" id="removeButton" style="margin-bottom:0.5cm;" title="Izbaci iz poređenja"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>';
  echo '</form>';
  echo '<form action="dodavanje-korpa.php" method="post">';
  echo '<input type="hidden" name="korpa-id" value= "' . $id . '">';
  echo '<button type="submit" class="btn" id="compareCart"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true" title="Dodaj u korpu"></span></button>';
  echo '</form>';
  echo '</div>';
  echo '<br>';
  echo '</div>';
  $nazivDrugogProizvoda = $item1['naziv'];
  $cijenaDrugogProizvoda = $item1['cijena'];
  $vrstaDrugogProizvoda = $item1['vrsta'];
  $opisDrugogProizvoda = $item1['opis'];
}else{

  echo '<div class="compare-box" style="margin-right:4cm;margin-left:1cm;">';
  echo '<h3>Nema stavke </h3>';
  echo '<form action="index.php">';
  echo '<button type="submit" id="addCompare" style="margin-top: 3cm;
  color:lightgray;
  background-color: Transparent;
  background-repeat: no-repeat;
  border: none;
  cursor: pointer;
  overflow: hidden;
  outline: none;
  font-size: 64px;">
    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>';
  echo '</form>';
  echo '</div>';

};
$nizOpisaPrvogProizvoda = explode(',',$opisPrvogProizvoda);
$nizOpisaDrugogProizvoda = explode(',',$opisDrugogProizvoda);
if($vrstaPrvogProizvoda != $vrstaDrugogProizvoda){
    echo '<table>
      <tr>
        <td style = "width:100%;color:red;"><center>Za poređenje je potrebno dva artikla!</center></td>
      </tr>
    </table>';

  }elseif($vrstaPrvogProizvoda == 'graficka' and $vrstaDrugogProizvoda == 'graficka'){
    echo '<table>
    <tr>
      <th style="width:50%">Osobine</th>
      <th>'.$nazivPrvogProizvoda.'</th>
      <th>'.$nazivDrugogProizvoda.'</th>
    </tr>
    <tr>
      <td>Proizvođač</td>
      <td>'.$nizOpisaPrvogProizvoda[0].'</td>
      <td>'.$nizOpisaDrugogProizvoda[0].'</td>
    </tr>
    <tr>
      <td>Grafička memorija</td>
      <td>'.$nizOpisaPrvogProizvoda[1].'</td>
      <td>'.$nizOpisaDrugogProizvoda[1].'</td>
    </tr>
    <tr>
      <td>Konektori</td>
      <td>'.$nizOpisaPrvogProizvoda[2].'</td>
      <td>'.$nizOpisaDrugogProizvoda[2].'</td>
    </tr>
    <tr>
      <td>Slot</td>
      <td>'.$nizOpisaDrugogProizvoda[3].'</td>
      <td>'.$nizOpisaDrugogProizvoda[3].'</td>
    </tr>
    <tr>
      <td>Cijena</td>
      <td>'.$cijenaPrvogProizvoda.',00KM</td>
      <td>'.$cijenaDrugogProizvoda.',00KM</td>
    </tr>
  </table>';

  }elseif($vrstaPrvogProizvoda == 'procesor' and $vrstaDrugogProizvoda == 'procesor'){
  echo'<table>
    <tr>
      <th style="width:50%">Osobine</th>
      <th>'.$nazivPrvogProizvoda.'</th>
      <th>'.$nazivDrugogProizvoda.'</th>
    </tr>
    <tr>
      <td>Proizvođač</td>
      <td>'.$nizOpisaPrvogProizvoda[0].'</td>
      <td>'.$nizOpisaDrugogProizvoda[0].'</td>
    </tr>
    <tr>
      <td>Broj jezgara</td>
      <td>'.$nizOpisaPrvogProizvoda[1].'</td>
      <td>'.$nizOpisaDrugogProizvoda[1].'</td>
    </tr>
    <tr>
      <td>Broj threadova</td>
      <td>'.$nizOpisaPrvogProizvoda[2].'</td>
      <td>'.$nizOpisaDrugogProizvoda[2].'</td>
    </tr>
    <tr>
      <td>Brzina radnog takta</td>
      <td>'.$nizOpisaPrvogProizvoda[3].'</td>
      <td>'.$nizOpisaDrugogProizvoda[3].'</td>
    </tr>
    <tr>
      <td>Ventilator</td>
      <td>'.$nizOpisaPrvogProizvoda[4].'</td>
      <td>'.$nizOpisaDrugogProizvoda[4].'</td>
    </tr>
    <tr>
      <td>Cijena</td>
      <td>'.$cijenaPrvogProizvoda.',00KM</td>
      <td>'.$cijenaDrugogProizvoda.',00KM</td>
    </tr>

  </table>';

  }elseif($vrstaPrvogProizvoda == 'monitor' and $vrstaDrugogProizvoda == 'monitor'){
  echo'<table>
    <tr>
      <th style="width:50%">Osobine</th>
      <th>'.$nazivPrvogProizvoda.'</th>
      <th>'.$nazivDrugogProizvoda.'</th>
    </tr>
    <tr>
      <td>Proizvođač</td>
      <td>'.$nizOpisaPrvogProizvoda[0].'</td>
      <td>'.$nizOpisaDrugogProizvoda[0].'</td>
    </tr>
    <tr>
      <td>Veličina ekrana</td>
      <td>'.$nizOpisaPrvogProizvoda[1].'</td>
      <td>'.$nizOpisaDrugogProizvoda[1].'</td>
    </tr>
    <tr>
      <td>Aspect ratio</td>
      <td>'.$nizOpisaPrvogProizvoda[2].'</td>
      <td>'.$nizOpisaDrugogProizvoda[2].'</td>
    </tr>
    <tr>
      <td>Rezolucija</td>
      <td>'.$nizOpisaPrvogProizvoda[3].'</td>
      <td>'.$nizOpisaDrugogProizvoda[3].'</td>
    </tr>
    <tr>
      <td>Brzina osvježavanja</td>
      <td>'.$nizOpisaPrvogProizvoda[4].'</td>
      <td>'.$nizOpisaDrugogProizvoda[4].'</td>
    </tr>
    <tr>
      <td>Konektori</td>
      <td>'.$nizOpisaPrvogProizvoda[5].'</td>
      <td>'.$nizOpisaDrugogProizvoda[5].'</td>
    </tr>
    <tr>
      <td>Ostali dodaci</td>
      <td>'.$nizOpisaPrvogProizvoda[6].'</td>
      <td>'.$nizOpisaDrugogProizvoda[6].'</td>
    </tr>
    <tr>
      <td>Cijena</td>
      <td>'.$cijenaPrvogProizvoda.',00KM</td>
      <td>'.$cijenaDrugogProizvoda.',00KM</td>
    </tr>

  </table>';
  }elseif($vrstaPrvogProizvoda == 'mis' and $vrstaDrugogProizvoda == 'mis'){
  echo'<table>
    <tr>
      <th style="width:50%">Osobine</th>
      <th>'.$nazivPrvogProizvoda.'</th>
      <th>'.$nazivDrugogProizvoda.'</th>
    </tr>
    <tr>
      <td>Proizvođač</td>
      <td>'.$nizOpisaPrvogProizvoda[0].'</td>
      <td>'.$nizOpisaDrugogProizvoda[0].'</td>
    </tr>
    <tr>
      <td>DPI</td>
      <td>'.$nizOpisaPrvogProizvoda[1].'</td>
      <td>'.$nizOpisaDrugogProizvoda[1].'</td>
    </tr>
    <tr>
      <td>RGB</td>';
      if($nizOpisaPrvogProizvoda[2] == "RGB"){
        echo '<td><i class="fa fa-check"></i></td>';
      }else{
        echo '<td><i class="fa fa-remove"></i></td>';
      };
      if($nizOpisaDrugogProizvoda[2] == "RGB"){
        echo '<td><i class="fa fa-check"></i></td>';
      }else{
        echo '<td><i class="fa fa-remove"></i></td>';
      };
    echo '</tr>
    <tr>
      <td>Boja</td>
      <td>'.$nizOpisaPrvogProizvoda[3].'</td>
      <td>'.$nizOpisaDrugogProizvoda[3].'</td>
    </tr>
    <tr>
      <td>Način spajanja</td>
      <td>'.$nizOpisaPrvogProizvoda[4].'</td>
      <td>'.$nizOpisaDrugogProizvoda[4].'</td>
    </tr>
    <tr>
      <td>Simetričnost</td>
      <td>'.$nizOpisaPrvogProizvoda[5].'</td>
      <td>'.$nizOpisaDrugogProizvoda[5].'</td>
    </tr>
    <tr>
      <td>Dugmad</td>
      <td>'.$nizOpisaPrvogProizvoda[6].'</td>
      <td>'.$nizOpisaDrugogProizvoda[6].'</td>
    </tr>
    <tr>
      <td>Cijena</td>
      <td>'.$cijenaPrvogProizvoda.',00KM</td>
      <td>'.$cijenaDrugogProizvoda.',00KM</td>
    </tr>
  </table>';
}elseif($vrstaPrvogProizvoda == 'tastatura' and $vrstaDrugogProizvoda == 'tastatura'){
  echo'<table>
    <tr>
      <th style="width:50%">Osobine</th>
      <th>'.$nazivPrvogProizvoda.'</th>
      <th>'.$nazivDrugogProizvoda.'</th>
    </tr>
    <tr>
      <td>Proizvođač</td>
      <td>'.$nizOpisaPrvogProizvoda[0].'</td>
      <td>'.$nizOpisaDrugogProizvoda[0].'</td>
    </tr>
    <tr>
      <td>Veličina</td>
      <td>'.$nizOpisaPrvogProizvoda[1].'</td>
      <td>'.$nizOpisaDrugogProizvoda[1].'</td>
    </tr>
    <tr>
      <td>Broj tipki</td>
      <td>'.$nizOpisaPrvogProizvoda[2].'</td>
      <td>'.$nizOpisaDrugogProizvoda[2].'</td>
    </tr>
    <tr>
      <td>RGB</td>';
      if($nizOpisaPrvogProizvoda[3] == "RGB"){
        echo '<td><i class="fa fa-check"></i></td>';
      }else{
        echo '<td><i class="fa fa-remove"></i></td>';
      };
      if($nizOpisaDrugogProizvoda[3] == "RGB"){
        echo '<td><i class="fa fa-check"></i></td>';
      }else{
        echo '<td><i class="fa fa-remove"></i></td>';
      };
    echo '</tr>
    <tr>
      <td>Vrste tipki</td>
      <td>'.$nizOpisaPrvogProizvoda[4].'</td>
      <td>'.$nizOpisaDrugogProizvoda[4].'</td>
    </tr>
    <tr>
      <td>Način spajanja</td>
      <td>'.$nizOpisaPrvogProizvoda[5].'</td>
      <td>'.$nizOpisaDrugogProizvoda[5].'</td>
    </tr>
    <tr>
      <td>Cijena</td>
      <td>'.$cijenaPrvogProizvoda.',00KM</td>
      <td>'.$cijenaDrugogProizvoda.',00KM</td>
    </tr>

  </table>';
}elseif($vrstaPrvogProizvoda == 'racunar' and $vrstaDrugogProizvoda == 'racunar'){
    echo'<table>
      <tr>
        <th style="width:50%">Osobine</th>
        <th>'.$nazivPrvogProizvoda.'</th>
        <th>'.$nazivDrugogProizvoda.'</th>
      </tr>
      <tr>
        <td>Procesor</td>
        <td>'.$nizOpisaPrvogProizvoda[0].'</td>
        <td>'.$nizOpisaDrugogProizvoda[0].'</td>
      </tr>
      <tr>
        <td>Matična ploča</td>
        <td>'.$nizOpisaPrvogProizvoda[1].'</td>
        <td>'.$nizOpisaDrugogProizvoda[1].'</td>
      </tr>
      <tr>
        <td>Grafička kartica</td>
        <td>'.$nizOpisaPrvogProizvoda[2].'</td>
        <td>'.$nizOpisaDrugogProizvoda[2].'</td>
      </tr>
      <tr>
        <td>RAM</td>
        <td>'.$nizOpisaPrvogProizvoda[4].'</td>
        <td>'.$nizOpisaDrugogProizvoda[4].'</td>
      </tr>
      <tr>
        <td>Memorija</td>
        <td>'.$nizOpisaPrvogProizvoda[5].'</td>
        <td>'.$nizOpisaDrugogProizvoda[5].'</td>
      </tr>
      <tr>
        <td>Napojna jedinica</td>
        <td>'.$nizOpisaPrvogProizvoda[6].'</td>
        <td>'.$nizOpisaDrugogProizvoda[6].'</td>
      </tr>
      <tr>
        <td>Cijena</td>
        <td>'.$cijenaPrvogProizvoda.',00KM</td>
        <td>'.$cijenaDrugogProizvoda.',00KM</td>
      </tr>
    </table>';
  }else{
    echo '<table>
      <tr>
        <td style = "width:100%;color:red;"><center>Nema atributa koji bi se poredili!</center></td>
      </tr>
    </table>';
  };
  echo '</div>';
?>
