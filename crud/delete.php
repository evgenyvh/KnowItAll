<?php

session_start();
if (isset($_SESSION["admin"]) && $_SESSION["admin"] === 1){

    $admin = true;

} else {
    header("location: ../Inlog Register/login.php");
}

//Bewerk de bewerking na bevestiging
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Include config file
    require_once "config.php";
    
    // Begin verwijder statement
    $sql = "DELETE FROM weetje WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Parameters worden gezet
        $param_id = trim($_POST["id"]);
        
        // Poging van het uitvoeren van prepared statement
        if(mysqli_stmt_execute($stmt)){
            // Item is verwijderd, word doorgestuurd naar home pagina.
            echo '
                <script>
                    alert("Weetje is succesvol verwijderd.");
                    window.location = "index.php"
                </script>';
            header("location: index.php");
            exit();
        } else{
            echo "Oops! Er ging iets mis. Probeer het later nog maals.";
        }
    }
     
    // Afsluit van statement
    mysqli_stmt_close($stmt);
    
    // Connectie word afgesloten
    mysqli_close($link);
} else{
    // ID parament word gevalideerd
    if(empty(trim($_GET["id"]))){
        // URL heeft geen id parameter meer, word doorgestuurd naar error pagina
        header("location: error.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Item verwijderen</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Item verwijderen</h1>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger fade in">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <p>Weet u het zeker dat u het will verwijderen?</p><br>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="index.php" class="btn btn-default">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>