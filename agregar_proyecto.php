<?php  
  
  include "conexion.php"; 
  mysql_set_charset('utf8');

  if($conexion === false){ 
    die("ERROR: Could not connect. "  
                . mysqli_connect_error()); 
  } else {
    echo "conectado";
  } 
  
  $cliente = $_POST["cliente"];
  $nombre = $_POST["nombre"];
  $producto = $_POST["producto"];
  $detalle = $_POST["detalle"];
  $costo_presupuestado = $_POST["costo_presupuestado"];
  $fecha_envio = $_POST["nuevo_fecha_envio"];
  $fecha_entrega = $_POST["nuevo_fecha_entrega"];
  $precio_cliente = $_POST["nuevo_precio_cliente"];
  $tipo_cotizacion = $_POST["tipo_cotizacion"];
  $subtipo_cotizacion = $_POST["subtipo_cotizacion"];
  $hora_interno = $_POST["hora_interno"];
  $minutos_interno = $_POST["minutos_interno"];
  $hora_cliente = $_POST["hora_cliente"];
  $minutos_cliente = $_POST["minutos_cliente"];

  $sql = "INSERT INTO proyectos (cliente, nombre_proyecto, detalle, producto_proyecto, costo_presupuestado, saldo, fecha_envio, fecha_entrega, precio, estado, tipo_cotizacion, subtipo_cotizacion, hora_interno, minutos_interno, hora_cliente, minutos_cliente) VALUES ('$cliente', '$nombre', '$detalle', '$producto', '$costo_presupuestado', '$costo_presupuestado', '$fecha_envio', '$fecha_entrega', '$precio_cliente', '1', '$tipo_cotizacion', '$subtipo_cotizacion', '$hora_interno', '$minutos_interno', '$hora_cliente', '$minutos_cliente')";
  echo ($sql);
  if(mysqli_query($conexion, $sql)){ 
    echo "Proyecto creado."; 
  } else { 
      echo "ERROR: Could not able to execute $sql. "  
      . mysqli_error($conexion); 
  }  
  mysqli_close($conexion);

?>