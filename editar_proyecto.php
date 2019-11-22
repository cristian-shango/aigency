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
  $cliente = $_POST["cliente"];
  $nombre = $_POST["nombre"];
  $producto = $_POST["producto"];
  $detalle = $_POST["detalle"];
  $costo_presupuestado = $_POST["costo_presupuestado"];
  $fecha_entrega = $_POST["fecha_entrega"];
  $fecha_envio = $_POST["fecha_envio"];
  $precio = $_POST["precio_cliente"];
  $saldo = $_POST["saldo"];
  $tipo_cotizacion = $_POST["tipo_cotizacion"];
  $subtipo_cotizacion = $_POST["subtipo_cotizacion"];

  $hora_interno = $_POST["hora_interno"];
  $minutos_interno = $_POST["minutos_interno"];
  $hora_cliente = $_POST["hora_cliente"];
  $minutos_cliente = $_POST["minutos_cliente"];

  $sql = "UPDATE proyectos SET cliente= '$cliente', nombre_proyecto= '$nombre', detalle= '$detalle', producto_proyecto= '$producto', precio= '$precio', costo_presupuestado = '$costo_presupuestado', fecha_envio = '$fecha_envio', fecha_entrega= '$fecha_entrega', saldo= '$saldo', tipo_cotizacion= '$tipo_cotizacion', subtipo_cotizacion= '$subtipo_cotizacion', hora_interno= '$hora_interno', minutos_interno= '$minutos_interno', hora_cliente= '$hora_cliente', minutos_cliente= '$minutos_cliente' WHERE id= '$id'";

  /*$sql1 = "UPDATE registros SET proyecto= '$nombre', cliente= '$cliente', costo_presupuestado = '$costo_presupuestado'  WHERE id_proyecto= '$id'";*/

  if(mysqli_query($conexion, $sql)){
    echo "Proyecto actualizado."; 
  } else { 
      echo "ERROR: Could not able to execute $sql. "  
      . mysqli_error($conexion); 
  }

  /*if(mysqli_query($conexion, $sql1)){ 
    echo "Registro actualizado."; 
  } else { 
      echo "ERROR: Could not able to execute $sql. "  
      . mysqli_error($conexion); 
  }  
  mysqli_close($conexion);*/

?>