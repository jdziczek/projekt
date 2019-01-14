<?php

	if(!isset($_SESSION['zalogowany']))
	{
		header('Location: logowanie.php');
		exit(); 
	}
	require_once "connect.php";
	
	$conn = @new mysqli($host,$db_user,$db_password,$db_name);
	
	if(isset($_SESSION['id_zlecenia']))
	{
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
        <h4 class="modal-title" id="zlecenieModalLabel">Szczegóły Zlecenia <span id="modal-order-id"></span></h4>
      </div>
      <div class="modal-body" id="zlecenie_szczegoly">
      </div>
    </div>
  </div>
</div>