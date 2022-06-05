<div id="background">
  <button onclick="AccountClick()">Zamknij</button>
  <?php
  // Initialize the session
  session_start();

  // Check if the user is already logged in, if yes then redirect him to welcome page
  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
      echo "<a>".$_SESSION["username"]."</a>";
      echo '<a href="logout.php">Wyloguj się!</a>';
  }
  else {
    echo '<a href="login.php">Zaloguj się!</a>';
  }
  ?>

</div>
