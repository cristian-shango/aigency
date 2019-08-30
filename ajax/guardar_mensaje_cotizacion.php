<?php  
  
  include "conexion.php"; 
  mysql_set_charset('utf8');

  if($conexion === false){ 
    die("ERROR: Could not connect. "  
                . mysqli_connect_error()); 
  } else {
    echo "conectado";
  } 

  $registro = $_POST["registro"];
  $texto_mensaje = $_POST["texto_mensaje"];

  $sql = "UPDATE registros SET mensaje_cotizacion= 1 WHERE id= '$registro'";

  $sql_mensaje = "INSERT INTO mensajes_cotizaciones (id_cotizacion, texto_mensaje_cotizacion) VALUES ('$registro', '$texto_mensaje')";

  if(mysqli_query($conexion, $sql)){ 
    echo $sql; 
    mysqli_query($conexion, $sql_mensaje); 
  } else { 
      echo "ERROR: Could not able to execute $sql. "  
      . mysqli_error($conexion); 
  }  
  mysqli_close($conexion);

?>