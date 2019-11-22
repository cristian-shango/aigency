<?php
	// include "session.php";
	include "conexion.php";
	mysql_set_charset('utf8');
 //fetch.php
	$id = $_POST["id"];
	$sql = "SELECT * FROM empleados WHERE id = '$id'";
	$result = mysqli_query($conexion, $sql);
	$row = mysqli_fetch_array($result);
	// foreach ($row as $key => $value) {
	// 	// code...
	// 	echo "$key es $value <br>";
	// }
	// echo "<br>";
	$encode = json_encode($row);
	if (json_last_error() === JSON_ERROR_UTF8) {
		foreach ($row as $key => &$value) {
			$value = utf8_encode($value);
		}
		$encode = json_encode($row);
	}
	echo $encode;
 ?>
