<?php
session_start();
?>
<!doctype html>
<html >
<head>
  <title>Patients</title>
</head>
<body>
  <?php
  include("../include/header.php");

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
  <h5 class="text-center my-4">Liste des Consultations</h5>
  <?php
  $cnx=new PDO('mysql:host=localhost;dbname=clinica;charset=utf8','root','');
  $c="patient";
  $req=$cnx->prepare('Select * from consultations where profile=?');
  $req->execute([$c]);
  $nbr = $req->rowCount();

?>
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Repondre à un econsultation </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="ajoutord.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="update_id" id="update_id">
						<input type="hidden" name="clid" id="clid">
						<input type="hidden" name="docid" id="docid">
                        <div class="form-group">
                            <label> Titre </label>
                            <input type="text" name="fname" id="fname" class="form-control" value="Consultation"
                                required>
                        </div>

                        <div class="form-group">
                            <label>Ordonnance </label>
                            <textarea type="text" name="lname" id="lname" class="form-control" rows="10"
                                Required></textarea>
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
	<td>Patients</td>
    <td>Titre</td>
    <td>Message</td>
    <td>Date</td>
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
	  $c="patient";
      $req2=$cnx->prepare('Select * from clients c,consultations cn where c.idcl=cn.idenv and profile=? ');
      $req2->execute([$c]);
?>
		<tr>
        <td><?php echo $row['id'];?></td>
		<td style="display:none;"><?php echo $row['idenv'];?></td>
		<td style="display:none;"><?php echo $row['vers'];?></td>
		<?php
		while($row2=$req2->fetch()){ 
		?>
		<td><?php echo $row2['nom']." ".$row2['pren'];?></td> 
		<?php break;} ?>
        <td><?php echo $row['titre'];?></td> 
        <td><?php echo $row['message'];?></td> 
        <td><?php echo $row['datenv'];?></td> 
		
        <td><?php if ($row['statut']=='non')
		{
			echo "<button type='button' class='btn btn-success editbtn'> Répondre </button>";
        } else{ 
		        echo "Répondu";
		} ?>
		</td> 
        
      
  </tr> 
 <?php
    
      }
	  }?>

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