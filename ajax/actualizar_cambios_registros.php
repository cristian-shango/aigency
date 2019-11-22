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

  $sql_borrar = "DELETE FROM registros_confirmados WHERE id_proyecto = $id";

  $sql_copiar = "INSERT INTO registros_confirmados SELECT * FROM registros WHERE id_proyecto = $id AND registro_seleccionado = 1";

  $sql_desmarcar = "UPDATE registros SET registro_actualizado = 0 WHERE id_proyecto = $id";


  if(mysqli_query($conexion, $sql_borrar)){ 
    echo "Registro confirmados borrados";
    if(mysqli_query($conexion, $sql_copiar)){
      echo "Registros copiados.";
      if(mysqli_query($conexion, $sql_desmarcar)){
        echo "Registros desmarcados";
      }
    } 
  } 
  mysqli_close($conexion);

?>