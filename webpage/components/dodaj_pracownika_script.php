<?php
	
	session_start();
	if(!isset($_SESSION['zalogowany']))
	{
		header('Location: logowanie.php');
		exit(); 
	}
	else if($_SESSION['zalogowany_D'])
	{
		header('Location: dyspozytor_main.php');
		exit();
	}
	else if($_SESSION['zalogowany_K'])
	{
		header('Location: kierowca_main.php');
		exit();
	}
	else
	{
		require_once "connect.php";
		$polaczenie = @new mysqli($host,$db_user,$db_password,$db_name);
		if($polaczenie->connect_errno!=0)
		{
			echo "Error:".$polaczenie->connect_errno;
		}
		else
		{
			$nowy_login=$_POST['login_uzytkownika'];
			if ($rezultat = @$polaczenie->query(
				sprintf("SELECT login FROM users",
				mysqli_real_escape_string($polaczenie))))
			{
				$flaga=false;
				while($loginy=$rezultat->fetch_assoc())
				{
					if($loginy['login']==$nowy_login)
					{
						$flaga=true;
					}
				}
			}
			$rezultat->free_result();
			if($flaga==true)
			{
				$_SESSION['blad']='<span style="color:red">Login jest już zajęty</span>';
				header('Location: dodaj_pracownika.php');
			}
			else
			{
				$sql = "INSERT INTO employees (e_name, e_surname, position)
				VALUES ('".$_POST['imie']."', '".$_POST['nazwisko']."', '".$_POST['stanowisko']."')";	
				
				$result = mysqli_query($polaczenie, $sql);
				$id_employee = $polaczenie->insert_id;
				
				$haslo_hash=password_hash("abc123", PASSWORD_DEFAULT);
				$sql = "INSERT INTO users (id_user,login, password)
				VALUES ('".$id_employee."','".$_POST['login_uzytkownika']."', '".$haslo_hash."')";	
			}
		}
		
	}
	if (mysqli_query($polaczenie, $sql)) {
    echo "New record created successfully";
	$_SESSION['zmiana_OK']='<span style="color:green"><b>NOWY PRACOWNIK ZOSTAŁ DODANY POPRAWNIE.</b></span>';
    header('Location: admin_main.php');
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($polaczenie);
  }
	
	
?>