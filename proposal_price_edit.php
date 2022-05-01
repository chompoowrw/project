<!--Basic Modal -->
<div class="modal fade text-left" id="proposal_price_edit-<?php echo $row['proposal_price_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel1">แก้ไขใบเสนอราคา</h5>
        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
          <i data-feather="x"></i>
        </button>
      </div>
      <form method="POST" action="" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <input type="text" id="proposal_price_id_proposal_price" name="proposal_price_id_proposal_price" placeholder="" class="form-control" value="<?php echo $row["proposal_price_id"]; ?>">
            <label for="user_id_proposal_price" class=" form-control-label">ชื่อ - นามสกุล</label>
            <select class="form-select" id="user_id_proposal_price" name="user_id_proposal_price" required>
              <?php
              $sql = "SELECT * FROM tb_user WHERE role_id = '2'";
              $result = $conn->query($sql);
              while ($user = $result->fetch_assoc()) {
              ?>
              <option value="<?php echo $user["user_id"]; ?>" <?php if ($row["user_id"] == $user["user_id"]) echo 'selected'; ?>>
                <?php echo $user["user_name"]; ?>
              </option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="company_name_proposal_price" class=" form-control-label">บริษัท</label>
            <input type="text" id="company_name_proposal_price" name="company_name_proposal_price" placeholder="บริษัท" class="form-control" value="<?php echo $row["company_name"]; ?>">
          </div>
          <div class="form-group">
            <label for="proposal_price_phone_proposal_price" class=" form-control-label">เบอร์โทรศัพท์</label>
            <input type="text" id="proposal_price_phone_proposal_price" name="proposal_price_phone_proposal_price" placeholder="เบอร์โทรศัพท์" class="form-control" value="<?php echo $row["proposal_price_phone"]; ?>">
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
          <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal" onclick="editProposal_Price()">
            <i class="bx bx-check d-block d-sm-none"></i>
            <span class="d-none d-sm-block">บันทึก</span>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>