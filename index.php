<?php

$servername = "localhost";
$username = "student4a8_510815";
$password = "fErmwqvx2";
$dbname = "student4a8_510815";
$TBname = "weetje";
$melding = null;


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


function result($conn, $TBname, $melding)
{

    $today = date("m/d");

    $sql = "SELECT * FROM `$TBname` WHERE MONTH(datum) = MONTH(CURRENT_DATE()) AND DAY(datum) = DAY(CURRENT_DATE()) ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $melding = sprintf( "<div class='melding'>" . $row["datum"] ." ".  $row["weetje"] . "<br></div>");
        }
    } else {
        $melding = sprintf( "<div class='melding'>0 results</div>");
    }
    $conn->close();
            return $melding . $today;

}

?>


<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/style%20home.css">
    <link rel="stylesheet" href="styles/style.css">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<header>
    <ul class="topnav">
        <li><a class="active" href="index.php">Home</a></li>
        <li><a href="kalender.php">Kalender</a></li>
        <li><a href="contact.html">Contact</a></li>
        <li><a href="InlogRegister/login.php">Log in/uit</a></li>
    </ul>
</header>
<body>


    <div class="homneweetje">
        <p class="weetjetext"><?=result($conn, $TBname, $melding)?></p>
    </div>
    <div class="footer">
        <h2>KnowItAll</h2>
        <h4>Copyright © 2019 KnowItAll Productions</h4>
    </div>
</body>
</html>