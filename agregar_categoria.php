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
	$categoria = $_POST["categoria"];
	$detalle = $_POST["detalle"];

  $sql = "INSERT INTO categorias_cotizaciones (id_proyecto_catcot, detalle_catcot, nombre_catcot) VALUES ('$id_proyecto', '$detalle', '$categoria')";

  if(mysqli_query($conexion, $sql)){ 
    echo "Categoria agregada."; 
  } else { 
      echo "ERROR: Could not able to execute $sql. "  
      . mysqli_error($conexion); 
  }

  mysqli_close($conexion);

?>