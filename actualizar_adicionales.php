<?php
  include "conexion.php";
  include "session.php";
  mysql_set_charset('utf8');
  $proyecto = $_POST['proyecto'];

  $sql = "SELECT * FROM adicionales a RIGHT JOIN registros r ON a.id_cotizacion_adicional = r.id WHERE id_proyecto_adicional= '$proyecto.'";
  mysql_query("SET NAMES 'utf8'");
  if($resultado = mysqli_query($conexion, $sql)){
      if(mysqli_num_rows($resultado) > 0){
          $i = 0;
          $suma_adicionales = 0;
          echo "<tbody>
                <tr style='background-color: #cccccc'>
                  <th colspan='8'>Adicionales</th>
                </tr>
                <tr style='font-weight: bold;'>
                  <td>Detalle</td>
                  <td>Cantidad</td>
                  <td>Valor unit.</td>
                  <td>Valor total</td>
                  <td>Motivo</td>
                  <td>Valor adicional</td>
                  <td>Estado</td>
                </tr>";
          while($row = mysqli_fetch_array($resultado)){
            if ($row["aprobado_adicional"] == 2){
              echo "<tr id='tabla_actualizar_adicionales' style='background-color: #ff9090'>";
                echo "<td>".$row['detalle_registro']."</td>";
                echo "<td>".$row['cantidad']."</td>";
                echo "<td>$ <span class='numerable'>".$row['importe_neto']."</span></td>";
                echo "<td>$ <span class='numerable'>".$row['importe_total']."</span></td>";
                echo "<td> ".$row['motivo_adicional']."</td>";
                echo "<td>$ <span class='numerable'>".$row['monto_adicional']."</span></td>";
                  if ($row['aprobado_adicional'] == 0){
                    echo "<td><strong><i class='far fa-circle'></i></strong></td>";
                  } elseif ($row['aprobado_adicional'] == 1) {
                    echo "<td><strong><i class='far fa-check-circle'></i></strong></td>";
                  } else {
                    echo "<td><strong><i class='fas fa-ban'></i></strong></td>";
                  }
              echo "</tr>";
            } elseif ($row["aprobado_adicional"] == 1){
              if ($row["adicional_seleccionado"] == 0) {
              echo "<tr id='tabla_actualizar_adicionales'>";
                echo "<td>".$row['detalle_registro']."</td>";
                echo "<td>".$row['cantidad']."</td>";
                echo "<td>$ <span class='numerable'>".$row['importe_neto']."</span></td>";
                echo "<td>$ <span class='numerable'>".$row['importe_total']."</span></td>";
                echo "<td> ".$row['motivo_adicional']."</td>";
                echo "<td>$ <span class='numerable'>".$row['monto_adicional']."</span></td>";
                  if ($row['aprobado_adicional'] == 0){
                    echo "<td><strong><i class='far fa-circle'></i></strong></td>";
                  } elseif ($row['aprobado_adicional'] == 1) {
                    echo "<td><strong><i class='far fa-check-circle'></i></strong></td>";
                  } else {
                    echo "<td><strong><i class='fas fa-ban'></i></strong></td>";
                  }
              echo "</tr>";
              } else {
                  $suma_adicionales = $suma_adicionales + $row['monto_adicional'];
                  echo "<tr id='tabla_actualizar_adicionales' style='background-color: #90ffa0'>";
                    echo "<td>".$row['detalle_registro']."</td>";
                    echo "<td>".$row['cantidad']."</td>";
                    echo "<td>$ <span class='numerable'>".$row['importe_neto']."</span></td>";
                    echo "<td>$ <span class='numerable'>".$row['importe_total']."</span></td>";
                    echo "<td>".$row['motivo_adicional']."</td>";
                    echo "<td>$ <span class='numerable'>".$row['monto_adicional']."</span></td>";
                      if ($row['aprobado_adicional'] == 0){
                        echo "<td><strong><i class='far fa-circle'></i></strong></td>";
                      } elseif ($row['aprobado_adicional'] == 1) {
                        echo "<td><strong><i class='far fa-check-circle'></i></strong></td>";
                      } else {
                        echo "<td><strong><i class='fas fa-ban'></i></strong></td>";
                      }
                  echo "</tr>";
              }
            } else {
              echo "<tr id='tabla_actualizar_adicionales' style='background-color: #eee'>";
                echo "<td>".$row['detalle_registro']."</td>";
                echo "<td>".$row['cantidad']."</td>";
                echo "<td>$ <span class='numerable'>".$row['importe_neto']."</span></td>";
                echo "<td>$ <span class='numerable'>".$row['importe_total']."</span></td>";
                echo "<td> ".$row['motivo_adicional']."</td>";
                echo "<td>$ <span class='numerable'>".$row['monto_adicional']."</span></td>";
                  if ($row['aprobado_adicional'] == 0){
                    echo "<td><strong><i class='far fa-circle'></i></strong></td>";
                  } elseif ($row['aprobado_adicional'] == 1) {
                    echo "<td><strong><i class='far fa-check-circle'></i></strong></td>";
                  } else {
                    echo "<td><strong><i class='fas fa-ban'></i></strong></td>";
                  }
              echo "</tr>";
            }
          }
          echo "<td id='suma_adicionales' style='display: none;'>".$suma_adicionales."</td>";
          echo "</tbody>";
          mysqli_free_result($resultado);
      }
  } else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conexion);
  }
  mysqli_close($conexion);
?>
