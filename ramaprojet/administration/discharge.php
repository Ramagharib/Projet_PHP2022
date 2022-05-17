<?php
session_start();
?>
<!doctype html>
<html >
<head>
  <title>Check Patient Appointment</title>
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
  <h5  class="my-2 text-white">Total Appointment</h5>
  <?php
  if(isset($_GET['ID'])){
        $ID=$_GET['ID'];
        $query="SELECT * FROM appointment WHERE ID='$ID'";
        $res=mysqli_query($connect,$query);
        $row=mysqli_fetch_array($res);

    }
    ?>
  <div class="col-md-12">
  <div class="row">
  <div class="col-md-6" >
  <table class="table table-bordered">
  <tr>
  <td colspan="2"  class="text-center">Appointment Details</td>
  </tr>
  <tr>
  <td >Firstname</td>
  <td ><?php echo $row['firstname']; ?></td>
  </tr>
  <tr>
  <td >Username</td>
  <td ><?php echo $row['username']; ?></td>
  </tr>
  <tr>
  <td >Gender</td>
  <td ><?php echo $row['gender'];?></td>
  </tr>
  <tr>
  <td >Phone</td>
  <td ><?php echo $row['phone'];?></td>
  </tr>
  <tr>
  <td >Appointment Date</td>
  <td ><?php echo $row['appointment_date'];?></td>
  </tr>
  <tr>
  <td >Symptoms</td>
  <td ><?php echo $row['symptoms'];?></td>
  </tr>
  <tr>
  <td >Date Booked</td>
  <td ><?php echo $row['date_booked'];?></td>
  </tr>
  </table>
  </div>
  <div class="col-md-6" >
  <h5 class="text-center my-1">Facture</h5>
  <?php
  if (isset($_POST['ajouter'])){
      $fee=$_POST['fee'];
      $des=$_POST['des'];
      if(empty($fee)){

      }else if(empty($des)){

      }else{
          $fname=$row['firstname'];
          $query="INSERT INTO income(patient, date_discharge, amount_paid, description) VALUES('$firstname',NOW(),'$fee','$des')";
          $res=mysqli_query($connect,$query);
          if($res){
              echo "<script>alert('You Have Sent Invoice')</script>";
          }
      }
  }
      ?>
  <form methode="post">
  <label>Fee</label>
  <input type="number" name="fee" class="form-control" autocomplete="off" placeholder="Enter Patient Fee">
  <label>Description</label>
  <input type="text" name="des" class="form-control" autocomplete="off" placeholder="Enter Description">
  <input type="submit" name="Ajouter" value="Ajouter" class="btn btn-info my-2">


  </form>
  </div></div></div></div></div></div></div>
  </body>
  </html>