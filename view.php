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
	<link rel="stylesheet" href="css/db.css">
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

	<div class="table-div">
	<table>
	 <tr class="table-header">
			 <th>ID</th>
			 <th>Nazwa</th>
			 <th>Miejsce</th>
			 <th>Wykonawca</th>
			 <th></th>
	 </tr>

	<?php
	$result = $conn->query("SELECT * FROM fuszki");

	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
		?>
      <tr class="table-item">
        <td><?php echo $row['ID'];?></td>
        <td><?php echo $row['Nazwa'];?></td>
        <td><?php echo $row['Miejsce'];?></td>
        <td><?php echo $row['Wykonawca'];?></td>
        <td>
					<a class="primary"  value="Edit" href="edit.php?ID=<?php echo($row['ID']."&N=".$row['Nazwa']."&L=".$row['Miejsce']."&WN=".$row['Wykonawca']);?>">Edytuj</a>
					<a class="warn"  value="Delete" href="delete.php?ID=<?php echo $row['ID'];?>">Usuń</a>
				</td>
      </tr>
		<?php
		}
		?>
		</table>
	<?php
	}
	else{
		?>
			</table>
			<div class="warn"><?php echo "Nie ma żadnych rekordów w bazie danych"?></div>
		<?php
	 }
	?>

	</div>
	<a class="primary new-btn" href="create.php">Nowa oferta</a>

  <div class="footer-spacer"></div>
  <footer>
    <img src="img/logo-small.png" alt="LOGO">
    <div>
      Zachęcamy do kontaktu! <br>
      Tel: 120 000 255 <br>
      E-mail: boguslaw.lecina@remont.pl
    </div>
  </footer>
