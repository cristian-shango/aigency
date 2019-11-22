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

  $sql = "INSERT INTO clientes (nombre, razon_social, cuit, tiempo_pago, forma_pago, porcentaje_ocurrencia, oc_cliente) VALUES ('$nombre', '$razon_social', '$cuit', '$tiempo_pago', '$forma_pago', '$porcentaje_ocurrencia', '$nuevo_oc')";

  if(mysqli_query($conexion, $sql)){ 
    echo "Registro creado."; 
  } else { 
      echo "ERROR: Could not able to execute $sql. "  
      . mysqli_error($conexion); 
  }  
  mysqli_close($conexion);

?>