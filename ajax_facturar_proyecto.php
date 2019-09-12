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
              <th>Costo Objetivo</th>
              <th>Costo Actual</th>
              <th>Precio</th>
              <th>Cobro a</th>
              <th>Fecha de Cobro</th>
              <th>% Ocurrencia</th>
              <th>Importe Facturado</th>
              <th>Estado</th>

            </tr>";
      $sql_proyectos = "SELECT * FROM proyectos_aprobados p LEFT JOIN clientes c ON p.cliente = c.id_cliente LEFT JOIN tipo_cotizacion t ON p.tipo_cotizacion = t.id_tipo_cotizacion LEFT JOIN subtipo_cotizacion s ON p.subtipo_cotizacion = s.id_subtipo LEFT JOIN estados e ON p.estado = e.id_estados";
      //echo $sql_proyectos."<br>";
      mysql_query("SET NAMES 'utf8'");
      if($result_proyectos = mysqli_query($conexion, $sql_proyectos)){
          if(mysqli_num_rows($result_proyectos) > 0){

              $i = 0;
              $suma_valor = 0;
              $item = 0;
              while ($row_proyectos = mysqli_fetch_array($result_proyectos)){
        echo "<tr class='facturar_proyecto' style='cursor:pointer;' data-toggle='modal' data-id='".$row_proyectos['id']."' data-check='".$row_proyectos['registro_seleccionado']."'>";
          echo "<td>".($row_proyectos['id'])."</td>";
          echo "<td scope='row'>".utf8_encode($row_proyectos['nombre'])."</td>";
          echo "<td scope='row'>".utf8_encode($row_proyectos['producto_proyecto'])."</td>";
          echo "<td>".($row_proyectos['nombre_proyecto'])."</td>";
          echo "<td scope='row'>".utf8_encode($row_proyectos['tipo_cotizacion'])."</td>";
          echo "<td>".($row_proyectos['nombre_subtipo'])."</td>";
          echo "<td>$<span class='numerable'>".($row_proyectos['precio'])."</span></td>";
          echo "<td>$<span class='numerable'>".$row_proyectos['costo_presupuestado']."</span></td>";
          echo "<td>$<span class='numerable'>".$row_proyectos['precio_markup']."</span></td>";
          echo "<td>".$row_proyectos['tiempo_cobro']." días</td>";
          echo "<td>".($row_proyectos['fecha_cobro'])."</td>";
          echo "<td>".$row_proyectos['porcentaje_ocurrencia']."%</td>";
          echo "<td>$<span class='numerable'>".$row_proyectos['importe_bruto']."</span></td>";
          echo "<td style='font-weight: bold; text-align: center !important;'>";
            $estado = $row_proyectos['estado'];
            $nombre_estado = $row_proyectos['nombre_estado'];
            switch($estado){
              case "1":
                echo "<span class='badge badge-danger'>".$nombre_estado."</span>";
                break;
              case "2":
                echo "<span class='badge badge-primary'>".$nombre_estado."</span>";
                break;
              case "3":
                echo "<span class='badge badge-success'>".$nombre_estado."</span>";
                break;
              case "4":
                echo "<span class='badge badge-success'>".$nombre_estado."</span>";
                break;
              case "5":
                echo "<span class='badge badge-success'>".$nombre_estado."</span>";
                break;
              case "6":
                echo "<span class='badge badge-dark'>".$nombre_estado."</span>";
                break;
              case "7":
                echo "<span class='badge badge-info'>".$nombre_estado."</span>";
                break;
              case "8":
                echo "<span class='badge badge-warning'>".$nombre_estado."</span>";
                break;
              case "9":
                echo "<span class='badge badge-dark'>".$nombre_estado."</span>";
                break;
              case "10":
                echo "<span class='badge badge-warning'>".$nombre_estado."</span>";
                break;
              case "11":
                echo "<span class='badge badge-danger'>".$nombre_estado."</span>";
                break;
              case "12":
                echo "<span class='badge badge-success'>".$nombre_estado."</span>";
                break;
              case "13":
                echo "<span class='badge badge-warning'>".$nombre_estado."</span>";
                break;
              case "14":
                echo "<span class='badge badge-success'>".$nombre_estado."</span>";
                break;
              case "15":
                echo "<span class='badge badge-info'>".$nombre_estado."</span>";
                break;
              case "16":
                echo "<span class='badge badge-info'>".$nombre_estado."</span>";
                break;
              case "17":
                echo "<span class='badge badge-warning'>".$nombre_estado."</span>";
                break;
            }
          echo "</td>";
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
