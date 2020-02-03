<?php  

  $id_proyecto = $_POST['id_proyecto'];
  
  include "conexion.php"; 
  mysql_set_charset('utf8');

  if($conexion === false){ 
    die("ERROR: Could not connect. "  
                . mysqli_connect_error()); 
  } else {
    echo "conectado";
  } 

  $sql_costo_objetivo_proyecto = "UPDATE proyectos SET costo_presupuestado = consumido WHERE id = $id_proyecto";
  mysqli_query($conexion, $sql_costo_objetivo_proyecto);

  $sql_estado_registro = "UPDATE registros SET estado_registro = 1 WHERE id_proyecto = $id_proyecto";
  mysqli_query($conexion, $sql_estado_registro);

  $check_proyecto = $conexion->query("SELECT id_proyecto FROM registros_confirmados WHERE id_proyecto = $id_proyecto");
  if ($check_proyecto->num_rows == 0){
    
    $sql = "INSERT INTO registros_confirmados SELECT * FROM registros WHERE id_proyecto = $id_proyecto AND registro_seleccionado = 1";

    $sql_markup = "INSERT INTO registros_markup SELECT * FROM registros WHERE id_proyecto = $id_proyecto AND registro_seleccionado = 1";

    if(mysqli_query($conexion, $sql)){ 
      echo "Proyecto creado.";
      mysqli_query($conexion, $sql_markup);
    } else { 
      echo "ERROR: Could not able to execute $sql. "  
      . mysqli_error($conexion); 
    } 
    echo "No existe ese proyecto, lo creo";

  } else {
    echo "Existe proyecto, lo actualizo";
  }

  mysqli_close($conexion);

?>