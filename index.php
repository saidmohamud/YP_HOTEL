<?php include('server.php') ?>
<!DOCTYPE html>
    <html lang="en">
      <head>
      
     
        <meta charset="utf-8">
        <title>LOGIN | YAASMIIN</title>
     
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/datepicker.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    
        <!-- Custom styles for this template -->
        <link href="css/sticky-footer-navbar.css" rel="stylesheet">
        <script src="js/ie.js"></script>
    <style>
    body {
      font: 11px/1.4em Verdana, Arial, Helvetica, sans-serif;
    }
    h1 {
      color:red;
      margin: 0px 0px 5px;
      padding: 0px 0px 3px;
      font: bold 18px Verdana, Arial, Helvetica, sans-serif;
      border-bottom: 1px dashed #E6E8ED;
    }
    #container1 {
        background-color: transparent;
      background-image:url(tablet.jpg);
      background-size:650px 750px;
      background-repeat:no-repeat;
      background-position:center;
    }
    
    .centered-form {
        margin-top: 121px;
        margin-bottom: 120px;
    }
    
    .centered-form .panel {
        background: rgba(255, 255, 255, 0.8);
        box-shadow: rgba(0, 0, 0, 0.3) 1px 4px 9px;
    }
    .style2 {
      font-size: xx-large;
      color: #FF0000;
    }
    body {
    background-image: url("backyaasmiin2.jpg");
    background-color: #cccccc;
    background-repeat:no-repeat;
    background-size: 100% 100%;
}
.modal-content {
    background-image: url("loginback.jpg");
    background-color: #cccccc;
    background-repeat:no-repeat;
    background-size: 100% 100%;
}
.btn-success{background-color:blue}
    </style>
      </head>
      <body>
    <p align="center">&nbsp;</p>
    <p align="center" class="style4">
    <img src="main/css/images/yaasmiin.png" style="height:160px"><img><br>
    <img src="main/css/images/welcome.png" style="height:90px; width:600px"><img><br>
       </p>
    <p style="color:red" align="center"><button href="javascript:;" class="btn btn-danger" data-toggle="modal" data-target="#loginModal">
          LOGIN HERE
    </button>  
    </p>
    <p align="center">&nbsp;</p>
    <p align="center">&nbsp;</p>
    <p align="center" class="style4">
    <img src="main/images/footer.png" style="height:160px"><img><br>
        </p>
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content login-modal">
                <div class="modal-header login-modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title text-center" id="loginModalLabel"> HOTEL YAASMIIN MANAGEMENT SYSTEM</h4>
                </div>
                <div class="modal-body">
                  <div class="text-center">
                    <div role="tabpanel" class="login-tab">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                      <li role="presentation" class="active"><a id="signin-taba" href="#home" aria-controls="home" role="tab" data-toggle="tab">LOG IN</a></li>
                    </ul>
                    <!-- Tab panes -->
                   <div class="tab-content">
                      <div role="tabpanel" class="tab-pane active text-center" id="home">
                        &nbsp;&nbsp;
                        <span id="login_fail" class="response_error" style="display: none;">Loggin failed, please try again.</span>
                        <div class="clearfix"></div>
        <!-- billowga formka loginka -->
                        <form method="post" action="index.php" role="login">
                          <?php include('errors.php'); ?>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input type="text" name="username" class="form-control" id="login_username" placeholder="Enter Your username..">
                            </div>
                            <span class="help-block has-error" id="email-error"></span>									  	</div>
                          <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                            </div>
                            <span class="help-block has-error" id="password-error"></span>									  	</div>
                          <button type="submit"  name="login_user" id="login_btn" class="btn btn-block bt-login" data-loading-text="Signing In....">
                            LOGIN</button>

                    
                          <div class="clearfix"></div>
                          <div class="login-modal-footer">
                          </div>
                      </form>
     <!-- dhamaadka formka loginka -->
                      </div
                    </div>
                </div>
                  </div>
                </div>
            </div> <!-- dhamaadka dhamaadka modal content -->  
         </div> <!-- dhamaadka dhamaadka modal dailoga -->  
      </div> <!-- dhamaadka dhamaadka modalka guud -->  
       <!-- - Login Model Ends Here -->
    
    
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        
        <script>
          $(document).ready(function(){
            $(document).on('click','.signup-tab',function(e){
               e.preventDefault();
               $('#signup-taba').tab('show');
            });	
      
            $(document).on('click','.signin-tab',function(e){
               e.preventDefault();
               $('#signin-taba').tab('show');
            });
            
            $(document).on('click','.forgetpass-tab',function(e){
               e.preventDefault();
               $('#forgetpass-taba').tab('show');
            });
          

          });	
        </script>
      </body>
    </html>
    