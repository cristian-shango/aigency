<?php  
  
  include "conexion.php"; 
  mysql_set_charset('utf8');

  if($conexion === false){ 
    die("ERROR: Could not connect. "  
                . mysqli_connect_error()); 
  } else {
    echo "conectado";
  } 
  $id_proveedor = $_POST["id_proveedor"];
  $disponibilidad = $_POST["disponibilidad"];

  $sql = "UPDATE proveedores SET disponibilidad= '$disponibilidad' WHERE id_proveedor= '$id_proveedor'";
  if(mysqli_query($conexion, $sql)){ 
    echo "Proveedor actualizado."; 
  } else { 
      echo "ERROR: Could not able to execute $sql. "  
      . mysqli_error($conexion);
  }
?>