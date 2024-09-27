<?php
$servername = "mysql49.unoeuro.com";
$username = "ddujonas_dk";
$password = "xz3c94Enek26HmydtaRg";
$dbname = "ddujonas_dk_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>
