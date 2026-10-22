<?php
  session_start();
  include_once('small-handlers/links.php');
  include_once('small-handlers/links2.php');
 ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AoT Computers Prijava</title>
</head>

<body>
  <section class="signup">
      <div class="container">
          <div class="signup-content">
              <div class="signup-form" style="width:500;margin-left:4.5cm;">
                  <h2 class="form-title">Registracija  <img src="images/signup-image.png" alt="sing up image" width="125" height="125"></h2>
                  <form method="POST" class="register-form" id="register-form" action="register.php">
                      <div class="form-group">
                          <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                          <input type="text" name="ime" id="name" placeholder="Ime" required/>
                      </div>
                      <div class="form-group">
                          <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                          <input type="text" name="prezime" id="name" placeholder="Prezime" required/>
                      </div>
                      <div class="form-group">
                          <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                          <input type="text" name="username" id="name" placeholder="Korisničko ime" required/>
                      </div>
                      <div class="form-group">
                          <label for="email"><i class="zmdi zmdi-email"></i></label>
                          <input type="email" name="email" id="email" placeholder="Email" required/>
                      </div>
                      <div class="form-group">
                          <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                          <input type="password" name="lozinka" id="pass" placeholder="Lozinka" required/>
                      </div>
                      <div class="form-group">
                          <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                          <input type="password" name="potvrda-lozinka" id="re_pass" placeholder="Ponovite lozinku" required/>
                      </div>
                      <div class="form-group">
                        <label for="adresa"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="adresa" id="re_pass" placeholder="Adresa stanovanja" required/>
                      </div>
                      <div class="form-group">
                        <label for="telefon"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="tel" id="phone" name="telefon" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" class="register-input" required placeholder="000-000-000">
                      </div>
                      <div class="form-group form-button">
                          <input type="submit" name="signup" id="signup" class="form-submit" style="background-color:#000" value="Registracija"/>
                      </div>
                      <?php
                        $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                        if(strpos($fullUrl,"signup=invalid-password") == true){
                            echo '<p class="error" style="color:red;">Lozinke se ne podudaraju!</p>';
                            exit();
                          }elseif(strpos($fullUrl,"signup=already-taken") == true){
                              echo '<p class="error" style="color:red;">Korisničko ime ili email su zauzeti!</p>';
                              exit();
                            }
                       ?>
                  </form>
              </div>
          </div>
      </div>
  </section>

</body>
