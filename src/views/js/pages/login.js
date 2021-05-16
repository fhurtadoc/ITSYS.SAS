function login(){
    let email=$("#email").val()
    let pass=$("#pass").val()
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
        console.log(res);        
    })
}