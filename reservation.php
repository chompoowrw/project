<?php include("./head_front-end.php"); ?>
<link rel="stylesheet" href="./assets/css/register.css" media="screen">
</head>
<body class="u-body u-xl-mode">
  <?php include("./header_front-end.php"); ?>

  <section class="u-clearfix u-white u-section-1" id="sec-959e">
    <div class="u-clearfix u-sheet u-sheet-1">
      <div class="u-form u-form-1">
        <form action="#" method="POST" class="u-clearfix u-form-spacing-25 u-form-vertical u-inner-form" source="custom" name="form" style="padding: 30px;" novalidate>
          <div class="u-form-group u-form-name">
            <input type="hidden" placeholder="" id="user_id_reservation" name="user" class="u-border-1 u-border-grey-30 u-custom-font u-grey-5 u-input u-input-rectangle u-input-1" value="<?php echo $_SESSION['user_id']; ?>">
          </div>
          <div class="u-form-group u-form-group-3">
            <label for="name_reservation" class="u-custom-font u-label u-label-3">ชื่อ-นามสกุล</label>
            <input type="text" placeholder="" id="name_reservation" name="name" class="u-border-1 u-border-grey-30 u-custom-font u-grey-5 u-input u-input-rectangle u-input-3" value="<?php echo $_SESSION['user_name']; ?>">
          </div>
          <div class="u-form-group u-form-phone u-form-group-4">
            <label for="tel_reservation" class="u-custom-font u-label u-label-4">เบอร์โทร</label>
            <input type="tel" placeholder="" id="tel_reservation" name="tell" class="u-border-1 u-border-grey-30 u-custom-font u-grey-5 u-input u-input-rectangle u-input-4" value="<?php echo $_SESSION['user_tel']; ?>">
          </div>
          <div class="u-form-group u-form-group-6">
            <label for="deposit_reservation" class="u-custom-font u-label u-label-6">ค่ามัดจำ</label>
            <input type="text" placeholder="" id="deposit_reservation" name="line" class="u-border-1 u-border-grey-30 u-custom-font u-grey-5 u-input u-input-rectangle u-input-6">
          </div>
          <div class="u-align-right u-form-group u-form-submit">
            <button type="button" id="btn_reservation" class="u-border-none u-btn u-btn-round u-btn-submit u-button-style u-custom-font u-hover-palette-2-light-2 u-radius-12 u-text-hover-white u-btn-1">ยืนยันข้อมูล<br>
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