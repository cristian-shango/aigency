<?php
	include "conexion.php";
	mysql_set_charset('utf8');
 //fetch.php
	 if(isset($_POST["id"]))
	 {
	      $sql = "SELECT * FROM bancos WHERE id_banco = '".$_POST["id"]."'";  
	      $result = mysqli_query($conexion, $sql);
	      $row = mysqli_fetch_array($result);
	      echo json_encode($row);
	 }
 ?>
