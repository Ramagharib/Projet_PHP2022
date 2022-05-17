<?php
$cnx=new PDO('mysql:host=localhost;dbname=clinica;charset=utf8','root','');
	 $id=$_POST['delete_id'];
	 

		  
	  $sql2="Delete from contact where id=?";
	  $req2=$cnx->prepare($sql2);
	  $req2->execute([$id]);
	  echo '<script type="text/javascript">'; 
echo 'alert("Suppression effectuée avec succées");';
echo 'window.location.href = "message.php";';
echo '</script>';
	  
	  ?>