<?php  
  
  include "conexion.php"; 
  mysql_set_charset('utf8');

  if($conexion === false){ 
    die("ERROR: Could not connect. "  
                . mysqli_connect_error()); 
  } else {
    echo "conectado";
  } 

  $nombre_fantasia = $_POST["nombre_fantasia"];
  $razon_social = $_POST["razon_social"];
  
  

  $sql = "INSERT INTO proveedores ( razon_social,nombre_fantasia) VALUES ( '$razon_social','$nombre_fantasia')";

  if(mysqli_query($conexion, $sql)){ 
    echo "Registro creado."; 
  } else { 
      echo "ERROR: Could not able to execute $sql. "  
      . mysqli_error($conexion); 
  }  
  mysqli_close($conexion);

?>