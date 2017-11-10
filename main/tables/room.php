<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"simpledata");
?>
<?php
include "config.php";
session_start();
if(!isset($_SESSION['username'])){
    header('location: login.php');
}

?>
<?php include("roomconn2.php"); ?>
 <div class="container-fluid">
	<div class="row">
    <div class="col-lg-7 col-lg-offset-4 ">
  <div class="panel panel-primary">
			<div class="panel-heading"><center> Rooms</center> 
			</div>
			<div class="panel-body">
				<form class="form-horizontal"  id="guest-form"  method="post" action="room.php">
										
						<div class="row">
						<div class="col-md-5 col-md-offset-3">
								<label control-label" for="state"">Floor*</label>
								<div class="control-group">
                                  <select id="floor" name="floor"  class="form-control" required>
                                     <?php
                                            $sql = "select floor  from rooms";
                                            $result = $conn->query($sql);
                                            if($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['floor']; ?>"><?php echo $row['floor']; ?></option>
                                            <?php }
                                            }
                                        ?>
                                  </select> 
                                </div>
							</div>	
              </div>
              <br>
              <div class="row">
						 <div class="col-sm-3 col-md-offset-2 ">
								<label control-label" for="city"">Room Number*</label>
								<div class="control-group">
              
								<input type="number" name="rno" placeholder="Enter room no.." class="form-control" required>
                                </div>
							</div>
								 <div class="col-sm-3 col-md-offset-2 ">
					<div class="form-group">
						<label control-label" for="rprice"">Room Status*</label>
						<select id="room_status" name="room_status"  class="form-control" required>
                                    <?php
                                            $sql = "select rstatus  from hrooms";
                                            $result = $conn->query($sql);
                                            if($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) { ?>
                                            <option ><?php echo $row['rstatus']; ?></option>
                                            <?php }
                                            }
                                        ?>
                                  </select> 
					</div>		
            </div>
              </div>
              <br>
            <div class="row">
				 <div class="col-sm-3 col-md-offset-2 ">
					<div class="form-group">
						<label control-label" for="rprice"">Room Type*</label>
						<select id="room_type" name="room_type"  class="form-control" required>
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
            <div class="col-sm-3 col-md-offset-2 ">
					<div class="form-group">
						<label control-label" for="rprice"">Room Price*</label>
						<select id="rprice" name="room_price"  class="form-control" required>
                                   <?php
                                            $sql = "select rprice  from rooms";
                                            $result = $conn->query($sql);
                                            if($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['rprice']; ?>"><?php echo $row['rprice']; ?></option>
                                            <?php }
                                            }
                                        ?>
                                  </select> 
                              </div>		
                                </div>
                                </div>
				      <div class="row">
                      <div class="form-group">
                        <div class="col-md-8  col-md-offset-4">
                           <button style="width:50%; margin: 15px 0px 0px 0px;" type="submit" name="register" class="btn btn-lg btn-primary">Rigester</button>	
                        </div>
                      </div>
                      </div>
				</form> 
        </div>
				</div>
	</div>
	</div>
        
    </div>


