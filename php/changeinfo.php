<?php
session_start();
// get the submitted form data
$pnum = $_POST['pnum'];
$address = $_POST['address'];
 $email = $_SESSION['email'];
// $email="fan@gmail.com";
$password = $_POST['password'];
$bio = $_POST['bio'];
$lname = $_POST['lname'];
$fname = $_POST['fname'];


// establish a database connection
$conn = mysqli_connect('localhost', 'id20740386_root', 'Bilal313@lau', 'id20740386_web');

// check for empty fields
if($pnum=="" || $address=="" ||$lname=="" || $fname=="" || $password==""){
  echo "nothing";
  exit();
}
if(!empty($email)){
    // create the SQL query with the WHERE clause
$sql = "UPDATE fans SET pnum='$pnum', address='$address', lname='$lname', fname	='$fname' , bio='$bio', password='$password' WHERE email='$email'";

// execute the query
if (mysqli_query($conn, $sql)) {
  // if the insertion is successful, redirect to Players.php 
  echo 'done';
  exit();
} else {
  // if the insertion fails, show an error message and redirect to signup page
  echo "wrong";
  exit();
}
    
}
else{
    echo 'wrong';
}

?>
