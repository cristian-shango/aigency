<?php
  include "conexion.php";
  mysql_set_charset('utf8');

  $sql_categorias_dropdown = "SELECT * FROM categorias_cotizaciones ORDER BY nombre_catcot ASC";
  mysql_query("SET NAMES 'utf8'");
  if($result_categorias_dropdown = mysqli_query($conexion, $sql_categorias_dropdown)){
      if(mysqli_num_rows($result_categorias_dropdown) > 0){
          $i = 0;
          while($row_categorias_dropdown = mysqli_fetch_array($result_categorias_dropdown)){
  ?>
  <option value="<?php echo (utf8_encode($row_categorias_dropdown['id_catcot']));?>"><?php echo (utf8_encode($row_categorias_dropdown['nombre_catcot']));?></option>
  <?php
          }
          mysqli_free_result($result_categorias_dropdown);
      } else{
          echo "No hay datos para mostrar.";
      }
  } else{
      echo "ERROR: Could not able to execute $sql_categorias_dropdown. " . mysqli_error($conexion);
  }
?>
