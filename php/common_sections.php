<?php

function commonHeader(){
    ?>
    <header>
  <nav class="header-nav">
    <ul class="header-nav-list">
      <li class="header-nav-item"><a href="home.php" class="header-nav-link">HOME</a></li>
      <li class="header-nav-item"><a href="#" class="header-nav-link">SHOP</a></li>
      <li class="header-nav-item"><a href="team.php" class="header-nav-link">TEAM</a></li>
      <li class="header-nav-item"><a href="matches.php" class="header-nav-link">MATCHES</a></li>
      <li class="header-nav-item"><a href="#" class="header-nav-link">PROFILE</a></li>
    </ul>
  </nav>
</header>


<?php }

function commonPartTeamMatches($Title,$description,$imageLink){?>
<!-- this funcion represents the common part of the background image and words between team and matches -->
    <div class="site-blocks-cover overlay" style="background-image:url(<?php echo $imageLink?>);" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center justify-content-start">
        <div class="col-md-6 text-center text-md-left" data-aos="fade-up" data-aos-delay="400">
          <h1><?php echo $Title?></h1>
          <p class="mt-4"><?php echo $description?></p>
        </div>
      </div>
    </div>
  </div>
  
<?php }

function footer(){?>
    <footer class="site-footer border-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="mb-5">
              <h3 class="footer-heading mb-4">About Sportz</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe pariatur reprehenderit vero atque, consequatur id ratione, et non dignissimos culpa? Ut veritatis, quos illum totam quis blanditiis, minima minus odio!</p>
            </div>            
          </div>
          <div class="col-lg-4 mb-5 mb-lg-0">
            <div class="row mb-5">
              <div class="col-md-6 col-lg-6">
                <ul class="list-unstyled">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Privacy Policy</a></li>
                  <li><a href="#">Contact Us</a></li>
                  <li><a href="#">Membership</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
            Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All rights reserved </a>
            </p>
          </div>
        </div>
      </div>
    </footer>
<?php } ?>


