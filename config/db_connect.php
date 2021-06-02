<?php

  // Connect to database with MySQLi
  // connection = (host, username, password, database_name)
  $conn = mysqli_connect('localhost', 'nate', 'test1234', 'ninja_pizza');

  // Check connection
  if (!$conn) {
    echo 'Connection error: ' . mysqli_connect_error();
  }
  
?>
