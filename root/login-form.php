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
    <div class="main">
              <section class="sign-in">
                  <div class="container">
                      <div class="signin-content">
                          <div class="signin-image">
                              <figure><img src="images/signup-image.png" alt="sing up image"></figure>
                              <a href="register-form.php" class="signup-image-link">Napravi novi nalog</a>
                          </div>
                          <div class="signin-form">
                              <h2 class="form-title">Prijava</h2>
                              <form method="POST" class="register-form" id="login-form" action="login.php">
                                  <div class="form-group">
                                      <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                      <input type="text" name="username" id="your_name" placeholder="Korisničko ime"
                                        value="<?php if(isset($_COOKIE['member_login'])){
                                          echo $_COOKIE['member_login'];
                                        } ?>"/>
                                  </div>
                                  <div class="form-group">
                                      <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                      <input type="password" name="lozinka" id="your_pass" placeholder="Lozinka"
                                      value="<?php if(isset($_COOKIE['member_password'])){
                                        echo $_COOKIE['member_password'];
                                      } ?>"/>
                                  </div>
                                  <div class="form-group">
                               
                              </div>
                                  <div class="form-group form-button">
                                      <input type="submit" name="signin" id="signin" class="form-submit" style="background-color:#000" value="Prijava"/>
                                  </div>

                                  <?php
                                  $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                                  if(strpos($fullUrl,"signin=error") == true){
                                    echo '<p class="error" style="color:red">Korisničko ime ili lozinka su netačni!</p>';
                                    exit();
                                  }elseif(strpos($fullUrl,"signin=banned") == true){
                                      echo '<p class="error" style="color:red">Vaš nalog je banovan!</p>';
                                      exit();
                                    };
                                   ?>

                              </form>
                          </div>
                      </div>
                  </div>


              </section>
          </div>
</body>

</html>
