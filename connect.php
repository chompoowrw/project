<?php
  //ตั้งค่าการเชื่อมต่อฐานข้อมูล
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "ngproject";
	
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
  } else {
    echo "Connection to server";
  }
  //กำหนด charset ให้เป็น utf8 เพื่อรองรับภาษาไทย
  mysqli_set_charset($conn,'UTF8');
?>
