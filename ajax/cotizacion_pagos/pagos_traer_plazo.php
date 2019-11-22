<?php
  //echo "including<br>";
  include '../conexion.php';
  include '../session.php';
  mysql_set_charset('utf8');
  $formas = [];
  $error = [];
  $sql = "SELECT nombre, dias FROM plazo_pago ORDER BY dias ASC;";
  //echo $sql."<br>";
  mysql_query("SET NAMES 'utf8'");
  if($result = mysqli_query($conexion, $sql)){
      if(mysqli_num_rows($result) > 0){
          while ($row = mysqli_fetch_array($result)){
              $formas[$row['dias']] = $row['nombre'];
          }
          mysqli_free_result($result);
          echo json_encode($formas);
      } else{
          echo json_encode(['error' => '<strong>No hay plazos de pago cargados.</strong>']);
      }
  } else{
          echo json_encode(['error' => 'ERROR: Could not able to execute $sql. ' . mysqli_error($conexion)]);
  }
  mysqli_close($conexion);
?>
