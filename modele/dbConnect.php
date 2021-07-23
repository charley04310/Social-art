<?php
$servername = "localhost";
$username = "root";
$password = "root";

try {
<<<<<<< HEAD
  $conn = new PDO("mysql:host=$servername;dbname=socialart", $username, $password);
=======
  $conn = new PDO("mysql:host=$servername;dbname=social art", $username, $password);
>>>>>>> 5519748f379318fce13040dda85320838092afbc
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
} 



