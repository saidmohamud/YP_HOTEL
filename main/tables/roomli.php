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
$gid="";
$gfullname="";
$gdate="";
$floor="";
$rno="";
$rtype="";
$rprice="";
$rstatus="";




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
$data[7] =$_POST['rstatus'];





return $data;
}

if (isset($_POST['searchid'])) {
    $info = getData();
    $sql = "SELECT * FROM hrooms WHERE gid= '$info[0]'";
    $search_result =mysqli_query($conn,$sql);
if (mysqli_num_rows($search_result)){
 while ($rows=mysqli_fetch_array($search_result)) {

$gid=$rows['gid'];
$gfullname=$rows['gfullname'];
$gdate=$rows['gdate'];
$floor=$rows['floor'];
$rno=$rows['rno'];
$rtype=$rows['rtype'];
$rprice=$rows['rprice'];
$rstatus=$rows['rstatus'];
}
}
}

// Update Command
// sql to delete a record
if (isset($_POST['update'])) {
      $info = getData();
$sql = "UPDATE hrooms SET gfullname='$info[1]', gdate='$info[2]',floor='$info[3]', rno='$info[4]', rtype='$info[5]', rprice='$info[6]', rstatus='$info[7]' WHERE gid='$info[0]'";
if ($conn->query($sql)===TRUE) {
    echo"Record updated successfully";
}
else {
    echo" Error updating record".mysql_error($conn);
}
}



if(isset($_GET['Delete'])){
    $sql = "SELECT * FROM hrooms ";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    $gid=$row['gid'];
    //$idDelete = $_GET['idDelete'];
    $sql = "DELETE FROM hrooms WHERE  gid='$gid'";
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

    
    <style>
th{
	  background:gold;
	  color:white;
	  text-align:center;
      }
      td{
           background:white;
	  color:black;
	  text-align:center;
      }
      </style>

<?php
    $conn = new mysqli("localhost", "root", "", "simpledata");
    if(isset($_POST["query"]))
    {
        $search = mysqli_real_escape_string($conn, $_POST["query"]);
        $query = " SELECT * FROM hrooms  WHERE gid LIKE '%".$search."%' OR gfullname LIKE '%".$search."%'  OR floor LIKE '%".$search."%'  OR rno LIKE '%".$search."%'";
    }
    else
    {
        $query = " SELECT * FROM hrooms ORDER BY gid ";
    }
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0)
    { ?>
        <div class="table-responsive">
            <table class="table table-striped table-condensed table-hover table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Guest Full Name</th>
                    <th>Date</th>
                    <th>Floor</th>
                    <th>Room Number</th>
                    <th>Room Type</th>
                    <th>Room Price</th>
                    <th>Room Status</th>
                     <th>Action</th>
                      <th>Action</th>
                   </tr>       
        <?php
            while($row = mysqli_fetch_array($result)){ ?>
                <tr>
                    <td><?php echo $row["gid"] ?></td>
                    <td><?php echo $row["gfullname"] ?></td>
                    <td><?php echo $row["gdate"] ?></td>
                    <td><?php echo $row["floor"] ?></td>
                    <td><?php echo $row["rno"] ?></td>
                    <td><?php echo $row["rtype"] ?></td>
                    <td><?php echo $row["rprice"] ?></td>
                    <td><?php echo $row["rstatus"] ?></td>
                   
                    <td>
                       <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#edit-<?php echo $row['gid']; ?>" id=""><i class="fa fa-pencil fa-lg"></i> Edit</button>
                        <div class="modal fade" role="dialog" id="edit-<?php echo $row['gid']; ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-group"  method="POST">
                                        <input type="text" name="gid" id="#edit-<?php echo $row['gid']; ?>" class="form-control" value="<?php echo $row['gid']; ?>"><br>
                                            <input type="text" name="gfullname" id="#edit-<?php echo $row['gid']; ?>" class="form-control" value="<?php echo $row['gfullname']; ?>"><br>
                                             <input type="date" name="gdate" id="#edit-<?php echo $row['gid']; ?>" class="form-control" value="<?php echo $row['gdate']; ?>"><br>
                                             <input type="text" name="floor" id="#edit-<?php echo $row['gid']; ?>" class="form-control" value="<?php echo $row['floor']; ?>"><br>
                                             <input type="text" name="rno" id="#edit-<?php echo $row['gid']; ?>" class="form-control" value="<?php echo $row['rno']; ?>"><br>
                                             <input type="text" name="rtype" id="#edit-<?php echo $row['gid']; ?>" class="form-control" value="<?php echo $row['rtype']; ?>"><br>
                                             <input type="text" name="rprice" id="#edit-<?php echo $row['gid']; ?>" class="form-control" value="<?php echo $row['rprice']; ?>"><br>
                                             <input type="text" name="rstatus" id="#edit-<?php echo $row['gid']; ?>" class="form-control" value="<?php echo $row['status']; ?>"><br>
                                            <button style="width:100%; margin: 15px 0px 0px 0px;" type="submit" class="btn btn-success" name="update" id="#edit-<?php echo $row['gid']; ?>">Update</button>
                             
                                        </form>
                             </td>
                                    </div>
                              
                                
                                </div>
                            </div>
                        </div>
                        <td>
                      <form class="form-group" >  <a href="?idDelete=<?php echo $row['gid'] ?>"><button name="Delete" type="submit" class="btn btn-danger"><i class="fa fa-trash fa-lg"></i> Delete</button></a>
                      </form>
                    </td>
                </tr>
                <?php 
            }
    }
else{
 echo 'Data Not Found';}
echo "</table></div>";
?>		 
		</div>


		  </div>  


                </div>
                </div>



                </div>

           </div>
 
      </div>
      

   

     
      </div>
    </div>
 
   
 