
     <?php
include "tables/config.php";
session_start();
if(!isset($_SESSION['username'])){
    header('location: login.php');
}
?>
<?php
$host ="localhost";
$user = "root";
$pswd = "";
$db = "simpledata";
$gid="";
$gfullname="";
$gdate="";
$gaddress="";
$gphone="";
$ggender="";
$floor="";
$rno="";
$rtype="";
$rprice="";


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
//$conn = mysqli_connect($host,$user,$pswd,$db);//(MySQLi Procedural)
$conn = new mysqli($host,$user,$pswd,$db);//(MySQLi Object-oriented)

  
	// if(isset($_POST['register'])) {
        
	// 	$info = getData();
    //     $sql = "INSERT INTO room (gfullname, gdate, gaddress, gphone, ggender, floor, rno, rtype, rprice) values ('$info[1]', '$info[2]', '$info[3]', '$info[4]', '$info[5]', '$info[6]', '$info[7]', '$info[8]', '$info[9]' )";
    // if($conn->query($sql) === true){
    //     header("location:rsearch.php");
	// 		}
	// 		$query = "UPDATE roomno set room_status='Accupied' WHERE rno='$info[7]'";
    //   if($conn->query($query) === true){
    //     echo("Data has been updated");
    //   }
    //   $query = "INSERT INTO guest (gfullname, gdate, rno, floor, rtype, rprice) values ('$info[1]', '$info[2]', '$info[7]', '$info[6]', '$info[8]', '$info[9]' )";
    //   if($conn->query($query) === true){
    //     echo("inserted");
    //   }
	// }
    
   
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <script src="js/bootstrap.min.js"></script> -->
    <title>YAASMIIN | HOTEL</title>
    <?php include("Linkfooter.php"); ?>
    <?php include("links.php"); ?>
</head>
<body class="hold-transition skin-purple-light  sidebar-mini" onload="timing()">
      <div class="wrapper">
      <?php include("header.php"); ?>
        <?php include("menu.php"); ?>
        <?php include("dashboard.php"); ?>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
          <div class="container" style="margin-top:-80px">
         <div class="row">
         <div class="col-md-11">
        <div class="text-right">
        <a href="addguest.php" class="btn btn-warning" role="button"><i class="fa fa-plus-circle"  ></i> Add New Guest</a>
       
        </div>
    </div>
</div>
</div>
<div class="container-fluid">
<div class="row">
<div class="col-md-12  ">
     <h3 style="border:2px solid white; background-color:#b4b4b4"; align="center"> <B style="font-family: Times New Roman, Times, serif; color:white"><strong>Checkin LIST</strong></B></h3>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">Search</span>
                        <input type="text" name="search_text" id="search_text" placeholder="Search by Guest Details" class="form-control" />
                    </div>
                </div>
                <div id="result"></div> 
    </div>
    </div>
    </div>
<script>
        $(document).ready(function(){
        load_data();
        function load_data(query)
        {
            $.ajax({
            url:"mobiles.php",
            method:"POST",
            data:{query:query},
            success:function(data)
            {
                $('#result').html(data);
            }
            });
        }
        $('#search_text').keyup(function(){
            var search = $(this).val();
            if(search != '')
            {
                load_data(search);
            }
            else
            {
                load_data();
            }
        });
    });
</script>
        <?php include("dashFooter.php"); ?>    
  
    <?php include("footer.php"); ?>
    </div>
