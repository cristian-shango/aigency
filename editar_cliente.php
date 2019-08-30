<?php  
  
  include "conexion.php"; 
  mysql_set_charset('utf8');

  if($conexion === false){ 
    die("ERROR: Could not connect. "  
                . mysqli_connect_error()); 
  } else {
    echo "conectado";
  } 
  
  $nombre = $_POST["nombre"];
  $razon_social = $_POST["razon_social"];
  $cuit = $_POST["cuit"];
  $id = $_POST["id"];
  $tiempo_pago = $_POST["tiempo_pago"];
  $forma_pago = $_POST["forma_pago"];
  $porcentaje_ocurrencia = $_POST["porcentaje_ocurrencia"];
  $nuevo_oc = $_POST["nuevo_oc"];

  $sql = "UPDATE clientes SET nombre= '$nombre', razon_social= '$razon_social', cuit= '$cuit', tiempo_pago= '$tiempo_pago', forma_pago= '$forma_pago', porcentaje_ocurrencia= '$porcentaje_ocurrencia', oc_cliente= '$nuevo_oc' WHERE id_cliente= '$id'";

  if(mysqli_query($conexion, $sql)){ 
    echo "Registro actualizado."; 
  } else { 
      echo "ERROR: Could not able to execute $sql. "  
      . mysqli_error($conexion); 
  }  
  mysqli_close($conexion);

?>