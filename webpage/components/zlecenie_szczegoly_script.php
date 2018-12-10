<?php
	$conn = mysqli_connect('localhost', 'root', '', 'jdb');

  $sql = "INSERT INTO orders (car_type) VALUES ('".$_POST['car_type']."')";
  
  if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    header('Location: dyspozytor_main.php');
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
?>
