<?php
//Bewerk de bewerking na bevestiging
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Include config file
    require_once "config.php";
    
    // Begin verwijder statement
    $sql = "DELETE FROM weetje WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_POST["id"]);
        
        // Poging van het uitvoeren van prepared statement
        if(mysqli_stmt_execute($stmt)){
            // Item is verwijderd, word doorgestuurd naar home pagina.
            header("location: crud.php");
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Afsluit van statement
//    mysqli_stmt_close($stmt);
    
    // Connectie word afgesloten
//    mysqli_close($link);
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
                            <p>Weet u het zeker dat u het will verwijderen?</p><br>
                            <p>
                                <?php
                                    if(isset($_GET['id'])) {
                                        ?>
                                        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                                        <?php
                                    }
                                ?>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="crud.php" class="btn btn-default">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>