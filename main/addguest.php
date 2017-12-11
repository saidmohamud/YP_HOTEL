<?php
	$conn = new mysqli("localhost", "root", "", "simpledata");
	$data = array();
	function getData(){
      $data[0] =$_POST['gid'];
      $data[1] =$_POST['gfullname'];
      $data[2] =$_POST['gaddress'];
      $data[3] =$_POST['gcountry'];
      $data[4] =$_POST['gcity'];
      $data[5] =$_POST['gdate'];
      $data[6] =$_POST['gphone'];
      $data[7] =$_POST['gemail'];
      $data[8] =$_POST['ggender'];
      $data[9] =$_POST['rno'];
      $data[11] =$_POST['floor'];
      $data[12] =$_POST['rtype'];
      $data[13] =$_POST['rprice'];
		return $data;
	}
	if(isset($_POST['register'])) {
		$info = getData();
    $sql = "INSERT INTO room (gfullname, gaddress, gcountry, gcity, gdate, gphone, gemail, ggender, rno, room_status, floor, rtype, rprice, paid) values ('$info[1]', '$info[2]', '$info[3]', '$info[4]', '$info[5]', '$info[6]', '$info[7]', '$info[8]', '$info[9]', '$info[20]', '$info[11]', '$info[12]', '$info[13]', '$info[14]' )";
    if($conn->query($sql) === true){
        header("location:rsearch.php");
			}
			$query = "UPDATE roomno set room_status='Accupied' WHERE rno='$info[9]'";
      if($conn->query($query) === true){
        echo("Data has been updated");
      }
      $query = "INSERT INTO guest (gfullname, gdate, rno, floor, rtype, rprice) values ('$info[1]', '$info[5]', '$info[9]', '$info[11]', '$info[12]', '$info[13]' )";
      if($conn->query($query) === true){
        echo("inserted");
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

 <div class="container-fluid" >
	<div class="row">
    <div class="col-md-9">
  <div class="panel panel-primary">
			<div class="panel-heading"><center><h4> CHECKIN</h4></center> 
			</div>
			<div class="panel-body">
            <form  class="form-horizontal"  id="guest-form" action="addguest.php"  method="post" >
            <div class="row">
          <div class="col-md-6">
              <label  control-label" for="gfullname"">Fullname</label>
            <div class="control-group">
            <input style="color:black" type="text" id="gfullname" name="gfullname"  placeholder="Enter name " class="form-control" >
            </div>
            </div>
<div class="col-sm-6">
                    <label control-label" for="city"">Address</label>
    <input style="color:black" type="text" id="gaddress" name="gaddress"     placeholder="Enter rno " class="form-control" >
                </div>
                </div>
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

<div class="col-md-4">
                    <label  >Date</label>
    <div class="control-group">
                    <input style="background-color:white" type="date" id="gdate" name="gdate"   class="form-control"  ><br>
                </div>	
  </div>
  </div>
  <div class="row">
  <div class="col-md-4">
                    <label  >Phone</label>
    <div class="control-group">
                    <input style="background-color:white" type="text" id="gphone" name="gphone"   class="form-control"  ><br>
                </div>	
  </div>
  
  <div class="col-md-4">
                    <label  >Email</label>
    <div class="control-group">
                    <input style="background-color:white" type="text" id="gemail" name="gemail"   class="form-control"  ><br>
                </div>	
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
  </div>
  <div class="row"> 
                     <div class="col-sm-3 ">
						<label   control-label" for="rno"">Room No*</label>
                       <select style="color:black" id="rno" name="rno"  class="form-control" >
                                <?php
                                            $sql = "select rno  from roomno ";
                                            $result = $conn->query($sql);
                                            if($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['rno']; ?>"><?php echo $row['rno']; ?></option>
                                            <?php }
                                            }
                                        ?>
                                  </select>             
                                   </div>
                                
                                             
  <div class="col-sm-3">
                    <label  >Floor</label>
    <div class="control-group">
                    <input style="background-color:white" type="text" id="floor" name="floor"  class="form-control"  ><br>
                </div>	
  </div>
 
  <div class="col-sm-3 ">
						<label   control-label" for="room_price"">Room Type*</label>
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
            
  <div class="col-sm-3">
                    <label  >Room_Price</label>
    <div class="control-group">
                    <input style="background-color:white" type="text" id="rprice" name="rprice"   class="form-control"  ><br>
                </div>	
  </div>
  </div>
 


         
          <div class="form-group">
            <div class="col-sm-7  col-md-offset-4">
               <button style="width:50%; margin: 15px 0px 0px 0px;" type="submit" name="register" class="btn btn-lg btn-primary">SAVE</button>	
            </div>
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