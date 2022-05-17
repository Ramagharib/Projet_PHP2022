<?php
  session_start();
  ?>
  <!doctype html>
<html >
<head>
  <title>Profit</title>
</head>
<body>
  <?php
  include("../include/header.php");
  include("../include/connection.php");

  ?>
  <div class="container-fluid">
  <div class="col-md-12">
  <div class="row">
  <div class="col-md-2" style="margin-left: -30px;">
  <?php
  include("sidenav.php");
  ?>
  </div>
  <div class="col-md-10">
  <h5 class="my-2 text-white">Profit</h5>
  <?php
  $query="SELECT * FROM income ";
  $res=mysqli_query($connect,$query);
  $output="";
  $output .="
    <table class='table  table-bordered'>  
    <tr>
    <td>ID</td> 
    <td>Patient</td>
    <td>Date Discharge</td>
    <td>Amount Paid (DH)</td>
    </tr>
 
    ";
    if (mysqli_num_rows($res) < 1 ) {
        $output .= "    
        <tr><td colspan='4' class='text-center'>No Patient Discharge Yet.</td> </tr>
        ";
    
      }
      while($row=mysqli_fetch_array($res)){
        
        $output .="
        <tr>
        <td>".$row['ID']."</td> 
        <td>".$row['patient']."</td> 
        <td>".$row['date_discharge']."</td> 
        <td>".$row['amount_paid']."</td> 
        
        
        
        ";
    
      }
      $output .="
  </tr> 


  </table>
";
echo $output;
?>














<div class="col-md-10">

  <div class="col-md-12">
  <div class="row">
  <div class="col-md-3" ></div>
  <?php
									$in=mysqli_query($connect,"SELECT sum(amount_paid) as profit FROM income");
									$row=mysqli_fetch_array($in);
									$inc=$row['profit'];
									?>
  <div class="col-md-6 ">
  
  <br>
  
  <div class="border border-light p-3 mb-4">
  <div class="text-center "><br>
    <button class="btn btn-info my-1" style="width:50%">Total Profit : <?php echo "$inc DH"; ?></button>  <i class="fa fa-hand-point-left fa-3x my-4" style="color:#17a2b8;"></i>

    
    
  </div>

  <br>
  <div class="text-center">
      <button onclick="window.print();" class="btn btn-info">Print</button>

      </div>
  </div>
  </div>
  <div class="col-md-3"></div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>