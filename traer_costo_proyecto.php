<?php
  include "conexion.php"; 
  mysql_set_charset('utf8');
  $proyecto = $_POST['proyecto'];
  $sql1 = "SELECT * FROM proyectos WHERE nombre= '$proyecto'";
  $result1 = mysqli_query($conexion,$sql1);
    while ($row = mysqli_fetch_array($result1)) {
        echo "<div style='display:none;' id='valor_costo_presupuestado'>". $row['costo_presupuestado'] ."</div>";
    }
?>