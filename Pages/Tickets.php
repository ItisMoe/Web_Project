<!--this page show the matches and their schedule and the prices for each ticket in the stadium 
so the fan can buy online tickets to watch matches-->
<?php
//require the functions that will be used here in this page
    require_once ('../php/functions.php');
session_start();
//if no login done before, the user can not access the page and this will take the user back to the login page directly 
if(!isset($_SESSION["USERNAME"])){
    header("location:../index.php");
}
//when the purchase is successfully done then the system will redirect to the merchandise page and if the redirection is done correctly
//alert with success purchase is given
if (isset($_GET['redirected']) && $_GET['redirected'] == 'true') {
    echo '<script>alert("Purchase done successfully!");</script>';
}
//if there is no enough money or points with the user to purchase the system will redirect the fan to the merchandise page
//and alert with is given with no available money
if (isset($_GET['wrong']) && $_GET['wrong'] == 'true') {
    echo '<script>alert("You do not have enough money in your system!");</script>';
}


?>
<!DOCTYPE html>
<html>
<head>
  <title>Football Match Tickets</title>
  <!--ticket styling common with the merchandise page-->
  <link href="../css/merchandise.css" rel="stylesheet" />
  <!--icon styling used by the tage name <i></i> -->
  <link href="../css/icons.css" rel="stylesheet" />
  <!--ticket page styling-->
  <link href="../css/tickets.css" rel="stylesheet" />
  <!--favicon-->
  <link rel="shortcut icon" href="../images/fav/ticket.png" type="image/x-icon">
<!--special styling for footer-->
  <style>
  footer {
    background-color: #333;
    color: #fff;
    padding: 20px;
    text-align: center;
    font-size: 14px;
}

footer a {
    color: #fff;
    text-decoration: none;
}
  </style>
</head>
<body>
<!-- Navigation that has some paths to different pages in our website-->

<nav class="navbar navbar-expand-lg navbar-light bg-light" style="top:0 !important;position: fixed;width:100%; margin-bottom:50px !important; background-color:#E8E8E8 !important; z-index:999">

    <div class="collapse navbar-collapse left" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="home.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="About_Real.php">About</a></li>
            <li class="nav-item"><a class="nav-link" href="Merchandise.php">Products</a></li>

        </ul>
    </div>
        <!--welcoming the user and button for logging out-->
    <div class="right">
        Welcome <?php echo $_SESSION["USERNAME"];?> <button type="button" name="logout" onclick="window.location.href = '../php/signout.php'">Log out</button>
    </div>
</nav>
<!--table that includes the matches and their information-->
<section class="py-5">
  <h1 style="margin:20px;margin-top:0;">Football Match Tickets <i class="icons icon-l tickets"></i></h1> 
  <small style="font-size:16px;margin:20px;color:red;">1&euro;=1.1&dollar;</small>
  <table id="ticketTable" style="margin:20px;width:1370px">
    <tr>
      <th>Match</th>
      <th>Opponent</th>
      <th>League</th>
      <th>Stadium</th>
      <th>Date</th>
      <th>Time</th>
      <th>Price/Ticket</th>
      <th>Ticket</th>
    </tr>
    <tr>
      <td> <a href="More.php?id=1">Match 1</a></td>
      <td><i class="icons barcelona"></i><?php echo getName(1)?></td>
      <td>La Liga</td>
      <td><?php echo getStadium(1)?></td>
      <td id=0><?php echo getTime(1)?></td>
      <td>8:30<sub>p.m.</sub>-10:00<sub>p.m.</sub></td>
      <td>Front: 650&euro;<br>Middle: 480&euro;<br>Back: 250&euro;</td>
      <td>
  F:<input type="checkbox" id="F" name="match1" value=650 onclick="handleCheckbox1(this)">
  M:<input type="checkbox" id="M" name="match1" value=480 onclick="handleCheckbox1(this)" unchecked>  
  B:<input type="checkbox" id="B" name="match1" value=250 onclick="handleCheckbox1(this)" unchecked>
</td>
    </tr>
    <tr>
    <td> <a href="More.php?id=2">Match 2</a></td>
      <td><i class="icons borussia"></i><?php echo getName(2)?></td>
      <td>Champions</td>
      <td><?php echo getStadium(2)?></td>
      <td id=1><?php echo getTime(2)?></td>
      <td>10:30<sub>p.m.</sub>-12:00<sub>a.m.</sub></td>
      <td>Front: 750&euro;<br>Middle: 540&euro;<br>Back: 300&euro;</td>
      <td>F:<input type="checkbox" id="F" name="match2" value=750 onclick="handleCheckbox2(this)" unchecked>
          M:<input type="checkbox" id="M" name="match2" value=540 onclick="handleCheckbox2(this)" unchecked>  
          B:<input type="checkbox" id="B" name="match2" value=300 onclick="handleCheckbox2(this)" unchecked>
    </td>
    </tr>
    <tr>
    <td> <a href="More.php?id=3">Match 3</a></td>
      <td><i class="icons psj"></i><?php echo getName(3)?></td>
      <td>Champions<sub> Round 16</sub></td>
      <td><?php echo getStadium(3)?></td>
      <td id=2><?php echo getTime(3)?></td>
      <td>11:00<sub>p.m.</sub>-12:30<sub>a.m.</sub></td>
      <td>Front: 750&euro;<br>Middle: 540&euro;<br>Back: 300&euro;</td>
      <td>F:<input type="checkbox" id="F" name="match3" value=750 onclick="handleCheckbox3(this)" unchecked>
          M:<input type="checkbox" id="M" name="match3" value=540 onclick="handleCheckbox3(this)" unchecked>  
          B:<input type="checkbox" id="B" name="match3" value=300 onclick="handleCheckbox3(this)" unchecked>
    </td>
    </tr>
    <tr>
    <td> <a href="More.php?id=4">Match 4</a></td>
      <td><i class="icons atletico-madrid"></i><?php echo getName(4)?></td>
      <td>La Liga</td>
      <td><?php echo getStadium(4)?></td>
      <td id=3><?php echo getTime(4)?></td>
      <td>9:30<sub>p.m.</sub>-11:00<sub>p.m.</sub></td>
      <td>Front: 650&euro;<br>Middle: 480&euro;<br>Back: 250&euro;</td>
      <td>
  F:<input type="checkbox" id="F" name="match4" value=650 onclick="handleCheckbox4(this)" unchecked>
  M:<input type="checkbox" id="M" name="match4" value=480 onclick="handleCheckbox4(this)" unchecked>  
  B:<input type="checkbox" id="B" name="match4" value=250 onclick="handleCheckbox4(this)" unchecked>
</td>
    </tr>
    <tr>
    <td> <a href="More.php?id=5">Match 5</a></td>
      <td><i class="icons Osasuna"></i><?php echo getName(5)?></td>
      <td>Copa Del Rey<sub> Final</sub></td>
      <td><?php echo getStadium(5)?></td>
      <td id=4><?php echo getTime(5)?></td>
      <td>9:45<sub>p.m.</sub>-11:15<sub>p.m.</sub></td>
      <td>Front: 700&euro;<br>Middle: 520&euro;<br>Back: 275&euro;</td>
      <td>F:<input type="checkbox" id="F" name="match5" value=700 onclick="handleCheckbox5(this)" unchecked>
          M:<input type="checkbox" id="M" name="match5" value=520 onclick="handleCheckbox5(this)" unchecked>  
          B:<input type="checkbox" id="B" name="match5" value=275 onclick="handleCheckbox5(this)" unchecked>
    </td>
    </tr>
  </table>
  <!--purchase button that submit the form and directs the fan to the confirmation page to confirm his/her purchase for the ticket(s)-->
  <div class="purchase">
                    <form action="ticket_form.php" method="post" id="purchase-form">
                        <label id="label" style="pointer-events: none;" disabled>Confirm your Purchase here:</label>
                        <button type="button" id="buy" class="Purchase-button" onclick="getTotal()" style="pointer-events: none;" disabled>Purchase</button>
                        <!--these hidden inputs will be used to save the price of the ticket chosen by the fan for each match-->
                        <input type="hidden" id="hidden1" name="hidden1" value="">
                        <input type="hidden" id="hidden2" name="hidden2" value="">
                        <input type="hidden" id="hidden3" name="hidden3" value="">
                        <input type="hidden" id="hidden4" name="hidden4" value="">
                        <input type="hidden" id="hidden5" name="hidden5" value="">
                        <input type="hidden" id="total" name="total" value="">

                    </form>
                </div>
</section>

<!-- Footer for copy rights-->
<footer>
        &copy; 2023 Football Tickets. All rights reserved.
    </footer>


<script src="../js/tickets.js"></script>


</body>
</html>
