<?php  
  
  include "conexion.php"; 
  mysql_set_charset('utf8');

  if($conexion === false){ 
    die("ERROR: Could not connect. "  
                . mysqli_connect_error()); 
  } else {
    echo "conectado";
  } 

  $id = $_POST["id"];
  $id_proveedor = $_POST["id_proveedor"];
  $numero_factura = $_POST["numero_factura"];
  $fecha_factura = $_POST["fecha_factura"];
  $fecha_pactada = $_POST["fecha_pactada"];
  $tipo_factura = $_POST["tipo_factura"];
  $importe_neto = $_POST["importe_neto"];
  $iva = $_POST["iva"];
  $percepcion = $_POST["percepcion"];
  $importe_bruto = $_POST["importe_bruto"];

  $sql = "UPDATE registros SET id_proveedor='$id_proveedor', numero_factura= '$numero_factura', tipo_factura= '$tipo_factura', fecha_factura= '$fecha_factura', fecha_pago= '$fecha_pactada', importe_neto = '$importe_neto', iva = '$iva', percepcion = '$percepcion', importe_bruto = '$importe_bruto' WHERE id= '$id'";

  if(mysqli_query($conexion, $sql)){ 
    echo "Registro creado."; 
  } else { 
      echo "ERROR: Could not able to execute $sql. "  
      . mysqli_error($conexion); 
  }  
  mysqli_close($conexion);

?>