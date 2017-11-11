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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="wagad/js/bootstrap.min.js"></script>
    <title>YAASMIIN | HOTEL</title>
    <?php include("Linkfooter.php"); ?>
    <?php include("links.php"); ?>
</head>
<body class="hold-transition skin-purple-light  sidebar-mini" onload="timing()">
      <div class="wrapper">
      <?php include("header.php"); ?>
        <?php include("menu.php"); ?>
        <?php include("dashboard.php"); ?>
        <div class=" col-sm-9  " >
        <div class="text-left">
          <ol class="breadcrumb">
            <li><a href="adminpanel.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Guest Registration</li>
          </ol>
          </div>
          </div>
      <br>
      <br>
      <?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"simpledata");
?>
<!-- </?php include("guestcon.php"); ?>     -->

<div class="container-fluid">
<!-- <h1 class="well">Gust Regestration </h1> -->
<div class="col-sm-9  ">
<div class="row">
<div class="panel panel-primary">
  <div class="panel-heading"><center> GUEST REGISTRATION</center> 
  </div>
  <div class="panel-body">
    <form  class="form-horizontal"  id="guest-form"  method="post" >
        		<div class="row">
					<div class="col-md-4">
								<label control-label" for="name"">Full Name*</label>
								<input type="text" id="name" name="gfullname" pattern="[a-zA-Z\s]+" placeholder="Enter your Full Name Here.." class="form-control" required>
							</div>
              <div class="control-group">
        <div class="col-sm-4">	
        <label control-label" for="email"">Gender</label>
     <select class="form-control" id="ggender" name="ggender">
          <option>Male</option>
          <option>Female</option>
        </select>         
        </div>
      </div>
            <div class="col-md-4">				
							<label control-label" for="address"">Address*</label>
							<input type="text" id="address"  name="gaddress" placeholder="Enter Address Here.." rows="3" class="form-control" required>
						</div>
            </div>	
            <br>
						<div class="row">
							<div class="col-md-4 ">
								<label control-label" for="state"">State*</label>
								<div class="control-group">
                                  <select id="state" name="gcountry"  class="form-control" required>
                                     <?php
                                            $sql = "select name  from states";
                                            $result = $conn->query($sql);
                                            if($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                                            <?php }
                                            }
                                        ?>
                                  </select> 
                                </div>
							</div>	
							<div class="col-md-4 ">
								<label control-label" for="city"">city*</label>
								<div class="control-group">
                                  <select id="city" name="gcity"  class="form-control" required>
                                <?php
                                            $sql = "select name  from pob";
                                            $result = $conn->query($sql);
                                            if($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                                            <?php }
                                            }
                                        ?>
                                  </select> 
                                </div>
							</div>
							<div class="col-md-4 ">
								<label >Date of Regestration*</label>
                <div class="control-group">
								<input type="date" name="gdate" placeholder="Enter datae Code Here.." class="form-control" required>
							</div>		
						</div>
            </div>
            <br>
            <div class="row">
					<div class="col-md-6 ">
					
						<label control-label" for="phone"">Phone Number*</label>
						<input type="number"  id="phone" name="gphone" placeholder="Enter Phone Number Here.." class="form-control" required>
				
          </div>
          	
          	  
					<div class="col-md-6 ">
					<div class="control-group">
						<label control-label" for="email"">Email Address</label>
						<input type="Email" id="email" name="gemail" placeholder="Enter Email Address Here.." class="form-control" required>
            </div>
            </div>
            </div>
				<div class="row">
					<div class="col-md-5 col-md-offset-3">
					<div class="form-group">
					<button  style="width:100%; margin: 15px 0px 0px 0px;"   type="submit" name="register"  class="btn btn-lg btn-primary" >Rigester</button>	
								</div>
                </div>    
				</div>
				</form> 
        </div>
        </div>
       
				</div>
	</div>
    <?php include("dashFooter.php"); ?>    
    <?php include("footer.php"); ?>
</body> 
</html>