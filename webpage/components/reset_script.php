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
		$login_uzytkownika=$_POST['login_uzytkownika'];
		require_once "connect.php";
		$polaczenie = @new mysqli($host,$db_user,$db_password,$db_name);
		if($polaczenie->connect_errno!=0)
		{
			echo "Error:".$polaczenie->connect_errno;
		}
		else
		{
			$login_uzytkownika=htmlentities($login_uzytkownika, ENT_QUOTES,"UTF-8");	
			if ($rezultat = @$polaczenie->query(
				sprintf("SELECT login FROM users WHERE BINARY login='%s'",
				mysqli_real_escape_string($polaczenie,$login_uzytkownika))))
			{
				$login_baza=$rezultat->fetch_assoc();
				if($login_baza['login']==$login_uzytkownika)
				{
				
					$haslo_hash=password_hash("abc123", PASSWORD_DEFAULT);
					$sql="UPDATE users SET password='$haslo_hash' WHERE login='$login_uzytkownika'";
					try
					{
						$zm_haslo = mysqli_query($polaczenie, $sql);
						$_SESSION['zmiana_OK']='<span style="color:green"><b>HASŁO ZOSTAŁO ZRESETOWANE!</b></span>';
						header('Location: admin_main.php');
					}
					catch (Exception $e)
					{
						echo 'Wystąpił problem ze zmianą hasła.'.$e->getMessage();
					}
				}
				else
				{
					$_SESSION['blad']='<span style="color:red">Podany użytkownik nie istnieje.</span>';
					header('Location: reset_hasla.php');
				}
			}
			else
			{
				$_SESSION['blad']='<span style="color:red">Podany użytkownik nie istnieje.</span>';
				header('Location: reset_hasla.php');
			}
		}
	}
	
	
?>