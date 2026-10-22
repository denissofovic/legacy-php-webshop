<?php
session_start();
include('small-handlers/links.php');

 ?>


<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AoT-Computers</title>
  </head>

<body>

<!-- .------------------------------------------HEADER------------------------------------. -->
<nav class="navbar navbar-default " role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php" style="padding-top:0cm"><img src="images/logo5.png" style="padding-top:0"></a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="padding-top:0.3cm">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Početna</a></li>
        <li><a href="racunari.php">Računari</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Komponente<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="procesori.php">Procesori</a></li>
            <li><a href="graficke.php">Grafičke kartice</a></li>
            <li><a href="kucista.php">Kućišta</a></li>
            <li><a href="maticne.php">Matične ploče</a></li>
            <li><a href="ram.php">RAM memorija</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Memorija<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="ssd.php">SSD memorija</a></li>
            <li><a href="hdd.php">HDD memorija</a></li>
            <li><a href="flash.php">Flash memorija</a></li>
            <li class="divider"></li>
            <li><a href="ostalo-memorije.php">Ostalo</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Periferija<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="misevi.php">Miševi</a></li>
            <li><a href="tastature.php">Tastature</a></li>
            <li><a href="zvucnici.php">Zvučnici</a></li>
            <li><a href="kamere.php">Web kamere</a></li>
            <li><a href="slusalice.php">Slušalice</a></li>
            <li><a href="monitori.php">Monitori</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left"  method="post" action="trazi.php">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Pretraga" name="artikal-pretraga">
        </div>
        <button type="submit" name="submit-search" class="btn btn-default" style="height:32px;"><i class="zmdi zmdi-search material-icons-name"></i></button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <?php if(isset($_SESSION['success'])):?>
          <?php
            include('small-handlers/korpa-icon.php');
           ?>
           <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> <span class="caret"></span></a>
           <ul class="dropdown-menu">
          <li><a href="poredjenje.php"><i class="zmdi zmdi-code-setting material-icons-name"></i>  Poređenje</a></li>
            <li class="divider"></li>
          <li><a href="logout.php" name="logout" onclick=""><i class="zmdi zmdi-power material-icons-name"></i>  Odjava</a></li>
          </ul>

      <?php else:?>
        <li class="dropdown">
         <li><a href="login-form.php">Prijava / Registracija</a></li>
      <?php endif; ?>
      <?php if(isset($_SESSION['admin'])):?>
          <li><a href="admin-panel.php" > <span class="glyphicon glyphicon-inbox" aria-hidden="true"></span></a><li>
      <?php endif; ?>
			</ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
</body>


<!-- .---------------------------------------CONTAINER------------------------------------------------------. -->
  <h1 class="display-4"><img src="images/add3.jpg" width="1250" style="margin-top:1.5cm"></h1>
  <?php
  $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  if(strpos($fullUrl,"cart=error") == true){
    echo'<center><div class="alert alert-danger" role="alert" style="width:1250;">
    Morate biti prijavljeni da bi dodali proizvod u korpu <a href="login-form.php">Prijavi se</a> ili <a href="register-form.php">Registruj</a>
    </div></center>';
  } elseif(strpos($fullUrl,"compare=error") == true){
      echo'<center><div class="alert alert-danger" role="alert" style="width:1250;">
      Morate biti prijavljeni da bi dodali proizvod u poređenje <a href="login-form.php">Prijavi se</a> ili <a href="register-form.php">Registruj</a>
      </div></center>';
    }
   ?>

</body>

</html>
