<?php
include_once("../model/services.php");

if(isset($_GET['action'])){
    $newService=new Services();
    switch($_GET['action']){
        case "new_service":
            if (isset($_POST)) {
                $estado = [];
                if (!empty($_POST['name']) && !empty($_POST['description']) && !empty('category') && !empty('imagen')) {
                    $name = $_POST['name'];
                    $description = $_POST['description'];
                    $category = $_POST['category'];
                    $imagen = $_POST['imagen'];
                    $type_service = $_POST['tipo'];
                    if (!is_string($name) ||  !is_string($description) ||  !is_string($category) ||  !is_string($imagen)) {
                        $estado=array("http"=>404, "mensaje"=>" ingrese la informacion correcta"); 
                    } else {
                        $nameFile =  $_FILES['file']['name'];
                        $hoy = date("Ymdhms");
                        $nameFile_finally = $hoy . "_" . $nameFile;
                        //sacamos el tipo para hacer validacion de tipos de archivos 
                        $tipo = $_FILES['file']['type'];
                        $tipoArray = explode('/', $tipo);
                        $tipofinal=$tipoArray[1];                      
                        if ($tipofinal == "jpeg" || $tipofinal == "png" || $tipofinal== "gif") {                          
                            if (move_uploaded_file($_FILES['file']["tmp_name"], "img/img_productos/" . $nameFile_finally)) {
                                $InsertService=$newService->insert($name, $description, $category, $imagen, $nameFile_finally);                                 
                                if ($InsertService) {
                                    $estado=array("http"=>200, "mensaje"=>"se creo correctamente el $type_service");                            
                                } else {
                                    $estado=array("http"=>400, "mensaje"=>" No se creo correctamente el $type_service"); 
                                }
                            }
                        }                       
                    }                
                }
            }
            echo json_encode($estado); 
        break;

        case "update_service":
            
        break;

        case "delete_service":            
                if (isset($_GET)) {
                    $estado = [];
                    if (!empty($_GET['id'])) {
                        $id = (int)$_GET['id'];
                        $delete_service=$newService->delete($id);
                        if ($delete_service) {
                            $estado=array("http"=>200, "mensaje"=>"Se elimino correctamente el servicio"); 
                        }
                    } else {
                        $estado=array("http"=>401, "mensaje"=>"No se elimino correctamente el servicio"); 
                    }                
                }
                echo json_encode($estado); 
            break;

        break;

        case "list_service":

        break;



    }

}