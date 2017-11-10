<?php
    if(isset($_GET["floor"])){
        include("roomconn2.php");
        $rid = $_GET["floor"];
        $sql = "select rno from roomno where rid = '$rid'";
        $do = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($do);
        if($count > 0) {
            while($row = mysqli_fetch_array($do)) {
                echo $row["rno"];
            }
        }
    }
?>