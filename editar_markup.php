<?php  
  
  include "conexion.php"; 
  mysql_set_charset('utf8');

  if($conexion == false){ 
    die("ERROR: Could not connect. "  
                . mysqli_connect_error()); 
  } else {
    echo "conectado";
  } 

  $registro = $_POST["registro"];
  $ingreso_markup = $_POST["ingreso_markup"];
  $valor = $_POST["valor"];
  $tipo_markup = $_POST["tipo_markup"];

  $costo_total = $_POST["costo_total"];
  $id_proyecto = $_POST["id_proyecto"];

  $sql = "UPDATE registros_markup SET tipo_markup= '$tipo_markup', valor_markup= '$ingreso_markup', total_markup= '$valor' WHERE id= '$registro'";

  $sql2 = "UPDATE proyectos SET precio_markup= '$costo_total' WHERE id= '$id_proyecto'";
  //$sql3 = "UPDATE proyectos_aprobados SET precio_markup= '$costo_total' WHERE id= '$id_proyecto'";

  if(mysqli_query($conexion, $sql)){ 
    echo $sql;
    mysqli_query($conexion, $sql2);
    //mysqli_query($conexion, $sql3);
  } else { 
      echo "ERROR: Could not able to execute $sql. "  
      . mysqli_error($conexion); 
  }  
  mysqli_close($conexion);

?>