<?php

$host="localhost";
$user="itsys";
$password="12345";
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


