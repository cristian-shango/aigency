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
  $archivo_adjunto = $_POST["archivo_adjunto"];
 
  $tipo_factura = $_POST["tipo_factura"];
  $importe_neto = $_POST["importe_neto"];
  $iva = $_POST["iva"];
  $tipo_iva = $_POST["tipo_iva"];
  $percepcion = $_POST["percepcion"];
  $importe_bruto = $_POST["importe_bruto"];
  $forma_pago = $_POST["forma_pago"];

  $sql = "UPDATE registros SET id_proveedor='$id_proveedor', numero_factura= '$numero_factura', tipo_factura= '$tipo_factura', fecha_factura= '$fecha_factura', fecha_pago= '$fecha_pactada', archivo_adjunto = '$archivo_adjunto', importe_neto = '$importe_neto', iva = '$iva', percepcion = '$percepcion', importe_bruto = '$importe_bruto', forma_pago = '$forma_pago' WHERE id= '$id'";

  $sql3 = "SELECT id FROM registros_confirmados WHERE id = '$id'";
  /*$sql4 = "UPDATE registros_confirmados INNER JOIN registros USING (id) SET registros_confirmados.id_proyecto = registros.id_proyecto WHERE id ='$id'";*/

  $sql4 = "UPDATE registros_confirmados SET archivo_adjunto = '$archivo_adjunto' WHERE id= '$id'";

  $resultado3 = mysqli_query($conexion, $sql3);

  if ($resultado3 <> null){
    echo "Proveedor actualizado en registros_confirmados";
    mysqli_query($conexion, $sql4);
  }

  if(mysqli_query($conexion, $sql)){ 
    echo "Registro creado."; 
  } else { 
      echo "ERROR: Could not able to execute $sql. "  
      . mysqli_error($conexion); 
  }  
  mysqli_close($conexion);

?>