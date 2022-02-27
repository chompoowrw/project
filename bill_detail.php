<?php
session_start();
require_once("connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>ใบสั่งซื้อสินค้า</title>
<style type="text/css">
.order-container {
	font-family:Tahoma, Geneva, sans-serif;
	margin:0px auto;
	width:950px;
	font-size:14px;
}
.order-head {
	margin:50px 0 10px 0;
}
.order-title {
	text-align:center;
	font-size:24px;
	font-weight:bold;
}
.order-head .order-customer {
	float:left;
	margin:10px 0 10px 0;
	padding:5px;
	border:1px solid #000;
}
.order-head .order-date {
	text-align:right;
	margin:10px 0 10px 0;
	float:right;
	padding:5px;
	border:1px solid #000;
}
.order-underline {
	border-bottom:#000 1px dashed;
}
.clear {
	clear:both;
}
</style>
</head>
<body>
<div class="order-container">
  <div class="order-title">ใบเสร็จ</div>
  <?php
  if (isset($_GET["bill_id"])) {
    $customer_details = "";
    $order_details = "";
    $total = 0;
    $query = "SELECT * FROM tb_bill 
              LEFT JOIN
              tb_reservation
              ON
              tb_bill.reservation_id = tb_reservation.reservation_id 
              LEFT JOIN
              tb_payment
              ON
              tb_bill.payment_id = tb_payment.payment_id 
              WHERE tb_bill.bill_id = '$_GET[bill_id]'   
              ";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result)) {
      $customer_details = "  
                          <div class='order-head'>
                            <div class='order-date'> 
                              <b>เลขที่ใบเสร็จ</b>
                              <span class='order-underline'>" . $_GET["bill_id"] ." </span><br />
                              <b>วันที่</b>
                              <span class='order-underline'>" . $row['bill_date'] ." </span>
                            </div>
                            <div class='order-customer'> <b>ชื่อ-สกุล</b> 
                              <span class='order-underline'>" . $row["bill_name"] ."</span><br />
                              <b>เบอร์โทรศัพท์</b> 
                              <span class='order-underline'>" . $row['bill_phone'] ." </span><br />
                              <b>อีเมล</b> 
                              <span class='order-underline'>" . $_SESSION['user_email'] ." </span>
                            </div>
                          </div>
                          ";
 
      $order_details .= "  
                          <tr>  
                            <td>".$row["reservation_name"]."</td>  
                            <td>" . number_format($row["deposit"], 2) . "</td>  
                          </tr>  
                        ";
                        $total = number_format($row["deposit"], 2);
    }
  ?>

  <?php echo $customer_details ?>

  <div class="clear"></div>
  <div class="order-content">
    <table width="100%" border="1" cellpadding="3" cellspacing="0">
      <tr>
        <td><strong>รายการ</strong></td>
        <td><strong>ราคา</strong></td>
      </tr>
      <?php echo $order_details ?>
      <tr>
        <td colspan="1" align="right"><strong>รวมเงินทั้งสิ้น</strong></td>
        <td><?=$total?></td>
      </tr>
    </table>
  </div>
  <?php
      }
    ?>
</div>
</body>
</html>
<? $conn->Close();//ปิดการเชื่อมต่อกับฐานข้อมูล?>