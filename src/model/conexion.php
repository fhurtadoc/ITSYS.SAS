<?php
class Conexion{
    private $host   ="localhost";
    private $usuario="itsys";
    private $clave  ="12345";
    private $db     ="itsys";
    public $conexion;

    public function __construct(){        

        $this->conexion = new mysqli ($this->host, $this->usuario, $this->clave,$this->db);
        
        
        
    }


    public function query($query){

        $resultado=$this->conexion->query($query);        
        if($resultado){
            return $resultado->fetch_all(MYSQLI_ASSOC); 
        }
            
        

    }

    public function getArray($query){

        $resultado=$this->conexion->query($query);        
        if($resultado){
            return $resultado;
        }

    }

}



?>