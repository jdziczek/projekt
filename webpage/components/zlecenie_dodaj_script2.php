<?php
// polaczenie z baza
  require_once "connect.php";
	$conn = mysqli_connect($host, $db_user, $db_password, $db_name);


  // insert adresu poczatkowego
  $sql = "CALL DodajAdres('".$_POST['f_adress_street']."', '".$_POST['f_adress_b_number']."', '".$_POST['f_adress_a_number']."', '".$_POST['f_adress_zip_code']."', '".$_POST['f_adress_city']."', '".$_POST['f_adress_floor']."')";  
  $result = mysqli_query($conn, $sql);
  $call = "CALL id_adresu";
  $res = mysqli_query($conn, $call); 
  $row = mysqli_fetch_array($res);
  $f_adress_id = $row['MAX(id_address)'];


   // insert adresu koncowego
  $sql = "CALL DodajAdres2('".$_POST['s_adress_street']."', '".$_POST['s_adress_b_number']."', '".$_POST['s_adress_a_number']."', '".$_POST['s_adress_zip_code']."', '".$_POST['s_adress_city']."', '".$_POST['s_adress_floor']."')";
  $result = mysqli_query($conn, $sql); 
  $s_adress_id = $f_adress_id+1; 


  // insert ladunku
  $sql = "CALL DodajLadunek('".$_POST['cargo_dsc']."', '".$_POST['cargo_weight']."', '".$_POST['cargo_length']."', '".$_POST['cargo_width']."', '".$_POST['cargo_height']."')";
  $result = mysqli_query($conn, $sql);
  $id_cargo = ($f_adress_id*2)-1;


  $id_dispatcher="1";

  //insert zamowienia
  $mysqldate = date("Y-m-d");
  $mysqltime = date("H:i:s");
  $sql = "CALL DodajZlecenie('$mysqldate', '$mysqltime', '".$_POST['car_type']."', '".$_POST['people']."', $f_adress_id, $s_adress_id, '".$_POST['phone']."', '".$_POST['distance']."', '".$_POST['valuation']."', $id_cargo, '".$_POST['id_crew']."', 'przyjete', $id_dispatcher, '".$_POST['comment_dispatcher']."', '".$_POST['comment_driver']."')";

  if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    header('Location: dyspozytor_main.php');
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

?>