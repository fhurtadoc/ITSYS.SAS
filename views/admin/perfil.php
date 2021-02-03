<?php
session_start();
if (isset($_SESSION['session'])) {
} else {
    header("Location: login.php");
} ?>
<?php 
if (isset($_GET['estado'])) {
  $estado=$_GET['estado'];  
  echo "<strong style= color:red>$estado</strong>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"> 
  <?php include_once '../includes/header.php'; ?> 
  <title>Perfil</title>
</head>
<body>
  
</body>
</html>
<h1>cambiar contraseña</h1>

<style>
h1{
  margin-left: 400px;
}
.form_newpass{
  width: 500px;
  background-color:#E7E7FF ;
  margin-left: 400px;
  padding: 20px;  
  border-radius: 5px;
  box-shadow: 1px 2px 2px black;
 } 

</style>

<form action="../../controlleradmin.php?action=chance_pass" method="POST" class="form_newpass">
    <div>
    <label for="email">email</label>
    <input type="text" name="email" id="email" id="exampleFormControlInput1">
    </div>
    <div>
    <label for="password">password</label>
    <input type="text" name="password" id="password" id="exampleFormControlInput1">
    </div>
    
    <input type="submit" value="enviar" class="btn btn-primary mb-2">    
</form>