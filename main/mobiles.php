<?php
include "tables/config.php";
session_start();
if(!isset($_SESSION['username'])){
    header('location: login.php');
}
?>
<?php
    if(isset($_GET['idDelete'])){
        $idDelete = $_GET['idDelete'];
        $sql = "delete from mobile_access where gid='$idDelete'";
        if($conn->query($sql)===true) {
            header("location: mobile.php");
        }
        else { ?>
            <script>
                alert("failed to delete");
                window.location.href='mobile.php';
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
  background:#DCDCDC;
}
      tr:nth-child(even) {background: #FFCE43}
      .table-responsive table tr:nth-child(odd) {background: #2ecc71}
      </style>
</head>
<body class=" nav-mad">

<?php
    $conn = new mysqli("localhost", "root", "", "simpledata");
    if(isset($_POST["query"]))
    {
        $search = mysqli_real_escape_string($conn, $_POST["query"]);
        $query = " SELECT * FROM mobile_access  WHERE gid LIKE '%".$search."%' OR floor LIKE '%".$search."%'  OR rno LIKE '%".$search."%'  OR rtype LIKE '%".$search."%'";
    }
    else
    {
        $query = " SELECT * FROM mobile_access ORDER BY gid ";
    }
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0)
    { ?>
        <div class="table-responsive">
            <table class="table table-striped table-condensed table-hover table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Fullname</th>
                    <th>Date</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>Floor</th>
                    <th>Room No</th>
                    <th>Room Type</th>
                    <th>Room Price</th>
                    <th>Action</th>
                    
                    </tr>       
        <?php
            while($row = mysqli_fetch_array($result)){ 
                $gfullname="";
                $gfullname= $row["gfullname"];
                $gdate="";
                $gdate= $row["gdate"];
                $gaddress="";
                $gaddress= $row["gaddress"];
                $gphone="";
                $gphone= $row["gphone"];
                $ggender="";
                $ggender= $row["ggender"];
                $floor="";
                $floor= $row["floor"];
                $rno="";
                $rno= $row["rno"];
                $rtype="";
                $rtype= $row["rtype"];
                $rprice="";
                $rprice= $row["rprice"];
                ?>
                
                <tr>
                    <td style="background-color:#ff0080", color:"black" ><?php echo $row["gid"] ?>
                    </td>
                    <form method="POST" action="">
                    <td ><?php echo $gfullname;  ?></td>
                    <td ><?php echo  $gdate; ?></td>
                    <td ><?php echo $gaddress; ?></td>
                    <td ><?php echo $gphone;?></td>
                    <td ><?php echo $ggender;?></td>
                    <td ><?php echo $floor; ?></td>
                    <td><?php echo $rno; ?></td>
                    <td><?php echo $rtype; ?></td>
                    <td><?php echo $rprice; ?></td>
                   
                                   
                                
                    <td>    
                    <a href="mobiledata.php?idregister=<?php echo $row['gid'] ?>"><button name="idregister" type="submit" class="btn btn-primary"><i class="fa fa-circle fa-lg"></i> Confirm</button></a>  
                   
                    </td>  
                       </form>
                </tr> <?php 
            }
    }
else{
 echo 'Data Not Found';}
echo "</table></div>";
?>
 
</html>