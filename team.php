<?php require_once("php/common_sections.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sportz &mdash; Colorlib Sports Team Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">


    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    <style>
.my-container {
  width: 200px;
  height: 200px;
  transition: all 0.3s ease-in-out;
  

}
.my-container:hover {
  transform: scale(1.2); /* increase scale to 1.2 on hover */
  cursor: pointer;
}


      </style>
    
  </head>
  <body>
  <div class="site-wrap">   
     <?php commonHeader()?>
     <?php
  $Title="Here you can view Our Fabulous Team";
  $description="Our squad is made of 24 word class players from all over the world.We all unite under one goal, which is winning for our club";
  $imageLink="images/messiBasht.jpg";
 commonPartTeamMatches($Title,$description,$imageLink)?>
    </div>


    <div class="site-section"  >
      <div class="container" >
        <div class="row">
          <div class="col-md-12 text-center mb-5">
            <h2 class="text-black">Team</h2>
          </div>
        </div>
        <div class="row" >
        <a href="home.php">
          <div class="my-container">
            <div class="mb-4 mb-lg-0 col-6 col-md-4 col-lg-2 text-center">
            <div class="player mb-5">
              <span class="team-number">10</span>
              <img src="images/img_1_sq.jpg" alt="Image" class="img-fluid image rounded-circle">
              <h2>GOAL KEEPERS</h2>
              
            </div>
          </div>
        </div></a>
          <a href="home.php">
            <div class="my-container">
          <div class="mb-4 mb-lg-0 col-6 col-md-4 col-lg-2 text-center">
            <div class="player mb-5">
              <span class="team-number">4</span>
              <img src="images/img_4_sq.jpg" alt="Image" class="img-fluid image rounded-circle">
              <h2>DEFENDERS</h2>
              
            </div>
          </div>
          </div></a>
          <a href="home.php">
          <div class="my-container">
          <div class="mb-4 mb-lg-0 col-6 col-md-4 col-lg-2 text-center">
            <div class="player mb-5">
              <span class="team-number">8</span>
              <img src="images/img_3_sq.jpg" alt="Image" class="img-fluid image rounded-circle">
              <h2>MIDFIELDERS</h2>
              
            </div>
          </div>
</div></a>
<a href="home.php">
<div class="my-container">
  <div class="mb-4 mb-lg-0 col-6 col-md-4 col-lg-2 text-center">

            <div class="player mb-5">
              <span class="team-number">5</span>
              <img src="images/img_1_sq.jpg" alt="Image" class="img-fluid image rounded-circle">
              <h2>FORWARDS</h2>
              
            </div>
          </div>
          </div>
</a>
    </div>

        </div>

    </div>
    <?php footer(); ?>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>
    
  </body>
</html>