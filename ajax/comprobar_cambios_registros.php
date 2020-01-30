<?php  

  $id = $_POST['id'];
  
  include "conexion.php"; 
  mysql_set_charset('utf8');

  echo "<tbody>
            <tr>
              <th scope='col' class='gray' width='2%;'>Estado</th>
              <th scope='col' class='gray' width='10%;'>Rubro</th>
              <th scope='col' class='gray' width='10%;'>Categoría</th>
              <th scope='col' class='gray' width='30%;'>Item</th>
              <th scope='col' class='gray' width='8%;'>Condición</th>
              <th scope='col' class='gray' width='10%;'>Jornadas</th>
              <th scope='col' class='gray' width='10%;'>Cant.</th>
              <th scope='col' class='gray' width='10%;'>Valor</th>
              <th scope='col' class='gray' width='10%;'>Total</th>
              <th scope='col' class='gray' width='10%;'></th>
            </tr>";

  $sql = "SELECT registros.rubro_cotizacion, registros.categoria_cotizacion, registros.item, registros.condicion_registro, registros.jornadas_registro, registros.cantidad, registros.importe_neto, registros.importe_total, registros.estado_registro, rubros_cotizaciones.nombre_rubros, item_cotizacion.nombre_item_cotizacion, categorias_cotizaciones.nombre_catcot, condicion_cotizacion.nombre_concot FROM registros INNER JOIN item_cotizacion ON registros.item = item_cotizacion.id_item_cotizacion LEFT JOIN rubros_cotizaciones ON registros.rubro_cotizacion = rubros_cotizaciones.id_rubros_cotizaciones LEFT JOIN condicion_cotizacion ON registros.condicion_registro = condicion_cotizacion.id_concot LEFT JOIN categorias_cotizaciones ON registros.categoria_cotizacion = categorias_cotizaciones.id_catcot WHERE registros.id_proyecto = '$id' AND registros.estado_registro = 0";

  $sql_eliminados = "SELECT registros_eliminados.rubro_cotizacion, registros_eliminados.categoria_cotizacion, registros_eliminados.item, registros_eliminados.condicion_registro, registros_eliminados.jornadas_registro, registros_eliminados.cantidad, registros_eliminados.importe_neto, registros_eliminados.importe_total, registros_eliminados.estado_registro, rubros_cotizaciones.nombre_rubros, item_cotizacion.nombre_item_cotizacion, categorias_cotizaciones.nombre_catcot, condicion_cotizacion.nombre_concot FROM registros_eliminados INNER JOIN item_cotizacion ON registros_eliminados.item = item_cotizacion.id_item_cotizacion LEFT JOIN rubros_cotizaciones ON registros_eliminados.rubro_cotizacion = rubros_cotizaciones.id_rubros_cotizaciones LEFT JOIN condicion_cotizacion ON registros_eliminados.condicion_registro = condicion_cotizacion.id_concot LEFT JOIN categorias_cotizaciones ON registros_eliminados.categoria_cotizacion = categorias_cotizaciones.id_catcot WHERE registros_eliminados.id_proyecto = '$id'";


   mysql_query("SET NAMES 'utf8'");
    if($result = mysqli_query($conexion, $sql)){
      if(mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_array($result)) {
          echo "<tr class='cotizacion_pagos_group'>";
            $estado = $row['estado_registro'];
            switch ($estado){
              case 0:
                echo "<td><span class='badge badge-primary'>NUEVO</span></td>";
                break;

              case 1:
                echo "<td><span class='badge badge-success'>SIN MODIFICACIONES</span></td>";
                break;

              case 2:
                echo "<td><span class='badge badge-warning'>MODIFICADO</span></td>";
                break;

              case 3:
                echo "<td><span class='badge badge-danger'>ELIMINADO</span></td>";
                break;
            };
            
            echo "<td scope='row' style='font-weight: bolder;'>".utf8_encode($row['nombre_rubros'])."</td>";
            echo "<td scope='row' style='font-weight: bolder;'>".utf8_encode($row['nombre_catcot'])."</td>";
            echo "<td>".$row['nombre_item_cotizacion']."</td>";
            echo "<td scope='row'>".utf8_encode($row['nombre_concot'])."</td>";
            //echo "<td>".($row['detalle_registro'])."</td>";
            echo "<td>".($row['jornadas_registro'])."</td>";
            echo "<td>".$row['cantidad']."</td>";
            echo "<td>$<span class='valor_precio_cliente numerable'>".$row['importe_neto']."</span></td>";
            echo "<td>$<span class='valor_promedio numerable cotizacion_pagos_total' data-registro='".$row['id_catcot']."' data-valor='".$row['importe_total']."'>".$row['importe_total']."</span></td>";
            echo "<td><button type='button' class='btn btn-success aprobar_modificacion'><i class='icon wb-check' aria-hidden='true'></i></button><button type='button' class='btn btn-danger denegar_modificacion'><i class='icon wb-close' aria-hidden='true'></i></button></td>";
          echo "</tr>";
        }
        $result_eliminados = mysqli_query($conexion, $sql_eliminados);
        if(mysqli_num_rows($result_eliminados) > 0){
          while ($row_eliminados = mysqli_fetch_array($result_eliminados)) {
            echo "<tr class='cotizacion_pagos_group'>";
            echo "<td><span class='badge badge-danger'>ELIMINADO</span></td>";
            echo "<td scope='row_eliminados' style='font-weight: bolder;'>".utf8_encode($row_eliminados['nombre_rubros'])."</td>";
            echo "<td scope='row_eliminados' style='font-weight: bolder;'>".utf8_encode($row_eliminados['nombre_catcot'])."</td>";
            echo "<td>".$row_eliminados['nombre_item_cotizacion']."</td>";
            echo "<td scope='row_eliminados'>".utf8_encode($row_eliminados['nombre_concot'])."</td>";
            //echo "<td>".($row_eliminados['detalle_registro'])."</td>";
            echo "<td>".($row_eliminados['jornadas_registro'])."</td>";
            echo "<td>".$row_eliminados['cantidad']."</td>";
            echo "<td>$<span class='valor_precio_cliente numerable'>".$row_eliminados['importe_neto']."</span></td>";
            echo "<td>$<span class='valor_promedio numerable cotizacion_pagos_total' data-registro='".$row_eliminados['id_catcot']."' data-valor='".$row_eliminados['importe_total']."'>".$row_eliminados['importe_total']."</span></td>";
            echo "<td><button type='button' class='btn btn-success aprobar_modificacion'><i class='icon wb-check' aria-hidden='true'></i></button><button type='button' class='btn btn-danger denegar_modificacion'><i class='icon wb-close' aria-hidden='true'></i></button></td>";
            echo "</tr>";
          }
        }
      }
    }
    echo "</tbody>";

  /*$result = mysqli_query($conexion, $sql);
  
  $rows = array();
if($result) {
    while($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
    }
}else {
    echo 'MySQL Error: ' . mysqli_error();
}
$json = json_encode($rows);
echo $json;*/
mysqli_close($conexion);
?>