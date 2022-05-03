<?php
include('./../connect.php');
date_default_timezone_set("Asia/Bangkok");

$user_id = $_POST['user_id_bill'];
$reservation_id = $_POST['reservation_id_bill'];
$payment_id = $_POST['payment_id_bill'];
$bill_name = $_POST['bill_name_bill'];
$bill_phone = $_POST['bill_phone_bill'];
$status_id = $_POST['status_id_bill'];

$sql2 = "INSERT INTO tb_bill (user_id, reservation_id, payment_id, bill_name, bill_phone, bill_date) VALUES 
        (
           '$user_id',
           '$reservation_id',
           '$payment_id',
           '$bill_name',
           '$bill_phone',
           '".date('Y-m-d')."'
        )
    ";
$result2 = $conn->query($sql2);

$sql = "UPDATE tb_reservation
        SET status_id = '$status_id'
        WHERE reservation_id = '$reservation_id'
        ";
$result = $conn->query($sql);

if ($result == True) {
  echo True;
} else {
  echo $sql;
}
