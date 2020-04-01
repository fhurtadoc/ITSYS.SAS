$(document).ready(function(){

    fretchServices();
    fretchproducts();

    function fretchServices(){
        $.get('../../controlleradmin.php?action=list_services', function(response, err){                
            
            let services= JSON.parse(response);
            services.forEach(service => {            
             var service=`
             <div class=card style="background-image:linear-gradient(to right,
                rgba(0, 0, 0, 0.5),
                rgba(0, 0, 0, 0.5)
               ),url(../../img/img_services/${service.imagen});">
                <img src="" alt="">	                
                <h1>${service.name}</h1>
                <h2>${service.category}</h2>
				<p>${service.description}</p>				
			</div>
           `
           $("#cards-pages").append(service); 
                
            });
 
        })
       }


       function fretchproducts(){
        $.get('../../controlleradmin.php?action=list_product', function(response, err){ 
         let products= JSON.parse(response);
         products.forEach(product => {            
          var products=`
          <div class=card style="background-image:linear-gradient(to right,
            rgba(0, 0, 0, 0.5),
            rgba(0, 0, 0, 0.5)
           ),url(../../img/img_services/${product.imagen}); >
                <img src="" alt="">	                
                <h1>${product.name}</h1>
                <h2>${product.category}</h2>
				<p>${product.description}</p>				
			</div>
        `
        $("#cards-pages-products").append(products); 
             
         });
 
     }) 
   }  


    let flag = false;
    let scroll;
    let menu=document.getElementById("head");
    let letra=document.querySelector(" ul li a");
    
    $(window).scroll(function(){
        scroll=$(window).scrollTop();
        if(scroll>30){
         if(!flag){
         menu.style.background="#018ABE";          
		 flag = true;
         }            
        }else{
            menu.style.background="none";            
            flag=false;
        }       

    });




});