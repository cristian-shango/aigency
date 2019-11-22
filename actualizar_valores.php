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
  $saldo_total = $_POST["saldo_total"];
  $total = $_POST["total"];

  $registro = $_POST["registro"];
  $chk = $_POST["chk"];

  $sql = "UPDATE proyectos SET saldo= '$saldo_total', consumido= '$total' WHERE id= '$id_proyecto'";

  $sql2 = "UPDATE registros SET registro_seleccionado= '$chk' WHERE id= '$registro'";
  mysqli_query($conexion, $sql2);
  echo $sql;

  if(mysqli_query($conexion, $sql)){ 
    echo "Proyecto actualizado"; 
  } else { 
      echo "ERROR: Could not able to execute $sql. "  
      . mysqli_error($conexion); 
  }  
  mysqli_close($conexion);

?>