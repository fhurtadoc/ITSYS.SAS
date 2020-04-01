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
         <form action="" id="crearimagen">
           <label for="nombre">nombre</label>
           <input type="text" id="nombre" name="nombre"> </br>
           <label for="imagen_gallery">imagen</label> 
           <input type="file" name="imagen" id="imagen_gallery">
           <input type="submit" value="enviar">
         </form>
     </div>
   </div>

<div class="row_gallery">
  <div class="column_gallery">
    <div class="card_gallery">
    <button type="button" class="btn btn-danger">Eliminar</button>
    <button type="button" class="btn btn-primary active">Editar</button>
    </div>
  </div>
  <div class="column_gallery">
    <div class="card_gallery">..</div>
  </div>
  <div class="column_gallery">
    <div class="card_gallery">..</div>
  </div>
  <div class="column_gallery">
    <div class="card_gallery">..</div>
  </div>
  <div class="column_gallery">
    <div class="card_gallery">..</div>
  </div>
  <div class="column_gallery">
    <div class="card_gallery">..</div>
  </div>
  <div class="column_gallery">
    <div class="card_gallery">..</div>
  </div>
  <div class="column_gallery">
    <div class="card_gallery">..</div>
  </div>
</div> 

  
</body>
