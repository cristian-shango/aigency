<?php
  include "conexion.php"; 
  include "session.php";
  $proyecto = $_POST['proyecto'];
      
  $sql = "SELECT * FROM registros r INNER JOIN rubros_cotizaciones rc ON r.rubro_cotizacion = rc.id_rubros_cotizaciones INNER JOIN categorias_cotizaciones cc ON r.categoria_cotizacion = cc.id_catcot INNER JOIN tipo_item ti ON r.item = ti.id_tipo_item INNER JOIN condicion_cotizacion concot ON r.condicion_registro = concot.id_concot WHERE id_proyecto = '$proyecto'";
    if($result = mysqli_query($conexion, $sql)){
      if(mysqli_num_rows($result) > 0){
        $i = 0;
          while ($row = mysqli_fetch_array($result)){
            echo "<div>".$row['nombre_rubros']."</div>";
          }      
      }
    }
  mysqli_free_result($result);
  mysqli_close($conexion);
?>