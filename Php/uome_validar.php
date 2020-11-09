<?php
include 'cnn.php';

//Variables por POST
$usr_nom=$_POST['usuario'];
$usr_pass=$_POST['password'];

//Debug
/*
$usr_nom="god";
$usr_pass="god1234";
*/

//Sentencia controlada
$sentencia=$conexion->prepare("SELECT * FROM usuarios WHERE usr_nom=? AND usr_pass=?");

//Bind
$sentencia->bind_param("ss",$usr_nom,$usr_pass);

//Ejecutar
$sentencia->execute();

//Variable para almacenar el resultado
$result=$sentencia->get_result();

//Validación
if ($fila = $result->fetch_assoc()) {

    //Respuesta json
    echo json_encode($fila, JSON_UNESCAPED_UNICODE);

}

//Close Sentencia controlada y Conexión
$sentencia->close();
$conexion->close();
?>