<?php

    if(!empty($_FILES['file']))
  {
    $path = "uploads/imagenes_cotizaciones/";
    $path = $path . "imagen_cotizacion_".( $_FILES['file']['name']);
    //$temp = explode(".", $_FILES["file"]["name"]);
    //$newfilename = "factura_proveedor_" . '.' . end($temp);

    if(move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
      echo "El archivo ".  "imagen_cotizacion_".( $_FILES['file']['name']). 
      " subi&oacute; correctamente.";
    } else{
        echo "En algo le erraste, prob&aacute; de nuevo.";
    }
  }
?>


