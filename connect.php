<?php
  define('DB_SERVER', 'localhost');
  define('DB_USERNAME', 'astro');
  define('DB_PASSWORD', '7g"~u8r**RNS+3y');
  define('DB_NAME', 'api_test');

  $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

  if ($conn === false) {
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }
?>