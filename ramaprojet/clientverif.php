<?php

$l=$_POST['log'];
$m=$_POST['mdp'];

$cnx=new PDO('mysql:host=localhost;dbname=clinica;charset=utf8','root','');
$req=$cnx->prepare('Select * from clients where email=? and modp=?');
$req->execute([$l, $m]);
$nb=$req->rowCount();
if ($nb>0)
{
	session_start();
	while($r=$req->fetch())
	{
	$_SESSION["log"]=$r['idcl'];
	}
	header("location:espaceclient.php");
}
else
{
	
echo '<script type="text/javascript">'; 
echo 'alert("Merci de verifier vos informations");';
echo 'window.location.href = "login.php";';
echo '</script>';}

?>
