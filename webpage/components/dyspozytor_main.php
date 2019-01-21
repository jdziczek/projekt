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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
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
      <h2>Zarządzanie zleceniami</h2>
        <table class="w3-table-all w3-hoverable">
          <thead>
            <tr class="w3-light-grey">
              <th>Numer kierowcy</th>
              <th>Numer zlecenia</th>
              <th>Data zlecenia</th>
              <th>Wycena</th>
              <th class="center_content">Status</th>
              <th class="center_content">Szczegóły</th>
              <th class="center_content">Usuń</th>
            </tr>
          </thead>
          <?php
	require_once "connect.php";
	
	$polaczenie = @new mysqli($host,$db_user,$db_password,$db_name);
	
	if($polaczenie->connect_errno!=0)
	{
		echo "Error:".$polaczenie->connect_errno;
	}
	else
	{
		if ($rezultat = @$polaczenie->query(
			sprintf("SELECT * FROM orders WHERE id_dispatcher='%s' ",
			mysqli_real_escape_string($polaczenie,$_SESSION['id_uzytkownika']))))
		{
			$ile_zlecen=$rezultat->num_rows;
			
			while($row=mysqli_fetch_array($rezultat))
			{
          echo "<tr>";
          echo "<td>";
          echo $row['id_crew'];
          echo "</td>";
					echo "<td>";
					echo $row['id_order'];
          echo "</td>";
          echo "<td>";
          echo $row['order_date'];
          echo "</td>";
          echo "<td>";
          echo $row['valuation'];
          echo " zł</td>";
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
          echo '<td class="center_content"><a class="zlecenie_szczegoly" data-order-id="';
          echo $row['id_order'];
          echo '" href="javascript:void(0)">';
          echo '<i class="fa fa-search">';
          echo "</i></a></td>";
          echo '<td class="center_content"><a class="delete_zlecenie" data-order-id="';
          echo $row['id_order'];
          echo '" href="javascript:void(0)">';
          echo '<i class="fa fa-close">';
          echo "</i></a></td>";
				echo "</tr>";
			}
		}
	}
?>
        </table>
      <p>
      <a class="w3-button w3-blue" data-toggle="modal" data-target="#noweZlecenieModal">Dodaj zlecenie</a>
      <a class="w3-button w3-blue" data-toggle="modal" data-target="#legendaModal">Legenda statusów</a>
      </div>
      <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php'; ?>
    </div>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/components/zlecenie_szczegoly.php'; ?>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/components/zlecenie_dodaj.php'; ?>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/components/zlecenie_legenda.php'; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/bootbox.min.js"></script>
    <script src="/js/main.js"></script>
  </body>
</html>