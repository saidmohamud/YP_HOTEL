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
      
      <?php
include "tables/config.php";
?>
<?php
$host ="localhost";
$user = "root";
$pswd = "";
$db = "simpledata";
$gid="";
$rno="";
$floor="";
$room_type="";
$room_status="";
$room_price="";
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
//$conn = mysqli_connect($host,$user,$pswd,$db);//(MySQLi Procedural)
$conn = new mysqli($host,$user,$pswd,$db);//(MySQLi Object-oriented)
function getData()
{
$data =array();
$data[0] =$_POST['gid'];
$data[1] =$_POST['rno'];
$data[2] =$_POST['floor'];
$data[3] =$_POST['room_type'];
$data[4] =$_POST['room_status'];
$data[5] =$_POST['room_price'];
return $data;
}
if (isset($_POST['searchid'])) {
    $info = getData();
    $sql = "SELECT * FROM roomno WHERE gid= '$info[0]'";
    $search_result =mysqli_query($conn,$sql);
if (mysqli_num_rows($search_result)){
 while ($rows=mysqli_fetch_array($search_result)) {
$room_id=$rows['gid'];
$room_no=$rows['rno'];
$floor=$rows['floor'];
$room_type=$rows['room_type'];
$room_status=$rows['room_status'];
$room_price=$rows['room_price'];
}
}
}
// Update Command
// sql to delete a record
if (isset($_POST['update'])) {
      $info = getData();
$sql = "UPDATE roomno SET rno='$info[1]', floor='$info[2]', room_type='$info[3]', room_status='$info[4]', room_price='$info[5]' WHERE gid='$info[0]'";
if ($conn->query($sql)===TRUE) {
   
}
else {
    echo" Error updating record".mysql_error($conn);
}
}
if(isset($_GET['idDelete'])){
    $idDelete = $_GET['idDelete'];
    $sql = "delete from roomno where gid='$idDelete'";
    if($conn->query($sql)===true) {
       // header("location: rooms.php");
    }
    else { ?>
        <script>
            alert("failed to delete");
          //  window.location.href='rooms.php';
        </script>
        <?php
        echo "failed to delete";
    }
}
?>
     <div class="container">
         <div class="row">
         <div class="col-xs-11">
        <div class="text-right">
        <a href="room.php" class="btn btn-warning" role="button"><i class="fa fa-plus-circle"  ></i> Add New Room</a>
        </div>
    </div>
</div>
</div>
<br>
<div class="container-fluid">
<div class="row">
<div class="col-sm-12">
     <h1  class="bg-primary" align="center">Room Information</h1>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">Search</span>
                        <input type="text" name="search_text" id="search_text" placeholder="Search by room detail" class="form-control" />
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
            url:"rnolist.php",
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
</body> 
</html>