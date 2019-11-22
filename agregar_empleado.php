<?php  
  
  include "conexion.php"; 
  mysql_set_charset('utf8');

  if($conexion === false){ 
    die("ERROR: Could not connect. "  
                . mysqli_connect_error()); 
  } else {
    echo "conectado";
  } 

  $apellido = $_POST["apellido"];
  $nombre = $_POST["nombre"];
  $estadoCivil = $_POST["estadoCivil"];
  $hijos = $_POST["hijos"];
  $direccion = $_POST["direccion"];
  $nacimiento = $_POST["nacimiento"];
  $telefono = $_POST["telefono"];
  $celular = $_POST["celular"];
  $mail = $_POST["mail"];
  $cuil = $_POST["cuil"];
  $centroCosto = $_POST["centroCosto"];
  $convenioColectivo = $_POST["convenioColectivo"];
  $remuneracionBruta = $_POST["remuneracionBruta"];
  $jornada = $_POST["jornada"];
  $banco = $_POST["banco"];
  $cbu = $_POST["cbu"];
  $obraSocial = $_POST["obraSocial"];
  $ingreso = $_POST["ingreso"];

  $sql = "INSERT INTO empleados (apellido, nombre, estadoCivil, hijos, direccion, nacimiento, telefono, celular, mail, cuil, centroCosto, convenioColectivo, remuneracionBruta, jornada, banco, cbu, obraSocial, ingreso) VALUES ('$apellido', '$nombre', '$estadoCivil', '$hijos', '$direccion', '$nacimiento', '$telefono', '$celular', '$mail', '$cuil', '$centroCosto', '$convenioColectivo', '$remuneracionBruta', '$jornada', '$banco', '$cbu', '$obraSocial', '$ingreso')";

  if(mysqli_query($conexion, $sql)){ 
    echo "Registro creado."; 
  } else { 
      echo "ERROR: Could not able to execute $sql. "  
      . mysqli_error($conexion); 
  }  
  mysqli_close($conexion);

?>