<?php
// polaczenie z baza
  require_once "connect.php";
	$conn = mysqli_connect($host, $db_user, $db_password, $db_name);

  // insert adresu poczatkowego
  if($_REQUEST['orderid']) {

    try
    {
      $sql = "CALL UsunZlecenie('".$_REQUEST['orderid']."')";
      $result = mysqli_query($conn, $sql);
    }
    catch (Exception $e)
    {
      echo 'Wystąpił problem z usuwaniem zlecenia. Spróbuj ponownie później lub skontaktuj się z administratorem'.$e->getMessage();
    }

    if ($result) {
      echo "Zlecenie usunięte";
    }

  }
?>