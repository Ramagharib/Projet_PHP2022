<?php
session_start();
$cnx=new PDO('mysql:host=localhost;dbname=clinica;charset=utf8','root','');
?>
<html>
<head>
<title>Tableau de bord Docteurs </title>
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
				include("sidenav.php")
				?>


			</div>
			<div class="col-md-10">
			<h6 class="my-2 text-white">Tableau de bord Docteurs</h6>
				<div class="col-md-12 my-1">

					<div class="row">
						<div class="col-md-3 bg-success mx-2" style="height: 130px;">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-8">
									<?php
									
									$cl=$cnx->prepare('Select * from clients');
									$cl->execute();
									$numcl = $cl->rowCount();
									?>
									<h5 class="my-2 text-white texte-center" style="font-size: 30px;"><?php echo $numcl; ?></h5>
									<h5 class="text-white">Total</h5>
									<h5 class="text-white"> Patients</h5>
									</div>
									<div class="col-md-4">
									<a href="clients.php"><i class="fa fa-procedures fa-3x my-4" style="color:white;"></i></a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-3 bg-info mx-2" style="height: 130px;">
						<div class="col-md-12">
								<div class="row">
									<div class="col-md-8">
									<?php
									$req=$cnx->prepare('Select * from rendezvous');
									$req->execute();
									$count = $req->rowCount();

									?>
									<h5 class="my-2 text-white texte-center" style="font-size: 30px;"><?php echo $count; ?></h5>
									<h5 class="text-white">Total</h5>
									<h5 class="text-white"> Rendez-Vous</h5>
									</div>
									<div class="col-md-4">
									<a href="rdvous.php"><i class="fa fa-calendar-check fa-3x my-4" style="color:white;"></i></a>
									</div>
								</div>
							</div>		
						</div>
						<div class="col-md-3 bg-warning mx-2" style="height: 130px;">
						<div class="col-md-12">
								<div class="row">
									<div class="col-md-8">
									<?php
									$reqd=$cnx->prepare('Select * from docteurs');
									$reqd->execute();
									$numd = $reqd->rowCount();
									?>
									<h5 class="my-2 text-white texte-center" style="font-size: 30px;"><?php echo $numd ; ?></h5>
									<h5 class="text-white">Total</h5>
									<h5 class="text-white"> Docteurs </h5>
									</div>
									<div class="col-md-4">
									<a href="docteurs.php"><i class="fa fa-notes-medical fa-3x my-4" style="color:white;"></i></a>
									</div>
								</div>
							</div>
						</div>
					
						<div class="col-md-3 bg-warning mx-2 my-3 style="height: 130px;">
						<div class="col-md-12">
								<div class="row">
									<div class="col-md-8">
									<?php
									$ord=$cnx->prepare('Select * from utilisateurs');
									$ord->execute();
									$ac = $ord->rowCount();
									
									?>
									<h5 class="my-2 text-white texte-center" style="font-size: 30px;"><?php echo $ac; ?></h5>
									<h5 class="text-white">Total</h5>
									<h5 class="text-white"> Utilisateurs </h5>
									</div>
									<div class="col-md-4">
									<a href="utilisateurs.php"><i class="fa fa-prescription-bottle fa-3x my-4" style="color:white;"></i></a>
									</div>
								</div>
						</div>
						</div>

						<div class="img">
		                    <img src="../img/undraw.svg" WIDTH=950 HEIGHT=300>
		                </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>	
</html>
    