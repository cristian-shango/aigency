<?php  
	include "conexion.php"; 
	mysql_set_charset('utf8');	
 //fetch.php  
	$id = $_POST["id"];

	 if(isset($_POST["id"]))  
	 {  
	      $sql = "SELECT * FROM proyectos WHERE id = '$id'";
	      $result = mysqli_query($conexion, $sql);  
	      $row = mysqli_fetch_array($result);  
	      echo json_encode($row);
	 }  
 ?>