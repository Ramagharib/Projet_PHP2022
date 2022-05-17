<?php
$cnx=new PDO('mysql:host=localhost;dbname=clinica;charset=utf8','root','');
	 $id=$_POST['update_id'];
	 $nom=$_POST['fname'];
     $pren=$_POST['lname'];
	 $log=$_POST['log'];
	 $mdp=$_POST['mdp'];

		  
	  $sql2="UPDATE utilisateurs Set nom=?,pren=?,login=?,modp=? where id=?";
	  $req2=$cnx->prepare($sql2);
	  $req2->execute([$nom, $pren, $log, $mdp, $id]);
	  echo '<script type="text/javascript">'; 
echo 'alert("Mise à jour effectué avec succées");';
echo 'window.location.href = "utilisateurs.php";';
echo '</script>';
	  
	  ?>