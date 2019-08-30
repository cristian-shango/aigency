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

  $sql_desmarcar = "UPDATE registros SET registro_actualizado = 0 WHERE id_proyecto = $id";


  if(mysqli_query($conexion, $sql_desmarcar)){ 
    echo "Registro desmarcados";
  } 
  mysqli_close($conexion);

?>