$(document).ready(function () { 
  fretchServices();
  fretchproducts();
  fretchimages();
  function fretchServices() {
    $.get(
      "./controlleradmin.php?action=list_services",
      function (response, err) {
        let services = JSON.parse(response);
        services.forEach((service) => {
          var service = `
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
          `;
          $("#services").append(service);
        });
      }
    );
  }

  $('#form_services').submit(e => {
    e.preventDefault();    
    let  formData = new FormData();
    let archivo = $('#imagen')[0].files[0];            
    let name= $("#name").val();
    let description= $("#description").val();
    let category= $("#category").val();
        
    formData.append("file", archivo);
    formData.append("name", name);
    formData.append("description", description);
    formData.append("category", category);
  
    $.ajax({
      type: "post",
      url: "../controlleradmin.php?action=newservice",
      data: formData,
      contentType: false,
      processData: false,
    }).done(function (response) {
      console.log(response);
      
    });
  });


  
  function fretchproducts() {
    $.get(
      "./controlleradmin.php?action=list_product",
      function (response, err) {
        let products = JSON.parse(response);
        products.forEach((product) => {
          var product = `
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
       `;
          $("#products").append(product);
        });
      }
    );
  }

  $('#form_products').submit(e => {
    e.preventDefault();    
    let  formData = new FormData();
    let archivo = $('#imagen_product')[0].files[0];            
    let name= $("#name_product").val();
    let description= $("#description_product").val();
    let category= $("#category_product").val();
        
    formData.append("file", archivo);
    formData.append("name", name);
    formData.append("description", description);
    formData.append("category", category);
  
    $.ajax({
      type: "post",
      url: "../controlleradmin.php?action=newproduct",
      data: formData,
      contentType: false,
      processData: false,
    }).done(function (response) {
      console.log(response);
      
    });
  });

  function fretchimages() {
    
    $.get(
      "../controlleradmin.php?action=select_image",      
      function (response, err) {
        let images = JSON.parse(response);
        console.log(response);
        images.forEach((image) => {
          var image_style = `
         <div class="column_gallery">
         <div class="card_gallery">
         <h2>${image.nombre}</h2>
         <button type="button" class="btn btn-danger"> <a href="./controlleradmin.php?action=delete_image&id=${image.id}" class="task-delete btn btn-danger">
         Delete</a></button>         
         </div>
       `;
          $("#row_gallery").append(image_style);
        });
      }
    );
  }


});
