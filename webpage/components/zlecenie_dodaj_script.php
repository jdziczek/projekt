<?php
	mysql_connect('localhost', 'root', '');
	mysql_select_db('jdb');

  $sql = "INSERT INTO orders (car_type) VALUES ('".$_POST['car_type']."')";

  if (isset($_POST['car_type'])) {
    header('Location: dyspozytor_main.php');
  }
?>