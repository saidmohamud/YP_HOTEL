<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="js/bootstrap.min.js"></script>
    <title>YAASMIIN | HOTEL</title>
    <?php include("Linkfooter.php"); ?>
    <?php include("links.php"); ?>
    <style>
    .showrow{
      font-size:64px;
      color:white
    }
    </style>
     </head>
      <body class="hold-transition skin-purple-light  sidebar-mini" onload="timing()">
      <div class="wrapper">
      <?php include("header.php"); ?>
        <?php include("menu.php"); ?>
        <?php include("dashboard.php"); ?>
      <br>
      <br>
      <!-- Full Width Column -->
        <div class="container">
          <!-- Content Header (Page header) -->
          <!-- Main content -->
          <section class="content">
            <div class="row">
	      <div class="col-md-8">
              <div class="box box-primary">
                <div class="box-header with-border" style="background-color:purple">
                  <h3 class="box-title" style="color:white"><i class="fa fa-dashboard"></i> Dashboard</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                      <div class="col-md-4 ">
                        <!-- small box -->
                        <div style="background-color:rgb(3, 228, 8); color:white" class="small-box ">
                          <div class="inner">
                            <h3>GUEST</h3>
                            <p>Guest list</p>
                          </div>
                          <div class="icon" style="margin-top:10px">
                            <i class="fa fa-home"></i>
                            <?php
                             $con=mysqli_connect("localhost","root","","simpledata");
                             $sql="select count(gid) as gid from guest";
                             $result = $con->query($sql);
                             if($result->num_rows > 0){
                               while($row = $result->fetch_assoc()){?>
                               <span class="showrow"><?php echo $row["gid"];?></span>
                               <?php
                                 
                               }
                             }
                            ?>
                          </div>
                          <a href="search.php" class="small-box-footer">
                           Click here<i class="fa fa-arrow-circle-right"></i>
                          </a>
                        </div>
                      </div><!-- ./col -->
                      <div class="col-md-4 ">
                        <!-- small box -->
                        <div style="background-color:rgb(255, 72, 0); color:white" class="small-box ">
                          <div class="inner">
                            <h3>CHECK IN</h3>
                            <p>Checkin List</p>
                          </div>
                          <div class="icon" style="margin-top:10px">
                            <i class="fa fa-edit"></i>
                            <?php
                             $con=mysqli_connect("localhost","root","","simpledata");
                             $sql="select count(gid) as gid from room";
                             $result = $con->query($sql);
                             if($result->num_rows > 0){
                               while($row = $result->fetch_assoc()){?>
                               <span class="showrow"><?php echo $row["gid"];?></span>
                               <?php
                                 
                               }
                             }
                            ?>
                          </div>
                          <a href="rsearch.php" class="small-box-footer">
                           Click Here<i class="fa fa-arrow-circle-right"></i>
                          </a>
                        </div>
                      </div><!-- ./col -->
                      <div class="col-lg-4">
                        <!-- small box -->
                        <div  style="background-color:rgb(198, 83, 72); color:white" class="small-box">
                          <div class="inner">
                            <h3>INVOICE</h3>
                            <p>Invoice List</p>
                          </div>
                          <div class="icon" style="margin-top:10px">
                            <i class="fa fa-usd"></i>
                            <?php
                             $con=mysqli_connect("localhost","root","","simpledata");
                             $sql="select count(gid) as gid from dbiling";
                             $result = $con->query($sql);
                             if($result->num_rows > 0){
                               while($row = $result->fetch_assoc()){?>
                               <span class="showrow"><?php echo $row["gid"];?></span>
                               <?php
                                 
                               }
                             }
                            ?>
                          </div>
                          <a href="amounts.php" class="small-box-footer">
                           Click Here <i class="fa fa-arrow-circle-right"></i>
                          </a>
                        </div>
                      </div><!-- ./col -->
                     
                      <div class="col-md-4 ">
                        <!-- small box -->
                        <div style="background-color:rgb(211, 46, 230); color:white"  class="small-box ">
                          <div class="inner">
                            <h3>ROOMS</h3>
                            <p>Room List</p>
                          </div>
                          <div class="icon" style="margin-top:10px">
                            <i class="fa fa-hotel"></i>
                            <?php
                             $con=mysqli_connect("localhost","root","","simpledata");
                             $sql="select count(gid) as gid from roomno";
                             $result = $con->query($sql);
                             if($result->num_rows > 0){
                               while($row = $result->fetch_assoc()){?>
                               <span class="showrow"><?php echo $row["gid"];?></span>
                               <?php
                                 
                               }
                             }
                            ?>
                          </div>
                          <a href="rooms.php" class="small-box-footer">
                            Click Here <i class="fa fa-arrow-circle-right"></i>
                          </a>
                        </div>
                      </div><!-- ./col -->
                      
                      <div class="col-lg-4">
                        <!-- small box -->
                        <div  style="background-color:	rgb(128,128,128); color:white" class="small-box">
                          <div class="inner">
                            <h3>STATUS</h3>
                            <p>Room Status List</p>
                          </div>
                          <div class="icon" style="margin-top:10px">
                            <i class="fa fa-table"></i>
                            <?php
                             $con=mysqli_connect("localhost","root","","simpledata");
                             $sql="select count(gid) as gid from roomno ";
                           //  $sql="select count(gid) as gid from roomno where room_status='Available'";
                             $result = $con->query($sql);
                             if($result->num_rows > 0){
                               while($row = $result->fetch_assoc()){?>
                               <span class="showrow"><?php echo $row["gid"];?></span>
                               <?php
                                 
                               }
                             }
                            ?>
                          </div>
                          <a href="tstatus.php" class="small-box-footer">
                           Click Here <i class="fa fa-arrow-circle-right"></i>
                          </a>
                        </div>
                      </div><!-- ./col -->
                      <div class="col-lg-4">
                        <!-- small box -->
                        <div style="background-color:rgb(0, 170, 255); color:white"  class="small-box">
                          <div class="inner">
                            <h3>CHECKOUT</h3>
                            <p>Checkout List</p>
                          </div>
                          <div class="icon" style="margin-top:10px">
                            <i class="fa fa-share"></i>
                            <?php
                             $con=mysqli_connect("localhost","root","","simpledata");
                             $sql="select count(gid) as gid from biling";
                             $result = $con->query($sql);
                             if($result->num_rows > 0){
                               while($row = $result->fetch_assoc()){?>
                               <span class="showrow"><?php echo $row["gid"];?></span>
                               <?php
                                 
                               }
                             }
                            ?>
                          </div>
                          <a href="invoices.php" class="small-box-footer">
                           Click Here <i class="fa fa-arrow-circle-right"></i>
                          </a>
                        </div>
                      </div><!-- ./col -->
                  </div><!--row-->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col (right) -->
            <div class="col-md-3">
              <!-- About Me Box -->
              <div class="box box-primary">
                <div class="box-header with-border" style="background-color:purple">
                <center> <B><h3 class="box-title" style="color:white">ABOUT US</h3></B></center>
                   </div><!-- /.box-header -->
                   <div class="box-body">
                   <h4 style="color:black"><i class="fa fa-map"></i> GOLIS TELECOM</h4>
                    <p style="color:red"><i class="fa fa-home"></i> <b>BOSAASO-BARI-SOMALIA<b></p>
              <h4 style="color:black"> <i class="fa fa-phone"></i> CONTACT NUMBER</h4>
                  <P  style="color:red"><i class="fa fa-mobile"></i>   <B>   +252-907-7793432</B><P>
                  <?php include("alarm.php"); ?>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>   
			    </div><!-- /.row -->
	      </section><!-- /.content -->
        </div><!-- /.container -->
    <?php include("dashFooter.php"); ?> 
    <?php include("footer.php"); ?>
</body> 
</html>