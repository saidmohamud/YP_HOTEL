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
        }
		elseif(mysqli_num_rows($result) >= 0)
		{
			$sql = "INSERT INTO room (gfullname, gdate, rno, floor, rtype, rprice, room_status, paid) values ('$info[1]', '$info[2]', '$info[3]', '$info[4]', '$info[5]', '$info[6]', '$info[7]', '$info[8]' )";
			if($conn->query($sql) === true){
				header("location:rsearch.php");
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
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>YAASMIIN | GUEST</title>
    <?php include("links.php"); ?>
        <?php include("linkfooter.php"); ?>
</head>
<body class="hold-transition skin-purple-light  sidebar-mini">
    <div class="wrapper">
        <?php include("header.php"); ?>
        <?php include("menu.php"); ?>
        <div>
		<?php include("dashboard.php"); ?>
        <div class=" col-sm-9 " >
        <div class="text-left">
          <ol class="breadcrumb">
            <li><a href="adminpanel.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Check In Registeration</li>
          </ol>
          </div>
          </div>
      <br>
      <br>
      <?php
include "tables/config.php";
?>
<!-- <//?php include("tables/roomcon.php"); ?> -->
        <!-- /top navigation -->
 <div class="container-fluid" >
	<div class="row">
    <div class="col-md-9">
  <div class="panel panel-primary">
			<div class="panel-heading"><center><h4> CHECKIN</h4></center> 
			</div>
			<div class="panel-body">
				<form  class="form-horizontal"  id="guest-form"  method="post" >				
						<div class="row">
                      <div class="col-md-5">
                      	<label control-label" for="gfullname"">Fullname*</label>
                        <div class="control-group">
                         <select style="color:black" id="gfullname" name="gfullname"  class="form-control" >
                                 <?php
                                            $sql = "select gfullname  from guest";
                                            $result = $conn->query($sql);
                                            if($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['gfullname']; ?>"><?php echo $row['gfullname']; ?></option>
                                            <?php }
                                            }
                                        ?>
                                  </select> 
                        </div>
                        </div>           
                        <div class="col-md-5 ">
								<label  style="color:blue" >check in date*</label>
                <div class="control-group">
								<input style="color:black" id="datepicker" type="date" name="gdate" placeholder="Enter datae Code Here.." class="form-control" >
							</div>	
              </div>
                      </div>	
                       <br>
            <br>
			<div class="row">
            <div class="col-sm-4  ">
								<label style="color:blue" control-label" for="city"">Room Number*</label>
                
                <select style="color:black" id="rno" name="rno"  class="form-control" >
                
                                 <?php
                                            $sql = "SELECT rno  From roomno";
                                            $result = $conn->query($sql);
                                            if($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) { ?>
                                            <option > <?php echo $row['rno']; ?></option>
                                            <?php }
                                            }
                                        ?>
                                  </select>
							</div>
              <div class="col-sm-4   " >
								<label style="color:blue" control-label" for="floor"">Floor*</label>
								<div class="control-group">
                                 <input style="color:black" type="text"  id="floor" name="floor" placeholder="Enter floor no.."   class="form-control" > 
                                </div>
							</div>
                            <div class="col-sm-4   " >
								<label style="color:blue" control-label" for="floor"">Room Status*</label>
                                <select style="color:black" id="room_status" name="room_status"  class="form-control" >
                
                                 <?php
                                            $sql = "SELECT rstatus  From rstatus";
                                            $result = $conn->query($sql);
                                            if($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) { ?>
                                            <option > <?php echo $row['rstatus']; ?></option>
                                            <?php }
                                            }
                                        ?>
                                  </select>
							</div>
                                   </div>
            <br>
            <br>
            <div class="row">
					<div class="col-sm-3 ">
						<label  style="color:blue" control-label" for="room_price"">Room Type*</label>
                       <select style="color:black" id="rtype" name="rtype"  class="form-control" >
                                <?php
                                            $sql = "select rtype  from rooms ";
                                            $result = $conn->query($sql);
                                            if($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['rtype']; ?>"><?php echo $row['rtype']; ?></option>
                                            <?php }
                                            }
                                        ?>
                                  </select>             
            </div>
            <div class="col-sm-4 " style="margin-left:10px">
					
						<label style="color:blue" control-label" for="room_price"">Room Price*</label>
					
          <input style="color:black" type="text" id="price" name="rprice" placeholder="Enter room price.."   class="form-control" > 	
            </div>
            
                      <div class="col-md-4  ">
							<label style="color:blue" >Amount paid</label>
              <div class="control-group">
							<input style="color:black" type="text" name="paid" placeholder="Enter amount paid Code Here.." class="form-control" >
					
              </div>
            </div>
                      </div>
              

                      <div class="form-group">
                        <div class="col-md-6  col-md-offset-4">
                         
						  
                           <button style="width:50%; margin: 15px 0px 0px 0px;" type="submit" name="register" class="btn btn-lg btn-success">SAVE</button>	
                        </div>
                      </div>
				</form> 
        </div>
				</div>
	</div>
    </div> 
    </div>
<script>
$(document).ready(function(){
          $("#rno").on("change", function(){   
          var ItemID = $(this).val();
          if(ItemID){
              $.get(
                  "rno.php",
                  {rno: ItemID},
                  function(data){
                      $("input[name=floor]").val(data);
                  }
              );
          }
              else{
                  $("#rno").html("enter");
              }
      });
      });
      </script>
      <script>
      $(document).ready(function(){
          $("#rtype").on("change", function(){
            
          var ItemID = $(this).val();
       
          
          if(ItemID){
              $.get(
                  "type.php",
                  {rtype: ItemID},
                  function(data){
                      $("input[name=rprice]").val(data);
                   
                  }
              );
              
          }
              else{
                  $("#rno").html("enter");
              }
      });
      });
      </script>
     
    <?php include("dashfooter.php"); ?>
   
    <?php include("footer.php"); ?>
    
</body> 
</html>
