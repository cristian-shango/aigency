<?php  
	include "conexion.php"; 
	mysql_set_charset('utf8');	
 //fetch.php  
	 if(isset($_POST["id"]))  
	 {  
	      $sql = "SELECT * FROM registros_confirmados r LEFT JOIN rubros_cotizaciones rc ON r.rubro_cotizacion = rc.id_rubros_cotizaciones LEFT JOIN categorias_cotizaciones cc ON r.categoria_cotizacion = cc.id_catcot LEFT JOIN condicion_cotizacion concot ON r.condicion_registro = concot.id_concot LEFT JOIN proveedores p ON r.id_proveedor = p.id_proveedor LEFT JOIN item_cotizacion ic ON r.item = ic.id_item_cotizacion WHERE id = '".$_POST["id"]."'";  
	      $result = mysqli_query($conexion, $sql);  
	      $row = mysqli_fetch_array($result);  
	      echo json_encode($row);
	 }  
 ?>