<?php
include('./../connect.php');
$user_id = $_POST['user_id_proposal_price'];
$company_name = $_POST['company_name_proposal_price'];
$proposal_price_phone = $_POST['proposal_price_phone_proposal_price'];

$sql = "SELECT * FROM tb_proposal_price";
$result = $conn->query($sql);
$brand_id = ($result->num_rows + 1);
$sql = "INSERT INTO tb_proposal_price (user_id, company_name, proposal_price_phone) VALUES 
        (
           '$user_id',
           '$company_name',
           '$proposal_price_phone'
        )
    ";
$result = $conn->query($sql);
if ($result == TRUE) {
  $sql = "SELECT user_id FROM tb_proposal_price WHERE user_id = '$user_id'";
  $id = 0;
  $result = $conn->query($sql);
  while ($row = $result->fetch_assoc()) {
    $id = $row['user_id'];
  }
  echo $id;
} else {
  echo $sql;
}
