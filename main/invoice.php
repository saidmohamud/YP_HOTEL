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
$bdate ="";
$quantity ="";
$price ="";
$amount ="";
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
$data[6] =$_POST['bdate'];
$data[7] =$_POST['quantity'];
$data[8] =$_POST['price'];
$data[9] =$_POST['amount'];
$data[10] =$_POST['paid'];
return $data;
}
if (isset($_GET['gid'])) {
  $id=$_GET['gid'];
$sql= "SELECT gid, gfullname, date_format(gdate,'%m/%d/%Y') as gdate, floor, rno, rtype, rprice, paid, room_status  FROM room WHERE gid ='$id'";
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
    $paid = $rows['paid'];
  }
    }
     if(isset($_POST['register'])) {
      $info = getData();
      $gid= $_POST["gid"];
      $sql = "insert into biling (gfullname, rno, floor, rtype, gdate, bdate, quantity, price, amount, paid) values ('$info[1]', '$info[2]', '$info[3]', '$info[4]', '$info[5]', '$info[6]', '$info[7]', '$info[8]', '$info[9]', '$info[10]')";
        if($conn->query($sql) === true)
        $query = "DELETE FROM room  WHERE gid=".$gid;
        if($conn->query($query) === true){
          header("location:invoices.php");
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

<style>
#tt{
    background-color:black;
    cursor:pointer;
}
#ss{
    padding:12px;
}
</style>
</head>
<body class="hold-transition skin-purple-light  sidebar-mini" onload="timing()">
      <div class="wrapper">
      <?php include("header.php"); ?>
        <?php include("menu.php"); ?>
        <?php include("dashboard.php"); ?>
        <div class=" col-sm-10 " >
        <div class="text-left">
          <ol class="breadcrumb">
            <li><a href="adminpanel.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Check Out Registration</li>
          </ol>
          </div>
          </div>
      <br>
      <br>
      <div class="container-fluid">
    <!-- <h1 class="well">Gust Regestration </h1> -->
	<div class="row">
  <div class="col-md-10">
  <div class="panel panel-primary">
			<div class="panel-heading"><center>CHECK OUT</center> 
			</div>
			<div class="panel-body">
				<form  class="form-horizontal"  id="guest-form" action="invoice.php"  method="post" >
						<div class="row">
                      <div class="col-md-5  ">
                      	<label  control-label" for="gfullname"">Fullname*</label>
                        <div class="control-group">
                        <input style="color:black" type="text" id="gfullname" name="gfullname"  value="<?php echo($gfullname);?>"   placeholder="Enter name " class="form-control" >
                        </div>
                        </div>
					<div class="col-sm-1 ">
						<input type="hidden"  name="gid" value="<?php echo  $gid; ?>" 
						class="form-control" value="<?php 
						//	echo $row['id']; ?>">	
				</div>	
    <div class="col-sm-4">
								<label control-label" for="city"">Room Number*</label>
                <input style="color:black" type="text" id="rno" name="rno"  value="<?php echo($rno);?>"   placeholder="Enter rno " class="form-control" >
							</div>
              <div class="col-sm-2 ">
								<label control-label" for="floor"">Floor*</label>
								<div class="control-group">
              <input style="color:black" type="text"  id="floor" name="floor" value="<?php echo($floor);?>" placeholder="Enter floor no.."   class="form-control" > 
              </div>
							</div>
              </div>
              <br>
              <div class="row">
					<div class="col-sm-3 ">
						<label  control-label" for="rtype"">Room Type*</label>
            <input style="color:black" type="text"  id="rtype" name="rtype" value="<?php echo($rtype);?>" placeholder="Enter rtype no.."   class="form-control" >                     
  
            </div>
           
            <div class="col-md-3">
								<label  >Amount_Paid</label>
                <div class="control-group">
								<input style="background-color:white" type="text" id="paid" name="paid" value="<?php echo($paid);?>"  class="form-control"  ><br>
							</div>	
              </div>
  
            <div class="col-sm-3">
								<label  >Check in Date*</label>
                <div class="control-group">
								<input  style="background-color:white"  type="text" id="date1" name="gdate"value="<?php echo($gdate);?>"   class="form-control"  ><br>
							</div>	
              </div>
              <div class="col-sm-3">
								<label  >Check out Date*</label>
                <div class="control-group">
								<input style="background-color:white" type="text" id="date2" name="bdate"  class="form-control"  ><br>
							</div>	
              </div>
              </div>
              <div class-"row">
              <div class="col-sm-3">
								<label  >Days</label>
              
								<input style="background-color:white" type="text" id="diff" name="quantity"  class="form-control"  >
							
              </div>
              <div class="col-sm-3">
								<label  >Room_Price</label>
                <div class="control-group">
								<input style="background-color:white" type="text" id="price" name="price"  value="<?php echo($rprice);?>"  class="form-control"  ><br>
							</div>	
              </div>
              <div class="col-sm-3">
								<label  >Total</label>
                <div class="control-group">
								<input style="background-color:white" type="text" id="amount" name="amount"  class="form-control"  ><br>
							</div>	
              </div>
              <div class="col-lg-3">
						<label   control-label" for="rtype"">Amount_Due</label>
            <input style="color:black" type="text"  id="dayn"     class="form-control" > 
            </div>
            </div>
                     <div class="row">
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
<script type="text/javascript">
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
<script type="text/javascript">
$(document).ready(function(){
  $("input").change(function(){
    var ab = 0;
    $("#amount").each(function(){
     ab = parseFloat($("#amount").val()) - parseFloat($("#paid").val());
      
    });
    $("#dayn").val(ab);
  });
});
</script>
<script>
            $('#date1').datepicker();
            $('#date2').datepicker();
            $('#date2').change(function () {
                var diff = $('#date1').datepicker("getDate") - $('#date2').datepicker("getDate");
                $('#diff').val(Math.round(diff / (1000 * 60 * 60 * 24) * -1));
            });
        </script>
    </div>
        <?php include("dashFooter.php"); ?>    
 
    <?php include("footer.php"); ?>
</body> 
</html>