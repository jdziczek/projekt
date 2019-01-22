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
try
{
  $call = "CALL pokaz_kierowcow";
  $result1 = mysqli_query($conn, $call);
}
catch (Exception $e)
{
  echo 'Wystąpił problem z pokazywaniem kierowców. Spróbuj ponownie później lub skontaktuj się z administratorem'.$e->getMessage();
}
echo "
<h2>Kierowcy</h2>
<table class='w3-table-all w3-hoverable'>
<thead>
  <tr class='w3-light-grey'>
    <th>Numer kierowcy</th>
    <th>Typ Auta</th>
    <th>Imię</th>
    <th>Nazwisko</th>
  </tr>
</thead>";

while($row = mysqli_fetch_array($result1))

  {

 echo "<tr>";

  echo "<td>" . $row['id_crew'] . "</td>";

  echo "<td>" . $row['car'] . "</td>";

  echo "<td>" . $row['e_name'] . "</td>";

  echo "<td>" . $row['e_surname'] . "</td>";

  echo "</tr>";

  }

  echo "</table>";
  ?>
      <!-- content -->
        </div>
      <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php'; ?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="/js/main.js"></script>
  </body>
</html>