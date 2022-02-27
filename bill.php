<?php include("./head_front-end.php"); ?>
<link rel="stylesheet" href="./assets/css/register.css" media="screen">
</head>
<body class="u-body u-xl-mode">
  <?php include("./header_front-end.php"); ?>

  <section class="u-clearfix u-white u-section-1" id="sec-959e">
    <div class="u-clearfix u-sheet u-sheet-1">
      <div class="u-form u-form-1">
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col"><div align="center">ลำดับ</div></th>
                <th scope="col"><div align="center">เลขที่ใบเสร็จ</div></th>
                <th scope="col">วันที่</th>
                <th scope="col">สถานะ</th>
                <th scope="col"><div align="center">ราคา</div></th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 1;

              $sql = "SELECT * FROM tb_bill 
                      LEFT JOIN
                      tb_reservation
                      ON
                      tb_bill.reservation_id = tb_reservation.reservation_id 
                      LEFT JOIN
                      tb_payment
                      ON
                      tb_bill.payment_id = tb_payment.payment_id 
                      LEFT JOIN
                      tb_status
                      ON
                      tb_status.status_id = tb_reservation.status_id 
                      WHERE tb_reservation.status_id = '3'";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
              ?>
              <tr>
                <th scope="row"><div align="center"><?php echo $i; ?></div></th>
                <td><div align="center"><?php echo $row["bill_id"]; ?></div></th>
                <td><?php echo $row["bill_date"]; ?></td>
                <td><?php echo $row["status_name"]; ?></td>
                <td><div align="center"><?php echo number_format($row["deposit"], 2); ?></div></td>
                <td><a href="./bill_detail.php?bill_id=<?php echo $row["bill_id"]; ?>" class="btn btn-light">แสดงใบเสร็จ</a></td>
              </tr>
              <?php
                  $i++;
                } //while condition closing bracket
              }  //if condition closing bracket
              ?>
            </tbody>
          </table>
      </div>
    </div>
  </section>

  <?php include("./footer_front-end.php"); ?>