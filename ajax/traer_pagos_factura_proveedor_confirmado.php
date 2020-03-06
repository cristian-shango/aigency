<?php  
	include "conexion.php"; 
	include 'session.php';
	mysql_set_charset('utf8');
      echo "<tbody>
            <tr style='color: #FFF; background-color: #393939;'>
              <th>#</th>
              <th>Importe Pagado</th>
              <th>Forma de Pago</th>
            </tr>";

      $sql_proyectos = "SELECT * FROM pagos WHERE id_factura_pp = '".$_GET['id_factura_proveedor']."'";

      //$sql_proyectos = "SELECT * FROM registros_confirmados r LEFT JOIN rubros_cotizaciones rc ON r.rubro_cotizacion = rc.id_rubros_cotizaciones LEFT JOIN categorias_cotizaciones cc ON r.categoria_cotizacion = cc.id_catcot LEFT JOIN condicion_cotizacion concot ON r.condicion_registro = concot.id_concot LEFT JOIN proveedores p ON r.id_proveedor = p.id_proveedor LEFT JOIN item_cotizacion ic ON r.item = ic.id_item_cotizacion WHERE id_proyecto = '".$_GET['id']."'";
      //echo $sql_proyectos."<br>";
      mysql_query("SET NAMES 'utf8'");
      if($result_proyectos = mysqli_query($conexion, $sql_proyectos)){
          if(mysqli_num_rows($result_proyectos) > 0){
          	$i = 0;
              while ($row_proyectos = mysqli_fetch_array($result_proyectos)){
              	$i = $i + 1;

              	$monto_total = $row_proyectos['monto_total_pp'] + $monto_total;
                
        echo "<tr class='tr_cliente'>";
          echo "<td scope='row'>".$i."</td>";
          echo "<td scope='row'>$".number_format($row_proyectos['monto_total_pp'], 0, ',', '.').".-</td>";
            if ($row_proyectos['tipo_pago_elegido_pp'] == "ef"){
              echo "<td scope='row'>Efectivo</td>";
            }

            if ($row_proyectos['tipo_pago_elegido_pp'] == "tr"){
              echo "<td scope='row'>Transferencia</td>";
            }
            
            if ($row_proyectos['tipo_pago_elegido_pp'] == "ch"){
              echo "<td scope='row'>Cheque</td>";
            }
            
            if ($row_proyectos['tipo_pago_elegido_pp'] == "cf"){
              echo "<td scope='row'>Contra Factura</td>";
            }
            
            if ($row_proyectos['tipo_pago_elegido_pp'] == "mp"){
              echo "<td scope='row'>Mercado Pago</td>";
            }
            
            if ($row_proyectos['tipo_pago_elegido_pp'] == "pp"){
              echo "<td scope='row'>PayPal</td>";
            }
            
            if ($row_proyectos['tipo_pago_elegido_pp'] == "tc"){
              echo "<td scope='row'>Tarjeta de Crédito</td>";
            }
            
            if ($row_proyectos['tipo_pago_elegido_pp'] == "da"){
              echo "<td scope='row'>Débito Automático</td>";
            }
        echo "</tr>";
              }
              mysqli_free_result($result_proyectos);
          } else{
              echo '<strong>No hay facturas cargadas.</strong>';
          }
      } else{
              echo 'ERROR: Could not able to execute $sql_proyectos. ' . mysqli_error($conexion);
        }
    echo "<tr style='color: #FFF; background-color: #393939;'>
      	<th>TOTAL</th>
      	<th>$<span id='total_pago_factura'>".number_format($monto_total, 0, ',', '.')."</span>.-</th>
      	<th>&nbsp;</th>
    </tr>";
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