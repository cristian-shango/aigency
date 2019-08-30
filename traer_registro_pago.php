<?php  
	include "conexion.php"; 
	mysql_set_charset('utf8');	
 //fetch.php  
	 if(isset($_POST["id"]))  
	 {  
	      $sql = "SELECT * FROM registros_confirmados rc LEFT JOIN proveedores p ON rc.id_proveedor = p.id_proveedor LEFT JOIN item_cotizacion ic ON rc.item = ic.id_item_cotizacion WHERE id = '".$_POST["id"]."'";  
	      $result = mysqli_query($conexion, $sql);  
	      $row = mysqli_fetch_array($result);  
	      echo json_encode($row);
	 }  
 ?>