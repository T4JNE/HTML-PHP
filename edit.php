<?php
	include('connect_db.php');
?>

<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/startpage.css">
  <link rel="stylesheet" href="css/account.css">
  <link rel="stylesheet" href="css/form2.css">
  <script src="js/anim.js"></script>
  <script src="js/main.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="js/background-color.js"></script>
  <title>Bogusław Łęcina Usługi Budowlano-Remontowe</title>
</head>
<body>
  <div id="header-background">
    <header>
      <button id="dropdownbtn" onclick="MenuClick()">=</button>
      <a href="index.html">Start</a>
      <a href="oferta.html" class="active">Oferta</a>
      <a href="kontakt.html">Kontakt</a>
      <a href="galeria.html">Galeria</a>
      <a href="praca.html">Praca</a>
      <a onclick="AccountClick()">Konto</a>
    </header>
  </div>

  <div id="DropMenu" class="dropdown-content">
    <a href="index.html" class="active">Start</a>
    <a href="oferta.html">Oferta</a>
    <a href="kontakt.html">Kontakt</a>
    <a href="galeria.html">Galeria</a>
    <a href="praca.html">Praca</a>
    <a onclick="AccountClick2()">Konto</a>
  </div>

  <div id="account-div" class="account">
  </div>

  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="ID" value="<?php echo $_GET['ID']; ?>" />
      <label for="Nazwa">Nazwa</label><br>
      <input type="text" name="Nazwa" value="<?php echo $_GET['N']; ?>" />
      <label for="Localization">Lokalizacja</label><br>
      <input type="text" name="Localization" value="<?php echo $_GET['L']; ?>" />
      <label for="WorkerName">Wykonawca</label><br>
      <input type="text" name="WorkerName" value="<?php echo $_GET['WN']; ?>" />
      <input type="submit" value="Potwierdź"/>
  </form>
<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){
    $ID = $_POST['ID'];
		$Nazwa = $_POST['Nazwa'];
		$Localization = $_POST['Localization'];
		$WorkerName = $_POST['WorkerName'];

		$query = "UPDATE fuszki SET Nazwa='$Nazwa', Miejsce='$Localization', Wykonawca='$WorkerName' WHERE ID='$ID'";

		$result = mysqli_query($conn,$query) or die(mysqli_error());

		if($result){
			echo "Nazwa: $Nazwa <br />";
			echo "Miejsce: $Localization <br />";
			echo "Wykonawca: $WorkerName <br />";
		}
		else{
			echo "ERROR";
		}

		header("location: view.php");
	}
?>
	</div>

  <div class="footer-spacer"></div>
  <footer>
    <img src="img/logo-small.png" alt="LOGO">
    <div>
      Zachęcamy do kontaktu! <br>
      Tel: 120 000 255 <br>
      E-mail: boguslaw.lecina@remont.pl
    </div>
  </footer>
