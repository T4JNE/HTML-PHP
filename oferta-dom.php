<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/workpage.css">
  <link rel="stylesheet" href="css/form.css">
  <link rel="stylesheet" href="css/account.css">
  <script src="js/main.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="js/form.js"></script>
  <title>Bogusław Łęcina: Oferta</title>
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

  <div id="account-div" class="account">
  </div>

  <div id="DropMenu" class="dropdown-content">
    <a href="index.html">Start</a>
    <a href="oferta.html" class="active">Oferta</a>
    <a href="kontakt.html">Kontakt</a>
    <a href="galeria.html">Galeria</a>
    <a href="praca.html">Praca</a>
    <a onclick="AccountClick2()">Konto</a>
  </div>

  <div class="MainContent">
    <div>
      Podsumowując:
      <li>Powierzchnia domu: <?php echo $_POST['farea']; ?></li>
      <li>Województwo: <?php echo $_POST['fstate']; ?></li>
      <li>Rodzaj domu: <?php echo $_POST['fhousetype']; ?></li>
      <li>Rodzaj dachu: <?php echo $_POST['frooftype']; ?></li>
      </br></br></br>
      Cena za taki dom wynosi: <?php echo $_POST['farea']*50 ?> zł.
    </div>
  </div>

  <script src="js/form.js"></script>

  <div class="footer-spacer"></div>
  <footer>
    <img src="img/logo-small.png" alt="LOGO">
    <div>
      Zachęcamy do kontaktu!<br>
      Tel: 120 000 255<br>
      E-mail: boguslaw.lecina@remont.pl
    </div>
  </footer>

</body>
</html>
