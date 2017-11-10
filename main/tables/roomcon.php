<?php
$conn = new mysqli("localhost", "root", "", "simpledata");
$gid="";
$gfullname="";
$gdate="";
$rno="";
$floor="";
$rtype="";
$rprice="";
$room_status="";
$paid="";

	    function getData(){
		$data = array();
		//$data[0] = $_POST['gid'];
		$data[1] = $_POST['gfullname'];
		$data[2] = $_POST['gdate'];
		$data[3] = $_POST['rno'];
		$data[4] = $_POST['floor'];
		$data[5] = $_POST['rtype'];
		$data[6] = $_POST['rprice'];
		$data[7] = $_POST['room_status'];
		$data[8] = $_POST['paid'];
	
		return $data;
	    }
	    if(isset($_POST['register'])) {
		$info = getData();
		$sql="SELECT * FROM room WHERE rno = '".$_POST["rno"]."'";
		$result=$conn->query($sql);
		if(mysqli_num_rows($result) > 1)
		{
			$message = "it is already exist";
			echo "<script type='text/javascript'>alert('$message');</script>";
			//echo("it is already exist");
		}
		elseif(mysqli_num_rows($result) >= 0)
		{
			$sql = "insert into room (gfullname, gdate, rno, floor, rtype, rprice, room_status, paid) values ('$info[1]', '$info[2]', '$info[3]', '$info[4]', '$info[5]', '$info[6]', '$info[7]', '$info[8]' )";
			if($conn->query($sql) === true){
				//$room_id="";
				//$room_id= $_POST["room_id"];
			}
			$query = "UPDATE roomno set room_status='$info[7]' WHERE rno='$info[3]'";
			if($conn->query($query) === true){
			  echo("Data has been updated");
			}
			
		
		else{
			exit();
		}
		}
	}
?>