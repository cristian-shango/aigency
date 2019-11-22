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
  $servicio = $_POST["servicio"];
  $descripcion = $_POST["descripcion"];
  $razon_social = $_POST["razon_social"];
  $nombre_fantasia = $_POST["nombre_fantasia"];
  $cuit = $_POST["cuit"];
  $contacto = $_POST["contacto"];
  $telefono = $_POST["telefono"];
  $celular = $_POST["celular"];
  $mail = $_POST["mail"];
  $web = $_POST["web"];
  $observaciones = $_POST["observaciones"];
  $ubicacion = $_POST["ubicacion"];
  $iso = $_POST["iso"];
  $forma_pago = $_POST["forma_pago"];
  $descripcion_pago = $_POST["descripcion_pago"];
  $tiempo_cobro = $_POST["tiempo_cobro"];
  $obligatoriedad = $_POST["obligatoriedad"];

  $sql = "UPDATE proveedores SET servicio = '$servicio', descripcion = '$descripcion', razon_social = '$razon_social',nombre_fantasia = '$nombre_fantasia', cuit = '$cuit', contacto = '$contacto', telefono = '$telefono', celular = '$celular', mail = '$mail', website = '$web', observaciones = '$observaciones', ubicacion = '$ubicacion', iso = '$iso', forma_pago = '$forma_pago', descripcion_pago = '$descripcion_pago', tiempo_cobro = '$tiempo_cobro', obligatoriedad = '$obligatoriedad' WHERE id_proveedor = '$id'";

  if(mysqli_query($conexion, $sql)){
    echo "Registro creado.";
  } else {
      echo "ERROR: Could not able to execute $sql. "
      . mysqli_error($conexion);
  }
  mysqli_close($conexion);

?>
