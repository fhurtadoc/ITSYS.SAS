    <?php
    include_once("../model/services.php");
    include_once("../../img/services");

    if(isset($_GET['action'])){
    $newService=new Services();
    switch($_GET['action']){
        case "new_service":
                $estado=[];            
                $name=$_POST['name'];
                $description=$_POST['description'];
                $category=$_POST['category'];  
                $type=$_POST['type'];  
                $nameFile =  $_FILES['file']['name'];
                if(isset($name) && isset($description) && isset($category) && isset($nameFile)){

                        if (!is_string($name) ||  !is_string($description) ||  !is_string($category)) {
                            $estado=array("http"=>400, "mensaje"=>"ingrese la informacion Correcta"); 
                        }else{
                            $hoy = date("Ymdhms");
                            $nameFile_finally = $hoy . "_" . $nameFile;
                            $tipo = $_FILES['file']['type'];
                            $tipoArray = explode('/', $tipo);
                            $tipofinal=$tipoArray[1];   
                            if ($tipofinal == "jpeg" || $tipofinal == "png" || $tipofinal== "gif") {  
                                if (move_uploaded_file($_FILES['file']["tmp_name"], "../../img/services/" . $nameFile_finally)) {
                                    $insertService=$newService->insert($name, $description, $category, $nameFile_finally, $type);
                                    $estado=array("http"=>200, "mensaje"=>"se creo correctamente");     
                            }else{
                                $estado=array("http"=>400, "mensaje"=>"el formato de la imagen no es correcto"); 
                            }

                        }
                        
                    }
                }
                echo json_encode($estado); 
            break;    
        case "list_services":
            $type=$_POST["type"];
            $isql="SELECT * FROM services WHERE type='$type'";
            $listService=$newService->select($isql);
            echo json_encode($listService); 
            break;    

        case "delete_service":
                $id=$_POST["id"];
                $delete=$newService->delete($id);
                if($delete){
                    $estado=array("http"=>200, "mensaje"=>"se elimino correctamente");     
                }
                break;  
        
        case "update_service":
                    break; 
        }
    }
