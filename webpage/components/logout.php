<?php
	session_start();
	session_unset(); //niszczenie sesji	
	header('Location: logowanie.php');
?>