<?php
// polaczenie z baza
  require_once "connect.php";
	$conn = mysqli_connect($host, $db_user, $db_password, $db_name);

  // insert adresu poczatkowego
  $sql = "DELETE FROM orders WHERE id_order='".$_POST['id_to_remove']."' ";
  
  $result = mysqli_query($conn, $sql);

  if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    header('Location: dyspozytor_main.php');
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

?>