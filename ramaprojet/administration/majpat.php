<?php
$cnx=new PDO('mysql:host=localhost;dbname=clinica;charset=utf8','root','');
	  $mat=$_POST['mat'];
      $ds=$_POST['dosm'];
	  $sql="Select * from clients where mat=?";
	  $req=$cnx->prepare($sql);
	  $req->execute([$mat]);
	  if ($req->rowCount()< 1)
	  {
		  	  echo '<script type="text/javascript">'; 
			echo 'alert("Matricule inexistant merci de le vérifier");';
			echo 'window.location.href = "dossier.php";';
			echo '</script>';
	  }
	  else
	  {
		  
	  $sql2="UPDATE clients Set dos_med=? where mat=?";
	  $req2=$cnx->prepare($sql2);
	  $req2->execute([$ds,$mat]);
	  echo '<script type="text/javascript">'; 
echo 'alert("Mise à jour effectué avec succées");';
echo 'window.location.href = "dossier.php";';
echo '</script>';
	  }
	  ?>