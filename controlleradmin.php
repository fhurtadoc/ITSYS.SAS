
<?php

include("conexion.php");


if (isset($_GET['action'])) {
    switch ($_GET['action']) {
            //GESTOR DE USUSARIOS
        case "logout":
            if (!empty($_POST['email'])) {
                $email = $_POST['email'];
                $password = rand(75500, 871770032156);
                $permisos = $_POST['permisos'];
                $estado = 'ok';
                if ((!is_string($email) || !filter_var($email, FILTER_VALIDATE_EMAIL))) {
                    $estado = 'ingresar un email correcto';
                } else {
                    //$send=mail( $email, $subject= "hola desde php", $message= "su constraseña es: $password");                
                    //if($send){                        
                    $hash = password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]);
                    $INSERT = "INSERT INTO usuariosadmin (email, password, permisos) VALUES('$email', '$hash', '$permisos')";
                    $newUser = mysqli_query($conexion, $INSERT);
                    if ($newUser) {
                        $estado = "se creo el nuevo usuario admin con pass $password";
                    } else {
                        echo 'no de creo el usuario';
                    }
                    // }                        
                }
            } else {
                $estado = 'no se ingreso informacion';
            }
            if ($estado != 'ok') {
                header("location:interfaceadmin.php?estado=$estado");
            }
            break;

        case "login":
            if (isset($_POST)) {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $estado = 'ok';
                if ((!is_string($email) || !filter_var($email, FILTER_VALIDATE_EMAIL))) {
                    $estado = 'email';
                }
                if (!is_string($password) ||  strlen($password) < 5) {
                    $estado = 'password';
                }
                $SELECTBYEMAIL = "SELECT * FROM usuariosadmin WHERE email='$email'";
                $result = mysqli_query($conexion, $SELECTBYEMAIL);
                $user = mysqli_fetch_assoc($result);
                $hashDB = $user['password'];
                if (password_verify($password, $hashDB)) {
                    session_start();
                    $_SESSION['session'] = $user;
                    header("location:interfaceadmin.php");
                } else {
                    $estado = 'contraseña esta erronea';
                }
                if ($estado != 'ok') {
                    header("location:login.php?estado=$estado");
                }
            }


        case "forgot":
            if (isset($_POST)) {
                $email = $_POST['email'];
                $estadoForgot = 'ok';
                if ((!is_string($email) || !filter_var($email, FILTER_VALIDATE_EMAIL))) {
                    $estadoForgot = 'email';
                } else {
                    $SELECTBYEMAIL = "SELECT * FROM usuariosadmin WHERE email='$email'";
                    $result = mysqli_query($conexion, $SELECTBYEMAIL);
                    $user = mysqli_fetch_assoc($result);
                    $emailDB = $user['email'];
                    $hashDB = $user['password'];
                    if ($email == $emailDB) {
                        $passDB = password_get_info($hashDB);
                        //$send=mail( $email, $subject= "hola desde php", $message= "su constraseña es: $passDB['algo']");                
                        echo $hashDB;
                    } else {
                        echo "el email no existe";
                    }
                }
                if ($estadoForgot != 'ok') {
                    header("location:login.php?estadoForgot=$estadoForgot");
                }
            }

            break;
        case "chance_pass": {
                if (isset($_POST)) {
                    $estado = 'ok';
                    if (!empty($_POST['password'])) {
                        $password = $_POST['password'];
                        $email = $_POST['email'];
                        if ((!is_string($password) ||  strlen($password) < 5)) {
                            $estado = 'password';
                        } else {
                            $hash = password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]);
                            $UPDATE = "UPDATE usuariosadmin SET password='$hash' WHERE email='$email'";
                            $result = mysqli_query($conexion, $UPDATE);
                            if (!$result) {
                                $estado = 'error';
                            } else {
                                header("location:login.php");
                            }
                        }
                    }
                    if ($estado != 'ok') {
                        header("location:login.php?estado=$estado");
                    }
                }
            }
            break;

            //GESTOR DE PRODUCTOS
            // nuevo producto
        case "newproduct":
            if (isset($_POST)) {
                $estado = 'ok';
                if (isset($_POST['postDataProduct']) && isset($_FILES['file'])) {
                    //sacamos la data del formulario y la guardamos en una variable data  
                    $data = $_POST['postDataProduct'];
                    //validamos la informacion del formulario antes de subir la imagen al servidor 
                    $name = $data['name'];
                    $description = $data['description'];
                    $category = $data['category'];
                    if (!is_string($name) ||  !is_string($description) ||  !is_string($category)) {
                        $estado = 'la informacion no es correcta';
                    } else {
                        // creamos el nombre de la imagen 
                        $nameFile =  $_FILES['file']['name'];
                        $hoy = date("Ymdhms");
                        $nameFile_finally = $hoy . "_" . $nombre;
                        //sacamos el tipo para hacer validacion de tipos de archivos 
                        $tipo = $_FILES['file']['type'];
                        $tipofinal = explode("/", $tipo);
                        if ($tipofinal[1] == "jpeg" || $tipofinal[1] == "png" || $tipofinal[1] == "gif") {
                            if (move_uploaded_file($_FILES["file"]["tmp_name"], "img/img_productos/" . $nombre)) {
                                $INSERT = "INSERT INTO productos(name, description, category, imagen ) VALUES('$name', '$description', '$category', '$nameFile_finally')";
                                $result = mysqli_query($conexion, $INSERT);
                                if (!$result) {
                                    die('no se ejecuto el query');
                                } else {
                                    $estado = "se subio correctamente";
                                }
                            }
                        }
                    }
                } else {
                    $estado = 'no se ingreso informacion';
                }
                if ($estado != 'ok') {
                    header("location:interfaceadmin.php?estado=$estado");
                }
            }
            break;

            //lista de productos
        case "list_product":
            if (isset($_GET)) {
                $query = "SELECT* FROM productos";
                $result = mysqli_query($conexion, $query);
                if (!$result) {
                    die('Query Failed');
                }
                $json = array();
                while ($row = mysqli_fetch_assoc($result)) {
                    $json[] = array(
                        'id' => $row['id'],
                        'name' => $row['name'],
                        'description' => $row['description'],
                        'category' => $row['category'],
                        'imagen' => $row['imagen']

                    );
                }
                $jsonstring = json_encode($json);
                echo $jsonstring;
            }
            break;


            //eliminar producto

        case "delete_product":
            if (isset($_GET)) {
                $estado = 'ok';
                if (!empty($_GET['id'])) {
                    $id = (int)$_GET['id'];
                    $DELETE = "DELETE FROM productos WHERE id=$id";
                    $result = mysqli_query($conexion, $DELETE);
                    if (!$result) {
                        die('Query Failed.');
                    }
                } else {
                    echo "Task Deleted Successfully";
                }
            }
            break;

            //GESTOR DE SERVICIOS

            //lista de serviciso

        case "list_services":
            if (isset($_GET)) {
                $query = "SELECT* FROM servicios";
                $result = mysqli_query($conexion, $query);
                if (!$result) {
                    die('Query Failed');
                }
                $json = array();
                while ($row = mysqli_fetch_assoc($result)) {
                    $json[] = array(
                        'name' => $row['name'],
                        'description' => $row['description'],
                        'category' => $row['category'],
                        'imagen' => $row['imagen'],
                        'id' => $row['id']
                    );
                }
                $jsonstring = json_encode($json);
                echo $jsonstring;
            }
            break;
        case "newservice":
            if (isset($_POST)) {
                $estado = 'ok';
                if (!empty($_POST['name']) && !empty($_POST['description']) && !empty('category') && !empty('imagen')) {
                    $name = $_POST['name'];
                    $description = $_POST['description'];
                    $category = $_POST['category'];
                    $imagen = $_POST['imagen'];
                    if (!is_string($name) ||  !is_string($description) ||  !is_string($category) ||  !is_string($imagen)) {
                        $estado = 'la informacion no es correcta';
                    } else {
                        $INSERT = "INSERT INTO servicios(name, description, category, imagen ) VALUES('$name', '$description', '$category', '$imagen')";
                        $result = mysqli_query($conexion, $INSERT);
                        if (!$result) {
                            die('no se ejecuto el query');
                        } else {
                            echo "Successfully";
                        }
                    }
                } else {
                    $estado = 'no se ingreso informacion';
                }
                if ($estado != 'ok') {
                    header("location:interfaceadmin.php?estado=$estado");
                }
            }

            break;

        case "delete_service":
            if (isset($_GET)) {
                $estado = 'ok';
                if (!empty($_GET['id'])) {
                    $id = (int)$_GET['id'];
                    $DELETE = "DELETE FROM servicios WHERE id=$id";
                    $result = mysqli_query($conexion, $DELETE);
                    if (!$result) {
                        die('Query Failed.');
                    }
                } else {
                    echo "Task Deleted Successfully";
                }
            }
            break;

        case "cerrar":
            session_start();
            session_destroy();
            header("location:login.php");
            break;
    }
} else {
    header("location:index.php?estado=$estado");
}
