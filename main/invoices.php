<?php
include "tables/config.php";
session_start();
if(!isset($_SESSION['username'])){
   // header('location: login.php');
}
// header("location: guestlist.php");
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
$bdate ="";
$quantity ="";
$price ="";
$amount ="";
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
$data[6] =$_POST['bdate'];
$data[7] =$_POST['quantity'];
$data[8] =$_POST['price'];
$data[9] =$_POST['amount'];
return $data;
}
if (isset($_POST['searchid'])) {
    $info = getData();
    $sql = "SELECT * FROM biling WHERE gid= '$info[0]'";
    $search_result =mysqli_query($conn,$sql);
if (mysqli_num_rows($search_result)){
 while ($rows=mysqli_fetch_array($search_result)) {

    $gid = $rows['gid'];
    $gfullname = $rows['gfullname'];
    $rno = $rows['rno'];
    $floor = $rows['floor'];
    $rtype = $rows['rtype'];
    $gdate = $rows['gdate'];
    $bdate = $rows['bdate'];
    $quantity = $rows['quantity'];
    $price = $rows['price'];
    $amount = $rows['amount'];
}
}
}
// Update Command
// sql to delete a record
if (isset($_POST['update'])) {
      $info = getData();
$sql = "UPDATE biling SET gfullname='$info[1]', rno='$info[2]', floor='$info[3]', rtype='$info[4]', gdate='$info[5]', bdate='$info[6]', quantity='$info[7]', price='$info[8]', amount='$info[9]' WHERE gid='$info[0]'";
if ($conn->query($sql)===TRUE) {
    
}
else {
    echo" Error updating record".mysql_error($conn);
}
}
if(isset($_GET['idDelete'])){
    $idDelete = $_GET['idDelete'];
    $sql = "delete from biling where gid='$idDelete'";
    if($conn->query($sql)===true) {
        header("location: invoices.php");
    }
    else { ?>
        <script>
            alert("failed to delete");
            window.location.href='invoices.php';
        </script>
        <?php
        echo "failed to delete";
    }
}
?>
<!DOCTYPE html>
</head>
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
      <div class="container">
         <div class="row">
         <div class="col-xs-11">
        <div class="text-right">
        <a href="room.php" class="btn btn-warning" role="button"><i class="fa fa-plus-circle"  ></i> Add Check Out</a>
        </div>
    </div>
</div>
</div>

<div class="container-fluid">
<div class="row">
<div class="col-sm-11 ">
<h3 style="border:2px solid white; background-color:#b4b4b4"; align="center"> <B style="font-family: Times New Roman, Times, serif; color:white"><strong>CHECK OUT LIST</strong></B></h3>
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
            url:"invoicelist.php",
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