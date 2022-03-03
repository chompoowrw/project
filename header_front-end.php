<header class="u-border-2 u-border-grey-75 u-clearfix u-custom-color-6 u-header u-header" id="sec-22d0">
  <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
    <div class="menu-collapse u-custom-font" style="font-size: 1.5rem; letter-spacing: 0px; font-family: Circular; font-weight: 400;">
      <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
        <svg class="u-svg-link" viewBox="0 0 24 24">
          <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-57e4"></use>
        </svg>
        <svg class="u-svg-content" version="1.1" id="svg-57e4" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
          <g>
            <rect y="1" width="16" height="2"></rect>
            <rect y="7" width="16" height="2"></rect>
            <rect y="13" width="16" height="2"></rect>
          </g>
        </svg>
      </a>
    </div>
    <div class="u-custom-menu u-nav-container">
      <ul class="u-custom-font u-nav u-unstyled u-nav-1">
        <?php
        if (!isset($_SESSION['user_username'])) {
        ?>
        <li class="u-nav-item">
          <a class="u-button-style u-nav-link u-text-active-white u-text-body-alt-color u-text-hover-palette-4-light-2" href="./login.php" style="padding: 10px 8px;">เข้าสู่ระบบ</a>
        </li>
        <li class="u-nav-item">
          <a class="u-button-style u-nav-link u-text-active-white u-text-body-alt-color u-text-hover-palette-4-light-2" href="./register.php" style="padding: 10px 8px;">สมัครสมาชิก</a>
        </li>
        <?php
        } else {
        ?>
        <li class="u-nav-item">
          <a class="u-button-style u-nav-link u-text-active-white u-text-body-alt-color u-text-hover-palette-4-light-2" href="#" style="padding: 10px 8px;"><?php echo $_SESSION["user_name"]; ?></a>
        </li>
        <li class="u-nav-item">
          <a class="u-button-style u-nav-link u-text-active-white u-text-body-alt-color u-text-hover-palette-4-light-2" href="./logout.php" style="padding: 10px 8px;">ออกจากระบบ</a>
        </li>
        <?php
        }
        ?>
      </ul>
    </div>
    <div class="u-custom-menu u-nav-container-collapse">
      <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
        <div class="u-inner-container-layout u-sidenav-overflow">
          <div class="u-menu-close"></div>
          <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
            <?php
            if (!isset($_SESSION['user_username'])) {
            ?>
            <li class="u-nav-item">
              <a class="u-button-style u-nav-link" href="./login.php" style="padding: 10px 8px;">เข้าสู่ระบบ</a>
            </li>
            <li class="u-nav-item">
              <a class="u-button-style u-nav-link" href="./register.php" style="padding: 10px 8px;">สมัครสมาชิก</a>
            </li>
            <?php
            } else {
            ?>
            <li class="u-nav-item">
              <a class="u-button-style u-nav-link" href="#" style="padding: 10px 8px;"><?php echo $_SESSION["user_name"]; ?></a>
            </li>
            <li class="u-nav-item">
              <a class="u-button-style u-nav-link" href="./logout.php" style="padding: 10px 8px;">ออกจากระบบ</a>
            </li>
            <?php
            }
            ?>
          </ul>
        </div>
      </div>
      <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
    </div>
  </nav>
  <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-2">
    <div class="menu-collapse u-custom-font" style="font-size: 1.875rem; letter-spacing: 0px; font-family: Circular; font-weight: 700;">
      <a class="u-button-style u-custom-active-color u-custom-border u-custom-border-color u-custom-hover-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
        <svg class="u-svg-link" viewBox="0 0 24 24">
          <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use>
        </svg>
        <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
          <g>
            <rect y="1" width="16" height="2"></rect>
            <rect y="7" width="16" height="2"></rect>
            <rect y="13" width="16" height="2"></rect>
          </g>
        </svg>
      </a>
    </div>
    <div class="u-custom-menu u-nav-container">
      <ul class="u-custom-font u-nav u-spacing-2 u-unstyled u-nav-3">
        <li class="u-nav-item">
          <a class="u-active-white u-button-style u-hover-grey-10 u-nav-link u-text-active-black u-text-body-alt-color u-text-hover-grey-90 <?php if (basename($_SERVER['PHP_SELF']) == "index.php") {
                                                echo "active";
                                              } else {
                                                echo "";
                                              } ?>" href="./index.php" style="padding: 10px 32px;">หน้าแรก</a>
        </li>
        <li class="u-nav-item">
          <a class="u-active-white u-button-style u-hover-grey-10 u-nav-link u-text-active-black u-text-body-alt-color u-text-hover-grey-90 <?= (basename($_SERVER['PHP_SELF']) == "news.php") ? "active" : ""; ?>" href="./news.php" style="padding: 10px 32px;">ข่าวประชาสัมพันธ์</a>
        </li>
        <li class="u-nav-item">
          <a class="u-active-white u-button-style u-hover-grey-10 u-nav-link u-text-active-black u-text-body-alt-color u-text-hover-grey-90 <?= (basename($_SERVER['PHP_SELF']) == "company.php") ? "active" : ""; ?>" href="./company.php" style="padding: 10px 32px;">รู้จักบริษัท</a>
        </li>
        <?php
        if (!isset($_SESSION['user_username'])) {
        } 
        else {
        ?>
        <li class="u-nav-item">
          <a class="u-active-white u-button-style u-hover-grey-10 u-nav-link u-text-active-black u-text-body-alt-color u-text-hover-grey-90 <?= (basename($_SERVER['PHP_SELF']) == "reservation.php") ? "active" : ""; ?>" href="./reservation.php" style="padding: 10px 32px;">การจอง</a>
        </li>
        <li class="u-nav-item">
          <a class="u-active-white u-button-style u-hover-grey-10 u-nav-link u-text-active-black u-text-body-alt-color u-text-hover-grey-90 <?= (basename($_SERVER['PHP_SELF']) == "payment.php") ? "active" : ""; ?>" href="./payment.php" style="padding: 10px 32px;">การชำระเงิน</a>
        </li>
        <li class="u-nav-item">
          <a class="u-active-white u-button-style u-hover-grey-10 u-nav-link u-text-active-black u-text-body-alt-color u-text-hover-grey-90 <?= (basename($_SERVER['PHP_SELF']) == "bill.php") ? "active" : ""; ?>" href="./bill.php" style="padding: 10px 32px;">ประวัติการชำระ</a>
        </li>
        <?php
        }
        ?>
        <li class="u-nav-item">
          <a class="u-active-white u-button-style u-hover-grey-10 u-nav-link u-text-active-black u-text-body-alt-color u-text-hover-grey-90 <?= (basename($_SERVER['PHP_SELF']) == "potential.php") ? "active" : ""; ?>" href="./potential.php" style="padding: 10px 32px;">ศักยภาพ</a>
        </li>
        <li class="u-nav-item">
          <a class="u-active-white u-button-style u-hover-grey-10 u-nav-link u-text-active-black u-text-body-alt-color u-text-hover-grey-90 <?= (basename($_SERVER['PHP_SELF']) == "contact.php") ? "active" : ""; ?>" href="./contact.php" style="padding: 10px 32px;">ติดต่อเรา</a>
        </li>
      </ul>
    </div>
    <div class="u-custom-menu u-nav-container-collapse">
      <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
        <div class="u-inner-container-layout u-sidenav-overflow">
          <div class="u-menu-close"></div>
          <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-4">
            <li class="u-nav-item <?php if (basename($_SERVER['PHP_SELF']) == "index.php") {
                                                echo "active";
                                              } else {
                                                echo "";
                                              } ?>">
              <a class="u-button-style u-nav-link" href="./index.php" style="padding: 10px 32px;">หน้าแรก</a>
            </li>
            <li class="u-nav-item">
              <a class="u-button-style u-nav-link <?= (basename($_SERVER['PHP_SELF']) == "news.php") ? "active" : ""; ?>" href="./news.php" style="padding: 10px 32px;">ข่าวประชาสัมพันธ์</a>
            </li>
            <li class="u-nav-item">
              <a class="u-button-style u-nav-link <?= (basename($_SERVER['PHP_SELF']) == "company.php") ? "active" : ""; ?>" href="./company.php" style="padding: 10px 32px;">รู้จักบริษัท</a>
            </li>
            <?php
            if (!isset($_SESSION['user_username'])) {
            } else {
            ?>
            <li class="u-nav-item">
              <a class="u-button-style u-nav-link <?= (basename($_SERVER['PHP_SELF']) == "reservation.php") ? "active" : ""; ?>" href="./reservation.php" style="padding: 10px 32px;">การจอง</a>
            </li>
            <li class="u-nav-item">
              <a class="u-button-style u-nav-link <?= (basename($_SERVER['PHP_SELF']) == "payment.php") ? "active" : ""; ?>" href="./payment.php" style="padding: 10px 32px;">การชำระเงิน</a>
            </li>
            <li class="u-nav-item">
              <a class="u-button-style u-nav-link <?= (basename($_SERVER['PHP_SELF']) == "bill_detail.php") ? "active" : ""; ?>" href="./bill_detail.php" style="padding: 10px 32px;">ประวัติการชำระ</a>
            </li>
            <?php
            }
            ?>
            <li class="u-nav-item">
              <a class="u-button-style u-nav-link <?= (basename($_SERVER['PHP_SELF']) == "potential.php") ? "active" : ""; ?>" href="./potential.php" style="padding: 10px 32px;">ศักยภาพ</a>
            </li>
            <li class="u-nav-item">
              <a class="u-button-style u-nav-link <?= (basename($_SERVER['PHP_SELF']) == "contact.php") ? "active" : ""; ?>" href="./contact.php" style="padding: 10px 32px;">ติดต่อเรา</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
    </div>
  </nav>
</header>