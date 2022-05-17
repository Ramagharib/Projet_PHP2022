<?php
$n=$_POST['nom'];
$ml=$_POST['email'];
$suj=$_POST['subject'];
$msg=$_POST['message'];




$cnx=new PDO('mysql:host=localhost;dbname=clinica;charset=utf8','root','');

$sql="INSERT INTO contact(nom,email,suj,msg) VALUES (?,?,?,?)";
$req=$cnx->prepare($sql);
$req->execute([$n, $ml, $suj, $msg]);
	
echo '<script type="text/javascript">'; 
echo 'alert("Message envoyée avec  succées");';
echo 'window.location.href = "contact.html";';
echo '</script>';

?>