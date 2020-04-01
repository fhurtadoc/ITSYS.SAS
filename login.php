<!DOCTYPE html>
<html lang="es">
<head>    
    <title>Login</title>
</head>
<?php include_once 'views/includes/header.php'; ?>
<?php if (isset($_GET['estado'])) : ?>
    <?php $estado = $_GET['estado'];
    if ($estado = 'email' || $estado = 'password') : ?>
        <strong style=color:red>ingresar email y contraseña correcta </strong>
    <?php endif ?>
<?php endif ?>
<style>
    h1{
        margin-left: 200px;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary text-white">
  <a class="navbar-brand" href="#">Login Itsys</a>  
  <a  class="text-light_volver" href="index.php">Volver</a>  
</nav>
<div class="container login-container">
    <div class="row">
        <div class="col-md-6 login-form-1">
            <h3>Entrar como administrador</h3>
            <form action="controlleradmin.php?action=login" method="POST" id="login">
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="text" name="email" id="email">
                </div>
                <div class="form-group">
                    <label for="password">password</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="form-group">
                    <input type="submit" value="enviar" class="btn bg-primary mb-2 ">
                </div>
                <a href="login.php?forgot" class="btn bg-primary mb-2">recordar contraseña</a>
            </form>
        </div>
        <?php if (isset($_GET['estadoForgot'])) : ?>
            <?php $estado = $_GET['estadoForgot'];
            if ($estado = 'email') : ?>
                <strong style=color:red>ingresar email correcto </strong>
            <?php endif ?>
        <?php endif ?>

        <?php if (isset($_GET['forgot'])) : ?>
            <div class="col-md-6 login-form-2">
                <h3>Recordar contraseña</h3>
                <form action="controlleradmin.php?action=forgot" method="POST">
                    <div class="form-group">
                        <label for="email" class="text-white">email</label>
                        <input type="text" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="recordar" class="btn btn-primary mb-2">
                    </div>
                </form>

            </div>
    </div>
</div>
<?php endif ?>
</html>
