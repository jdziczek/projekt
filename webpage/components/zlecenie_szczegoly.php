<?php

	require_once "connect.php";
	
	$conn = @new mysqli($host,$db_user,$db_password,$db_name);
	
	
	
	$id_zlec=$_SESSION['id_zlecenia'];
	
	
	//echo $id_zlec;

	$sql = "SELECT * FROM orders WHERE id_order='$id_zlec'";
  
  if ($rezultat=mysqli_query($conn, $sql)) 
  {
    //echo "New record created successfully";
    //header('Location: dyspozytor_main.php');
	$zlecenie=$rezultat->fetch_assoc();
	$_SESSION['car_type']= $zlecenie['car_type'];
	$_SESSION['people']=$zlecenie['people'];
	$_SESSION['distance']=$zlecenie['distance'];
	$_SESSION['comment_disp']=$zlecenie['comment_disp'];
	$_SESSION['phone']= $zlecenie['phone'];
	$f_address=$zlecenie['f_address'];
	$s_address=$zlecenie['s_address'];
	
	//echo $f_address;
	//echo $s_address;
	
	//i tak dalej co będzie potrzebne 
	
	$sql2="SELECT * FROM address WHERE id_address='$f_address'";
	$sql3="SELECT * FROM address WHERE id_address='$s_address'";
	
	if ($adres_f=mysqli_query($conn, $sql2))
	{
		$addr=$adres_f->fetch_assoc(); //adres końcowy
		$_SESSION['f_adress']=$addr['street']." ".$addr['a_number']."/".$addr['b_number'].", ".$addr['zip_code']." ".$addr['city'];
		//echo $_SESSION['f_adress'];
		//echo $addr['street'];
		//street
		//b_number
		//a_number
		//zip_code
		//city
	}
	if ($adres_s=mysqli_query($conn, $sql3))
	{
		$addr2=$adres_s->fetch_assoc(); //adres początkowy
		$_SESSION['s_adress']=$addr2['street']." ".$addr2['a_number']."/".$addr2['b_number'].", ".$addr2['zip_code']." ".$addr2['city'];
		//echo $_SESSION['s_adress'];
	}	
  } 
  else 
  {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
  
  
?>

<div class="modal fade" id="zlecenieModal" tabindex="-1" role="dialog" aria-labelledby="zlecenieModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span>
        </button>
        <h4 class="modal-title" id="zlecenieModalLabel">Szczegóły Zlecenia</h4>
      </div>
      <div class="modal-body">
        <form>
				     <div>
            <label>Adres początkowy:</label>
			<?php
            echo'<input type="text" name="s_adress" id="s_adress" style="width:400px" value="';
			echo $_SESSION['s_adress'];
			echo '" disabled/>';
			?>
          </div>
		  
		   <div>
            <label>Adres końcowy:</label>
			<?php
            echo'<input type="text" name="f_adress" id="f_adress" style="width:400px" value="';
			echo $_SESSION['f_adress'];
			echo '" disabled/>';
			?>
          </div>
        <div>
            <label>Typ auta:</label>
            <?php
			echo'<input type="text" name="car_type" id="car_type" value="';
			echo $_SESSION['car_type'];
			echo '" disabled/>';
			?>
          </div>
          <div>
            <label>Ludzie:</label>
			<?php
            echo'<input type="text" name="people" id="people" value="';
			echo $_SESSION['people'];
			echo '" disabled/>';
			?>
          </div>
          <div>
            <label>Dystans:</label>
			<?php
            echo'<input type="text" name="distance" id="distance" value="';
			echo $_SESSION['distance'];
			echo '" disabled/>';
			?>
          </div>
          <div>
            <label>Telefon:</label>
			<?php
            echo'<input type="text" name="phone" id="phone" value="';
			echo $_SESSION['phone'];
			echo '" disabled/>';
			?>
          </div>


		  
		  
          <div>
          <input class="w3-button w3-blue" type="submit" value="Modyfikuj" />
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

