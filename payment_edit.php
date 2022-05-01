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
        <h3>สถานะการชำระ</h3>
        <!-- <p class="text-subtitle text-muted">For user to check they list</p> -->
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./home.php">หน้าแรก</a></li>
            <li class="breadcrumb-item"><a href="./payment_status.php">ข้อมูลสถานะการชำระ</a></li>
            <li class="breadcrumb-item active" aria-current="page">สถานะการชำระ</li>
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
          <!-- <div class="card-header">
            <h4 class="card-title">ข้อมูลสินค้า</h4>
          </div> -->
          <div class="card-content">
            <div class="card-body">
              <?php
              if ($_GET) {
                $payment_id = $_GET['payment_id'];

                $sql = "SELECT pay.payment_id, 
                pay.slip,
                pay.user_id, 
                user.user_name,
                user.user_tel,
                pay.payment_date,
                pay.reservation_id, 
                res.reservation_name,
                res.status_id,
                status.status_name
                FROM tb_payment AS pay
                LEFT JOIN
                tb_user AS user
                ON
                pay.user_id = user.user_id 
                LEFT JOIN
                tb_reservation AS res
                ON
                pay.reservation_id = res.reservation_id 
                LEFT JOIN
                tb_status AS status
                ON
                res.status_id = status.status_id
                WHERE pay.payment_id = '$payment_id'";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
              ?>
                  <form method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group">
                      <input type="hidden" id="payment_id_bill" name="payment_id_bill" placeholder="" class="form-control" value="<?php echo $payment_id; ?>">
                      <input type="hidden" id="user_id_bill" name="user_id_bill" placeholder="ชื่อ" class="form-control" value="<?php echo $row["user_id"]; ?>">
                      <input type="hidden" id="reservation_id_bill" name="reservation_id_bill" placeholder="" class="form-control" value="<?php echo $row["reservation_id"]; ?>">
                    </div>
                    <!-- <div class="form-group">
                      <label for="reservation_id_bill" class=" form-control-label">การจอง</label>
                      <select class="form-select" id="reservation_id_bill" name="reservation_id_bill" required>
                        <?php
                        $sql = "SELECT * FROM tb_reservation";
                        $result = $conn->query($sql);
                        while ($reservation = $result->fetch_assoc()) {
                        ?>
                        <option value="<?php echo $reservation["reservation_id"]; ?>" <?php if ($row["reservation_id"] == $reservation["reservation_id"]) echo 'selected'; ?>>
                          <?php echo $reservation["reservation_name"]; ?>
                        </option>
                        <?php
                        }
                        ?>
                      </select>
                    </div> -->
                    <div class="form-group">
                      <label for="reservation_id_bill" class=" form-control-label">การจอง</label>
                      <input type="text" id="reservation_name_bill" name="reservation_name_bill" placeholder="การจอง" class="form-control" value="<?php echo $row["reservation_name"]; ?>">
                    </div>
                    <div class="form-group">
                      <label for="bill_name_bill" class=" form-control-label">ชื่อ</label>
                      <input type="text" id="bill_name_bill" name="bill_name_bill" placeholder="ชื่อ" class="form-control" value="<?php echo $row["user_name"]; ?>">
                    </div>
                    <div class="form-group">
                      <label for="bill_phone_bill" class=" form-control-label">เบอร์โทรศัพท์</label>
                      <input type="text" id="bill_phone_bill" name="bill_phone_bill" placeholder="เบอร์โทรศัพท์" class="form-control" value="<?php echo $row["user_tel"]; ?>">
                    </div>
                    <div class="form-group">
                      <label for="status_id_bill" class=" form-control-label">สถานะ</label>
                      <!--<div class="radio">
                        <label><input type="radio" name="status_id_bill" value="2" <?php if($row['status_id']=="2"){ echo "checked";}?>> ส่งสลิปแล้ว</label>
                      </div>-->
                      <div class="radio">
                        <label><input type="radio" name="status_id_bill" value="3" <?php if($row['status_id']=="3"){ echo "checked";}?>> ชำระเงินแล้ว</label>
                      </div>
                    </div>
                    <button class="btn btn-primary btn-block" type="button" onclick="editBill()">
                      บันทึก
                    </button>
                  </form>
              <?php
                }
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Hoverable rows end -->
</div>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="./assets/back-end/mazer/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="./assets/back-end/mazer/dist/assets/js/bootstrap.bundle.min.js"></script>

<script>
function editBill() {
  let user_id_bill = $('#user_id_bill').val();
  let reservation_id_bill = $('#reservation_id_bill').val();
  let payment_id_bill = $('#payment_id_bill').val();
  let bill_name_bill = $('#bill_name_bill').val();
  let bill_phone_bill = $('#bill_phone_bill').val();
  var status_id_bill = $("input[name=status_id_bill]:checked").val();
  $.ajax({
    url: 'query/edit_payment_status.php',
    type: 'post',
    data: {
      'user_id_bill': user_id_bill,
      'reservation_id_bill': reservation_id_bill,
      'payment_id_bill': payment_id_bill,
      'bill_name_bill': bill_name_bill,
      'bill_phone_bill': bill_phone_bill,
      'status_id_bill': status_id_bill
    },
    success: function(response) {
      console.log(response);
      setTimeout(function() {
        window.location.replace('payment_status.php');
        //console.log(product_name, product_price, product_qty, product_description, response);
      }, 300);
    }
  });
}
</script>
<?php include("./footer_back-end.php"); ?>