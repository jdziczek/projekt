<?php
	
	session_start();
	
	if($_SESSION['zalogowany_K'])
	{
		header('Location: kierowca_main.php');
		exit();
	}
	else if(!isset($_SESSION['zalogowany']))
	{
		header('Location: logowanie.php');
		exit();
	}
?>

<!DOCTYPE html>
<html>
  <title>JBD Logistics</title>
  <head>
    <meta charset="utf-8">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue.css">
    <link href="/css/styles.css" rel="stylesheet" type="text/css">
  </head>
  <body>
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/sidebar_dyspozytor.php'; ?>
    <div class="w3-main">
      <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php'; ?>
      <div class="w3-container">
      <!-- content -->
      <h2>Archiwum</h2>
        <table class="w3-table-all w3-hoverable">
          <thead>
            <tr class="w3-light-grey">
              <th>Numer kierowcy</th>
              <th>Numer zlecenia</th>
              <th>Data zlecenia</th>
              <th>Wycena</th>
              <th class="center_content">Status</th>
              <th class="center_content">Szczegóły</th>
            </tr>
          </thead>
          <tr>
            <td>1</td>
            <td>1</td>
            <td>2018-12-10</td>
            <td>3000 zł</td>
            <td class="center_content"><i class="fa fa-truck w3-text-red"></i></a></td>
            <td class="center_content"><i class="fa fa-search"></i></a></td>
          </tr>
          <tr>
            <td>2</td>
            <td>2</td>
            <td>2018-12-11</td>
            <td>3000 zł</td>
            <td class="center_content"><i class="fa fa-truck w3-text-red"></i></a></td>
            <td class="center_content"><i class="fa fa-search"></i></a></td>
          </tr>
          <tr>
            <td>1</td>
            <td>3</td>
            <td>2018-12-12</td>
            <td>3000 zł</td>
            <td class="center_content"><i class="fa fa-truck w3-text-red"></i></a></td>
            <td class="center_content"><i class="fa fa-search"></i></a></td>
          </tr>
        </table>
      <!-- content -->
        <p>
        <a class="w3-button w3-blue" data-toggle="modal" data-target="#legendaModal">Legenda statusów</a>
        </div>
      <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php'; ?>
    </div>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/components/zlecenie_szczegoly.php'; ?>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/components/zlecenie_legenda.php'; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="/js/main.js"></script>
  </body>
</html>