 $(document).ready(function(){
  fretchServices();
  fretchproducts();
   function fretchServices(){
       $.get('./controlleradmin.php?action=list_services', function(response, err){                
           
           let services= JSON.parse(response);
           services.forEach(service => {            
            var service=`
            <tr taskId="${service.id}">
            <td>${service.id}</td>
            <td>${service.name}</td>
            <td>
            <a href="#" class="task-item">
              ${service.description} 
            </a>
            </td>
            <td>${service.category}</td>
            <td>
            <a href="./controlleradmin.php?action=delete_service&id=${service.id}" class="task-delete btn btn-danger"  >
            Delete 
           </a>
            </td>
            </tr>
          `
          $("#services").append(service); 
               
           });

       })
      }

$('#form_services').submit(e=>{
  e.preventDefault();
  const postData = {
    name:$('#name').val(),
    description:$('#description').val(),
    category:$('#category').val(),
    imagen:$('#imagen').val()
  }
  $.post('./controlleradmin.php?action=newservice', postData, (response)=>{
    console.log(response);
    $('#form_services').trigger('reset');
      fretchServices();
  })
})

function fretchproducts(){
       $.get('./controlleradmin.php?action=list_product', function(response, err){ 
        let products= JSON.parse(response);
        products.forEach(product => {            
         var product=`
         <tr>         
         <td>${product.id}</td>
         <td>${product.name}</td>
         <td>
         <a href="#" class="prduct-item">
           ${product.description} 
         </a>
         </td>
         <td>${product.category}</td>
         <td>
           <a href="./controlleradmin.php?action=delete_product&id=${product.id}" class="task-delete btn btn-danger"  >
            Delete 
           </a>
         </td>
         </tr>
       `
       $("#products").append(product); 
            
        });

    }) 
  }  
  
  $('#form_products').submit(e=>{
    e.preventDefault();
    const postDataProduct = {
      name:$('#name_product').val(),
      description:$('#description_product').val(),
      category:$('#category_product').val(),
      imagen:$('#imagen_product').val()
    }
    $.post('./controlleradmin.php?action=newproduct', postDataProduct, (response)=>{
      console.log(response);
      $('#form_products').trigger('reset');
        fretchproducts();
    })
  })
  
   
 })