<?php
include_once("conexion");

class Services{
    
    private $name;   
    private $description;
    private $category;
    private $imagen;
    public $tipo;
    var $db= new Conexion;

    public function __construct(){         
    }      

    public function insert($name, $description, $category, $imagen, $type_service ){ 
        $this->$name=$name;
        $this->$description=$description;
        $this->$category=$category;
        $this->$imagen=$imagen;
        $this->$type_service=$type_service;                    

        $sql="INSERT INTO services (name, description, category, imagen, type_service)
        VALUES ( $this->$name, $this->$description, $this->$category, $this->$imagen, $this->$type_service)";
        $res=$this->db->query($sql);
        if($res){
            return $res;
        }else{

        }
    }      


    public function select ($params){ 
        
        
        $params= explode( ", " , $params); 
        $sql="SELECT  $params FROM services ";
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
        $sql="DELETE FROM services WHERE id=$id";
        $res=$this->db->query($sql);
        if($res){
            return $res;
        }else{

        }
    }    
    
    


    











}