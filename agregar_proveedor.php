<?php  
  
  include "conexion.php"; 
  mysql_set_charset('utf8');

  if($conexion === false){ 
    die("ERROR: Could not connect. "  
                . mysqli_connect_error()); 
  } else {
    echo "conectado";
  } 

  $servicio = $_POST["servicio"];
  $descripcion = $_POST["descripcion"];
  $razon_social = $_POST["razon_social"];
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

  $sql = "INSERT INTO proveedores (servicio, descripcion, razon_social, cuit, contacto, telefono, celular, mail, website, observaciones, ubicacion, iso, forma_pago, descripcion_pago, tiempo_cobro, obligatoriedad) VALUES ('$servicio', '$descripcion', '$razon_social', '$cuit', '$contacto', '$telefono', '$celular', '$mail', '$web', '$observaciones', '$ubicacion', '$iso', '$forma_pago', '$descripcion_pago', '$tiempo_cobro', '$obligatoriedad')";

  if(mysqli_query($conexion, $sql)){ 
    echo "Registro creado."; 
  } else { 
      echo "ERROR: Could not able to execute $sql. "  
      . mysqli_error($conexion); 
  }  
  mysqli_close($conexion);

?>