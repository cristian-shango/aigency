<?php

    if(!empty($_FILES['file']))
  {
    $path = "uploads/factura_proveedores/";
    $path = $path . "factura_proveedor_".( $_FILES['file']['name']);
    //$temp = explode(".", $_FILES["file"]["name"]);
    //$newfilename = "factura_proveedor_" . '.' . end($temp);

    if(move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
      echo "El archivo ".  "factura_proveedor_".( $_FILES['file']['name']). 
      " subi&oacute; correctamente.";
    } else{
        echo "En algo le erraste, prob&aacute; de nuevo.";
    }
  }
?>


