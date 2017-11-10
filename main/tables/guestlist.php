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
$gaddress="";
$gcountry="";
$gcity="";
$gdate="";
$gphone="";
$gemail="";
$ggender="";


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
//$conn = mysqli_connect($host,$user,$pswd,$db);//(MySQLi Procedural)
$conn = new mysqli($host,$user,$pswd,$db);//(MySQLi Object-oriented)


function getData()
{
$data =array();
$data[0] =$_POST['gid'];
$data[1] =$_POST['gfullname'];
$data[2] =$_POST['gaddress'];
$data[3] =$_POST['gcountry'];
$data[4] =$_POST['gcity'];
$data[5] =$_POST['gdate'];
$data[6] =$_POST['gphone'];
$data[7] =$_POST['gemail'];
$data[8] =$_POST['ggender'];




return $data;
}

if (isset($_POST['searchid'])) {
    $info = getData();
    $sql = "SELECT *FROM guest WHERE gid= '$info[0]'";
    $search_result =mysqli_query($conn,$sql);
if (mysqli_num_rows($search_result)){
 while ($rows=mysqli_fetch_array($search_result)) {

$gid=$rows['gid'];
$gfullname=$rows['gfullname'];
$gaddress=$rows['gaddress'];
$gcountry=$rows['gcountry'];
$gcity=$rows['gcity'];
$gdate=$rows['gdate'];
$gphone=$rows['gphone'];
$gemail=$rows['gemail'];
$ggender=$rows['ggender'];
}
}
}

// Update Command
// sql to delete a record
if (isset($_POST['update'])) {
      $info = getData();
$sql = "UPDATE guest SET gfullname='$info[1]',gaddress='$info[2]', gcountry='$info[3]', gcity='$info[4]', gdate='$info[5]', gphone='$info[6]', gemail='$info[7]', ggender='$info[8]' WHERE gid='$info[0]'";
if ($conn->query($sql)===TRUE) {
    echo"Record updated successfully";
}
else {
    echo" Error updating record".mysql_error($conn);
}
}
if(isset($_GET['Delete'])){
    $sql = "SELECT * FROM guest ";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    $gid=$row['gid'];
    //$idDelete = $_GET['idDelete'];
    $sql = "DELETE FROM guest WHERE  gid='$gid'";
    if($conn->query($sql)===TRUE) {
        header("location: search.php");
    }
    else { ?>
        <script>
            alert("failed to delete");
            window.location.href='search.php';
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
  </head>
  <body>
  <div class="container">
  <div class="row">
  <div class="col-md-12">
<?php
    $conn = new mysqli("localhost", "root", "", "simpledata");
    if(isset($_POST["query"]))
    {
        $search = mysqli_real_escape_string($conn, $_POST["query"]);
        $query = " SELECT * FROM guest  WHERE gid LIKE '%".$search."%' OR gfullname LIKE '%".$search."%'  OR gphone LIKE '%".$search."%'  OR gemail LIKE '%".$search."%'";
    }
    else
    {
        $query = " SELECT * FROM guest ORDER BY gid ";
    }
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0)
    { ?>
        <div class="table-responsive">
            <table class="table table-striped table-condensed table-hover table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Address</th>
                    <th>State</th>
                    <th>City</th>
                    <th>Date</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Gender</th>
                    
                    <th><center> Action </center> </th></tr>       
        <?php
            while($row = mysqli_fetch_array($result)){ ?>
                <tr>
                    <td><?php echo $row["gid"] ?></td>
                    <td><?php echo $row["gfullname"] ?></td>
                    <td><?php echo $row["gaddress"] ?></td>
                    <td><?php echo $row["gcountry"] ?></td>
                    <td><?php echo $row["gcity"] ?></td>
                    <td><?php echo $row["gdate"] ?></td>
                    <td><?php echo $row["gphone"] ?></td>
                    <td><?php echo $row["gemail"] ?></td>
                    <td><?php echo $row["ggender"] ?></td>
                    <td>
                       <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#edit-<?php echo $row['gid']; ?>" id=""><i class="fa fa-pencil fa-lg"></i> Edit</button>
                        <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#edit-<?php echo $row['gid']; ?>" id=""><i class="fa fa-pencil fa-lg"></i> delete</button>
                        <div class="modal fade" role="dialog" id="edit-<?php echo $row['gid']; ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <!-- <h3 id="">Update Guest<?php echo $row['gid']; ?></h3> -->
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-group"  method="POST">
                                        <input type="text" name="gid" id="#edit-<?php echo $row['gid']; ?>" class="form-control" value="<?php echo $row['gid']; ?>"><br>
                                            <input type="text" name="gfullname" id="#edit-<?php echo $row['gid']; ?>" class="form-control" value="<?php echo $row['gfullname']; ?>"><br>
                                            <input type="text" name="gaddress" id="#edit-<?php echo $row['gid']; ?>" class="form-control" value="<?php echo $row['gaddress']; ?>"><br>
                                            <input type="text" name="gcountry" id="#edit-<?php echo $row['gid']; ?>" class="form-control" value="<?php echo $row['gcountry']; ?>"><br>
                                            <input type="text" name="gcity" id="#edit-<?php echo $row['gid']; ?>" class="form-control" value="<?php echo $row['gcity']; ?>"><br>
                                            
                                            <input type="date" name="gdate" id="#edit-<?php echo $row['gid']; ?>" class="form-control" value="<?php echo $row['gdate']; ?>"><br>
                                            <input type="text" name="gphone" id="#edit-<?php echo $row['gid']; ?>" class="form-control" value="<?php echo $row['gphone']; ?>"><br>
                                            <input type="text" name="gemail" id="#edit-<?php echo $row['gid']; ?>" class="form-control" value="<?php echo $row['gemail']; ?>"><br>
                                            <input type="text" name="ggender" id="#edit-<?php echo $row['gid']; ?>" class="form-control" value="<?php echo $row['ggender']; ?>"><br>
                                            <button style="width:100%; margin: 15px 0px 0px 0px;" type="submit" class="btn btn-success" name="update" id="#edit-<?php echo $row['gid']; ?>">  Update </button>
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
                </tr> <?php 
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
       </div>
       </div>
       </div>
