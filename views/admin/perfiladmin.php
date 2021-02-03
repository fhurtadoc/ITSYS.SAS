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
  <title>usuarios admin</title>
</head>
<body>
  
</body>
</html>


<style>
h1{
  margin-left: 400px;
}
.form_newuser{
  width: 500px;
  background-color:#E7E7FF ;
  margin-left: 400px;
  padding: 20px;  
  border-radius: 5px;
  box-shadow: 1px 2px 2px black;
 }
 

</style>
<h1>crear usuarios admin</h1>
<form action="../../controlleradmin.php?action=logout" method="POST" class="form_newuser">
<div>
  
<label for="email" for="exampleInputEmail1">email</label>
<input type="text"placeholder="nombre@example.com"  name="email" id="exampleFormControlInput1">
<small id="emailHelp" class="form-text text-muted">ingresar el correo del usuario que desea crear</small>


    <label for="permisos" >permisos</label>
    <select name="permisos" id="permisos" class="browser-default custom-select" >
    <option value="administrador">administrador</option>
    <option value="gestor">gestor</option>
    <option value="invitado">invitado</option>
    </select>
    <small id="emailHelp" class="form-text text-muted">determine los permisos que desea darle</small>
    <input type="submit" value="enviar" class="btn btn-primary mb-2"> 

</div>
   
</form>