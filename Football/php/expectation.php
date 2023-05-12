<?php
require_once('functions.php');

$conn = connectDB2();

$F_ID = $_POST['id'];
$M_ID = $_POST['match'];
$exp = $_POST['Exp'];

$query = "INSERT INTO `expextation`(`FAN_ID`, `MATCH_ID`, `EXPECTATION`) VALUES ($F_ID,$M_ID,'$exp')"; 
$result = mysqli_query($conn, $query);
header("location: More.php");
?>