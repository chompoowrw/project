<?php
include('./../connect.php');
$proposal_price_id = $_POST['proposal_price_id_proposal_price'];
$user_id = $_POST['user_id_proposal_price'];
$company_name = $_POST['company_name_proposal_price'];
$proposal_price_phone = $_POST['proposal_price_phone_proposal_price'];

$sql = "UPDATE tb_proposal_price
        SET user_id = '$user_id',
            company_name = '$company_name',
            proposal_price_phone = '$proposal_price_phone'
        WHERE proposal_price_id = '$proposal_price_id'
        ";
$result = $conn->query($sql);

if ($result == True) {
  echo True;
} else {
  echo $sql;
}
