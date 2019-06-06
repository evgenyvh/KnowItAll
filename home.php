<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "niels";
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
    <link rel="stylesheet" href="style%20home.css">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<header>
    <div class="banner">Welkom bij het archief van KnowItAll</div>
</header>
<body>


    <div class="homneweetje">
        <p class="weetjetext"><?=result($conn, $TBname, $melding)?></p>
    </div>
</body>
</html>