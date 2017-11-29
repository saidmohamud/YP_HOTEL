<?php
include "config.php";
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
$floor="";
$rno="";
$rtype="";
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
}
}
}
// Update Command
// sql to delete a record
if (isset($_POST['update'])) {
      $info = getData();
      	$sql1="SELECT gid, gfullname FROM guest WHERE gid=gid";
$ressalt=$conn->query($sql1);
$id="";
while (  $row=$ressalt->fetch_assoc()) {
$id=$row['gid'];
$name=$row['gfullname'];
} 
$sql = "UPDATE room SET gfullname='$info[1]', gdate='$info[2]', floor='$info[3]', rno='$info[4]', rtype='$info[5]', rprice='$info[6]' WHERE gid='$info[0]'";
if ($conn->query($sql)===TRUE) {
    echo"Record updated successfully";
}
   $query = "UPDATE guest set gfullname='$info[1]' WHERE gfullname=1";
   if($conn->query($query) === true){
  echo("Data has been updated");
  }
else {
    echo" Error updating record".mysql_error($conn);
}
}
?>
         <div class="row">
    <div class="col-xs-11">
        <div class="text-right">
            <a href="radd.php" class="btn btn-info" role="button">Add Room</a>
        </div>
    </div>
</div>
<div class="container">
<div class="row">
<div class="col-sm-10 col-sm-offset-2 ">
     <h1  class="bg-primary" align="center">Room Information</h1>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">Search</span>
                        <input type="text" name="search_text" id="search_text" placeholder="Search by room detail Details" class="form-control" />
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