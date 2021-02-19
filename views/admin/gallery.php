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
  <link rel="stylesheet" href="../../css/stylesadmin.css">
  <title>album</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-info text-white">
  <a class="navbar-brand" href="#">Bienvenido a la galeria</a>  
  <a  class="text-light_volver" href="<?php echo _DOMAIN?>interfaceadmin.php">Volver</a>  
</nav>
<div class="container">
      <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Subir Nueva Imagen</button>
      <div id="demo" class="collapse">
         <form action="../../controlleradmin.php?action=insert_image" id="crearimagen" method="POST" enctype="multipart/form-data">
           <label for="nombre">nombre</label>
           <input type="text" id="nombre" name="nombre"> </br>
           <label for="imagen">imagen</label> 
           <input type="file" name="imagen" id="imagen_gallery">
           <input type="submit" value="Enviar">
         </form>
     </div>
   </div>

<div class="row_gallery" id="row_gallery">
  
</div> 

  
</body>
