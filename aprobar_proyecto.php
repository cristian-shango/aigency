<?php  

  $id = $_POST['id'];
  
  include "conexion.php"; 
  mysql_set_charset('utf8');

  if($conexion === false){ 
    die("ERROR: Could not connect. "  
                . mysqli_connect_error()); 
  } else {
    echo "conectado";
  } 

  $sql = "INSERT INTO proyectos_aprobados (id, cliente, producto_proyecto, nombre_proyecto, detalle, costo_presupuestado, precio, saldo, consumido, precio_markup, estado, tipo_cotizacion, subtipo_cotizacion) SELECT id, cliente, producto_proyecto, nombre_proyecto, detalle, costo_presupuestado, precio, saldo, consumido, precio_markup, '11', tipo_cotizacion, subtipo_cotizacion FROM proyectos WHERE id = $id";
  //$sql2 ="UPDATE proyectos_aprobados SET estado= 'A FACTURAR'";
  //echo ($sql);
  if(mysqli_query($conexion, $sql)){ 
    echo "Proyecto creado."; 
  } else { 
      echo "ERROR: Could not able to execute $sql. "  
      . mysqli_error($conexion); 
  }  
  mysqli_close($conexion);

?>