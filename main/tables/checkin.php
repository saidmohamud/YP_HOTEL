<?php
include "tables/config.php";
$gid="";
if (isset($_GET['search'])) {
$gid= $_GET['search'];
}
?>
<?php
include "config.php";
session_start();
if(!isset($_SESSION['username'])){
header('location: login.php');
}
?>
<?php include("roomcon.php"); ?>
 <div class="container-fluid">
	<div class="col-md-9 col-md-offset-2 ">
	<div class="row">
  <div class="panel panel-primary">
			<div class="panel-heading"><center> Checkin</center> 
			</div>
			<div class="panel-body">
				<form  class="form-horizontal"  id="guest-form"  method="post" >
										
						<div class="row">
                      <div class="col-md-10 col-md-offset-1">
                      	<label style="color:blue" control-label" for="gfullname"">Fullname*</label>
                        <div class="control-group">
                         <select style="color:black" id="gfullname" name="gfullname"  class="form-control" >
                                 <?php
                                            $sql = "select gfullname  from guest";
                                            $result = $conn->query($sql);
                                            if($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['gfullname']; ?>"><?php echo $row['gfullname']; ?></option>
                                            <?php }
                                            }
                                        ?>
                                   
                                  </select> 
                        </div>
                        </div>
                        </div>
                        <br>
                       <div class="row">
                        <div class="col-md-4  col-md-offset-4">
								<label style="color:blue" >check in date*</label>
                <div class="control-group">
								<input style="color:black" type="date" name="gdate" placeholder="Enter datae Code Here.." class="form-control" >
							</div>	
              </div>
                      </div>	
                       <br>
            <br>
				
						<div class="row">
            <div class="col-sm-3 col-md-offset-2 ">
								<label style="color:blue" control-label" for="city"">Room Number*</label>
                
                <select style="color:black" id="rno" name="rno"  class="form-control" >
                
                                 <?php
                                            $sql = "SELECT rno  From roomno";
                                            $result = $conn->query($sql);
                                            if($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) { ?>
                                            <option > <?php echo $row['rno']; ?></option>
                                            <?php }
                                            }
                                        ?>
                                   
                                  </select>
								
							</div>
             
           
              <div class="col-sm-3 col-md-offset-2  ">
								<label style="color:blue" control-label" for="floor"">Floor*</label>
								<div class="control-group">
                
                                 <input style="color:black" type="text"  id="floor" name="floor" placeholder="Enter floor no.."   class="form-control" > 
                                </div>
							</div>
                                   </div>
                    
            <br>
            <br>

            <div class="row">
					<div class="col-sm-3 col-md-offset-2">
					<div class="form-group">
						<label  style="color:blue" control-label" for="room_price"">Room Type*</label>
						
                       <select style="color:black" id="rtype" name="rtype"  class="form-control" >
                                <?php
                                            $sql = "select rtype  from rooms";
                                            $result = $conn->query($sql);
                                            if($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['rtype']; ?>"><?php echo $row['rtype']; ?></option>
                                            <?php }
                                            }
                                        ?>
                                   
                                  </select>             
					</div>		
					
           
            </div>
            
            <div class="col-sm-3 col-md-offset-2">
					<div class="form-group">
						<label style="color:blue" control-label" for="room_price"">Room Price*</label>
					
          <input style="color:black" type="text" id="price" name="rprice" placeholder="Enter room price.."   class="form-control" > 
                              
					</div>		
					
            </div>
            
            </div>
                      <div>
                       <br>
            <br>

                      <div class="form-group">
                        <div class="col-md-8  col-md-offset-4">
                         
						  
                           <button style="width:50%; margin: 15px 0px 0px 0px;" type="submit" name="register" class="btn btn-lg btn-success">Rigester</button>	
                        </div>
                        
                      </div>

				
				</form> 
        </div>
				</div>

	</div>
	</div>
        
    </div>

<script>

$(document).ready(function(){
          $("#rno").on("change", function(){
            
          var ItemID = $(this).val();
          // var roomtyp = $(this).val();
          // var roompr = $(this).val();
          
          if(ItemID){
              $.get(
                  "rno.php",
                  {rno: ItemID},
                  function(data){
                      $("input[name=floor]").val(data);
                   
                  }
              );
              
          }
              else{
                  $("#rno").html("enter");
              }
      });
      });

      </script>

      <script>
      $(document).ready(function(){
          $("#rtype").on("change", function(){
            
          var ItemID = $(this).val();
       
          
          if(ItemID){
              $.get(
                  "type.php",
                  {rtype: ItemID},
                  function(data){
                      $("input[name=rprice]").val(data);
                   
                  }
              );
              
          }
              else{
                  $("#rno").html("enter");
              }
      });
      });
      </script>


