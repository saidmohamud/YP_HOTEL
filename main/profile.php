
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="wagad/js/bootstrap.min.js"></script>
    <title>YAASMIIN | HOTEL</title>
    <?php include("Linkfooter.php"); ?>
    <?php include("links.php"); ?>
    <style>
.form-group.internal {
  margin-bottom: 0;
}



.panel-body {  
  
  

  font: 600 15px "Open Sans",Arial,sans-serif;
}

label.control-label {
  font-weight: 600;
  color: #777;  
}

</style>
    
</head>
<body class="hold-transition skin-purple-light  sidebar-mini" onload="timing()">
   
    
       
      <div class="wrapper">

      <?php include("header.php"); ?>
        <?php include("menu.php"); ?>
        <?php include("dashboard.php"); ?>
        <section class="content-header">
        <div class=" col-md-9 col-offset-3 ">
          <div class="text-left">
            <ol class="breadcrumb">
              <li><a href="adminpanel.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active">Account Details</li>
            </ol>
            </div>
            </div>
          </section>
      <div class="container" style="margin-left:-240px; margin-top:-80px">
     <!-- Full Width Column -->
     <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
      
	
          <!-- Main content -->
          <section class="content">
            <div class="row">
	      <div class="col-md-8 col-offset-4">
            
                  <h3 class="">Update Account Details</h3>
                
                  <form id = "formE"method="post" action="profile_update.php" onsubmit="return myFunction()">
  
                 
				  <div class="form-group">
                    <label for="date">Username</label>
                    <div class="input-group col-md-8 col-offset-4">
                      <input type="text" class="form-control pull-right" value="<?php echo $row['username'];?>" name="username" placeholder="Username" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
				  <div class="form-group">
                    <label for="date">Change Password</label>
                    <div class="input-group col-md-8 col-offset-4">
                      <input type="password" class="form-control pull-right" id="password" name="password" placeholder="Type new password">
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
				  <div class="form-group">
                    <label for="date">Confirm New Password</label>
                    <div class="input-group col-md-8 col-offset-4">
                      <input type="password" class="form-control pull-right" id="cfmPassword" name="newpassword" placeholder="Reenter new password">
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
				  <hr>
					<div class="form-group">
                    <label for="date">Enter Old Password to confirm changes</label>
                    <div class="input-group col-md-8 col-offset-4">
                      <input type="password" class="form-control pull-right" id="date" name="passwordold" placeholder="Type old password" required>
                    </div><!-- /.input group -->
					
                  </div><!-- /.form group -->
				  
                  <div class="form-group">
                    <div class="input-group">
                      <input class = "btn btn-primary" type="submit" value="Submit">
					             <button class="btn" id="daterange-btn">
                         Clear
                      </button>
                    </div>
                  </div><!-- /.form group -->
				</form>	
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col (right) -->
            
            
			
          </div><!-- /.row -->
	  
            
          </section><!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
   
    </div><!-- ./wrapper -->
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
	<script>
function myFunction() {
    var pass1 = document.getElementById("password").value;
    var pass2 = document.getElementById("cfmPassword").value;
    var ok = true;
    if (pass1 != pass2) {
        alert("Passwords Do not match");
        document.getElementById("password").style.borderColor = "#E34234";
        document.getElementById("cfmPassword").style.borderColor = "#E34234";
        ok = false;
    }
    else {
        alert("Passwords Match!!!");
    }
    return ok;
}
	</script>
     </div>
    </div><!-- ./wrapper -->
     
  
                   
      
    
        <?php include("dashFooter.php"); ?>    
    </div>
    <?php include("footer.php"); ?>




</body> 
</html>