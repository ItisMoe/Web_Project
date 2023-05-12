<?php
// Establish a connection to the database

$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$conn = mysqli_connect('localhost', 'id20740386_root', 'Bilal313@lau', 'id20740386_web');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if ($email == "" || $password == "") {
    echo 'nothing';
    exit();
}

// Query the fans table for the email and password
$sql = "SELECT * FROM fans WHERE email='$email'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 0) {
    // if the email do not exists
    echo 'no-email';
    exit();
}
$query = "SELECT * FROM fans WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $query);

// If email and password match in the fans table, redirect to Players.php
if (mysqli_num_rows($result) > 0) {


    // Start the session
    session_start();
    $_SESSION["email"] = $email;
    $sql = "SELECT id FROM fans WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $id = $row["id"];
    $_SESSION["id"] = $id;
    $sql = "SELECT fname FROM fans WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $fname = $row["fname"];
    $_SESSION["fname"] = $fname;
    $sql = "SELECT lname FROM fans WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $lname = $row["lname"];
    $_SESSION["USERNAME"]=$fname." ".$lname;
    $_SESSION["admin"]=true;
    session_write_close();
    if (isset($_POST['remember_me'])) {
        // Set a cookie to remember the user's login information
        setcookie('login_email', $email, time() + (86400 * 30), "/"); // Expires after 30 days
        setcookie('login_password', $password, time() + (86400 * 30), "/"); // Expires after 30 days
    }

    echo 'ok-fan';
    exit();
}

// Query the managers table for the email and password
$query = "SELECT * FROM manager WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {

    // Start the session
    session_start();
    $_SESSION["email"] = $email;
    $sql = "SELECT id FROM managers WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $id = $row["id"];
    $_SESSION["id"] = $id;
    $sql = "SELECT fname FROM managers WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $fname = $row["fname"];
    $_SESSION["fname"] = $fname;
    if (isset($_POST['remember_me'])) {
        // Set a cookie to remember the user's login information
        setcookie('login_email', $email, time() + (86400 * 30), "/"); // Expires after 30 days
        setcookie('login_password', $password, time() + (86400 * 30), "/"); // Expires after 30 days
    }

    echo 'ok-manager';
    exit();
} else {
    echo 'incorrect';
    exit();
}


?>