<?php  
	include "conexion.php"; 
	mysql_set_charset('utf8');	
 //fetch.php  
	 if(isset($_POST["id_registro"]))  
	 {  
	      $sql = "SELECT * FROM registros r LEFT JOIN item_cotizacion ic ON r.item = ic.id_item_cotizacion WHERE id = '".$_POST["id_registro"]."'";  
	      $result = mysqli_query($conexion, $sql);  
	      $row = mysqli_fetch_array($result);  
	      echo json_encode($row);
	 }  
 ?>