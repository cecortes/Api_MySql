<?php
//Datos para la conexión a mysql
define('DB_SERVER','localhost');
define('DB_NAME','uome');
define('DB_USER','root');
define('DB_PASS','sylka1234');

$conexion = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

if(!$conexion)
{
	die('Error MYSQL: '.mysqli_error());
}

?>