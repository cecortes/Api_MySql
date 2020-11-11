<?php

include_once 'uome_cnn.php';

//Variables por POST
$usr_nom=$_POST['u'];
$usr_pass=$_POST['p'];

//Debug
/*
$usr_nom="god";
$usr_pass="god1234";
*/

//Sentencia controlada
$sentencia= mysqli_prepare($conexion, "SELECT * FROM usuarios WHERE usr_nom = ? AND usr_pass = ?");

//Bind
mysqli_stmt_bind_param($sentencia, "ss", $usr_nom, $usr_pass);

//Ejecutar
mysqli_stmt_execute($sentencia);

//Variable para almacenar el resultado
mysqli_stmt_store_result($sentencia);
mysqli_stmt_bind_result($sentencia, $usr_id, $usr_nom, $usr_mail, $usr_pass, $usr_create);

//Arreglo para recibir el resultado
$response = array();

//Campo de validación
$response['sesion']["status"] = false;

//Rutin para recibir el Resultado
while(mysqli_stmt_fetch($sentencia)){
    
    //Estructura del arreglo
    $response['sesion']["status"] = true;
    $response['sesion']["usuario"] = $usr_nom;
    $response['sesion']["clave"] = $usr_pass;
    $response['sesion']["correo"] = $usr_mail;
    $response['sesion']["created"] = $usr_create;
}

//Respuesta en formato json
echo json_encode($response);

?>