<?php
// get the submitted form data
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['password'];


if($fname=="" || $lname=="" ||$email==""||$password==""){
  echo "nothing";
  exit();
}
// establish a database connection
$conn = mysqli_connect('localhost', 'id20740386_root', 'Bilal313@lau', 'id20740386_web');
// check if the email already exists in the managers table
$sql = "SELECT * FROM manager WHERE email='$email'";
$result = mysqli_query($conn, $sql);
if ($result!=false && mysqli_num_rows($result) > 0) {
  // if the email already exists, redirect to login page with an alert
  echo 'reg-email';
  exit();
}

// check if the email already exists in the fans table
$sql = "SELECT * FROM fans WHERE email='$email'";
$result = mysqli_query($conn, $sql);
if ($result!=false && mysqli_num_rows($result) > 0) {
  // if the email already exists, redirect to login page with an alert
  echo 'reg-email';
  exit();
}

// if the email does not exist in either tables, insert the new user data into fans table
$sql = "INSERT INTO fans (fname,lname, email, password) VALUES ('$fname','$lname', '$email', '$password')";
if (mysqli_query($conn, $sql)) {

  // Start the session
  session_start();
  $_SESSION["email"] = $email;
  $sql = "SELECT id FROM fans WHERE email = '$email'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $id = $row["id"];
  $_SESSION["id"] = $id;
  $_SESSION["fname"] = $fname;
  $_SESSION["USERNAME"]=$fname." ".$lname;
  if(isset($_POST['remember_me'])) {
    // Set a cookie to remember the user's login information
    setcookie('login_email', $email, time() + (86400 * 30), "/"); // Expires after 30 days
    setcookie('login_password', $password, time() + (86400 * 30), "/"); // Expires after 30 days
  }
  // if the insertion is successful, redirect to Players.php 
  echo 'done';
  exit();
} else {
  // if the insertion fails, show an error message and redirect to signup page
  echo "wrong";
  exit();
}

?>
