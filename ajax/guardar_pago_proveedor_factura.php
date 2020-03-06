<?php  
  
  include "conexion.php";
  include "conexion.php";
  mysql_set_charset('utf8');

  if($conexion === false){ 
    die("ERROR: Could not connect. "  
                . mysqli_connect_error()); 
  } else {
    echo "conectado";
  } 

  $id_registro_pp = $_POST["id_registro_pp"];
  $id_factura_pp = $_POST["id_factura_pp"];
  $id_proyecto_pp = $_POST["id_proyecto_pp"];
  $estado_pp = $_POST["estado_pp"];
  $monto_pagado_pp = $_POST["monto_pagado_pp"];
  $monto_retenido_pp = $_POST["monto_retenido_pp"];
  $monto_total_pp = $_POST["monto_total_pp"];
  $id_banco_origen_pp = $_POST["id_banco_origen_pp"];
  $id_banco_destino_pp = $_POST["id_banco_destino_pp"];
  $numero_cheque_pp = $_POST["numero_cheque_pp"];
  $tipo_cheque_pp = $_POST["tipo_cheque_pp"];
  $fecha_cheque_pp = $_POST["fecha_cheque_pp"];
  $fecha_pago_pp = $_POST["fecha_pago_pp"];
  $cruzado_cheque_pp = $_POST["cruzado_cheque_pp"];
  $orden_cheque_pp = $_POST["orden_cheque_pp"];
  $fecha_emision_pp = $_POST["fecha_emision_pp"];
  $fecha_ejecucion_pp = $_POST["fecha_ejecucion_pp"];
  $cbu_alias_pp = $_POST["cbu_alias_pp"];
  $id_tarjeta_credito_pp = $_POST["id_tarjeta_credito_pp"];
  $cuotas_tarjeta_pp = $_POST["cuotas_tarjeta_pp"];
  $tiempo_pp = $_POST["tiempo_pp"];
  $usuario_pp = $_POST["usuario_pp"];
  $tipo_pago_elegido_pp = $_POST["tipo_pago_elegido"];
  $ganancias_pp = $_POST["ganancias_pp"];
  $iibb_pp = $_POST["iibb_pp"];
  $segsoc_pp = $_POST["segsoc_pp"];

  if ($estado_pp == "PP"){
    $estado_pp = 3;
  }

  if ($estado_pp == "PD"){
    $estado_pp = 1;
  }

  if ($estado_pp == "PC"){
    $estado_pp = 2;
  }

/*
  $sql_cantidad_cambios = "SELECT COUNT(*) AS pago_realizado FROM pagos WHERE id_factura_pp = '$id_factura_pp'";
  $resultado_cantidad_cambios = mysqli_query($conexion, $sql_cantidad_cambios);
  $datos_cantidad_cambios = mysqli_fetch_assoc($resultado_cantidad_cambios);

  $cantidad = $datos_cantidad_cambios['pago_realizado'];

  if ($cantidad == 0){
    $hay_factura = 0;*/
    $sql = "INSERT INTO pagos (id_registro_pp, id_factura_pp, id_proyecto_pp, estado_pp, monto_pagado_pp, monto_retenido_pp, monto_total_pp, id_banco_origen_pp, id_banco_destino_pp, numero_cheque_pp, tipo_cheque_pp, fecha_cheque_pp, fecha_pago_pp, cruzado_cheque_pp, orden_cheque_pp, fecha_emision_pp, fecha_ejecucion_pp, cbu_alias_pp, id_tarjeta_credito_pp, cuotas_tarjeta_pp, tiempo_pp, usuario_pp, tipo_pago_elegido_pp, retencion_ganancias_pp, retencion_iibb_pp, retencion_segsoc_pp, ingreso_fecha_pago_pp) VALUES ('$id_registro_pp', '$id_factura_pp', '$id_proyecto_pp', '$estado_pp', '$monto_pagado_pp', '$monto_retenido_pp', '$monto_total_pp', '$id_banco_origen_pp', '$id_banco_destino_pp', '$numero_cheque_pp', '$tipo_cheque_pp', '$fecha_cheque_pp', '$fecha_pago_pp', '$cruzado_cheque_pp', '$orden_cheque_pp', '$fecha_emision_pp', '$fecha_ejecucion_pp', '$cbu_alias_pp', '$id_tarjeta_credito_pp', '$cuotas_tarjeta_pp', '$tiempo_pp', '$usuario_pp', '$tipo_pago_elegido_pp', '$ganancias_pp', '$iibb_pp', '$segsoc_pp', NOW())";
/*  } else {
    $hay_factura = 1;
    $sql = "UPDATE pagos SET id_registro_pp = '$id_registro_pp', id_proyecto_pp = '$id_proyecto_pp', estado_pp = '$estado_pp', monto_pagado_pp = '$monto_pagado_pp', monto_retenido_pp = '$monto_retenido_pp', monto_total_pp = '$monto_total_pp', id_banco_origen_pp = '$id_banco_origen_pp', id_banco_destino_pp = '$id_banco_destino_pp', numero_cheque_pp = '$numero_cheque_pp', tipo_cheque_pp = '$tipo_cheque_pp', fecha_cheque_pp = '$fecha_cheque_pp', fecha_pago_pp = '$fecha_pago_pp', cruzado_cheque_pp = '$cruzado_cheque_pp', orden_cheque_pp = '$orden_cheque_pp', fecha_emision_pp = '$fecha_emision_pp', fecha_ejecucion_pp = '$fecha_ejecucion_pp', cbu_alias_pp = '$cbu_alias_pp', id_tarjeta_credito_pp = '$id_tarjeta_credito_pp', cuotas_tarjeta_pp = '$cuotas_tarjeta_pp', tiempo_pp = '$tiempo_pp', usuario_pp = '$usuario_pp', tipo_pago_elegido_pp = '$tipo_pago_elegido_pp' WHERE id_factura_pp = '$id_factura_pp'";
  }*/

  $sql_facturas_cotizaciones = "UPDATE facturas_cotizaciones SET importe_pagado_cotizacion = '$monto_total_pp', estado_cotizacion = '$estado_pp' WHERE id_factura_cotizacion = '$id_factura_pp'";

  if(mysqli_query($conexion, $sql)){ 
    echo "Pago creado.";
    mysqli_query($conexion, $sql_facturas_cotizaciones);
  } else { 
    echo "ERROR: Could not able to execute $sql. "  
    . mysqli_error($conexion); 
  } 

  mysqli_close($conexion);

?>