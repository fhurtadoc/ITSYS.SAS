<?php
include_once("conexion");

class Gallerry{
    
    private $name;   
    private $path;    
    private $id_servicio;    
    var $db= new Conexion;

    public function __construct(){         
    }      

    public function insert($name, $path ){ 
        
        $this->$name=$name;
        $this->$path=$path;        

        $sql="INSERT INTO gallery (name, description)
        VALUES ( $this->$name, $this->$path)";
        $res=$this->db->query($sql);
        if($res){
            return $res;
        }else{

        }
    }      


    public function select ($params){ 
        
        $params= explode( ", " , $params); 
        $sql="SELECT  $params FROM gallery ";
        $res=$this->db->getArray($sql);
        if($res){
            return $res;
        }else{

        }
    }      


    public function update($query){ 
        $sql=$query;
        $res=$this->db->query($sql);
        if($res){
            return $res;
        }else{

        }
    } 
    
    public function delete($id){ 
        $sql="DELETE FROM gallery WHERE id=$id";
        $res=$this->db->query($sql);
        if($res){
            return $res;
        }else{

        }
    }    
    
}