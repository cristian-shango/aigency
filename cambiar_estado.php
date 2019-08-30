<?php  
  
  include "conexion.php"; 
  mysql_set_charset('utf8');

  if($conexion === false){ 
    die("ERROR: Could not connect. "  
                . mysqli_connect_error()); 
  } else {
    echo "conectado";
  } 
  $id = $_POST["id"];
  $estado = $_POST["estado"];

  $sql = "UPDATE proyectos SET estado= '$estado' WHERE id= '$id'";

  if(mysqli_query($conexion, $sql)){ 
    echo "Estado actualizado."; 
  } else { 
      echo "ERROR: Could not able to execute $sql. "  
      . mysqli_error($conexion);
  }

?>