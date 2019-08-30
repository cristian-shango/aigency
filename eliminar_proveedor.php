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

  $sql = "DELETE FROM proveedores WHERE id_proveedor = '$id'";

  if(mysqli_query($conexion, $sql)){
    echo "Registro creado.";
  } else {
      echo "ERROR: Could not able to execute $sql. "
      . mysqli_error($conexion);
  }
  mysqli_close($conexion);

?>
