<?php
  $cnx=new PDO('mysql:host=localhost;dbname=clinica;charset=utf8','root','');
	  $cnid=$_POST['update_id'];
	  $cl=$_POST['clid'];
      $dc=$_POST['docid'];
      $tit=$_POST['fname'];
      $ord=$_POST['lname'];
	  $dt=date('Y/m/d');
	  $prf="docteur";
	  $st="oui";
	  $sql="INSERT INTO consultations(idenv,titre,message,datenv,profile,vers,statut) VALUES (?,?,?,?,?,?,?)";
	  $req=$cnx->prepare($sql);
	  $req->execute([$dc, $tit, $ord, $dt, $prf, $cl, $st]);
	  $sql2="UPDATE consultations Set statut=? where id=?";
	  $req2=$cnx->prepare($sql2);
	  $req2->execute([$st,$cnid]);
	  echo '<script type="text/javascript">'; 
echo 'alert("Consultation ajoutée avec succées");';
echo 'window.location.href = "consultation.php";';
echo '</script>';

?>


      