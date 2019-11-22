<?php  
	include "conexion.php"; 
	mysql_set_charset('utf8');	
 //fetch.php  
	 if(isset($_POST["id_catcot"]))  
	 {  
	      $sql = "SELECT categoria_cotizacion FROM registros WHERE categoria_cotizacion = '".$_POST["id_catcot"]."'";  
	      $result = mysqli_query($conexion, $sql);  
	      $row = mysqli_fetch_array($result);  
	      echo json_encode($row);
	 }  
 ?>