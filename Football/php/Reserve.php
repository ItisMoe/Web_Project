<?php

require_once('functions.php');

$carpool_id = $_POST['carpool_id'];
$id = $_POST['Fan_id'];
$row = $_POST['row'];

AddFan($carpool_id, $_POST['phoneNumber'], $id /* FAN_ID */);
header("location: More.php")
?>