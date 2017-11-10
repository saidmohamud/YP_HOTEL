<?php
    if(isset($_GET["rno"])){
        include("tables/roomconn2.php");
        $invoicesID = $_GET["rno"];
        $sql = "select floor from roomno where rno = '$invoicesID'";
        $do = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($do);
        if($count > 0) {
            while($row = mysqli_fetch_array($do)) {
                echo $row["floor"];  
            }
        }
    }
?>