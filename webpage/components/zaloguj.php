<?php
	session_start();
	if((!isset($_POST['login']))||(!isset($_POST['haslo'])))
	{
		header('Location: logowanie.php');
		exit();
	}
	require_once "connect.php";
	$polaczenie = @new mysqli($host,$db_user,$db_password,$db_name);
	if($polaczenie->connect_errno!=0)
	{
		echo "Error:".$polaczenie->connect_errno;
	}
	else
	{
		$_SESSION['login'] = $_POST['login'];
		$login=$_POST['login'];
		$haslo=$_POST['haslo'];
		
		$login=htmlentities($login, ENT_QUOTES,"UTF-8"); //czyszczenie z encji htmla
	
		if ($rezultat = @$polaczenie->query(
		sprintf("SELECT * FROM users WHERE BINARY login='%s'",// AND BINARY password='%s'", //sprawdzić poprawność zapytania sql
		mysqli_real_escape_string($polaczenie,$login))))
		//mysqli_real_escape_string($polaczenie,$haslo))))
		{
			$ilu_userow=$rezultat->num_rows;
			if($ilu_userow>0)
			{
				$wiersz=$rezultat->fetch_assoc(); //tablica asocjacyjna
				
				if(password_verify($haslo,$wiersz['password']))
				{
					$_SESSION['zalogowany']=true; //flaga
					$id=$wiersz['id_user'];
					$_SESSION['id_uzytkownika']=$id;
				
					if($typ_log = @$polaczenie->query(
					sprintf("SELECT * FROM employees WHERE id_employee='%s'",
					mysqli_real_escape_string($polaczenie,$id))))
					{
						$wiersz2=$typ_log->fetch_assoc();
						$_SESSION['typ_konta']=$wiersz2['position'];
						if($_SESSION['typ_konta']=="dyspozytor")
						{
							$_SESSION['zalogowany_D']=true;						//zalogowany dyspozytor
							$_SESSION['zalogowany_K']=false;
						}
						else if($_SESSION['typ_konta']=="kierowca")
						{
							$_SESSION['zalogowany_D']=false;
							$_SESSION['zalogowany_K']=true; //zalogowany kierowca
						}
						else
						{
							$_SESSION['blad']='<span style="color:red">Problem połączenia z bazą. Proszę spróbować później.</span>';
							header('Location: logowanie.php');
						}
					}
					unset($_SESSION['blad']); //usuwa zmienna blad
					$rezultat->free_result();
					if($_SESSION['zalogowany_D'])
					{
						header('Location: dyspozytor_main.php'); //przekierowanie
					}
					else if($_SESSION['zalogowany_K'])
					{
						header('Location: kierowca_main.php'); //przekierowanie
					}
				}
				else
				{
					$_SESSION['blad']='<span style="color:red">Nieprawidlowe hasło </span>';
					header('Location: logowanie.php');
				}
			}
			else
			{
				$_SESSION['blad']='<span style="color:red">Nieprawidlowy login </span>';
				header('Location: logowanie.php');
			}	
		}
		$polaczenie->close();
	}		
?>