<?php
	session_start();
	if(!isset($_SESSION['zalogowany']))
	{
		header('Location: logowanie.php');
		exit(); 
	}
	else if($_SESSION['zalogowany_D'])
	{
		header('Location: dyspozytor_main.php');
		exit();
	}
	else if($_SESSION['zalogowany_K'])
	{
		header('Location: kierowca_main.php');
		exit();
	}
?>
<!DOCTYPE html>
<html>
  <title>JBD Logistics</title>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue.css">
    <link href="/css/styles.css" rel="stylesheet" type="text/css">
  </head>
  <body>
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/sidebar_admin.php'; ?>
    <div class="w3-main">
      <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php'; ?>
      <div class="w3-container">
      <!-- content -->
      <h2>Panel administratora</h2>

      <a href="/components/reset_hasla.php" class="w3-button w3-blue">Zresetuj hasło</a>
      <a href="/components/dodaj_pracownika.php" class="w3-button w3-blue">Dodaj pracownika</a>
	  <br />
	  	<?php 
			if(isset($_SESSION['zmiana_OK']))
			{
				echo $_SESSION['zmiana_OK'];
				unset($_SESSION['zmiana_OK']);
			}
		?>
      </p>
      <!-- content -->
      </div>
      <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php'; ?>
    </div>
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/bootbox.min.js"></script>
    <script src="/js/main.js"></script>
  </body>
</html>