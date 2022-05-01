<?php
session_start();
date_default_timezone_set('Asia/Bangkok');
if (isset($_POST["usr_login"])) {
  include("./../connect.php");
  $Username = $_POST["usr_login"];
  $Password = md5($_POST["pwd_login"]);
  $sql = "SELECT * FROM tb_user WHERE user_username = '$Username' AND user_password = '$Password' ";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);

    $_SESSION["user_id"] = $row["user_id"];
    $_SESSION["user_name"] = $row["user_name"];
    $_SESSION["user_email"] = $row["user_email"];
    $_SESSION["user_tel"] = $row["user_tel"];
    $_SESSION["user_lineid"] = $row["user_lineid"];
    $_SESSION["user_username"] = $row["user_username"];
    $_SESSION["role_id"] = $row["role_id"];
    echo "login_success";
  } else {
    //   echo "<script>";
    echo "alert('Sorry Username or Password something is wrong! \\nTake you back homepage! ');";
    // echo "window.history.back()";
    //   echo "window.location.replace('http://".$domain."/".$url."');";
    //   echo "</script>";
  }
}
