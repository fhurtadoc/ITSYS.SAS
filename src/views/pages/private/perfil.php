<?php 
session_start();
$User=$_SESSION['USUARIO'];
if (isset($_SESSION['USUARIO'])) {
} else {
    header("Location: ../public/login.php");
}
$name_user=$User[0]['name'];
$permisos=$User[0]['permisos'];
$email=$User[0]['email'];


?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <?php include_once("../../includes/headers.php") ?>      
    <link rel="stylesheet" href="../../css/admin.css">     
    
</head>
<body>
    <div class="container">        
                <nav class=" navbar navbar-expand-lg navbar-dark  bg-primary">
                    <a class="navbar-brand" href="#">ITSYS</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">INICIO<span class="sr-only">(home)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="modalPass()">CAMBIAR CONSTRASEÑA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="modalNewUser()">NUEVO USUARIO</a>                            
                        </li>                        
                        <li>
                            <p id="saludo">Bienvenido <strong><?php echo $name_user ?></strong></p>                        
                        </li>
                        <li>
                            <a href="../../../controller/controllerLogin.php?action=cerrar" class="nav-link" >salir</a> 
                        </li>
                        </ul>
                    </div>
                </nav>            
        </div>

        <div class="container">
  <div class="row p-4">
    <div class="col-md-5">
      <div class="card">
        <div class="card-body">
          <!-- FORM TO ADD SERVICES -->
          <form id="form_services">
          
            <div class="form-group">
            
              <input type="text" id="name_service" placeholder="nombre" class="form-control">
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
            <button type="submit" class="btn btn-primary btn-block text-center bg-info text-white" >
              GUARDAR SERVICIO
            </button>
          </form>
        </div>
      </div>
    </div>

            <div class="col-md-7">
            <div class="card my-4" id="task-result">
                <div class="card-body">
                <h2>Servicios</h2>
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
                    <td>Acciones</td>
                    
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
                <h2>Productos</h2>
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

<div class="modal fade" id="Modal_pass" tabindex="-1" role="dialog" aria-labelledby="Modal_pass" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CAMBIAR PASSWORD</h5>        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>       
      </div>
      <p id="alerta_modalpass" hidden >Los password no coinciden</p>
      <div class="modal-body">            
            <input type="hidden" name="email_hidden" id="email_hidden" value=<?php echo $email ?>>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" id="password">
              <a href="#" onclick="verPass(1)"><img src="../../css/img/descarga.png" alt="ver" width="20" height="20"></a>
            </div>
            <div class="form-group">              
              <label for="password_2">Confirmar Password</label>
              <input type="password" name="password_2" id="password_2">
              <a href="#" onclick="verPass(2)"><img src="../../css/img/descarga.png" alt="ver" width="20" height="20"></a>              
            </div>            
      </div>
      <div class="modal-footer">    
        <button type="button" class="btn btn-primary" onclick="changePass()">Cambiar Pass</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>    
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="Modal_newUser" tabindex="-1" role="dialog" aria-labelledby="Modal_newUser" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Nuevo Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" id="email">                            
            </div>
            <div class="form-group">
              <label for="nombre">Nombre</label>
              <input type="text" name="nombre" id="nombre">                            
            </div>
            <div class="form-group">
              <label for="permisos">Permisos</label>
              <select name="permisos" id="permisos">
                  <option value="administrador">Adminsitrador</option>              
                  <option value="gestor">Gestor</option>              
                  <option value="invitado">Invitado</option>              
              </select>
            </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="createUser()">Crear Nuevo Usuario</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

    <script src="../../js/pages/admin.js"></script>
</body>
</html>