<?php
// Auteur: Talha
// Fucntie: connectie maken met de eerste database Cijfersysteem
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cijfersysteem";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

?>