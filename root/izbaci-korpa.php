<?php
require_once('include/connection.php');
$proizvodId = $_POST['kupi-id'];
$username = $_SESSION['username'];
$item = $_POST['korpa-id'];
$sql = "DELETE FROM korpa WHERE id = '$item'";
$result = mysqli_query($con, $sql);
header('location:korpa.php');
?>
