<?php
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: POST');
	header('Access-Control-Allow-Headers: Content-Type');
	
	include("db_connect.php");
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$content = file_get_contents('php://input');
		$user = json_decode($content, true);
		
        $username = $user['username'];
        $password = $user['password'];
		$fullname = $user['fullname'];
		$phone = $user['phone'];
		$email = $user['email'];
        $lineid = $user['lineid'];
	
	
		$sql = "SELECT * FROM tb_user WHERE user_username = '$username' AND user_email = '$email'";
		$result =$conn->query($sql);
		if ($result->num_rows > 0) {
			echo json_encode(['status'=>'error', 'message'=> 'ไม่สามารถลงทะเบียนได้ เนื่องจาก email นี้มีผู้ใช้งานแล้ว']);
		}
		else{
			
			$sql = "INSERT INTO tb_user (`user_name`,`user_tel`,`user_email`,`user_lineid`,`user_username`,`user_password`,`role_id`)
					VALUE('$fullname','$phone','$email','$lineid','$username','$password','2')";
			$result = $conn->query($sql);
			if ($result){
				echo json_encode(['status'=>'success', 'message'=>'บันทึกข้อมูลสำเร็จ']);
			}
			else{
				echo json_encode(['status'=>'error', 'message'=>$sql]);
			}
		}
	}
	else{
		echo json_encode(['status'=>'error', 'message'=>'เกิดข้อผิดพลาด']);
	}
	$conn->close();
?>