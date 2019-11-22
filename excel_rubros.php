<?php
  include "conexion.php";
  include 'session.php';
  mysql_set_charset('utf8');

  $id = $_GET['id'];
  $sql = "SELECT * FROM rubros_cotizaciones"; // WHERE id_rubros_cotizaciones = '$id'";

  mysql_query("SET NAMES 'utf8'");
  if($result = mysqli_query($conexion, $sql)){
      if(mysqli_num_rows($result) > 0){

          $i = 0;
          $suma_valor = 0;
          $item = 0;
          while ($row_registros = mysqli_fetch_array($result)){
            echo "$row_registros[1],";
          }
        } else {
          echo "No hay datos para mostrar.";
        }
  } else {
      echo "ERROR: Could not able to execute $sql. "
      . mysqli_error($conexion);
  }
  mysqli_close($conexion);
?>
