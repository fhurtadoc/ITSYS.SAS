<?php

$host="localhost";
$user="root";
$password="";
$db="itsys";

$conexion=mysqli_connect(
  $host,
  $user,
  $password,
  $db   
);
if ($conexion->connect_errno) {
  die('Connect Error: ' . $conexion->connect_errno);
}


