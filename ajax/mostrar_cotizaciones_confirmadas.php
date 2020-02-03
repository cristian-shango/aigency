<?php
  include 'conexion.php';
  include 'session.php';
  mysql_set_charset('utf8');
  $proyecto = $_POST['proyecto'];
  $merge_rubros = array();
  $merge_categorias = array();
  $merge_items = array();
    $sql_merge_rubros = " SELECT rubro_cotizacion AS rubro, COUNT(*) AS merge
                              FROM registros_confirmados WHERE id_proyecto = '$proyecto' AND registro_seleccionado = 1
                              GROUP BY rubro_cotizacion;";


    mysql_query("SET NAMES 'utf8'");
    if($result_merge_rubros = mysqli_query($conexion, $sql_merge_rubros)){
        if(mysqli_num_rows($result_merge_rubros) > 0){
            while ($row_merge_rubros = mysqli_fetch_array($result_merge_rubros)){
                $merge_rubros[$row_merge_rubros['rubro']] = array(  'rowspan' => $row_merge_rubros['merge'],
                                                                    'recuento' => $row_merge_rubros['merge'] );
            }
        } else {
            echo "<br>No se recibieron datos.";
        }
    }

    $sql_merge_categorias = "SELECT rubro_cotizacion AS rubro, categoria_cotizacion AS categoria, COUNT(*) AS merge
                              FROM registros_confirmados WHERE id_proyecto = '$proyecto' AND registro_seleccionado = 1
                                GROUP BY rubro_cotizacion, categoria_cotizacion;";

    mysql_query("SET NAMES 'utf8'");
    if($result_merge_categorias = mysqli_query($conexion, $sql_merge_categorias)){
        if(mysqli_num_rows($result_merge_categorias) > 0){
            while ($row_merge_categorias = mysqli_fetch_array($result_merge_categorias)){
              $merge_rubros[$row_merge_categorias['rubro']][$row_merge_categorias['categoria']] = array( 'rowspan' => $row_merge_categorias['merge'],
                                                                                                         'recuento' => $row_merge_categorias['merge'] );
              $merge_rubros[$row_merge_categorias['rubro']]['rowspan'] += 1;
            }
        }
    }

    $sql_merge_items = "SELECT
                            item,
                                nombre_item_cotizacion AS nombre_item,
                                categoria,
                                rubro,
                                merge,
                                prom_selec,
                                prom_todo
                        FROM
                          (select rubro_cotizacion AS rubro, categoria_cotizacion AS categoria, item, COUNT(*) AS merge
                            FROM registros_confirmados WHERE id_proyecto = '$proyecto' AND registro_seleccionado = 1
                            GROUP BY rubro_cotizacion, categoria_cotizacion, item
                            ORDER BY rubro_cotizacion) AS ru_co
                        LEFT JOIN item_cotizacion AS ic
                        ON ic.id_item_cotizacion = ru_co.item
                        LEFT JOIN
                            (SELECT rubro AS rubro2, categoria AS categoria2, item AS item2, prom_selec, prom_todo FROM
                              (SELECT rubro_cotizacion AS rubro, categoria_cotizacion AS categoria, item, AVG(importe_total) AS prom_todo
                                FROM registros_confirmados WHERE id_proyecto = '$proyecto' AND registro_seleccionado = 1
                                GROUP BY rubro_cotizacion, categoria_cotizacion, item) AS todo
                              LEFT JOIN
                              (SELECT rubro_cotizacion AS rubro2, categoria_cotizacion AS categoria2, item AS item2, AVG(importe_total) AS prom_selec
                                FROM registros_confirmados WHERE id_proyecto = '$proyecto' AND registro_seleccionado = 1
                                GROUP BY rubro_cotizacion, categoria_cotizacion, item) AS sel
                              ON todo.rubro = sel.rubro2
                                        AND todo.categoria = sel.categoria2
                                        AND todo.item = sel.item2) AS proms
                        ON proms.rubro2 = ru_co.rubro
                                AND proms.categoria2 = ru_co.categoria
                                AND proms.item2 = ru_co.item;";

    mysql_query("SET NAMES 'utf8'");
    if($result_merge_items = mysqli_query($conexion, $sql_merge_items)){
        if(mysqli_num_rows($result_merge_items) > 0){
            while ($row_merge_items = mysqli_fetch_array($result_merge_items)){
                $merge_rubros[$row_merge_items['rubro']][$row_merge_items['categoria']][$row_merge_items['item']] = array(
                  'rowspan' => $row_merge_items['merge'],
                  'prom' => $row_merge_items['prom_selec'] ? $row_merge_items['prom_selec'] : $row_merge_items['prom_todo']
                );
            }
        }
    }

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
      $sql_registros = "SELECT * FROM registros_confirmados r
                        INNER JOIN rubros_cotizaciones rc ON r.rubro_cotizacion = rc.id_rubros_cotizaciones
                        INNER JOIN categorias_cotizaciones cc ON r.categoria_cotizacion = cc.id_catcot
                        INNER JOIN condicion_cotizacion concot ON r.condicion_registro = concot.id_concot
                        LEFT JOIN item_cotizacion ic ON r.item = ic.id_item_cotizacion
                        WHERE id_proyecto = '$proyecto' AND registro_seleccionado = 1
                        ORDER BY rubro_cotizacion ASC, nombre_catcot ASC, nombre_item_cotizacion ASC, item ASC;";
      //echo $sql_registros."<br>";
      mysql_query("SET NAMES 'utf8'");
      if($result_registros = mysqli_query($conexion, $sql_registros)){
          if(mysqli_num_rows($result_registros) > 0){

              $i = 0;
              $suma_valor = 0;
              $item = 0;
              $rubro_anterior = 0;

              $rubro_actual = 0;
              $conteo_rubro = 0;
              $subtotal_rubro = 0;

              $categoria_actual = 0;
              $conteo_categoria = 0;
              $subtotal_categoria = 0;

              $item_actual = 0;
              $conteo_item = 0;
              $subtotal_item = 0;

              while ($row_registros = mysqli_fetch_array($result_registros)) {

                  $rubro_actual = $row_registros['rubro_cotizacion'];
                  $categoria_actual = $row_registros['categoria_cotizacion'];
                  $item_actual = $row_registros['item'];

                  $conteo_item += 1;
                  $prom_item = $merge_rubros[$rubro_actual][$categoria_actual][$item_actual]['prom'];
                  if ($conteo_item == 1) {
                      $attr_item = "rowspan = '".$merge_rubros[$rubro_actual][$categoria_actual][$item_actual]['rowspan']."'";
                      $class_item = "";
                  } else {
                      $attr_item = "";
                      $class_item = "hidden";
                  }
                  if ($conteo_item == $merge_rubros[$rubro_actual][$categoria_actual][$item_actual]['rowspan']) {
                      $subtotal_categoria += $prom_item;
                      $conteo_item = 0;
                  }

                  $conteo_categoria += 1;
                  if ($conteo_categoria == 1) {
                      $attr_categoria = "rowspan = '".$merge_rubros[$rubro_actual][$categoria_actual]['rowspan']."'";
                  } else {
                      $attr_categoria = "class='hidden'";
                  }
                  if ($conteo_categoria == $merge_rubros[$rubro_actual][$categoria_actual]['recuento']) {
                      $subtotal_rubro += $subtotal_categoria;
                      $tr_subtotal_categoria = "<tr class='tr_subtotal_categoria'
                                                        data-rubro='$rubro_actual'
                                                        data-categoria='$categoria_actual'>
                                                    <td/>
                                                    <td class='hidden' />
                                                    <td colspan='7'>Subtotal Categoría: <strong>$<span class='numerable subtotal_categoria'>$subtotal_categoria</span></strong></td>
                                                    <td />
                                                </tr>";
                      $conteo_categoria = 0;
                      $subtotal_categoria = 0;
                  } else {
                      $tr_subtotal_categoria = "";
                  }

                  $conteo_rubro += 1;
                  if ($conteo_rubro == 1) {
                      $attr_rubro = "rowspan = '".$merge_rubros[$rubro_actual]['rowspan']."'";
                  } else {
                      //$attr_rubro = "";
                      $attr_rubro = "class='hidden'";
                  }
                  if ($conteo_rubro == $merge_rubros[$rubro_actual]['recuento']) {
                      $tr_subtotal_rubro = "<tr class='tr_subtotal_rubro'
                                                    data-rubro='$rubro_actual'>
                                                <td />
                                                <td>Subtotal Rubro</td>
                                                <td colspan='5' />
                                                <td><strong>$<span class='numerable subtotal_rubro'>$subtotal_rubro</span></strong></td>
                                                <td />
                                            </tr>";
                      $conteo_rubro = 0;
                      $subtotal_rubro = 0;
                  } else {
                      $tr_subtotal_rubro = "";
                  }
                  
                  $id_registro = $row_registros['id'];

                  $sql_modificacion = "SELECT * FROM registros WHERE id = '$id_registro'";
                  $resultado_modificacion = mysqli_query($conexion, $sql_modificacion);
                  $datos_modificacion = mysqli_fetch_assoc($resultado_modificacion);

                  $data = "data-rubro='$rubro_actual'
                            data-categoria='$categoria_actual'
                            data-item='$item_actual'
                            data-id_registro='".$row_registros['id']."'";
                  /*$checked = $row_registros['registro_seleccionado'] == 0 ? "" : "checked";*/
              // if ($row_registros['registro_seleccionado'] == 0) {
              if ($datos_modificacion['estado_registro'] <> 3){  
                echo "<tr class='cotizacion_pagos_group' $data>";
                $estado = $datos_modificacion['estado_registro'];
                  switch ($estado){
                    case 0:
                      echo "<td><span class='badge badge-primary'>NUEVO</span></td>";
                      break;

                    case 1:
                      echo "<td><span class='badge badge-success'>ACTUALIZADO</span></td>";
                      break;

                    case 2:
                      echo "<td><span class='badge badge-warning'>MODIFICADO</span></td>";
                      break;

                    case 3:
                      echo "<td><span class='badge badge-danger'>ELIMINADO</span></td>";
                      break;
                  };
              // } else {
              //   echo "<tr class='cotizacion_pagos_group' data-id_registro='".$row_registros['id']."'>";
              //     echo "<td>";
              //       echo "<input class='form-check-input position-static mostrar_checkbox checkbox cotizacion_pagos_checked' type='checkbox' name='radio_cotizacion_".$row['id_catcot']."' id='radio_cotizacion' value='".$row_registros['importe_total']."' data-registro='".$row_registros['id']."' data-pago='".$row_registros['tiempo_pago']."' data-item='".$row_registros['item']."' checked></td>";
              // }
            
              if ($datos_modificacion['estado_registro'] == 2){
                echo "<td scope='row' style='font-weight: bolder;' $attr_rubro>".utf8_encode($row_registros['nombre_rubros'])."</td>";
                echo "<td scope='row' style='font-weight: bolder;' $attr_categoria data-conteo='$conteo_categoria'>".utf8_encode($row_registros['nombre_catcot'])."</td>";
                echo "<td>".$row_registros['nombre_item_cotizacion']."</td>";
                echo "<td scope='row'>".utf8_encode($row_registros['nombre_concot'])."</td>";
                //echo "<td>".($row_registros['detalle_registro'])."</td>";
                if ($row_registros['jornadas_registro'] <> $datos_modificacion['jornadas_registro']){
                  echo "<td><span style='color:#dc3545; font-weight:bold;'>".$row_registros['jornadas_registro']."</span> / <span style='color:#28a745; font-weight:bold;'>".$datos_modificacion['jornadas_registro']."</span></td>";
                } else {
                  echo "<td>".($row_registros['jornadas_registro'])."</td>";
                }
                
                if ($row_registros['cantidad'] <> $datos_modificacion['cantidad']){
                  echo "<td><span style='color:#dc3545; font-weight:bold;'>".$row_registros['cantidad']."</span> / <span style='color:#28a745; font-weight:bold;'>".$datos_modificacion['cantidad']."</span></td>";
                } else {
                  echo "<td>".$row_registros['cantidad']."</td>";
                }
                
                if ($row_registros['importe_neto'] <> $datos_modificacion['importe_neto']){
                  echo "<td><span style='color:#dc3545; font-weight:bold;'>$".$row_registros['importe_neto']."</span> / <span style='color:#28a745; font-weight:bold;'>$".$datos_modificacion['importe_neto']."</span></td>";
                } else {
                  echo "<td>$<span class='valor_precio_cliente numerable'>".$row_registros['importe_neto']."</span></td>";
                }
                if ($row_registros['importe_total'] <> $datos_modificacion['importe_total']){    
                  echo "<td><span style='color:#dc3545; font-weight:bold;'>$".$row_registros['importe_total']."</span> / <span style='color:#28a745; font-weight:bold;'>$".$datos_modificacion['importe_total']."</span><br /><button type='button' class='btn btn-success procesar_modificacion' data-registro='".$datos_modificacion['id']."' data-valor='".$datos_modificacion['importe_total']."' data-estado='".$estado."' data-opcion='0'><i class='icon wb-check' aria-hidden='true'></i></button><button type='button' class='btn btn-danger procesar_modificacion' data-registro='".$datos_modificacion['id']."' data-valor='".$datos_modificacion['importe_total']."' data-estado='".$estado."' data-opcion='1'><i class='icon wb-close' aria-hidden='true'></i></button></td>";
                } else {
                  echo "<td>$<span class='valor_promedio numerable cotizacion_pagos_total' data-registro='".$row['id']."' data-valor='".$row_registros['importe_total']."'>".$row_registros['importe_total']."</span></td>";
                }

              echo "</tr>";
              echo $tr_subtotal_categoria;
              echo $tr_subtotal_rubro;
              } else {
                echo "<td scope='row' style='font-weight: bolder;' $attr_rubro>".utf8_encode($row_registros['nombre_rubros'])."</td>";
                echo "<td scope='row' style='font-weight: bolder;' $attr_categoria data-conteo='$conteo_categoria'>".utf8_encode($row_registros['nombre_catcot'])."</td>";
                echo "<td>".$row_registros['nombre_item_cotizacion']."</td>";
                echo "<td scope='row'>".utf8_encode($row_registros['nombre_concot'])."</td>";
                //echo "<td>".($row_registros['detalle_registro'])."</td>";
                echo "<td>".($row_registros['jornadas_registro'])."</td>";
                echo "<td>".$row_registros['cantidad']."</td>";
                echo "<td>$<span class='valor_precio_cliente numerable'>".$row_registros['importe_neto']."</span></td>";
                echo "<td>$<span class='valor_promedio numerable cotizacion_pagos_total' data-registro='".$row['id_catcot']."' data-valor='".$row_registros['importe_total']."'>".$row_registros['importe_total']."</span></td>";
              echo "</tr>";
              echo $tr_subtotal_categoria;
              echo $tr_subtotal_rubro;
              }
            }
          }
            mysqli_free_result($result_registros);
        } else{
            echo '<strong>No hay cotizaciones cargadas.</strong>';
        }
      } else{
              echo 'ERROR: Could not able to execute $sql_registros. ' . mysqli_error($conexion);
        }
    echo "</tbody>";
  //         }  // Cierre del bucle While
  //         mysqli_free_result($result_registros);
  //     } else {
  //       echo 'EMPTY: No hay datos para mostrar.';
  //     }
  // } else{
  //   echo 'ERROR: Could not able to execute $sql. ' . mysqli_error($conexion);
  // }
  mysqli_close($conexion);
?>
