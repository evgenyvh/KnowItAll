<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
<div class="page-header">
    <h1>Welkom, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b> bij onze weetjes site!</h1>
</div>
<p>
    <a href="logout.php" class="btn btn-danger">Uitloggen</a>
    <a href="../home.php" class="btn btn-danger">Naar de weetjes</a>
</p>
</body>
</html>