<?php
include('small-handlers/links.php');
include('small-handlers/links2.php');
session_start();
echo '<div class="alert alert-warning" role="alert" >
  <center>Vaš nalog nije verifikovan!Unesite verifikacijski kod koji Vam je poslan na email</div></center>';
echo '<section class="sign-in">
    <div class="container">
        <div class="signin-content">
            <div class="signin-image">
                <figure><img src="images/signup-image.png" alt="sing up image"></figure>
                <a href="register-form.php" class="signup-image-link">Napravi novi nalog</a>
            </div>
            <div class="signin-form">
                <h2 class="form-title">Verifikacija</h2>
                <form method="POST" class="register-form" id="login-form" action="verifikuj.php">
                    <div class="form-group">
                        <label for="your_name"><i class="zmdi zmdi-lock-outline"></i></label>
                        <input type="text" name="kod-unos" id="your_name" placeholder=""/>
                    </div>
                  <div class="form-group form-button">
                        <input type="submit" name="signin" id="signin" class="form-submit" style="background-color:#000" value="Potvrdi"/>
                    </div>';
                    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                    if(strpos($fullUrl,"verify=error") == true){
                      echo '<p class="error" style="color:red">Kod je netačan!</p>';
                      exit();}
                echo'</form>
            </div>
        </div>
    </div>


</section>

</div>';

?>
