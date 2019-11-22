<?php
  include "conexion.php";
  mysql_set_charset('utf8');

  $sql_rubro_dropdown = "SELECT * FROM rubros_cotizaciones ORDER BY nombre_rubros ASC";
  mysql_query("SET NAMES 'utf8'");
  if($result_rubro_dropdown = mysqli_query($conexion, $sql_rubro_dropdown)){
    if(mysqli_num_rows($result_rubro_dropdown) > 0){
        $i = 0;
        while($row_rubro_dropdown = mysqli_fetch_array($result_rubro_dropdown)){
  ?>
<option value="<?php echo ($row_rubro_dropdown['id_rubros_cotizaciones']);?>"><?php echo (utf8_encode($row_rubro_dropdown['nombre_rubros']));?></option>
<?php
  }
  mysqli_free_result($result_rubro_dropdown);
      } else{
          echo "No hay datos para mostrar.";
      }
  } else{
echo "ERROR: Could not able to execute $sql_rubro_dropdown. " . mysqli_error($conexion);
  }
?>
