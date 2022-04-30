<?php include("./head_front-end.php"); ?>
<link rel="stylesheet" href="./assets/css/login.css" media="screen">
</head>
<body class="u-body u-xl-mode">
  <?php include("./header_front-end.php"); ?>

  <section class="u-clearfix u-white u-section-1" id="sec-3646">
    <div class="u-clearfix u-sheet u-sheet-1">
      <div class="u-form u-form-1">
        <form action="#" method="POST" class="u-clearfix u-form-spacing-34 u-form-vertical u-inner-form" source="custom" name="form" style="padding: 36px;">
          <div class="u-form-group u-form-name">
            <label for="username_login" class="u-custom-font u-label u-label-1">ชื่อผู้ใช้</label>
            <input type="text" placeholder="กรุณากรอกชื่อผู้ใช้" id="username_login" name="user" class="u-border-1 u-border-grey-30 u-custom-font u-input u-input-rectangle u-white u-input-1">
          </div>
          <div class="u-form-group">
            <label for="password_login" class="u-custom-font u-label u-label-2">รหัสผ่าน</label>
            <input type="password" placeholder="กรุณากรอกรหัสผ่าน" id="password_login" name="password" class="u-border-1 u-border-grey-30 u-custom-font u-input u-input-rectangle u-white u-input-2">
          </div>
          <div class="container u-form-group ">
            <button type="button" id="btn_login" class="u-border-none u-btn u-btn-round u-btn-submit u-button-style u-custom-font u-hover-palette-1-light-1 u-radius-10 u-btn-1">เข้าสู่ระบบ</button>
            <input type="submit" value="submit" class="u-form-control-hidden">
            <!--<a href="./forget_password.php" class="u-custom-font " style="text-decoration:none; color:grey;">ลืมรหัสผ่าน</a>-->
          </div>
          <h2>-----------------------------------------------------</h2>
          <div class="container u-form-group ">
          <button type="button" onclick="window.location.href='./register.php'" class="u-border-none u-btn u-btn-round u-button-style u-custom-font u-hover-palette-1-base u-palette-2 u-radius-10 u-btn-1 ">สมัครสมาชิก</button>
          </div>
          <div class="u-form-send-message u-form-send-success"> Thank you! Your message has been sent. </div>
          <div class="u-form-send-error u-form-send-message"> ไม่พบข้อมูลสมัครสมาชิก </div>
          <input type="hidden" value="" name="recaptchaResponse">
        </form>
          <!--<div class="u-align-left u-form-group u-form-submit">
            <button type="button" id="btn_login" class="u-border-none u-btn u-btn-round u-btn-submit u-button-style u-custom-font u-hover-palette-2-light-1 u-radius-10 u-btn-1">เข้าสู่ระบบ</button>
            <input type="submit" value="submit" class="u-form-control-hidden">
            <div class="u-align-center u-form-group u-form-submit">
            <button type="button" id="btn_login" class="u-border-none u-btn u-btn-round u-btn-submit u-button-style u-custom-font u-hover-palette-2-light-1 u-radius-10 u-btn-2">เข้าสู่ระบบ</button>
          </div>
          </div>
          <div class="u-align-center u-form-group u-form-submit">
            <button type="button" id="btn_login" class="u-border-none u-btn u-btn-round u-btn-submit u-button-style u-custom-font u-hover-palette-2-light-1 u-radius-10 u-btn-1">เข้าสู่ระบบ</button>
          </div>
          <div class="u-form-send-message u-form-send-success"> Thank you! Your message has been sent. </div>
          <div class="u-form-send-error u-form-send-message"> ไม่พบข้อมูลสมัครสมาชิก </div>
          <input type="hidden" value="" name="recaptchaResponse">
        </form>
      </div>
      <div>
        <a href="./register.php" data-page-id="63675573" class="u-border-none u-btn u-btn-round u-button-style u-custom-font u-hover-palette-1-base u-palette-2-light-1 u-radius-10 u-btn-2">สมัครสมาชิก</a>
        
        <a href="./forget_password.php" class="u-border-none u-btn u-btn-round u-button-style u-custom-font u-hover-palette-1-base u-palette-2-light-1 u-radius-10 u-btn-2">ลืมรหัสผ่าน</a>
    </div>-->
  </section>

  <?php include("./footer_front-end.php"); ?>