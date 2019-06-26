<?php
/**
 * Created by PhpStorm.
 * User: niels
 * Date: 26/06/2019
 * Time: 09:10
 */
session_start();
if (isset($_SESSION["admin"]) && $_SESSION["admin"] === 1){
    $meldingadmin = sprintf( "<div style='position: absolute; left: 5px; border: solid 1px black; background-color: antiquewhite; margin: 3px; padding: 5px;'>u bent een admin</div>");
}else{
    header("location: login.php");
}






$meldingadmin = null;



function all(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "niels";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM `weetje`";
$result = $conn->query($sql);


if ($result-> num_rows > 0) {
    while ($row = $result-> fetch_assoc()) {
        $tabel = sprintf("<tr><td>%s</td><td>%s</td><td>%s</td></td></tr>",$row["id"],$row["weetje"],$row["datum"]);
        echo $tabel;


    }
}

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
    </ul>
</header>
<body>
<table class="weetjestabel">
    <tr>
        <th>ID</th>
        <th>Weetje</th>
        <th>Datum</th>

    </tr>
    <?=all()?>
</table>




<div class="footer">
    <h2>KnowItAll</h2>
    <h4>Copyright © 2019 KnowItAll Productions</h4>
</div>
</body>
</html>