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

  $sql = "DELETE FROM categorias_cotizaciones WHERE id_catcot = '$id'";

  if(mysqli_query($conexion, $sql)){ 
    echo "Categoría eliminada."; 
  } else { 
      echo "ERROR: Could not able to execute $sql. "  
      . mysqli_error($conexion); 
  }  
  mysqli_close($conexion);

?>