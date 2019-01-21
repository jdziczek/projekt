<?php
	
session_start();
if(!isset($_SESSION['zalogowany']))
{
	header('Location: logowanie.php');
	exit(); 
}
else
{
	$haslo_st=$_POST['stare_haslo'];
	$haslo_n1=$_POST['nowe_haslo1'];
	$haslo_n2=$_POST['nowe_haslo2'];
	
	require_once "connect.php";
		
	$polaczenie = @new mysqli($host,$db_user,$db_password,$db_name);
	if($polaczenie->connect_errno!=0)
	{
		echo "Error:".$polaczenie->connect_errno;
	}
	else
	{
		if($haslo_n1==$haslo_n2)
		{	
			if(strlen($haslo_n1)>=8 && strlen($haslo_n1)<=20)
			{
				$haslo_st=htmlentities($haslo_st, ENT_QUOTES,"UTF-8"); 
				$haslo_n1=htmlentities($haslo_n1, ENT_QUOTES,"UTF-8");
				
				if ($rezultat = @$polaczenie->query(
				sprintf("SELECT password FROM users WHERE BINARY login='%s'",
				mysqli_real_escape_string($polaczenie,$_SESSION['login']))))
				{
					$haslo_baza=$rezultat->fetch_assoc();
					if(password_verify($haslo_st,$haslo_baza['password']))				
					{
						if($haslo_n1!=$haslo_st)
						{
							$haslo_hash=password_hash($haslo_n1, PASSWORD_DEFAULT);
							$login_uzytkownika=$_SESSION['login'];
							$sql="UPDATE users SET password='$haslo_hash' WHERE login='$login_uzytkownika'";

							try
							{
								$zm_haslo = mysqli_query($polaczenie, $sql);
								$_SESSION['zmiana_OK']='<span style="color:green"><b>HASŁO ZOSTAŁO ZMIENIONE!</b></span>';
								header('Location: haslo.php');
							}
							catch (Exception $e)
							{
								echo 'Wystąpił problem ze zmianą hasła. Spróbuj ponownie później lub skontaktuj się z administratorem'.$e->getMessage();
							}
						}
						else
						{
							$_SESSION['blad']='<span style="color:red">Nowe hasło nie może być takie jak poprzednie.</span>';
							header('Location: haslo.php');
						}	
					}
					else
					{
							$_SESSION['blad']='<span style="color:red">Niepoprawne stare hasło.</span>';
							header('Location: haslo.php');
					}
					$rezultat->free_result();
				}
				else
				{
					$_SESSION['blad']='<span style="color:red">Błąd połączenia z bazą.</span>';
					header('Location: haslo.php');
				}	
			}
			else
			{
				$_SESSION['blad']='<span style="color:red">Hasło powinno mieć 6-20 znaków.</span>';
				header('Location: haslo.php');
			}
		}
		else
		{
			$_SESSION['blad']='<span style="color:red">Nowe hasła powinny być takie same.</span>';
			header('Location: haslo.php');
		}
		$polaczenie->close();
	}		
}
?>
