<?php
// Initialize the session
session_start();

// user al ingelogd word dan goorgestuurd
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}

// db config bestand
require_once "config.php";


$username = $password = "";
$username_err = $password_err = "";

// uitvoer van het form
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // gebruikersnaam leeg controle
    if(empty(trim($_POST["username"]))){
        $username_err = "Voer hier de gebruikersnaam in.";
    } else{
        $username = trim($_POST["username"]);
    }

    // ww leeg controle
    if(empty(trim($_POST["password"]))){
        $password_err = "Voeg hier u wachtwoord in.";
    } else{
        $password = trim($_POST["password"]);
    }

    // valiatie
    if(empty($username_err) && empty($password_err)){
        $sql = "SELECT id, username, password, admin FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            $param_username = $username;

            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);

                // gebruikersnaam controle, ww check
                if(mysqli_stmt_num_rows($stmt) == 1){
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $admin);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // ww correct, sessie begint
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            if ($admin === 1) {
                                $_SESSION["admin"] = $admin;
                            }else{
                                $_SESSION["admin"] = 0;
                            }
                            // welcom pagina
                            header("location: welcome.php");
                        } else{
                            $password_err = "Ingevoerde wachtwoord was niet correct.";
                        }
                    }
                } else{
                    $username_err = "Geen account gevonden met dit gebruikersnaam.";
                }
            } else{
                echo "Oops! Iets ging er mis. Probeer het nogmaals.";
            }
        }

        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log in</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
<div class="wrapper">
    <h2>Inloggen</h2>
    <p>Voer u gegevens in om in te kunnen loggen.</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
            <label>Gebruikersnaam</label>
            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
            <span class="help-block"><?php echo $username_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <label>Wachtwoord</label>
            <input type="password" name="password" class="form-control">
            <span class="help-block"><?php echo $password_err; ?></span>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Login">
        </div>
        <p>Nog geen account? <a href="register.php">Maak hier een aan</a>.</p>
        <p>Terug naar <a href="../index.php">home</a>.</p>
    </form>

</div>
</body>
</html>