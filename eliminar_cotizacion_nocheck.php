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

  $sql_copiar_tabla_eliminados = "INSERT INTO registros_eliminados SELECT * FROM registros WHERE id = '$id'";

  $sql = "DELETE FROM registros WHERE id = '$id'";
  $sql2 = "DELETE FROM registros_confirmados WHERE id = '$id'";
  //$sql = "UPDATE registros SET estado_registro = 3 WHERE id = '$id'";

  if(mysqli_query($conexion, $sql_copiar_tabla_eliminados)){
    echo "Registro $id copiado en tabla Eliminados."; 
  } else {
      echo "ERROR: Could not able to execute $sql. "
      . mysqli_error($conexion);
  }

  if(mysqli_query($conexion, $sql)){
    echo "Registro $id eliminado de tabla registros."; 
    mysqli_query($conexion, $sql2);
  } else {
      echo "ERROR: Could not able to execute $sql. "
      . mysqli_error($conexion);
  }
  mysqli_close($conexion);

?>
