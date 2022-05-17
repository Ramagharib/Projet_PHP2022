<?php
session_start();
?>
<!doctype html>
<html >
<head>
  <title>Devis</title>
</head>
<body>
  <?php
  include("../include/header.php");

  ?>
  <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Suppression d'un devis </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="suppdev.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="delete_id" id="delete_id">

                        <h4> Voulez vous vraiment supprimer ce devis ??</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Non </button>
                        <button type="submit" name="deletedata" class="btn btn-primary"> Oui !! Supprimer. </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
  <div class="container-fluid">
  <div class="col-md-12">
  <div class="row">
  <div class="col-md-2" style="margin-left: -30px;">
  <?php
  include("sidenav.php");
  ?>
  </div>

  <div class="col-md-10">
 
  <h5 class="text-center my-4">Liste de devis</h5>
  <?php
  $cnx=new PDO('mysql:host=localhost;dbname=clinica;charset=utf8','root','');
  $c="patient";
  $req=$cnx->prepare('Select * from devis');
  $req->execute();
  $nbr = $req->rowCount();

?>

    <table class='table  table-bordered'>  
    <tr>
    <td>ID</td> 
	<td>Genre</td>
	<td>Nom</td>
	<td>Prénom</td>
	<td>Adresse</td>
	<td>Ville</td>
	<td>Code postal</td>
	<td>Tel</td>
    <td>Email</td>
    <td>Assurance</td>
	<td>Message</td>
	<td>Action</td>
    </tr>
 
 <?php
    if ($nbr < 1 ) {
   ?>    
        <tr><td colspan='6' class='text-center'>Pas de message</td> </tr>
      <?php
	  }
	  else
	  {
      while($row=$req->fetch()){ 
	  
?>
		<tr>
        <td><?php echo $row['id'];?></td>
				 <td><?php echo $row['genre'];?></td>

		 <td><?php echo $row['nom'];?></td>
		 <td><?php echo $row['pren'];?></td>
		 <td><?php echo $row['adr'];?></td>
		 <td><?php echo $row['ville'];?></td>
		 <td><?php echo $row['cp'];?></td>
		 <td><?php echo $row['tel'];?></td>

		<td><?php echo $row['email'];?></td> 
        <td><?php echo $row['assur'];?></td> 
        <td><?php echo $row['msg'];?></td> 
        <td><button type='button' class='btn btn-danger deletebtn'> Supprimer </button>
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

            $('.deletebtn').on('click', function () {

                $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);

            });
        });
    </script>