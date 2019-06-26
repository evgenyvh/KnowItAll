<?php

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "niels";
$TBname = "weetje";
$melding = null;
$admin = false;
$meldingadmin = null;



if (isset($_SESSION["admin"]) && $_SESSION["admin"] === 1){

    $admin = true;
    $meldingadmin = sprintf( "<div style='position: absolute; right: 10px; border: solid 1px black; background-color: antiquewhite; margin: 8px; padding: 5px;'>u bent een admin</div>");
} else {
    echo '<style type ="text/css">
               .adminlink{
               display: none;
               }
               </style>';
}


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


function result($conn, $TBname, $melding)
{



    $sql = "SELECT * FROM `$TBname` WHERE MONTH(datum) = MONTH(CURRENT_DATE()) AND DAY(datum) = DAY(CURRENT_DATE()) ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $melding = sprintf( "<div class='melding'>" . $row["datum"] .": ".  $row["weetje"] . "<br></div>");
        }
    } else {
    $melding = sprintf( "<div class='melding'>0 results</div>");
}
$conn->close();
return $melding;

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
        <li class="adminlink"><a href="admin.php">Admin</a></li>
        <li class="adminlink"><a href="alleweetjes.php">alle weetjes</a></li>
        <?=$meldingadmin?>
    </ul>
</header>
<body>

    <p class="banner">Welkom op de website van KnowItAll</p>
    <div class="homneweetje">
        <p class="weetjetext">Weetje van de dag</p>
        <p class="weetjetext"><?=result($conn, $TBname, $melding)?></p>
    </div>
    <div class="footer">
        <h2>KnowItAll</h2>
        <h4>Copyright © 2019 KnowItAll Productions</h4>
    </div>
</body>
</html>