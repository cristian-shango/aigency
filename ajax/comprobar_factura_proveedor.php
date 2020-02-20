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
  $sql = "SELECT * FROM facturas_cotizaciones WHERE id_factura_cotizacion = '$id_proy_reg_pago'";
  $resultado_hay_factura = mysqli_query($conexion, $sql);
  $datos_hay_factura = mysqli_fetch_array($resultado_hay_factura);
  echo json_encode($datos_hay_factura);
  mysqli_close($conexion);
?>