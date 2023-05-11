<?php


function connectintoToDB(){
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
function getNewsfield($property,$ID){
    $db=connectintoToDB();
    $query = "SELECT `".$property."` FROM `news_table`  WHERE (`ID`='".$ID."')";  
    $stmt=$db->query($query);
    while($record=$stmt->fetch()){
        $answer= $record[$property];
     }
    echo $answer;
}
function getNewsDateOfPublication($ID){
    $db=connectintoToDB();
    $query = "SELECT `PUBLISH_DATE` FROM `news_table`  WHERE (`ID`='".$ID."')";  
    $stmt=$db->query($query);
    while($record=$stmt->fetch()){
        $date_string= $record['PUBLISH_DATE'];
    }
    $date = DateTime::createFromFormat('Y-m-d', $date_string);
    $day = $date->format('l'); 
    $month = $date->format('F'); 
    $year = $date->format('Y'); 
    $formatted_date = $day . ', ' . $month . ' ' . $year;
    echo $formatted_date;  
}
function displayNews(){
    $db=connectintoToDB();
    $query = "SELECT * FROM `news_table`  WHERE 1 ";  
    $stmt=$db->query($query);
    while($record=$stmt->fetch()){
        $id= $record['ID'];
        displayNewsBlock($id);
     }
}

function displayNewsBlock($id){?>
    <div class="col-md-6 col-lg-4">
    <div class="post-entry">
      <div class="image">
        <img src=<?php getImageLink($id)?> alt="Image" class="img-fluid">
      </div>
      <div class="text p-4">
        <h2 class="h5 text-black"><a href="displayNews.php?token=<?php echo $id?>"><?php getNewsfield('TITLE',$id)?></a></h2>
        <span class="text-uppercase date d-block mb-3"><small><?php getNewsfield('AUTHOR',$id)?> &bullet; <?php  getNewsDateOfPublication($id) ?></small></span>
        <p class="mb-0"><?php getNewsfield('PART_ONE',$id)?></p>
      </div>
    </div>
</div>          
<?php

}
function getImageLink($ID){
    $db=connectintoToDB();
    $query = "SELECT `IMAGELINK` FROM `news_table`    WHERE (`ID`='".$ID."')";   
    $stmt=$db->query($query);
    while($record=$stmt->fetch()){
        $answer= $record['IMAGELINK'];
    }
     $x="images/news_images/";
     $finalanswer=$x.$answer;
     echo  "../images/messiSmiling.jpg";  
}
?>