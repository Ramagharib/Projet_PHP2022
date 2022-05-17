<?php
include("../include/header.php");
  include("../include/connection.php");
session_start();
$login=$_SESSION["log"];

$req=$connect2->prepare('Select * from docteurs where login=? ');
$req->execute([$login]);
$nb=$req->rowCount();
if ($nb>0)
{
	while($r=$req->fetch())
	{
	$iddoc=$r['iddoc'];
	}
}
  if (isset($_POST['valider'])){
      $id=$_POST['id'];
	  $st="O";
	  $cnx=new PDO('mysql:host=localhost;dbname=clinica;charset=utf8','root','');
	  
           $sql2="UPDATE rendezvous Set status=? where id=?";
	  $req2=$cnx->prepare($sql2);
	  $req2->execute([$st,$id]);
	  echo '<script type="text/javascript">'; 
echo 'alert("Rendez-vous fixé avec succées");';
echo 'window.location.href = "appointment.php";';
echo '</script>';
      }
         

      
?>
<html >
<head>
  <title>Total Rendez vous</title>
</head>
<body>

  <div class="container-fluid">
  <div class="col-md-12">
  <div class="row">
  <div class="col-md-2" style="margin-left: -30px;">
  <?php
  include("sidenav.php");
  ?>
  </div>
  <div class="col-md-10">
  <h5 class="text-center my-4">Liste de rendez vous</h5>
  <?php
  		$req=$connect2->prepare('Select * from rendezvous where iddoc=? and status=?');
		$req->execute([$iddoc,'N']);
		$nbr = $req->rowCount();
  $output="";
  $output .="
  <table class='table  table-bordered'>  
  <tr>
  <td>ID</td> 
  <td>Nom</td>
  <td>Prénom</td>
  <td>genre</td>
  <td>Symptome</td>
  <td>Date rendez vous</td>
  <td>Action</td>

  </tr>

  ";
  if ($nbr < 1 ) {
    $output .= "    
    <tr><td colspan='9' class='text-center'>Pas de Message pour le moment</td> </tr>
    ";

  }
  while($row=$req->fetch()){
    
    $output .="
    <tr>
    <td>".$row['id']."</td> 
    <td>".$row['nom']."</td> 
    <td>".$row['pren']."</td> 
    <td>".$row['genre']."</td> 
    <td>".$row['sympt']."</td> 
    <td>".$row['dater']."</td> 
    <td><form method='post' enctype='multipart/form-data'>
	<input type='hidden' name='id' value=".$row['id'].">
    <button class='btn btn-info' name='valider'>Valider</button></a></td>
    
    
    
    ";

  }
  $output .="
</tr> 


</table>
";
echo $output;


?>