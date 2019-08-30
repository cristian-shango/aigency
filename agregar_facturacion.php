<?php  
  
  include "conexion.php"; 
  mysql_set_charset('utf8');

  $id_proyecto = $_POST['id_proyecto'];
  $tipo_factura = $_POST['tipo_factura'];
  $numero_factura = $_POST['numero_factura'];
  $numero_oc = $_POST['numero_oc'];
  $fecha_facturacion = $_POST['fecha_facturacion'];
  $fecha_pago = $_POST['fecha_pago'];
  $importe_neto = $_POST['importe_neto'];
  $tipo_iva = $_POST['tipo_iva'];
  $iva = $_POST['iva'];
  $percepcion = $_POST['percepcion'];
  $importe_bruto = $_POST['importe_bruto'];
  $forma_cobro = $_POST['forma_pago'];
  

  $sql = "INSERT INTO administracion (id_proyecto, tipo_factura, numero_oc, fecha_factura, fecha_pago, importe_neto, tipo_iva, iva, percepcion, importe_bruto, forma_cobro, estado_facturacion) VALUES ('$id_proyecto', '$tipo_factura', '$numero_oc', '$fecha_facturacion', '$fecha_pago', '$importe_neto', '$tipo_iva', '$iva', '$percepcion', '$importe_bruto', '$forma_cobro', 'FACTURADO')";

  $sql2 = "UPDATE proyectos SET estado= 'FACTURADO' WHERE id= '$id_proyecto'";
  if(mysqli_query($conexion, $sql)){ 
    echo "Facturacion creada."; 
  } else { 
      echo "ERROR: Could not able to execute $sql. "  
      . mysqli_error($conexion); 
  }  
  mysqli_query($conexion, $sql2);
  mysqli_close($conexion);

?>