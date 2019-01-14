<?php
// polaczenie z baza
  require_once "connect.php";
	$conn = mysqli_connect($host, $db_user, $db_password, $db_name);

  //update zamowienia
  $sql = "UPDATE orders SET car_type='".$_POST['car_type']."', people='".$_POST['people']."', phone='".$_POST['phone']."', distance='".$_POST['distance']."', valuation='".$_POST['valuation']."', distance='".$_POST['distance']."' WHERE id_order='".$_SESSION['orderid']."'";

  if (mysqli_query($conn, $sql)) {
    echo "Record edited successfully";
    header('Location: dyspozytor_main.php');
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

?>