<?php  
	include "conexion.php"; 
	mysql_set_charset('utf8');	
 //fetch.php  
	 if(isset($_POST["id"]))  
	 {  
	      $sql = "SELECT * FROM clientes WHERE id_cliente = '".$_POST["id"]."'";  
	      $result = mysqli_query($conexion, $sql);  
	      $row = mysqli_fetch_array($result);  
	      echo json_encode($row);
	 }  
 ?>