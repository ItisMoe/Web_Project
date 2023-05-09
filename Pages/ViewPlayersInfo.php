<?php require_once ('../php/players_retrieval_functions.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php logo() ?>
    <title>Football Club | Home</title>
    <link rel="stylesheet" href="../css/my_styles.css" />
  </head>
  <body>
    <header>
      <nav> 
        <ul>
          <li><a href="#">My Home</a></li>
          <li><a href="PlayerPages/Players.php">Players</a></li>
          <li><a href="PlayerPages/UnderConstruction.php">Matches</a></li>
          <li><a href="PlayerPages/UnderConstruction.php">Stats</a></li>
          <li><a href="PlayerPages/UnderConstruction.php">Settings</a></li>
        </ul>
      </nav>
    </header>

    <main>
      <section class="hero-section">
        <div class="hero-image"></div>
        <div class="hero-text">
          <h1>Welcome to YOUR Football Club</h1>
          <p>Your home for everything football. Manage Our team, view our upcoming matches, and track our performance statistics.</p>
          <!-- <button class="primary-button">Get Started</button> -->
        </div>
      </section>

      <section class="dashboard-section">
        <div class="container">
          <!-- <h2>Dashboard</h2> -->
          <div class="dashboard-container">
            <div class="dashboard-item">
              <h3>Physical Staff</h3>
              <p>View and manage the physical staff in your team.</p>
              <button class="secondary-button"><a href="PlayerPages/UnderConstruction.php">View Physical...</a></button>
            </div>
            <div class="dashboard-item">
              <h3>Tactics</h3>
              <p>Prepare your team for the upcoming matches.</p>
              <button class="secondary-button"><a href="PlayerPages/UnderConstruction.php">View Tactics</a></button>
            </div>
            <div class="dashboard-item">
              <h3>Assignments</h3>
              <p>Add tasks for your players to boost their performance</p>
              <button class="secondary-button"><a href="PlayerPages/UnderConstruction.php">View Assign...</a></button>
            </div>
            <div class="dashboard-item">
              <h3>Schedule</h3>
              <p>Schedule yout team's upcoming events
              </p>
              <button class="secondary-button"><a href="PlayerPages/UnderConstruction.php">View Schedule</a></button>
            </div>
          </div>
        </div>
      </section>
    </main>

    <footer>
      <div class="container">
        <p>&copy; Football Club. All rights reserved.</p>
      </div>
    </footer>
  </body>
</html>
