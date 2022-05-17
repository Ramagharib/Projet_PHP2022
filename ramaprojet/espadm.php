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
	}

	header("location:administration/index.php");

}
else
{
	
echo '<script type="text/javascript">'; 
echo 'alert("Merci de verifier vos informations");';
echo 'window.location.href = "espadm.php";';
echo '</script>';
}
}

?>


<html>
<head>
	<title>Espace Administrateur</title>
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
			<form method='POST' action="espadm.php">
				<img src="img/avatar.svg">
				<h2 class="title">Bienvenu</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Nom utilisateur</h5>
           		   		<input type="text" name="user" class="input" require >
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Mot de passe</h5>
           		    	<input type="password" name="pass" class="input" require >
            	   </div>
            	</div>
            	<a href="#"> Mot de passe perdu ?</a>
								<a href="admin.php"> Retour au site</a>

            	<input type="submit" class="btn" name="Login" value="Login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
