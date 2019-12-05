<?php

  include "conexion.php";
  mysql_set_charset('utf8');
  if($conexion == false){
    die("ERROR: Could not connect. "
                . mysqli_connect_error());
  } else {

  }
  $proyecto = $_POST["proyecto"];
  $rubro = $_POST["rubro"];
  $nombre_rubro = $_POST["nombre_rubro"];
  $categoria = $_POST["categoria"];
  $item = ($_POST["item"]);
  $condicion = $_POST["condicion"];
  $detalle = ($_POST["detalle"]);
  $jornada = $_POST["jornada"];
  $cantidad = $_POST["cantidad"];
  $importe_neto = $_POST["importe_neto"];
  $importe_total = $_POST["importe_total"];
  $proveedor = $_POST["proveedor"];
  $nombre_proveedor = $_POST["nombre_proveedor"];

  $dias_pago = $_POST["dias_pago"];
  //$pagos = '{"0":{"plazo":"90","porcentaje":"100","forma":"3","fecha1":"","fecha2":"undefined"}}';

  $sql_rubro = "SELECT * FROM rubros_cotizaciones WHERE nombre_rubros = '$nombre_rubro'"; 
  echo "Para rubro: ",$sql_rubro,"<br>";
  $result_rubro = mysqli_query($conexion, $sql_rubro);
  $row_rubro = mysqli_fetch_array($result_rubro);
  $id_rubro_cotizacion = $row_rubro["id_rubros_cotizaciones"];

  $sql_proveedor = "SELECT * FROM proveedores WHERE contacto = '$nombre_proveedor'"; 
  echo "Para Proveedor: ",$sql_proveedor,"<br>";
  $result_proveedor = mysqli_query($conexion, $sql_proveedor);
  $row_proveedor = mysqli_fetch_array($result_proveedor);
  $id_proveedor_cotizacion = $row_proveedor["id_proveedor"];

// Chequeo que el item no exista
  $sql_item = "SELECT id_item_cotizacion FROM item_cotizacion WHERE nombre_item_cotizacion = '$item' AND id_proyecto_item = '$proyecto'";

  if($result_item = mysqli_query($conexion, $sql_item)){
    echo "Item consultado.";
  } else {
      echo "ERROR: Could not able to execute $sql_item. "
      . mysqli_error($conexion);
  }


  if (mysqli_num_rows($result_item)>0){
    $row_item = mysqli_fetch_array($result_item);
    $id_item_cotizacion = $row_item["id_item_cotizacion"];

    $sql_registro = "INSERT INTO registros (id_proyecto, rubro_cotizacion, categoria_cotizacion, item, condicion_registro, detalle_registro, cantidad, jornadas_registro, importe_neto, importe_total, id_proveedor) VALUES ('$proyecto', '$id_rubro_cotizacion', '$categoria', '$id_item_cotizacion', '$condicion', '$detalle', '$cantidad', '$jornada', '$importe_neto', '$importe_total', '$id_proveedor_cotizacion')";

    if(mysqli_query($conexion, $sql_registro)){
      echo "Guardado de registro con item existente.";
      echo $sql_registro;
    } else {
        echo "ERROR: Could not able to execute $sql_registro. ". mysqli_error($conexion);
    }
  } else {
    // Crear NUEVO item
    $sql_creo_item = "INSERT INTO item_cotizacion (nombre_item_cotizacion, id_proyecto_item) VALUES ('$item', '$proyecto')";
    mysqli_query($conexion, $sql_creo_item);

    $sql_item_nuevo = "SELECT id_item_cotizacion FROM item_cotizacion WHERE nombre_item_cotizacion = '$item' AND id_proyecto_item = '$proyecto'";

    if ($result_item_nuevo = mysqli_query($conexion, $sql_item_nuevo)){
      echo "Item consultado creado recientemente.";
    } else {
        echo "ERROR: Could not able to execute $sql_item. "
        . mysqli_error($conexion);
    }

    $row_item_nuevo = mysqli_fetch_array($result_item_nuevo);
    $id_item_cotizacion_nuevo = $row_item_nuevo["id_item_cotizacion"];

    $sql_registro_item = "INSERT INTO registros (id_proyecto, rubro_cotizacion, categoria_cotizacion, item, condicion_registro, detalle_registro, cantidad, jornadas_registro, importe_neto, importe_total, tiempo_pago) VALUES ('$proyecto', '$id_rubro_cotizacion', '$categoria', '$id_item_cotizacion_nuevo', '$condicion', '$detalle', '$cantidad', '$jornada', '$importe_neto', '$importe_total', '$dias_pago')";

    if(mysqli_query($conexion, $sql_registro_item)){
      echo "Guardado de registro con item existente.";
    } else {
        echo "ERROR: Could not able to execute $sql_registro_item. ". mysqli_error($conexion);
    }
  }
  mysqli_close($conexion);
?>
