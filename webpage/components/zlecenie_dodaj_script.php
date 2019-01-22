<?php

  session_start();

// polaczenie z baza
  require_once "connect.php";
	$conn = mysqli_connect($host, $db_user, $db_password, $db_name);


  // insert adresu poczatkowego
  try
  {
    $sql = "CALL DodajAdres('".$_POST['f_adress_street']."', '".$_POST['f_adress_b_number']."', '".$_POST['f_adress_a_number']."', '".$_POST['f_adress_zip_code']."', '".$_POST['f_adress_city']."', '".$_POST['f_adress_floor']."')";  
    $result = mysqli_query($conn, $sql);
  }
  catch (Exception $e)
  {
    echo 'Wystąpił problem z dodawaniem adresu początkowego. Spróbuj ponownie później lub skontaktuj się z administratorem'.$e->getMessage();
  }

  $sql = "SELECT MAX(id_address) FROM address";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  $f_adress_id = $row['MAX(id_address)'];

  // $call = "CALL id_adresu";
  // $res = mysqli_query($conn, $call); 
  // $row = mysqli_fetch_array($res);
  // $f_adress_id = $row['MAX(id_address)'];

   // insert adresu koncowego
   try
   {
    $sql = "CALL DodajAdres2('".$_POST['s_adress_street']."', '".$_POST['s_adress_b_number']."', '".$_POST['s_adress_a_number']."', '".$_POST['s_adress_zip_code']."', '".$_POST['s_adress_city']."', '".$_POST['s_adress_floor']."')";
    $result = mysqli_query($conn, $sql); 
    $s_adress_id = $f_adress_id+1; 
   }
   catch (Exception $e)
   {
     echo 'Wystąpił problem z dodawaniem adresu końcowego. Spróbuj ponownie później lub skontaktuj się z administratorem'.$e->getMessage();
   }

  // insert ladunku
  try
  {
    $sql = "CALL DodajLadunek('".$_POST['cargo_dsc']."', '".$_POST['cargo_weight']."', '".$_POST['cargo_length']."', '".$_POST['cargo_width']."', '".$_POST['cargo_height']."')";
    $result = mysqli_query($conn, $sql);
    $id_cargo = ($s_adress_id/2);
  }
  catch (Exception $e)
  {
    echo 'Wystąpił problem z dodawaniem ładunku. Spróbuj ponownie później lub skontaktuj się z administratorem'.$e->getMessage();
  }

  $id_dispatcher=$_SESSION['id_uzytkownika'];

  //insert zamowienia
  try
  {
    $mysqldate = date("Y-m-d");
    $mysqltime = date("H:i:s");
    $sql = "CALL DodajZlecenie('$mysqldate', '$mysqltime', '".$_POST['car_type']."', '".$_POST['people']."', $f_adress_id, $s_adress_id, '".$_POST['phone']."', '".$_POST['distance']."', '".$_POST['valuation']."', $id_cargo, '".$_POST['id_crew']."', 'przyjete', $id_dispatcher, '".$_POST['comment_dispatcher']."', '".$_POST['comment_driver']."')";  
  }
  catch (Exception $e)
  {
    echo 'Wystąpił problem z dodawaniem zlecenia. Spróbuj ponownie później lub skontaktuj się z administratorem'.$e->getMessage();
  }

  if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    header('Location: dyspozytor_main.php');
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

?>