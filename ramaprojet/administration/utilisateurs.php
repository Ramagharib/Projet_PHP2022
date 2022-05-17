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
 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ajoututilisateur">
                        Ajouter un utilisateur
                    </button>
  <h5 class="text-center my-4">Liste d'utlisateurs</h5>
  <?php
  $cnx=new PDO('mysql:host=localhost;dbname=clinica;charset=utf8','root','');
  $c="patient";
  $req=$cnx->prepare('Select * from utilisateurs');
  $req->execute();
  $nbr = $req->rowCount();

?>
    <!-- Modal -->
    <div class="modal fade" id="ajoututilisateur" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajout d'un utilisateur </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="ajoututil.php" method="POST">

                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nom </label>
                            <input type="text" name="fname" class="form-control" placeholder="Entrer le nom">
                        </div>

                        <div class="form-group">
                            <label> Prénom </label>
                            <input type="text" name="lname" class="form-control" placeholder="Entrer le prénom">
                        </div>

                        <div class="form-group">
                            <label> Login </label>
                            <input type="text" name="log" class="form-control" placeholder="Enter Course">
                        </div>

                        <div class="form-group">
                            <label> Mot de passe </label>
                            <input type="password" name="mdp" class="form-control" placeholder="Entrer le mot de passe">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" name="insertdata" class="btn btn-primary">Enregistrer</button>
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
                    <h5 class="modal-title" id="exampleModalLabel"> Suppresion d'un utilisateur </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="supput.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="delete_id" id="delete_id">

                        <h4> Voulez vous vraiment supprimer cet utilisateur??</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Non </button>
                        <button type="submit" name="deletedata" class="btn btn-primary"> Oui !! Supprimer it. </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Modification données utilisateur </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="majutilisateur.php" method="POST">

                    <div class="modal-body">

                        <input type="text" name="update_id" id="update_id">
					
                        <div class="form-group">
                            <label> Nom </label>
                            <input type="text" name="fname" id="fname" class="form-control"
                                required>
                        </div>

                        <div class="form-group">
                            <label>Prénom </label>
                            <input type="text" name="lname" id="lname" class="form-control" rows="10"
                                Required>
                        </div>
						<div class="form-group">
                            <label>Login </label>
                            <input type="text" name="log" id="log" class="form-control" rows="10"
                                Required>
                        </div>
						<div class="form-group">
                            <label>Mot de passe </label>
                            <input type="password" name="mdp" id="mdp" class="form-control" rows="10"
                                Required>
                        </div>
                       

                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" name="updatedata" class="btn btn-primary">Enregistrer</button>
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
    <td>Login</td>
	<td>Action</td>
    </tr>
 
 <?php
    if ($nbr < 1 ) {
   ?>    
        <tr><td colspan='6' class='text-center'>Pas de clients</td> </tr>
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
		<td><?php echo $row['login'];?></td> 
       <td style="display:none;"><?php echo $row['modp'];?></td>	
 <td>
                                    <button type="button" class="btn btn-success editbtn"> Editer </button>                                    <button type="button" class="btn btn-danger deletebtn"> Supprimer </button>

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
				$('#fname').val(data[1]);
				 $('#lname').val(data[2]);
				 $('#log').val(data[3]);
               	$('#mdp').val(data[4]);

                
            });
        });
    </script>
	
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