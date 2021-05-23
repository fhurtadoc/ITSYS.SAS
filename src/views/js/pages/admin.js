    // Temas del DOOM 

    listSevices();
    listProducts()

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
    console.log(data);

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
    let email=$("#email_hidden").val();
    if(password===password_2){
    let data={
        password:password,
        email:email
    }    
        $.ajax({
            url:"../../../controller/controllerUser.php?action=changePass",
            method:"post",
            data:data
        }).done(function (res){
            let data=JSON.parse(res);
            if(data.http===200){
                location.href = "../public/login.php" 
            }else{

            }
        })
    }else{
        document.getElementById("alerta_modalpass").removeAttribute("hidden");
    }

    }



    // CrearServicio
    $('#form_services').submit(e => {
        e.preventDefault();    
        
        let  formData = new FormData();
        let archivo = $('#imagen')[0].files[0];            
        let name= $("#name_service").val();
        let description= $("#description").val();
        let category= $("#category").val();
        let type="service"    
        
        formData.append("file", archivo);
        formData.append("name", name);
        formData.append("description", description);
        formData.append("category", category);
        formData.append("type", type);
        $.ajax({
            type: "post",
            url: "../../../controller/controllerServices.php?action=new_service",
            data: formData,
            contentType: false,
            processData: false,
            }).done(function (response) {
                
                listSevices();            
            });
        

    });
    // crear producto
    $('#form_products').submit(e => {
        e.preventDefault();    
        let  formData = new FormData();
        let archivo = $('#imagen_product')[0].files[0];            
        let name= $("#name_product").val();
        let description= $("#description_product").val();
        let category= $("#category_product").val();
        let type="product"    
        formData.append("file", archivo);
        formData.append("name", name);
        formData.append("description", description);
        formData.append("category", category);
        formData.append("type", type);
    
        $.ajax({
        type: "post",
        url: "../../../controller/controllerServices.php?action=new_service",
        data: formData,
        contentType: false,
        processData: false,
        }).done(function (response) {            
            
            listProducts()
        
        });
    });

    // Listar Delete


    function delete_(id) {
        $.ajax({
            url:"../../../controller/controllerServices.php?action=delete_service",
            method:"post",
            data:{id:id}

        }).done(function (response) {  
            listSevices();           
           listProducts() 
        }) 
    }


    // Listar Servicios

    function listSevices() {
        let deleteNivel = deleteDom_elements("services", "#services_rows");        
        let type="service"
        $.ajax({
            url:"../../../controller/controllerServices.php?action=list_services",
            method:"post",
            data:{type:type}

        }).done(function (response) {
            
            let services = JSON.parse(response);
            
            services.forEach((service, key) => {
                var service = `
                    <tr id="services_rows">
                        <td>${key+1}</td>
                        <td>${service.name}</td>                    
                        <td>${service.description}</td>                    
                        <td>${service.category}</td>                    
                        <td>
                        <a href="#" onclick="edit_service(${service.id})"><img src="../../css/img/editar.jpg" alt="editar" width="25" height="20"></a>              
                        <a href="#" onclick="delete_(${service.id})"><img src="../../css/img/delete.png" alt="eliminar" width="25" height="20"></a>              
                        </td>                    
                    </tr>
                `;

            $("#services").append(service);
        })
    })

    }


    // Listar Productos 

    function listProducts() {
        let deleteNivel = deleteDom_elements("products", "#products_rows");        
        let type="product"
        $.ajax({
            url:"../../../controller/controllerServices.php?action=list_services",
            method:"post",
            data:{type:type}

        }).done(function (response) {
            
            let services = JSON.parse(response);
            
            services.forEach((service, key) => {
                var products = `
                    <tr id="products_rows">
                        <td>${key+1}</td>
                        <td>${service.name}</td>                    
                        <td>${service.description}</td>                    
                        <td>${service.category}</td>                    
                        <td>
                        <a href="#" onclick="edit(${service.id})"><img src="../../css/img/editar.jpg" alt="editar" width="25" height="20"></a>              
                        <a href="#" onclick="delete_(${service.id})"><img src="../../css/img/delete.png" alt="eliminar" width="25" height="20"></a>              
                        </td>                    
                    </tr>
                `;

            $("#products").append(products);
        })
    })
        
    }

    

    function edit_service(id) {
        
    }



    function deleteDom_elements(n_principalString, n_internoString) {
        if (n_principalString != undefined && n_internoString != undefined) {
        let nodosprincipal = document.getElementById(n_principalString);
        let nodosinterno = document.querySelectorAll(n_internoString);
    
        nodosinterno.forEach((element) => {
            nodosprincipal.removeChild(element);
        });
            return "se elimino";
            } else {
            return "no existen";
            }
    }    


