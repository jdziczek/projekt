<?php
// polaczenie z baza
  require_once "connect.php";
	$conn = mysqli_connect($host, $db_user, $db_password, $db_name);

  // insert adresu poczatkowego
  if($_REQUEST['orderid']) {
    $sql = "CALL UsunZlecenie('".$_REQUEST['orderid']."')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
      echo "Zlecenie usunięte";
    }
  }
?>