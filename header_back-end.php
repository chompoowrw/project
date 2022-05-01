<div id="app">
  <div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
      <div class="sidebar-header">
        <div class="d-flex justify-content-between">
          <div class="logo">
          <a href="./home.php" style="font-family: 'Finger Paint', cursive; font-size: 15px;">บริษัท นากาโน คอนสตรั๊คชั่น แอนด์ อินทีเรีย จำกัด</a>
            <!-- <a href="index.html"><img src="./assets/back-end/mazer/dist/assets/images/logo/logo.png" alt="Logo" srcset=""></a> -->
          </div>
          <div class="toggler">
            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
          </div>
        </div>
      </div>
      <div class="sidebar-menu">
        <ul class="menu">
          <li class="sidebar-title">รายการ</li>

          <li class="sidebar-item <?php if (basename($_SERVER['PHP_SELF']) == "home.php") {
                                    echo "active";
                                  } else {
                                    echo "";
                                  } ?>">
            <a href="./home.php" class='sidebar-link'>
              <!-- <i class="bi bi-grid-fill"></i> -->
              <span>หน้าแรก</span>
            </a>
          </li>
          <li class="sidebar-item <?= (basename($_SERVER['PHP_SELF']) == "user.php") ? "active" : ""; ?>">
            <a href="./user.php" class='sidebar-link'>
              <!-- <i class="bi bi-grid-fill"></i> -->
              <span>ข้อมูลผู้ใช้</span>
            </a>
          </li>
          <li class="sidebar-item <?= (basename($_SERVER['PHP_SELF']) == "feedback.php") ? "active" : ""; ?>">
            <a href="./feedback.php" class='sidebar-link'>
              <span>ข้อมูล Feedback</span>
            </a>
          </li>
          <li class="sidebar-item <?= (basename($_SERVER['PHP_SELF']) == "payment_status.php") ? "active" : ""; ?>">
            <a href="./payment_status.php" class='sidebar-link'>
              <span>ข้อมูลสถานะการชำระ</span>
            </a>
          </li>


          <li class="sidebar-title"></li>
          <li class="sidebar-item ">
            <a href="./logout.php" class='sidebar-link'>
              <!-- <i class="bi bi-grid-fill"></i> -->
              <span>ออกจากระบบ</span>
            </a>
          </li>
          
        </ul>
      </div>
      <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
  </div>
  <div id="main">