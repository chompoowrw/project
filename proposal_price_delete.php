<?php
  include('./connect.php');
  if ($_GET) {
    $proposal_price_id = $_GET['proposal_price_id'];
    $sql = "DELETE FROM tb_proposal_price WHERE proposal_price_id = '$proposal_price_id'";
    $result = $conn->query($sql);
    if ($result == TRUE) {
      header('location:proposal_price.php?m=1');
    }
  }
?>