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
$rno=$rows['rno'];
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
        header("location: rooms.php");
    }
    else { ?>
        <script>
            alert("failed to delete");
            window.location.href='rooms.php';
        </script>
        <?php
        echo "failed to delete";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
     <title>Hotel yaasmiin plaza| </title>
 <script src="jquery-3.2.1.js"></script>
    <!-- Bootstrap -->
    <link href="bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap.min.js"></script>
    
    <style>
       
th{
	  background:#000099;
	  color:#00FF00;
      text-align:center;
      
      }
      td{
           
	  color:black;
      text-align:center;
      
      
      }
      .table-responsive table tr:hover {
  background:#FFCE43;
}
.table-responsive table tr td:hover {
  background: #DCDCDC;
}
      tr:nth-child(even) {background: #FFCE43}
      .table-responsive table tr:nth-child(odd) {background: #2ecc71}
      </style>
  </head>
  <body>
<?php
    $conn = new mysqli("localhost", "root", "", "simpledata");
    if(isset($_POST["query"]))
    {
        $search = mysqli_real_escape_string($conn, $_POST["query"]);
        $query = " SELECT * FROM roomno  WHERE gid LIKE '%".$search."%' OR rno LIKE '%".$search."%'  OR floor LIKE '%".$search."%'  OR room_type LIKE '%".$search."%'";
    }
    else
    {
        $query = " SELECT * FROM roomno ORDER BY gid ";
    }
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0)
    { ?>
        <div class="table-responsive">
            <table class="table table-striped table-condensed table-hover table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Room No</th>
                    <th>Floor</th>
                    <th>Room Type</th>
                    <th>Room Status</th>
                    <th>Room Price</th>
                    <th>Action</th>
                    <th>Action</th></tr>       
        <?php
            while($row = mysqli_fetch_array($result)){ ?>
                <tr>
                    <td style="background-color:#ff0080", color:"black"><?php echo $row["gid"] ?></td>
                    <td><?php echo $row["rno"] ?></td>
                    <td><?php echo $row["floor"] ?></td>
                    <td><?php echo $row["room_type"] ?></td>
                    <td><?php echo $row["room_status"] ?></td>
                    <td><?php echo $row["room_price"] ?></td>
                    <td>
                       <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#edit-<?php echo $row['gid']; ?>" id=""><i class="fa fa-pencil fa-lg"></i> Edit</button>
                       <div class="modal fade" role="dialog" id="edit-<?php echo $row['gid']; ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color:blue">
                                    <button type="button" class="close" data-dismiss="modal" style="margin-top:-10px">&times;<B style="color:white;margin-left:-5px">X</B></button>
                                        <!-- <h3 id="">Update Guest<//?php echo $row['gid']; ?></h3> -->
                                    </div>
                                    <div class="modal-body">
                                                <form class="form-group formedit"  method="POST">
                                                <div class="row"> <div  class="col-md-6"> <label class="col pull-left">ID:</label>     <input type="nomber" name="gid" id="#edit-<?php echo $row['gid']; ?>" class="form-control" value="<?php echo $row['gid']; ?>"><br></div>
                                                      <div class="col-md-6"><label class="col pull-left">Room Number:</label>  <input type="text" name="rno" id="#edit-<?php echo $row['gid']; ?>" class="form-control" value="<?php echo $row['rno']; ?>"><br></div></div>
                                                <div class="row"> <div  class="col-md-6"> <label class="col pull-left">Floor:</label>     <input type="text" name="floor" id="#edit-<?php echo $row['gid']; ?>" class="form-control" value="<?php echo $row['floor']; ?>"><br></div>
                                                      <div class="col-md-6"><label class="col pull-left">Room Type:</label><input type="text" name="room_type" id="#edit-<?php echo $row['gid']; ?>" class="form-control" value="<?php echo $row['room_type']; ?>"><br></div></div>
                                                <div class="row"> <div  class="col-md-6"> <label class="col pull-left">Room Status:</label> <input type="text" name="room_status" id="#edit-<?php echo $row['gid']; ?>" class="form-control" value="<?php echo $row['room_status']; ?>"><br></div>
                                                     <div class="col-md-6"><label class="col pull-left">Room Price:</label> <input type="text" name="room_price" id="#edit-<?php echo $row['gid']; ?>" class="form-control" value="<?php echo $row['room_price']; ?>"><br></div></div>
                                                   
                                                    <button style="width:100%; margin: 15px 0px 0px 0px;" type="submit" class="btn btn-success" name="update" id="#edit-<?php echo $row['gid']; ?>">  Update </button>
                                        </form>
                             </td>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <td>
                       <a href="?idDelete=<?php echo $row['gid'] ?>"><button name="Delete" type="submit" class="btn btn-danger"><i class="fa fa-trash fa-lg"></i> Delete</button></a>
                    </td>
                </tr> <?php 
            }
    }
else{
 echo 'Data Not Found';}
echo "</table></div>";
?> 
  </body>
</html>