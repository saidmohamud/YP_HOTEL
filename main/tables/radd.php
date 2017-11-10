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
<?php include("roomcon.php"); ?>





        

        <!-- /top navigation -->
        <div class="container">
            <div class="row">
              <div class="col-md-6 col-lg-offset-2 well">
                
                  <div class="x_title">
                    <h2>Room Form</h2>
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <form class="form-horizontal form-label-left input_mask" method="post" action="rsearch.php">
                    <div class="row">
                      <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                      	<label control-label" for="gfullname"">Fullname*</label>
                        
                         <select id="gfullname" name="gfullname"  class="form-control" required>
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
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      	<label control-label" for="floor"">Floor*</label>
                        
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
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label control-label" for="floor"">Room Number*</label>
                     <select id="rno" name="rno"  class="form-control" required>
                                   <?php
                                            $sql = "select rno  from rooms";
                                            $result = $conn->query($sql);
                                            if($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['rno']; ?>"><?php echo $row['rno']; ?></option>
                                            <?php }
                                            }
                                        ?>
                                   
                                       

                                  </select> 
                      </div>

                      <div class="col-md-6  form-group has-feedback">
                      <label control-label" for="floor"">Room Type*</label>
                        <select id="rtype" name="rtype"  class="form-control" required>
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

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                       <label control-label" for="floor"">Room Price*</label>
                        <select id="rprice" name="rprice"  class="form-control" required>
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

                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-">
                         
						  
                           <button  type="submit" name="register" class="btn btn-lg btn-info">Rigester</button>	
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
                 </div>
                </div>
                 </div>
                

      

