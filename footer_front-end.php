    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-23cb">
      <div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">316/1 ซอยวงศ์สว่าง 11 ถนนวงศ์สว่าง&nbsp;แขวงวงศ์สว่าง เขตบางซื่อ กรุงเทพ 10800&nbsp;Tel : 02 913 1399 , 02 585 9105 Email : nagano-1@hotmail.com</p>
      </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <script>
      $(document).ready(function() {
  
        $("#btn_login").click(function() {
          // alert("login");
          var usr_login = $("#username_login").val();
          var pwd_login = $("#password_login").val();
          $.post("query/logins.php", {
            usr_login: usr_login,
            pwd_login: pwd_login
          }, function(datacallback) {
            if (datacallback == "login_success") {
              //location.reload();
              window.location.replace("index.php");
            } else {
              console.log(usr_login, pwd_login);
              alert("ไม่พบข้อมูลสมัครสมาชิก");
            }
          });
        });

        $("#btn_regis").click(function() {
          var name_regis = $("#name_regis").val();
          var email_regis = $("#email_regis").val();
          var tel_regis = $("#tel_regis").val();
          var line_id_regis = $("#line_id_regis").val();
          var usr_regis = $("#username_regis").val();
          var pwd_regis = $("#password_regis").val();
          var confirm_pwd = $("#confirm_password").val();

          // console.log(firstname_regis + lastname_regis + username_regis + pwd_regis + confirm_pwd + idcard_regis + tel_regis);

          if (name_regis == "") {
            alert("กรุณากรอกข้อมูลให้ครบถ้วน");
          } else if (email_regis == "") {
            alert("กรุณากรอกข้อมูลให้ครบถ้วน");
          } else if (tel_regis == "") {
            alert("กรุณากรอกข้อมูลให้ครบถ้วน");
          } else if (line_id_regis == "") {
            alert("กรุณากรอกข้อมูลให้ครบถ้วน");
          } else if (usr_regis == "") {
            alert("กรุณากรอกข้อมูลให้ครบถ้วน");
          } else if (pwd_regis == "") {
            alert("กรุณากรอกข้อมูลให้ครบถ้วน");
          } else if (confirm_pwd == "") {
            alert("กรุณากรอกข้อมูลให้ครบถ้วน");
          } else if (pwd_regis != confirm_pwd) {
            alert("กรุณาตรวจสอบรหัสผ่านของคุณอีกครั้ง");
            $("#password_regis").val("");
            $("#confirm_password").val("");
          } else {
            $.post("query/registers.php", {
              name_regis: name_regis,
              email_regis: email_regis,
              tel_regis: tel_regis,
              line_id_regis: line_id_regis,
              usr_regis: usr_regis,
              pwd_regis: pwd_regis,
              confirm_pwd: confirm_pwd
            }, function(datacallback) {
              if (datacallback == "success") {
                alert("ลงทะเบียนสำเร็จ");
                $("#name_regis").val("");
                $("#email_regis").val("");
                $("#tel_regis").val("");
                $("#line_id_regis").val("");
                $("#username_regis").val("");
                $("#password_regis").val("");
                $("#confirm_password").val("");
                window.location.replace("login.php");
              } else if (datacallback == "already") {
                alert("มีชื่อผู้ใช้นี้อยู่ในระบบแล้ว");
                $("#username_regis").val("");
                $("#password_regis").val("");
                $("#confirm_password").val("");
              } else {
                alert("เกิดขึ้นผิดพลาด: " + datacallback);
              }
            });
          }
        });

        $("#btn_answer").click(function() {
          var user_id_answer = $("#user_id_answer").val();
          var answer_answer = $("#answer_answer").val();

          // console.log(firstname_regis + lastname_regis + username_regis + pwd_regis + confirm_pwd + idcard_regis + tel_regis);

          if (user_id_answer == "") {
            alert("กรุณากรอกข้อมูลให้ครบถ้วน");
          } else if (answer_answer == "") {
            alert("กรุณากรอกข้อมูลให้ครบถ้วน");
          } else {
            $.post("query/answers.php", {
              user_id_answer: user_id_answer,
              answer_answer: answer_answer
            }, function(datacallback) {
              if (datacallback == "success") {
                alert("ส่งสอบถามสำเร็จ");
                $("#answer_answer").val("");
                window.location.replace("index.php");
              } else if (datacallback == "already") {
                //alert("มีชื่อผู้ใช้นี้อยู่ในระบบแล้ว");
                console.log(user_id_answer + answer_answer);
                $("#answer_answer").val("");
              } else {
                alert("เกิดขึ้นผิดพลาด: " + datacallback);
              }
            });
          }
        });

        $("#btn_reservation").click(function() {
          var user_id_reservation = $("#user_id_reservation").val();
          var name_reservation = $("#name_reservation").val();
          var phone_reservation = $("#tel_reservation").val();
          var deposit_reservation = $("#deposit_reservation").val();

          // console.log(firstname_regis + lastname_regis + username_regis + pwd_regis + confirm_pwd + idcard_regis + tel_regis);

          if (user_id_reservation == "") {
            alert("กรุณากรอกข้อมูลให้ครบถ้วน");
          } else if (name_reservation == "") {
            alert("กรุณากรอกข้อมูลให้ครบถ้วน");
          } else if (phone_reservation == "") {
            alert("กรุณากรอกข้อมูลให้ครบถ้วน");
          } else if (deposit_reservation == "") {
            alert("กรุณากรอกข้อมูลให้ครบถ้วน");
          } else {
            $.post("query/reservations.php", {
              user_id_reservation: user_id_reservation,
              name_reservation: name_reservation, 
              phone_reservation: phone_reservation,
              deposit_reservation: deposit_reservation
            }, function(datacallback) {
              if (datacallback == "success") {
                alert("จองสำเร็จ");
                $("#name_reservation").val("");
                $("#tel_reservation").val("");
                $("#deposit_reservation").val("");
                window.location.replace("payment.php");
              } else if (datacallback == "already") {
                //alert("มีชื่อผู้ใช้นี้อยู่ในระบบแล้ว");
                console.log(user_id_reservation + name_reservation + phone_reservation + deposit_reservation);
                $("#name_reservation").val("");
                $("#tel_reservation").val("");
                $("#deposit_reservation").val("");
              } else {
                alert("เกิดขึ้นผิดพลาด: " + datacallback);
              }
            });
          }
        });

        $("#btn_profile").click(function() {
          var user_id_profile = $("#user_id_profile").val();
          var firstname_profile = $("#firstname_profile").val();
          var lastname_profile = $("#lastname_profile").val();
          var address_profile = $("#address_profile").val();
          var tel_profile = $("#tel_profile").val();
          var email_profile = $("#email_profile").val();
          var sex_profile = $("input[name=optradio]:checked").val();
          var username_profile = $("#username_profile").val();
          var pwd_profile = $("#pwd_profile").val();
          var confirm_pwd = $("#confirm_pwd").val();

          // console.log(firstname_regis + lastname_regis + username_regis + pwd_regis + confirm_pwd + idcard_regis + tel_regis);

          if (user_id_profile == "") {
            alert("กรุณากรอกข้อมูลให้ครบถ้วน");
          } else if (firstname_profile == "") {
            alert("กรุณากรอกข้อมูลให้ครบถ้วน");
          } else if (lastname_profile == "") {
            alert("กรุณากรอกข้อมูลให้ครบถ้วน");
          } else if (address_profile == "") {
            alert("กรุณากรอกข้อมูลให้ครบถ้วน");
          } else if (tel_profile == "") {
            alert("กรุณากรอกข้อมูลให้ครบถ้วน");
          } else if (email_profile == "") {
            alert("กรุณากรอกข้อมูลให้ครบถ้วน");
          } else if (username_profile == "") {
            alert("กรุณากรอกข้อมูลให้ครบถ้วน");
          } else if (pwd_profile == "") {
            alert("กรุณากรอกข้อมูลให้ครบถ้วน");
          } else if (confirm_pwd == "") {
            alert("กรุณากรอกข้อมูลให้ครบถ้วน");
          } else if (pwd_profile != confirm_pwd) {
            alert("กรุณาตรวจสอบรหัสผ่านของคุณอีกครั้ง");
            $("#pwd_profile").val("");
            $("#confirm_pwd").val("");
          } else {
            $.post("query/profiles.php", {
              user_id_profile: user_id_profile,
              firstname_profile: firstname_profile,
              lastname_profile: lastname_profile,
              address_profile: address_profile,
              tel_profile: tel_profile,
              email_profile: email_profile,
              sex_profile: sex_profile,
              username_profile: username_profile,
              pwd_profile: pwd_profile,
              confirm_pwd: confirm_pwd
            }, function(datacallback) {
              if (datacallback == "success") {
                alert("แก้ไขข้อมูลสำเร็จ");
                $("#user_id_profile").val();
                $("#firstname_profile").val();
                $("#lastname_profile").val();
                $("#address_profile").val();
                $("#tel_profile").val();
                $("#email_profile").val();
                $("#username_profile").val();
                $("#pwd_profile").val("");
                $("#confirm_pwd").val("");
                window.location.replace("profile.php");
              } else if (datacallback == "already") {
                alert("มีชื่อผู้ใช้นี้อยู่ในระบบแล้ว");
                $("#username_profile").val("");
                $("#pwd_profile").val("");
                $("#confirm_pwd").val("");
              } else {
                alert("เกิดขึ้นผิดพลาด: " + datacallback);
              }
            });
          }
        });

        $("#btn_contact").click(function() {
          // alert("success");'
          var name_con = $("#name_contact").val();
          var email_con = $("#email_contact").val();
          var comments_con = $("#comments_contact").val();
          if (name_con == "") {
            alert("กรุณากรอกข้อมูลให้ครบถ้วน");
          } else if (email_con == "") {
            alert("กรุณากรอกข้อมูลให้ครบถ้วน");
          } else if (comments_con == "") {
            alert("กรุณากรอกข้อมูลให้ครบถ้วน");
          } else {
            $.post("query/contacts.php", {
              name_con: name_con,
              email_con: email_con,
              comments_con: comments_con
            }, function(datacallback) {
              if (datacallback == "ส่งข้อมูลสำเร็จ") {
                alert(datacallback);
                location.reload();
              } else {
                alert("เกิดข้อผิดพลาดในการส่งข้อมูล");
                // alert(datacallback);
              }
            });
          }
        });


        $("#form_payment").submit(function(e) {
          // alert("N");
          e.preventDefault();
          var formData = new FormData(this);
          // ส่งค่าไปแค่ราคา 1ชั่วโมง:170บาท  ไปที่ payment.php
          let user_id_payment = $('#user_id_payment').val();
          let reservation_id_payment = $('#reservation_id_payment').val();
          let slip_payment = $('#slip_payment').val();
          $.ajax({
            type: "POST",
            url: "query/payments.php",
            data: formData,
            success: function(data) {
              if (data == "imageonly") {
                alert("อนุญาติเฉพาะรูปภาพเท่านั้น");
              } else if (data == "exists") {
                alert("ชื่อไฟล์นี้มีในระบบแล้ว");
              } else if (data == "success") {
                alert("ดำเนินการเสร็จสิ้น");
                user_id_payment
                reservation_id_payment
                slip_payment
                location.reload();
                console.log("user_id: " + user_id_payment);
                console.log("reservation_id: " + reservation_id_payment);
                console.log("slip: " + slip_payment);
                console.log("data: " + data);
              } else if (data == "error") {
                alert("เกิดปัญหาการ insert db ผิดพลาด");
                console.log("user_id: " + user_id_payment);
                console.log("reservation_id: " + reservation_id_payment);
                console.log("slip: " + slip_payment);
                console.log("data: " + data);
              } else if (data == "movefilefail") {
                alert("เกิดปัญหาการการย้ายไฟล์ หรือตำแหน่งไดเรกทอรี่ผิดพลาด");
              } else {
                alert("ERROR: " + data);
                console.log("user_id: " + user_id_payment);
                console.log("reservation_id: " + reservation_id_payment);
                console.log("slip: " + slip_payment);
                console.log("data: " + data);
              }
            },
            cache: false,
            contentType: false,
            processData: false
          });
        });


      });
    </script>
    </body>

    </html>