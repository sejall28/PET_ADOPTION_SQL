<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost";
$user = "root";   // default for XAMPP
$pass = "";       // default for XAMPP
$db   = "pet_adoption";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
  die("❌ Connection failed: " . $conn->connect_error);
}

echo "✅ Database connected successfully!<br>";
?>
