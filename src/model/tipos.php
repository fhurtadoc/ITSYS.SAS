<?php
include_once("conexion");

class Tipos{
    
    private $name;   
    private $description;    
    var $db= new Conexion;

    public function __construct(){         
    }      

    public function insert($name, $description ){ 
        $this->$name=$name;
        $this->$description=$description;        

        $sql="INSERT INTO tipos (name, description)
        VALUES ( $this->$name, $this->$description)";
        $res=$this->db->query($sql);
        if($res){
            return $res;
        }else{

        }
    }      


    public function select ($params){ 
        
        $params= explode( ", " , $params); 
        $sql="SELECT  $params FROM tipos ";
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
        $sql="DELETE FROM tipos WHERE id=$id";
        $res=$this->db->query($sql);
        if($res){
            return $res;
        }else{

        }
    }    
    
}