<?php
  //echo "including<br>";
  include '../conexion.php';
  include '../session.php';
  mysql_set_charset('utf8');
  // recoleccion de datos:
  $id = $_GET['id'];
  $pagos = $_POST['pagos']=='{}'?'NULL':"'".$_POST['pagos']."'";

  $formas = [];
  $respuesta = [];
  $sql = "UPDATE registros SET cotizaciones_pagos = $pagos WHERE id = '$id';";
  //echo $sql."<br>";
  $respuesta['sql'] = $sql;
  mysql_query("SET NAMES 'utf8'");
  if($result = mysqli_query($conexion, $sql)){
    $respuesta['resultado'] = mysqli_fetch_array($result);
  } else {
    $respuesta['error'] = 'ERROR: Could not able to execute $sql . ' . mysqli_error($conexion);
  }
  echo json_encode($respuesta);
  mysqli_close($conexion);
?>
