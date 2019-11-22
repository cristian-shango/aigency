<?php

  include "conexion.php";
  mysql_set_charset('utf8');

  if($conexion === false){
    die("ERROR: Could not connect. "
                . mysqli_connect_error());
  } else {
    echo "conectado";
  }

  $nombre = $_POST["nombre"];
  $cbu = $_POST["cbu"];
  $alias = $_POST["alias"];
  $tipo_cuenta = $_POST["tipo_cuenta"];
  $saldo = $_POST["saldo"];
  

  $sql = "INSERT INTO bancos (nombre, cbu, alias, tipo_cuenta, saldo ) VALUES ('$nombre', '$cbu', '$alias', '$tipo_cuenta', '$saldo' )";

  if(mysqli_query($conexion, $sql)){
    echo "Registro creado.";
  } else {
      echo "ERROR: Could not able to execute $sql. "
      . mysqli_error($conexion);
  }
  mysqli_close($conexion);

?>
