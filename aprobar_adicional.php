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
  $id_adicional = $_POST["id_adicional"];
  $costo = $_POST["costo"];
  $saldo = $_POST["saldo"];
  $cargo_cliente = $_POST["cargo_cliente"];

  $sql = "UPDATE proyectos SET costo_presupuestado = $costo, saldo = $saldo WHERE id= '$id_proyecto'";

  $sql2 = "UPDATE adicionales SET aprobado_adicional = '1', adicional_cliente = $cargo_cliente  WHERE id_adicional= '$id_adicional'";

  mysqli_query($conexion, $sql2);

  if(mysqli_query($conexion, $sql)){ 
    echo "Adicional aprobado."; 
  } else { 
      echo "ERROR: Could not able to execute $sql. "  
      . mysqli_error($conexion);
  }
?>