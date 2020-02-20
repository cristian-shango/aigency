<?php

  include "conexion.php";
  mysql_set_charset('utf8');
  
  $id_proy_reg_pago = $_POST["id_proy_reg_pago"];
  $hay_factura = 0;

// Chequeo que el item no exista

  $sql_cantidad_cambios = "SELECT COUNT(*) AS factura FROM facturas_cotizaciones WHERE id_factura_cotizacion = '$id_proy_reg_pago'";
  $resultado_cantidad_cambios = mysqli_query($conexion, $sql_cantidad_cambios);
  $datos_cantidad_cambios = mysqli_fetch_assoc($resultado_cantidad_cambios);

  $cantidad = $datos_cantidad_cambios['factura'];

  if ($cantidad == 0){
    $hay_factura = 0;
  } else {
    $hay_factura = 1;
  }

  $sql_adjunto = "SELECT * FROM facturas_cotizaciones WHERE id_factura_cotizacion = '$id_proy_reg_pago'";
  $resultado_adjunto = mysqli_query($conexion, $sql_adjunto);
  $datos_adjunto = mysqli_fetch_assoc($resultado_adjunto);

  if ($datos_adjunto['id_factura_cotizacion'] == $id_proy_reg_pago){
    if ($datos_adjunto['factura_adjunta_cotizacion'] == null){
      $hay_factura = 2;
    }  
  }
  
  echo $hay_factura;

  mysqli_close($conexion);
?>