<?php
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
	header("Access-Control-Allow-Headers: Content-Type, Authorization, Access-Control-Allow-Headers, X-Requested-With");
    //print_r(apache_request_headers());
    include('./db_connect.php');
    //exit();
    $headers = apache_request_headers();
    $auth = $headers['Authorization'];
	$sql = "SELECT * FROM tb_user WHERE user_id = '$auth'";

	$sql .= " ORDER BY user_id";
	$result = $conn->query($sql);
	$arr_data = array();
	if ($result->num_rows > 0) {
	  // output data of each row
	  while($row = $result->fetch_assoc()) {
		array_push($arr_data,$row);
	  }
	}
	echo json_encode($arr_data);
	$conn->close();
?>


