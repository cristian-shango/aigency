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
              <th>Precio</th>
              <th>Costo</th>
              <th>Costo + Markup</th>
              <th>Pago a</th>
              <th>% Ocurrencia</th>
              <th>Acciones</th>
              <th>Estado</th>

            </tr>";
      $sql_proyectos = "SELECT * FROM proyectos_aprobados p LEFT JOIN clientes c ON p.cliente = c.id_cliente LEFT JOIN tipo_cotizacion t ON p.tipo_cotizacion = t.id_tipo_cotizacion LEFT JOIN subtipo_cotizacion s ON p.subtipo_cotizacion = s.id_subtipo";
      //echo $sql_proyectos."<br>";
      mysql_query("SET NAMES 'utf8'");
      if($result_proyectos = mysqli_query($conexion, $sql_proyectos)){
          if(mysqli_num_rows($result_proyectos) > 0){

              $i = 0;
              $suma_valor = 0;
              $item = 0;
              while ($row_proyectos = mysqli_fetch_array($result_proyectos)){
        echo "<tr>";
          echo "<td>".($row_proyectos['id'])."</td>";
          echo "<td scope='row'>".utf8_encode($row_proyectos['nombre'])."</td>";
          echo "<td scope='row'>".utf8_encode($row_proyectos['producto_proyecto'])."</td>";
          echo "<td>".($row_proyectos['nombre_proyecto'])."</td>";
          echo "<td scope='row'>".utf8_encode($row_proyectos['tipo_cotizacion'])."</td>";
          echo "<td>".($row_proyectos['nombre_subtipo'])."</td>";
          echo "<td class='numerable'>".($row_proyectos['precio'])."</td>";
          echo "<td class='numerable'>".$row_proyectos['costo_presupuestado']."</td>";
          echo "<td class='numerable'>$".$row_proyectos['precio_markup']."</span></td>";
          echo "<td>".$row_proyectos['tiempo_pago']." días</td>";
          echo "<td>".$row_proyectos['porcentaje_ocurrencia']."%</td>";
          echo "<td><button type='button' class='btn btn-default facturar_proyecto' data-toggle='modal' data-id='".$row_proyectos['id']."' data-check='".$row_proyectos['registro_seleccionado']."'><i class='icon wb-file' aria-hidden='true'></i></button></td>";
          echo "<td style='font-weight: bold; text-align: center !important;'>";
            if ($row_proyectos['estado'] == "FACTURADO" OR $row_proyectos['estado'] == "APROBADO"){
              echo "<span class='badge badge-primary'>".$row_proyectos['estado']."</span>";
            }
            if ($row_proyectos['estado'] == "COBRADO"){
              echo "<span class='badge badge-success'>".$row_proyectos['estado']."</span>";
            }
            if ($row_proyectos['estado'] == "FONDOS LIBERADOS"){
              echo "<span class='badge badge-info'>".$row_proyectos['estado']."</span>";
            }
            if ($row_proyectos['estado'] == "A FACTURAR"){
              echo "<span class='badge badge-danger'>".$row_proyectos['estado']."</span>";
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
