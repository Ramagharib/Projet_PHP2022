<?php
session_start();
?>
<!doctype html>
<html >
<head>
  <title>Ordonnance</title>
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
  <h5 class="text-center my-4">Ordonnances</h5>
  <?php
  $req=$connect->prepare('Select * from ordonnance');
  $req->execute();
  $nbr = $req->rowCount();
  $output="";
  $output="
    <table class='table  table-bordered'>  
    <tr>
    <td>Docteur</td> 
    <td>Patient</td>
    <td>Ordonnance</td>
    <td>Telephone</td>
    <td>Email</td>
    </tr>
 
    ";
    if ($nbr< 1 ) {
        $output .= "    
        <tr><td colspan='5' class='text-center'>Pas d ordonnace</td> </tr>
        ";
    
      }
      while($row=$req->fetch()){
        
        $output .="
        <tr>
        <td>".$row['docteur']."</td> 
        <td>".$row['patient']."</td> 
        <td>".$row['ordonnance']."</td> 
        <td>".$row['telephone']."</td> 
        <td>".$row['email']."</td> 
        
        
        
        ";
    
      }
      $output .="
  </tr> 


  </table>
";
echo $output;


?>