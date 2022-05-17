<?php
$g=$_POST['genre'];
$n=$_POST['nom'];
$p=$_POST['pren'];
$ad=$_POST['adr'];
$v=$_POST['vil'];
$cp=$_POST['cp'];
$tl=$_POST['tel'];
$ml=$_POST['mail'];
$as=$_POST['assur'];
$msg=$_POST['message'];




$cnx=new PDO('mysql:host=localhost;dbname=clinica;charset=utf8','root','');

$sql="INSERT INTO devis(genre,nom,pren,adr,ville,cp,tel,email,assur,msg) VALUES (?,?,?,?,?,?,?,?,?,?)";
$req=$cnx->prepare($sql);
$req->execute([$g, $n, $p, $ad, $v, $cp, $tl, $ml, $as, $msg]);
	
echo '<script type="text/javascript">'; 
echo 'alert("Devis envoyée avec  succées");';
echo 'window.location.href = "devis.html";';
echo '</script>';

?>