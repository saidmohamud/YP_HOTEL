<?php
include "tables/config.php";
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
  background:#DCDCDC;
}
      tr:nth-child(even) {background: #FFCE43}
      .table-responsive table tr:nth-child(odd) {background: #2ecc71}
      </style>
</head>
<body class="hold-transition skin-purple-light  sidebar-mini" onload="timing()">
<?php
    $conn = new mysqli("localhost", "root", "", "simpledata");
    if(isset($_POST["query"]))
    {
        $search = mysqli_real_escape_string($conn, $_POST["query"]);
        $query = " SELECT * FROM dbiling  WHERE rno LIKE '%".$search."%'  OR floor LIKE '%".$search."%'  OR rtype LIKE '%".$search."%'";
    }
    else
    {
        $query = " SELECT * FROM dbiling ORDER BY gid ";
    }
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0)
    { ?>
        <div class="table-responsive">
            <table class="table table-striped table-condensed table-hover table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Fullname</th>
                    <th>Room No</th>
                    <th>Floor</th>
                    <th>Room Type</th>
                    <th>Date Paid</th>
                    <th>Cost Paid</th>
                    <th>Action</th>
                    <th>Action</th>
                  
                     </tr> 
        <?php
            while($row = mysqli_fetch_array($result)){ ?>
                <tr>
                    <td style="background-color:#ff0080", color:"black"><?php echo $row["gid"] ?></td>
                    <td><?php echo $row["gfullname"] ?></td>
                    <td><?php echo $row["rno"] ?></td>
                    <td><?php echo $row["floor"] ?></td>
                    <td><?php echo $row["rtype"] ?></td>
                    <td><?php echo $row["gdate"] ?></td>
                    <td><?php echo $row["paid"] ?></td>
                   
                    <td>
                       <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#edit-<?php echo $row['gid']; ?>" id=""><i class="fa fa-pencil fa-lg"></i> Edit</button>
                       <div class="modal fade" role="dialog" id="edit-<?php echo $row['gid']; ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color:blue">
                                    <button type="button" class="close" data-dismiss="modal" style="margin-top:-10px">&times;<B style="color:white;margin-left:-5px">X</B></button>
                                        <!-- <h3 id="">Update Guest<//?php echo $row['gid']; ?></h3> -->
                                    </div>
                                    <div class="modal-body">
                                                <form class="form-group formedit"  method="POST">
                                                <div class="row"> <div  class="col-md-5"> <label class="col pull-left">ID:</label>     <input type="nomber" name="gid" id="#edit-<?php echo $row['gid']; ?>" class="form-control" value="<?php echo $row['gid']; ?>"><br></div>
                                                      <div class="col-md-5"><label class="col pull-left">Fullname:</label>     <input type="text" name="gfullname" id="#edit-<?php echo $row['gid']; ?>" class="form-control" value="<?php echo $row['gfullname']; ?>"><br></div></div>
                                                <div class="row"> <div  class="col-md-5"> <label class="col pull-left">Room Number:</label>     <input type="text" name="rno" id="#edit-<?php echo $row['gid']; ?>" class="form-control" value="<?php echo $row['rno']; ?>"><br></div>
                                                      <div class="col-md-5"><label class="col pull-left">Floor:</label> <input type="text" name="floor" id="#edit-<?php echo $row['gid']; ?>" class="form-control" value="<?php echo $row['floor']; ?>"><br></div></div>
                                                <div class="row"> <div  class="col-md-5"> <label class="col pull-left">Room Type:</label>      <input type="text" name="rtype" id="#edit-<?php echo $row['gid']; ?>" class="form-control" value="<?php echo $row['rtype']; ?>"><br></div>
                                                       <div class="col-md-5"><label class="col pull-left">Date Paid:</label>  <input type="text" name="gdate" id="#edit-<?php echo $row['gid']; ?>" class="form-control" value="<?php echo $row['gdate']; ?>"><br></div></div>
                                               <div class="row"> <div  class="col-md-5 col-md-offset-3" ><label class="col pull-left">Cost paid</label>     <input type="text" name="paid" id="#edit-<?php echo $row['gid']; ?>" class="form-control" value="<?php echo $row['paid']; ?>"><br></div></div>
                                                    
                                                    <button style="width:100%; margin: 15px 0px 0px 0px;" type="submit" class="btn btn-success" name="update" id="#edit-<?php echo $row['gid']; ?>">  Update </button>
                                    
                                        </form>
                             </td>
                                    </div>
                              
                                
                                </div>
                            </div>
                        </div>
                        <td>
                       <a href="?idDelete=<?php echo $row['gid'] ?>"><button name="idDelete" type="submit" class="btn btn-danger"><i class="fa fa-trash fa-lg"></i> Delete</button></a>
                    </td>
                </tr> <?php 
            }
    }
else{
 echo 'Data Not Found';}
echo "</table></div>";
?>















<!-- 
			<table class="table table-bordered table-stripped table-condensed">
				<tr>
					<th>ID</th>
					<th>Full Name</th>
					<th>Address</th>
					<th>Country</th>
					<th>City</th>
                    <th>Date</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Gender</th>
				</tr> -->
	 
		 
		</div>


		  </div>  


                </div>
                </div>



                </div>

           </div>
 
      </div>
      

   

     
      </div>
    </div>
 

     
    </div><!-- ./wrapper -->
     
  
                   




    </body>


 
</html>