<?php
  include "conexion.php"; 
  mysql_set_charset('utf8');
  $proyecto = $_POST['proyecto'];
  $sql1 = "SELECT * FROM registros WHERE proyecto= '$proyecto'";
  $result1 = mysqli_query($conexion,$sql1);
    while ($row = mysqli_fetch_array($result1)) {
      echo "<tr>";
        echo "<td scope='row'>". $row['detalle'] ."</td>";
        echo "<td>". $row['item'] ."</td>";
        // echo "<td>". $row['ot'] ."</td>";
        echo "<td>". $row['tipo_factura'] ."</td>";
        /*echo "<td>". $row['numero_factura'] ."</td>";
        echo "<td>". $row['fecha_factura'] ."</td>";
        echo "<td>". $row['fecha_pactada'] ."</td>";*/
        echo "<td>". $row['importe_neto'] ."</td>";
        echo "<td>". $row['iva'] ."</td>";
        echo "<td>". $row['percepcion'] ."</td>";
        echo "<td class='valor_saldo_total'>". $row['importe_bruto'] ."</td>";
        echo "<td><a class='fas fa-paperclip' data-lightbox='image-". $row['id'] ."' href='http://admin.vivashango.com/uploads/". $row['archivo_adjunto'] ."'></a></td>";
        echo "<td><a class='fas fa-edit' data-toggle='modal' data-target='#modal_nuevo_editar'></a></td>";
        echo "<td><a class='far fa-trash-alt' data-id='". $row['id'] ."'></a></td>";
        echo "<td>". $row['estado'] ."</td>";
      echo "</tr>";
    }
?>