<?php  
  
  include "conexion.php"; 
  mysql_set_charset('utf8');

  if($conexion === false){ 
    die("ERROR: Could not connect. "  
                . mysqli_connect_error()); 
  } else {
    echo "conectado";
  } 
  
  $id_proyecto = $_POST["proyecto"];
  $saldo = $_POST["saldo"];

  $sql = "UPDATE proyectos SET saldo= '$saldo' WHERE id= '$id_proyecto'";

  if(mysqli_query($conexion, $sql)){ 
    echo "Registro actualizado."; 
  } else { 
      echo "ERROR: Could not able to execute $sql. "  
      . mysqli_error($conexion); 
  }  
  mysqli_close($conexion);

?>