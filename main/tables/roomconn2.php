<?php
	$conn = new mysqli("localhost", "root", "", "simpledata");
	//$gid = $_POST['gid'];
		
	$data = array();
	function getData(){
		$data[1] = $_POST['floor'];
		$data[2] = $_POST['rno'];
		$data[3] = $_POST['room_type'];
		$data[4] = $_POST['room_price'];
		$data[5] = $_POST['room_status'];
		return $data;
	}
	if(isset($_POST['register'])) {
		$info = getData();
		$sql = "insert into roomno (floor, rno, room_type, room_price, room_status) values ('$info[1]', '$info[2]', '$info[3]', '$info[4]', '$info[5]')";
			if($conn->query($sql) === true){
				echo("Data has been saved");
			}
			else{
				echo("no rows was entered");
			}
	}

?>