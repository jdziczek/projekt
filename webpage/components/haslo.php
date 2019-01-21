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
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
    <script>
		var myApp = angular.module("myapp", []);
		myApp.controller("KontrolerHasla", function($scope) {
			var silne = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
			var srednie = new RegExp("^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})");

			$scope.silahasla = {
				"float": "center",
				"width": "150px",
				"height": "5px",
				"margin-left": "5px"
                };

			$scope.analyze = function(value) {
				if(silne.test(value)) {
					$scope.silahasla["background-color"] = "green";
				} else if(srednie.test(value)) {
					$scope.silahasla["background-color"] = "orange";
				} else {
					$scope.silahasla["background-color"] = "red";
				}
			};
		});
        </script>
  </head>
  <body ng-app="myapp">
  <?php 
  if ($_SESSION['zalogowany_D']==true)
  {
	  require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/sidebar_dyspozytor.php';
  }
  else if ($_SESSION['zalogowany_K']==true)
  {
	  require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/sidebar_kierowca.php';
  } 
   else if ($_SESSION['zalogowany_A']==true)
  {
	  require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/sidebar_admin.php';
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
				echo'<h6>Nowe hasło powinno zawierać od 8 do 20 znaków, co najmniej 1 cyfrę, 1 dużą literę, jedną małą literę oraz znak specjalny (!@#$%^&*).</h6>';
				echo'<form action="zmiana_hasla.php" method="post" autocomplete="off">';
				echo'Stare hasło: <br /><input type="password" required name="stare_haslo" readonly onfocus="this.removeAttribute(\'readonly\')"/></br>';
				echo'	Nowe hasło: <br />';
					echo'	<div ng-controller="KontrolerHasla">';
						echo'	<input type="password" required name="nowe_haslo1" ng-model="password" ng-change="analyze(password)"  />';	          
						echo' <div ng-style="silahasla"></div>';
					echo'</div>';
				echo'Powtórz nowe hasło: <br /><input type="password" required name="nowe_haslo2" readonly onfocus="this.removeAttribute(\'readonly\')" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#\$%\^&\*]).{8,20}" /></br></br>';
				echo'	<input type="submit" value="Zmień hasło" />';
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