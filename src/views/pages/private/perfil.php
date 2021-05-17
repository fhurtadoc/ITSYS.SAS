<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <?php include_once("../../includes/headers.php") ?>      
    <link rel="stylesheet" href="../../css/admin.css">    
</head>
<body>
    <div class="container">
        <div class="row">            
                <nav class="navbar navbar-expand-lg navbar-dark  bg-primary">
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
                            <a class="nav-link" href="#">CAMBIAR CONSTRASEÑA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">NUEVO USUARIO</a>
                        </li>                        
                        </ul>
                    </div>
                </nav>
            </div>       
        </div>

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
    

    
</body>
</html>