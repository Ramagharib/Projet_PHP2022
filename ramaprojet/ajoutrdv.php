<?php
$id=$_POST['idcl'];
$n=$_POST['nom'];
$p=$_POST['pren'];
$g=$_POST['genre'];
$s=$_POST['sym'];
$dc=$_POST['doc'];
$d=$_POST['datr'];
$st="N";

$cnx=new PDO('mysql:host=localhost;dbname=clinica;charset=utf8','root','');

$sql="INSERT INTO rendezvous(idcl,nom,pren,genre,sympt,iddoc,dater,status) VALUES (?,?,?,?,?,?,?,?)";
$req=$cnx->prepare($sql);
$req->execute([$id,$n, $p, $g, $s, $dc, $d, $st]);
	
echo '<script type="text/javascript">'; 
echo 'alert("Rendez vous ajouté avec succées");';
echo 'window.location.href = "espaceclient.php";';
echo '</script>';

?>