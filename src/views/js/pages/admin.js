// Temas del DOOM 

function modalPass(){
    $("#Modal_pass").modal("show");
}

function modalNewUser(){
    $("#Modal_newUser").modal("show");
}

function verPass(num){
    if(num===1){
        
        $("#password").attr("type", "text"); 
    }

    if(num===2){
        $("#password_2").attr("type", "text"); 
    }

}

// Consultas


// CrearUsuario

function createUser() {

    let email=$("#email").val();
    let nombre=$("#nombre").val();
    let permisos=$("#permisos").val();

    let data={
        email:email,
        nombre:nombre,
        permisos:permisos

    }

    $.ajax({
        url:"../../../controller/controllerUser.php?action=crearUser",
        method:"post",
        data:data
    }).done(function (res) {
        console.log(res);
    })
}

// Cambiar Contraseña 
function changePass() {
    let password=$("#password").val();
    let password_2=$("#password_2").val();
    if(password===password_2){

        $.ajax({
            url:"../../../controller/controllerUser.php?action=changePass",
            method:"post",
            data:password
        }).done(function (res){
            console.log(res);
        })
    }else{
        document.getElementById("alerta_modalpass").removeAttribute("hidden");
    }

}



// CrearServicio

function createService(num) {
    let name_service=$("#name_service").val();
    let category=$("#category").val();
    let description=$("#description").val();
    let type="";
    if(num==1){
        type="Service";
    }else{
        type="Product";
    }    

    let data={
        name_service:name_service,
        category:category,
        description:description, 
        type:type
    }

    $.ajax({
        url:"../../../controller/controllerService.php?action=crear",
        method:"post",
        data:data
    }).done(function (res) {
        console.log(res);
    })
}


// Listar Servicios

function listSevices() {
    $.ajax({
        url:"../../../controller/controllerService.php?action=listService",
        method:"get",        
    }).done(function (res) {
        console.log(res);
    })
}


// Listar Productos 

function listProducts() {
    $.ajax({
        url:"../../../controller/controllerService.php?action=listProducts",
        method:"get",        
    }).done(function (res) {
        console.log(res);
    })
        
}


