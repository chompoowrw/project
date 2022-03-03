<!--Basic Modal -->
<div class="modal fade text-left" id="bill_edit-<?php echo $row['payment_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel1">สถานะการชำระ</h5>
        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
          <i data-feather="x"></i>
        </button>
      </div>
      <form method="POST" action="" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" id="payment_id_bill" name="payment_id_bill" placeholder="" class="form-control" value="<?php echo $row["payment_id"]; ?>">
            <input type="hidden" id="user_id_bill" name="user_id_bill" placeholder="ชื่อ" class="form-control" value="<?php echo $row["user_id"]; ?>">
          </div>
          <div class="form-group">
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
            <div class="radio">
              <label><input type="radio" name="status_id_bill" value="2" <?php if($row['status_id']=="2"){ echo "checked";}?>> ส่งสลิปแล้ว</label>
            </div>
            <div class="radio">
              <label><input type="radio" name="status_id_bill" value="3" <?php if($row['status_id']=="3"){ echo "checked";}?>> ชำระเงินแล้ว</label>
            </div>
          </div>
          <!-- <button class="btn btn-primary btn-block" type="button" onclick="createProduct()">
            บันทึก
          </button> -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn" data-bs-dismiss="modal">
            <i class="bx bx-x d-block d-sm-none"></i>
            <span class="d-none d-sm-block">ยกเลิก</span>
          </button>
          <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal" onclick="editBill()">
            <i class="bx bx-check d-block d-sm-none"></i>
            <span class="d-none d-sm-block">บันทึก</span>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>