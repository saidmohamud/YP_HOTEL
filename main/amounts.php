<?php
include "tables/config.php";
session_start();
if(!isset($_SESSION['username'])){
 //header('location: login.php');
}
 //header("location: guestlist.php");
?>
<?php
$host ="localhost";
$user = "root";
$pswd = "";
$db = "simpledata";
$gid="";
$gfullname ="";
$rno ="";
$floor ="";
$rtype ="";
$gdate ="";
$paid ="";
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
//$conn = mysqli_connect($host,$user,$pswd,$db);//(MySQLi Procedural)
$conn = new mysqli($host,$user,$pswd,$db);//(MySQLi Object-oriented)
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
if (isset($_POST['searchid'])) {
    $info = getData();
    $sql = "SELECT * FROM dbiling WHERE gid= '$info[0]'";
    $search_result =mysqli_query($conn,$sql);
if (mysqli_num_rows($search_result)){
 while ($rows=mysqli_fetch_array($search_result)) {
    $gid = $rows['gid'];
    $gfullname = $rows['gfullname'];
    $rno = $rows['rno'];
    $floor = $rows['floor'];
    $rtype = $rows['rtype'];
    $gdate = $rows['gdate'];
    $gdate = $rows['paid'];
}
}
}

// Update Command
// sql to delete a record
if (isset($_POST['update'])) {
      $info = getData();
$sql = "UPDATE dbiling SET gfullname='$info[1]', rno='$info[2]', floor='$info[3]', rtype='$info[4]', gdate='$info[5]', paid='$info[6]' WHERE gid='$info[0]'";
if ($conn->query($sql)===TRUE) {
    
}
else {
    echo" Error updating record".mysql_error($conn);
}
}
if(isset($_GET['idDelete'])){
    $idDelete = $_GET['idDelete'];
    $sql = "delete from dbiling where gid='$idDelete'";
    if($conn->query($sql)===true) {
        header("location: amounts.php");
    }
    else { ?>
        <script>
            alert("failed to delete");
            window.location.href='amounts.php';
        </script>
        <?php
        echo "failed to delete";
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
        <div class="container">
         <div class="row">
         <div class="col-xs-11">
        <div class="text-right">
        <a href="amount.php" class="btn btn-warning" role="button"><i class="fa fa-plus-circle"  ></i> Add New Invoice</a>
        </div>
    </div>
</div>
</div>
<br>
<div class="container-fluid">
<div class="row">
<div class="col-sm-12 ">
     <h1  class="bg-primary" align="center">INVOICE LIST</h1>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">Search</span>
                        <input type="text" name="search_text" id="search_text" placeholder="Search by room detail" class="form-control" />
                    </div>
                </div>
                <div id="result"></div>
    </div>
    </div> 
    </div><!-- ./wrapper -->
        <?php include("dashFooter.php"); ?>    
    
    <?php include("footer.php"); ?>
    </body>
<script>
        $(document).ready(function(){
        load_data();
        function load_data(query)
        {
            $.ajax({
            url:"amountlist.php",
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
 
</html>