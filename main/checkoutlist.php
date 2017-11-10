
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
        <div class=" col-sm-11 col-sm-offset-1 " style="margin-left:-13px;">
        <div class="text-left">
          <ol class="breadcrumb">
            <li><a href="adminpanel.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Register Details</li>
          </ol>
          </div>
          </div>
      <br>
      <br>
      <?php
include "tables/config.php";

?>
<?php
$gid="";
$gfullname ="";
$gdate ="";
$floor ="";
$rno ="";
$rtype ="";
$rprice ="";

$rno=$_POST['rno'];
	$conn = new mysqli("localhost", "root", "", "simpledata");
  function getData()
{
$data =array();
$data[0] =$_POST['gid'];
$data[1] =$_POST['gfullname'];
$data[2] =$_POST['gdate'];
$data[3] =$_POST['floor'];
$data[4] =$_POST['rno'];
$data[5] =$_POST['rtype'];
$data[6] =$_POST['rprice'];

return $data;
}
      
    if (isset($_POST['search'])) {
    $search_query= "SELECT * FROM room WHERE rno ='$rno'";
	$search_result = mysqli_query($conn, $search_query);
  
while ($rows = mysqli_fetch_array($search_result))
			{
			  $gid = $rows['gid'];
        $gfullname = $rows['gfullname'];
			  $gdate = $rows['gdate'];
			  $floor = $rows['floor'];
			  $rno = $rows['rno'];
			  $rtype = $rows['rtype'];
			  $rprice = $rows['rprice'];
		

			}
        }
      

if (isset($_POST['delete'])) {
$info = getData();
$sql = "DELETE FROM room WHERE rno = '$info[4]'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
}

?>

          
 <div class="container-fluid" style="margin-left:-226px; margin-top:-40px;">
    <!-- <h1 class="well">Gust Regestration </h1> -->
	<div class="col-md-9 col-md-offset-2">
	<div class="row">
  <div class="panel panel-primary">
			<div class="panel-heading"><center><H5><b>CHECK OUT</b></H5>
			</div>
			<div class="panel-body">
				<form  class="form-horizontal"  id="guest-form"  method="post" >
        <div class="row">
                       
                        <div class="col-md-2   ">
                         	<label style="color:blue"  style="color:black" control-label" for="gfullname"">Room No*</label>
                         
										</div>
                   
         
                        <div class="col-sm-2">
                         
                         <input type="number" name="rno"   value="<?php echo($rno);?>"class="form-control"> 
                  
                    </div>
                     
                    <div class="col-md-3">
                          <button type="submit" name="search" value="search" class="btn btn-md btn-info">OK</button>	
                   	</div>
                    </div>
                    <br>
						<div class="row">
                      <div class="col-md-6 ">
                      	<label style="color:blue" control-label" for="gfullname"">Fullname*</label>
                        <div class="control-group">
                    <input type="text" name="gfullname" class="form-control" value="<?php echo($gfullname);?>" ><br>
                        </div>
                        </div>
                        
                        
                     
                        <div class="col-md-4  ">
								<label style="color:blue" >Check in Date*</label>
                <div class="control-group">
								<input type="date" name="gdate"  class="form-control" value="<?php echo($gdate);?>" ><br>
							</div>	
              </div>
                      </div>	
                
				
						<div class="row">
              <div class="col-sm-3  ">
								<label style="color:blue" control-label" for="floor"">Floor*</label>
								<div class="control-group">
                <input type="text" name="floor"  class="form-control" value="<?php echo($floor);?>" ><br>

                                </div>
						                   	</div>
                               
         
					<div class="col-sm-3 ">
					<div class="form-group">
						<label  style="color:blue" control-label" for="room_price"">Room Type*</label>
				  <input type="text" name="rtype"  class="form-control" value="<?php echo($rtype);?>" ><br>            
					</div>		
					  </div>
            
            <div class="col-sm-3 ">
					<div class="form-group">
						<label style="color:blue" control-label" for="room_price"">Room Price*</label>
					
           <input type="text" name="rprice"  class="form-control" value="<?php echo($rprice);?>" ><br>
                              
					</div>		
					
            </div>
            
            </div>
                      <div>
                       <br>
       

                      <div class="form-group">
                        <div class="col-md-8  col-md-offset-2">
                         
						  
                           <button style="width:50%; margin: 15px 0px 0px 0px;" type="submit" name="delete" class="btn btn-lg btn-success">Finish</button>	
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
          // var roomtyp = $(this).val();
          // var roompr = $(this).val();
          
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
     
     
    </div><!-- ./wrapper -->
     
  
                   
      
    
        <?php include("dashFooter.php"); ?>    
    </div>
    <?php include("footer.php"); ?>




</body> 
</html>