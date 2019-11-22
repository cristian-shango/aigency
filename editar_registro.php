<?php  
  
  include "conexion.php"; 
  mysql_set_charset('utf8');

  if($conexion === false){ 
    die("ERROR: Could not connect. "  
                . mysqli_connect_error()); 
  } else {
    echo "conectado";
  } 

  $id_registro = $_POST["id_registro"];
  $rubro = $_POST["rubro"];
  $categoria = $_POST["categoria"];
  $item = $_POST["item"];
  $id_item = $_POST["id_item"];
  $condicion = $_POST["condicion"];
  $detalle = $_POST["detalle"];
  $cantidad = $_POST["cantidad"];
  $jornadas = $_POST["jornadas"];
  $importe_neto = $_POST["importe_neto"];
  $importe_total = $_POST["importe_total"];
  $proveedor = $_POST["proveedor"];
  $forma_pago = $_POST["forma_pago"];
  $dias_pago = $_POST["dias_pago"];

  $sql = "UPDATE registros SET rubro_cotizacion= '$rubro', categoria_cotizacion= '$categoria', condicion_registro= '$condicion', detalle_registro= '$detalle', jornadas_registro = '$jornadas', cantidad = '$cantidad',importe_neto= '$importe_neto', importe_total= '$importe_total', id_proveedor= '$proveedor', forma_pago = '$forma_pago', tiempo_pago = '$dias_pago' WHERE id= '$id_registro'";

  $sql2 = "UPDATE item_cotizacion SET nombre_item_cotizacion= '$item' WHERE id_item_cotizacion= '$id_item'";
  $sql3 = "SELECT id FROM registros_confirmados WHERE id = '$id_registro'";
  $sql4 = "UPDATE registros_confirmados SET id_proveedor = '$proveedor' WHERE id= '$id_registro'";

  $resultado3 = mysqli_query($conexion, $sql3);

  if ($resultado3 <> null){
    echo "Proveedor actualizado en registros_confirmados";
    mysqli_query($conexion, $sql4);
  }

  if(mysqli_query($conexion, $sql)){ 
    mysqli_query($conexion, $sql2);
  } else { 
      echo "ERROR: Could not able to execute $sql. "  
      . mysqli_error($conexion); 
  }  
  mysqli_close($conexion);

?>