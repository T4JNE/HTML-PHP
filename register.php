<?php

require_once "connect_db.php";


$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";


if($_SERVER["REQUEST_METHOD"] == "POST"){


    if(empty(trim($_POST["username"]))){
        $username_err = "Wprowadź login.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Login może zawierać tylko litery, liczby i podkreślenie.";
    } else{

        $sql = "SELECT id FROM uzytkownicy WHERE username = ?";

        if($stmt = mysqli_prepare($conn, $sql)){

            mysqli_stmt_bind_param($stmt, "s", $param_username);


            $param_username = trim($_POST["username"]);


            if(mysqli_stmt_execute($stmt)){

                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Taki uzytkownik juz istneje.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Wystąpił błąd.";
            }


            mysqli_stmt_close($stmt);
        }
    }


    if(empty(trim($_POST["password"]))){
        $password_err = "Podaj hasło.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Hasło musi mieć przynajmniej 6 znaków.";
    } else{
        $password = trim($_POST["password"]);
    }


    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Potwierdź hasło.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Hasła nie są identyczne.";
        }
    }


    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){


        $sql = "INSERT INTO uzytkownicy (username, password) VALUES (?, ?)";

        if($stmt = mysqli_prepare($conn, $sql)){

            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); //


            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Wystąpił błąd.";
            }


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
    <title>Sign Up</title>
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
    <div class="wrapper">
        <h2>Zarejestruj się</h2>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <input type="text" name="username" value="<?php echo $username; ?>">
          <label>Login</label>
          <span class="invalid-feedback"><?php echo $username_err; ?></span>
          </br>
          <input type="password" name="password" value="<?php echo $password; ?>">
          <label>Hasło</label>
          <span class="invalid-feedback"><?php echo $password_err; ?></span>
          </br>
          <input type="password" name="confirm_password" value="<?php echo $confirm_password; ?>">
          <label>Potwierdz Hasło</label>
          <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
          </br>
          <input type="submit" value="Potwierdź">
          <p>Posiadasz już konto? <a href="login.php">Zaloguj się</a>.</p>
        </form>
    </div>
    </center>
</body>
</html>
