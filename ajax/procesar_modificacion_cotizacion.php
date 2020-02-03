<?php  

  $registro = $_POST['registro'];
  $estado = $_POST['estado'];
  
  include "conexion.php"; 
  mysql_set_charset('utf8');

  if($conexion === false){ 
    die("ERROR: Could not connect. "  
                . mysqli_connect_error()); 
  } else {
    echo "conectado";
  }

  if ($estado == 2){
    $sql = "UPDATE registros, registros_confirmados SET registros_confirmados.jornadas_registro = registros.jornadas_registro, registros_confirmados.cantidad = registros.cantidad, registros_confirmados.importe_neto = registros.importe_neto, registros_confirmados.importe_total = registros.importe_total, registros.estado_registro = 1, registros_confirmados.estado_registro = 1 WHERE registros.id = $registro";
    mysqli_query($conexion, $sql);
    echo ("Registro MODIFICADO actualizado");
  }

  mysqli_close($conexion);

?>