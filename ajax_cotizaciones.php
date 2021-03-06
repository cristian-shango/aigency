<?php
  include 'conexion.php';
  include 'session.php';
  mysql_set_charset('utf8');
  $proyecto = $_POST['proyecto'];

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
              <th scope='col' class='gray' width='5%;'>Item</th>
              <th scope='col' class='gray' width='5%;'>Condición</th>
              <th scope='col' class='gray' width='20%;'>Detalle</th>
              <th scope='col' class='gray' width='7%;'>Jornadas</th>
              <th scope='col' class='gray' width='7%;'>Cant.</th>
              <th scope='col' class='gray' width='15%;'>Valor</th>
              <th scope='col' class='gray' width='14%;'>Total</th>
              <th scope='col' class='gray' width='10%;'>Editar</th>
            </tr>";
      $sql_registros = "SELECT * FROM registros r INNER JOIN rubros_cotizaciones rc ON r.rubro_cotizacion = rc.id_rubros_cotizaciones INNER JOIN categorias_cotizaciones cc ON r.categoria_cotizacion = cc.id_catcot INNER JOIN condicion_cotizacion concot ON r.condicion_registro = concot.id_concot LEFT JOIN item_cotizacion ic ON r.item = ic.id_item_cotizacion WHERE id_proyecto = '$proyecto' ORDER BY rubro_cotizacion ASC, nombre_catcot ASC, item ASC, nombre_concot ASC";
      //echo $sql_registros."<br>";
      mysql_query("SET NAMES 'utf8'");
      if($result_registros = mysqli_query($conexion, $sql_registros)){
          if(mysqli_num_rows($result_registros) > 0){

              $i = 0;
              $suma_valor = 0;
              $item = 0;
              $rubro_actual = 0;
              $rubro_anterior = 0;

              while ($row_registros = mysqli_fetch_array($result_registros)){

                $rubro_actual = $row_registros['rubro_cotizacion'];

                /* CALCULO DE PROMEDIO O SUMA DE LOS ITEMS */

                $item = $row_registros['item'];
                $categoria = utf8_encode($row_registros['categoria_cotizacion']);

                $sql_promedio = "SELECT AVG(importe_total) AS prom FROM registros WHERE item = '$item' AND registro_seleccionado = 1 AND categoria_cotizacion = '$categoria'";
                $resultado_promedio = mysqli_query($conexion, $sql_promedio);
                $datos_promedio=mysqli_fetch_assoc($resultado_promedio);
                $datos_promedio["prom"] = round($datos_promedio["prom"], 2);
                $texto = "Promedio";

                if($datos_promedio["prom"] == 0){
                  $sql_promedio0 = "SELECT AVG(importe_total) AS prom FROM registros WHERE item = '$item' AND registro_seleccionado = 0 AND categoria_cotizacion = '$categoria'";
                  $resultado_promedio0 = mysqli_query($conexion, $sql_promedio0);
                  $datos_promedio=mysqli_fetch_assoc($resultado_promedio0);
                  $datos_promedio["prom"] = round($datos_promedio["prom"], 2);
                  $texto = "Promedio";
                }

                /* CALCULO DE PROMEDIO O SUMA DE LOS ITEMS */

              if ($row_registros['registro_seleccionado'] == 0){
                echo "<tr class='cotizacion_pagos_group' data-id_registro='".$row_registros['id']."'>";
                  echo "<td>";
                    echo "<input class='form-check-input position-static mostrar_checkbox checkbox cotizacion_pagos_checked' type='checkbox' name='radio_cotizacion_".$row['id_catcot']."' id='radio_cotizacion' value='".$row_registros['importe_total']."' data-registro='".$row_registros['id']."' data-pago='".$row_registros['tiempo_pago']."' data-item='".$row_registros['item']."'></td>";
              } else {
                echo "<tr class='cotizacion_pagos_group' data-id_registro='".$row_registros['id']."'>";
                  echo "<td>";
                    echo "<input class='form-check-input position-static mostrar_checkbox checkbox cotizacion_pagos_checked' type='checkbox' name='radio_cotizacion_".$row['id_catcot']."' id='radio_cotizacion' value='".$row_registros['importe_total']."' data-registro='".$row_registros['id']."' data-pago='".$row_registros['tiempo_pago']."' data-item='".utf8_encode($row_registros['item'])."' checked></td>";
              }

          echo "<td scope='row' style='font-weight: bolder;'>".utf8_encode($row_registros['nombre_rubros'])."</td>";
          echo "<td scope='row' style='font-weight: bolder;'>".utf8_encode($row_registros['nombre_catcot'])."</td>";
          if ($row_registros['mensaje_cotizacion'] == 0){
            echo "<td scope='row' class='triangulo_mensaje_off mensaje_item' data-item='".$row_registros['item']."' data-mensaje='".$row_registros['mensaje_cotizacion']."' data-registro='".$row_registros['id']."'>";
          } else {
            echo "<td scope='row' class='triangulo_mensaje_on mensaje_item' data-item='".$row_registros['item']."' data-mensaje='".$row_registros['mensaje_cotizacion']."' data-registro='".$row_registros['id']."'>";
          }
            echo "<table border='0' cellspacing='0' cellpadding='0' width='100%' style='border: 3px solid #fff !important;'>";
              echo "<tbody>";
                echo "<tr>";
                  echo "<td class='seleccion_item' data-rubro='".$row_registros['id_rubros_cotizaciones']."' data-categoria='".$row_registros['id_catcot']."' data-item='".$row_registros['nombre_item_cotizacion']."'>".$row_registros['nombre_item_cotizacion']."</td>";
                echo "</tr>";
                echo "<tr>";
                  echo "<td>".$texto." $<span class='numerable'>".$datos_promedio['prom']."</td>";
                echo "</tr>";
              echo "</tbody>";
            echo "</table>";
          echo "</td>";
          echo "<td scope='row'>".utf8_encode($row_registros['nombre_concot'])."</td>";
          echo "<td>".($row_registros['detalle_registro'])."</td>";
          echo "<td>".($row_registros['jornadas_registro'])."</td>";
          echo "<td>".$row_registros['cantidad']."</td>";
          echo "<td>$<span class='valor_precio_cliente numerable'>".$row_registros['importe_neto']."</span></td>";
          echo "<td>$<span class='valor_promedio numerable cotizacion_pagos_total' data-registro='".$row['id_catcot']."' data-valor='".$row_registros['importe_total']."'>".$row_registros['importe_total']."</span></td>";
          /*echo "<td>";
            //echo modal_cotizacion_pagos($row_registros['id'], $proyecto);

              if ($row_registros['tiempo_pago'] == 30){
                echo "<select class='tiempo_pago_cambio form-control' data-registro='".$row_registros['id']."' data-plugin='select2' style='display:none; width: 100%;'>";
                  echo "<option value='30' selected='selected'>30 días</option>";
                  echo "<option value='60'>60 días</option>";
                  echo "<option value='90'>90 días</option>";
                echo "</select>";
              }

              if ($row_registros['tiempo_pago'] == 60){
                echo "<select class='tiempo_pago_cambio form-control' data-registro='".$row_registros['id']."' data-plugin='select2' style='display:none; width: 100%;'>";
                  echo "<option value='30'>30 días</option>";
                  echo "<option value='60' selected='selected'>60 días</option>";
                  echo "<option value='90'>90 días</option>";
                echo "</select>";
              }

              if ($row_registros['tiempo_pago'] == 90){
              echo "<select class='tiempo_pago_cambio form-control' data-registro='".$row_registros['id']."' data-plugin='select2' style='display:none; width: 100%;'>";
                echo "<option value='30'>30 días</option>";
                echo "<option value='60'>60 días</option>";
                echo "<option value='90' selected='selected'>90 días</option>";
              echo "</select>";
              }
          echo "</td>";

          echo "<td>";
              echo "<button type='button' class='btn btn-default editar_cotizacion' data-toggle='modal' data-id='".$row_registros['id']."' data-check='".$row_registros['registro_seleccionado']."'><i class='icon wb-edit' aria-hidden='true'></i></button>";
          echo "</td>";*/
          echo "<td>";
              echo "<button type='button' class='btn btn-default cargar_proveedor_cotizacion' data-toggle='modal' data-id='".$row_registros['id']."' data-check='".$row_registros['registro_seleccionado']."'><i class='icon wb-edit' aria-hidden='true'></i></button>";
          echo "</td>";
        echo "</tr>";
              }
              mysqli_free_result($result_registros);
          } else{
              echo '<strong>No hay cotizaciones cargadas.</strong>';
          }
      } else{
              echo 'ERROR: Could not able to execute $sql_registros. ' . mysqli_error($conexion);
        }
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
      echo "<td>";
        echo "<input type='text' id='ingreso_detalle_cotizacion' class='form-control'  aria-label='Default' aria-describedby='inputGroup-sizing-default'>";
      echo "</td>";
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
      echo "<td>";
      echo modal_cotizacion_pagos("guardable", $proyecto);
      echo "</td>";
      echo "<td><button type='button' class='btn btn-success' id='boton_guardar_cotizacion'><i class='icon wb-check' aria-hidden='true'></i></button></td>";
      echo "<td></td>";
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
