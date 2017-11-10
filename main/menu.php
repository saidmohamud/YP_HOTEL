<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="wagad/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
  <title></title>
<style>
.nav-sm {
  padding-left: 15px;
    color: #fff;
    text-transform: uppercase;
    letter-spacing: .5px;
    font-weight: bold;
    font-size: 11px;
    margin-bottom: 0;
    margin-top: 0;
    text-shadow: 1px 1px #000
}
.nav-sm ul,
.nav-sm li {
  list-style: none;
  padding: 0px;
  margin: 0px;
  line-height: 35px;
  cursor: pointer;
}
.nav-sm ul .active,
.nav-sm li .active {
  border-left: 3px solid #d19b3d;
  background-color: #4f5b69;
}
.nav-sm li {
  padding-left: 0px;
  border-left: 3px solid #2e353d;
  border-bottom: 1px solid #23282e;
}
.nav-sm  li a {
  text-decoration: none;
  color: #e1ffff;
}
.nav-sm li a i {
  padding-left: 10px;
  width: 20px;
  padding-right: 20px;
}
.nav-sm li:hover {
  border-left: 3px solid #d19b3d;
  background-color: #4f5b69;
 
  -webkit-transition: all 1s ease;
  -moz-transition: all 1s ease;
  -o-transition: all 1s ease;
  -ms-transition: all 1s ease;
  transition: all 1s ease;
}
.nav-sm {
    position: relative;
    width: 100%;
    margin-bottom: 10px;
  }
  #generalnav{
    color:red
  }
  #admin{
    color:white
  }
  #white{
    color:greenyellow
  }
</style>
</head>
<body style="background-color:green">
<aside class="main-sidebar" style="background-color:#2A3F54;">
    <!-- sidebar -->
    <section class="sidebar" >
    <br>
    <div class="user-panel">
        <div class="pull-left image">
          <img src="images/img1.jpg" class="img-circle" alt="User Image" >
        </div>
        <div class="pull-left info">
          <p id="admin">Admin</p>
          <!-- Status -->
           <a href="#"><i class="fa fa-circle text-success"></i><b id="admin">Online</b></a>
        </div>
      </div>
       <nav class="nav-sm">
      <ul class="sidebar-menu" data-widget="tree">
        <br>
        <br>
      <B id="generalnav">General</B>
        <li>
          <a href="adminpanel.php"><i class="fa fa-home" id="white"></i > <span><B id="white">HOME</B></span></a>
          </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-hotel" id="white"></i> <span><B id="white">GUEST</B></span>
            <span class="pull-right-container  ">
               <img src="images/plus.png"  alt="">
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addguest.php"><B>GEUST REGISTER</B></a></li>
            <li><a href="search.php"><B>GUEST LIST</B></a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-edit" id="white"></i> <span><B id="white">CHECK IN</B></span>
            <span class="pull-right-container">
            <img src="images/plus.png"  alt="">
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="checkin.php"><B>CHECKIN REGISTER</B></a></li>
            <li><a href="rsearch.php"><B>CHECKIN LIST</B></a></li>
            <li><a href="amounts.php"><B>INVOICE LIST</B></a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-edit" id="white"></i> <span><B id="white">ROOM</B></span>
            <span class="pull-right-container">
            <img src="images/plus.png"  alt="">
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="room.php"><B>ROOM REGISTER</B></a></li>
            <li><a href="rooms.php"><B>ROOM LIST</B></a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-table" id="white"></i> <span><B id="white">CHECK OUT</B></span>
            <span class="pull-right-container">
            <img src="images/plus.png"  alt="">
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="invoices.php"><B>CHECKOUT LIST</B></a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-table" id="white"></i> <span><B id="white">ROOM STATUS</B></span>
            <span class="pull-right-container">
            <img src="images/plus.png"  alt="">
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="tstatus.php"><B>STATUS LIST</B></a></li>
          </ul>
        </li>
      </ul>
</nav>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
</body>
</html>