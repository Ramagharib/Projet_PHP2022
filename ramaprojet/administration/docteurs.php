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
  <br>
    <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ajoutdoc">
                        Ajouter un docteur
                    </button>
                </div>
            </div>

  <h5 class="text-center my-4">Liste de docteurs</h5>
  <?php
  $cnx=new PDO('mysql:host=localhost;dbname=clinica;charset=utf8','root','');
  $c="patient";
  $req=$cnx->prepare('Select * from docteurs');
  $req->execute();
  $nbr = $req->rowCount();

?>
    <div class="modal fade" id="ajoutdoc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajout d'un docteur </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="ajoutdoc.php" method="POST">

                    <div class="modal-body">
                        <div class="form-group">
                            <label> Nom </label>
                            <input type="text" name="fname" class="form-control" placeholder="Nom" required>
                        </div>

                        <div class="form-group">
                            <label> Prénom </label>
                            <input type="text" name="lname" class="form-control" placeholder="Prénom"required>
                        </div>
						<div class="form-group">
                            <label> Specialité </label>
                            <input type="text" name="spec" class="form-control" placeholder="Specialité"required>
                        </div>
                        <div class="form-group">
                            <label> Tel </label>
                            <input type="text" name="tel" class="form-control" placeholder="Téléphone" required>
                        </div>

                        <div class="form-group">
                            <label> Email </label>
                            <input type="text" name="email" class="form-control" placeholder="Email" required>
                        </div>
						<div class="form-group">
                            <label> Login </label>
                            <input type="text" name="login" class="form-control" placeholder="Login" required>
                        </div>
						<div class="form-group">
                            <label> Mot de passe </label>
                            <input type="passwword" name="modp" class="form-control" placeholder="Mot de passe" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" name="insertdata" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Suppression d'un docteurs </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="suppdoc.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="delete_id" id="delete_id">

                        <h4> Voulez vous vraiment supprimer ce Docteurs ??</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Non </button>
                        <button type="submit" name="deletedata" class="btn btn-primary"> Oui !! Supprimer. </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <table class='table  table-bordered'>  
    <tr>
    <td>ID</td> 
	<td>Nom</td>
    <td>Prénom</td>
    <td>Spécialité</td>
    <td>Tel</td>
	<td>Email</td>
	<td>Login</td>
	<td>Action</td>
    </tr>
 
 <?php
    if ($nbr < 1 ) {
   ?>    
        <tr><td colspan='6' class='text-center'>Pas de docteurs</td> </tr>
      <?php
	  }
	  else
	  {
      while($row=$req->fetch()){ 
	  
?>
		<tr>
        <td><?php echo $row['iddoc'];?></td>
		<td><?php echo $row['nom'];?></td> 
        <td><?php echo $row['prenom'];?></td> 
        <td><?php echo $row['specialite'];?></td> 
        <td><?php echo $row['tel'];?></td> 
		<td><?php echo $row['email'];?></td> 
		<td><?php echo $row['login'];?></td> 
		<td style="display:none;"><?php echo $row['modp'];?></td>	
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