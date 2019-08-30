<?php
  include 'conexion.php';
  include 'session.php';
  mysql_set_charset('utf8');
  $proyecto = $_POST['proyecto'];
      echo "<tbody>
            <tr>
              <th scope='col' class='gray' width='10%;'>Rubro</th>
              <th scope='col' class='gray' width='10%;'>Categoría</th>
              <th scope='col' class='gray' width='10%;'>Item</th>
              <th scope='col' class='gray' width='10%;'>Condición</th>
              <th scope='col' class='gray' width='20%;'>Detalle</th>
              <th scope='col' class='gray' width='5%;'>Jornadas</th>
              <th scope='col' class='gray' width='5%;'>Cant.</th>
              <th scope='col' class='gray' width='5%;'>Valor</th>
              <th scope='col' class='gray' width='10%;'>Total</th>
              <th scope='col' class='gray' width='10%;'>Pago a</th>
              <th scope='col' class='gray' width='5%;'></th>

            </tr>";
      $sql_registros = "SELECT * FROM registros r INNER JOIN rubros_cotizaciones rc ON r.rubro_cotizacion = rc.id_rubros_cotizaciones INNER JOIN categorias_cotizaciones cc ON r.categoria_cotizacion = cc.id_catcot INNER JOIN condicion_cotizacion concot ON r.condicion_registro = concot.id_concot WHERE id_proyecto = '$proyecto' AND registro_seleccionado = 1 ORDER BY rubro_cotizacion ASC, nombre_catcot ASC, nombre_concot ASC";
      //echo $sql_registros."<br>";
      mysql_query("SET NAMES 'utf8'");
      if($result_registros = mysqli_query($conexion, $sql_registros)){
          if(mysqli_num_rows($result_registros) > 0){

              $i = 0;
              $suma_valor = 0;
              $item = 0;
              while ($row_registros = mysqli_fetch_array($result_registros)){
        echo "<tr>";
          echo "<td scope='row'>".utf8_encode($row_registros['nombre_rubros'])."</td>";
          echo "<td scope='row'>".utf8_encode($row_registros['nombre_catcot'])."</td>";
          echo "<td>".($row_registros['item'])."</td>";
          echo "<td scope='row'>".utf8_encode($row_registros['nombre_concot'])."</td>";
          echo "<td>".($row_registros['detalle_registro'])."</td>";
          echo "<td>".($row_registros['jornadas_registro'])."</td>";
          echo "<td>".$row_registros['cantidad']."</td>";
          echo "<td>$<span class='valor_precio_cliente'>".$row_registros['importe_neto']."</span></td>";
          echo "<td>$<span class='valor_promedio'>".$row_registros['importe_total']."</span></td>";
          echo "<td>".$row_registros['tiempo_pago']." días</td>";
          echo "<td>";
          if ($row_registros['archivo_adjunto'] == "sin_subir"){
            echo "<button type='button' class='btn btn-warning cargar_proveedor_cotizacion' data-toggle='modal' data-id='".$row_registros['id']."' data-check='".$row_registros['registro_seleccionado']."'><i class='icon wb-user-add' aria-hidden='true'></i></button>";
          } elseif ($row_registros['archivo_adjunto'] == null){
            echo "<button type='button' class='btn btn-default cargar_proveedor_cotizacion' data-toggle='modal' data-id='".$row_registros['id']."' data-check='".$row_registros['registro_seleccionado']."'><i class='icon wb-user-add' aria-hidden='true'></i></button>";
          } else {
            echo "<button type='button' class='btn btn-success cargar_proveedor_cotizacion' data-toggle='modal' data-id='".$row_registros['id']."' data-check='".$row_registros['registro_seleccionado']."'><i class='icon wb-user-add' aria-hidden='true'></i></button>";
          }
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
