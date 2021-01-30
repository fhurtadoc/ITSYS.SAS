<?php
session_start();
if (isset($_SESSION['session'])) {
} else {
  header("Location: login.php");
} ?>
<?php include("conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>inter usuario</title>
  <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
  <script type="text/javascript" src="js/jquery/jquery-3.5.1.min.js"></script>
  <script src="./js/interfaceadmin.js"></script>
</head>
<?php
if (isset($_GET['estado'])) {
  $estado = $_GET['estado'];
  echo "<strong style= color:red>$estado</strong>";
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-info text-white">
  <a class="navbar-brand" href="#">Bienvenido</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <?php $usuario = $_SESSION['session'];
    $permiso = $usuario['permisos'];
    if ($permiso == 'administrador') : ?>
      <ul class="navbar-nav ml-auto">
        <li><a href="/viws/admin/perfiladmin.php" class="text-light">crear usuarios</a></li>
      </ul>
    <?php endif ?>
    <ul class="navbar-nav ml-auto">
      <li><a href="viws/admin/perfil.php" class="text-light">cambiar contraseña</a></li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li><a href="controlleradmin.php?action=cerrar" class="text-light">cerrar session</a></li>
    </ul>

  </div>
</nav>
<div class="container">
  <div class="row p-4">
    <div class="col-md-5">
      <div class="card">
        <div class="card-body">
          <!-- FORM TO ADD SERVICES -->
          <form id="form_services">
            <div class="form-group">
              <input type="text" id="name" placeholder="nombre" class="form-control">
            </div>
            <div class="form-group">
              <input type="text" id="category" placeholder="categoria" class="form-control">
            </div>
            <div class="form-group">
              <textarea id="description" cols="30" rows="10" class="form-control" placeholder="Descripcion"></textarea>
            </div>
            <div class="form-group">
              <input type="file" id="imagen" placeholder="categoria" class="form-control" name=imagen>
            </div>
            <input type="hidden" id="taskId">
            <button type="submit" class="btn btn-primary btn-block text-center bg-info text-white">
              GUARDAR SERVICIO
            </button>
          </form>
        </div>
      </div>
    </div>

    <div class="col-md-7">
      <div class="card my-4" id="task-result">
        <div class="card-body">
          <h2>servicios</h2>
          <ul id="container"></ul>
        </div>
      </div>

      <table class="table table-bordered table-sm">
        <thead>
          <tr>
            <td>Id</td>
            <td>Nombre</td>
            <td>Descripcion</td>
            <td>Categoria</td>
          </tr>
        </thead>
        <tbody id="services"></tbody>
      </table>
    </div>
  </div>
</div>


<div class="container">
  <div class="row p-4">
    <div class="col-md-5">
      <div class="card">
        <div class="card-body">
          <!-- FORM TO ADD TASKS -->
          <form id="form_products">
            <div class="form-group">
              <input type="text" id="name_product" placeholder="nombre" class="form-control">
            </div>
            <div class="form-group">
              <input type="text" id="category_product" placeholder="categoria" class="form-control">
            </div>
            <div class="form-group">
              <textarea id="description_product" cols="30" rows="10" class="form-control" placeholder="Descripcion"></textarea>
            </div>
            <div class="form-group">
              <input type="file" id="imagen_product" placeholder="categoria" class="form-control" name="imagen_product">
            </div>
            <input type="hidden" id="taskId">
            <button type="submit" class="btn btn-primary btn-block text-center bg-info text-white">
              GUARDAR PRODUCTO
            </button>
          </form>
        </div>
      </div>
    </div>

    <div class="col-md-7">
      <div class="card my-4" id="task-result">
        <div class="card-body">
          <h2>productos</h2>
          <ul id="container"></ul>
        </div>
      </div>
      <table class="table table-bordered table-sm">
        <thead>
          <tr>
            <td>Id</td>
            <td>Nombre</td>
            <td>Descripcion</td>
            <td>Categoria</td>
          </tr>
        </thead>
        <tbody id="products"></tbody>
      </table>
    </div>
  </div>
</div>