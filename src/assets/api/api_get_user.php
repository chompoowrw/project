<?php
	include("db_connect.php");

	$sql = "SELECT * FROM tb_user";

	$result = $conn->query($sql);

	$arr = array();

	if ($result->num_rows > 0) {
	  // output data of each row
	  while($row = $result->fetch_assoc()) {
		  array_push($arr,$row);
		//echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
	  }
	} 
	else {
	  echo "";
	}

	echo json_encode($arr);
	$conn->close();
?>