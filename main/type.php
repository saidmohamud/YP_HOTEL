<?php
    if(isset($_GET["rtype"])){
        include("tables/roomconn2.php");
        $invoicesID = $_GET["rtype"];
        $sql = "select rprice from rooms where rtype = '$invoicesID'";
        $do = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($do);
        if($count > 0) {
            while($row = mysqli_fetch_array($do)) {
                echo $row["rprice"];
                
            }
        }
    }
    // if(isset($_GET["checkname"])){
    //    $conn = mysqli_connect("localhost", "root", "", "simpledata");
    //     $ab = $_GET["checkname"];
    //     $sql = "select gfullname from room where gfullname = '$ab'";
    //     $do = mysqli_query($conn, $sql);
    //     $count = mysqli_num_rows($do);
    //     if($count > 0) {
    //         echo("already exists");  
          
    //     } 
    //     else {
    //         echo("u can register sir");
    //          }
    // }
?>