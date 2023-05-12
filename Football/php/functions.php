<?php

function connectDB1()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "football";
    $db = NULL;

    try {
        $db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
    return $db;
}

function connectDB2()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "football";

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    // Check for errors in the connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $conn;
}

function FetchUsers($match)
{
    $db = connectDB1();
    $query = "SELECT * FROM `carpool` WHERE `MATCH_ID`=$match AND `PHONE`=''"; //`DRIVER_ID` = 1
    //echo $query;
    $stmt = $db->query($query);
    $a_users = array();
    while ($obj = $stmt->fetch(PDO::FETCH_OBJ)) {
        $a_users[] = $obj;
    }
    return $a_users;
}

function GetPassengers($id, $match)
{

    $db = connectDB1();
    $query = "SELECT `PASSENGER_ID`, `LOCATION`, `PHONE` FROM `carpool` WHERE `DRIVER_ID`= $id AND `MATCH_ID`=$match AND `PHONE` != '' ";
    $stmt = $db->query($query);
    $a_users = array();
    while ($obj = $stmt->fetch(PDO::FETCH_OBJ)) {
        $a_users[] = $obj;
    }
    return $a_users;
}

function GetName($arg)
{
    $conn = connectDB2();

    $query = "SELECT FNAME, LNAME FROM `fan` WHERE `FAN_ID` = $arg";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $fn = $row['FNAME'];
            $ln = $row['LNAME'];
        }
    } else {
        echo 'False';
    }

    echo "$fn $ln";
    return true;
}


function CheckAvailbility($arg)
{
    $conn = connectDB2();

    $query = "SELECT CAPACITY, AVAILABLE FROM `carpool` WHERE `CARPOOL_ID` = $arg AND `PHONE`='' ";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $av = $row['AVAILABLE'];
            $capacity = $row['CAPACITY'];
        }
    }

    if ($av && $capacity > 0) {
        return $capacity;
    } else {
        $query = "UPDATE `carpool` SET `AVAILABLE`= 0 WHERE `CARPOOL_ID`=$arg";
        $result = mysqli_query($conn, $query);
        return "C";
    }
}

function GetOpponent($arg)
{
    $conn = connectDB2();
    $query = "SELECT `Opponent` FROM `match` WHERE `MATCH_ID` = $arg";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $Op = $row['Opponent'];
        }
    }
    echo "$Op";
}

function AddFan($carpool_id, $arg, $pass_id)
{
    $conn = connectDB2();
    $query = "SELECT * FROM `carpool` WHERE `CARPOOL_ID` = $carpool_id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $CAPACITY = $row['CAPACITY'];
            $D_ID = $row['DRIVER_ID'];
            $M_ID = $row['MATCH_ID'];
            $LOCATION = $row['LOCATION'];
            $AV = $row['AVAILABLE'];

            if ($CAPACITY > 0) {
                $query2 = "UPDATE `carpool` SET `CAPACITY`=`CAPACITY`-1 WHERE `CARPOOL_ID`=$carpool_id";
                $result2 = mysqli_query($conn, $query2);

                $query3 = "INSERT INTO `carpool`(`CARPOOL_ID`, `DRIVER_ID`, `PASSENGER_ID`, `MATCH_ID`, `LOCATION`, `CAPACITY`, `AVAILABLE`, `PHONE`) VALUES ($carpool_id,$D_ID,$pass_id, $M_ID,'$LOCATION',0,$AV,'$arg')";
                $result3 = mysqli_query($conn, $query3);
            }

        }
    }

    return true;
}

function checkScore($arg, $match)
{

    $conn = connectDB2();
    $query = "SELECT `EXPECTATION` FROM `expextation` WHERE `FAN_ID`=$arg AND `MATCH_ID`=$match";
    $result = mysqli_query($conn, $query);
    $score = NULL;
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $score = $row['EXPECTATION'];
        }
    }

    return $score;
}

function checkFeed($arg)
{

    $conn = connectDB2();
    $query = "SELECT `FEEDB` FROM `feedback` WHERE `FAN_ID`=$arg";
    $result = mysqli_query($conn, $query);
    $fb = NULL;
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $fb = $row['FEEDB'];
        }
    }

    return $fb;
}



?>