$(document).ready(function(){
    $("#head").css('background-color','#018ABE')

    list_services()

    function list_services(){
        let type="service"
        $.ajax({
            url:"../../../controller/controllerServices.php?action=list_services",
            method:"post",
            data:{type:type}
        }).done(function(res){
            let services= JSON.parse(res);
            services.forEach(service => {            
                var service=`
                <div class=card style="background-image:linear-gradient(to right,
                   rgba(0, 0, 0, 0.5),
                   rgba(0, 0, 0, 0.5)
                  ),url(../../../../img/services/${service.imagen});">
                   <img src="" alt="">	                
                   <h1  style="color:#ccc;">${service.name}</h1>
                   <h2  style="color:#ccc;">${service.category}</h2>
                   <p  style="color:#ccc;">${service.description}</p>				
               </div>
              `
              $(".continer_solucions").append(service); 
                   
               });
        })
    }    

})