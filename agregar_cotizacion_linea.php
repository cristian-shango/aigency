<?php

  include "conexion.php";
  include 'session.php';
  mysql_set_charset('utf8');
  if($conexion == false){
    die("ERROR: Could not connect. "
                . mysqli_connect_error());
  } else {
    echo "Conectado";
  }

  $registro = $_POST["registro"];
  $jornadas = $_POST["jornadas"];
  $cantidad = $_POST["cantidad"];
  $valor = $_POST["valor"];
  $total = $_POST["total"];
  $proveedor = $_POST["proveedor"];

  $sql = "UPDATE registros SET jornadas_registro = '$jornadas', cantidad = '$cantidad', importe_neto = '$valor', importe_total = '$total', id_proveedor = '$proveedor' WHERE id = '$registro'";

  mysqli_query($conexion, $sql);
  mysqli_close($conexion);
?>
