
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
    
    
</head>
<body class="hold-transition skin-purple-light  sidebar-mini" onload="timing()">
   
    
       
      <div class="wrapper">

      <?php include("header.php"); ?>
        <?php include("menu.php"); ?>
        <?php include("dashboard.php"); ?>
        <div class=" col-sm-11 col-sm-offset-1 " style="margin-left:-13px;">
        <div class="text-left">
          <ol class="breadcrumb">
            <li><a href="adminpanel.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Register Details</li>
          </ol>
          </div>
          </div>
      <br>
      <br>
     
     


      <?php
include "tables/config.php";
include "yearlyincometowords.php";

$year=$_GET['year'];
if (!isset($year)){echo '<h1 style="text-align:center;">Choose Year to View Sales</h1>';}
else{
$queryrooms=mysql_query("select sum(Total_charges) from official_reciept where year(Date_of_Payment)='$year'   ");
 
echo '<div style="color:#FFF;background:#000">';
  while($rows1 = mysql_fetch_array($queryrooms)){
	  $income=$rows1['sum(Total_charges)']*1;//Times 1 para dili ma Empty
	  $income=number_format($income,2);//Two decimal Places w/ Comma
	 // echo '<td><b>Name  = '.$income.'</b></td>-->';
//echo '<td><b>Status  = '.$room=$rows1['Status'].'</b></td><br>';
	  
 //echo '&nbsp;&nbsp;<td>'.$room.'</td>';
 $inwords=number_format($rows1['sum(Total_charges)']*1,2, '.', '');
  }
  
?><a onclick="window.print()">
<table width="740" style="background:#FFF">
  <tr>
    <th width="84" height="97" scope="col">&nbsp;</th>
    <th colspan="3" scope="col"><p><strong>SKY HOTEL </strong></p>
    <p><em>New Visayas Panabo City </em><em>Davao del Norte , Philippines</em></p>
    <p><?php echo $year?>&nbsp;&nbsp;&nbsp;Yearly Income. </p></th>
    <th width="10" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th height="48" scope="row">&nbsp;</th>
    <td colspan="2">&nbsp;</td>
    <td width="209">Date  :  <?php echo date('Y-m-d'); ?>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th height="47" scope="row">&nbsp;</th>
    <td width="183">AMOUNT IN NUMBERS :</td>
    <td width="236"><?php echo $income; ?>&nbsp;</td>
    <td>PESOS</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th height="21" scope="row">&nbsp;</th>
    <td colspan="3">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th height="104" scope="row">&nbsp;</th>
    <td>IN WORDS :</td>
    <td colspan="2"><?php
	
	
	 echo $pasa=convert_number_to_words($inwords);} ?>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</a>
  
                   
      
    
        <?php include("dashFooter.php"); ?>    
    </div>
    <?php include("footer.php"); ?>




</body> 
</html>