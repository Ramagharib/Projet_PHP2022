<?php
$mt=$_POST['mat'];
$n=$_POST['nom'];
$p=$_POST['pre'];
$g=$_POST['genre'];
$d=$_POST['datn'];
$a=$_POST['adr'];
$t=$_POST['tel'];
$e=$_POST['email'];
$m=$_POST['mdp'];


$cnx=new PDO('mysql:host=localhost;dbname=clinica;charset=utf8','root','');

$sql="INSERT INTO clients(mat,nom,pren,genre,datn,adr,tel,email,modp) VALUES (?,?,?,?,?,?,?,?,?)";
$req=$cnx->prepare($sql);
$req->execute([$mt,$n, $p, $g, $d, $a, $t, $e, $m]);
	
echo '<script type="text/javascript">'; 
echo 'alert("Inscription effectuée avec succées");';
echo 'window.location.href = "login.php";';
echo '</script>';

?>