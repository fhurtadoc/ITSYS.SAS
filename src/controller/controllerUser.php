<?php
include_once("../model/usuarios.php");

if(isset($_GET['action'])){
    $newUser=new User();
    switch($_GET['action']){
        case "crearUser":

            if (!empty($_POST['email'])) {
                $email = $_POST['email'];
                $permisos = $_POST['permisos'];
                $name=$_POST['nombre'];
                $password = rand(75500, 871770032156);
                if ((!is_string($email) || !filter_var($email, FILTER_VALIDATE_EMAIL))) {
                    $estado=array("http"=>404, "mensaje"=>" ingrese la informacion correcta");
                }else {
                    $hash = password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]);
                    $insertUser=$newUser->insert($name, $email, $hash, $permisos ); 
                    if ($insertUser) {
                        $estado=array("http"=>200, "mensaje"=>"se creo correctamente el usuario $name");                            
                    } else {
                        $estado=array("http"=>400, "mensaje"=>" No se creo correctamente el usuario $name"); 
                    }
                }

            }
            echo json_encode($estado);
            break;

            case "changePass":                     
                $estado = [];                
                if (!empty($_POST['password'])) {
                    $password = $_POST['password'];
                    $email = $_POST['email'];
                    if ((!is_string($password) ||  strlen($password) < 5)) {
                        $estado = array("http"=>400, "mensaje"=>"Ingrese pass correcto");
                    } else {
                        $hash = password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]);
                        $isql = "UPDATE usuarios SET password='$hash' WHERE email='$email'";                        
                        $update=$newUser->update($isql);
                        if ($update) {
                            $estado=array("http"=>200, "mensaje"=>"Se cambio la contraseña correctamente"); 
                        } else {
                            $estado=array("http"=>400, "mensaje"=>"No se cambio la contraseña"); 
                        }
                    }
                }                        
                echo json_encode($estado); 
        break;

    }


}