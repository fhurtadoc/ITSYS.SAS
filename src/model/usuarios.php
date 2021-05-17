<?php
include_once("conexion.php");

class User{
    private $name;
    private $email;   
    private $password;
    private $permisos;        
    

    public function __construct(){         
    }      

    public function insert($name, $email, $password, $permisos){ 
        $db= new Conexion;
        $this->$name=$name;
        $this->$email=$email;
        $this->$password=$password;
        $this->$permisos=$permisos;        

        $sql="INSERT INTO usuarios (name, email, password, permisos)
        VALUES ( $this->$name, $this->$email, $this->$password, $this->$permisos)";
        $res=$db->query($sql);
        if($res){
            return $res;
        }else{

        }
    }      


    public function select ($params){ 
        $db= new Conexion;
        $params= implode( ", " , $params); 
        $sql="SELECT  $params FROM usuarios ";
        $res=$db->getArray($sql);
        if($res){
            return $res;
        }else{

        }
    }    
    
    public function selectbyparam($params, $param, $paramid){ 
        $db= new Conexion;
        $params_string= implode( ", " , $params); 
        $sql="SELECT $params_string FROM usuarios Where $param='$paramid'";
        $res=$db->getArray($sql);        
        if($res){
            return $res;            
        }else{

        }
    }    


    public function update($query){ 
        $db= new Conexion;
        $sql=$query;
        $res=$this->db->query($sql);
        if($res){
            return $res;
        }else{

        }
    } 
    
    public function delete($id){ 
        $db= new Conexion;
        $sql="DELETE FROM usuarios WHERE id=$id";
        $res=$db->query($sql);
        if($res){
            return $res;
        }else{

        }
    }    
    
    


    











}