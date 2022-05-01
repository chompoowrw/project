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
        <h3>ข้อมูลใบเสนอราคา</h3>
        <!-- <p class="text-subtitle text-muted">For user to check they list</p> -->
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./home.php">หน้าแรก</a></li>
            <li class="breadcrumb-item active" aria-current="page">ข้อมูลใบเสนอราคา</li>
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
              <form class="table-data__tool-right input-group" method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                  <input type="search" name="txtSearch" class="form-control" placeholder="ค้นหา" aria-label="Search" aria-describedby="button-addon2" value="<?php echo $strKeyword; ?>">
                  <button class="input-group-text fa-1x" name="Search" type="submit" value="Search">ค้นหา</button>
                  <button type="button" class="btn btn-primary" style="float: right;" data-bs-toggle="modal" data-bs-target="#proposal_price_add">
                    <i class="fa fa-plus-circle"></i>
                  </button>
                </div>
              </form>
            </div>
            <!-- table hover -->
            <div class="table-responsive">
              <table class="table table-hover table-striped mb-0">
                <thead>
                  <tr>
                    <th class="text-center">ลำดับ</th>
                    <th class="text-center">เลขที่ใบเสนอราคา</th>
                    <th>ชื่อ</th>
                    <th>บริษัท</th>
                    <th>เบอร์โทรศัพท์</th>
                    <th></th>
                    <!-- <th class="text-right"></th> -->
                    <!-- <th>ACTION</th> -->
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
                    $page_no = $_GET['page_no'];
                  } else {
                    $page_no = 1;
                  }

                  $total_records_per_page = 10;
                  $offset = ($page_no - 1) * $total_records_per_page;
                  $previous_page = $page_no - 1;
                  $next_page = $page_no + 1;
                  $adjacents = "2";

                  $result_count = mysqli_query($conn, "SELECT COUNT(*) As total_records FROM `tb_proposal_price`");
                  $total_records = mysqli_fetch_array($result_count);
                  $total_records = $total_records['total_records'];
                  $total_no_of_pages = ceil($total_records / $total_records_per_page);
                  $second_last = $total_no_of_pages - 1; // total page minus 1

                  $i = 1;

                  $sql = "SELECT * FROM tb_proposal_price 
                  LEFT JOIN
                  tb_user
                  ON
                  tb_proposal_price.user_id = tb_user.user_id 
                  WHERE tb_proposal_price.proposal_price_id LIKE '%$strKeyword%' OR user_name LIKE '%$strKeyword%'
                  LIMIT $offset, $total_records_per_page
                  ";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                  ?>
                  <tr>
                    <td class="text-center"><?php echo $i; ?></td>
                    <td class="text-center"><?php echo $row['proposal_price_id']; ?></td>
                    <td><?php echo $row['user_name']; ?></td>
                    <td><?php echo $row['company_name']; ?></td>
                    <td><?php echo $row['proposal_price_phone']; ?></td>
                    <td>
                      <a class="btn btn-danger" href="./proposal_price_detail.php?proposal_price_id=<?php echo $row["proposal_price_id"]; ?>" data-toggle="tooltip" data-placement="top" title="Detail">
                        <i class="fa fa-trash"></i>
                      </a>
                      <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#proposal_price_edit-<?php echo $row['proposal_price_id']; ?>">
                        <i class="fa fa-edit"></i>
                      </button>
                      <a class="del-btn btn btn-danger" href="./proposal_price_delete.php?proposal_price_id=<?php echo $row["proposal_price_id"]; ?>" data-toggle="tooltip" data-placement="top" title="Delete">
                        <i class="fa fa-trash"></i>
                      </a>
                    </td>
                  </tr>
                  <?php
                  $i++;
                    } //while condition closing bracket
                  }  //if condition closing bracket
                  else{
                  ?>
                  <tr>
                    <td colspan = "8" align="center">ไม่มีข้อมูล</td>
                  </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
              <?php 
              $sql2 = "SELECT * FROM tb_proposal_price 
              LEFT JOIN
              tb_user
              ON
              tb_proposal_price.user_id = tb_user.user_id 
              WHERE tb_proposal_price.proposal_price_id LIKE '%$strKeyword%' OR user_name LIKE '%$strKeyword%'
              ";
              $result2 = $conn->query($sql2);

              if ($result2->num_rows > 0) {
                // output data of each row
                while ($row = $result2->fetch_assoc()) {
              include('./proposal_price_edit.php'); 
                }
              }
              ?>
              <hr>
              <!-- <div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
                <strong>Page <?php //echo $page_no . " of " . $total_no_of_pages; ?></strong>
              </div> -->

              <nav aria-label="Page navigation example">
                <ul class="pagination pagination-primary  justify-content-center">
                  <?php // if($page_no > 1){ echo "<li class='page-item'><a class='page-link' href='?page_no=1'>First Page</a></li>"; } 
                  ?>

                  <li <?php if ($page_no <= 1) {
                    echo "class='page-item disabled'";
                    } ?>>
                    <a class="page-link" <?php if ($page_no > 1) {
                      echo "href='?page_no=$previous_page'";
                    } ?>>Previous</a>
                  </li>
                  <?php
                if ($total_no_of_pages <= 10) {
                  for ($counter = 1; $counter <= $total_no_of_pages; $counter++) {
                    if ($counter == $page_no) {
                      echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";
                    } else {
                      echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                    }
                  }
                } elseif ($total_no_of_pages > 10) {

                  if ($page_no <= 4) {
                    for ($counter = 1; $counter < 8; $counter++) {
                      if ($counter == $page_no) {
                        echo "<li class='page-item active'><a>$counter</a></li>";
                      } else {
                        echo "<li class='page-item><a href='?page_no=$counter'>$counter</a></li>";
                      }
                    }
                    echo "<li class='page-item'><a class='page-link'>...</a></li>";
                    echo "<li class='page-item'><a class='page-link' href='?page_no=$second_last'>$second_last</a></li>";
                    echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
                  } elseif ($page_no > 4 && $page_no < $total_no_of_pages - 4) {
                    echo "<li class='page-item'><a class='page-link' href='?page_no=1'>1</a></li>";
                    echo "<li class='page-item'><a class='page-link' href='?page_no=2'>2</a></li>";
                    echo "<li class='page-item'><a class='page-link'>...</a></li>";
                    for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {
                      if ($counter == $page_no) {
                        echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";
                      } else {
                        echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                      }
                    }
                    echo "<li class='page-item'><a class='page-link'>...</a></li>";
                    echo "<li class='page-item'><a class='page-link' href='?page_no=$second_last'>$second_last</a></li>";
                    echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
                  } else {
                    echo "<li class='page-item'><a class='page-link' href='?page_no=1'>1</a></li>";
                    echo "<li class='page-item'><a class='page-link' href='?page_no=2'>2</a></li>";
                    echo "<li class='page-item'><a class='page-link'>...</a></li>";

                    for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                      if ($counter == $page_no) {
                        echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";
                      } else {
                        echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                      }
                    }
                  }
                }
                ?>

                <li <?php if ($page_no >= $total_no_of_pages) {
                      echo "class='page-item disabled'";
                    } ?>>
                  <a class="page-link" <?php if ($page_no < $total_no_of_pages) {
                        echo "href='?page_no=$next_page'";
                      } ?>>Next</a>
                </li>
                <?php if ($page_no < $total_no_of_pages) {
                  echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
                } ?>
                </ul>
              </nav>

              <?php
              if (isset($_GET['m'])) { ?>
                <div class="flash-data" data-flashdata="<?php echo $_GET['m']; ?>"></div>
              <?php } ?>
            </div>

            <?php include('./proposal_price_add.php'); ?>

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
    $('.del-btn').on('click', function(e) {
      e.preventDefault();
      const href = $(this).attr('href')
      Swal.fire({
        title: 'คุณแน่ใจหรือไม่?',
        text: 'คุณจะไม่สามารถเปลี่ยนกลับได้!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'OK'
      }).then((result) => {
        if (result.value) {
          document.location.href = href;
        }
      })
    })

    const flashdata = $('.flash-data').data('flashdata')
    if (flashdata) {
      Swal.fire({
        icon: 'success',
        title: 'ลบข้อมูลสำเร็จ',
        showConfirmButton: false,
        timer: 2000
      }).then((result) => {
        if (result.isDismissed) {
          window.location.href = 'proposal_price.php';
        }
      })
    }
</script>

<script>
function createProposal_Price() {
  let user_id_proposal_price = $('#user_id_proposal_price').val();
  let company_name_proposal_price = $('#company_name_proposal_price').val();
  let proposal_price_phone_proposal_price = $('#proposal_price_phone_proposal_price').val();
  $.ajax({
    url: 'query/add_proposal_price.php',
    type: 'post',
    data: {
      'user_id_proposal_price': user_id_proposal_price,
      'company_name_proposal_price': company_name_proposal_price,
      'proposal_price_phone_proposal_price': proposal_price_phone_proposal_price
    },
    success: function(response) {
      console.log(response);
      setTimeout(function() {
        window.location.replace('proposal_price.php');
        //console.log(product_name, product_price, product_qty, product_description, response);
      }, 300);
    }
  });
}
function editProposal_Price() {
  let proposal_price_id_proposal_price = $('#proposal_price_id_proposal_price').val();
  let user_id_proposal_price = $('#user_id_proposal_price').val();
  let company_name_proposal_price = $('#company_name_proposal_price').val();
  let proposal_price_phone_proposal_price = $('#proposal_price_phone_proposal_price').val();
  $.ajax({
    url: 'query/edit_proposal_price.php',
    type: 'post',
    data: {
      'proposal_price_id_proposal_price': proposal_price_id_proposal_price,
      'user_id_proposal_price': user_id_proposal_price,
      'company_name_proposal_price': company_name_proposal_price,
      'proposal_price_phone_proposal_price': proposal_price_phone_proposal_price
    },
    success: function(response) {
      console.log(response);
      setTimeout(function() {
        window.location.replace('proposal_price.php');
        //console.log(product_name, product_price, product_qty, product_description, response);
      }, 300);
    }
  });
}
</script>

<?php include("./footer_back-end.php"); ?>