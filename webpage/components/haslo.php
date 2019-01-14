<?php
	
	session_start();
	
	if(!isset($_SESSION['zalogowany']))
	{
		header('Location: logowanie.php');
		exit(); //wyjscie z pliku
	}
		
?>

<!DOCTYPE html>
<html>
  <title>JBD Logistics</title>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue.css">
    <link href="/css/styles.css" rel="stylesheet" type="text/css">
  </head>
  <body>
  <?php 
  if ($_SESSION['zalogowany_D']==true)
  {
	  require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/sidebar_dyspozytor.php';
  }
  else if ($_SESSION['zalogowany_K']==true)
  {
	  require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/sidebar_kierowca.php';
  } 
   ?>
	  
		<div class="w3-main">
		<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php'; ?>
		<div class="w3-container">
		<!-- content -->
		<h2>Zmiana hasła</h2>
		<?php
			if(!isset($_SESSION['zmiana_OK']))
			{	
				echo'<h6>Nowe hasło powinno powinno zawierać od 6 do 20 znaków.</h6>';
				echo'<form action="zmiana_hasla.php" method="post" autocomplete="off">';
					echo'Stare hasło: <br /><input type="password" required name="stare_haslo" readonly onfocus="this.removeAttribute(\'readonly\')"/></br>';
					echo'Nowe hasło: <br /><input type="password" required name="nowe_haslo1" readonly onfocus="this.removeAttribute(\'readonly\')" /></br>';
					echo'Powtórz nowe hasło: <br /><input type="password" required name="nowe_haslo2" readonly onfocus="this.removeAttribute(\'readonly\')" /></br></br>';
					echo' <input type="submit" value="Zmień hasło" />';
				echo'</form>';	
			}
			else
			{
				echo $_SESSION['zmiana_OK'];
				unset($_SESSION['zmiana_OK']);
			}
	  if(isset($_SESSION['blad'])) echo $_SESSION['blad'];
	  unset($_SESSION['blad']);
  ?>
  </div>
      <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php'; ?>
    </div>
    <script src="/js/main.js"></script>
  </body>
</html>