<?php
  include 'conexion.php';
  include 'session.php';
  mysql_set_charset('utf8');
  $proyecto = $_POST['proyecto'];
      echo "<tbody>
            <tr>
              <th>OT</th>
              <th>Cliente</th>
              <th>Producto</th>
              <th>Proyecto</th>
              <th>Tipo de Proyecto</th>
              <th>Subtipo</th>
              <th>Costo Actual</th>
              <th>Costo Objetivo</th>
              <th>Rentabilidad</th>
            </tr>";
      $sql_proyectos = "SELECT * FROM proyectos_aprobados p LEFT JOIN clientes c ON p.cliente = c.id_cliente LEFT JOIN tipo_cotizacion t ON p.tipo_cotizacion = t.id_tipo_cotizacion LEFT JOIN subtipo_cotizacion s ON p.subtipo_cotizacion = s.id_subtipo";
      //echo $sql_proyectos."<br>";
      mysql_query("SET NAMES 'utf8'");
      if($result_proyectos = mysqli_query($conexion, $sql_proyectos)){
          if(mysqli_num_rows($result_proyectos) > 0){

              $i = 0;
              $suma_valor = 0;
              $item = 0;
              $diferencia = 0;
              while ($row_proyectos = mysqli_fetch_array($result_proyectos)){
                $diferencia = $row_proyectos['precio_markup'] - $row_proyectos['consumido'];
        echo "<tr class='ver_proveedores' style='cursor:pointer;' data-toggle='modal' data-id='".$row_proyectos['id']."' data-check='".$row_proyectos['registro_seleccionado']."'>";
          echo "<td>".($row_proyectos['id'])."</td>";
          echo "<td scope='row'>".utf8_encode($row_proyectos['nombre'])."</td>";
          echo "<td scope='row'>".utf8_encode($row_proyectos['producto_proyecto'])."</td>";
          echo "<td>".($row_proyectos['nombre_proyecto'])."</td>";
          echo "<td scope='row'>".utf8_encode($row_proyectos['tipo_cotizacion'])."</td>";
          echo "<td>".utf8_encode($row_proyectos['nombre_subtipo'])."</td>";
          echo "<td>$<span>".($row_proyectos['precio_markup'])."</span></td>";
          echo "<td>$<span>".($row_proyectos['consumido'])."</span></td>";
          echo "<td>$<span>".($diferencia)."</span></td>";
        echo "</tr>";
              }
              mysqli_free_result($result_proyectos);
          } else{
              echo '<strong>No hay cotizaciones cargadas.</strong>';
          }
      } else{
              echo 'ERROR: Could not able to execute $sql_proyectos. ' . mysqli_error($conexion);
        }
    echo "</tbody>";
  //         }  // Cierre del bucle While
  //         mysqli_free_result($result_proyectos);
  //     } else {
  //       echo 'EMPTY: No hay datos para mostrar.';
  //     }
  // } else{
  //   echo 'ERROR: Could not able to execute $sql. ' . mysqli_error($conexion);
  // }
  mysqli_close($conexion);
?>
