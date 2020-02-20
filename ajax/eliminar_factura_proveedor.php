<?php

  include "conexion.php";
  mysql_set_charset('utf8');
  if($conexion == false){
    die("ERROR: Could not connect. "
                . mysqli_connect_error());
  } else {

  }
  $id_proy_reg_pago = $_POST["id_proy_reg_pago"];

// Chequeo que el item no exista
  $sql = "DELETE FROM facturas_cotizaciones WHERE id_factura_cotizacion = '$id_proy_reg_pago'";
  mysqli_query($conexion, $sql);
  mysqli_close($conexion);
?>