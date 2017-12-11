<?php
$host ="localhost";
$user = "root";
$pswd = "";
$db = "simpledata";
$gid="";
$gid="";
$gfullname="";
$gdate="";
$gaddress="";
$gphone="";
$ggender="";
$floor="";
$rno="";
$rtype="";
$rprice="";
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
//$conn = mysqli_connect($host,$user,$pswd,$db);//(MySQLi Procedural)
$conn = new mysqli($host,$user,$pswd,$db);//(MySQLi Object-oriented)
if($conn)
{
    echo "coonection success"."<br>";;;;;;;
}
else{
    echo "coonection failed";
}
if(isset($_GET['idDelete'])){
    $idDelete = $_GET['idDelete'];
    $sql1 = "SELECT * FROM room WHERE gid='$idDelete'";
    }
if(isset($_GET['idregister'])) {
    $idregister = $_GET['idregister'];
    echo($idregister)."<br>";
    $sql1 = "SELECT * FROM mobile_access WHERE gid='$idregister'";
    $result=$conn->query($sql1);
    $row=$result->fetch_assoc();
   $gfullname =$row['gfullname'];
    $gdate =$row['gdate'];
    $gaddress =$row['gaddress'];
    $gphone =$row['gphone'];
    $ggender =$row['ggender'];
    $floor =$row['floor'];
    $rno =$row['rno'];
    $rtype =$row['rtype'];
    $rprice =$row['rprice'];
    echo($gfullname)."<br>";
    echo($gdate)."<br>";
    echo($gaddress)."<br>";
    echo($gphone)."<br>";
    echo($ggender)."<br>";
    echo($floor)."<br>";
    echo($rno)."<br>";
    echo($rtype)."<br>";
    echo($rprice)."<br>";

    $sql = "INSERT INTO room (gfullname, gdate, gaddress, gphone, ggender, floor, rno, rtype, rprice) VALUES('$gfullname','$gdate','$gaddress','$gphone','$ggender','$floor','$rno','$rtype','$rprice')";
    if($conn->query($sql) === TRUE){
    header("location:mobile.php");
     }
     $query = "INSERT INTO guest (gfullname, gdate, rno, floor, rtype, rprice) values ('$gfullname','$gdate','$rno','$floor','$rtype','$rprice')";
     if($conn->query($query) === true){
       echo("inserted");
     }

     $query = "UPDATE roomno set room_status='Accupied' WHERE rno='$rno'";
        if($conn->query($query) === TRUE){
         echo("Data has been updated");
    }
    
    $query = "DELETE FROM mobile_access WHERE gid=".$idregister;
    if($conn->query($query) === true){
       // echo("Data has been updated");
    }
}

    ?>