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

  $sql = "UPDATE clientes SET nombre= '$nombre', razon_social= '$razon_social', cuit= '$cuit' WHERE id_cliente= '$id'";

  if(mysqli_query($conexion, $sql)){ 
    echo "Record was updated successfully."; 
  } else { 
      echo "ERROR: Could not able to execute $sql. "  
      . mysqli_error($conexion); 
  }  
  mysqli_close($conexion);

?>