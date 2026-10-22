<?php
require_once('include/connection.php');
$itemID = $_POST['proizvod-id'];
$sql = "DELETE FROM korpa WHERE proizvod = '$itemID'";
$result = mysqli_query($con, $sql);
$sql = "DELETE FROM prodaja WHERE proizvod = '$itemID'";
$result = mysqli_query($con, $sql);
$sql = "DELETE FROM poredjenje WHERE proizvod = '$itemID'";
$result = mysqli_query($con, $sql);
$sql = "DELETE FROM poredjenje2 WHERE proizvod = '$itemID'";
$result = mysqli_query($con, $sql);
$sql = "DELETE FROM proizvod WHERE id = '$itemID'";
$result = mysqli_query($con, $sql);
header('location:admin-panel.php');

?>
