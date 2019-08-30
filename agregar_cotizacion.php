<?php

  include "conexion.php";
  mysql_set_charset('utf8');
  if($conexion == false){
    die("ERROR: Could not connect. "
                . mysqli_connect_error());
  } else {
    echo "conectado<br>";
  }
  $proyecto = $_POST["proyecto"];
  $rubro = $_POST["rubro"];
  $categoria = $_POST["categoria"];
  $item = ($_POST["item"]);
  $condicion = $_POST["condicion"];
  $detalle = ($_POST["detalle"]);
  $jornada = $_POST["jornada"];
  $cantidad = $_POST["cantidad"];
  $importe_neto = $_POST["importe_neto"];
  $importe_total = $_POST["importe_total"];

  $dias_pago = $_POST["dias_pago"];
  $sql = "INSERT INTO registros (id_proyecto, rubro_cotizacion, categoria_cotizacion, item, condicion_registro, detalle_registro, cantidad, jornadas_registro, importe_neto, importe_total, tiempo_pago) VALUES ('$proyecto', '$rubro', '$categoria', '$item', '$condicion', '$detalle', '$cantidad', '$jornada', '$importe_neto', '$importe_total', '$dias_pago')";
  if($result = mysqli_query($conexion, $sql)){
    echo $sql;
    while($r = mysqli_fetch_array($result)){
      foreach ($r as $key => $value) {
        echo "$key: $value, ";
      }
    }
  } else {
      echo "ERROR: Could not able to execute $sql. "
      . mysqli_error($conexion);
  }
  /*$sql1 = "UPDATE proyectos SET saldo= '$saldo', consumido= '$consumido' WHERE id= '$id_proyecto'";
  if(mysqli_query($conexion, $sql1)){
    echo "Saldo actualizado.";
  } else {
      echo "ERROR: Could not able to execute $sql1. "
      . mysqli_error($conexion);
  }*/
  mysqli_close($conexion);
?>
