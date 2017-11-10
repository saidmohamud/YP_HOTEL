<?php
    if(isset($_GET["room_type"])){
        include("roomconn2.php");
        $invoicesID = $_GET["room_type"];
        $sql = "select rprice from rooms where room_type= '$invoicesID'";
        $do = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($do);
        if($count > 0) {
            while($row = mysqli_fetch_array($do)) {
                echo $row["rprice"];
               
            }
        }
    }
?>