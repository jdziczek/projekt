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
      <?php
  require_once "connect.php";
$conn = mysqli_connect($host, $db_user, $db_password, $db_name);
$call = "CALL pokaz_archiwum";
$result1 = mysqli_query($conn, $call);

echo "
<h2>Archiwum Zleceń</h2>
<table class='w3-table-all w3-hoverable'>
<thead>
  <tr class='w3-light-grey'>
    <th>Numer zlecenia</th>
    <th>Data</th>
    <th>Typ auta</th>
    <th>Adres startowy</th>
    <th>Adres końcowy</th>
    <th>Ładunek</th>
    <th>Ekipa</th>
    <th>Status</th>
    <th>Szczegóły</th>
  </tr>
</thead>";

while($row = mysqli_fetch_array($result1))

  {

 echo "<tr>";

  echo "<td>" . $row['id_order'] . "</td>";

  echo "<td>" . $row['order_date'] . "</td>";

  echo "<td>" . $row['car_type'] . "</td>";

  echo "<td>" . $row['f_address'] . "</td>";

  echo "<td>" . $row['s_address'] . "</td>";

  echo "<td>" . $row['id_cargo'] . "</td>";
  echo "<td>" . $row['id_crew'] . "</td>";
  echo '<td class="center_content">';
  if($row['status']=="przyjete")
  {
    echo'<i class="fa fa-truck w3-text-orange"></i>';
  }
  else if($row['status']=="zrealizowane")
  {
    echo'<i class="fa fa-truck w3-text-green"></i>';
  }
  else if($row['status']=="anulowane")
  {
    echo'<i class="fa fa-truck w3-text-red"></i>';
  }
  echo "</td>";
  echo '<td class="center_content"><a class="zlecenie_arch_szczegoly" data-order-id="';
  echo $row['id_order'];
  echo '" href="javascript:void(0)">';
  echo '<i class="fa fa-search">';
  echo "</i></a></td>";
  echo "</tr>";
  }
  echo "</table>";
  ?>
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