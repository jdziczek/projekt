<?php
// polaczenie z baza
  require_once "connect.php";
	$conn = mysqli_connect($host, $db_user, $db_password, $db_name);

  // insert adresu poczatkowego
  $sql = "INSERT INTO address (street, b_number, a_number, zip_code, city, floor)
  VALUES ('".$_POST['f_adress_street']."', '".$_POST['f_adress_b_number']."', '".$_POST['f_adress_a_number']."', '".$_POST['f_adress_zip_code']."', '".$_POST['f_adress_city']."', '".$_POST['f_adress_floor']."')";
  
  $result = mysqli_query($conn, $sql);
  $f_adress_id = $conn->insert_id;

  // insert adresu koncowego
  $sql = "INSERT INTO address (street, b_number, a_number, zip_code, city, floor)
  VALUES ('".$_POST['s_adress_street']."', '".$_POST['s_adress_b_number']."', '".$_POST['s_adress_a_number']."', '".$_POST['s_adress_zip_code']."', '".$_POST['s_adress_city']."', '".$_POST['s_adress_floor']."')";
  
  $result = mysqli_query($conn, $sql);
  $s_adress_id = $conn->insert_id;

  // insert ladunku
  $sql = "INSERT INTO cargo (cargo_dsc, cargo_weight, cargo_length, cargo_width, cargo_height)
  VALUES ('".$_POST['cargo_dsc']."', '".$_POST['cargo_weight']."', '".$_POST['cargo_length']."', '".$_POST['cargo_width']."', '".$_POST['cargo_height']."')";
  
  $result = mysqli_query($conn, $sql);
  $id_cargo = $conn->insert_id;

  //insert zamowienia
  $mysqldate = date("Y-m-d");
  $mysqltime = date("H:i:s");
  $sql = "INSERT INTO orders (order_date, order_time, car_type, people, f_address, s_address, distance, valuation, id_cargo)
  VALUES ('$mysqldate', '$mysqltime', '".$_POST['car_type']."', '".$_POST['people']."', $f_adress_id, $s_adress_id, '".$_POST['distance']."', '".$_POST['valuation']."', $id_cargo)";

  if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    header('Location: dyspozytor_main.php');
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

?>