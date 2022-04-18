<?php
# Is this the production server or not?
define("PRODUCTION", $_SERVER["SERVER_NAME"] == "web.rmutp.ac.th");
# ตั้งค่าการเชื่อมต่อฐานข้อมูล
if (PRODUCTION) {
  # Production
  $servername = "localhost";
<<<<<<< HEAD
  $username = "luxurybyfon";
  $password = "mj95c2gx";
  $dbname = "luxurybyfon";
=======
  $username = "ngn";
  $password = "y$?m22sj";
  $dbname = "ngn";
>>>>>>> 546a947cbdf768d09539a051bcb7664db72a7808
} else {
  # Development
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "ngproject";
}

# Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
# Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
# กำหนด charset ให้เป็น utf8 เพื่อรองรับภาษาไทย
mysqli_set_charset($conn, "UTF8");
?>