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
<?php include("guestcon.php"); ?>
 
 
 <div class="container"> 
    <!-- <h1 class="well">Gust Regestration </h1> -->
	<div class="col-lg-8 col-lg-offset-4 ">
	<div class="row">
				<form  id="guest-form"  method="post" action="index.php">
					<div class="col-sm-8">
				
        		<div class="row">
					<div class="col-sm-12 form-group">
								<label control-label" for="name"">Full Name*</label>
								<input type="text" id="name" name="gfullname" pattern="[a-zA-Z]{1,35}+[a-zA-Z]{1,35}" placeholder="Enter your Full Name Here.." class="form-control" required>
							</div>
						</div>					
						<div class="form-group">
							<label control-label" for="address"">Address*</label>
							<input type="text" id="address"  name="gaddress" placeholder="Enter Address Here.." rows="3" class="form-control" required>
						</div>	
						<div class="row">
							<div class="col-sm-3 form-group">
								<label control-label" for="state"">State*</label>
								<div class="control-group">
                                  <select id="state" name="gcountry"  class="form-control" required>
                                     <?php
                                            $sql = "select name  from states";
                                            $result = $conn->query($sql);
                                            if($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                                            <?php }
                                            }
                                        ?>
                                    


                                       

                                  </select> 
                                </div>
							</div>	
							<div class="col-sm-4 form-group">
								<label control-label" for="city"">city*</label>
								<div class="control-group">
                                  <select id="city" name="gcity"  class="form-control" required>
                                <?php
                                            $sql = "select name  from pob";
                                            $result = $conn->query($sql);
                                            if($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                                            <?php }
                                            }
                                        ?>
                                  </select> 
                                </div>
							</div>
							<div class="col-sm-5 form-group">
								<label >Date of Regestration*</label>
								<input type="date" name="gdate" placeholder="Enter datae Code Here.." class="form-control" required>
							</div>		
						</div>
            <div class="row">
					<div class="col-sm-12 form-group">
					<div class="form-group">
						<label control-label" for="phone"">Phone Number*</label>
						<input type="number"  id="phone" name="gphone" placeholder="Enter Phone Number Here.." class="form-control" required>
					</div>		
					<div class="form-group">
						<label control-label" for="email"">Email Address</label>
						<input type="Email" id="email" name="gemail" placeholder="Enter Email Address Here.." class="form-control">
            <label class="row">Gender*:</label>
            </div>
            </div>
            </div>
  <div class="form-group">
  <div class="row"> 
       <div class="col-sm-2">
            <label class="radio-inline" control-label" for="ggender-male"">
                 <input name="ggender" id="ggender-male" value="Male" type="radio" required/>Male
             </label>
        </div>
      
        <div class="col-sm-2">
             <label class="radio-inline"  control-label" for="ggender-female"">
                  <input name="ggender" id="ggender-female" value="Female" type="radio" required/>Female
             </label>
         </div>
   </div>
   </div>
				<div class="row">
					<div class="col-sm-6">
					<div class="form-group">
					<button  type="submit" name="register" class="btn btn-lg btn-info">Rigester</button>	
								</div>
                </div>
                <div class="col-sm-6">
                <button  type="reset" name="reset" class="btn btn-lg btn-info">Reset</button>
                </div>
				</div>
				</form> 
        
				</div>

	</div>
	</div>
  
  
  
	







