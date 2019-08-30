<?php  
  
  include "conexion.php"; 
  mysql_set_charset('utf8');

  if($conexion === false){ 
    die("ERROR: Could not connect. "  
                . mysqli_connect_error()); 
  } else {
    echo "conectado";
  } 
  $registro = $_POST["registro"];
  $tiempo = $_POST["tiempo"];

  $sql = "UPDATE registros SET tiempo_pago= '$tiempo' WHERE id= '$registro'";
  if(mysqli_query($conexion, $sql)){ 
    echo "Tiempo actualizado."; 
  } else { 
      echo "ERROR: Could not able to execute $sql. "  
      . mysqli_error($conexion);
  }
?>