<?php
$servername = "localhost";
$username = "root";  // ใช้ข้อมูลการเชื่อมต่อของคุณ
$password = "";      // ใช้ข้อมูลการเชื่อมต่อของคุณ
$dbname = "library";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
