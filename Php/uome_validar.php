<?php
include 'uome_cnn.php';

//Variables por POST
$usr_nom=$_POST['usuario'];
$usr_pass=$_POST['password'];

//Debug
/*
$usr_nom="god";
$usr_pass="god1234";
*/

//Sentencia controlada
$sentencia=$conexion->prepare("SELECT * FROM usuarios;");

//Bind
//$sentencia->bind_param('ss',$usr_nom,$usr_pass);

//Ejecutar
$sentencia->execute();

//Variable para almacenar el resultado
$resultado = $sentencia->get_result();

//Validación
if ($fila = $resultado->fetch_assoc()) {

    //Respuesta json
    echo json_encode($fila, JSON_UNESCAPED_UNICODE);

}

//Close Sentencia controlada y Conexión
$sentencia->close();
$conexion->close();

?>