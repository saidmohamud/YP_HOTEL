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
                            <i class="fa fa-bed"></i>
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
                            <i class="fa fa-table"></i>
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
                </div>
                <div class="col-md-3">
                  <canvas id="canvas" width="250" height="210">
</canvas>
                  <script>
var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");
var radius = canvas.height / 2;
ctx.translate(radius, radius);
radius = radius * 0.90
setInterval(drawClock, 1000);

function drawClock() {
  drawFace(ctx, radius);
  drawNumbers(ctx, radius);
  drawTime(ctx, radius);
}

function drawFace(ctx, radius) {
  var grad;
  ctx.beginPath();
  ctx.arc(0, 0, radius, 0, 2*Math.PI);
  ctx.fillStyle = 'black';
  ctx.fill();
  grad = ctx.createRadialGradient(0,0,radius*0.95, 0,0,radius*1.05);
  grad.addColorStop(0, 'red');
  grad.addColorStop(0.5, 'white');
  grad.addColorStop(1, '#333');
  ctx.strokeStyle = grad;
  ctx.lineWidth = radius*0.1;
  ctx.stroke();
  ctx.beginPath();
  ctx.arc(0, 0, radius*0.1, 0, 2*Math.PI);
  ctx.fillStyle = 'red';
  ctx.fill();
}

function drawNumbers(ctx, radius) {
  var ang;
  var num;
  ctx.font = radius*0.15 + "px arial";
  ctx.textBaseline="middle";
  ctx.textAlign="center";
  for(num = 1; num < 13; num++){
    ang = num * Math.PI / 6;
    ctx.rotate(ang);
    ctx.translate(0, -radius*0.85);
    ctx.rotate(-ang);
    ctx.fillText(num.toString(), 0, 0);
    ctx.rotate(ang);
    ctx.translate(0, radius*0.85);
    ctx.rotate(-ang);
  }
}

function drawTime(ctx, radius){
    var now = new Date();
    var hour = now.getHours();
    var minute = now.getMinutes();
    var second = now.getSeconds();
    //hour
    hour=hour%12;
    hour=(hour*Math.PI/6)+
    (minute*Math.PI/(6*60))+
    (second*Math.PI/(360*60));
    drawHand(ctx, hour, radius*0.5, radius*0.07);
    //minute
    minute=(minute*Math.PI/30)+(second*Math.PI/(30*60));
    drawHand(ctx, minute, radius*0.8, radius*0.07);
    // second
    second=(second*Math.PI/30);
    drawHand(ctx, second, radius*0.9, radius*0.02);
}

function drawHand(ctx, pos, length, width) {
    ctx.beginPath();
    ctx.lineWidth = width;
    ctx.lineCap = "round";
    ctx.moveTo(0,0);
    ctx.rotate(pos);
    ctx.lineTo(0, -length);
    ctx.stroke();
    ctx.rotate(-pos);
}
</script>
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