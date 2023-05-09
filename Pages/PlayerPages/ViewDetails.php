<?php require_once ('../../php/players_retrieval_functions.php'); ?>
<?php
$player_number = $_GET['token'];
$tableName = $_GET['my_table'];
displayPlayerInformation($player_number,$tableName);
?>
