<?php
session_start();
date_default_timezone_set('Asia/Bangkok');
include("./../connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id_answer = $_POST["user_id_answer"];
    $answer_answer = $_POST["answer_answer"];

    $sql = "INSERT INTO tb_questionnaire (user_id, 
        questionnaire_date, 
        answer) 
      VALUES ('$user_id_answer',
        '" . date('Y-m-d') . "',
        '$answer_answer')";

    if ($conn->query($sql) == TRUE) {
        echo "success";
    } else {
        echo "error " . $conn->error;
    }
}
