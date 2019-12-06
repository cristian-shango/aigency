<?php  

  $id = $_POST['id'];
  
  include "conexion.php"; 
  mysql_set_charset('utf8');

  $sql = "SELECT registros.rubro_cotizacion, registros.categoria_cotizacion, registros.item, registros.condicion_registro, registros.jornadas_registro, registros.cantidad, registros.importe_neto, registros.importe_total FROM registros INNER JOIN item_cotizacion ON registros.item = item_cotizacion.id_item_cotizacion LEFT JOIN registros_confirmados ON registros_confirmados.id = registros.id WHERE registros.id_proyecto = '$id' AND registros.id IS NULL OR (registros_confirmados.cantidad <> registros.cantidad OR registros_confirmados.jornadas_registro <> registros.jornadas_registro OR registros_confirmados.importe_neto <> registros.importe_neto);";
  //$sql2 ="UPDATE proyectos_aprobados SET estado= 'A FACTURAR'";
  //echo ($sql);

  //$sql = "SELECT COUNT(*) AS contar FROM registros WHERE registro_actualizado = 1 AND id_proyecto = $id";

  //$sql = "SELECT item, importe_neto, cantidad, importe_total, jornadas_registro FROM registros r INNER JOIN item_cotizacion ic ON r.item = ic.id_item_cotizacion WHERE id_proyecto = $id AND registro_actualizado = 1 UNION ALL SELECT item, importe_neto, cantidad, importe_total, jornadas_registro FROM registros_confirmados;";

  $result = mysqli_query($conexion, $sql);
  //$data = mysqli_fetch_assoc($result);

  /*if ($data['contar'] == 0){
    $data['contar'] = "NO";
  } else {
    $data['contar'] = "SI";
  }*/

  //echo $data['contar'];


  $rows = array();
if($result) {
    while($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
    }
}else {
    echo 'MySQL Error: ' . mysqli_error();
}
$json = json_encode($rows);
echo $json;
mysqli_close($conexion);
?>