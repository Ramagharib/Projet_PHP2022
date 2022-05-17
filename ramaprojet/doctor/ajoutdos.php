<?php
  $cnx=new PDO('mysql:host=localhost;dbname=clinica;charset=utf8','root','');
	  $mat=$_POST['mat'];
	  $nm=$_POST['nom'];
      $pr=$_POST['pren'];
	  $gr=$_POST['gr'];
      $datn=$_POST['datn'];
      $adr=$_POST['adr'];
      $dosm=$_POST['dosm'];
	  $tel=$_POST['tel'];
	  $em=$_POST['email'];

	  $sql="INSERT INTO clients(mat,nom,pren,genre,datn,adr,dos_med,tel,email,modp) VALUES (?,?,?,?,?,?,?,?,?,?)";
	  $req=$cnx->prepare($sql);
	  $req->execute([$mat, $nm, $pr, $gr, $datn, $adr, $dosm, $tel, $em, $mat]);
	  
	  echo '<script type="text/javascript">'; 
echo 'alert("Patient ajouté avec succées");';
echo 'window.location.href = "dossier.php";';
echo '</script>';
?>


      