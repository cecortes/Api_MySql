<?php

$hostname='localhost';
$database='uome';
$username='root';
$password='sylka1234';

$conexion=new mysqli($hostname,$username,$password,$database);

if ($conexion->connect_errno) {

    echo "Error conexión";
}

?>