<<<<<<< HEAD
<?php
//	echo "datos_tabla_cotizaciones.php<br>";
	include "session.php";
	include "conexion.php";

	mysql_set_charset('utf8');
	date_default_timezone_set("America/Argentina/Buenos_Aires");

	// Variable para guardar la suma de todos los costos;
	$importe_final = 0;
	$datos_tabla = array('rubros' => array());
	$data_ids = array();
	$error = array();

	$id = $_GET['id'];
	//	echo "Pidiendo proyecto ".$_GET['id']."<br>";

	$sql_p = "SELECT costo_presupuestado FROM proyectos p INNER JOIN clientes c ON p.cliente = c.id_cliente INNER JOIN subtipo_cotizacion sc ON p.subtipo_cotizacion = sc.id_subtipo WHERE id = '".$_GET['id']."'";
	array_push($error, $sql_p);
	mysql_query("SET NAMES 'utf8'");
	if($result_p = mysqli_query($conexion, $sql_p)){
			if(mysqli_num_rows($result_p) > 0){
					while($row_p = mysqli_fetch_array($result_p)){
						$datos_tabla['presupuestado'] = floatval($row_p['costo_presupuestado']);
					}
			}
	}

		$sql = "SELECT nombre, razon_social, cuit, producto_proyecto, nombre_proyecto, nombre_subtipo FROM proyectos p INNER JOIN clientes c ON p.cliente = c.id_cliente LEFT JOIN subtipo_cotizacion sc ON p.subtipo_cotizacion = sc.id_subtipo WHERE id = '".$_GET['id']."'";
		array_push($error, $sql);
		mysql_query("SET NAMES 'utf8'");
		if($q_cl = mysqli_query($conexion, $sql)){
			if(mysqli_num_rows($q_cl) > 0){
				$row = mysqli_fetch_array($q_cl);
				$datos_tabla['cliente'] = array(
																					'nombre' 				=> $row['nombre'],
																					'razon_social' 	=> $row['razon_social'],
																					'cuit' 					=> $row['cuit'],
																					'producto'			=> $row['producto_proyecto'],
																					'proyecto'			=> $row['nombre_proyecto'],
																					'servicio'			=> $row['nombre_subtipo']
																				);
			}
		}


		$datos_tabla['orden'] = array('nombre_rubros', 'nombre_catcot', 'item', 'nombre_concot', 'detalle_registro', 'jornadas_registro', 'cantidad', 'importe_neto', 'importe_total');

    $datos_tabla['encabezados'] = array(
																					'nombre_rubros' 		=> 'Rubro',
																					'nombre_catcot'			=> 'Categoría',
																					'item' 					=> 'Item',
																					'nombre_concot' 		=> 'Condicion',
																					'detalle_registro' 		=> 'Detalle',
																					'jornadas_registro'		=> 'Jornadas',
																					'cantidad' 				=> 'Cantidad',
																					'importe_neto' 			=> 'Valor unitario',
																					'importe_total' 		=> 'Total'
																				);

    // Buscar y loopear sobre todas las categorias de cotizaciones para este id de proyecto.
		$sql = "SELECT id_rubros_cotizaciones, nombre_rubros FROM rubros_cotizaciones";
		array_push($error, $sql);
		mysql_query("SET NAMES 'utf8'");
		if($result = mysqli_query($conexion, $sql)){
			$cantidad = mysqli_num_rows($result);
		    if($cantidad > 0){

		        $i = 0;
		        while($row = mysqli_fetch_array($result)){
							if (isset($_GET['debug'])) echo $row['id_rubros_cotizaciones']."<br>";
                // El sub_total va a ir con cada id de rubro.
		            $sub_total = 0;

								$id_rubro = $row['id_rubros_cotizaciones'];
								//Para saber si imprimir o no esta tabla...
								$sql_hay_checks = "SELECT count(*) as checks FROM registros WHERE id_proyecto = '$id' AND rubro_cotizacion = '$id_rubro' AND registro_seleccionado = 1";
								$resultado_checks = mysqli_query($conexion, $sql_hay_checks);
								$total_checks = mysqli_fetch_assoc($resultado_checks);
                // Si ninguna de las cotizaciones de esta categoria esta aceptada, la categoria entera se ignora.
								if ($total_checks['checks']>0){
									$data_ids.array_push($row['nombre_rubros']);
									$datos_tabla['rubros'][$id_rubro] = array('cotizaciones'	=> array());


									$sql_registros = "SELECT * FROM registros r LEFT JOIN rubros_cotizaciones rc ON r.rubro_cotizacion = rc.id_rubros_cotizaciones LEFT JOIN categorias_cotizaciones cc ON r.categoria_cotizacion = cc.id_catcot LEFT JOIN item_cotizacion ic ON r.item = ic.id_item_cotizacion LEFT JOIN condicion_cotizacion concot ON r.condicion_registro = concot.id_concot WHERE id_proyecto = '$id' AND rubro_cotizacion = '$id_rubro' AND registro_seleccionado = 1 ORDER BY nombre_catcot ASC, nombre_item_cotizacion ASC, nombre_concot ASC";
									array_push($error, $sql_registros);
									//"SELECT * FROM registros r LEFT JOIN condicion_cotizacion c ON r.condicion_registro = c.id_concot WHERE categoria_cotizacion = $id_catcot";
  								mysql_query("SET NAMES 'utf8'");
  								if($result_registros = mysqli_query($conexion, $sql_registros)) {
  								    if(mysqli_num_rows($result_registros) > 0) {
													if (isset($_GET['debug'])) echo "Cotizando para $id_rubro<br>";
  											// Loop sobre todas las cotizaciones q corresponden a este rubro
  								        $i = 0;
  								        while($row_registros = mysqli_fetch_array($result_registros)){

  													if ($row_registros['registro_seleccionado'] != 0){
															if (isset($_GET['debug'])) echo "hay registros seleccionados<br>elem: ".$row_registros['nombre_catcot']."<br>";
  														$importe_final += $row_registros['importe_total'];
  														$sub_total += $row_registros['importe_total'];
															$esta_cot = array(
																								'nombre_rubros'			=> utf8_encode($row_registros['nombre_rubros']),
																								'nombre_catcot'			=> utf8_encode($row_registros['nombre_catcot']),
																								'item' 					=> $row_registros['nombre_item_cotizacion'] == '' ? $row_registros['item'] : utf8_encode($row_registros['nombre_item_cotizacion']),
																								'nombre_concot' 		=> utf8_encode($row_registros['nombre_concot']),
																								'detalle_registro' 	=> $row_registros['detalle_registro'],
																								'jornadas_registro' => $row_registros['jornadas_registro'],
																								'cantidad' 					=> intval($row_registros['cantidad']),
																								'importe_neto' 			=> floatval($row_registros['importe_neto']),
																								'importe_total' 		=> floatval($row_registros['importe_total'])
																							);
  														array_push( $datos_tabla['rubros'][$id_rubro]['cotizaciones'], $esta_cot);

											$sql = "SELECT item, nombre_item_cotizacion, detalle_registro, jornadas_registro, cantidad, importe_neto, importe_total, motivo_adicional, monto_adicional FROM adicionales ad LEFT JOIN registros r ON ad.id_cotizacion_adicional = r.id LEFT JOIN item_cotizacion ic ON r.item = ic.id_item_cotizacion WHERE id_proyecto_adicional = '".$_GET['id']."' AND rubro_cotizacion = '$id_rubro' AND registro_seleccionado = 1 AND aprobado_adicional = 1";
											array_push($error, $sql);
											//mysql_query("SET NAMES 'utf8'");
											$q_ad = mysqli_query($conexion, $sql);
											if (mysqli_num_rows($q_ad)>0){
												if (isset($_GET['debug'])) echo "Se encontraron adicionales<br>";
												$datos_tabla['rubros'][$id_rubro]['adicional'] = array();
												while($r_ad = mysqli_fetch_array($q_ad)){
													$importe_final += floatval($r_ad['monto_adicional']);
													$sub_total += floatval($r_ad['monto_adicional']);
													$adArray = array(
																			 'item'					=> $r_ad['nombre_item_cotizacion'] == '' ? $r_ad['item'] : utf8_encode($r_ad['nombre_item_cotizacion']),
																			 'detalle_registro'		=> $r_ad['detalle_registro'],
																			 'jornadas_registro' 	=> $r_ad['jornadas_registro'],
																			 'cantidad' 			=> $r_ad['cantidad'],
																			 'importe_neto'			=> floatval($r_ad['importe_neto']),
																			 'importe_total'		=> floatval($r_ad['importe_total']),
																			 'motivo' 				=> $r_ad['motivo_adicional'],
																			 'adicional' 			=> floatval($r_ad['monto_adicional'])
																		 );
						 							array_push($datos_tabla['rubros'][$id_rubro]['adicional'], $adArray);
												}

											}
											$datos_tabla['rubros'][$id_rubro]['sub_total'] = floatval($sub_total);

											mysqli_free_result($q_ad);

														}
								        }

								        mysqli_free_result($result_registros);
								    } else {
								        array_push($error, "<strong style='font-size: 1.2em;'>No hay cotizaciones cargadas.</strong>");
								    }
								} else {
										    array_push($error, "ERROR: Could not able to execute $sql_registros. " . mysqli_error($conexion));
								}


							} else {
								if (isset($_GET['debug'])) echo "No hay nada chequeado.<br>";
							} // Condicional: hay cotizaciones aceptadas.
		        } // Bucle: categorias de cotizaciones
						$datos_tabla['total'] = floatval($importe_final);
						$datos_tabla['fecha'] = date('d-m-Y_g:ia');
		        mysqli_free_result($result);
		    } else{
		        echo "No hay categorias cargadas.";
		    }
		} else{
		    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conexion);
		}

	array_push($datos_tabla, $error);
    echo json_encode($datos_tabla);
	//echo json_encode($error);

?>
=======
<?php
//	echo "datos_tabla_cotizaciones.php<br>";
	include "session.php";
	include "conexion.php";

	mysql_set_charset('utf8');
	date_default_timezone_set("America/Argentina/Buenos_Aires");

	// Variable para guardar la suma de todos los costos;
	$importe_final = 0;
	$datos_tabla = array('rubros' => array());
	$data_ids = array();
	$error = array();

	$id = $_GET['id'];
	//	echo "Pidiendo proyecto ".$_GET['id']."<br>";

	$sql_p = "SELECT costo_presupuestado FROM proyectos p INNER JOIN clientes c ON p.cliente = c.id_cliente INNER JOIN subtipo_cotizacion sc ON p.subtipo_cotizacion = sc.id_subtipo WHERE id = '".$_GET['id']."'";
	array_push($error, $sql_p);
	mysql_query("SET NAMES 'utf8'");
	if($result_p = mysqli_query($conexion, $sql_p)){
			if(mysqli_num_rows($result_p) > 0){
					while($row_p = mysqli_fetch_array($result_p)){
						$datos_tabla['presupuestado'] = floatval($row_p['costo_presupuestado']);
					}
			}
	}

		$sql = "SELECT nombre, razon_social, cuit, producto_proyecto, nombre_proyecto, nombre_subtipo FROM proyectos p INNER JOIN clientes c ON p.cliente = c.id_cliente LEFT JOIN subtipo_cotizacion sc ON p.subtipo_cotizacion = sc.id_subtipo WHERE id = '".$_GET['id']."'";
		array_push($error, $sql);
		mysql_query("SET NAMES 'utf8'");
		if($q_cl = mysqli_query($conexion, $sql)){
			if(mysqli_num_rows($q_cl) > 0){
				$row = mysqli_fetch_array($q_cl);
				$datos_tabla['cliente'] = array(
																					'nombre' 				=> $row['nombre'],
																					'razon_social' 	=> $row['razon_social'],
																					'cuit' 					=> $row['cuit'],
																					'producto'			=> $row['producto_proyecto'],
																					'proyecto'			=> $row['nombre_proyecto'],
																					'servicio'			=> $row['nombre_subtipo']
																				);
			}
		}


		$datos_tabla['orden'] = array('nombre_rubros', 'nombre_catcot', 'item', 'nombre_concot', 'detalle_registro', 'jornadas_registro', 'cantidad', 'importe_neto', 'importe_total');

    $datos_tabla['encabezados'] = array(
																					'nombre_rubros' 		=> 'Rubro',
																					'nombre_catcot'			=> 'Categoría',
																					'item' 					=> 'Item',
																					'nombre_concot' 		=> 'Condicion',
																					'detalle_registro' 		=> 'Detalle',
																					'jornadas_registro'		=> 'Jornadas',
																					'cantidad' 				=> 'Cantidad',
																					'importe_neto' 			=> 'Valor unitario',
																					'importe_total' 		=> 'Total'
																				);

    // Buscar y loopear sobre todas las categorias de cotizaciones para este id de proyecto.
		$sql = "SELECT id_rubros_cotizaciones, nombre_rubros FROM rubros_cotizaciones";
		array_push($error, $sql);
		mysql_query("SET NAMES 'utf8'");
		if($result = mysqli_query($conexion, $sql)){
			$cantidad = mysqli_num_rows($result);
		    if($cantidad > 0){

		        $i = 0;
		        while($row = mysqli_fetch_array($result)){
							if (isset($_GET['debug'])) echo $row['id_rubros_cotizaciones']."<br>";
                // El sub_total va a ir con cada id de rubro.
		            $sub_total = 0;

								$id_rubro = $row['id_rubros_cotizaciones'];
								//Para saber si imprimir o no esta tabla...
								$sql_hay_checks = "SELECT count(*) as checks FROM registros WHERE id_proyecto = '$id' AND rubro_cotizacion = '$id_rubro' AND registro_seleccionado = 1";
								$resultado_checks = mysqli_query($conexion, $sql_hay_checks);
								$total_checks = mysqli_fetch_assoc($resultado_checks);
                // Si ninguna de las cotizaciones de esta categoria esta aceptada, la categoria entera se ignora.
								if ($total_checks['checks']>0){
									$data_ids.array_push($row['nombre_rubros']);
									$datos_tabla['rubros'][$id_rubro] = array('cotizaciones'	=> array());


									$sql_registros = "SELECT * FROM registros r LEFT JOIN rubros_cotizaciones rc ON r.rubro_cotizacion = rc.id_rubros_cotizaciones LEFT JOIN categorias_cotizaciones cc ON r.categoria_cotizacion = cc.id_catcot LEFT JOIN item_cotizacion ic ON r.item = ic.id_item_cotizacion LEFT JOIN condicion_cotizacion concot ON r.condicion_registro = concot.id_concot WHERE id_proyecto = '$id' AND rubro_cotizacion = '$id_rubro' AND registro_seleccionado = 1 ORDER BY nombre_catcot ASC, nombre_item_cotizacion ASC, nombre_concot ASC";
									array_push($error, $sql_registros);
									//"SELECT * FROM registros r LEFT JOIN condicion_cotizacion c ON r.condicion_registro = c.id_concot WHERE categoria_cotizacion = $id_catcot";
  								mysql_query("SET NAMES 'utf8'");
  								if($result_registros = mysqli_query($conexion, $sql_registros)) {
  								    if(mysqli_num_rows($result_registros) > 0) {
													if (isset($_GET['debug'])) echo "Cotizando para $id_rubro<br>";
  											// Loop sobre todas las cotizaciones q corresponden a este rubro
  								        $i = 0;
  								        while($row_registros = mysqli_fetch_array($result_registros)){

  													if ($row_registros['registro_seleccionado'] != 0){
															if (isset($_GET['debug'])) echo "hay registros seleccionados<br>elem: ".$row_registros['nombre_catcot']."<br>";
  														$importe_final += $row_registros['importe_total'];
  														$sub_total += $row_registros['importe_total'];
															$esta_cot = array(
																								'nombre_rubros'			=> utf8_encode($row_registros['nombre_rubros']),
																								'nombre_catcot'			=> utf8_encode($row_registros['nombre_catcot']),
																								'item' 					=> $row_registros['nombre_item_cotizacion'] == '' ? $row_registros['item'] : utf8_encode($row_registros['nombre_item_cotizacion']),
																								'nombre_concot' 		=> utf8_encode($row_registros['nombre_concot']),
																								'detalle_registro' 	=> $row_registros['detalle_registro'],
																								'jornadas_registro' => $row_registros['jornadas_registro'],
																								'cantidad' 					=> intval($row_registros['cantidad']),
																								'importe_neto' 			=> floatval($row_registros['importe_neto']),
																								'importe_total' 		=> floatval($row_registros['importe_total'])
																							);
  														array_push( $datos_tabla['rubros'][$id_rubro]['cotizaciones'], $esta_cot);

											$sql = "SELECT item, nombre_item_cotizacion, detalle_registro, jornadas_registro, cantidad, importe_neto, importe_total, motivo_adicional, monto_adicional FROM adicionales ad LEFT JOIN registros r ON ad.id_cotizacion_adicional = r.id LEFT JOIN item_cotizacion ic ON r.item = ic.id_item_cotizacion WHERE id_proyecto_adicional = '".$_GET['id']."' AND rubro_cotizacion = '$id_rubro' AND registro_seleccionado = 1 AND aprobado_adicional = 1";
											array_push($error, $sql);
											//mysql_query("SET NAMES 'utf8'");
											$q_ad = mysqli_query($conexion, $sql);
											if (mysqli_num_rows($q_ad)>0){
												if (isset($_GET['debug'])) echo "Se encontraron adicionales<br>";
												$datos_tabla['rubros'][$id_rubro]['adicional'] = array();
												while($r_ad = mysqli_fetch_array($q_ad)){
													$importe_final += floatval($r_ad['monto_adicional']);
													$sub_total += floatval($r_ad['monto_adicional']);
													$adArray = array(
																			 'item'					=> $r_ad['nombre_item_cotizacion'] == '' ? $r_ad['item'] : utf8_encode($r_ad['nombre_item_cotizacion']),
																			 'detalle_registro'		=> $r_ad['detalle_registro'],
																			 'jornadas_registro' 	=> $r_ad['jornadas_registro'],
																			 'cantidad' 			=> $r_ad['cantidad'],
																			 'importe_neto'			=> floatval($r_ad['importe_neto']),
																			 'importe_total'		=> floatval($r_ad['importe_total']),
																			 'motivo' 				=> $r_ad['motivo_adicional'],
																			 'adicional' 			=> floatval($r_ad['monto_adicional'])
																		 );
						 							array_push($datos_tabla['rubros'][$id_rubro]['adicional'], $adArray);
												}

											}
											$datos_tabla['rubros'][$id_rubro]['sub_total'] = floatval($sub_total);

											mysqli_free_result($q_ad);

														}
								        }

								        mysqli_free_result($result_registros);
								    } else {
								        array_push($error, "<strong style='font-size: 1.2em;'>No hay cotizaciones cargadas.</strong>");
								    }
								} else {
										    array_push($error, "ERROR: Could not able to execute $sql_registros. " . mysqli_error($conexion));
								}


							} else {
								if (isset($_GET['debug'])) echo "No hay nada chequeado.<br>";
							} // Condicional: hay cotizaciones aceptadas.
		        } // Bucle: categorias de cotizaciones
						$datos_tabla['total'] = floatval($importe_final);
						$datos_tabla['fecha'] = date('d-m-Y_g:ia');
		        mysqli_free_result($result);
		    } else{
		        echo "No hay categorias cargadas.";
		    }
		} else{
		    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conexion);
		}

	array_push($datos_tabla, $error);
    echo json_encode($datos_tabla);
	//echo json_encode($error);

?>
>>>>>>> 00059c6bec1b069e4d59dcacc16293f16d9945c3
