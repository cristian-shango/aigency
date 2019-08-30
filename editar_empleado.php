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

  $sql = "UPDATE empleados SET apellido = '$apellido', nombre = '$nombre', estadoCivil = '$estadoCivil', hijos = '$hijos', direccion = '$direccion', nacimiento = '$nacimiento', telefono = '$telefono', celular = '$celular', mail = '$mail', cuil = '$cuil', centroCosto = '$centroCosto', convenioColectivo = '$convenioColectivo', remuneracionBruta = '$remuneracionBruta', jornada = '$jornada', banco = '$banco', cbu = '$cbu', obraSocial = '$obraSocial', ingreso = '$ingreso' WHERE id = '$id'";

  if(mysqli_query($conexion, $sql)){
    echo "Registro creado.";
  } else {
      echo "ERROR: Could not able to execute $sql. "
      . mysqli_error($conexion);
  }
  mysqli_close($conexion);

?>
