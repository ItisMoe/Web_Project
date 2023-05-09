<?php 
function connectionToDB(){
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
function displaygames($Competition){
    
}
function getMatchDate($ID,$tableName){
    $db=connectionToDB();
    $query = "SELECT `DATE` FROM `".$tableName."`  WHERE (`ID`='".$ID."')";  
    $stmt=$db->query($query);
    while($record=$stmt->fetch()){
        $date_string= $record['DATE'];
    }
    $date = DateTime::createFromFormat('Y-m-d', $date_string);
    $day = $date->format('l'); 
    $month = $date->format('F'); 
    $year = $date->format('Y'); 
    $formatted_date = $day . ', ' . $month . ' ' . $year;
    echo $formatted_date;  
}
function getMatchTime($ID, $tableName) {
    $db = connectionToDB();
    $query = "SELECT `TIME` FROM `".$tableName."` WHERE (`ID`='".$ID."')";
    $stmt = $db->query($query);
    $time = null;

    while ($record = $stmt->fetch()) {
        $time = new DateTime($record['TIME']);
    }

    if ($time) {
        $formatted_time = $time->format('h:i A');
        echo $formatted_time;
    } else {
        return null;
    }
}

function getOpponentsImage($ID,$tableName){
    $db=connectionToDB();
    $query = "SELECT `IMAGELINK` FROM `".$tableName."`  WHERE (`ID`='".$ID."')";  
    $stmt=$db->query($query);
    while($record=$stmt->fetch()){
        $answer= $record['IMAGELINK'];
    }
     $x="../images/opponents_images/";
     $finalanswer=$x.$answer;
     echo  $finalanswer;  
}
function getOpponentsProperty($property,$tableName,$ID){
    $db=connectionToDB();
  $query = "SELECT `".$property."` FROM `".$tableName."`  WHERE (`ID`='".$ID."')";  
  $stmt=$db->query($query);
  while($record=$stmt->fetch()){
      $answer= $record[$property];
   }
  echo $answer;
}
function getOpponentsPropertyReturned($property,$tableName,$ID){
    $db=connectionToDB();
  $query = "SELECT `".$property."` FROM `".$tableName."`  WHERE (`ID`='".$ID."')";  
  $stmt=$db->query($query);
  while($record=$stmt->fetch()){
      $answer= $record[$property];
   }
  return $answer;
}
function  displaySchedule($tableName){
    $db=connectionToDB();
    $query = "SELECT  `ID`FROM `".$tableName."`  WHERE 1";
  $stmt=$db->query($query);
while($record=$stmt->fetch()){
    $ID= $record["ID"];
    displayRow($ID,$tableName);}
 }

function displayRow($ID,$tableName){?>
<div class="container">
            <div class="row">
                <div class="col-lg-8 left-blog-pad">
                    <div class="schedule-text">
                        <h4 class="st-title"><?php getOpponentsProperty('COMPETITION',$tableName,$ID)?></h4>
                        <div class="st-table">
                            <table>
                               <tbody>
                                    <tr>
                                        <?php 
                            
                            if(getOpponentsPropertyReturned('GAME_CONDITION',$tableName,$ID)=="HOME"){?>
                                        <td class="left-team">
                                            <img src="../images/opponents_images/RealMadrid.jpg

                                            " alt="">
                                            <h4>Real Madrid</h4>
                                        </td>
                                        <td class="st-option">
                                            <div class="so-text"><?php getOpponentsProperty('STADIUM',$tableName,$ID);echo "-"; 
                                             getOpponentsProperty('COMPETITION',$tableName,$ID);?></div>
                                            <h4>vs<Br> <?php getMatchTime($ID,$tableName)?></h4>
                                            <div class="so-text"><?php getMatchDate($ID,$tableName)?></div>
                                        </td>
                                        <td class="right-team">
                                        <img src=<?php getOpponentsImage($ID,$tableName)?> alt="opponent">
                                            <h4><?php getOpponentsProperty('OPPONENT_NAME',$tableName,$ID)?></h4>
                                           
                                        </td>
                                    <?php  } 
                                    
                                    else{?>
                                        <td class="left-team">
                                            <img src=<?php getOpponentsImage($ID,$tableName)?> alt="opponent">
                                           
                                            <h4><?php getOpponentsProperty('OPPONENT_NAME',$tableName,$ID)?>
                                                </h4>
                                        </td>
                                        <td class="st-option">
                                            <div class="so-text"><?php getOpponentsProperty('STADIUM',$tableName,$ID);echo "-"; 
                                             getOpponentsProperty('COMPETITION',$tableName,$ID);?></div>
                                            <h4>vs<Br> <?php getMatchTime($ID,$tableName)?></h4>
                                            <div class="so-text"><?php getMatchDate($ID,$tableName)?></div>
                                        </td>
                                        <td class="right-team">
                                        <img src="../images/opponents_images/RealMadrid.jpg
                                            " alt="">
                                            <h4>Real Madrid</h4>
                                        </td><?php }?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
<?php

}

?>