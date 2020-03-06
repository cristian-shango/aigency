<?php  

  $id_cheque = $_POST['id_cheque'];
  
  include "conexion.php"; 
  mysql_set_charset('utf8');

  if($conexion === false){ 
    die("ERROR: Could not connect. "  
                . mysqli_connect_error()); 
  } else {
    echo "conectado";
  }
  $sql = "UPDATE pagos SET estado_cobro_pp = 1, fecha_deposito_cheque_pp = CURDATE() WHERE id_pp = '$id_cheque'";
  mysqli_query($conexion, $sql);
  echo ("Cheque COBRADO");

  mysqli_close($conexion);

?>