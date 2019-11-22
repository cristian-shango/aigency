<?php  
  
  include "conexion.php"; 
  mysql_set_charset('utf8');

  if($conexion == false){ 
    die("ERROR: Could not connect. ". mysqli_connect_error()); 
  } else {

  } 

  $proyecto = $_POST["proyecto"];

  $sql = "SELECT i1.item FROM (SELECT item FROM registros WHERE id_proyecto = '$proyecto' GROUP BY item) i1 LEFT JOIN (SELECT item, COUNT(*) AS marca FROM registros WHERE registro_seleccionado = 1 AND id_proyecto = '$proyecto' GROUP BY item) i2 ON i1.item = i2.item WHERE NOT marca = 1 OR marca IS null";
  mysql_query("SET NAMES 'utf8'");

  $result = mysqli_query($conexion, $sql);
  $row = mysqli_fetch_array($result);
  echo json_encode($row);
  mysqli_close($conexion);
?>