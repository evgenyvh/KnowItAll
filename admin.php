<?php
/**
 * Created by PhpStorm.
 * User: niels
 * Date: 13/06/2019
 * Time: 11:21
 */
session_start();
if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
    $melding = "u bent een admin en mag hier zijn";
}else{
    header('location: InlogRegister/login.php');
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
        <li><a href="admin.php">Admin</a></li>
        <li><a href="alleweetjes.php">alle weetjes</a></li>
    </ul>
</header>
<body>
    <div>
        <h1>admin pagina</h1>
    </div>
</body>
</html>
