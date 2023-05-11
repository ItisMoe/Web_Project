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

function displayResultsRow($ID,$tableName){
        if(getOpponentsPropertyReturned('GAME_CONDITION',$tableName,$ID)=="HOME"){?>
<main>
    <div class="match-block">
			<div class="match-info">
				<div class="team-info home-team">
					<img  class="icon" src="../images/logo.png" alt="Home Team Logo">
					<p class="team-name">The Invincibles</p>
				</div>
				<div class="score-info">
					<p class="score"><?php getOpponentsProperty('TEAM_SCORE',$tableName,$ID) ?> : <?php getOpponentsProperty('OPPONENT_SCORE',$tableName,$ID) ?></p>
					<p class="match-details"><?php getOpponentsProperty('GAME_WEEK',$tableName,$ID) ?> |<?php getMatchDate($ID,$tableName)?></p>
				</div>
				<div class="team-info away-team">
					<img  class="icon" src=<?php  getOpponentsImage($ID,$tableName)?> alt="Away Team Logo">
					<p class="team-name"><?php getOpponentsProperty('OPPONENT_NAME',$tableName,$ID) ?></p>
				</div>
			</div>
			<div class="goal-scorers" style="width:100%">
				<div class="home-team-goals" style="width:50%;float:left">
					<li style="color:#F0BE48"><span class="goal-scorer" style="float:left"><?php getOpponentsProperty('TEAM_SCORERS',$tableName,$ID) ?></span></li>
</div>
			<div class="away-team-goals" style="width:50%;float:right">
					<li style="color:#F0BE48"><span class="goal-scorer" style="float right"><?php getOpponentsProperty('OPPONENT_SCORERS',$tableName,$ID) ?></span> </li>
				</div>
		</div>
	</main>
        <?php }
             else{?>
             <main>
    <div class="match-block">
			<div class="match-info">
				<div class="team-info home-team">
					<img  src=<?php  getOpponentsImage($ID,$tableName)?> alt="Home Team Logo">
					<p class="team-name"><?php getOpponentsProperty('OPPONENT_NAME',$tableName,$ID) ?></p>
				</div>
				<div class="score-info">
        <p class="score"><?php getOpponentsProperty('TEAM_SCORE',$tableName,$ID) ?> : <?php getOpponentsProperty('OPPONENT_SCORE',$tableName,$ID) ?></p>
					<p class="match-details"><?php getOpponentsProperty('GAME_WEEK',$tableName,$ID) ?> |<?php getMatchDate($ID,$tableName)?></p>
				</div>
				<div class="team-info away-team">
					<img  src="../images/logo.png" alt="Away Team Logo">
					<p class="team-name">The Invincibles</p>
				</div>
			</div>
			<div class="goal-scorers" style="width:100%">
				<div class="home-team-goals" style="width:50%;float:left">
					<li style="color:#F0BE48"><span class="goal-scorer" style="float:left"><?php getOpponentsProperty('OPPONENT_SCORERS',$tableName,$ID) ?></span></li>
</div>
			<div class="away-team-goals" style="width:50%;float:right">
					<li style="color:#F0BE48"><span class="goal-scorer" style="float right"><?php getOpponentsProperty('TEAM_SCORERS',$tableName,$ID) ?></span> </li>
				</div>
		</div>
	</main>
<?php }  } 
function displayMacthessRow($ID,$tableName){
   if(getOpponentsPropertyReturned('GAME_CONDITION',$tableName,$ID)=="HOME"){?>
  <main>
      <div class="match-block">
        <div class="match-info">
          <div class="team-info home-team">
            <img  class="icon" src="../images/logo.png" alt="Home Team Logo">
            <p class="team-name">The Invincibles</p>
          </div>
          <div class="score-info">
            <p class="score">-vs-</p>
            <p class="match-details"><?php getOpponentsProperty('GAME_WEEK',$tableName,$ID) ?> |<?php getMatchDate($ID,$tableName)?></p>
            <p class="score"><?php getMatchTime($ID,$tableName)?></p>
          </div>
          <div class="team-info away-team">
            <img  class="icon" src=<?php  getOpponentsImage($ID,$tableName)?> alt="Away Team Logo">
            <p class="team-name"><?php getOpponentsProperty('OPPONENT_NAME',$tableName,$ID) ?></p>
          </div>
        </div>
    </main>
          <?php }
               else{?>
               <main>
               <div class="match-block">
        <div class="match-info">
          <div class="team-info home-team">
            <img  class="icon" src=<?php getOpponentsImage($ID,$tableName)?> alt="Home Team Logo">
            <p class="team-name"><?php getOpponentsProperty('OPPONENT_NAME',$tableName,$ID) ?></p>
          </div>
          <div class="score-info">
            <p class="score">-vs-</p>
            <p class="match-details"><?php getOpponentsProperty('GAME_WEEK',$tableName,$ID) ?> |<?php getMatchDate($ID,$tableName)?></p>
            <p class="score"><?php getMatchTime($ID,$tableName)?></p>
          </div>
          <div class="team-info away-team">
            <img  class="icon" src="../images/logo.png" alt="Away Team Logo">
            <p class="team-name">The Invincibles</p>
          </div>
        </div>
    </main>
  <?php }  }

  function displayComingMatchRow($ID,$tableName){
     if(getOpponentsPropertyReturned('GAME_CONDITION',$tableName,$ID)=="HOME"){?>
    <main>
        <div class="match-block">
          <div class="match-info">
            <div class="team-info home-team">
              <img  class="icon" src="../images/logo.png" alt="Home Team Logo">
              <p class="team-name">The Invincibles</p>
            </div>
            <div class="score-info">
              <p class="score">-vs-</p>
              <p class="match-details"><?php getOpponentsProperty('GAME_WEEK',$tableName,$ID) ?> |<?php getMatchDate($ID,$tableName)?></p>
              <p class="score"><?php getMatchTime($ID,$tableName)?></p>
            </div>
            <div class="team-info away-team">
              <img  class="icon" src=<?php  getOpponentsImage($ID,$tableName)?> alt="Away Team Logo">
              <p class="team-name"><?php getOpponentsProperty('OPPONENT_NAME',$tableName,$ID) ?></p>
            </div>
          </div>
      </main>
            <?php }
                 else{?>
                 <main>
                 <div class="match-block">
          <div class="match-info">
            <div class="team-info home-team">
              <img  class="icon" src=<?php getOpponentsImage($ID,$tableName)?> alt="Home Team Logo">
              <p class="team-name"><?php getOpponentsProperty('OPPONENT_NAME',$tableName,$ID) ?></p>
            </div>
            <div class="score-info">
              <p class="score">-vs-</p>
              <p class="match-details"><?php getOpponentsProperty('GAME_WEEK',$tableName,$ID) ?> |<?php getMatchDate($ID,$tableName)?></p>
              <p class="score"><?php getMatchTime($ID,$tableName)?></p>
            </div>
            <div class="team-info away-team">
              <img  class="icon" src="../images/logo.png" alt="Away Team Logo">
              <p class="team-name">The Invincibles</p>
            </div>
          </div>
      </main>
    <?php }  }
function displayResults($Competition){
  $db=connectionToDB();
  $query = "SELECT `ID` FROM `results_table` WHERE `COMPETITION`='".$Competition."'";
  $stmt=$db->query($query);
  while($record=$stmt->fetch()){
  $ID= $record["ID"];
  displayResultsRow($ID,"results_table");}
}
function displayMatches($Competition){
$db=connectionToDB();
$query = "SELECT `ID` FROM `schedule_table` WHERE `COMPETITION`='".$Competition."'";
$stmt=$db->query($query);
while($record=$stmt->fetch()){
$ID= $record["ID"];
displayMacthessRow($ID,"schedule_table");}
} 
function getComingMatchID() {
  $db = connectionToDB();
  $query = "SELECT `ID` FROM `schedule_table` WHERE 1 ORDER BY `DATE` ASC LIMIT 1";
  $stmt = $db->query($query);
  if ($record = $stmt->fetch()) {
    return $record['ID'];
  } 
}
function displayComingMatch(){
  ?>
      <div class="row mb-5 ">
          <div class="col-md-12" >
            <div class="border mb-3 rounded d-block d-lg-flex align-items-center p-3 next-match" style="width:740px">
              <div style="font-weight:1000;" class="mr-auto order-md-1 w-60 text-center text-lg-left mb-3 mb-lg-0">
                <span style="border-radius: 10px;background-color: black;font-size:xx-large;color:red">Our COMING GAME IS IN:</span><?php timeCountDown()?>
                <?php $id=getComingMatchID() ;displayComingMatchRow($id,'schedule_table')?>
              </div>
            </div>
          </div>
        </div>
<?php }
function timeCountDown(){
  $db = connectionToDB();
  $query = "SELECT `DATE` FROM `schedule_table` WHERE 1 ORDER BY `DATE` ASC LIMIT 1";
  $stmt = $db->query($query);
  if ($record = $stmt->fetch()) {
    $date= $record['DATE'];
  } 
?>
<div id="countdown"></div>
<script>
var countdownDate = new Date("<?php echo $date; ?>").getTime();
var countdownInterval = setInterval(function() {
  var now = new Date().getTime();
  var distance = countdownDate - now;
  var weeks = Math.floor(distance / (1000 * 60 * 60 * 24 * 7));
  var days = Math.floor((distance % (1000 * 60 * 60 * 24 * 7)) / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  document.getElementById("countdown").innerHTML = 
    (weeks < 10 ? "0" + weeks : weeks) + ":weeks " + 
    (days < 10 ? "0" + days : days) + ":days " + 
    (hours < 10 ? "0" + hours : hours) + ":hours " + 
    (minutes < 10 ? "0" + minutes : minutes) + ":minutes " + 
    (seconds < 10 ? "0" + seconds : seconds) + ":seconds ";
  if (distance < 0) {
    clearInterval(countdownInterval);
    document.getElementById("countdown").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
<?php 
}
function getLastMatchId(){
    $db = connectionToDB();
    $query = "SELECT `ID` FROM `results_table` WHERE 1 ORDER BY `DATE` DESC LIMIT 1";
    $stmt = $db->query($query);
    if ($record = $stmt->fetch()) {
      return $record['ID'];
    } 
  }
function displayLatestMatch(){
  $id=getLastMatchId();
  if(getOpponentsPropertyReturned('GAME_CONDITION','results_table',$id)=="HOME"){?>
  <div class="row">
  <div class="col-md-12">
    <div class="bg-image overlay-success rounded mb-5" style="background-image: url('../images/hero_bg_1.jpg');" data-stellar-background-ratio="0.5">
  <div class="row align-items-center">
    <div class="col-md-12 col-lg-4 mb-4 mb-lg-0">

      <div class="text-center text-lg-left">
        <div class="d-block d-lg-flex align-items-center">
          <div class="image mx-auto mb-3 mb-lg-0 mr-lg-3">
            <img src="../images/logo.png" alt="Image" class="img-fluid">
          </div>
          <div class="text">
            <h3 class="h5 mb-0 text-black">The Invinvibles</h3>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12 col-lg-4 text-center mb-4 mb-lg-0">
      <div class="d-inline-block">
        <p class="mb-2"><small class="text-uppercase text-black font-weight-bold"><?php  getOpponentsProperty('COMPETITION','results_table',$id)?> &mdash;<?php  getOpponentsProperty('GAME_WEEK','results_table',$id)?> </small></p>
        <div class="bg-black py-2 px-4 mb-2 text-white d-inline-block rounded"><span class="h3"><?php getOpponentsProperty('TEAM_SCORE','results_table',$id)?>:<?php getOpponentsProperty('OPPONENT_SCORE','results_table',$id)?></span></div>
        <p class="mb-0"><small class="text-uppercase text-black font-weight-bold"><?php getMatchDate($id,'results_table')?>/ <?php getMatchTime($id, 'results_table')?></small></p>
      </div>
    </div>

    <div class="col-md-12 col-lg-4 text-center text-lg-right">
      <div class="">
        <div class="d-block d-lg-flex align-items-center">
          <div class="image mx-auto ml-lg-3 mb-3 mb-lg-0 order-2">
            <img src=<?php getOpponentsImage($id,'results_table') ?>alt="Image" class="img-fluid">
          </div>
          <div class="text order-1">
            <h3 class="h5 mb-0 text-black"><?php getOpponentsProperty('OPPONENT_NAME','results_table',$id)?></h3>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  </div>
</div>
<?php

  }
  else{ ?>
    <div class="row">
    <div class="col-md-12">
      <div class="bg-image overlay-success rounded mb-5" style="background-image: url('../images/hero_bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="row align-items-center">
      <div class="col-md-12 col-lg-4 mb-4 mb-lg-0">
  
        <div class="text-center text-lg-left">
          <div class="d-block d-lg-flex align-items-center">
            <div class="image mx-auto mb-3 mb-lg-0 mr-lg-3">
              <img src=<?php getOpponentsImage($id,'results_table')?> alt="Image" class="img-fluid">
            </div>
            <div class="text">
              <h3 class="h5 mb-0 text-black"><?php getOpponentsProperty('OPPONENT_NAME','results_table',$id)?></h3>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12 col-lg-4 text-center mb-4 mb-lg-0">
        <div class="d-inline-block">
          <p class="mb-2"><small class="text-uppercase text-black font-weight-bold"><?php  getOpponentsProperty('COMPETITION','results_table',$id)?> &mdash;<?php  getOpponentsProperty('GAME_WEEK','results_table',$id)?> </small></p>
          <div class="bg-black py-2 px-4 mb-2 text-white d-inline-block rounded"><span class="h3"><?php getOpponentsProperty('OPPONENT_SCORE','results_table',$id)?>:<?php getOpponentsProperty('TEAM_SCORE','results_table',$id)?></span></div>
          <p class="mb-0"><small class="text-uppercase text-black font-weight-bold"><?php getMatchDate($id,'results_table')?>/ <?php getMatchTime($id, 'results_table')?></small></p>
        </div>
      </div>
  
      <div class="col-md-12 col-lg-4 text-center text-lg-right">
        <div class="">
          <div class="d-block d-lg-flex align-items-center">
          <div class="image mx-auto mb-3 mb-lg-0 mr-lg-3">
            <img src="../images/logo.png" alt="Image" class="img-fluid">
          </div>
            <div class="text order-1">
              <h3 class="h5 mb-0 text-black">The Invinvibles</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    </div>
  </div>
  <?php
  
    }


   }
?>
