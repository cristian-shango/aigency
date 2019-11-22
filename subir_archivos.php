<?php
  
function factura_proveedor($archivo){
    $nombre = $archivo["factura_proveedor_"]["name"];
    $ext = pathinfo($nombre,PATHINFO_EXTENSION);
    $archivoOrigen = $archivo["factura_proveedor_"]["tmp_name"];
    $archivoDestino = dirname(__DIR__);
    $archivoDestino = $archivoDestino."/uploads/factura_proveedores/";
    $archivo = uniqid();
    $archivoDestino = $archivoDestino.$archivo;
    $archivoDestino = $archivoDestino.".".$ext;
    move_uploaded_file($archivoOrigen,$archivoDestino);
    $archivo = $archivo.".".$ext;
    return $archivo;
}

?>  