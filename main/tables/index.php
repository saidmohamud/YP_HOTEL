
<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>YAASMIIN</title>
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
  
    
</head>
<body class="hold-transition skin-red nav-mad">
    <div class="wrapper">
    
        <?php include("header.php"); ?>
        <?php include("menu.php"); ?>
        <div>
		<?php include("dashboard.php"); ?>
      <br>
      <br>
   
      <?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"simpledata");
?>




<?php include("guestcon.php"); ?>





        


 <div class="container">
  
    <!-- <h1 class="well">Gust Regestration </h1> -->
	
	

<div class="row">
  <div class="col-lg-6 col-lg-offset-4 ">
  <div class="panel panel-primary">
			<div class="panel-heading"><center>Guest </center> 
	

		</div>
			<div class="panel-body">
				<form  id="guest-form"  method="post" action="index.php">
		

		
				
        		<div class="row">
					<div class="col-sm-8 form-group">
	

							<label control-label" for="name"">Full Name*</label>
								

<input type="text" id="name" name="gfullname" pattern="[a-zA-Z\s]+" placeholder="Enter your Full Name Here.." class="form-control" required>
				

			</div>
						</div>	
            <div class="row">
            <div class="col-md-8">				
						<div class="form-group">
							<label control-label" 

for="address"">Address*</label>
							<input type="text" id="address"  name="gaddress" placeholder="Enter Address Here.." 

rows="3" class="form-control" required>
						</div>
            </div>	
            </div>
            
				

		<div class="row">
							<div class="col-sm-4 form-group">
						

		<label control-label" for="state"">State*</label>
								<div class="control-group">
             

                     <select id="state" name="gcountry"  class="form-control" required>
                                     <?php
                                       

     $sql = "select name  from states";
                                            $result = $conn->query($sql);
                                            if

($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) { ?>
                                            <option 

value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                                            <?php }
                                            

}
                                        ?>
                                    


                                       

                                  </select> 
      

                          </div>
							</div>	
							<div 

class="col-sm-4 form-group">
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
							<div class="col-sm-4 form-group">
				

				<label >Date of Regestration*</label>
                <div class="control-group">
							

	<input type="date" name="gdate" placeholder="Enter datae Code Here.." class="form-control" required>
							</div>	

	
						</div>
            </div>
            <div class="row">
					<div class="col-sm-6 

form-group">
					<div class="form-group">
						<label control-label" for="phone"">Phone 

Number*</label>
						<input type="number"  id="phone" name="gphone" placeholder="Enter Phone Number Here.." class="form-control" 

required>
					</div>
          </div>
          	
          	  
					<div class="col-sm-6 

form-group">
					<div class="form-group">
						<label control-label" for="email"">Email 

Address</label>
						<input type="Email" id="email" name="gemail" placeholder="Enter Email Address Here.." class="form-control" 

required>
          
            </div>
            </div>
            </div>
              <label class="row">Gender:</label>
  <div class="form-group">
  <div class="row"> 
  
       <div class="col-sm-2">
            <label class="radio-inline" control-label" for="ggender-male"">
                 <input name="ggender" id="ggender-male" 

value="Male" type="radio" required/>Male
             </label>
        </div>
      
        <div class="col-sm-2">
             <label class="radio-inline"  control-label" 

for="ggender-female"">
                  <input name="ggender" id="ggender-female" value="Female" type="radio" required/>Female
             </label>
         </div>
   

</div>
   </div>
				<div class="row">
					<div class="col-sm-10 col-md-offset-2">
					

<div class="form-group">
					<button  style="width:100%; margin: 15px 0px 0px 0px;"   type="submit" name="register"  class="btn 

btn-lg btn-danger" >Rigester</button>	
								</div>
                </div>
               
			

	</div>
				</form> 
        </div>
        </div>
       
				</div>

	</div>
	</div>
        
 
<script 

type="text/javascript">
   $(document).ready(function (){
       var validator = $("#guest-form").bootstrapvalidator({
           feedbackIcons: {
            valid: 

"glyphicon glyphicon-ok",
            invalid: "glyphicon glyphicon-remove",
            validating: "glyphicon glyphicon-refresh",
           },
           
             

fields : {
                    email :{
                           message : "Email address is required",
                           validators : {
                        

     notEmpty : {
                               message : "please provide an email address"
                             },
                              stringLength: 

{
                                min : 6,
                                max : 35,
                                message: " Email address must bee between 6 and 35 

charecters long"
                              },

                           }
                    },

                  state :{
                    validators : {
          

            greaterThan : {
                        value: 1,
                        message: "state is required"
                      }
                    }
            

      } 

             }

       });
validator.on("success.form.bv", function (e) {
  e.preventDefault();
  $("#guest-form").addclass("hidden");
   

$("#confirmation").removeclass("hidden");
});
   });


</script>








      
</div> 

    </div>
    <?php include("dashfooter.php"); ?>
    <?php include("footer.php"); ?>
    
</body> 
</html>
