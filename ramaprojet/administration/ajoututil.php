<?php
$n=$_POST['fname'];
$p=$_POST['lname'];
$l=$_POST['log'];
$m=$_POST['mdp'];



$cnx=new PDO('mysql:host=localhost;dbname=clinica;charset=utf8','root','');

$sql="INSERT INTO utilisateurs(nom,pren,login,modp) VALUES (?,?,?,?)";
$req=$cnx->prepare($sql);
$req->execute([$n, $p, $l, $m]);
	
echo '<script type="text/javascript">'; 
echo 'alert("Utilisateur ajouté avec succées");';
echo 'window.location.href = "utilisateurs.php";';
echo '</script>';

?>