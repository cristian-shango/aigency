<?php  
  
  include "conexion.php"; 
  mysql_set_charset('utf8');

  if($conexion === false){ 
    die("ERROR: Could not connect. "  
                . mysqli_connect_error()); 
  } else {
    echo "conectado";
  } 

  $cliente = $_POST["cliente"];
  $proyecto = $_POST["proyecto"];
  $item = $_POST["item"];
  $ot = $_POST["numero_ot"];
  $detalle = $_POST["detalle"];
  $tipo_factura = $_POST["tipo_factura"];
  $numero_factura = $_POST["numero_factura"];
  $fecha_factura = $_POST["fecha_factura"];
  $fecha_pactada = $_POST["fecha_pactada"];
  $importe_neto = $_POST["importe_neto"];
  $iva = $_POST["iva"];
  $percepcion = $_POST["percepcion"];
  $importe_bruto = $_POST["importe_bruto"];
  $archivo_adjunto = $_POST["adjunto"];

  $sql = "INSERT INTO registros (cliente, proyecto, item, ot, detalle, tipo_factura, numero_factura, fecha_factura, fecha_pactada, importe_neto, iva, percepcion, importe_bruto, archivo_adjunto) VALUES ('$cliente', '$proyecto', '$item', '$ot', '$detalle', '$tipo_factura', '$numero_factura', '$fecha_factura', '$fecha_pactada', '$importe_neto', '$iva', '$percepcion', '$importe_bruto', '$archivo_adjunto')";

  if(mysqli_query($conexion, $sql)){ 
    echo "Registro creado."; 
  } else { 
      echo "ERROR: Could not able to execute $sql. "  
      . mysqli_error($conexion); 
  }  
  mysqli_close($conexion);

?>