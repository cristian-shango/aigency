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
  $estado = $_POST["estado"];
  $mensaje = $_POST["mensaje"];

  $fecha_hora = date('Y-m-d H:i:s');

  $sql = "UPDATE proyectos SET estado= '$estado' WHERE id= '$id'";

  $sql1 = "INSERT INTO mensajes (id_proyecto, mensaje, estado, fecha_hora) VALUES ('$id', '$mensaje', '$estado', '$fecha_hora')";

  if(mysqli_query($conexion, $sql)){ 
    echo "Estado actualizado."; 
  } else { 
      echo "ERROR: Could not able to execute $sql. "  
      . mysqli_error($conexion);
  }

  if(mysqli_query($conexion, $sql1)){ 
    echo "Mensaje guardado."; 
  } else { 
      echo "ERROR: Could not able to execute $sql. "  
      . mysqli_error($conexion);
  }

?>