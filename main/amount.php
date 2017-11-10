<?php
include "tables/config.php";
$gid="";
if (isset($_GET['search'])) {
$gid=	$_GET['search'];
}
?>
<?php
$gid="";
$gfullname ="";
$rno ="";
$floor ="";
$rtype ="";
$gdate ="";
$paid ="";
	$conn = new mysqli("localhost", "root", "", "simpledata");
  function getData()
{
$data =array();
$data[0] =$_POST['gid'];
$data[1] =$_POST['gfullname'];
$data[2] =$_POST['rno'];
$data[3] =$_POST['floor'];
$data[4] =$_POST['rtype'];
$data[5] =$_POST['gdate'];
$data[6] =$_POST['paid'];
return $data;
}
if (isset($_GET['gid'])) {
  $id=$_GET['gid'];
$sql= "SELECT * FROM room WHERE gid ='$id'";
$search_result = mysqli_query($conn, $sql);
while ($rows = mysqli_fetch_array($search_result))
  {
    $gid = $rows['gid'];
    $rno = $rows['rno'];
    $gfullname = $rows['gfullname'];
    $gdate = $rows['gdate'];
    $floor = $rows['floor'];
    $rtype = $rows['rtype'];
    $rprice = $rows['rprice'];
  }
    }
    if(isset($_POST['register'])) {
      $info = getData();
      $ab="";
      $sum = 0;
      $total= 0;
      $ab= $_POST["paid"];
      $gid= $_POST["gid"];
      $sql = "insert into dbiling (gfullname, rno, floor, rtype, gdate, paid) values ('$info[1]', '$info[2]', '$info[3]', '$info[4]', '$info[5]', '$info[6]')";
        if($conn->query($sql) === true)
        $query = "update room set paid =paid+".$ab." WHERE gid=".$gid;
        if($conn->query($query) === true){
          header("location:amounts.php");
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
        <div class=" col-md-8 " >
        <div class="text-left">
          <ol class="breadcrumb">
            <li><a href="adminpanel.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Invoice Registration</li>
          </ol>
          </div>
          </div>
      <br>
      <br>     
 <div class="container">
    <!-- <h1 class="well">Gust Regestration </h1> -->
	<div class="col-md-7">
	<div class="row">
  <div class="panel panel-primary">
			<div class="panel-heading"><center>Invoice</center> 
			</div>
			<div class="panel-body">
				<form  class="form-horizontal"  id="guest-form" action="amount.php"  method="post" >
						<div class="row">
                      <div class="col-md-7 col-md-offset-2 ">
                      	<label  control-label" for="gfullname"">Fullname*</label>
                        <div class="control-group">
                        <input style="color:black" type="text" id="gfullname" name="gfullname"  value="<?php echo($gfullname);?>"   placeholder="Enter name " class="form-control" >
                        </div>
                        </div>
                        <div class="row">
					<div class="col-sm-12 ">
						<input type="hidden"  name="gid" value="<?php echo  $gid; ?>" 
						class="form-control" value="<?php 
						//	echo $row['id']; ?>">	
				</div>	
                        </div>
                        <br>
		<div class="row">
    <div class="col-sm-4" style="margin-left:10px">
								<label  control-label" for="city"">Room Number*</label>
                <input style="color:black" type="text" id="rno" name="rno"  value="<?php echo($rno);?>"   placeholder="Enter rno " class="form-control" >
							</div>
              <div class="col-sm-4   ">
								<label  control-label" for="floor"">Floor*</label>
								<div class="control-group">
              <input style="color:black" type="text"  id="floor" name="floor" value="<?php echo($floor);?>" placeholder="Enter floor no.."   class="form-control" > 
              </div>
							</div>
					<div class="col-sm-3 ">
					<div class="form-group">
						<label  control-label" for="rtype"">Room Type*</label>
            <input style="color:black" type="text"  id="rtype" name="rtype" value="<?php echo($rtype);?>" placeholder="Enter rtype no.."   class="form-control" > 
				   	</div>		
            </div>
            </div>
            <br>
            <div class="row">
            <div class="col-md-3 col-md-offset-3">
								<label>Date peid*</label>
                <div class="control-group">
								<input    type="text" id="date1" name="gdate" value="<?php echo($gdate);?>" class="form-control"  ><br>
							</div>	
              </div>
              <div class="col-sm-4">
								<label  control-label" for="city"">Cost Paid*</label>
               
                <input style="color:black" type="text" id="rno" name="paid"    placeholder="Enter mony paid " class="form-control" >
							</div>
            </div>  
                      <div class="form-group">
                        <div class="col-md-7  col-md-offset-4">
                           <button style="width:50%; margin: 15px 0px 0px 0px;" type="submit" name="register" class="btn btn-lg btn-success">Save</button>	
                        </div>
                      </div>
				</form> 
        </div>
				</div>
	</div>
	</div>
    </div>
    </div><!-- ./wrapper -->
        <?php include("dashFooter.php"); ?>    
    </div>
    <?php include("footer.php"); ?>
    </body>
    <!-- <script type="text/javascript">
    $(document).ready(function(){
      $("input").change(function(){
        var total = 0;
        $("#diff").each(function(){
          total = parseFloat($("#diff").val()) * parseFloat($("#price").val());
        });
        $("#amount").val(total);
      });
    });
    </script>
    <script>
                $('#date1').datepicker();
                $('#date2').datepicker();
    
                $('#date2').change(function () {
                    var diff = $('#date1').datepicker("getDate") - $('#date2').datepicker("getDate");
                    $('#diff').val(diff / (1000 * 60 * 60 * 24) * -1);
                });
            </script> -->
</html>