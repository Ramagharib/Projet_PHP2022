<?php
session_start();
?>
<!doctype html>
<html >
<head>
  <title>Patients</title>
</head>
<body>
  <?php
  include("../include/header.php");
  include("../include/connection.php");

  ?>
  <div class="container-fluid">
  <div class="col-md-12">
  <div class="row">
  <div class="col-md-2" style="margin-left: -30px;">
  <?php
  include("sidenav.php");
  ?>
  </div>
  <div class="col-md-10">
  <div class="col-md-12">
  <div class="row">
  <div class="col-md-6">
  <h5 class="text-center my-4">Liste des Patients</h5>
  <?php
  $query="SELECT * FROM multiuserlogin WHERE profile ='patient'";
  $res=mysqli_query($connect,$query);
  $output="
    <table class='table  table-bordered'>  
    <tr>
    <th>ID</th> 
    <th>Nom d'utilisateur</th> 
    <th style='width:10%;'>Action</th>
    </tr>
 
    ";
  if (mysqli_num_rows($res) < 1 ) {
    $output .= "    
    <tr><td colspan='3' class='text-center'>No New Pateint</td> </tr>
    ";

  }
  while($row=mysqli_fetch_array($res)){
    $ID=$row['ID'];
    $username=$row['username'];
    $output .="
    <tr>
    <td>$ID</td> 
    <td>$username</td> 
    <td>
    <a href='patients.php?ID=$ID'><button ID='$ID' class='btn btn-danger remove'>Supprimer</button></a>
    </td>
    ";

  }
  $output .="
  </tr> 


  </table>
";
    echo $output;
    if(isset($_GET['ID'])){
        $ID=$_GET['ID'];
        $query="DELETE FROM multiuserlogin WHERE ID='$ID'";
        mysqli_query($connect,$query);

    }
  ?>

    
     
   


  </div>
  <div class="col-md-6">
  <?php
  if (isset($_POST['add'])){
      $uname=$_POST['uname'];
      $pass=$_POST['pass'];
      $image=$_FILES['img']['name'];
      $error=array();
      if (empty($uname)){
        $error['u']="Enter Patient Username";
      }else if(empty($pass)){
        $error['u']="Enter Patient Password";
      }else if(empty($image)){
        $error['u']=" Add Patient Picture ";
         
      }
      if(count($error)==0){
          $q="INSERT INTO multiuserlogin(username,password,image) VALUES('$uname','$pass','$image')";
          $result=mysqli_query($connect,$q);
          if ($result){
                move_uploaded_file($_FILES['img']['tmp_name'],"img\$image");
          }else{

          }
      }
         

      }

if(isset($error['u'])){
    $er=$error['u'];
    $show="<h5 class='text-center alert alert-danger'>$er</h5>";

}else{
    $show="";
}
  
  ?>



  <h5 class="text-center my-4">Ajouter un Patient</h5>
  <form method="post" enctype="multipart/form-data">
  <div>
  <?php
  echo $show;
  ?>
  
  </div>
  <div class="from-group">
  <label>Nom d'utilisateur</label>
  <input type="text" name="uname" class="form-control" autocomplete="off">

  </div>
  <div class="from-group">
  <label>Mot de passe</label>
  <input type="password" name="pass" class="form-control" >

  </div>
  <div class="from-group">
  <label>Photo de Patient</label>
  <input type="file" name="img" class="form-control" >
  </div><br>
  <input type="submit" name="add" value="Ajouter" class="btn btn-success">
  </div>
                         <div class="img ">
		                    <img style="float: right; margin: 0px 0px 0px 400px;" src="../img/pat.svg"  WIDTH=950 HEIGHT=230  >
		                </div>
  </form>
  


  </div>
  </div>
  
</body>
</html>