<?php
// polaczenie z baza
  session_start();
  require_once "connect.php";
	$conn = mysqli_connect($host, $db_user, $db_password, $db_name);

  if ($_SESSION['zalogowany_K']) {
    //update zamowienia
    $sql = "UPDATE orders SET comment_driver='".$_POST['comment_driver']."' WHERE id_order='".$_POST['order_id']."'";
    $result = mysqli_query($conn, $sql);
  }

  if ($_SESSION['zalogowany_D']) {
    //update zamowienia
    $sql = "UPDATE orders SET car_type='".$_POST['car_type']."', people='".$_POST['people']."', phone='".$_POST['phone']."', distance='".$_POST['distance']."', valuation='".$_POST['valuation']."', id_crew='".$_POST['id_crew']."', status='".$_POST['status']."', comment_disp='".$_POST['comment_disp']."' WHERE id_order='".$_POST['order_id']."'";
    $result = mysqli_query($conn, $sql);

    //pozyskanie id ladunku i adresow
    $sql = "SELECT * FROM orders WHERE id_order='".$_POST['order_id']."'";
    $result = mysqli_query($conn, $sql);
    $order = mysqli_fetch_array($result);

    //update ladunku
    $sql = "UPDATE cargo SET cargo_dsc='".$_POST['cargo_dsc']."', cargo_weight='".$_POST['cargo_weight']."', cargo_length='".$_POST['cargo_length']."', cargo_width='".$_POST['cargo_width']."', cargo_height='".$_POST['cargo_height']."' WHERE id_cargo='".$order['id_cargo']."'";
    $result = mysqli_query($conn, $sql);

    // update adresu koncowego
    $sql = "UPDATE address SET street='".$_POST['s_adress_street']."', b_number='".$_POST['s_adress_b_number']."', a_number='".$_POST['s_adress_a_number']."', zip_code='".$_POST['s_adress_zip_code']."', city='".$_POST['s_adress_city']."', floor='".$_POST['s_adress_floor']."' WHERE id_address='".$order['s_address']."'";
    $result = mysqli_query($conn, $sql);

    // update adresu koncowego
    $sql = "UPDATE address SET street='".$_POST['f_adress_street']."', b_number='".$_POST['f_adress_b_number']."', a_number='".$_POST['f_adress_a_number']."', zip_code='".$_POST['f_adress_zip_code']."', city='".$_POST['f_adress_city']."', floor='".$_POST['f_adress_floor']."' WHERE id_address='".$order['f_address']."'";
  }

  if (mysqli_query($conn, $sql)) {
    echo "Record edited successfully";
    header('Location: dyspozytor_main.php');
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

?>