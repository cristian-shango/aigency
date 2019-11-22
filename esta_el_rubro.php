<?php
	include "conexion.php";
	mysql_set_charset('utf8');
 //fetch.php
	 if(isset($_GET["rubro"]))
	 {
		 		// La base de datos no tiene codificación UTF-8
		 		$rubro = utf8_decode($_GET["rubro"]);

	      $sql = "SELECT id_rubros_cotizaciones FROM rubros_cotizaciones WHERE nombre_rubros = '$rubro'";
	      if ($result = mysqli_query($conexion, $sql)){
					if (mysqli_num_rows($result)>0){
			      $row = mysqli_fetch_array($result);
			      echo json_encode($row);
					} else {
						// Crear categoria NUEVA
					  $sql2 = "INSERT INTO rubros_cotizaciones (nombre_rubros) VALUES ('$rubro')";

					  if(mysqli_query($conexion, $sql2)){
							// Ahora recuperar id de la cagtegoria recien creada
				      $sql3 = "SELECT id_rubros_cotizaciones FROM rubros_cotizaciones WHERE nombre_rubros = '$rubro'";
				      if ($result = mysqli_query($conexion, $sql)){
								if (mysqli_num_rows($result)>0){
						      $row = mysqli_fetch_array($result);
						      echo json_encode($row);
								} else {
									echo "ERROR: Falló el recupero del id después de la creación del rubro.";
								}
							} else {
								echo "ERROR: Fallo de conexión al intentar recuperar el id de rubro.";
							}
					  } else {
					      echo "ERROR: Could not able to execute $sql2. "
					      . mysqli_error($conexion);
					  }
					}
				} else {
					echo "No se pudo conectar.";
				}
	 }
	   mysqli_close($conexion);
 ?>
