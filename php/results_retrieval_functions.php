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
     $x="images/opponents_images/";
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

function displayResults($Competition){
    $db=connectionToDB();
    $query = "SELECT `ID` FROM `results_table` WHERE `COMPETITION`='".$Competition."'";
    $stmt=$db->query($query);
    while($record=$stmt->fetch()){
    $ID= $record["ID"];
    displayResultsRow($ID,"results_table");}
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
function blockStyle(){?>
<style>
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  background-color: #f2f2f2;
  font-family: Arial, sans-serif;
  font-size: 16px;
}

header {
  background-color: #293241;
  color: #ffffff;
  padding: 20px;
  text-align: center;
  width: 100%;
}

h1 {
  font-size: 2rem;
  font-weight: bold;
}

main {
  margin: 20px auto;
  max-width: 800px;
}

.match-block {
  background-color: #ffffff;
  border-radius: 5px;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
  margin-bottom: 10px;
  overflow: hidden;
  transition: all 0.2   s ease-in-out;
  border-radius: 93px / 65px;
}

.match-block:hover {
  transform: scale(1.02);
}

.match-info {
  display: flex;
  justify-content: space-between;
  padding: 10px;
}

.team-info {
  display: flex;
  align-items: center;
  flex-direction: column;
  padding: 10px;
}

.home-team img,
.away-team img {
    border-radius: 25px;
    width: 50px;
    height: 50px;
    /* background-color: #eec60a; */
    margin-bottom: 5px;
}

.team-name {
  font-size: 1.2rem;
  font-weight: bold;
  text-align: center;
}

.score-info {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding: 10px;
}

.score {
  font-size: 2.5rem;
  font-weight: bold;
  color: #293241;
  margin-bottom: 5px;
}

.match-details {
  font-size: 1rem;
  font-weight: bold;
  color: #7f8fa6;
  text-align: center;
}

.goal-scorers {
  background-color:  #293241;;
  padding: 10px;
  widows: 100%;
  min-height: 130px;
}

.home-team-goals {
  list-style-type: none;
  width: 50%;
  float: left;
}.away-team-goals {
  list-style-type: none;
  width: 50%;
  float: right;
  text-align: right;
}

.goal-scorer {
  font-weight: bold;
  color: var(--header-link-hover-color);


}


  
/* Set a default font size and line height */
html {
  font-size: 16px;
  line-height: 1.5;
}

/* Apply responsive styles for screens smaller than 768px */
@media (max-width: 768px) {
  .match-block {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
  }
  .match-info {
    width: 100%;
    margin-bottom: 1rem;
  }
  .score-info {
    text-align: center;
  }
  .team-info {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 0.5rem;
  }
  .team-info img {
    width: 50%;
    margin-right: 1rem;
  }
  .team-name {
    text-align: center;
  }
  .goal-scorers {
    width: 100%;
    margin-top: 1rem;
  }
  .home-team-goals {
    width: 100%;
    text-align: center;
    margin-bottom: 0.5rem;
  }
  .away-team-goals {
    width: 100%;
    text-align: center;
    margin-bottom: 0.5rem;
  }
  .home-goal {
    float: left;
  }
  .away-goal {
    float: right;
  }
  /* Media queries for screens smaller than 768px */
@media (max-width: 767px) {
    /* Adjustments to the match block container */
    .match-block {
        display: flex;
        flex-direction: column;
    }

    /* Adjustments to the team info and score info containers */
    .team-info, .score-info {
        width: 100%;
        text-align: center;
    }

    /* Adjustments to the away team container */
    .away-team {
        margin-top: 1em;
    }

    /* Adjustments to the goal scorers container */
    .goal-scorers {
        width: 100%;
        margin-top: 1em;
    }

    /* Adjustments to the home team goals container */
    .home-team-goals {
        width: 100%;
        float: none;
    }

    /* Adjustments to the away team goals container */
    .away-team-goals {
        width: 100%;
        float: none;
    }
}

}


  </style>
<?php }
function displayResultsRow($ID,$tableName){
blockStyle();?>
       <?php if(getOpponentsPropertyReturned('GAME_CONDITION',$tableName,$ID)=="HOME"){?>
<main>
    <div class="match-block">
			<div class="match-info">
				<div class="team-info home-team">
					<img src="images/logo.png" alt="Home Team Logo">
					<p class="team-name">The Invincibles</p>
				</div>
				<div class="score-info">
					<p class="score"><?php getOpponentsProperty('TEAM_SCORE',$tableName,$ID) ?> : <?php getOpponentsProperty('OPPONENT_SCORE',$tableName,$ID) ?></p>
					<p class="match-details"><?php getOpponentsProperty('GAME_WEEK',$tableName,$ID) ?> |<?php getMatchDate($ID,$tableName)?></p>
				</div>
				<div class="team-info away-team">
					<img src=<?php  getOpponentsImage($ID,$tableName)?> alt="Away Team Logo">
					<p class="team-name"><?php getOpponentsProperty('OPPONENT_NAME',$tableName,$ID) ?></p>
				</div>
			</div>
			<div class="goal-scorers" style="width:100%">
				<div class="home-team-goals" style="width:50%;float:left">
					<li style="color:#F0BE48"><span class="goal-scorer" style="float:left">Goal Scorer Name</span> (15')</li>
</div>
			<div class="away-team-goals" style="width:50%;float:right">
					<li style="color:#F0BE48"><span class="goal-scorer" style="float right">Goal Scorer Name</span> (32')</li>
				</div>
		</div>
	</main>
        <?php }
             else{?>
             <main>
    <div class="match-block">
			<div class="match-info">
				<div class="team-info home-team">
					<img src="images/logo.png" alt="Home Team Logo">
					<p class="team-name">The Invincibles</p>
				</div>
				<div class="score-info">
					<p class="score"><?php getOpponentsProperty('TEAM_SCORE',$tableName,$ID) ?> : <?php getOpponentsProperty('OPPONENT_SCORE',$tableName,$ID) ?></p>
					<p class="match-details"><?php getOpponentsProperty('GAME_WEEK',$tableName,$ID) ?> |<?php getMatchDate($ID,$tableName)?></p>
				</div>
				<div class="team-info away-team">
					<img src=<?php  getOpponentsImage($ID,$tableName)?> alt="Away Team Logo">
					<p class="team-name"><?php getOpponentsProperty('OPPONENT_NAME',$tableName,$ID) ?></p>
				</div>
			</div>
			<div class="goal-scorers" style="width:100%">
				<div class="home-team-goals" style="width:50%;float:left">
					<li style="color:#F0BE48"><span class="goal-scorer" style="float:left">Goal Scorer Name</span> (15')</li>
</div>
			<div class="away-team-goals" style="width:50%;float:right">
					<li style="color:#F0BE48"><span class="goal-scorer" style="float right">Goal Scorer Name</span> (32')</li>
				</div>
		</div>
	</main>
<?php }  } 


?>