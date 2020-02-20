<?php  
  
  include "conexion.php"; 
  mysql_set_charset('utf8');

  if($conexion === false){ 
    die("ERROR: Could not connect. "  
                . mysqli_connect_error()); 
  }
  $id_pago = $_POST["id_pago"];
  $id_registro = $_POST["id_registro"];
  $id_proyecto = $_POST["id_proyecto"];
  $id_proveedor = $_POST["id_proveedor"];  
  $numero_factura = $_POST["numero_factura"];
  $fecha_factura = $_POST["fecha_factura"];
  $fecha_pactada = $_POST["fecha_pactada"];
  $archivo_adjunto = $_POST["archivo_adjunto"];
  $tiempo_pago = $_POST["tiempo_pago"];
  $tipo_factura = $_POST["tipo_factura"];
  $importe_neto = $_POST["importe_neto"];
  $iva = $_POST["iva"];
  $tipo_iva = $_POST["tipo_iva"];
  $percepcion = $_POST["percepcion"];
  $importe_bruto = $_POST["importe_bruto"];
  $forma_pago = $_POST["forma_pago"];

  /*$importe_neto = str_replace(".", "", $importe_neto);
  $iva = str_replace(".", "", $iva);
  $percepcion = str_replace(".", "", $percepcion);
  $importe_bruto = str_replace(".", "", $importe_bruto);*/

  $sql_check_id_pago = "SELECT COUNT(*) AS verificacion FROM facturas_cotizaciones WHERE id_factura_cotizacion = '$id_pago'";
                            
  $resultado_check_id_pago = mysqli_query($conexion, $sql_check_id_pago);
  $datos_check_id_pago = mysqli_fetch_assoc($resultado_check_id_pago);

  $check_id_pago = $datos_check_id_pago['verificacion'];

  if ($check_id_pago == 0){
    if ($archivo_adjunto == "sin_subir"){
      $sql = "INSERT INTO facturas_cotizaciones (id_factura_cotizacion, id_registro_cotizacion, id_proyecto_cotizacion, id_proveedor_cotizacion, id_forma_pago_cotizacion, id_tipo_factura_cotizacion, numero_factura_cotizacion, fecha_factura_cotizacion, tiempo_pago_cotizacion, importe_neto_cotizacion, id_tipo_iva_cotizacion, iva_cotizacion, percepcion_cotizacion, importe_bruto_cotizacion, fecha_pago_cotizacion) VALUES ('$id_pago', '$id_registro', '$id_proyecto', '$id_proveedor', '$forma_pago', '$tipo_factura', '$numero_factura', '$fecha_factura', '$tiempo_pago', '$importe_neto', '$tipo_iva', '$iva', '$percepcion', '$importe_bruto', '$fecha_pactada')";
    } else {
      $sql = "INSERT INTO facturas_cotizaciones (id_factura_cotizacion, id_registro_cotizacion, id_proyecto_cotizacion, id_proveedor_cotizacion, id_forma_pago_cotizacion, id_tipo_factura_cotizacion, numero_factura_cotizacion, fecha_factura_cotizacion, tiempo_pago_cotizacion, importe_neto_cotizacion, id_tipo_iva_cotizacion, iva_cotizacion, percepcion_cotizacion, importe_bruto_cotizacion, factura_adjunta_cotizacion, fecha_pago_cotizacion, situacion_cotizacion) VALUES ('$id_pago', '$id_registro', '$id_proyecto', '$id_proveedor', '$forma_pago', '$tipo_factura', '$numero_factura', '$fecha_factura', '$tiempo_pago', '$importe_neto', '$tipo_iva', '$iva', '$percepcion', '$importe_bruto', '$archivo_adjunto', '$fecha_pactada', 1)";
    }
  } else {
    if ($archivo_adjunto == "sin_subir"){
      $sql = "UPDATE facturas_cotizaciones SET id_factura_cotizacion = '$id_pago' ,id_registro_cotizacion = '$id_registro' ,id_proyecto_cotizacion = '$id_proyecto' ,id_proveedor_cotizacion = '$id_proveedor' ,id_forma_pago_cotizacion = '$forma_pago' ,id_tipo_factura_cotizacion = '$tipo_factura' ,numero_factura_cotizacion = '$numero_factura' ,fecha_factura_cotizacion = '$fecha_factura' ,tiempo_pago_cotizacion = '$tiempo_pago' ,importe_neto_cotizacion = '$importe_neto' ,id_tipo_iva_cotizacion = '$tipo_iva' ,iva_cotizacion = '$iva' ,percepcion_cotizacion = '$percepcion' ,importe_bruto_cotizacion = '$importe_bruto' ,fecha_pago_cotizacion = '$fecha_pactada' WHERE id_factura_cotizacion = '$id_pago'";
    } else {
      $sql = "UPDATE facturas_cotizaciones SET id_factura_cotizacion = '$id_pago' ,id_registro_cotizacion = '$id_registro' ,id_proyecto_cotizacion = '$id_proyecto' ,id_proveedor_cotizacion = '$id_proveedor' ,id_forma_pago_cotizacion = '$forma_pago' ,id_tipo_factura_cotizacion = '$tipo_factura' ,numero_factura_cotizacion = '$numero_factura' ,fecha_factura_cotizacion = '$fecha_factura' ,tiempo_pago_cotizacion = '$tiempo_pago' ,importe_neto_cotizacion = '$importe_neto' ,id_tipo_iva_cotizacion = '$tipo_iva' ,iva_cotizacion = '$iva' ,percepcion_cotizacion = '$percepcion' ,importe_bruto_cotizacion = '$importe_bruto' ,factura_adjunta_cotizacion = '$archivo_adjunto', fecha_pago_cotizacion = '$fecha_pactada', situacion_cotizacion = 1 WHERE id_factura_cotizacion = '$id_pago'";
    }
  }

  //$sql3 = "SELECT id FROM registros_confirmados WHERE id = '$'";
  /*$sql4 = "UPDATE registros_confirmados INNER JOIN registros USING (id) SET registros_confirmados.id_proyecto = registros.id_proyecto WHERE id ='$id'";*/

  //$sql4 = "UPDATE registros_confirmados SET archivo_adjunto = '$archivo_adjunto' WHERE id= '$id'";

  /*$resultado3 = mysqli_query($conexion =  $sql3);

  if ($resultado3 <> null){
    echo "Proveedor actualizado en registros_confirmados";
    mysqli_query($conexion, $sql4);
  }*/

  if(mysqli_query($conexion, $sql)){ 
    echo "Factura cargada/actualizada."; 
  } else { 
      echo "ERROR: Could not able to execute $sql. "  
      . mysqli_error($conexion); 
  }  
  mysqli_close($conexion);

?>