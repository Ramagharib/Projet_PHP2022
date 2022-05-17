<?php
session_start();
$login=$_SESSION["log"];
$cnx=new PDO('mysql:host=localhost;dbname=clinica;charset=utf8','root','');
$req=$cnx->prepare('Select * from docteurs where login=? ');
$req->execute([$login]);
$nb=$req->rowCount();
if ($nb>0)
{
	while($r=$req->fetch())
	{
	$nm=$r['nom'];
	$pr=$r['prenom'];
	}
}
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
					<p><h5>Bonjour Dr <?php echo $nm." ".$pr; ?></h5></p>

					<div class="row">
						<div class="col-md-3 bg-success mx-2" style="height: 130px;">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-8">
									<?php
									
									$req=$cnx->prepare('Select * from clients');
									$req->execute();
									$num = $req->rowCount();
									?>
									<h5 class="my-2 text-white texte-center" style="font-size: 30px;"><?php echo $num; ?></h5>
									<h5 class="text-white">Total</h5>
									<h5 class="text-white"> Patients</h5>
									</div>
									<div class="col-md-4">
									<a href="patients.php"><i class="fa fa-procedures fa-3x my-4" style="color:white;"></i></a>
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
									<a href="appointment.php"><i class="fa fa-calendar-check fa-3x my-4" style="color:white;"></i></a>
									</div>
								</div>
							</div>		
						</div>
						
						<div class="col-md-3 bg-danger mx-2 my-3" style="height: 130px;">
						<div class="col-md-12">
								<div class="row">
									<div class="col-md-8">
									<?php
									$req=$cnx->prepare('Select * from consultations WHERE profile=?');
									$req->execute(['patient']);
									$rep = $req->rowCount();
									
									?>
									<h5 class="my-2 text-white texte-center" style="font-size: 30px;"><?php echo $rep; ?></h5>
									<h5 class="text-white">Total</h5>
									<h5 class="text-white"> Consultations </h5>
									</div>
									<div class="col-md-4">
									<a href="consultation.php"><i class="fa fa-hospital-user fa-3x my-4" style="color:white;"></i></a>
									</div>
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
    