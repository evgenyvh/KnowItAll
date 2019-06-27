<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){

    header("location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welkom pagina</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
<div class="page-header">
    <h1>Welkom, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b> bij dit website!</h1>
</div>
    <a href="loguit.php" class="btn btn-danger">Uitloggen</a>
    <a href="index2.php" class="btn btn-danger">CRUD</a>
</body>
</html>