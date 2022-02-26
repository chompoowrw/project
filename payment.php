<?php include("./head_front-end.php"); ?>
<link rel="stylesheet" href="./assets/css/register.css" media="screen">
</head>
<body class="u-body u-xl-mode">
  <?php include("./header_front-end.php"); ?>

  <section class="u-clearfix u-white u-section-1" id="sec-959e">
    <div class="u-clearfix u-sheet u-sheet-1">
      <div class="u-form u-form-1">
        <form action="#" method="POST" class="u-clearfix u-form-spacing-25 u-form-vertical u-inner-form" source="custom" id="form_payment" name="form_payment" style="padding: 30px;" novalidate>
          <div class="u-form-group u-form-name">
            <input type="hidden" placeholder="" id="user_id_payment" name="user_id_payment" class="u-border-1 u-border-grey-30 u-custom-font u-grey-5 u-input u-input-rectangle u-input-1" value="<?php echo $_SESSION['user_id']; ?>">
          </div>
          <div class="u-form-group u-form-group-3">
            <label for="name_payment" class="u-custom-font u-label u-label-3">ชื่อ-นามสกุล</label>
            <input type="text" placeholder="" id="name_payment" name="name_payment" class="u-border-1 u-border-grey-30 u-custom-font u-grey-5 u-input u-input-rectangle u-input-3" value="<?php echo $_SESSION['user_name']; ?>">
          </div>
          <div class="u-form-group u-form-phone u-form-group-4">
            <label for="tel_payment" class="u-custom-font u-label u-label-4">เบอร์โทร</label>
            <input type="tel" placeholder="" id="tel_payment" name="tel_payment" class="u-border-1 u-border-grey-30 u-custom-font u-grey-5 u-input u-input-rectangle u-input-4" value="<?php echo $_SESSION['user_tel']; ?>">
          </div>
          <div class="u-form-group u-form-group-6">
            <label for="reservation_id_payment" class="u-custom-font u-label u-label-6">การจอง</label>
            <select id="reservation_id_payment" name="reservation_id_payment" class="u-border-1 u-border-grey-30 u-custom-font u-grey-5 u-input u-input-rectangle u-input-6" aria-label="Default select example">
              <?php
              $i = 1;
              $sql = "SELECT DISTINCT *
              FROM tb_reservation
              LEFT JOIN
              tb_user
              ON
              tb_reservation.user_id = tb_user.user_id
              WHERE tb_reservation.user_id = $_SESSION[user_id] AND tb_reservation.status_id = '1'
              ";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
              ?>
              <option value="<?php echo $row["reservation_id"]; ?>">#<?php echo $row["reservation_id"]; ?> (รวมทั้งหมด <?php echo number_format($row["deposit"], 2); ?>)</option>
              <?php
                $i++;
                } //while condition closing bracket
              }  //if condition closing bracket
              ?>
            </select>
          </div>
          <div class="u-form-group u-form-group-6">
            <label for="slip_payment" class="u-custom-font u-label u-label-6">หลักฐานการโอนเงิน</label>
            <input type="file" placeholder="" id="slip_payment" name="slip_payment" class="u-border-1 u-border-grey-30 u-custom-font u-grey-5 u-input u-input-rectangle u-input-6">
          </div>
          <div class="u-align-right u-form-group u-form-submit">
            <button type="submit" name="submit" class="u-border-none u-btn u-btn-round u-btn-submit u-button-style u-custom-font u-hover-palette-2-light-2 u-radius-12 u-text-hover-white u-btn-1">บันทึก<br>
            </button>
            <input type="submit" value="submit" class="u-form-control-hidden">
          </div>
          <div class="u-form-send-message u-form-send-success"> Thank you! Your message has been sent. </div>
          <div class="u-form-send-error u-form-send-message"> กรุณากรอกข้อมูลให้ครบถ้วน </div>
          <input type="hidden" value="" name="recaptchaResponse">
        </form>
      </div>
    </div>
  </section>

  <?php include("./footer_front-end.php"); ?>