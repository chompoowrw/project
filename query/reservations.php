<?php
session_start();
date_default_timezone_set('Asia/Bangkok');
include("./../connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id_reservation = $_POST["user_id_reservation"];
    $name_reservation = $_POST["name_reservation"];
    $phone_reservation = $_POST["phone_reservation"];
    $deposit_reservation = $_POST["deposit_reservation"];

    $sql = "INSERT INTO tb_reservation (user_id, 
        reservation_name, 
        reservation_phone,
        deposit,
        status_id) 
      VALUES ('$user_id_reservation',
        '$name_reservation',
        '$phone_reservation',
        '$deposit_reservation',
        '1')";

    if ($conn->query($sql) == TRUE) {
        echo "success";
    } else {
        echo "error " . $conn->error;
    }
}
