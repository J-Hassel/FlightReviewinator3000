<?php
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// Initialize DB connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flighttrackinator3000";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

// Include config file
require_once "config.php";

function printReview($username) {
    global $conn;
 
    $sql = "SELECT * FROM review, airport WHERE username = '$username' AND refID = iataCode";
    $result = $conn->query($sql);
 
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            // echo "<br>&nbsp&nbsp&nbsp&nbsp&nbsp" . $row['name'] . " - " . $row['city'] . ", " . $row['country'];
            echo "<br>" . $row['name']; // POSSIBLE TODO: make this a link???
            echo "<div style='background-color: #eee; margin-top: 10px;' id='review". $row['hashID'] ."'>";
			echo "<br>&nbsp&nbsp&nbsp&nbsp&nbspRating: " . $row["rating"] . "/5";
			echo "&nbsp&nbsp&nbsp&nbsp&nbsp" . explode('-', $row["time"])[1] . "/" . explode(' ', explode('-', $row["time"])[2])[0] . "/" . explode('-', $row["time"])[0] . "<br>";
			echo "&nbsp&nbsp&nbsp&nbsp&nbspComment: " . $row["comment"] . "<br><br>";
            echo "</div>";
       }
    } else {
       echo "No Reviews";
    }
 }

?>

<html class="account">
    <head>
        <?php include_once("header.php"); ?>
        <style>
            * {
                box-sizing: border-box;
            }

            .account
            {
/*                background-image: url(bg-home.jpg);
                background-repeat: repeat-y;
                background-size: cover;*/
            }

            .controls 
            {
                border: 1px solid rgba(0,0,0,.3);
                width: 200px;
                height: 230px;
                margin-top: 50px;
                padding: 20px;
                border-radius: 15px;
                margin-left: 200px;
                text-align: left;
                font-family: 'Roboto', sans-serif;
                font-size: 14pt;
            }

            .reviews 
            {
                border: 1px solid rgba(0,0,0,.3);
                margin: 0 auto;
                margin-top: 50px;
                padding: 20px;
                border-radius: 15px;
                width: 1500px;
                text-align: left;
                padding: 20px;
            }

            .btn
            {
                color: white;
                text-decoration: none;
                padding: 7px;
                width: 200px;
                border-radius: 5px;
                background-color: #337ab7;
                opacity: .9;
                cursor: pointer;
                border:none;
            }

            .btn:hover
            {
                opacity: 1;
            }
            
        </style>
    </head>
    <body>
            <div class="controls">
                <h1>Account</h1><br>
                <a class="btn" href='reset-password.php'>Reset Password</a><br><br>
                <a class="btn" href="logout.php">Sign Out</a>
                <br><br>
                <a class="btn" href="delete.php">Delete Account</a><br><br><br><br>
            </div>
            <div class="reviews">
                    <center><h1>Your Reviews</h1></center>
                    <br>
                    <?php printReview($_SESSION['username']);?>
            </div>
    </body>
</html>
