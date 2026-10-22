<?php
require_once __DIR__ . '/config.php';

$con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
mysqli_set_charset($con, 'utf8');
if(!$con){
  echo "Konekcija sa bazom nije uspjela";
}
?>
