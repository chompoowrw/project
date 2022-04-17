<?php
	//เรียกใช้ไฟล์ autoload.php ที่อยู่ใน Folder vendor
	require_once __DIR__ . '/vendor/autoload.php';
	include('./connect.php');

  if (isset($_GET["order_id"])) {
    $customer_details = "";
    $order_details = "";
    $total = 0;
    $query = "SELECT * FROM tb_proposal_price 
              LEFT JOIN
              tb_user
              ON
              tb_proposal_price.user_id = tb_user.user_id 
              WHERE tb_proposal_price.proposal_price_id = '$_GET[order_id]'   
              ";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result)) {
      $customer_details = "  
                          <div class='order-head'>
                            <div class='order-date'> 
                              <b>เลขที่ใบเสนอราคา</b>
                              <span class='order-underline'>" . $_GET["proposal_price_id"] ." </span><br />
                              // <b>วันที่</b>
                              // <span class='order-underline'>" . $row['proposal_price_id'] ." </span>
                            </div>
                            // <div class='order-customer'> <b>ชื่อ-สกุล</b> 
                            //   <span class='order-underline'>" . $row["proposal_price_id"] ."</span><br />
                            //   <b>ที่อยู่</b> 
                            //   <span class='order-underline'>" . $row['proposal_price_id'] ." </span><br />
                            //   <b>เบอร์โทรศัพท์</b> 
                            //   <span class='order-underline'>" . $row['proposal_price_id'] ." </span><br />
                            //   <b>อีเมล</b> 
                            //   <span class='order-underline'>" . $row['proposal_price_id'] ." </span>
                            // </div>
                          </div>
                          ";
 
      $order_details .= "  
                          <tr>  
                            <td>".$row["product_name"]." ยี่ห้อ : ".$row["brand_name"]."</td>  
                            <td align='center'>" . number_format($row["order_price"], 2) . "</td>  
                            <td align='center'>" . $row["order_quantity"] . "</td>  
                            <td align='right'>" . number_format($row["order_quantity"] * $row["order_price"], 2) . "</td>  
                          </tr>  
                        ";
      $total = number_format($total + $row["order_quantity"] * $row["order_price"], 2);
    }
	
$mpdf = new \Mpdf\Mpdf();

$head = '
<style type="text/css">
body{
  font-family: "Garuda";//เรียกใช้font Garuda สำหรับแสดงผล ภาษาไทย
}
.order-container {
  font-family: "Garuda";//เรียกใช้font Garuda สำหรับแสดงผล ภาษาไทย
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
}
.order-head .order-date {
  text-align:right;
  margin:10px 0 10px 0;
  float:right;
  padding:5px;
}
.order-underline {
  border-bottom:#000 1px dashed;
}
.clear {
  clear:both;
}
</style>';

$order = "
<br />
<div class='order-container'>
  <div class='order-title'>ใบเสร็จ</div>
  " . $customer_details ." 
  <div class='clear'></div>
  <div class='order-content'>
    <table width='100%' border='1' cellpadding='3' cellspacing='0'>
      <tr>
        <td><strong>สินค้า</strong></td>
        <td align='center'><strong>ราคา</strong></td>
        <td align='center'><strong>จำนวน</strong></td>
        <td align='right'><strong>ราคารวม</strong></td>
      </tr>
      " . $order_details ." 
      <tr>
        <td colspan='3' align='right'><strong>รวมเงินทั้งสิ้น</strong></td>
        <td align='right'>" . $total ."</td>
      </tr>
    </table>
  </div>";
}
$end = "
</div>
<br>";


$mpdf->WriteHTML($head);

$mpdf->WriteHTML($order);

$mpdf->WriteHTML($end);

$mpdf->Output();