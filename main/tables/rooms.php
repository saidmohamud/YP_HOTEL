<?php
include "config.php";
session_start();
if(!isset($_SESSION['username'])){
    header('location: login.php');
}
// header("location: guestlist.php");
?>

<?php
$host ="localhost";
$user = "root";
$pswd = "";
$db = "simpledata";
$room_id="";
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
$data[0] =$_POST['room_id'];
$data[1] =$_POST['rno'];
$data[2] =$_POST['floor'];
$data[3] =$_POST['room_type'];
$data[4] =$_POST['room_status'];
$data[5] =$_POST['room_price'];





return $data;
}

if (isset($_POST['searchid'])) {
    $info = getData();
    $sql = "SELECT * FROM roomno WHERE room_id= '$info[0]'";
    $search_result =mysqli_query($conn,$sql);
if (mysqli_num_rows($search_result)){
 while ($rows=mysqli_fetch_array($search_result)) {

$room_id=$rows['room_id'];
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
$sql = "UPDATE roomno SET rno='$info[1]', floor='$info[2]', room_type='$info[3]', room_status='$info[4]', room_price='$info[5]' WHERE room_id='$info[0]'";
if ($conn->query($sql)===TRUE) {
    echo"Record updated successfully";
}
else {
    echo" Error updating record".mysql_error($conn);
}
}



if(isset($_GET['Delete'])){
    $sql = "SELECT * FROM roomno ";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    $room_id=$row['room_id'];
    //$idDelete = $_GET['idDelete'];
    $sql = "DELETE FROM roomno WHERE  room_id='$room_id'";
    if($conn->query($sql)===TRUE) {
        header("location: rsearch.php");
    }
    else { ?>
        <script>
            alert("failed to delete");
            window.location.href='rsearch.php';
        </script>
        <?php
        echo "failed to delete";
    }
}
?>





         <div class="row">
    <div class="col-xs-11">
        <div class="text-right">
            <a href="room.php" class="btn btn-info" role="button">Add new Room</a>
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