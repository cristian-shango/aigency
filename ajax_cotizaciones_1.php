<?php
  include 'conexion.php';
  include 'session.php';
  mysql_set_charset('utf8');
  $proyecto = $_POST['proyecto'];
  $merge_rubros = array();
  $merge_categorias = array();
  $merge_items = array();
    $sql_merge_rubros = " SELECT rubro_cotizacion AS rubro, COUNT(*) AS merge
                              FROM registros WHERE id_proyecto = '$proyecto'
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
                            	FROM registros WHERE id_proyecto = '$proyecto'
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
                        		FROM registros WHERE id_proyecto = '$proyecto'
                        		GROUP BY rubro_cotizacion, categoria_cotizacion, item
                        		ORDER BY rubro_cotizacion) AS ru_co
                    		LEFT JOIN item_cotizacion AS ic
                    		ON ic.id_item_cotizacion = ru_co.item
                    		LEFT JOIN
                        		(SELECT rubro AS rubro2, categoria AS categoria2, item AS item2, prom_selec, prom_todo FROM
                        			(SELECT rubro_cotizacion AS rubro, categoria_cotizacion AS categoria, item, AVG(importe_total) AS prom_todo
                        				FROM registros WHERE id_proyecto = '$proyecto'
                        				GROUP BY rubro_cotizacion, categoria_cotizacion, item) AS todo
                        			LEFT JOIN
                        			(SELECT rubro_cotizacion AS rubro2, categoria_cotizacion AS categoria2, item AS item2, AVG(importe_total) AS prom_selec
                        				FROM registros WHERE id_proyecto = '$proyecto' AND registro_seleccionado = '1'
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

  function modal_cotizacion_pagos($registro, $proyecto) {
    return '<div class="cotizacion_pagos_container" data-id_registro="'.$registro.'" data-id_proyecto="'.$proyecto.'">
    <button type="button" class="btn btn-default cotizacion_pagos_ver_interfaz" data-toggle="modal">PAGOS</button>

    <!-- Modal Editar Pagos -->
    <div class="modal fade cotizacion_pagos_interfaz" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-center" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12"><h3>Editar Pagos</h3></div>
                <div>
                  <table>
                    <tbody class="cotizacion_pagos_lista">
                      <tr><th class="gray">Pago</th><th class="gray">Porcentaje</th><th class="gray">Forma</th><th class="gray">Fecha 1</th><th class="gray">Fecha 2</th><th class="gray"></th><th class="gray">Monto</th><th class="gray"></th></tr>
                      <tr class="cotizacion_pagos_data" data-id_pago="">
                        <td><select class="form-control cotizacion_pagos_plazo"><option>plazo...</option></select></td>
                        <td><input type="text" max="100" width="4" class="form-control cotizacion_pagos_porcentaje" style="width:50px;"></input></td>
                        <td><select class="form-control cotizacion_pagos_forma"><option>forma...</option></select></td>
                        <td><input type="text" class="form-control cotizacion_pagos_fecha1" placeholder="fecha 1"></td>
                        <td><input type="text" class="form-control cotizacion_pagos_fecha2" placeholder="fecha 2"></td>
                        <td><input type="text" class="form-control cotizacion_pagos_monto numerable" width="9" readonly></input></td>
                        <td><button type="button" class="btn btn-primary btn-block cotizacion_pagos_borrar"><i class="icon wb-trash" aria-hidden="true"></i></button></td>
                      </tr>
                    </tbody>
                  </table>
                  <span><button class="cotizacion_pagos_guardar btn col-md-5" data-dismiss="modal">guardar</button></span>
                  <span><button class="cotizacion_pagos_cancelar btn btn-danger col-md-5" data-dismiss="modal">cancelar</button></span>
                  <span class="col-md-1"></span>
                  <span><button class="cotizacion_pagos_mostrar_agregar_pago btn btn-info col-md-1">+</button></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>';
    }

      echo "<tbody>
            <tr>
              <th scope='col' class='gray' width='2%;'>#</th>
              <th scope='col' class='gray' width='10%;'>Rubro</th>
              <th scope='col' class='gray' width='10%;'>Categoría</th>
              <th scope='col' class='gray' width='25%;'>Item</th>
              <th scope='col' class='gray' width='8%;'>Condición</th>
              <th scope='col' class='gray' width='7%;'>Jornadas</th>
              <th scope='col' class='gray' width='10%;'>Cant.</th>
              <th scope='col' class='gray' width='10%;'>Valor</th>
              <th scope='col' class='gray' width='10%;'>Total</th>
              <th scope='col' class='gray' width='50%;'>Proveedor</th>
              <th scope='col' class='gray' width='10%;'>Editar</th>
            </tr>";
      $sql_registros = "SELECT * FROM registros r
                        INNER JOIN rubros_cotizaciones rc ON r.rubro_cotizacion = rc.id_rubros_cotizaciones
                        INNER JOIN categorias_cotizaciones cc ON r.categoria_cotizacion = cc.id_catcot
                        INNER JOIN condicion_cotizacion concot ON r.condicion_registro = concot.id_concot
                        LEFT JOIN item_cotizacion ic ON r.item = ic.id_item_cotizacion
                        LEFT JOIN proveedores p ON r.id_proveedor = p.id_proveedor
                        WHERE id_proyecto = '$proyecto'
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
                                                    <td colspan='8'>Subtotal Categoría: <strong>$<span class='numerable subtotal_categoria'>$subtotal_categoria</span></strong></td>
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
                      $attr_rubro = "class='hidden'";
                  }
                  if ($conteo_rubro == $merge_rubros[$rubro_actual]['recuento']) {
                      $tr_subtotal_rubro = "<tr class='tr_subtotal_rubro'
                                                    data-rubro='$rubro_actual'>
                                                <td />
                                                <td colspan='2'>Subtotal Rubro: ".$row_registros['nombre_rubros']."</td>
                                                <td colspan='6' />
                                                <td><strong>$<span class='numerable subtotal_rubro'>$subtotal_rubro</span></strong></td>
                                                <td />
                                            </tr>";
                      $conteo_rubro = 0;
                      $subtotal_rubro = 0;
                  } else {
                      $tr_subtotal_rubro = "";
                  }

                  $data = "data-rubro='$rubro_actual'
                            data-categoria='$categoria_actual'
                            data-item='$item_actual'
                            data-id_registro='".$row_registros['id']."'";
                  $checked = $row_registros['registro_seleccionado'] == 0 ? "" : "checked";
              // if ($row_registros['registro_seleccionado'] == 0) {
                echo "<tr class='cotizacion_pagos_group' $data>";
                echo "<td><input class='form-check-input position-static mostrar_checkbox checkbox cotizacion_pagos_checked' type='checkbox' name='radio_cotizacion_".$row['id_catcot']."' id='radio_cotizacion' value='".$row_registros['importe_total']."' data-registro='".$row_registros['id']."' data-pago='".$row_registros['tiempo_pago']."' data-item='".$row_registros['item']."' $checked></td>";
              // } else {
              //   echo "<tr class='cotizacion_pagos_group' data-id_registro='".$row_registros['id']."'>";
              //     echo "<td>";
              //       echo "<input class='form-check-input position-static mostrar_checkbox checkbox cotizacion_pagos_checked' type='checkbox' name='radio_cotizacion_".$row['id_catcot']."' id='radio_cotizacion' value='".$row_registros['importe_total']."' data-registro='".$row_registros['id']."' data-pago='".$row_registros['tiempo_pago']."' data-item='".$row_registros['item']."' checked></td>";
              // }

          echo "<td scope='row' style='font-weight: bolder;' $attr_rubro>".utf8_encode($row_registros['nombre_rubros'])."</td>";
          echo "<td scope='row' style='font-weight: bolder;' $attr_categoria data-conteo='$conteo_categoria'>".utf8_encode($row_registros['nombre_catcot'])."</td>";
          if ($row_registros['mensaje_cotizacion'] == 0){
            echo "<td scope='row' $attr_item class='triangulo_mensaje_off mensaje_item $class_item' data-item='".$row_registros['item']."' data-mensaje='".$row_registros['mensaje_cotizacion']."' data-registro='".$row_registros['id']."'>";
          } else {
            echo "<td scope='row' $attr_item class='triangulo_mensaje_on mensaje_item $class_item' data-item='".$row_registros['item']."' data-mensaje='".$row_registros['mensaje_cotizacion']."' data-registro='".$row_registros['id']."'>";
          }
            echo "<table border='0' cellspacing='0' cellpadding='0' width='100%' style='border: 3px solid #fff !important;'>";
              echo "<tbody>";
                echo "<tr>";
                  echo "<td>".$row_registros['nombre_item_cotizacion']."</td>";
                echo "</tr>";
                /*echo "<tr>";
                  echo "<td></td>";
                echo "</tr>";*/
              echo "</tbody>";
            echo "</table>";
          echo "</td>";
          echo "<td scope='row'>".utf8_encode($row_registros['nombre_concot'])."</td>";
          //echo "<td>".($row_registros['detalle_registro'])."</td>";
          echo "<td>".($row_registros['jornadas_registro'])."</td>";
          echo "<td>".$row_registros['cantidad']."</td>";
          echo "<td>$<span class='valor_precio_cliente numerable'>".$row_registros['importe_neto']."</span></td>";
          echo "<td>$<span class='valor_promedio numerable cotizacion_pagos_total' data-registro='".$row['id_catcot']."' data-valor='".$row_registros['importe_total']."'>".$row_registros['importe_total']."</span></td>";
          echo "<td>".$row_registros['razon_social']." | ".$row_registros['contacto']."</td>";
          echo "<td>";
              echo "<button type='button' class='btn btn-default cargar_proveedor_cotizacion' data-toggle='modal' data-id='".$row_registros['id']."' data-check='".$row_registros['registro_seleccionado']."'><i class='icon wb-edit' aria-hidden='true'></i></button>";
              echo "<button type='button' class='btn btn-default'><i class='icon wb-plus seleccion_item' data-rubro='".$row_registros['id_rubros_cotizaciones']."' data-categoria='".$row_registros['id_catcot']."' data-item='".$row_registros['nombre_item_cotizacion']."' data-id_registro='".$row_registros['id']."'></i></button>";
          echo "</td>";
        echo "</tr>";
        echo $tr_subtotal_categoria;
        echo $tr_subtotal_rubro;
    }
              mysqli_free_result($result_registros);
          } else{
              echo '<strong>No hay cotizaciones cargadas.</strong>';
          }
      } else{
              echo 'ERROR: Could not able to execute $sql_registros. ' . mysqli_error($conexion);
        }
    echo "<tr><td colspan='11'><h4>TOTAL: $<span id='total_cotizacion' class='numerable'></span><h4></td></tr>";
    echo "<tr>
              <th scope='col' class='gray' width='2%;'>#</th>
              <th scope='col' class='gray' width='10%;'>Rubro</th>
              <th scope='col' class='gray' width='10%;'>Categoría</th>
              <th scope='col' class='gray' width='5%;'>Item</th>
              <th scope='col' class='gray' width='5%;'>Condición</th>
              <th scope='col' class='gray' width='7%;'>Jornadas</th>
              <th scope='col' class='gray' width='7%;'>Cant.</th>
              <th scope='col' class='gray' width='15%;'>Valor</th>
              <th scope='col' class='gray' width='14%;'>Total</th>
              <th scope='col' class='gray' width='10%;'>Guardar</th>
            </tr>";
    echo "<tr id='tr_mostrar' class='cotizacion_pagos_group'>";
      echo "<td>#<input class='cotizacion_pagos_checked' checked='checked' hidden></input></td>";
      echo "<td class='form_group'>";
         echo "<select class='form-control dropdown_rubro' id='ingreso_rubro' data-plugin='select2' style='width: 100%;'>";
          echo "<option value=''>Rubro</option>";
            $sql_rubro_dropdown = 'SELECT * FROM rubros_cotizaciones ORDER BY nombre_rubros ASC';
            mysql_query("SET NAMES 'utf8'");
            if ($result_rubro_dropdown = mysqli_query($conexion, $sql_rubro_dropdown)){
              if (mysqli_num_rows($result_rubro_dropdown) > 0){
                  $i = 0;
                  while ($row_rubro_dropdown = mysqli_fetch_array($result_rubro_dropdown)){
          echo "<option value='".$row_rubro_dropdown['id_rubros_cotizaciones']."'>".(utf8_encode($row_rubro_dropdown['nombre_rubros']))."</option>";
          }
            mysqli_free_result($result_rubro_dropdown);
                } else{
                    echo 'No hay datos para mostrar.';
                }
            } else{
          echo "ERROR: Could not able to execute $sql_rubro_dropdown." . mysqli_error($conexion);
        }
          echo "</select>";
      echo "</td>";
      echo "<td class='form_group'>";
        echo "<select class='form-control dropdown_categoria' id='ingreso_categoria' data-plugin='select2' style='width: 100%;'>";
          echo "<option value=''>Categoría</option>";
          $sql_categorias_dropdown = 'SELECT * FROM categorias_cotizaciones ORDER BY nombre_catcot ASC';
          mysql_query("SET NAMES 'utf8'");
          if ($result_categorias_dropdown = mysqli_query($conexion, $sql_categorias_dropdown)){
              if (mysqli_num_rows($result_categorias_dropdown) > 0){
                  $i = 0;
                   while ($row_categorias_dropdown = mysqli_fetch_array($result_categorias_dropdown)){
          echo "<option value='".utf8_encode($row_categorias_dropdown['id_catcot'])."'>".utf8_encode($row_categorias_dropdown['nombre_catcot'])."</option>";
                  }
                  mysqli_free_result($result_categorias_dropdown);
              } else{
                  echo 'No hay datos para mostrar.';
              }
          } else{
              echo 'ERROR: Could not able to execute $sql_categorias_dropdown. ' . mysqli_error($conexion);
          }
        echo "</select>";
      echo "</td>";
      echo "<td>";
        echo "<input type='text' id='ingreso_item' class='form-control' aria-label='Default' aria-describedby='inputGroup-sizing-default'>";
      echo "</td>";
      echo "<td>";
        echo "<select class='form-control dropdown_condicion' id='ingreso_condicion' data-plugin='select2' style='width: 100%;'>";
          echo "<option value=''>Condición</option>";
            $sql_condicion_dropdown = 'SELECT * FROM condicion_cotizacion ORDER BY nombre_concot ASC';
            mysql_query("SET NAMES 'utf8'");
            if($result_condicion_dropdown = mysqli_query($conexion, $sql_condicion_dropdown)){
                if(mysqli_num_rows($result_condicion_dropdown) > 0){
                    $i = 0;
                    while ($row_condicion_dropdown = mysqli_fetch_array($result_condicion_dropdown)){
            echo "<option value='".utf8_encode($row_condicion_dropdown['id_concot'])."'>".utf8_encode($row_condicion_dropdown['nombre_concot'])."</option>";
                    }
                    mysqli_free_result($result_condicion_dropdown);
                } else{
                    echo 'No hay datos para mostrar.';
                }
            } else{
                echo 'ERROR: Could not able to execute $sql_condicion_dropdown. ' . mysqli_error($conexion);
            }
        echo "</select>";
      echo "</td>";
      /*echo "<td>";
        echo "<input type='text' id='ingreso_detalle_cotizacion' class='form-control'  aria-label='Default' aria-describedby='inputGroup-sizing-default'>";
      echo "</td>";*/
      echo "<td>";
        echo "<input type='number' id='ingreso_jornadas' class='form-control'  aria-label='Default' aria-describedby='inputGroup-sizing-default' oninput='calculate()'>";
      echo "</td>";
      echo "<td>";
        echo "<input type='number' id='ingreso_cantidad' class='form-control'  aria-label='Default' aria-describedby='inputGroup-sizing-default' oninput='calculate()'>";
      echo "</td>";
      echo "<td>";
        echo "<div class='input-group'>";
          echo "<div class='input-group-prepend'>";
            echo "<div class='input-group-text'>$</div>";
          echo "</div>";
          echo "<input type='text' class='form-control form-control numerable' id='ingreso_importe_neto' oninput='calculate()'>";
        echo "</div>";
      echo "</td>";
      echo "<td>";
        echo "<div class='input-group'>";
          echo "<div class='input-group-prepend'>";
            echo "<div class='input-group-text'>$</div>";
          echo "</div>";
          echo "<input type='number text' class='form-control form-control importe_total numerable cotizacion_pagos_total' id='ingreso_importe_total' readonly value='0'>";
        echo "</div>";
      echo "</td>";
      echo "<td class='hidden'>";
      echo modal_cotizacion_pagos("guardable", $proyecto);
      echo "</td>";
      echo "<td><button type='button' class='btn btn-success' id='boton_guardar_cotizacion'><i class='icon wb-check' aria-hidden='true'></i></button></td>";
      //echo "<td></td>";
    echo "</tr>";
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
