<?php
  include 'conexion.php';
  include 'session.php';
  mysql_set_charset('utf8');
  $proyecto = $_POST['proyecto'];
      echo "<tbody>
            <tr>
              <th scope='col' class='gray' width='5%;'>Rubro</th>
              <th scope='col' class='gray' width='10%;'>Categoría</th>
              <th scope='col' class='gray' width='20%;'>Item</th>
              <th scope='col' class='gray' width='10%;'>Condición</th>   
              <th scope='col' class='gray' width='5%;'>Jornadas</th>
              <th scope='col' class='gray' width='5%;'>Cant.</th>
              <th scope='col' class='gray' width='10%;'>Valor</th>
              <th scope='col' class='gray' width='10%;'>Total</th>
              <th scope='col' class='gray' width='5%;'>Tipo Markup</th>
              <th scope='col' class='gray' width='10%;'>Valor Markup</th>
              <th scope='col' class='gray' width='10%;'>Total Markup</th>
            </tr>";
      $sql_registros = "SELECT * FROM registros_confirmados r INNER JOIN rubros_cotizaciones rc ON r.rubro_cotizacion = rc.id_rubros_cotizaciones INNER JOIN categorias_cotizaciones cc ON r.categoria_cotizacion = cc.id_catcot INNER JOIN condicion_cotizacion concot ON r.condicion_registro = concot.id_concot LEFT JOIN item_cotizacion ic ON r.item = ic.id_item_cotizacion WHERE id_proyecto = '$proyecto' AND registro_seleccionado = 1 ORDER BY rubro_cotizacion ASC, nombre_catcot ASC, nombre_concot ASC";
      //echo $sql_registros."<br>";
      mysql_query("SET NAMES 'utf8'");
      if($result_registros = mysqli_query($conexion, $sql_registros)){
          if(mysqli_num_rows($result_registros) > 0){

              $i = 0;
              $suma_valor = 0;
              $item = 0;
              while ($row_registros = mysqli_fetch_array($result_registros)){

                /* CALCULO DE PROMEDIO O SUMA DE LOS ITEMS */

                $item = $row_registros['item'];
                
                $sql_promedio = "SELECT SUM(importe_total) AS suma FROM registros_confirmados WHERE item = $id_catcot AND registro_seleccionado = 1";
                $resultado_promedio = mysqli_query($conexion, $sql_promedio);
                $datos_promedio=mysqli_fetch_assoc($resultado_promedio);
                $datos_promedio["suma"] = round($datos_promedio["suma"], 2);

                if($datos_promedio["suma"] == 0){
                  $sql_promedio0 = "SELECT AVG(importe_total) AS suma FROM registros_confirmados WHERE item = $id_catcot AND registro_seleccionado = 0";
                  $resultado_promedio0 = mysqli_query($conexion, $sql_promedio0);
                  $datos_promedio=mysqli_fetch_assoc($resultado_promedio0);
                  $datos_promedio["suma"] = round($datos_promedio["suma"], 2);
                }
                /* CALCULO DE PROMEDIO O SUMA DE LOS ITEMS */

        echo "<tr>";
          echo "<td scope='row'>".utf8_encode($row_registros['nombre_rubros'])."</td>";
          echo "<td scope='row'>".utf8_encode($row_registros['nombre_catcot'])."</td>";
          echo "<td>".($row_registros['nombre_item_cotizacion'])."</td>";
          echo "<td scope='row'>".utf8_encode($row_registros['nombre_concot'])."</td>";
          echo "<td>".($row_registros['jornadas_registro'])."</td>";
          echo "<td>".$row_registros['cantidad']."</td>";
          echo "<td>$<span class='valor_precio_cliente'>".$row_registros['importe_neto']."</span></td>";
          echo "<td>$<span class='importe_total_markup'>".$row_registros['importe_total']."</span></td>";
          echo "<td>";
            echo "<select class='tipo_markup form-control'>";
              if ($row_registros['tipo_markup'] == "0"){
                echo "<option value='0' selected>$</option>";
                echo "<option value='1'>%</option>";
              } else {
                echo "<option value='0'>$</option>";
                echo "<option value='1' selected>%</option>";
              }
            echo "</select>";
          echo "</td>";
          echo "<td><input type='number' class='ingreso_markup form-control' aria-label='Default' aria-describedby='inputGroup-sizing-default' value='".$row_registros['valor_markup']."'></td>";
          echo "<td><input type='number' class='total_markup form-control' aria-label='Default' aria-describedby='inputGroup-sizing-default' value='".$row_registros['total_markup']."' style='font-weight: bolder;' data-registro='".$row_registros['id']."' readonly></td>";
        echo "</tr>";
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
