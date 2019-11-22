<?php  
	include "conexion.php"; 
	mysql_set_charset('utf8');	
 //fetch.php  
	$id = $_POST["id"];
 	$estado = $_POST["estado"];

	 if(isset($_POST["id"]))  
	 {  
	      $sql = "SELECT * FROM adicionales WHERE id_proyecto_adicional = '$id' AND aprobado_adicional = '0'";  
	      $result = mysqli_query($conexion, $sql);  
	      $row = mysqli_fetch_array($result);  
	      echo json_encode($row);
	 }  
 ?>