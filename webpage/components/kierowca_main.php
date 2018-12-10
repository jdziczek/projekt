<?php
	
	session_start();
	
	if($_SESSION['zalogowany_D'])
	{
		header('Location: dyspozytor_main.php');
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
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/sidebar_kierowca.php'; ?>
    <div class="w3-main">
      <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php'; ?>
      <div class="w3-container">
      <!-- content -->
        <h3>Twoje zlecenia</h3>
        <table class="w3-table-all w3-hoverable">
          <thead>
            <tr class="w3-light-grey">
              <th>Numer zlecenia</th>
              <th>Status</th>
              <th>Szczegóły</th>
            </tr>
          </thead>
         <!-- <tr>
            <td>2018/255</td>
            <td><i class="fa fa-truck w3-text-red"></i></td>
            <td><i class="fa fa-search" data-toggle="modal" data-target="#zlecenieModal"></i></td>
          </tr>-->
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
		sprintf("SELECT id_order, status FROM orders WHERE id_crew = '%s'",
		mysqli_real_escape_string($polaczenie,$_SESSION['id_uzytkownika']))))
		{
			//echo $_SESSION['id_uzytkownika'];
			$ile_zlecen=$rezultat->num_rows;
			
			//echo $ile_zlecen;
			
			while($row=mysqli_fetch_array($rezultat))
			{
				echo"<tr>";
					echo"<td>";
					echo $row['id_order'];
					echo"</td>";
					echo"<td>";
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
					echo"</td>";
					echo'<td><i class="fa fa-search" data-toggle="modal" data-target="#zlecenieModal">';
					//$_SESSION['id_zlecenia']=$row['id_order'];
					echo"</i></td>";
				echo"</tr>";
			}
		}
	}
?>
        </table>
      <!-- content -->
      </div>
      <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php'; ?>
    </div>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/components/zlecenie_szczegoly.php'; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="/js/main.js"></script>
  </body>
</html>