<?php
include_once("../model/usuarios.php");

if(isset($_GET['action'])){
    $newuser=new User;
    switch($_GET['action']){

            case "logout":
                $estado=[];
                if (!empty($_POST['email']) && !empty($_POST['name'])) {
                    $name=$_POST['name'];
                    $email = $_POST['email'];
                    $password = rand(75500, 871770032156);
                    $permisos = $_POST['permisos'];                    
                    if ((!is_string($email) || !filter_var($email, FILTER_VALIDATE_EMAIL))) {
                        $estado=array("http"=>400, "mensaje"=>"ingresar un correo");
                        
                    } else {
                        //$send=mail( $email, $subject= "hola desde php", $message= "su constraseña es: $password");                
                        //if($send){                        
                        $hash = password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]);
                        $inserUser=$newuser->insert($name, $email, $hash, $permisos);                        
                        if ($inserUser) {
                            $estado=array("http"=>200, "mensaje"=>"se creo correctamente el usuario");
                            
                        } else {
                            $estado=array("http"=>500, "mensaje"=>"error en la base de datos");
                        
                        }
                        // }                        
                    }
                }else{
                    $estado=array("http"=>400, "mensaje"=>"ingrese correo y nombre del nuevo usuario");
                }  
                return json_encode($estado); 

            break;

                
                
                
                
            case "login":
                $estado =[];                    
                    $email = $_POST['email'];
                    $password = $_POST['password'];                        

                    if ((!is_string($email) || !filter_var($email, FILTER_VALIDATE_EMAIL))) {
                        $estado=array("http"=>400, "mensaje"=>"ingresar un correo");
                    }

                    if (!is_string($password) ||  strlen($password) < 5) {

                        $estado=array("http"=>400, "mensaje"=>"ingresar un pass");
                    }

                    $params=["name", "email", "password", "permisos"];
                    $seletby=$newuser->selectbyparam($params, "email", $email);

                    if($seletby){

                        $hashDB = $seletby['password'];

                        if (password_verify($password, $hashDB)) {
                            session_start();
                            $_SESSION['USUARIO'] = $seletby;
                            header("location:interfaceadmin.php");
                        }

                    }else{
                        $estado=array("http"=>400, "mensaje"=>"contraseña esta erronea");
                        header("location:login.php?estado=$estado");
                    }
                
            break; 
            
            
            case "forgot":
                $estado =[];
                if (isset($_POST)) {
                    $email = $_POST['email'];                    
                    if ((!is_string($email) || !filter_var($email, FILTER_VALIDATE_EMAIL))) {
                        $estadoForgot = 'email';
                    } else {
                        $params=["name", "email", "password", "permisos"];
                        $seletby=$newuser->selectbyparam($params, "email", $email);
                        $emailDB = $seletby['email'];
                        $hashDB = $seletby['password'];
                        if ($email == $emailDB) {
                            $passDB = password_get_info($hashDB);
                            //$send=mail( $email, $subject= "hola desde php", $message= "su constraseña es: $passDB['algo']");  
                            $estado=array("http"=>200, "mensaje"=>"por favor revise su correo");                                          
                            header("location:login.php?estadoForgot=$estado");
                        } else {
                            $estado=array("http"=>400, "mensaje"=>"el correo no esta registrado");
                            header("location:login.php?estadoForgot=$estado");
                        }
                    }                    
                }
    
                break;

            
    
    }
}
