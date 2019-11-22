<?php
  include "conexion.php"; 
  mysql_set_charset('utf8');
  $proyecto = $_POST['proyecto'];
  $sql1 = "SELECT * FROM registros r LEFT JOIN condicion_cotizacion cc ON r.categoria_cotizacion = cc.id_concot WHERE id_proyecto= '$proyecto'";
  $result1 = mysqli_query($conexion,$sql1);
  echo "<select name='registros_adicional' class='form-control' id='dropdown_registros'>";
  echo "<option value=''>Seleccionar</option>"; 
  while ($row = mysqli_fetch_array($result1)) {
    echo "<option value='" . $row['id'] . "'>" . $row['nombre_concot'] . " | " . $row['item'] . " | " . $row['detalle_registro'] . " | $" . $row['importe_total'] . "</option>";
  }
  echo "</select>";
?>