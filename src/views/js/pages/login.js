
function modalForgot() {
    $("#exampleModal").modal("show")    
}


function login(){
    let email=$("#Email_login").val()
    let pass=$("#Password_login").val()
    let data={
        email:email,
        pass:pass
    }
    console.log(data);
        
    $.ajax({
        url: "../../../controller/controllerLogin.php?action=login", 
        method:"post",
        data:data    
    }).done(function(res) {
        let data=JSON.parse(res);        
        if(data.http===200){                       
            location.href = "../private/perfil.php"            
        }else{
            location.reload(); 
            
        }
    })
}


function forgot(){
    let email=$("#recuperarEmail").val()    
    let data={
        email:email,        
    }
    console.log(data);
        
    $.ajax({
        url: "../../../controller/controllerLogin.php?action=forgot", 
        method:"post",
        data:data    
    }).done(function(res) {
        console.log(res);        
    })
}

