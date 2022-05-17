<?php
$id=$_POST['idcl'];
$tit=$_POST['tit'];
$msg=$_POST['msg'];
$dt=date('Y/m/d');
$prof="patient";
$dc=$_POST['doc'];
$st="non";

$cnx=new PDO('mysql:host=localhost;dbname=clinica;charset=utf8','root','');

$sql="INSERT INTO consultations(idenv,titre,message,datenv,profile,vers,statut) VALUES (?,?,?,?,?,?,?)";
$req=$cnx->prepare($sql);
$req->execute([$id, $tit, $msg, $dt, $prof, $dc, $st]);
echo '<script type="text/javascript">'; 
echo 'alert("Consultation ajoutée avec succées");';
echo 'window.location.href = "espaceclient.php";';
echo '</script>';

?>

