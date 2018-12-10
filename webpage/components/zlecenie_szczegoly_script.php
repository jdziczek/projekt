<?php

	require_once "connect.php";
	
	$conn = @new mysqli($host,$db_user,$db_password,$db_name);
	
	
	

	$sql = "SELECT * FROM orders WHERE id_orders='$_SESSION('id_zlecenia')'";
  
  if ($rezultat=mysqli_query($conn, $sql)) 
  {
    //echo "New record created successfully";
    //header('Location: dyspozytor_main.php');
	$_SESSION['zlecenie']=$rezultat->fetch_assoc();
	$_SESSION['car_type']= $zlecenie['car_type'];
	$_SESSION['people']=$zlecenie['people'];
	$_SESSION['distance']=$zlecenie['distance'];
	$_SESSION['comment_disp']=$zlecenie['comment_disp'];
	$f_address=$zlecenie['f_address'];
	$s_address=$zlecenie['s_address'];
	
	//i tak dalej co będzie potrzebne 
	
	$sql2="SELECT * FROM address WHERE id_address='f_address'";
	$sql3="SELECT * FROM address WHERE id_address='s_address'";
	
	if ($adres_f=mysqli_query($conn, $sql2))
	{
		$addr=$adres_f->fetch_assoc(); //adres końcowy
		$_SESSION['f_adress']=$addr['street']." ".$addr['a_number']."/".$addr['b_number']." ".$addr['zip_code']." ".$addr['city'];
		//street
		//b_number
		//a_number
		//zip_code
		//city
	}
	if ($adres_s=mysqli_query($conn, $sql3))
	{
		$addr2=$adres_s->fetch_assoc(); //adres początkowy
		$_SESSION['s_adress']=$addr2['street']." ".$addr2['a_number']."/".$addr2['b_number']." ".$addr2['zip_code']." ".$addr2['city'];
	}	
	
	header('Location: zlecenie_szczegoly.php');
  } 
  else 
  {
    //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	if($_SESSION['zalogowany_D'])
	{
		header('Location: dyspozytor_main.php');
	}
	else
	{
		header('Location: kierowca_main.php');
	}
  }
  
  
  
?>
