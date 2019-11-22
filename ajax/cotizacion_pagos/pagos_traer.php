<?php
  include '../conexion.php';
  include '../session.php';
  mysql_set_charset('utf8');

  $id_proyecto = $_GET['id'];
  $id_registro = $_GET['reg'];
  $condicion_proyecto = "";
  $condicion_registro = "";
  if ($id_proyecto>0) $condicion_proyecto = "id_proyecto = '$id_proyecto' AND";
  if ($id_registro>0) $condicion_registro = "id = '$id_registro' AND";

  $sql = "SELECT id, cotizaciones_pagos FROM registros
            WHERE $condicion_registro $condicion_proyecto cotizaciones_pagos IS NOT NULL;";

  //echo $sql."<br>";
  $respuesta['sql'] = $sql;
  mysql_query("SET NAMES 'utf8'");
  if($result = mysqli_query($conexion, $sql)) {
    $data = [];
    while ($row = mysqli_fetch_array($result)){
      $data[$row['id']] = $row['cotizaciones_pagos'];
    }
    $respuesta['data'] = $data;
  } else {
    $respuesta['error'] = 'ERROR: Could not able to execute $sql . ' . mysqli_error($conexion);
  }
  echo json_encode($respuesta);
  mysqli_close($conexion);
?>
