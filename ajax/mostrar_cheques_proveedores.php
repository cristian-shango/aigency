<?php
  include 'conexion.php';
  include 'session.php';
  mysql_set_charset('utf8');
      echo "<tbody>
            <tr style='color: #FFF; background-color: #393939;'>
              <th>#</th>
              <th>Banco</th>
              <th>Nº Cheque</th>
              <th>Importe</th>
              <th>Tipo Cheque</th>
              <th>Razón Social</th>
              <th>Fecha Emisión</th>
              <th>Fecha Cobro</th>
              <th>Fecha Depósito</th>
              <th>Fecha Creación</th>
              <th>Estado</th>
              <th>Acciones</th>
            </tr>";
      $tipo_pago = "ch";

      $sql_bancos = "SELECT * FROM pagos pp LEFT JOIN facturas_cotizaciones fc ON pp.id_factura_pp = fc.id_factura_cotizacion LEFT JOIN bancos b on pp.id_banco_origen_pp = b.id_banco LEFT JOIN registros r ON fc.id_registro_cotizacion = r.id  LEFT JOIN proveedores p ON r.id_proveedor = p.id_proveedor LEFT JOIN proyectos pro ON r.id_proyecto = pro.id WHERE pp.tipo_pago_elegido_pp = '$tipo_pago'";

      mysql_query("SET NAMES 'utf8'");
      if($result_bancos = mysqli_query($conexion, $sql_bancos)){
          if(mysqli_num_rows($result_bancos) > 0){
              
              while ($row_bancos = mysqli_fetch_array($result_bancos)){
                
              echo "<tr class='tr_cliente' data-toggle='modal' data-id='".$row_bancos['id_factura_cotizacion']."'>";
                echo "<td scope='row'>".$row_bancos['id_pp']."</td>";
                echo "<td scope='row'>".$row_bancos['nombre']."</td>";
                echo "<td scope='row'>".$row_bancos['numero_cheque_pp']."</td>";
                echo "<td scope='row'>$".number_format($row_bancos['monto_total_pp'], 0, ',', '.').".-</td>";
                
                echo "<td style='font-weight: bold; text-align: center !important;'>";
                if ($row_bancos['tipo_cheque_pp'] == 0){
                  echo "<span class='badge badge-success'>DIFERIDO</span>";
                } else {
                  echo "<span class='badge badge-warning'>AL DÍA</span>";  
                }
                echo "</td>";
                echo "<td scope='row'>".$row_bancos['contacto']."</td>";

                echo "<td scope='row'>".$row_bancos['fecha_cheque_pp']."</td>";
                echo "<td scope='row'>".$row_bancos['fecha_pago_pp']."</td>";
                echo "<td scope='row'>".$row_bancos['fecha_deposito_cheque_pp']."</td>";
                echo "<td scope='row'>".$row_bancos['ingreso_fecha_pago_pp']."</td>";
          
                // ESTADO DEL CHEQUE

                echo "<td style='font-weight: bold; text-align: center !important;'>";
                  if ($row_bancos['estado_cobro_pp'] == 0){
                    echo "<span class='badge badge-danger'>PENDIENTE</span>";
                  } elseif ($row_bancos['estado_cobro_pp'] == 1) {
                    echo "<span class='badge badge-success'>COBRADO</span>";
                  } elseif ($row_bancos['estado_cobro_pp'] == 2) {
                    echo "<span class='badge badge-danger'>RECHAZADO</span>";
                  } elseif ($row_bancos['estado_cobro_pp'] == 3) {
                    echo "<span class='badge badge-warning'>VENCIDO</span>";
                  } elseif ($row_bancos['estado_cobro_pp'] == 4) {
                    echo "<span class='badge badge-info'>ANULADO</span>";
                  }
                echo "</td>";

                if ($row_bancos['estado_cobro_pp'] == 1){
                  echo "<td scope='row'><button type='button' class='btn btn-success boton_cobrar_cheque' data-id_cheque='".$row_bancos['id_pp']."' disabled><i class='icon wb-check' aria-hidden='true'></i></button>&nbsp;&nbsp;<button type='button' class='btn btn-info boton_detalle_cheque'><i class='icon wb-eye' aria-hidden='true'></i></button></td>";
                } else {
                  echo "<td scope='row'><button type='button' class='btn btn-success boton_cobrar_cheque' data-id_cheque='".$row_bancos['id_pp']."'><i class='icon wb-check' aria-hidden='true'></i></button>&nbsp;&nbsp;<button type='button' class='btn btn-info boton_detalle_cheque'><i class='icon wb-eye' aria-hidden='true'></i></button></td>";
                }
                

                // 

              echo "</tr>";
                  }
                  mysqli_free_result($result_bancos);
              } else{
                  echo '<strong>No hay facturas cargadas.</strong>';
              }
          } else{
                  echo 'ERROR: Could not able to execute $sql_bancos. ' . mysqli_error($conexion);
            }
    echo "</tbody>";
  //         }  // Cierre del bucle While
  //         mysqli_free_result($result_bancos);
  //     } else {
  //       echo 'EMPTY: No hay datos para mostrar.';
  //     }
  // } else{
  //   echo 'ERROR: Could not able to execute $sql. ' . mysqli_error($conexion);
  // }
  mysqli_close($conexion);
?>
