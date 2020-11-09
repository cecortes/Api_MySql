<?php

//Datos para la conexión a mysql
define('DB_SERVER','localhost');
define('DB_NAME','uome');
define('DB_USER','root');
define('DB_PASS','sylka1234');

//Sentencia de conexión
$conexion = mysql_connect(DB_SERVER, DB_USER, DB_PASS);

//Validación de conexión
if(!$conexion)
{

    die('Error MYSQL: '.mysql_error());
    
} else {

    //User
    echo "<h1>MySql Connection success!</h1>";
    echo "<br>";
    echo "<br>";

}

//Sentencia para la base de datos
$db = mysql_select_db(DB_NAME,$conexion);

//Validación de la DB
if(!$db)
{

    die('Error de base de datos: '.mysql_error());
    
} else {

    //User
    echo "<h1>Database ok!</h1>";
    echo "<br>";
    echo "<br>";

}

?>