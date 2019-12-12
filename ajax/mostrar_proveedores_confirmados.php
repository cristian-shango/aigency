<?php
  include 'conexion.php';
  include 'session.php';
  mysql_set_charset('utf8');
      echo "<tbody>
            <tr>
              <th>OT</th>
              <th>Rubro</th>
              <th>Categoría</th>
              <th>Item</th>
              <th>Condición</th>
              <th>Proveedor</th>
              <th>Costo</th>
              <th>Factura</th>
              <th>Pagos</th>
              <th>Estado</th>
            </tr>";
      $sql_proyectos = "SELECT * FROM registros_confirmados r LEFT JOIN rubros_cotizaciones rc ON r.rubro_cotizacion = rc.id_rubros_cotizaciones LEFT JOIN categorias_cotizaciones cc ON r.categoria_cotizacion = cc.id_catcot LEFT JOIN condicion_cotizacion concot ON r.condicion_registro = concot.id_concot LEFT JOIN proveedores p ON r.id_proveedor = p.id_proveedor LEFT JOIN item_cotizacion ic ON r.item = ic.id_item_cotizacion WHERE id_proyecto = '".$_GET['id']."'";
      //echo $sql_proyectos."<br>";
      mysql_query("SET NAMES 'utf8'");
      if($result_proyectos = mysqli_query($conexion, $sql_proyectos)){
          if(mysqli_num_rows($result_proyectos) > 0){

              $i = 0;
              $suma_valor = 0;
              $item = 0;
              while ($row_proyectos = mysqli_fetch_array($result_proyectos)){

        echo "<tr data-toggle='modal' data-id='".$row_proyectos['id']."'>";
          echo "<td><a href='pago_proveedores_detalle.php?id=".($row_proyectos['id'])."'>".$row_proyectos['id']."</a></td>";
          echo "<td scope='row'>".utf8_encode($row_proyectos['nombre_rubros'])."</td>";
          echo "<td scope='row'>".utf8_encode($row_proyectos['nombre_catcot'])."</td>";
          echo "<td>".($row_proyectos['nombre_item_cotizacion'])."</td>";
          echo "<td scope='row'>".utf8_encode($row_proyectos['nombre_concot'])."</td>";
          echo "<td>".$row_proyectos['razon_social']." | ".$row_proyectos['contacto']."</td>";
          echo "<td>$<span class='numerable'>".$row_proyectos['importe_total']."</span></td>";
          
          $i = $row_proyectos['archivo_adjunto'];
          switch ($i) {
            case "sin_subir":
                echo "<td><i class='icon wb-close' aria-hidden='true' style='color:red; font-size: 30px;'></i></td>";
                break;
            case "0":
                echo "<td><i class='icon wb-close' aria-hidden='true' style='color:red; font-size: 30px;'></i></td>";
                break;
            default:
                echo "<td><i class='icon wb-check' aria-hidden='true' style='color:green; font-size: 30px;'></i></td>";
          }

          echo "<td>".$row_proyectos['cotizaciones_pagos']." días</td>";
          echo "<td style='font-weight: bold; text-align: center !important;'>";
            if ($row_proyectos['estado_registro'] == 4){
              echo "<span class='badge badge-danger'>POR PAGAR</span>";
            } elseif ($row_proyectos['estado_registro'] == 5) {
              echo "<span class='badge badge-warning'>PAGO DEMORADO</span>";
            } elseif ($row_proyectos['estado_registro'] == 6) {
              echo "<span class='badge badge-success'>PAGADO</span>";
            }
          echo "</td>";
        echo "</tr>";
              }
              mysqli_free_result($ressult_proyectos);
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
