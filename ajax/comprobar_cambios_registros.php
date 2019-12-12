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
            </tr>";

  $sql = "SELECT registros.rubro_cotizacion, registros.categoria_cotizacion, registros.item, registros.condicion_registro, registros.jornadas_registro, registros.cantidad, registros.importe_neto, registros.importe_total, registros.estado_registro, rubros_cotizaciones.nombre_rubros, item_cotizacion.nombre_item_cotizacion, categorias_cotizaciones.nombre_catcot, condicion_cotizacion.nombre_concot FROM registros INNER JOIN item_cotizacion ON registros.item = item_cotizacion.id_item_cotizacion LEFT JOIN rubros_cotizaciones ON registros.rubro_cotizacion = rubros_cotizaciones.id_rubros_cotizaciones LEFT JOIN condicion_cotizacion ON registros.condicion_registro = condicion_cotizacion.id_concot LEFT JOIN categorias_cotizaciones ON registros.categoria_cotizacion = categorias_cotizaciones.id_catcot WHERE registros.id_proyecto = '$id' AND registros.estado_registro = 0 OR registros.estado_registro = 3;";


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
          echo "</tr>";
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