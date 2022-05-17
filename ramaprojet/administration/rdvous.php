<?php
session_start();
?>
<!doctype html>
<html >
<head>
  <title>Docteurs</title>
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
 
  <h5 class="text-center my-4">Liste de rendez vous</h5>
  <?php
  $cnx=new PDO('mysql:host=localhost;dbname=clinica;charset=utf8','root','');
  $c="patient";
  $req=$cnx->prepare('Select * from rendezvous');
  $req->execute();
  $nbr = $req->rowCount();

?>

    <table class='table  table-bordered'>  
    <tr>
    <td>ID</td> 
	<td>Nom</td>
    <td>Prénom</td>
    <td>Genre</td>
	<td>Symptome</td>
	<td>Date rendez vous</td>
    </tr>
 
 <?php
    if ($nbr < 1 ) {
   ?>    
        <tr><td colspan='6' class='text-center'>Pas de rendez vous</td> </tr>
      <?php
	  }
	  else
	  {
      while($row=$req->fetch()){ 
	  
?>
		<tr>
        <td><?php echo $row['id'];?></td>
		<td><?php echo $row['nom'];?></td> 
        <td><?php echo $row['pren'];?></td> 
		<td><?php echo $row['genre'];?></td> 
        <td><?php echo $row['sympt'];?></td> 
		<td><?php echo $row['dater'];?></td> 
		</td> 
        
      
  </tr> 
	  <?php }
	  }	  ?>

  </table>
  
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
      <script>
        $(document).ready(function () {

            $('.editbtn').on('click', function () {

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#update_id').val(data[0]);
				$('#clid').val(data[1]);
				 $('#docid').val(data[2]);
               
                
            });
        });
    </script>