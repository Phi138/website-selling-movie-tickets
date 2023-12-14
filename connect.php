<?php
$servername = "localhost";
$username = "root";
$password = "";
$account="web_cinema";

// Create connection
$conn = new mysqli($servername, $username, $password,$account);
mysqli_set_charset($conn, 'UTF8');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "";
?>