<?php
    if($_POST['request'])
    {
     $request=$_POST['request'];
     $conn =mysqli_connect("localhost", "root", "", "simpledata");
     $query = " SELECT * FROM roomno WHERE rno='$request'";
    $result = mysqli_query($conn,$query);
   echo '<table border="1">';
   echo '<tr>';
    echo '<th>Room No </th>'; 
    echo '<th>Room Type</th>';
   echo '<th>Room status </th>';
   echo '</tr>';
  while($output=mysqli_fetch_assoc($result))
            {
               echo '<tr>';
   echo '<td id="tt" >'.$output['rno'].'</td>';
   echo '<td id="tt" >'.$output['room_type'].'</td>';
   $colored ='';
   $colored = $output['room_status'];
   if($colored == 'Accupied'){
      $colored = 'acupay';
   }
      if($colored == 'Available'){
      $colored = 'available';
   }
   echo '<td id="qq"><span class="'.$colored.'">'.$output['room_status'].'</span></td>';
   echo '</tr>'; 
            };
 echo '</table>';
 mysqli_close($conn);
    };
?>