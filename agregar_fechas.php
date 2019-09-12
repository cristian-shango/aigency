<?php  
  
  include "conexion.php"; 
  mysql_set_charset('utf8');

  if($conexion === false){ 
    die("ERROR: Could not connect. "  
                . mysqli_connect_error()); 
  } else {
    echo "conectado";
  } 
  $id = $_POST["id"];
  $fecha_inicio=$_POST['fecha_inicio'];
  $fecha_culminacion=$_POST['fecha_culminacion'];

  $fecha_hora = date('Y-m-d H:i:s');

  $sql = "UPDATE proyectos_aprobados SET fecha_inicio= '$fecha_inicio', fecha_culminacion= '$fecha_culminacion' WHERE id= '$id'";
  

  if(mysqli_query($conexion, $sql)){ 
    echo "Estado actualizado."; 
  } else { 
      echo "ERROR: Could not able to execute $sql. "  
      . mysqli_error($conexion);
  }


?>