<?php  
  
  include "conexion.php"; 
  mysql_set_charset('utf8');

  if($conexion === false){ 
    die("ERROR: Could not connect. "  
                . mysqli_connect_error()); 
  } else {
    echo "conectado";
  } 
  
  $proyecto = $_POST["proyecto"];

  $sql = "UPDATE registros SET registro_actualizado= 1 WHERE id_proyecto= '$proyecto'";

  if(mysqli_query($conexion, $sql)){ 
    echo "Registros actualizado"; 
  } else { 
      echo "ERROR: Could not able to execute $sql. "  
      . mysqli_error($conexion); 
  }  
  mysqli_close($conexion);

?>