<?php

  session_start();

	require_once "connect.php";
	
	$conn = @new mysqli($host,$db_user,$db_password,$db_name);
	$conn -> query ('SET NAMES utf8');
	$conn -> query ('SET CHARACTER_SET utf8_unicode_ci');
	
  $sql1 = "SELECT * FROM orders WHERE id_order='".$_REQUEST['orderid']."'";
  $result = mysqli_query($conn, $sql1);
  $order = mysqli_fetch_array($result);

  $f_address_id=$order['f_address'];
  $sql2 = "SELECT * FROM address WHERE id_address='$f_address_id'";
  $result2 = mysqli_query($conn, $sql2);
  $f_address = mysqli_fetch_array($result2);

  $s_address_id=$order['s_address'];
  $sql3 = "SELECT * FROM address WHERE id_address='$s_address_id'";
  $result3 = mysqli_query($conn, $sql3);
  $s_address = mysqli_fetch_array($result3);

  $cargo_id=$order['id_cargo'];
  $sql4 = "SELECT * FROM cargo WHERE id_cargo='$cargo_id'";
  $result4 = mysqli_query($conn, $sql4);
  $cargo = mysqli_fetch_array($result4);

 echo "<form action='zlecenie_szczegoly_modyfikuj_script.php' method='post' id='zlecenieForm'>";
 echo "<div id='wrapper1'>";
   echo "<div>";
     echo "<h4> Podstawowe informacje</h4>";
     echo "<label>Nr:</label>";
     echo "<input type='text' name='order_id' id='order_id' value='".$_REQUEST['orderid']."'/>";
   echo "</div>";
   echo "<div>";
     echo "<label>Data zlecenia:</label>";
     echo "<input type='text' name='order_date' id='order_date' min='1' value='".$order['order_date']."' disabled/>";
   echo "</div>";
   echo "<div>";
     echo "<h4> Adres początkowy</h4>";
     echo "<label>Ulica:</label>";
      if ($_SESSION['zalogowany_K']) {
      echo "<input type='text' name='f_adress_street' id='f_adress_street' required pattern='[a-zA-Z]{1,}' value='".$f_address['street']."' disabled/>";
     } elseif ($_SESSION['zalogowany_D']) {
      echo "<input type='text' name='f_adress_street' id='f_adress_street' required pattern='[a-zA-Z]{1,}' value='".$f_address['street']."'/>";
     }
   echo "</div>";
   echo "<div>";
     echo "<label>Numer domu:</label>";
     if ($_SESSION['zalogowany_K']) {
      echo "<input type='number' name='f_adress_b_number' id='f_adress_b_number' min='1' value='".$f_address['b_number']."' disabled/>";
     } elseif ($_SESSION['zalogowany_D']) {
      echo "<input type='number' name='f_adress_b_number' id='f_adress_b_number' min='1' value='".$f_address['b_number']."'/>";
     }
   echo "</div>";
   echo "<div>";
     echo "<label>Numer lokalu:</label>";
     if ($_SESSION['zalogowany_K']) {
      echo "<input type='number' name='f_adress_a_number' id='f_adress_a_number' min='1' value='".$f_address['a_number']."' disabled/>";
     } elseif ($_SESSION['zalogowany_D']) {
      echo "<input type='number' name='f_adress_a_number' id='f_adress_a_number' min='1' value='".$f_address['a_number']."'/>";
     }
   echo "</div>";
   echo "<div>";
     echo "<label>Kod pocztowy:</label>";
     if ($_SESSION['zalogowany_K']) {
      echo "<input type='text' name='f_adress_zip_code' id='f_adress_zip_code' required pattern='[0-9]{2}-[0-9]{3}' value='".$f_address['zip_code']."' disabled/>";
     } elseif ($_SESSION['zalogowany_D']) {
      echo "<input type='text' name='f_adress_zip_code' id='f_adress_zip_code' required pattern='[0-9]{2}-[0-9]{3}' value='".$f_address['zip_code']."'/>";
     }
   echo "</div>";
   echo "<div>";
     echo "<label>Miasto:</label>";
     if ($_SESSION['zalogowany_K']) {
      echo "<input type='text' name='f_adress_city' id='f_adress_city' required pattern='[a-zA-Z]{1,}' value='".$f_address['city']."' disabled/>";
     } elseif ($_SESSION['zalogowany_D']) {
      echo "<input type='text' name='f_adress_city' id='f_adress_city' required pattern='[a-zA-Z]{1,}' value='".$f_address['city']."'/>";
     }
   echo "</div>";
   echo "<div>";
     echo "<label>Piętro:</label>";
     if ($_SESSION['zalogowany_K']) {
      echo "<input type='number' name='f_adress_floor' id='f_adress_floor' min='1' value='".$f_address['floor']."' disabled/>";
     } elseif ($_SESSION['zalogowany_D']) {
      echo "<input type='number' name='f_adress_floor' id='f_adress_floor' min='1' value='".$f_address['floor']."'/>";
     }
   echo "</div>";
   echo "<div>";
     echo "<h4> Adres końcowy</h4>";
     echo "<label>Ulica:</label>";
     if ($_SESSION['zalogowany_K']) {
      echo "<input type='text' name='s_adress_street' id='s_adress_street' required pattern='[a-zA-Z]{1,}' value='".$s_address['street']."' disabled/>";
     } elseif ($_SESSION['zalogowany_D']) {
      echo "<input type='text' name='s_adress_street' id='s_adress_street' required pattern='[a-zA-Z]{1,}' value='".$s_address['street']."'/>";
     }
   echo "</div>";
   echo "<div>";
     echo "<label>Numer domu:</label>";
     if ($_SESSION['zalogowany_K']) {
      echo "<input type='number' name='s_adress_b_number' id='s_adress_b_number' min='1' value='".$s_address['b_number']."' disabled/>";
     } elseif ($_SESSION['zalogowany_D']) {
      echo "<input type='number' name='s_adress_b_number' id='s_adress_b_number' min='1' value='".$s_address['b_number']."'/>";
     }
   echo "</div>";
   echo "<div>";
     echo "<label>Numer lokalu:</label>";
     if ($_SESSION['zalogowany_K']) {
      echo "<input type='number' name='s_adress_a_number' id='s_adress_a_number' min='1' value='".$s_address['a_number']."' disabled/>";
     } elseif ($_SESSION['zalogowany_D']) {
      echo "<input type='number' name='s_adress_a_number' id='s_adress_a_number' min='1' value='".$s_address['a_number']."'/>";
     }
   echo "</div>";
   echo "<div>";
     echo "<label>Kod pocztowy:</label>";
     if ($_SESSION['zalogowany_K']) {
      echo "<input type='text' name='s_adress_zip_code' id='s_adress_zip_code' required pattern='[0-9]{2}-[0-9]{3}' value='".$s_address['zip_code']."' disabled/>";
     } elseif ($_SESSION['zalogowany_D']) {
      echo "<input type='text' name='s_adress_zip_code' id='s_adress_zip_code' required pattern='[0-9]{2}-[0-9]{3}' value='".$s_address['zip_code']."'/>";
     }
   echo "</div>";
   echo "<div>";
     echo "<label>Miasto:</label>";
     if ($_SESSION['zalogowany_K']) {
      echo "<input type='text' name='s_adress_city' id='s_adress_city' required pattern='[a-zA-Z]{1,}' value='".$s_address['city']."' disabled/>";
     } elseif ($_SESSION['zalogowany_D']) {
      echo "<input type='text' name='s_adress_city' id='s_adress_city' required pattern='[a-zA-Z]{1,}' value='".$s_address['city']."'/>";
     }
   echo "</div>";
   echo "<div>";
     echo "<label>Piętro:</label>";
     if ($_SESSION['zalogowany_K']) {
      echo "<input type='number' name='s_adress_floor' id='s_adress_floor' min='1' value='".$s_address['floor']."' disabled/>";
     } elseif ($_SESSION['zalogowany_D']) {
      echo "<input type='number' name='s_adress_floor' id='s_adress_floor' min='1' value='".$s_address['floor']."'/>";
     }
   echo "</div>";
 echo "</div>";
 echo "<div id='wrapper2'>";
   echo "<div>";
     echo "<h4> Ładunek</h4>";
     echo "<label>Opis:</label>";
     if ($_SESSION['zalogowany_K']) {
      echo "<input type='text' name='cargo_dsc' id='cargo_dsc' value='".$cargo['cargo_dsc']."' disabled/>";
     } elseif ($_SESSION['zalogowany_D']) {
      echo "<input type='text' name='cargo_dsc' id='cargo_dsc' value='".$cargo['cargo_dsc']."'/>";
     }
   echo "</div>";
   echo "<div>";
     echo "<label>Waga:</label>";
     if ($_SESSION['zalogowany_K']) {
      echo "<input type='number' name='cargo_weight' id='cargo_weight' min='1' value='".$cargo['cargo_weight']."' disabled/>";
     } elseif ($_SESSION['zalogowany_D']) {
      echo "<input type='number' name='cargo_weight' id='cargo_weight' min='1' value='".$cargo['cargo_weight']."'/>";
     }
   echo "</div>";
   echo "<div>";
     echo "<label>Długość:</label>";
     if ($_SESSION['zalogowany_K']) {
      echo "<input type='text' name='cargo_length' id='cargo_length' value='".$cargo['cargo_length']."' disabled/>";
     } elseif ($_SESSION['zalogowany_D']) {
      echo "<input type='text' name='cargo_length' id='cargo_length' value='".$cargo['cargo_length']."'/>";
     }
   echo "</div>";
   echo "<div>";
     echo "<label>Szerokość:</label>";
     if ($_SESSION['zalogowany_K']) {
      echo "<input type='text' name='cargo_width' id='cargo_width' value='".$cargo['cargo_width']."' disabled/>";
     } elseif ($_SESSION['zalogowany_D']) {
      echo "<input type='text' name='cargo_width' id='cargo_width' value='".$cargo['cargo_width']."'/>";
     }
   echo "</div>";
   echo "<div>";
     echo "<label>Wysokość:</label>";
     if ($_SESSION['zalogowany_K']) {
      echo "<input type='text' name='cargo_height' id='cargo_height' value='".$cargo['cargo_height']."' disabled/>";
     } elseif ($_SESSION['zalogowany_D']) {
      echo "<input type='text' name='cargo_height' id='cargo_height' value='".$cargo['cargo_height']."'/>";
     }
   echo "</div>";
   echo "<h4> Inne dane</h4>";
   echo "<div>";
   echo "<label>Typ auta:</label>";
   if ($_SESSION['zalogowany_K']) {
    echo "<input type='text' name='car_type' id='car_type' value='".$order['car_type']."' disabled/>";
   } elseif ($_SESSION['zalogowany_D']) {
    echo '<select name="car_type" id="car_type" >';
    if ($order['car_type'] =="bus") {
     echo '<option value="bus" selected>bus</option>';
     echo '<option value="kontener">kontener</option>';
     echo '<option value="truck">truck</option>';
    }
    if ($order['car_type'] =="kontener") {
     echo '<option value="bus">bus</option>';
     echo '<option value="kontener" selected>kontener</option>';
     echo '<option value="truck">truck</option>';
    }
    if ($order['car_type'] =="truck") {
     echo '<option value="bus">bus</option>';
     echo '<option value="kontener">kontener</option>';
     echo '<option value="truck" selected>truck</option>';
    }
   echo "</select>";
   }
   echo "</div>";
   echo "<div>";
     echo "<label>Ludzie:</label>";
     if ($_SESSION['zalogowany_K']) {
      echo "<input type='number' name='people' id='people' min='1' max='20' value='".$order['people']."' disabled/>";
     } elseif ($_SESSION['zalogowany_D']) {
      echo "<input type='number' name='people' id='people' min='1' max='20' value='".$order['people']."'/>";
     }
   echo "</div>";
   echo "<div>";
     echo "<label>Telefon:</label>";
     if ($_SESSION['zalogowany_K']) {
      echo "<input type='text' name='phone' id='phone' required pattern='[0-9]{9}' value='".$order['phone']."' disabled/>";
     } elseif ($_SESSION['zalogowany_D']) {
      echo "<input type='text' name='phone' id='phone' required pattern='[0-9]{9}' value='".$order['phone']."'/>";
     }
   echo "</div>";
   echo "<div>";
     echo "<label>Dystans:</label>";
     if ($_SESSION['zalogowany_K']) {
      echo "<input type='text' name='distance' id='distance' value='".$order['distance']."' disabled/>";
     } elseif ($_SESSION['zalogowany_D']) {
      echo "<input type='text' name='distance' id='distance' value='".$order['distance']."'/>";
     }
   echo "</div>";
   echo "<div>";
     echo "<label>Wycena:</label>";
     if ($_SESSION['zalogowany_K']) {
      echo "<input type='text' name='valuation' id='valuation' value='".$order['valuation']."' disabled/>";
     } elseif ($_SESSION['zalogowany_D']) {
      echo "<input type='text' name='valuation' id='valuation' value='".$order['valuation']."'/>";
     }
   echo "</div>";
   echo "<div>";
     echo "<label>Przydzielona ekipa:</label>";
     if ($_SESSION['zalogowany_K']) {
      echo "<input type='text' name='id_crew' id='id_crew' value='".$order['id_crew']."' disabled/>";
     } elseif ($_SESSION['zalogowany_D']) {
      echo '<select name="id_crew" id="id_crew">';
      $sql5 = "SELECT id_crew FROM crew";
      $result5 = mysqli_query($conn, $sql5);
      while($crew = mysqli_fetch_array($result5)){
        echo '<option value="';
        echo $crew['id_crew'];
        if ($crew['id_crew'] == $order['id_crew']) {
         echo '" selected>';
        } else {
         echo '">';
        }
        echo $crew['id_crew'];
        echo '</option>';
      }
      mysqli_close($conn);
      echo "</select>";
     }
   echo "</div>";
  echo "<h4> Status</h4>";
   echo "<div>";
   if ($_SESSION['zalogowany_K']) {
    echo "<input type='text' name='status' id='status' min='1' value='".$order['status']."' disabled/>";
   } elseif ($_SESSION['zalogowany_D']) {
    echo '<select name="status" id="status" >';
    if ($order['status'] =="przyjete") {
     echo '<option value="przyjete" selected>przyjete</option>';
     echo '<option value="zrealizowane">zrealizowane</option>';
     echo '<option value="anulowane">anulowane</option>';
    }
    if ($order['status'] =="zrealizowane") {
     echo '<option value="przyjete">przyjete</option>';
     echo '<option value="zrealizowane" selected>zrealizowane</option>';
     echo '<option value="anulowane">anulowane</option>';
    }
    if ($order['status'] =="anulowane") {
     echo '<option value="przyjete">przyjete</option>';
     echo '<option value="zrealizowane">zrealizowane</option>';
     echo '<option value="anulowane" selected>anulowane</option>';
    }
   echo "</select>";
   }
 echo "</div>";
 echo "</div>";
 echo "</form>";
 echo "<h4> Komentarz dyspozytora</h4>";
 if ($_SESSION['zalogowany_K']) {
  echo "<textarea rows='2' cols='70' name='comment_disp' form='zlecenieForm' disabled>".$order['comment_disp']."</textarea>";
 } elseif ($_SESSION['zalogowany_D']) {
  echo "<textarea rows='2' cols='70' name='comment_disp' form='zlecenieForm'>".$order['comment_disp']."</textarea>";
 }
 echo "<h4> Komentarz kierowcy</h4>";
 if ($_SESSION['zalogowany_K']) {
  echo "<textarea rows='2' cols='70' name='comment_driver' form='zlecenieForm'>".$order['comment_driver']."</textarea>";
 } elseif ($_SESSION['zalogowany_D']) {
  echo "<textarea rows='2' cols='70' name='comment_driver' form='zlecenieForm' disabled>".$order['comment_driver']."</textarea>";
 }
 echo "<div>";
  echo "<input class='w3-button w3-blue' type='submit' value='Modyfikuj' form='zlecenieForm' />";
 echo "</div>";
