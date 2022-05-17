<?php

if(isset($_POST['Login'])){
$user=$_POST['user'];
$pass = $_POST['pass'];
$cnx=new PDO('mysql:host=localhost;dbname=clinica;charset=utf8','root','');
$req=$cnx->prepare('Select * from utilisateurs where login=? and modp=?');
$req->execute([$user, $pass]);
$nb=$req->rowCount();
if ($nb>0)
{
	session_start();
	while($r=$req->fetch())
	{
	$_SESSION["log"]=$r['login'];
	$prof=$r['profil'];
	}
	if($prof=="doc")
	{
	header("location:doctor/index.php");
	}
}
else
{
	
echo '<script type="text/javascript">'; 
echo 'alert("Merci de verifier vos informations");';
echo 'window.location.href = "admin.php";';
echo '</script>';
}
}

?>


<html>
<head>
	<title>Administration</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
			<img src="img/bg.svg">
		</div>
		<div class="login-content">
			<form method='POST' action="admin.php">
				<img src="img/avatar.svg">
				<h2 class="title">Bienvenu</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5><a href="espdoc.php">Espace Docteurs</a></h5>
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		    	<h5><a href="espadm.php">Espace Administration</a></h5>
            	   </div>
            	</div>
            	<a href="#"> Mot de passe perdu ?</a>
				<a href="index.html"> Retour au site</a>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
