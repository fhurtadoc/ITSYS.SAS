<?php
print_r($_FILES['file']);
echo $_POST['numero'] . "<br>";

if (isset($_FILES['file'])) {
    $nombre =  $_FILES['file']['name'];
    $hoy = date("Ymdhms");
    $nombre = $hoy . "_" . $nombre;

    $tipo = $_FILES['file']['type'];
    $tipofinal = explode("/", $tipo);
    if ($tipofinal[1] == "jpeg" || $tipofinal[1] == "png" || $tipofinal[1] == "gif") {

        if (move_uploaded_file($_FILES["file"]["tmp_name"], "img/img_productos/" . $nombre)) {
            //more code here...
            echo "img/img_productos/" . $nombre;
        }
    };
}
