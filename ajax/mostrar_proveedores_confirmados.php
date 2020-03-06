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
              <th>Deuda Total + IVA</th>
              <th>Facturada</th>
              <th>Sin Facturar</th>
              <th>Pagado</th>
              <th>Saldo</th>
              <th>&nbsp;</th>
              <th>Forma de Pago</th>
              <th>Tipo Factura</th>
              <th>Numero Factura</th>
              <th>Fecha Factura</th>
              <th>Pago a</th>
              <th>Fecha de Pago</th>
              <th>Importe Neto</th>
              <th>IVA</th>
              <th>Percepción</th>
              <th>Importe Bruto</th>
              
              <th>Ret. Ganancias</th>
              <th>Ret. IIBB</th>
              <th>RET. SUSS</th>
                      
              <th>Importe Pagado</th>
              <th>Importe Restante</th>
              
              <th>Factura</th>
              <th>Gestionar</th>
              <th>Estado</th>
              <th>Situación</th>
            </tr>";

      $sql_proyectos = "SELECT * FROM facturas_cotizaciones fc LEFT JOIN registros r ON fc.id_registro_cotizacion = r.id  LEFT JOIN proveedores p ON r.id_proveedor = p.id_proveedor LEFT JOIN proyectos pro ON r.id_proyecto = pro.id LEFT JOIN clientes c ON pro.cliente = c.id_cliente LEFT JOIN forma_pago fp ON fc.id_forma_pago_cotizacion = fp.id LEFT JOIN tipo_factura tf ON fc.id_tipo_factura_cotizacion = tf.id_factura LEFT JOIN item_cotizacion it ON r.item = it.id_item_cotizacion WHERE r.registro_seleccionado = 1 AND fc.id_proyecto_cotizacion = '".$_GET['id']."'";

      //$sql_proyectos = "SELECT * FROM registros_confirmados r LEFT JOIN rubros_cotizaciones rc ON r.rubro_cotizacion = rc.id_rubros_cotizaciones LEFT JOIN categorias_cotizaciones cc ON r.categoria_cotizacion = cc.id_catcot LEFT JOIN condicion_cotizacion concot ON r.condicion_registro = concot.id_concot LEFT JOIN proveedores p ON r.id_proveedor = p.id_proveedor LEFT JOIN item_cotizacion ic ON r.item = ic.id_item_cotizacion WHERE id_proyecto = '".$_GET['id']."'";
      //echo $sql_proyectos."<br>";
      mysql_query("SET NAMES 'utf8'");
      if($result_proyectos = mysqli_query($conexion, $sql_proyectos)){
          if(mysqli_num_rows($result_proyectos) > 0){

              $i2 = 0;
              $suma_valor = 0;
              $item = 0;
              
              while ($row_proyectos = mysqli_fetch_array($result_proyectos)){
                $deuda_facturada = 0;
                $deuda_total = 0;
                $saldo_a_pagar_facturado = 0;
                $deuda_sin_facturar = 0;
                $importe_restante_cotizacion = $row_proyectos['importe_bruto_cotizacion'] - $row_proyectos['importe_pagado_cotizacion'];

                $id_registro_cotizacion = $row_proyectos['id_registro_cotizacion'];

                $sql_pagado = "SELECT SUM(monto_total_pp) AS pagado FROM pagos WHERE id_registro_pp = $id_registro_cotizacion";
                $resultado_pagado = mysqli_query($conexion, $sql_pagado);
                $row_pagado = mysqli_fetch_assoc($resultado_pagado); 
                $calculo_pagado = $row_pagado['pagado'];

                $sql_deuda_facturada = "SELECT SUM(importe_bruto_cotizacion) AS deuda_facturada FROM facturas_cotizaciones WHERE id_registro_cotizacion = $id_registro_cotizacion AND situacion_cotizacion = 1";
                $resultado_facturada = mysqli_query($conexion, $sql_deuda_facturada);
                $row_deuda_facturada = mysqli_fetch_assoc($resultado_facturada); 
                $calculo_facturada = $row_deuda_facturada['deuda_facturada'];
                $id_factura_cotizacion = $row_proyectos['id_factura_cotizacion'];

        echo "<tr class='tr_cliente' data-toggle='modal' data-id='".$row_proyectos['id_factura_cotizacion']."' data-cliente='".$row_proyectos['nombre']."'>";
          echo "<td><a href='#' data-toggle='modal' data-fp='".$row_proyectos['indice_forma_pago']."' data-id='".$row_proyectos['id_factura_cotizacion']."' class='ver_modal_proveedor'>".$row_proyectos['id_factura_cotizacion']."</a></td>";
          echo "<td scope='row'>".$row_proyectos['nombre']."</td>";
          echo "<td scope='row'>".$row_proyectos['nombre_proyecto']."</td>";
          echo "<td scope='row'>".$row_proyectos['nombre_item_cotizacion']."</td>";
          echo "<td scope='row'>".$row_proyectos['contacto']."</td>";
          
          $deuda_total = ((($row_proyectos['importe_total'] * 21) / 100) + $row_proyectos['importe_total']);

          echo "<td scope='row'><strong>$".number_format($deuda_total, 0, ',', '.').".-</strong></td>"; //OK DEUDA TOTAL CON IVA

          $deuda_facturada_item = $row_proyectos['nombre_item_cotizacion'];
          $i2 = $row_proyectos['factura_adjunta_cotizacion'];

          //$calculo_facturada; //OK DEUDA FACTURADA
          $calculo_sin_facturar = $deuda_total - $calculo_facturada; //OK DEUDA SIN FACTURAR
          //$calculo_pagado = $row_proyectos['importe_pagado_cotizacion']; //OK PAGADO DE LA FACTURA
          $saldo_a_pagar = $deuda_total - $calculo_pagado; // OK SALDO A PAGAR

          echo "<td scope='row'>$".number_format($calculo_facturada, 0, ',', '.').".-</td>";
          echo "<td scope='row'>$".number_format($calculo_sin_facturar, 0, ',', '.').".-</td>";
          echo "<td scope='row'>$".number_format($calculo_pagado, 0, ',', '.').".-</td>";
          echo "<td scope='row'>$".number_format($saldo_a_pagar, 0, ',', '.').".-</td>";

          /*$deuda_sin_facturar = $deuda_total - $deuda_total_valor;
          $saldo_a_pagar_facturado = $deuda_total_valor - $row_proyectos['importe_pagado_cotizacion'];
          $deuda_sin_facturar = $deuda_sin_facturar + $row_proyectos['importe_bruto_cotizacion'];



          if ($i2 != null){
            $deuda_facturada = $row_proyectos['importe_bruto_cotizacion'];
            $deuda_sin_facturar = $deuda_total - $deuda_facturada;
            $saldo_a_pagar_facturado = $deuda_total - $row_proyectos['importe_pagado_cotizacion'];
            echo "<td scope='row'>$".$calculo_facturada.".-</td>";
            echo "<td scope='row'>$".($deuda_facturada - $calculo_sin_facturar).".-</td>";
            echo "<td scope='row'>$".$row_proyectos['importe_pagado_cotizacion'].".-</td>";
            echo "<td scope='row'>$".$saldo_a_pagar_facturado.".-</td>";
          } else {
            $deuda_sin_facturar = $deuda_sin_facturar + $row_proyectos['importe_bruto_cotizacion'];
            $saldo_a_pagar_sin_facturar = $deuda_total - $row_proyectos['importe_pagado_cotizacion'];
            $deuda_sin_facturar_calculo = $deuda_facturada - $calculo_sin_facturar;
            echo "<td scope='row'>$".$calculo_facturada.".-</td>";
            echo "<td scope='row'>$".$deuda_sin_facturar_calculo.".-</td>";
            echo "<td scope='row'>$".$row_proyectos['importe_pagado_cotizacion'].".-</td>";
            echo "<td scope='row'>$".$saldo_a_pagar_sin_facturar.".-</td>";
          }*/
          echo "<td scope='row' style='background-color: #393939;'>$nbsp</td>";

          // COMPRUEBO SI LOS DATOS CAMBIARON ENTRE PRODUCCION Y ADMINISTRACION, SI CAMBIARON MUESTRO ADMINISTRACION

          $sql_pagos = "SELECT SUM(monto_total_pp) AS pago_registrado FROM pagos WHERE id_factura_pp = $id_factura_cotizacion";
          $resultado_pagos = mysqli_query($conexion, $sql_pagos);
          $row_pagos = mysqli_fetch_assoc($resultado_pagos); 
          $calculo_pagos = $row_pagos['pago_registrado'];

          $sql_ganancias = "SELECT SUM(retencion_ganancias_pp) AS ganancias FROM pagos WHERE id_factura_pp = $id_factura_cotizacion";
          $resultado_ganancias = mysqli_query($conexion, $sql_ganancias);
          $row_ganancias = mysqli_fetch_assoc($resultado_ganancias); 
          $ganancias = $row_ganancias['ganancias'];

          $sql_iibb = "SELECT SUM(retencion_iibb_pp) AS iibb FROM pagos WHERE id_factura_pp = $id_factura_cotizacion";
          $resultado_iibb = mysqli_query($conexion, $sql_iibb);
          $row_iibb = mysqli_fetch_assoc($resultado_iibb); 
          $iibb = $row_iibb['iibb'];

          $sql_segsoc = "SELECT SUM(retencion_segsoc_pp) AS segsoc FROM pagos WHERE id_factura_pp = $id_factura_cotizacion";
          $resultado_segsoc = mysqli_query($conexion, $sql_segsoc);
          $row_segsoc = mysqli_fetch_assoc($resultado_segsoc); 
          $segsoc = $row_segsoc['segsoc'];

          $total_bruto_con_retenciones = $calculo_pagos + $ganancias + $iibb + $segsoc;

          if ($calculo_pagos != null){
            $sql_traigo_pagos = "SELECT * FROM pagos WHERE id_factura_pp = $id_factura_cotizacion";
            $resultado_traigo_pagos = mysqli_query($conexion, $sql_traigo_pagos);
            $row_traigo_pagos = mysqli_fetch_assoc($resultado_traigo_pagos);
            
            $importe_bruto_pagado = $row_traigo_pagos['monto_total_pp'];
            $importe_restante_cotizacion = $row_proyectos['importe_bruto_cotizacion'] - $calculo_pagos - $ganancias - $iibb - $segsoc;

            if ($row_traigo_pagos['tipo_pago_elegido_pp'] == "ef"){
              echo "<td scope='row'>Efectivo</td>";
            }

            if ($row_traigo_pagos['tipo_pago_elegido_pp'] == "tr"){
              echo "<td scope='row'>Transferencia</td>";
            }
            
            if ($row_traigo_pagos['tipo_pago_elegido_pp'] == "ch"){
              echo "<td scope='row'>Cheque</td>";
            }
            
            if ($row_traigo_pagos['tipo_pago_elegido_pp'] == "cf"){
              echo "<td scope='row'>Contra Factura</td>";
            }
            
            if ($row_traigo_pagos['tipo_pago_elegido_pp'] == "mp"){
              echo "<td scope='row'>Mercado Pago</td>";
            }
            
            if ($row_traigo_pagos['tipo_pago_elegido_pp'] == "pp"){
              echo "<td scope='row'>PayPal</td>";
            }
            
            if ($row_traigo_pagos['tipo_pago_elegido_pp'] == "tc"){
              echo "<td scope='row'>Tarjeta de Crédito</td>";
            }
            
            if ($row_traigo_pagos['tipo_pago_elegido_pp'] == "da"){
              echo "<td scope='row'>Débito Automático</td>";
            }
            echo "<td scope='row'>".$row_proyectos['tipo_factura']."</td>";
            echo "<td scope='row'>".$row_proyectos['numero_factura_cotizacion']."</td>";
            echo "<td scope='row'>".$row_proyectos['fecha_factura_cotizacion']."</td>";
            echo "<td scope='row'>".$row_proyectos['tiempo_pago_cotizacion']." días</td>";
            echo "<td scope='row'>".$row_proyectos['fecha_pago_cotizacion']."</td>";
            echo "<td scope='row'>$".number_format($row_proyectos['importe_neto_cotizacion'], 0, ',', '.').".-</td>";
            echo "<td scope='row'>$".number_format($row_proyectos['iva_cotizacion'], 0, ',', '.').".-</td>";
            echo "<td scope='row'>$".number_format($row_proyectos['percepcion_cotizacion'], 0, ',', '.').".-</td>";
            echo "<td scope='row'>$".number_format($total_bruto_con_retenciones, 0, ',', '.').".-</td>";

            if ($row_proyectos['tipo_factura'] == "A"){
              echo "<td scope='row'>$".number_format($ganancias, 0, ',', '.').".-</td>";
              echo "<td scope='row'>$".number_format($iibb, 0, ',', '.').".-</td>";
              echo "<td scope='row'>$".number_format($segsoc, 0, ',', '.').".-</td>";
            } else {
              echo "<td scope='row'></td>";
              echo "<td scope='row'></td>";
              echo "<td scope='row'></td>";
            }
            
            
            echo "<td scope='row'>$".number_format($calculo_pagos, 0, ',', '.').".-</td>";
            echo "<td scope='row'>$".number_format($importe_restante_cotizacion, 0, ',', '.').".-</td>";
          } else {
            echo "<td scope='row'>".$row_proyectos['tipo']."</td>";
            echo "<td scope='row'>".$row_proyectos['tipo_factura']."</td>";
            echo "<td scope='row'>".$row_proyectos['numero_factura_cotizacion']."</td>";
            echo "<td scope='row'>".$row_proyectos['fecha_factura_cotizacion']."</td>";
            echo "<td scope='row'>".$row_proyectos['tiempo_pago_cotizacion']." días</td>";
            echo "<td scope='row'>".$row_proyectos['fecha_pago_cotizacion']."</td>";
            echo "<td scope='row'>$".number_format($row_proyectos['importe_neto_cotizacion'], 0, ',', '.').".-</td>";
            echo "<td scope='row'>$".number_format($row_proyectos['iva_cotizacion'], 0, ',', '.').".-</td>";
            echo "<td scope='row'>$".number_format($row_proyectos['percepcion_cotizacion'], 0, ',', '.').".-</td>";
            echo "<td scope='row'>$".number_format($row_proyectos['importe_bruto_cotizacion'], 0, ',', '.').".-</td>";
            
            if ($row_proyectos['tipo_factura'] == "A"){
              echo "<td scope='row'>$".number_format($ganancias, 0, ',', '.').".-</td>";
              echo "<td scope='row'>$".number_format($iibb, 0, ',', '.').".-</td>";
              echo "<td scope='row'>$".number_format($segsoc, 0, ',', '.').".-</td>";
            } else {
              echo "<td scope='row'></td>";
              echo "<td scope='row'></td>";
              echo "<td scope='row'></td>";
            }
                 
            
            echo "<td scope='row'>$".number_format($calculo_pagos, 0, ',', '.').".-</td>";
            echo "<td scope='row'>$".number_format($importe_restante_cotizacion, 0, ',', '.').".-</td>";
            
          }
          if ($i2 != null){
            echo "<td><a href='https://admin.vivashango.com/uploads/factura_proveedores/".$row_proyectos['id_factura_cotizacion']."_factura_proveedor_".$row_proyectos['factura_adjunta_cotizacion']."' target='_blank'><i class='icon wb-check' aria-hidden='true' style='color:green; font-size: 30px;'></i></a></td>";
          } else {
            echo "<td><i class='icon wb-close' aria-hidden='true' style='color:red; font-size: 30px;'></i></td>";
          }

          echo "<td><a href='#' data-id='".$row_proyectos['id_factura_cotizacion']."' class='ver_modal_proveedor'><i class='icon wb-zoom-in' aria-hidden='true' style='color:#76838f; font-size: 30px;'></i></a></td>";        
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
              echo "<span class='badge badge-warning'>PAGO PARCIAL</span>";
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
