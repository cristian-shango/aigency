<?php
include "conexion.php";
mysql_set_charset('utf8');
if($conexion == false){
	die("ERROR: Could not connect. ". mysqli_connect_error());
}

$sql = "SELECT id_proveedor,contacto FROM proveedores ORDER BY contacto";

$result = mysqli_query($conexion,$sql);

$users_arr = array();

while( $row = mysqli_fetch_array($result) ){
    $id = $row['id_proveedor'];
    $contacto = $row['contacto'];

    $users_arr[] = array("id" => $id, "contacto" => $contacto);
}

// encoding array to json format
echo json_encode($users_arr);

?>