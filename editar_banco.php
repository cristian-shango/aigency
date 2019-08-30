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
    $saldo = $_POST["saldo"];
    $tipo_cuenta = $_POST["tipo_cuenta"];
    $id = $_POST["id"];

  $sql = "UPDATE bancos SET nombre= '$nombre', cbu= '$cbu', alias= '$alias', saldo= '$saldo', tipo_cuenta= '$tipo_cuenta' WHERE id_banco = '$id'";

  if(mysqli_query($conexion, $sql)){
    echo "Registro actualizado.";
  } else {
      echo "ERROR: Could not able to execute $sql. "
      . mysqli_error($conexion);
  }
  mysqli_close($conexion);

?>
