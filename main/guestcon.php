<?php
	$conn = new mysqli("localhost", "root", "", "simpledata");
	//$gid = $_POST['gid'];
	$data = array();
	function getData(){
		$data[0] = $_POST['gfullname'];
		$data[1] = $_POST['gaddress'];
		$data[2] = $_POST['gcountry'];
		$data[3] = $_POST['gcity'];
		$data[4] = $_POST['gdate'];
		$data[5] = $_POST['gphone'];
		$data[6] = $_POST['gemail'];
		$data[7] = $_POST['ggender'];
		return $data;
	}
	if(isset($_POST['register'])) {
		$info = getData();
		$sql = "insert into guest (gfullname, gaddress, gcountry, gcity, gdate, gphone, gemail, ggender) values ('$info[0]', '$info[1]','$info[2]','$info[3]','$info[4]','$info[5]', '$info[6]', '$info[7]' )";
			if($conn->query($sql) === TRUE){
				header("location:search.php");
			}
			else{
				echo("no rows was entered");
			}
	}



?>
