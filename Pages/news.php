<?php require_once("../php/common_sections.php");?>
<?php require_once("../php/results_retrieval_functions.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sportz &mdash; Colorlib Sports Team Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="../fonts/icomoon/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <link rel="stylesheet" href="../css/jquery-ui.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/aos.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/my_styles.css" />
    <link rel="stylesheet" href="../css/matchesStyle.css" />
    <link rel="stylesheet" href="../css/header.css" />

  </head>
  <body>
  <div class="site-wrap">
  <?php Head()?>
  <?php
  $Title="Here you can view Our Recent News";
  $description="This page is dedicated to help you stay updated with the latest events happening in our club.We appreciate your time for reading.";
  $imageLink="../images/messiBasht.jpg";
 commonPartTeamMatches($Title,$description,$imageLink)?>
    </div>   
    <div class="site-section site-blocks-vs">
      <div class="container">
      <div class="row mb-5">
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="post-entry">
              <div class="image">
                <img src="../images/img_1.jpg" alt="Image" class="img-fluid">
              </div>
              <div class="text p-4">
                <h2 class="h5 text-black"><a href="#">RealMad vs Striker Who Will Win?</a></h2>
                <span class="text-uppercase date d-block mb-3"><small>By Colorlib &bullet; Sep 25, 2018</small></span>
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat beatae doloremque, ex corrupti perspiciatis.</p>
              </div>
            </div>
          </div>
</div>
      
      </div>
    </div>
    <?php footer(); ?>
  </div>
  <script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../js/jquery-ui.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/owl.carousel.min.js"></script>
  <script src="../js/jquery.stellar.min.js"></script>
  <script src="../js/jquery.countdown.min.js"></script>
  <script src="../js/jquery.magnific-popup.min.js"></script>
  <script src="../js/aos.js"></script>

  <script src="../js/main.js"></script>
    
  </body>
</html>