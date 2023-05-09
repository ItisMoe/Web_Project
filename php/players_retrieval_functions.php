<?php

function connectToDB(){
  $dbhost="127.0.0.1";
    $dbname="football_club";
    $dbuser="root";
    $dbpass="";
    $db=null;
    try{
        $db= new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
    }
    catch(PDOException $e){
        print "Error!:".$e->getMessage()."<br/>";
        die();
    }
    return $db;
}
function  imageLink($PLAYER_NUMBER,$tableName){
    $dbhost="127.0.0.1";
    $dbname="football_club";
    $dbuser="root";
    $dbpass="";
    $db=null;
    try{
        $db= new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
    }
    catch(PDOException $e){
        print "Error!:".$e->getMessage()."<br/>";
        die();
    }
    $query = "SELECT `IMAGELINK` FROM `".$tableName."` WHERE (`PLAYERNUMBER`=$PLAYER_NUMBER)";
    $stmt=$db->query($query);
    while($record=$stmt->fetch()){
      $answer= $record["IMAGELINK"];
   }
   $x="../../images/players_images/";
   $finalanswer=$x.$answer;
   echo  $finalanswer;  
}

function getPlayerAge($PLAYER_NUMBER,$tableName){
    $db=connectToDB(); 
    $query = "SELECT `DATEOFBIRTH` FROM `".$tableName."`  WHERE (`PLAYERNUMBER`='".$PLAYER_NUMBER."')";
    $stmt=$db->query($query);
    while($record=$stmt->fetch()){
        $answer= $record["DATEOFBIRTH"];
        $birthDate = new DateTime($answer);
        $today = new DateTime();
        $age = $today->diff($birthDate)->y;
   }
    echo $age;
}
function getPlayerProperty($PLAYER_NUMBER,$property,$tableName){
  $db=connectToDB();
  $query = "SELECT `".$property."` FROM `".$tableName."`  WHERE (`PLAYERNUMBER`='".$PLAYER_NUMBER."')";  
  $stmt=$db->query($query);
  while($record=$stmt->fetch()){
      $answer= $record[$property];
   }
  echo $answer;
}
function displayPlayerInformation($PLAYER_NUMBER,$tableName){  
?>
<html>
<?php logo() ?>
  <head>
    <title>Player Information</title>
    <link rel="stylesheet" href="../../css/displayPlayers.css">

</head>
  <body>
    <header class="header">
      <h1 class="title">Player Information</h1>
    </header>
    <div class="table-wrapper">
      <table class="table">
        <tr>
          <th>Name:</th>
          <td><?php
          getPlayerProperty($PLAYER_NUMBER,'PLAYERNAME',$tableName)?></td>
        </tr>
        <tr>
          <th>Age:</th>
          <td><?php getPlayerAge($PLAYER_NUMBER,$tableName)?></td>
        </tr>
        <tr>
          <th>Email:</th>
          <td><?php getPlayerProperty($PLAYER_NUMBER,'EMAIL',$tableName)?></td>
        </tr>
        <tr>
          <th>Nationality:</th>
          <td> <?php getPlayerProperty($PLAYER_NUMBER,'NATIONALITY',$tableName)?></td>
        </tr>
        <tr>
          <th>Injury History:</th>
          <td><?php getPlayerProperty($PLAYER_NUMBER,'INJURYHISTORY',$tableName)?></td>
        </tr>
        <tr>
          <th>Height:</th>
          <td><?php getPlayerProperty($PLAYER_NUMBER,'HEIGHT',$tableName)?> m</td>
        </tr>
        <tr>
          <th>Weight:</th>
          <td><?php getPlayerProperty($PLAYER_NUMBER,'WEIGHT',$tableName)?> lbs</td>
        </tr>
        <?php if($tableName=="goalkeepers_table"){ keeperPart($PLAYER_NUMBER,$tableName);
       }
        else{
          ?>
           <tr>
            <th>PACE:</th>
            <td><?php getPlayerProperty($PLAYER_NUMBER,'PACE',$tableName)?></td>
          </tr>
          <tr>
            <th>SHOOTING:</th>
            <td><?php getPlayerProperty($PLAYER_NUMBER,'SHOOTING',$tableName)?></td>
          </tr>
          <tr>
            <th>PASSING:</th>
            <td><?php getPlayerProperty($PLAYER_NUMBER,'PASSING',$tableName)?></td>
          </tr> 
          <tr>
            <th>PHYSICALITY:</th>
            <td><?php getPlayerProperty($PLAYER_NUMBER,'PHYSICALITY',$tableName)?></td>
          </tr>
          <tr>
            <th>HEADING:</th>
            <td><?php getPlayerProperty($PLAYER_NUMBER,'HEADING',$tableName)?></td>
          </tr>
          <tr>
            <th>COMPOSURE:</th>
            <td><?php getPlayerProperty($PLAYER_NUMBER,'COMPOSURE',$tableName)?></td>
          </tr> 
          <tr>
            <th>OTHER FAVORITE POSITIONS:</th>
            <td><?php getPlayerProperty($PLAYER_NUMBER,'OTHERFAVORITEPOSITIONS',$tableName)?></td>
          </tr>
          <tr> 
          <?php } ?>
          <th>Communication Skills:</th>
          <td><?php getPlayerProperty($PLAYER_NUMBER,'COMMUNICATIONSKILLS',$tableName)?></td>
        </tr>
        <tr>
          <th>Leadership Skills</th>
          <td><?php getPlayerProperty($PLAYER_NUMBER,'LEADERSHIPSKILLS',$tableName)?></td>
        </tr>
      </table>
    </div>
    <button class="secondary-button" style="float:left;position:fixed;left:0;bottom:0"><a href="../ViewPlayersInfo.php">Back to home</a></button>
  </body>
</html>
<?php
}
function backtoPlayers(){?>
  <button class="secondary-button" style="float:left;position:fixed;left:0;bottom:0"><a href="Players.php">Back</a></button>
<?php
}
function displayPlayers($position,$tableName){
  $db=connectToDB();
  $query = "SELECT `PLAYERNUMBER` FROM `$tableName` WHERE (`POSITION`='".$position."')";
  $stmt=$db->query($query);
  $player_number=0;
  while($record=$stmt->fetch()){
      $player_number=$record["PLAYERNUMBER"];
      displayContainerPlayers($player_number,$tableName);
   }
}
function displayContainerPlayers($player_number,$tableName){?>
    <div class="players-container">
      <div class="player">
        <img src=<?php
      imageLink($player_number,$tableName)?> alt="Player Image">
        <div class="player-info">
          <h2>
            <span class="number"><?php 
        getPlayerProperty($player_number,'PLAYERNUMBER',$tableName);
       ?></span>  <?php getPlayerProperty($player_number,'PLAYERNAME',$tableName);?> </h2>
       <a class="view-details" href="ViewDetails.php?token=<?php echo $player_number?>&my_table=<?php echo $tableName ?>">View Details</a>
        </div>
      </div>
    </div>

    <?php }

function logo(){?>

  <link rel="icon" type="image/x-icon" href="../assets/Web logo.jpeg" /><?php
}
function keeperPart($PLAYER_NUMBER,$tableName){
  ?>
   <tr>
          <th>Diving:</th>
          <td><?php getPlayerProperty($PLAYER_NUMBER,'DIVING',$tableName)?></td>
        </tr>
        <tr>
          <th>Handling:</th>
          <td><?php getPlayerProperty($PLAYER_NUMBER,'HANDLING',$tableName)?></td>
        </tr>
        <tr>
          <th>Kicking:</th>
          <td><?php getPlayerProperty($PLAYER_NUMBER,'KICKING',$tableName)?></td>
        </tr>
        <tr>
          <th>Reflexes:</th>
          <td><?php getPlayerProperty($PLAYER_NUMBER,'REFLEXES',$tableName)?></td>
        </tr>
        <tr>
          <th>Speed:</th>
          <td><?php getPlayerProperty($PLAYER_NUMBER,'SPEED',$tableName)?></td>
        </tr>
        <tr>
          <th>Positioning:</th>
          <td><?php getPlayerProperty($PLAYER_NUMBER,'POSITIONING',$tableName)?></td>
        </tr>
        <tr>
          <?php
}
?>
