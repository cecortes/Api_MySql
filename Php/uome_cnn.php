<?php
//Datos para la conexión a mysql
define('DB_SERVER','localhost');
define('DB_NAME','uome');
define('DB_USER','root');
define('DB_PASS','sylka1234');

$conexion = mysql_connect(DB_SERVER, DB_USER, DB_PASS);

if(!$conexion)
{
	die('Error MYSQL: '.mysql_error());
}

$db = mysql_select_db(DB_NAME,$conexion);

if(!$db)
{
	die('Error de base de datos: '.mysql_error());
}
?>