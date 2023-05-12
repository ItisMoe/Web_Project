<?php
require_once('functions.php');

$conn = connectDB2();

$match = $_POST['match'];
$add = $_POST['Add'];
$id = $_POST['d_id'];
$Capacity = $_POST['Capacity'];

$query = "INSERT INTO `carpool`(`DRIVER_ID`, `MATCH_ID`, `LOCATION`, `CAPACITY`, `AVAILABLE`) VALUES ($id,$match,'$add',$Capacity,1)";
$result = mysqli_query($conn, $query);
header("location: More.php")
?>