<?php
require_once('functions.php');
$_SESSION['counter'] = 0;
session_start();


// Check if the counter session variable exists
if (!isset($_SESSION['counter'])) {
    // If it doesn't exist, initialize it to 1
    $_SESSION['counter'] = 1;
} else {
    // If it exists, increment the counter
    $_SESSION['counter']++;
}
/* session_destroy();
keep it just for testing.
 */
$conn = connectDB2();

echo $_SESSION['counter'];


$id = $_POST['id'];
$match = $_POST['M_id'];

$score = NULL;
$query = "SELECT `SCORE` FROM `match` WHERE `MATCH_ID` = $match";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $score = $row['SCORE'];
    }
}

$exp = NULL;
$query2 = "SELECT `EXPECTATION` FROM `expextation` WHERE `FAN_ID`=$id AND `MATCH_ID`=$match";
$result2 = mysqli_query($conn, $query2);
if (mysqli_num_rows($result2) > 0) {
    while ($row = mysqli_fetch_assoc($result2)) {
        $exp = $row['EXPECTATION'];
    }
}

if ($score == $exp) {

    if ($_SESSION['counter'] > 1) {
        ?>
        <script>
            alert("PIZZAAA!");
            window.location.assign("More.php");
        </script>

        <?php
    } else {

        $query3 = "UPDATE `fan` SET `POINTS`=`POINTS`+700 WHERE `FAN_ID`=$id";
        $result3 = mysqli_query($conn, $query3);

        ?>
        <script>
            alert("Congrats! Your expectation was right, 700 points will be added to your balance");
            window.location.assign("More.php");
        </script>

        <?php
    }
} else if ($score == NULL) {
    ?>

        <script>
            alert("The score is not set yet!");
            window.location.assign("More.php");
        </script>

    <?php
} else {
    ?>

        <script>
            alert("Your expectation is not right \n Better luck next time ;)");
            window.location.assign("More.php");
        </script>

    <?php
}

?>