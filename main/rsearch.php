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
          <?php include("tables/config.php"); ?>
      <?php
$host ="localhost";
$user = "root";
$pswd = "";
$db = "simpledata";
$gid="";
$gfullname="";
$gdate="";
$floor="";
$rno="";
$rtype="";
$room_status="";
$rprice="";




mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
//$conn = mysqli_connect($host,$user,$pswd,$db);//(MySQLi Procedural)
$conn = new mysqli($host,$user,$pswd,$db);//(MySQLi Object-oriented)


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
$data[7] =$_POST['room_status'];
$data[8] =$_POST['paid'];






return $data;
}

if (isset($_POST['searchid'])) {
    $info = getData();
    $sql = "SELECT * FROM room WHERE gid= '$info[0]'";
    $search_result =mysqli_query($conn,$sql);
if (mysqli_num_rows($search_result)){
 while ($rows=mysqli_fetch_array($search_result)) {
$id=$rows['gid'];
$gfullname=$rows['gfullname'];
$date=$rows['gdate'];
$floor=$rows['floor'];
$rno=$rows['rno'];
$rtype=$rows['rtype'];
$rprice=$rows['rprice'];
$room_status=$rows['room_status'];
$paid=$rows['paid'];



}
}
}

// Update Command
if (isset($_POST['update'])) {
      $info = getData();
      	$sql1="SELECT gid, gfullname FROM guest WHERE gid=gid";
$ressalt=$conn->query($sql1);
$id="";
while (  $row=$ressalt->fetch_assoc()) {
$id=$row['gid'];
$name=$row['gfullname'];
} 
$sql = "UPDATE room SET gfullname='$info[1]', gdate='$info[2]', floor='$info[3]', rno='$info[4]', rtype='$info[5]', rprice='$info[6]', room_status='$info[7]', paid='$info[8]' WHERE gid='$info[0]'";
if ($conn->query($sql)===TRUE) {
    
}
else {
    echo" Error updating record".mysql_error($conn);
}
}

if(isset($_GET['idDelete'])){
    $idDelete = $_GET['idDelete'];
    $sql = "delete from room where gid='$idDelete'";
    if($conn->query($sql)===true) {
       // header("location:rsearch.php");
    }
    else { ?>
        <script>
            alert("failed to delete");
            window.location.href='rsearch.php';
        </script>
        <?php
       // echo "failed to delete";
    }
}
?>
<div class="container">
         <div class="row">
         <div class="col-xs-11">
        <div class="text-right">
        <a href="checkin.php" class="btn btn-warning" role="button"><i class="fa fa-plus-circle"  ></i> Add New Person</a>
        </div>
    </div>
</div>
</div>
<br>

<div class="container-fluid">
<div class="row">
<div class="col-sm-12  ">
     <h1  class="bg-primary" align="center">CHECK IN LIST</h1>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">Search</span>
                        <input type="text" name="search_text" id="search_text" placeholder="Search by room detail Details" class="form-control" />
                    </div>
                </div>
                <div id="result"></div>
    </div>
    </div>
   
<script>
        $(document).ready(function(){
        load_data();
        function load_data(query)
        {
            $.ajax({
            url:"rlist.php",
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
</body> 
</html>