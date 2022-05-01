<?php
include('./../connect.php');
date_default_timezone_set("Asia/Bangkok");

$user_id_payment = $_POST['user_id_payment'];
$reservation_id_payment = $_POST['reservation_id_payment'];
$target_dir = "./../pay/";
$target_file = $target_dir . basename($_FILES["slip_payment"]["name"]);
$FileType = pathinfo($target_file, PATHINFO_EXTENSION);

if ($FileType != "jpg" && $FileType != "JPG" && $FileType != "jpeg" && $FileType != "JPEG" && $FileType != "png" && $FileType != "PNG") {
    // if (false) {
    // แจ้งเตือน! อนุญาตเฉพาะไฟล์นามสกุล jpg เท่านั้น
    echo "imageonly";
} else if (file_exists($target_dir . md5(basename($_FILES["slip_payment"]["name"])) . ".jpg")) {
    // แจ้งเตือน! มีไฟล์ชื่อนี้อยู่ในระบบแล้ว
    echo "exists";
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $changeName = $target_dir . md5(basename($_FILES["slip_payment"]["name"])) . ".jpg";

    if (move_uploaded_file($_FILES["slip_payment"]["tmp_name"], iconv('utf-8', 'windows-874', $changeName))) {
        $sql2 = "UPDATE tb_reservation SET 
        status_id = '2'
        WHERE reservation_id = '$reservation_id_payment'";
        $result = $conn->query($sql2);
        $sql = "INSERT INTO tb_payment (user_id, reservation_id, slip, payment_date) VALUES 
        ('$user_id_payment', 
        '$reservation_id_payment', 
        '". md5(basename($_FILES["slip_payment"]["name"])) ."',
        '".date('Y-m-d')."')";
        if ($conn->query($sql) == TRUE) {
            echo "success";
        } else {
            echo "error";
        }
    } else {
        echo "movefilefail";
    }
}
