<?php
  //ตั้งค่าการเชื่อมต่อฐานข้อมูล
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "dbproject";
	
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
  }
?>
