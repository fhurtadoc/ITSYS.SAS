<?php
include_once("conexion");

class User{
    private $name;
    private $email;   
    private $password;
    private $permisos;        
    var $db= new Conexion;

    public function __construct(){         
    }      

    public function insert($name, $email, $password, $permisos){ 
        $this->$name=$name;
        $this->$email=$email;
        $this->$password=$password;
        $this->$permisos=$permisos;        

        $sql="INSERT INTO usuarios (name, email, password, permisos)
        VALUES ( $this->$name, $this->$email, $this->$password, $this->$permisos)";
        $res=$this->db->query($sql);
        if($res){
            return $res;
        }else{

        }
    }      


    public function select ($params){ 
        
        $params= explode( ", " , $params); 
        $sql="SELECT  $params FROM usuarios ";
        $res=$this->db->getArray($sql);
        if($res){
            return $res;
        }else{

        }
    }    
    
    public function selectbyparam($params, $param, $paramid){ 
        
        $params= explode( ", " , $params); 
        $sql="SELECT  $params FROM usuarios Where $param=$paramid";
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
        $sql="DELETE FROM usuarios WHERE id=$id";
        $res=$this->db->query($sql);
        if($res){
            return $res;
        }else{

        }
    }    
    
    


    











}