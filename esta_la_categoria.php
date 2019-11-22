<?php
	// Esto le dice a PHP que usaremos cadenas UTF-8 hasta el final
	mb_internal_encoding('UTF-8');

	// Esto le dice a PHP que generaremos cadenas UTF-8
	mb_http_output('UTF-8');

	include "conexion.php";
	mysql_set_charset('utf8');
 //fetch.php
	 if(isset($_GET["categoria"]))
	 {
		 		// La base de datos no tiene codificación UTF-8
		 		$categoria = utf8_decode($_GET["categoria"]);

	      $sql = "SELECT id_catcot FROM categorias_cotizaciones WHERE nombre_catcot = '$categoria'";
	      if ($result = mysqli_query($conexion, $sql)){
					if (mysqli_num_rows($result)>0){
			      $row = mysqli_fetch_array($result);
			      echo json_encode($row);
					} else {
						// Crear categoria NUEVA
					  $sql2 = "INSERT INTO categorias_cotizaciones (nombre_catcot) VALUES ('$categoria')";

					  if(mysqli_query($conexion, $sql2)){
							// Ahora recuperar id de la cagtegoria recien creada
				      $sql3 = "SELECT id_catcot FROM categorias_cotizaciones WHERE nombre_catcot = '$categoria'";
				      if ($result = mysqli_query($conexion, $sql)){
								if (mysqli_num_rows($result)>0){
						      $row = mysqli_fetch_array($result);
						      echo json_encode($row);
								} else {
									echo "ERROR: Falló el recupero del id después de la creación de la categoría.";
								}
							} else {
								echo "ERROR: Fallo de conexión al intentar recuperar la id de categoría.";
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
