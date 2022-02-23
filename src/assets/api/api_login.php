<?php
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

	include("db_connect.php");

	$output = array(
			"status" => "error"
	);

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$content = file_get_contents('php://input');
		$user = json_decode($content, true);

		
		$username = $user['username'];
		$password = $user['password'];

		//check duplicate email
		$sql = "SELECT *
				FROM tb_user
				WHERE user_username = '$username' AND user_password = '$password'";
		$result = $conn->query($sql);
		if (isset($result) && ($result->num_rows > 0)) {
			$row = $result->fetch_assoc();
			$output['status'] = "success";
			$output['message'] = "Welcome ".$row['user_name'];
			$output['data'] = $row;
			$output['token'] = $row['user_id'];
			$output['role_id'] = $row['role_id'];
		}
		else{
			$output['message'] = "Invalid email or password";
		}
	}
	else{
		$output['message'] = "REQUEST_METHOD Error";
	}
	echo json_encode($output);
	$conn->close();
?>