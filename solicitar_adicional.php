<?php  
  
  include "conexion.php"; 
  mysql_set_charset('utf8');

  if($conexion === false){ 
    die("ERROR: Could not connect. "  
                . mysqli_connect_error()); 
  } else {
    echo "conectado";
  } 
  $id_proyecto = $_POST["id_proyecto"];
  $cotizacion = $_POST["cotizacion"];
  $monto_adicional = $_POST["monto_adicional"];
  $motivo_adicional = $_POST["motivo_adicional"];

  $sql = "INSERT INTO adicionales (id_proyecto_adicional, monto_adicional, motivo_adicional, id_cotizacion_adicional) VALUES ('$id_proyecto', '$monto_adicional', '$motivo_adicional', '$cotizacion')";

  $sql2 = "UPDATE proyectos SET adicional= '1' WHERE id= '$id_proyecto'";
  mysqli_query($conexion, $sql2);

  if(mysqli_query($conexion, $sql)){ 
    echo "Solicitud de Adicional creada."; 
  } else { 
      echo "ERROR: Could not able to execute $sql. "  
      . mysqli_error($conexion);
  }

  
?>