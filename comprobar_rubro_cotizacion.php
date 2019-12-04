<?php
  include "conexion.php";
  mysql_set_charset('utf8');
  if($conexion == false){
    die("ERROR: Could not connect. "
                . mysqli_connect_error());
  }

  $rubro = $_POST["rubro"];
  $nombre_rubro = $_POST["nombre_rubro"];

// Chequeo que el item no exista
  $sql_rubro = "SELECT * FROM rubros_cotizaciones WHERE nombre_rubros = '$nombre_rubro'";

  if($resultado_rubro = mysqli_query($conexion, $sql_rubro)){
    //conectado con rubros
  } else {
      echo "ERROR: Could not able to execute $sql_rubro. "
      . mysqli_error($conexion);
  }

  if (mysqli_num_rows($resultado_rubro)>0){
    echo "Rubro existente, no hago nada.";
  } else {
    // Crear NUEVO rubro
    $sql_creo_rubro = "INSERT INTO rubros_cotizaciones (nombre_rubros) VALUES ('$nombre_rubro')";
    mysqli_query($conexion, $sql_creo_rubro);
    echo "Rubro $rubro creado";
  }
  mysqli_close($conexion);
 ?>