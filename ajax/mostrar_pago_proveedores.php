<?php
  include 'conexion.php';
  include 'session.php';
  mysql_set_charset('utf8');
      echo "<tbody>
            <tr style='color: #FFF; background-color: #393939;'>
              <th>OP</th>
              <th>Cliente</th>
              <th>Proyecto</th>
              <th>Item</th>
              <th>Proveedor</th>
              <th>Forma de Pago</th>
              <th>Tipo Factura</th>
              <th>Numero Factura</th>
              <th>Fecha Factura</th>
              <th>Tiempo de Pago</th>
              <th>Fecha de Pago</th>
              <th>Importe Neto</th>
              <th>IVA</th>
              <th>Percepción</th>
              <th>Importe Bruto</th>
              <th>Factura</th>
              <th>Estado</th>
              <th>Situación</th>
            </tr>";
      $sql_proyectos = "SELECT * FROM facturas_cotizaciones fc LEFT JOIN registros r ON fc.id_registro_cotizacion = r.id  LEFT JOIN proveedores p ON r.id_proveedor = p.id_proveedor LEFT JOIN proyectos pro ON r.id_proyecto = pro.id LEFT JOIN clientes c ON pro.cliente = c.id_cliente LEFT JOIN forma_pago fp ON fc.id_forma_pago_cotizacion = fp.id LEFT JOIN tipo_factura tf ON fc.id_tipo_factura_cotizacion = tf.id_factura LEFT JOIN item_cotizacion it ON r.item = it.id_item_cotizacion WHERE r.registro_seleccionado = 1";

      //$sql_proyectos = "SELECT * FROM registros_confirmados r LEFT JOIN rubros_cotizaciones rc ON r.rubro_cotizacion = rc.id_rubros_cotizaciones LEFT JOIN categorias_cotizaciones cc ON r.categoria_cotizacion = cc.id_catcot LEFT JOIN condicion_cotizacion concot ON r.condicion_registro = concot.id_concot LEFT JOIN proveedores p ON r.id_proveedor = p.id_proveedor LEFT JOIN item_cotizacion ic ON r.item = ic.id_item_cotizacion WHERE id_proyecto = '".$_GET['id']."'";
      //echo $sql_proyectos."<br>";
      mysql_query("SET NAMES 'utf8'");
      if($result_proyectos = mysqli_query($conexion, $sql_proyectos)){
          if(mysqli_num_rows($result_proyectos) > 0){

              $i = 0;
              $suma_valor = 0;
              $item = 0;
              while ($row_proyectos = mysqli_fetch_array($result_proyectos)){

        echo "<tr class='tr_cliente' data-toggle='modal' data-id='".$row_proyectos['id_factura_cotizacion']."' data-cliente='".$row_proyectos['nombre']."'>";
          echo "<td>".$row_proyectos['id_factura_cotizacion']."</td>";
          echo "<td scope='row'>".$row_proyectos['nombre']."</td>";
          echo "<td scope='row'class='ver_proveedores' data-id='".$row_proyectos['id_proyecto_cotizacion']."'><strong><a href='#'>".strtoupper($row_proyectos['nombre_proyecto'])."</strong></a></td>";
          echo "<td scope='row'>".$row_proyectos['nombre_item_cotizacion']."</td>";
          echo "<td scope='row'>".$row_proyectos['contacto']."</td>";
          echo "<td scope='row'>".$row_proyectos['tipo']."</td>";
          echo "<td scope='row'>".$row_proyectos['tipo_factura']."</td>";
          echo "<td scope='row'>".$row_proyectos['numero_factura_cotizacion']."</td>";
          echo "<td scope='row'>".$row_proyectos['fecha_factura_cotizacion']."</td>";
          echo "<td scope='row'>".$row_proyectos['tiempo_pago_cotizacion']." días</td>";
          echo "<td scope='row'>".$row_proyectos['fecha_pago_cotizacion']."</td>";
          echo "<td scope='row'>$".$row_proyectos['importe_neto_cotizacion'].".-</td>";
          echo "<td scope='row'>$".$row_proyectos['iva_cotizacion'].".-</td>";
          echo "<td scope='row'>$".$row_proyectos['percepcion_cotizacion'].".-</td>";
          echo "<td scope='row'>$".$row_proyectos['importe_bruto_cotizacion'].".-</td>";
          
          $i = $row_proyectos['factura_adjunta_cotizacion'];
          if ($i != null){
            echo "<td><a href='https://admin.vivashango.com/uploads/factura_proveedores/".$row_proyectos['id_factura_cotizacion']."_factura_proveedor_".$row_proyectos['factura_adjunta_cotizacion']."' target='_blank'><i class='icon wb-check' aria-hidden='true' style='color:green; font-size: 30px;'></i></a></td>";
          } else {
            echo "<td><i class='icon wb-close' aria-hidden='true' style='color:red; font-size: 30px;'></i></td>";
          }
          echo "<td style='font-weight: bold; text-align: center !important;'>";
            if ($row_proyectos['situacion_cotizacion'] == 0){
              echo "<span class='badge badge-primary'>PROYECTADO</span>";
            } elseif ($row_proyectos['situacion_cotizacion'] == 1) {
              echo "<span class='badge badge-warning'>CONFIRMADO</span>";
            } elseif ($row_proyectos['situacion_cotizacion'] == 2) {
              echo "<span class='badge badge-success'>EJECUTADO</span>";
            }
          echo "</td>";
          echo "<td style='font-weight: bold; text-align: center !important;'>";
            if ($row_proyectos['estado_cotizacion'] == 0){
              echo "<span class='badge badge-danger'>POR PAGAR</span>";
            } elseif ($row_proyectos['estado_cotizacion'] == 1) {
              echo "<span class='badge badge-warning'>PAGO DEMORADO</span>";
            } elseif ($row_proyectos['estado_cotizacion'] == 2) {
              echo "<span class='badge badge-success'>PAGADO</span>";
            } elseif ($row_proyectos['estado_cotizacion'] == 3) {
              echo "<span class='badge badge-warning'>PAGO REPROGRAMADO</span>";
            } elseif ($row_proyectos['estado_cotizacion'] == 4) {
              echo "<span class='badge badge-success'>CONSOLIDADO</span>";
            }
          echo "</td>";
        echo "</tr>";
              }
              mysqli_free_result($ressult_proyectos);
          } else{
              echo '<strong>No hay facturas cargadas.</strong>';
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
