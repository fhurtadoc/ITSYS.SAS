<?php
include_once("conexion.php");

class Services{
    
    private $name;   
    private $description;
    private $category;
    private $imagen;
    public $type_service;
    

    public function __construct(){         
    }      

    public function insert($name, $description, $category, $imagen, $type_service ){ 
        $db= new Conexion;
        $this->$name=$name;
        $this->$description=$description;
        $this->$category=$category;
        $this->$imagen=$imagen;
        $this->$type_service=$type_service;                    

        $sql="INSERT INTO services (name, description, category, imagen, type)
        VALUES ( '$name', '$description', '$category', '$imagen', '$type_service')";
        $res=$db->query($sql);
        if($res){
            return $res;
        }else{

        }
    }      


    public function select ($sql){ 
        $db= new Conexion();
        $res=$db->getArray($sql);
        if($res){
            return $res;
        }else{

        }
    }      


    public function update($query){ 
        $db= new Conexion();
        $sql=$query;
        $res=$db->query($sql);
        if($res){
            return $res;
        }else{

        }
    } 
    
    public function delete($id){ 
        $db= new Conexion();
        $sql="DELETE FROM services WHERE id=$id";
        $res=$db->query($sql);
        if($res){
            return $res;
        }else{

        }
    }    
    
    


    











}