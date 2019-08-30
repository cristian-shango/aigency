<?php  

  include "conexion.php"; 
  mysql_set_charset('utf8');

  if($conexion == false){ 
    die("ERROR: Could not connect. "  
                . mysqli_connect_error()); 
  } else {
    echo "conectado";
  } 

  $id_proyecto = $_POST["id_proyecto"];
  $forma_cobro = $_POST["forma_cobro"];
  $tipo_factura = $_POST["tipo_factura"];
  $numero_factura = $_POST["numero_factura"];
  $numero_oc = $_POST["numero_oc"];
  $fecha_factura = $_POST["fecha_factura"];
  $tiempo_cobro = $_POST["tiempo_cobro"];
  $fecha_cobro = $_POST["fecha_cobro"];
  $importe_neto = $_POST["importe_neto"];
  $tipo_iva = $_POST["tipo_iva"];
  $iva = $_POST["iva"];
  $percepcion = $_POST["percepcion"];
  $importe_bruto = $_POST["importe_bruto"];
  $estado = $_POST["estado"];

  $sql = "UPDATE proyectos_aprobados SET forma_cobro = '$forma_cobro', tipo_factura = '$tipo_factura', numero_factura = '$numero_factura', numero_oc = '$numero_oc', fecha_factura = '$fecha_factura', tiempo_cobro = '$tiempo_cobro', fecha_cobro = '$fecha_cobro', importe_neto = '$importe_neto', iva = '$iva', tipo_iva = '$tipo_iva', percepcion = '$percepcion', importe_bruto = '$importe_bruto', estado = '$estado' WHERE id = '$id_proyecto'";

  if(mysqli_query($conexion, $sql)){ 
    echo $sql; 
  } else { 
      echo "ERROR: Could not able to execute $sql. ". mysqli_error($conexion); 
  }  
  mysqli_close($conexion);

?>