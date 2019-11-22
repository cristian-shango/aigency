<?php  
  
  include "conexion.php"; 
  mysql_set_charset('utf8');

  if($conexion === false){ 
    die("ERROR: Could not connect. "  
                . mysqli_connect_error()); 
  } else {
    echo "conectado";
  } 
  
  $id_adicional = $_POST["id_adicional"];

  $sql2 = "UPDATE adicionales SET aprobado_adicional = '2' WHERE id_adicional= '$id_adicional'";

  mysqli_query($conexion, $sql2);

  if(mysqli_query($conexion, $sql)){ 
    echo "Adicional aprobado."; 
  } else { 
      echo "ERROR: Could not able to execute $sql. "  
      . mysqli_error($conexion);
  }
?>