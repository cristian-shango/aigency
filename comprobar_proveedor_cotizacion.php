<?php
  include "conexion.php";
  mysql_set_charset('utf8');
  if($conexion == false){
    die("ERROR: Could not connect. "
                . mysqli_connect_error());
  }

  $proveedor = $_POST["proveedor"];
  $nombre_proveedor = $_POST["nombre_proveedor"];

// Chequeo que el item no exista
  $sql_proveedor = "SELECT * FROM proveedores WHERE contacto = '$nombre_proveedor'";

  if($resultado_proveedor = mysqli_query($conexion, $sql_proveedor)){
    //conectado con rubros
  } else {
      echo "ERROR: Could not able to execute $sql_proveedor. "
      . mysqli_error($conexion);
  }

  if (mysqli_num_rows($resultado_proveedor)>0){
    echo "Rubro existente, no hago nada.";
  } else {
    // Crear NUEVO rubro
    $sql_creo_proveedor = "INSERT INTO proveedores (contacto) VALUES ('$nombre_proveedor')";
    mysqli_query($conexion, $sql_creo_proveedor);
    echo "Proveedor $nombre_proveedor creado";
  }
  mysqli_close($conexion);
 ?>