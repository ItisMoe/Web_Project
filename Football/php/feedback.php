<?php
require_once('functions.php');

$conn = connectDB2();


$FAN_ID = $_POST['id'];
$fb = $_POST['FB'];

$query = "INSERT INTO `feedback`(`FAN_ID`, `FEEDB`) VALUES ($FAN_ID,'$fb')";
$result = mysqli_query($conn, $query);
header("location: More.php");
?>