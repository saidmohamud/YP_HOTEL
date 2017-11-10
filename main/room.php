<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"simpledata");
?>
<?php
include "tables/config.php";

?>
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
				header("location:rooms.php");
			}
			else{
				echo("no rows was entered");
			}
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="js/bootstrap.min.js"></script>
    <title>YAASMIIN | HOTEL</title>
    <?php include("Linkfooter.php"); ?>
    <?php include("links.php"); ?>
    
    
</head>
<body class="hold-transition skin-purple-light  sidebar-mini">
      <div class="wrapper">
      <?php include("header.php"); ?>
        <?php include("menu.php"); ?>
        <?php include("dashboard.php"); ?>
        <div class=" col-sm-9 " >
        <div class="text-left">
          <ol class="breadcrumb">
            <li><a href="adminpanel.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Room Registration</li>
          </ol>
          </div>
          </div>
      <br>
      <br>
   
<!-- <//?php include("tables/roomconn2.php"); ?> -->
 <div class="container-fluid">
	<div class="row">
    <div class="col-lg-9  ">
  <div class="panel panel-primary">
			<div class="panel-heading"><center><H4> ROOMS</H4></center> 
			</div>
			<div class="panel-body">
				<form class="form-horizontal"  id="guest-form"  method="post" action="room.php">
										
						<div class="row">
						<div class="col-md-5 col-md-offset-3">
								<label control-label" for="state"">Floor*</label>
								<div class="control-group">
                                  <select id="floor" name="floor"  class="form-control" required>
                                     <?php
                                            $sql = "select floor  from rooms";
                                            $result = $conn->query($sql);
                                            if($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['floor']; ?>"><?php echo $row['floor']; ?></option>
                                            <?php }
                                            }
                                        ?>
                                  </select> 
                                </div>
							</div>	
              </div>
              <br>
              <div class="row">
						 <div class="col-md-5  ">
								<label control-label" for="city"">Room Number*</label>
								<div class="control-group">
              
								<input type="number" name="rno" placeholder="Enter room no.." class="form-control" required>
                                </div>
							</div>
								 <div class="col-sm-5  ">
					<div class="form-group">
						<label control-label" for="rprice"">Room Status*</label>
						<select id="room_status" name="room_status"  class="form-control" required>
                                    <?php
                                            $sql = "select rstatus  from hrooms";
                                            $result = $conn->query($sql);
                                            if($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) { ?>
                                            <option ><?php echo $row['rstatus']; ?></option>
                                            <?php }
                                            }
                                        ?>
                                  </select> 
					</div>		
					
            </div>
              </div>
              <br>
            <div class="row">
				 <div class="col-md-5  " style="margin-left:10px">
					<div class="form-group">
						<label control-label" for="rprice"">Room Type*</label>
						<select id="room_type" name="room_type"  class="form-control" required>
                                    <?php
                                            $sql = "select rtype  from rooms";
                                            $result = $conn->query($sql);
                                            if($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['rtype']; ?>"><?php echo $row['rtype']; ?></option>
                                            <?php }
                                            }
                                        ?>
                                  </select> 
					</div>		
					
            </div>
            
            <div class="col-sm-5 " style="margin-left:10px">
					<div class="form-group">
						<label control-label" for="rprice"">Room Price*</label>
						<select id="rprice" name="room_price"  class="form-control" required>
                                   <?php
                                            $sql = "select rprice  from rooms";
                                            $result = $conn->query($sql);
                                            if($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['rprice']; ?>"><?php echo $row['rprice']; ?></option>
                                            <?php }
                                            }
                                        ?>
                                   
                                  </select> 
                              </div>		
                              
                                </div>
                                
                                </div>
                      <div class="form-group">
                        <div class="col-md-8  col-md-offset-3">
                           <button style="width:50%; margin: 15px 0px 0px 0px;" type="submit" name="register" class="btn btn-lg btn-primary">Save</button>	
                        </div>
                        
                      </div>
				</form> 
        </div>
				</div>
	</div>
	</div>
    </div>
        <?php include("dashFooter.php"); ?>    
    <?php include("footer.php"); ?>
</body> 
</html>