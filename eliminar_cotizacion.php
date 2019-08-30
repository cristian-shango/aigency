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
  $id_proyecto = $_POST["id_proyecto"];
  $saldo = $_POST["saldo_sumar"];
  $consumido = $_POST["consumido"];

  $sql1 = "UPDATE proyectos SET saldo= '$saldo', consumido= '$consumido' WHERE id= '$id_proyecto'";
  $sql = "DELETE FROM registros WHERE id = '$id'";

  if(mysqli_query($conexion, $sql1)){ 
    echo "Saldo actualizado."; 
  } else { 
      echo "ERROR: Could not able to execute $sql. "  
      . mysqli_error($conexion); 
  } 

  if(mysqli_query($conexion, $sql)){ 
    echo "Registro eliminado."; 
  } else { 
      echo "ERROR: Could not able to execute $sql. "  
      . mysqli_error($conexion); 
  }  
  mysqli_close($conexion);

?>