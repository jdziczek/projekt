<!--żeby php działał poprawnie należy zmienić konfigurację na serwerze (w xampp - dodanie linijki
AddHandler application/x-httpd-php .html
do pliku konfiguracyjnego .htaccess-- KOMENTARZ PÓŹNIEJ DO USUNIĘCIA-->

<?php
	
	session_start();
	
	if((isset($_SESSION['zalogowany']))&&($_SESSION['zalogowany_D']==true))
	{
		header('Location: dyspozytor_main.php');
		exit(); //wyjscie z pliku
	}
	else if((isset($_SESSION['zalogowany']))&&($_SESSION['zalogowany_K']==true))
	{
		header('Location: kierowca_main.php');
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
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/sidebar.php'; ?>
    <div class="w3-main">
      <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php'; ?>
      <div class="w3-container">
      <!-- content -->
        <h2>Logowanie</h2>
        <form action="zaloguj.php" method="post">
          Login: <br /><input type="text" name="login" /></br>
          Hasło: <br /><input type="password" name="haslo" /></br></br>
          <input type="submit" value="Zaloguj się" />
        </form>	
      <!-- content -->
      </div>
      <?php
      if(isset($_SESSION['blad'])) echo $_SESSION['blad'];
      unset($_SESSION['blad']);
      ?>
      <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php'; ?>
    </div>
    <script src="/js/main.js"></script>
  </body>
</html>