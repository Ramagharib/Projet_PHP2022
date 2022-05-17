<?php
session_start();
?>
<!doctype html>
<html >
<head>
  <title>Dossiers Medicaux</title>
</head>
<body>
 <!-- Modal nouveau-->
    <div class="modal fade" id="ajoutpatient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajout d'un nouveau patient</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="ajoutdos.php" method="POST">

                    <div class="modal-body">
                        <div class="form-group">
                             Matricule sociale 
                            <input type="text" name="mat" class="form-control" placeholder="Mat sociale" required>
                        </div>

                        <div class="form-group">
                            <label> Nom </label>
                            <input type="text" name="nom" class="form-control" placeholder="Nom" required>
                        </div>

                        <div class="form-group">
                            <label> Prénom </label>
                            <input type="text" name="pren" class="form-control" placeholder="Prénom" required>
                        </div>
						<div class="form-group">
                            <label> Genre </label>
							<select name="gr" id="gr" class="form-select">
						<option value="">Choisir un genre</option>
						<option value="homme">Homme</option>
						<option value="femme">Femme</option>


					</select>
                        </div>

                        <div class="form-group">
                            <label> Date Naissance </label>
                            <input type="date" name="datn" class="form-control" placeholder="date naissance">
                        </div>
						<div class="form-group">
                            <label> Adresse </label>
                            <input type="text" name="adr" class="form-control" placeholder="Adresse" required>
                        </div>
						<div class="form-group">
                            <label> Dossier médicale </label>
                            <input type="text" name="dosm" class="form-control" placeholder="Dossier médicale" required>
                        </div>
						<div class="form-group">
                            <label> Téléphone </label>
                            <input type="text" name="tel" class="form-control" placeholder="Téléphone" required>
                        </div>
						<div class="form-group">
                            <label> Email </label>
                            <input type="text" name="email" class="form-control" placeholder="Email" required>
                        </div>
                    </div> <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" name="insertdata" class="btn btn-primary">Ajouter</button>
                    </div>
                    </div>
                   
                </form>

            </div>
        </div>
		 <!-- Modal existant -->
    <div class="modal fade" id="patientexistant" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Patient existant</h5>
                    
                </div>

                <form action="majpat.php" method="POST">

                    <div class="modal-body">
                        <div class="form-group">
                            <label> Matricule sociale </label>
                            <input type="text" name="mat" class="form-control" placeholder="Mat sociale" required>

                        </div>

						

                        
						<div class="form-group">
                            <label> Dossier médicale </label>
                            <input type="text" name="dosm" class="form-control" placeholder="Dossier médicale" required>
                        </div>
                    </div><div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" name="insertdata" class="btn btn-primary">Ajouter</button>
                    </div>
                    </div>
                    
                </form>

            </div>
        </div>
  <?php
  include("../include/header.php");
  include("../include/connection.php");
  $cnx=new PDO('mysql:host=localhost;dbname=clinica;charset=utf8','root','');

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
  <div class="col-md-12">
  <div class="row">
  <div class="col-md-6">
  <h5 class="text-center my-4">Liste des Dossiers Medicaux</h5>
  <?php
  $tst="";
  $req=$cnx->prepare('SELECT * FROM clients where dos_med !=?');
  $req->execute([$tst]);
  $output="
    <table class='table  table-bordered'>  
    <tr>
    <th>ID</th> 
    <th>Nom</th> 
    <th>Dossier Medical</th> 

    <th style='width:10%;'>Action</th>
    </tr>
 
    ";
  if ($req->rowCount()< 1 ) {
    $output .= "    
    <tr><td colspan='4' class='text-center'>Pas de dossiers médicaux </td> </tr>
    ";

  }
  while($row=$req->fetch()){
    $ID=$row['idcl'];
    $username=$row['nom'];
    $dossier_medical=$row['dos_med'];
    $output .="
    <tr>
    <td>$ID</td> 
    <td>$username</td>
    <td>$dossier_medical</td>
    
    <td>
    <a href='dossier.php?ID=$ID'><button ID='$ID' class='btn btn-danger remove'>Supprimer</button></a>
    </td>
    ";

  }
  $output .="
  </tr> 


  </table>
";
   echo $output;
  ?>

    
     
   


  </div>
  <div class="col-md-6">
  <h5 class="text-center my-4">Ajouter un Dossier Medical</h5>
     <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ajoutpatient">
                        Nouveau patient
                    </button>
                </div>
				<div class="card-body">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#patientexistant">
                        Patient existant
                    </button>
                </div>
    </div>
  
  </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function () {

            $('.viewbtn').on('click', function () {
                $('#viewmodal').modal('show');
                $.ajax({ //create an ajax request to display.php
                    type: "GET",
                    url: "display.php",
                    dataType: "html", //expect html to be returned                
                    success: function (response) {
                        $("#responsecontainer").html(response);
                        //alert(response);
                    }
                });
            });

        });
    </script>

</body>
</html>