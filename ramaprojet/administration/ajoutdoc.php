<?php
$n=$_POST['fname'];
$p=$_POST['lname'];
$sp=$_POST['spec'];
$tl=$_POST['tel'];
$em=$_POST['email'];
$lg=$_POST['login'];
$mp=$_POST['modp'];



$cnx=new PDO('mysql:host=localhost;dbname=clinica;charset=utf8','root','');

$sql="INSERT INTO docteurs(nom,prenom,specialite,tel,email,login,modp) VALUES (?,?,?,?,?,?,?)";
$req=$cnx->prepare($sql);
$req->execute([$n, $p, $sp, $tl, $em, $lg, $mp]);
	
echo '<script type="text/javascript">'; 
echo 'alert("Docteur ajouté avec succées");';
echo 'window.location.href = "docteurs.php";';
echo '</script>';

?>