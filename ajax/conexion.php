<?php

$db_host = "localhost";
$db_user = "admin_vivashango";
$db_pass = "Shango1428+_";
$db_name = "admin_vivashango";

$conexion = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
mysql_set_charset('utf8',$conexion);

if(mysqli_connect_errno()){
	echo "No se pudo conectar a la base de datos: ".mysqli_connect_error();
}

?>