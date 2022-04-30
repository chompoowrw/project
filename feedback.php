<?php
include('./head_back-end.php');
include('./header_back-end.php');

$strKeyword = null;

if (isset($_POST["txtSearch"])) {
  $strKeyword = $_POST["txtSearch"];
}
?>

<header class="mb-3">
  <a href="#" class="burger-btn d-block d-xl-none">
    <i class="bi bi-justify fs-3"></i>
  </a>
</header>

<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>ข้อมูล Feedback</h3>
        <br>
        <!-- <p class="text-subtitle text-muted">For user to check they list</p> -->
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./home.php">หน้าแรก</a></li>
            <li class="breadcrumb-item active" aria-current="page">ข้อมูล Feedback</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <!-- Hoverable rows start -->
  <section class="section">
    <div class="row" id="table-hover-row">
      <div class="col-12">
        <div class="card">
          <div class="card-content">
            <ul class='list-group'>
              <?php
              $date_th = ["", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"];
              $sql = "SELECT * FROM tb_questionnaire 
                  LEFT JOIN
                  tb_user
                  ON
                  tb_user.user_id = tb_questionnaire.user_id 
                  ORDER BY tb_questionnaire.questionnaire_id DESC limit 10";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                  $date_set = date_create($row['questionnaire_date']);
              ?>
                  <li class='list-group-item'>
                    รายละเอียด: ชื่อผู้ส่ง: <?php echo $row['user_name']; ?>
                    <br>
                    Email: <?php echo $row['user_email']; ?>
                    <br>
                    เบอร์โทร: <?php echo $row['user_tel']; ?>
                    <br>
                    Feedback Detail: <?php echo $row['question']; ?>
                    <br>
                    วันที่ส่ง: <?php echo date_format($date_set, "d")."  ".$date_th[date_format($date_set, "n")]."  ".date_format($date_set, "Y"); ?>
                  </li>
                <?php
                } //while condition closing bracket
              }  //if condition closing bracket
              else {
                ?>
                <li class='list-group-item'>
                  <center>ไม่มีข้อมูล</center>
                </li>
              <?php
              }
              ?>
            </ul>
            <hr>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Hoverable rows end -->
</div>

<script src="./assets/js/jquery-3.5.1.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="./assets/back-end/mazer/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="./assets/back-end/mazer/dist/assets/js/bootstrap.bundle.min.js"></script>

<?php include("./footer_back-end.php"); ?>