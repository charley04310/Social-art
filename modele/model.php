<?php

function dbConnect(){
$servername = "localhost";
$username = "root";
$password = "root";

try {
  $conn = new PDO("mysql:host=$servername;dbname=SocialArt", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connexion Réussie";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

};

dbConnect();