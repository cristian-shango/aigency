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
  $nombre = $_POST["nombre"];

  $sql = "DELETE FROM proyectos WHERE id = '$id'";

  if(mysqli_query($conexion, $sql)){ 
    echo "Proyecto borrado."; 
  } else { 
      echo "ERROR: Could not able to execute $sql. "  
      . mysqli_error($conexion); 
  }

  $sql1 = "DELETE FROM registros WHERE id_proyect = '$id'";

  if(mysqli_query($conexion, $sql1)){ 
    echo "Registros borrados."; 
  } else { 
      echo "ERROR: Could not able to execute $sql1. "  
      . mysqli_error($conexion); 
  }  

  mysqli_close($conexion);

?>