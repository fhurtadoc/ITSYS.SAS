<head>
    <?php include_once("../../includes/headers.php") ?>   
   
    <link rel="stylesheet" href="../../css/login.css">
    
</head>
<body>
    <div class="continer container">
        <div class="row">
            <div class="col">
                ITSYS SAS 
            </div>            
            <div class="col">
                REGRESAR
            </div>
        </div>
        <div class="row">        
            <div class="col">
                <div class="card_orient card" style="width: 18rem;">                    
                    <div class="card-body">                            
                                <h3>LOGIN ITSYS.SAS </h3>
                                <img src="../../../views/css/img/logoprincipal.png" alt="ITSYS" width="70" height="40" >
                                <div class="form-group">
                                    <label for="Email">Email</label>
                                    <input type="email" class="form-control" id="Email_login" aria-describedby="emailHelp" placeholder="Enter email">                                    
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="Password_login" placeholder="Password">
                                </div>     
                </div>
                    <a href="#" class="btn btn-primary" onclick="login()">Entrar</a>                    
                </div> 
                <button type="button" class="btn btn-link" data-dismiss="modal" onclick="modalForgot()">recordar contraseña</button>                
            </div>            
            
        </div>
        
        <div class="row"></div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Recordar Contraseña</h5>        
            </div>
            <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" id="recuperarEmail" aria-describedby="emailHelp" placeholder="Enter email">                                    
                        </div> 
                        <div class="form-group">                                               
                            <button type="button" class="btn btn-primary" onclick="forgot()" style="margin-top:30px ;">Recuperar Contraseña</button>                            
                        </div>                                                    
                    </form>    
            </div>
            <div class="modal-footer">        
            </div>
            </div>
        </div>
    </div>
    
    
<script src="../../js/pages/login.js"></script>    
</body>
</html>