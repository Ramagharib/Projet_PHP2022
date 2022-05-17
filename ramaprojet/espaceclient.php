<?php
$cnx=new PDO('mysql:host=localhost;dbname=clinica;charset=utf8','root','');
session_start();
$idm= $_SESSION["log"];
$r1=$cnx->prepare('Select * from clients where idcl=?');
$r1->execute([$idm]);
$r2=$cnx->prepare('Select * from clients where idcl=?');
$r2->execute([$idm]);
$r3=$cnx->prepare('Select * from clients where idcl=?');
$r3->execute([$idm]);
$dc=$cnx->prepare('Select * from docteurs');
$dc->execute();	
$dc2=$cnx->prepare('Select * from docteurs');
$dc2->execute();	
$rdv=$cnx->prepare('Select * from rendezvous r,docteurs d where idcl=? and r.iddoc=d.iddoc');
$rdv->execute([$idm]);
?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Gharib Clinque</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

<style>
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 10px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

.button2 {background-color: #008CBA;} 
</style>
</head>

<body>



  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">Espace Client</a></h1>


      <a href="index.html" class="appointment-btn scrollto"><span class="d-none d-md-inline">Retour au site</a>

    </div>
  </header>

  <main id="main">



    <!-- ======= Departments Section ======= -->
    <section id="departments" class="departments">
      <div class="container">

        <div class="section-title">
          <h2>Espace Client</h2>
          <p>Espace réservé à nos clients.</p>
        </div>

        <div class="row gy-4">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Mon profil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Mes rendez</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Consultations</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-4">Ordonnances</a>
              </li>
			  
              <li class="nav-item">
                <a class="nav-link" href="deconnexion.php">Deconnexion</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-9">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Mon profil</h3>
					<p>
					<?php
					while($r=$r1->fetch())
	{?>
					<form action="majprofilclient.php" method="post" class="php-email-form">
					<table>
					<tr>
					<td>Nom</td>
					<td><input type="text" name="nom" 	value="<?php echo $r['nom'];?>"></td>
					</tr>
					<tr>
					<td>Prénom</td>
					<td><input type="text" name="pren" value="<?php echo $r['pren'];?>"></td>
					</tr>
					<tr>
					<td>Genre</td>
					<td><input type="text" name="pren" value="<?php echo $r['genre'];?>"></td>
					</tr>
					<tr>
					<td>Date naissance</td>
					<td><input type="date" name="datn" value="<?php echo $r['datn'];?>"></td>
					</tr>
					<tr>
					<td>Adresse</td>
					<td><input type="text" name="adr" value="<?php echo $r['adr'];?>"></td>
					</tr>
					<tr>
					<td>Tel</td>
					<td><input type="text" name="tel" value="<?php echo $r['tel'];?>"></td>
					</tr>
					<tr>
					<td>Email</td>
					<td><input type="text" name="email" value="<?php echo $r['email'];?>"></td>
					</tr>
					<tr>
					<td>Mot de passe</td>
					<td><input type="password" name="modp" value="<?php echo $r['modp'];?>"></td>
					</tr>

					</table>



          <div class="text-center"><button type="submit" name="identifier" class="button button2">Mettre à jour</button></div>
		  
					</form>
	<?php					}
?>
					</p>
                  </div>

                </div>
              </div>
              <div class="tab-pane" id="tab-2">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Liste de vos rendez vous</h3>
                    <p>
					<table class='table  table-bordered'>  
    <tr>
    <td>ID</td> 
    <td>Date</td>
    <td>Symptomes</td>
    <td>Docteur</td>
    <td>Status</td>
    </tr>
		<?php
						while($rd=$rdv->fetch())
	{?>
<tr>
    <td><?php echo $rd['id'];?></td> 
    <td><?php echo $rd['dater'];?></td>
    <td><?php echo $rd['sympt'];?></td>
    <td><?php echo $rd['nom'];?></td>
    <td><?php echo $rd['status'];?></td>
    </tr>
<?php

	}
	
?>
	</table>
				</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
											<?php
					while($r=$r2->fetch())
	{?>
					<form action="ajoutrdv.php" method="post">
					
					<input type="hidden" name="idcl" 	value="<?php echo $r['idcl'];?>">
					<input type="hidden" name="nom" 	value="<?php echo $r['nom'];?>">
					<input type="hidden" name="pren" value="<?php echo $r['pren'];?>">
					<input type="hidden" name="genre" value="<?php echo $r['genre'];?>">
					Date Rendez vous<br><input type="date" name="datr"><br>
					Symptomes<br><textarea class="form-control" name="sym" rows="5" placeholder="Veillez présenter les symptomes"></textarea><br>
					Docteur<br>	<select name="doc" id="doc" class="form-select">
						<option value="">Choisir un docteur</option>
						<?php
						while($r=$dc->fetch())
	{?>
						<option value=<?php echo $r['iddoc'];?>><?php echo $r['nom']." ". $r['prenom'];?></option>
<?php
	}
	?>
					</select>
					

					



          <div class="text-center"><button type="submit" name="identifier" class="button button2">Fixer RDV</button></div>
		  
					</form>
	<?php					}
?>
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-3">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Liste de vos consultations</h3>
<div class="col-lg-4 text-center order-1 order-lg-2">
<?php
					while($r=$r3->fetch())
	{?>
					<form action="ajoutcons.php" method="post">
					
					<input type="hidden" name="idcl" 	value="<?php echo $r['idcl'];?>">
					Titre <input type="text" class="form-control" name="tit" placeholder="Titre de votre consultation" required>
					Message<br><textarea class="form-control" name="msg" rows="5" placeholder="Veillez Saisir votre message" required></textarea><br>
					Docteur<br>	<select name="doc" id="doc" class="form-select">
						<option value="">Choisir un docteur</option>
						<?php
	}
						while($r2=$dc2->fetch())
	{?>
						<option value=<?php echo $r2['iddoc'];?>><?php echo $r2['nom']." ". $r2['prenom'];?></option>
<?php
	}
	?>
					</select>
					

					



          <div class="text-center"><button type="submit" name="identifier" class="button button2">Envoyer</button></div>
		  
					</form>

                  </div>
                                        <p>
					<table class='table  table-bordered'>  
    <tr>
    <td>ID</td> 
    <td>Titre</td>
    <td>Docteur</td>
    <td>Message</td>
	<td>Date</td>
	<td>Statut</td>
    </tr>
<?php
$rdv2=$cnx->prepare('Select * from consultations where idenv=?');
$rdv2->execute([$idm]);

						while($rd2=$rdv2->fetch())
	{?>
<tr>
    <td><?php echo $rd2['id'];?></td> 
    <td><?php echo $rd2['titre'];?></td>
		<?php			
			$i=$rd2['vers'];
		$dcc=$cnx->prepare('Select * from docteurs where iddoc=?');
		$dcc->execute([$i]);
		while($rr=$dcc->fetch())
	{
			  $np=$rr['nom']." ".$rr['prenom'];

	}
	?>
	<td><?php echo $np;?></td>
    <td><?php echo $rd2['message'];?></td>
    <td><?php echo $rd2['datenv'];?></td>
	<?php
	if ($rd2['status']="non")
	{
		$st="Non consulté";
	}
	else
	{
		$st="Consulté";
	}
		
	?>
	<td><?php echo $st;?></td>
    </tr>
<?php

	}
	
?>
	</table>
				</p>
					</div>

                </div>
              </div>
              <div class="tab-pane" id="tab-4">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Liste de vos Ordonnaces</h3>
                                        <p>
					<table class='table  table-bordered'>  
    <tr>
    <td>ID</td> 
    <td>Date</td>
    <td>Sujet</td>
    <td>Texte</td>
    <td>Status</td>
    </tr>
	</table>
				</p>
					</div>

                </div>
              </div>

            </div>
          </div>
        </div>

      </div>
    </section><!-- End Departments Section -->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">


    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Gharib Clinique</span></strong>. All Rights Reserved
        </div>

      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>

  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>