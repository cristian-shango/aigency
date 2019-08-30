<?php
  //echo "including<br>";
  include '../conexion.php';
  include '../session.php';
  mysql_set_charset('utf8');
  $formas = [];
  $error = [];
  $sql = "SELECT id, tipo FROM forma_pago;";
  //echo $sql."<br>";
  mysql_query("SET NAMES 'utf8'");
  if($result = mysqli_query($conexion, $sql)){
      if(mysqli_num_rows($result) > 0){
          while ($row = mysqli_fetch_array($result)){
              $formas[$row['id']] = $row['tipo'];
          }
          mysqli_free_result($result);
          echo json_encode($formas);
      } else{
          echo json_encode(['error' => '<strong>No hay formas de pago cargadas.</strong>']);
      }
  } else{
          echo json_encode(['error' => 'ERROR: Could not able to execute $sql_proyectos. ' . mysqli_error($conexion)]);
  }
  mysqli_close($conexion);
?>
