<?php
session_start();
date_default_timezone_set('Asia/Bangkok');
include("./../connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name_regis = $_POST["name_regis"];
    $email_regis = $_POST["email_regis"];
    $tel_regis = $_POST["tel_regis"];
    $line_id_regis = $_POST["line_id_regis"];
    $usr_regis = $_POST["usr_regis"];
    $pwd_regis = $_POST["pwd_regis"];
    $pwd_regis = md5($pwd_regis);

    $sql_chk = "SELECT * FROM tb_user WHERE user_username = '$usr_regis'";
    $result_chk = mysqli_query($conn, $sql_chk);
    if (mysqli_num_rows($result_chk) == 0) {
        $sql = "INSERT INTO tb_user (user_name, 
        user_email, 
        user_tel, 
        user_lineid, 
        user_username, 
        user_password, 
        role_id) 
      VALUES ('$name_regis',
        '$email_regis', 
        '$tel_regis', 
        '$line_id_regis', 
        '$usr_regis',
        '$pwd_regis', 
        '2')";

        if ($conn->query($sql) == TRUE) {
            echo "success";
        } else {
            echo "error " . $conn->error;
        }
    } else {
        echo "already";
    }
}
