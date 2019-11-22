<?php  
	include "conexion.php"; 
	mysql_set_charset('utf8');	
 //fetch.php  
	 if(isset($_POST["registro"]))  
	 {  
	      $sql = "SELECT * FROM mensajes_cotizaciones WHERE id_cotizacion = '".$_POST["registro"]."'";  
	      $result = mysqli_query($conexion, $sql);  
	      $row = mysqli_fetch_array($result);  
	      echo json_encode($row);
	 }  
 ?>