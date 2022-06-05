<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.html");
    exit;
}

// Include config file
require_once "connect_db.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Podaj login.";
    } else{
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Podaj hasło.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM uzytkownicy WHERE username = ?";

        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            // Redirect user to welcome page
                            header("location: index.html");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Nie poprawny login lub hasło.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Nie poprawny login lub hasło.";
                }
            } else{
                echo "Wystąpił błąd";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/startpage.css">
    <link rel="stylesheet" href="css/account.css">
    <link rel="stylesheet" href="css/form2.css">
      <script src="js/main.js"></script>
</head>
<body>

  <div id="header-background">
    <header>
      <button id="dropdownbtn" onclick="MenuClick()">=</button>
      <a href="index.html">Start</a>
      <a href="oferta.html">Oferta</a>
      <a href="kontakt.html">Kontakt</a>
      <a href="galeria.html">Galeria</a>
      <a href="praca.html">Praca</a>
      <a onclick="AccountClick()" class="active">Konto</a>
    </header>
  </div>

  <div id="DropMenu" class="dropdown-content">
    <a href="index.html">Start</a>
    <a href="oferta.html">Oferta</a>
    <a href="kontakt.html">Kontakt</a>
    <a href="galeria.html">Galeria</a>
    <a href="praca.html">Praca</a>
    <a onclick="AccountClick2()" class="active">Konto</a>
  </div>

  <div id="account-div" class="account">
  </div>

   <center>
    <div>
        <h2>Logowanie</h2>

        <?php
        if(!empty($login_err)){
            echo '<div class="invalid-feedback">' . $login_err . '</div>';
        }
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
          <label for="username">Login</label>
          <span class="invalid-feedback"><?php echo $username_err; ?></span>
          </br>
          <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
          <label>Hasło</label>
          <span class="invalid-feedback"><?php echo $password_err; ?></span>
          </br>
          <input type="submit" value="Zaloguj">
          <p>Nie Posiadasz Konta? <a href="register.php">Zarejestruj się teraz</a>.</p>
        </form>
    </div>
    </center>
</body>
</html>
