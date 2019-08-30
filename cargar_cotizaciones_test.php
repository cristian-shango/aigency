<?php
	include "session.php";
	include "conexion.php";
	mysql_set_charset('utf8');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Viva Admin | Cotizaciones</title>
	  	<meta charset="utf-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1">

	  	<link rel="stylesheet" href="css/normalize.css">
	  	<link rel="stylesheet" href="css/jquery-ui.css">
	  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	  	<link rel="stylesheet" href="css/style.css">
	  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	  	<link rel="stylesheet" href="css/bootstrap-table-expandable.css">

	  	<script src="js/jquery.min.js"></script>
	  	<script src="js/popper.min.js"></script>
	  	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" crossorigin="anonymous"></script>
	  	<script src="js/bootstrap-table-expandable.js"></script>
			<script>
					function aExcel() {
						window.open("cargar_cotizaciones_a_excel.php?id=<?php echo $_GET['id']; ?>");
					}
					function aPDF() {
						window.open("cargar_cotizaciones_a_pdf.php?id=<?php echo $_GET['id']; ?>");
					}
			</script>
	</head>
	<body>
		<button onclick="aPDF()">DESCARGAR PDF</button>
		<button onclick="aExcel()">DESCARGAR EXCEL</button>
		<header>
			<div id="linea"></div>
		</header>
		<div class="container-flex">
			<section id="primero">
				<div class="row">
					<div class="col-md-6 text-left">
						<h3 class="vivashango">VIVA ADMIN</h3>
					</div>
					<div class="col-md-6 text-right">
						<h3 style="font-size: 3em;">Cotizaciones</h3>
					</div>
				</div>
				<div class="row">
					<div class="table-responsive">
						<table class="table table-expandable table-sticky-header" id="table_format">
							<thead>
								<tr>
									<th scope="col">Categoría / Rubro</th>
									<th scope="col">Detalle</th>
									<th scope="col">Costo / Promedio</th>
									<th scope="col">Cotizaciones</th>
									<th scope="col">Acciones</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$sql = "SELECT * FROM categorias_cotizaciones WHERE id_proyecto_catcot = '".$_GET['id']."'";
									mysql_query("SET NAMES 'utf8'");
									if($result = mysqli_query($conexion, $sql)){
										$cantidad = mysqli_num_rows($result);
									    if($cantidad > 0){
									        $i = 0;
									        $promedio = 0;
									        while($row = mysqli_fetch_array($result)){
									        	$id_catcot = $row['id_catcot'];
									        	$sql_contar_registros = "SELECT count(*) as total from registros WHERE categoria_cotizacion = $id_catcot";
												$resultado_contar_registros = mysqli_query($conexion, $sql_contar_registros);
												$datos_contar_registros=mysqli_fetch_assoc($resultado_contar_registros);

												$sql_promedio = "SELECT SUM(importe_total) AS suma FROM registros WHERE categoria_cotizacion = $id_catcot AND registro_seleccionado = 1";
												$resultado_promedio = mysqli_query($conexion, $sql_promedio);
												$datos_promedio=mysqli_fetch_assoc($resultado_promedio);
												$datos_promedio["suma"] = round($datos_promedio["suma"], 2);

												if($datos_promedio["suma"] == 0){
													$sql_promedio0 = "SELECT AVG(importe_total) AS suma FROM registros WHERE categoria_cotizacion = $id_catcot AND registro_seleccionado = 0";
													$resultado_promedio0 = mysqli_query($conexion, $sql_promedio0);
													$datos_promedio=mysqli_fetch_assoc($resultado_promedio0);
													$datos_promedio["suma"] = round($datos_promedio["suma"], 2);
												}
								?>
										<tr class="mostrar_registro" data-id="<?php echo ($row['id_catcot']);?>">
											<td scope="row" style="width: 10%"><strong><?php echo ($row['nombre_catcot']);?></strong></td>
											<td style="text-align: left; width: 70%;"><strong><?php echo ($row['detalle_catcot']);?></strong></td>
											<td style="width: 10%"><strong>$ <span id="calculo_costo_promedio"><?php echo $datos_promedio["suma"] ?></span></strong></td>
											<td style="width: 5%"><span class="badge badge-danger badge-pill" id="cantidad_registros" data-id="<?php echo ($row['id_catcot']);?>"><?php echo ($datos_contar_registros['total']);?></span></td>
											<td style="width: 5%"><i class="far fa-trash-alt eliminar_categoria" data-toggle="modal" data-id="<?php echo ($row['id_catcot']);?>" data-valor="<?php echo ($row['importe_total']);?>"></i></td>
										</tr>
										<tr>
											<td colspan="5">
												<table class="table" id="table_format">
													<tbody>
														<tr>
															<th scope="col" class="gray">#</th>
															<th scope="col" class="gray">Condición</th>
															<th scope="col" class="gray">Item</th>
															<th scope="col" class="gray">Detalle</th>
															<th scope="col" class="gray">Cantidad</th>
															<th scope="col" class="gray">Valor unitario</th>
															<th scope="col" class="gray">Total</th>
															<th scope="col" class="gray">Pago a</th>
															<th scope="col" class="gray">Acciones</th>
														</tr>
														<?php
															$id_catcot = $row['id_catcot'];
															$sql_registros = "SELECT * FROM registros r LEFT JOIN condicion_cotizacion c ON r.condicion_registro = c.id_concot WHERE categoria_cotizacion = $id_catcot";
															mysql_query("SET NAMES 'utf8'");
															if($result_registros = mysqli_query($conexion, $sql_registros)){
															    if(mysqli_num_rows($result_registros) > 0){
															        $i = 0;
															        $suma_valor = 0;
															        while($row_registros = mysqli_fetch_array($result_registros)){
																		/*$suma_valor = $suma_valor + floatval($row_registros['importe_total']);
																		echo ($suma_valor);*/
														?>

																		<?php
																			if ($row_registros['registro_seleccionado'] == 0){
																		?>
																				<tr>
																				<td>
																				<input class="form-check-input position-static mostrar_checkbox checkbox" type="checkbox" name="radio_cotizacion_<?php echo ($row['id_catcot']);?>" id="radio_cotizacion" value="<?php echo ($row_registros['importe_total']);?>" data-registro="<?php echo ($row_registros['id']);?>" data-pago="<?php echo ($row_registros['tiempo_pago']);?>"></td>
																		<?php
																			} else {
																		?>
																				<tr class="selected">
																				<td>
																				<input class="form-check-input position-static mostrar_checkbox checkbox" type="checkbox" name="radio_cotizacion_<?php echo ($row['id_catcot']);?>" id="radio_cotizacion" value="<?php echo ($row_registros['importe_total']);?>" data-registro="<?php echo ($row_registros['id']);?>" data-pago="<?php echo ($row_registros['tiempo_pago']);?>" checked></td>
																		<?php
																			}
																		?>
																	<td scope="row"><?php echo (utf8_encode($row_registros['nombre_concot']));?></td>
																	<td scope="row"><?php echo (($row_registros['item']));?></td>
																	<td><?php echo (($row_registros['detalle_registro']));?></td>
																	<td><?php echo ($row_registros['cantidad']);?></td>
																	<td>$ <span class="valor_precio_cliente"><?php echo ($row_registros['importe_neto']);?></span></td>
																	<td>$ <span class="valor_promedio" data-registro="<?php echo ($row['id_catcot']);?>" data-valor="<?php echo ($row_registros['importe_total']);?>"><?php echo ($row_registros['importe_total']);?></span></td>
																	<td>
																		<?php
																			if($row_registros['tiempo_pago'] == 30){
																		?>
																			<select class="tiempo_pago_cambio" data-registro="<?php echo ($row_registros['id']);?>">
																				<option value="30" selected="selected">30 días</option>
																				<option value="60">60 días</option>
																				<option value="90">90 días</option>
																			</select>
																		<?php
																			}
																			if($row_registros['tiempo_pago'] == 60){
																		?>
																			<select class="tiempo_pago_cambio" data-registro="<?php echo ($row_registros['id']);?>">
																				<option value="30">30 días</option>
																				<option value="60" selected="selected">60 días</option>
																				<option value="90">90 días</option>
																			</select>
																		<?php
																			}
																			if($row_registros['tiempo_pago'] == 90){
																		?>
																			<select class="tiempo_pago_cambio" data-registro="<?php echo ($row_registros['id']);?>">
																				<option value="30">30 días</option>
																				<option value="60">60 días</option>
																				<option value="90" selected="selected">90 días</option>
																			</select>
																		<?php
																			}
																		?>
																	</td>
																	<td><i class="fas fa-edit editar_cotizacion" data-toggle="modal" data-id="<?php echo ($row_registros['id']);?>" data-check="<?php echo ($row_registros['registro_seleccionado']);?>"></i>&nbsp;&nbsp;<i class="far fa-trash-alt eliminar_cotizacion" data-toggle="modal" data-id="<?php echo ($row_registros['id']);?>" data-total="<?php echo ($row_registros['importe_total']);?>" data-check="<?php echo ($row_registros['registro_seleccionado']);?>"></i></td>
																	<!-- <td style="font-weight: bold;"><?php echo ($row['estado']);?></td> -->
																</tr>
														<?php
															        }

															        mysqli_free_result($result_registros);
															    } else{
															        echo "<strong style='font-size: 1.2em;'>No hay cotizaciones cargadas.</strong>";
															    }
															} else{
																	    echo "ERROR: Could not able to execute $sql_registros. " . mysqli_error($conexion);
																}
														?>
														<tr id="tr_mostrar">
															<td colspan="8" height="20px;">
																<div class="modal_cargar_cotizacion" data-id="<?php echo ($row['id_catcot']);?>" data-proyecto="<?php echo ($row['id_proyecto_catcot']);?>">
																	<h5><i class="far fa-plus-square"></i> Cargar cotización nueva</h5>
																</div>
															</td>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>
								<?php
									        }

									        mysqli_free_result($result);
									    } else{
									        echo "No hay categorias cargadas.";
									    }
									} else{
									    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conexion);
									}
								?>

								<form id="formulario_cotizacion">
									<tr id="tr_mostrar">
										<td scope="row" style="width: 20%">
											<input type="text" id="ingreso_categoria" class="form-control text-center"  aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Categoría / Rubro">
										</td>
										<td style="width: 70%">
											<input type="text" id="ingreso_detalle" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Detalle">
										</td>
										<td></td>
										<td style="width: 10%">
											<i class="far fa-plus-square" id="guardar_categoria"></i>
										</td>
									</tr>
								</form>
							</tbody>
						</table>
						<table class="table" id="table_adicionales"></table>
					</div>
				</div>
			</section>
			<section id="bloque_bottom">
				<div class="row">
					<div class="col-md-12 border-top"></div>
					<?php
						//echo $_GET['id'];

						$sql = "SELECT * FROM proyectos p INNER JOIN clientes c ON p.cliente = c.id_cliente INNER JOIN subtipo_cotizacion sc ON p.subtipo_cotizacion = sc.id_subtipo WHERE id = '".$_GET['id']."'";
						mysql_query("SET NAMES 'utf8'");
						if($result = mysqli_query($conexion, $sql)){
						    if(mysqli_num_rows($result) > 0){
						        $i = 0;
						        while($row = mysqli_fetch_array($result)){
					?>
								<div class="col-md-2 text-center">
									<div class="form-group">
									    <h4 style="font-size: 1.1em;">Cliente: <span id="ingreso_cliente" style="font-weight: lighter;"><?php echo ($row['nombre']);?></span></h4>
									</div>
								</div>
								<div class="col-md-2 text-center">
									<div class="form-group">
									    <h4 style="font-size: 1.1em;">Producto: <span id="ingreso_producto" style="font-weight: lighter;"><?php echo ($row['producto_proyecto']);?></span></h4>
									</div>
								</div>
								<div class="col-md-3 text-center">
									<div class="form-group">
									    <h4 style="font-size: 1.1em;">Subtipo de Servicio: <span id="ingreso_proyecto" style="font-weight: lighter;"><?php echo utf8_encode($row['nombre_subtipo']);?></span></h4>
									</div>
								</div>
								<div class="col-md-3 text-center">
									<div class="form-group">
									    <h4 style="font-size: 1.1em;">Proyecto: <span id="ingreso_proyecto" style="font-weight: lighter;"><?php echo ($row['nombre_proyecto']);?></span></h4>
									</div>
								</div>
								<div class="col-md-2 text-center">
									<div class="form-group">
									    <h4 style="font-size: 1.1em;">Estado: <span id="tipo_estado" style="font-weight: lighter;"><?php echo ($row['estado']);?></span></h4>
									</div>
								</div>
								<div class="col-md-12 border-top"></div>
								<div class="col-md-12 text-left">
									<div class="form-group">
									    <h4 style="font-size: 1.1em;">Detalle del proyecto:<br><span style="font-weight: lighter;"><?php echo ($row['detalle']);?></span></h4>
									</div>
								</div>
								<div class="col-md-12 border-top"></div>
								<div class="col-md-3" id="mostrar_costo_presupuestado">
									<div class="form-group">
									    <h4>Costo Objetivo</h4>
									    <div class="input-group">
											<div class="input-group-prepend">
												<div class="input-group-text">$</div>
											</div>
											<input type="text" class="form-control form-control-lg" id="costo_presupuesto_total" readonly value="<?php echo ($row['costo_presupuestado']);?>">
										</div>
									</div>
								</div>
								<div class="col-md-3" id="mostrar_saldo">
									<div class="form-group">
									    <h4>Costo Real</h4>
									    <div class="input-group">
											<div class="input-group-prepend">
												<div class="input-group-text">$</div>
											</div>
											<input type="text" class="form-control form-control-lg" id="consumido_total" readonly value="<?php echo ($row['consumido']);?>">
										</div>
									</div>
								</div>
								<div class="col-md-3" id="mostrar_saldo">
									<div class="form-group">
									    <h4>Diferencia</h4>
									    <div class="input-group">
											<div class="input-group-prepend">
												<div class="input-group-text">$</div>
											</div>
											<input type="text" class="form-control form-control-lg" id="saldo_total" readonly value="<?php echo ($row['saldo']);?>">
										</div>
									</div>
								</div>
								<div class="col-md-3" id="mostrar_saldo">
									<div class="form-group">
									    <h4>Adicionales</h4>
									    <div class="input-group">
											<div class="input-group-prepend">
												<div class="input-group-text">$</div>
											</div>
											<input type="text" class="form-control form-control-lg" id="adicionales_total" readonly value="0.00">
										</div>
									</div>
								</div>

								<!-- Inputs que muestran los pagos a 30, 60 y 90 días. -->

								<?php
									//echo $_GET['id'];

									$sql_dias = "SELECT * FROM registros WHERE registro_seleccionado = 1 AND id_proyecto = '".$_GET['id']."'";
									mysql_query("SET NAMES 'utf8'");
									if($result_dias = mysqli_query($conexion, $sql_dias)){
									    if(mysqli_num_rows($result_dias)){
									        $i = 0;
									        $valor30dias = 0;
									        $valor60dias = 0;
									        $valor90dias = 0;
									        $importe_total30 = 0;
									        $importe_total60 = 0;
									        $importe_total90 = 0;
									        while($row_dias = mysqli_fetch_array($result_dias)){
									        	if($row_dias['tiempo_pago'] <= 30 AND $row_dias['tiempo_pago'] >= 0) {
									        		$importe_total30 = floatval($row_dias['importe_total']);
									        		$valor30dias = $valor30dias + $importe_total30;
									        	}

									        	if ($row_dias['tiempo_pago'] <= 89 AND $row_dias['tiempo_pago'] >= 31) {
									        		$importe_total60 = floatval($row_dias['importe_total']);
									        		$valor60dias = $valor60dias + $importe_total60;
									        	}

									        	if ($row_dias['tiempo_pago'] >= 90) {
									        		$importe_total90 = floatval($row_dias['importe_total']);
									        		$valor90dias = $valor90dias + $importe_total90;
									        	}
						        			}
								        	mysqli_free_result($result_dias);
								    	} else{

									    }
									} else{

									}
								?>

								<div class="col-md-4" id="mostrar_costo_presupuestado">
									<div class="form-group">
									    <h4>Pago a 30 días</h4>
									    <div class="input-group">
											<div class="input-group-prepend">
												<div class="input-group-text">$</div>
											</div>
											<input type="text" class="form-control form-control-lg" id="pago30" readonly value="<?php echo ($valor30dias);?>">
										</div>
									</div>
								</div>

								<div class="col-md-4" id="mostrar_costo_presupuestado">
									<div class="form-group">
									    <h4>Pago a 60 días</h4>
									    <div class="input-group">
											<div class="input-group-prepend">
												<div class="input-group-text">$</div>
											</div>
											<input type="text" class="form-control form-control-lg" id="pago60" readonly value="<?php echo ($valor60dias);?>">
										</div>
									</div>
								</div>

								<div class="col-md-4" id="mostrar_costo_presupuestado">
									<div class="form-group">
									    <h4>Pago a 90 días</h4>
									    <div class="input-group">
											<div class="input-group-prepend">
												<div class="input-group-text">$</div>
											</div>
											<input type="text" class="form-control form-control-lg" id="pago90" readonly value="<?php echo ($valor90dias);?>">
										</div>
									</div>
								</div>

								<span id="ingreso_id" style="display: none;"><?php echo ($row['id']);?></span>
					<?php
						        }

						        mysqli_free_result($result);
						    } else{
						        echo "No hay datos para mostrar.";
						    }
						} else{
						    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conexion);
						}
					?>

					<div class="col-md-2">
				    	<button class="btn btn-block btn btn-primary clickable cambio_estado_mensaje" data-estado="COTIZANDO" style="cursor: pointer;">COTIZANDO</button>
					</div>
					<div class="col-md-2">
				    	<button class="btn btn-block btn btn-success clickable cambio_estado_mensaje" data-estado="ENTREGADO" style="cursor: pointer;">ENTREGADO</button>
					</div>
					<div class="col-md-2">
				    	<button class="btn btn-block btn btn-info clickable cambio_estado_mensaje" data-estado="FRENADO" style="cursor: pointer;">FRENADO</button>
					</div>
					<div class="col-md-4">
						<?php
							$sql_contar_adicionales = "SELECT count(*) as total from adicionales WHERE aprobado_adicional = 0 AND id_proyecto_adicional = '".$_GET['id']."'";
							$resultado_contar_adicionales = mysqli_query($conexion, $sql_contar_adicionales);
							$datos_contar_adicionales=mysqli_fetch_assoc($resultado_contar_adicionales);
						?>
				    	<button class="btn btn-block btn btn-warning clickable" data-estado="SOLICITAR ADICIONAL" data-proyecto="<?php echo ($_GET['id']); ?>" style="cursor: pointer;" id="solicitar_adicional">SOLICITAR ADICIONAL <strong>(<?php echo ($datos_contar_adicionales['total']);?>)</strong></button>
				    	<?php

				    	?>
					</div>
					<!-- <div class="col-md-2">
				    	<button class="btn btn-block btn btn-dark clickable cambio_estado" data-estado="CON DUDAS" style="cursor: pointer;">CON DUDAS</button>
					</div> -->
					<div class="col-md-2">
				    	<button class="btn btn-block btn btn-danger clickable" id="boton_volver" style="cursor: pointer;">VOLVER</button>
					</div>
					<div class="col-md-12">
						<br><h4>Mensajes:</h4>
					</div>
					<?php

						$sql = "SELECT * FROM mensajes WHERE id_proyecto = '".$_GET['id']."'";
						mysql_query("SET NAMES 'utf8'");
						if($result = mysqli_query($conexion, $sql)){
						    if(mysqli_num_rows($result) > 0){
						        $i = 0;
						        while($row = mysqli_fetch_array($result)){
					?>
							<div class="alert alert-success col-md-12" role="alert">
								Fecha: <strong><?php echo ($row['fecha_hora']);?></strong><br>
								Mensaje: <strong><?php echo ($row['mensaje']);?></strong><br>
								Estado: <strong><?php echo ($row['estado']);?></strong>
							</div>
					<?php
						        }

						        mysqli_free_result($result);
						    } else{
						        echo "No hay mensajes.";
						    }
						} else{
						    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conexion);
						}
					?>
				</div>
			</section>
		</div>
		<section>
			<div id="linea"></div>
		</section>
		<!-- Modal Eliminar Cotización-->
		<div class="modal fade" id="modal_eliminar_cotizacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">¿Borrar Cotización?</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-success" id="boton_eliminar_cotizacion" data-dismiss="modal">Aceptar</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal Eliminar Categoría-->
		<div class="modal fade" id="modal_eliminar_categoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">¿Borrar Categoría?</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-success" id="boton_eliminar_categoria" data-dismiss="modal">Aceptar</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal Solicitar Adicional -->
		<div class="modal fade" id="modal_solicitar_adicional" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle" style="margin-left: 15px;">Solicitar Adicional</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
								    <h4>Seleccione cotización</h4>
									<span id="lista_cotizaciones"></span>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
								    <h4>Ingrese monto</h4>
								    <div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">$</div>
										</div>
										<input type="number" class="form-control form-control-lg" id="monto_adicional">
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<h4>Motivo</h4>
									<textarea row="8" id="motivo_adicional" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-success" id="boton_solicitar_adicional">Solicitar</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
					</div>
				</div>
			</div>
		</div>

		<!-- MODAL DE MENSAJES -->
		<div class="modal fade" id="modal_mensaje" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle" style="margin-left: 15px;">Cambio de Estado: <span id="texto_cambio_estado"></span></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form name="formulario_mensaje">
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<h4>Motivo</h4>
										<textarea row="8" id="motivo_cambio_estado" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"></textarea>
									</div>
								</div>
							</div>
						</div>
					</form>
					<div class="modal-footer">
						<button type="button" class="btn btn-success" id="boton_mensaje">Enviar</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal Carga de Cotización -->
			<div class="modal fade" id="modal_cotizacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form id="formulario_carga_cotizacion">
							<div class="modal-body">
								<div class="row">
									<div class="col-md-12"><h2>Cargar Cotización</h2></div>
									<div class="col-md-6">
										<div class="form-group">
										    <h4>Condición</h4>
										    <select class="form-control" id="ingreso_condicion" >
										      	<option value="">Seleccionar</option>
									    		<?php

													$sql_condicion = "SELECT * FROM condicion_cotizacion ORDER BY nombre_concot ASC";
													mysql_query("SET NAMES 'utf8'");
													if($result_condicion = mysqli_query($conexion, $sql_condicion)){
													    if(mysqli_num_rows($result_condicion) > 0){
													        $i = 0;
													        while($row_condicion = mysqli_fetch_array($result_condicion)){
												?>
												<option value="<?php echo ($row_condicion['id_concot']);?>"><?php echo (utf8_encode($row_condicion['nombre_concot']));?></option>
												<?php
													        }

													        mysqli_free_result($result_condicion);
													    } else{
													        echo "No hay datos para mostrar.";
													    }
													} else{
													    echo "ERROR: Could not able to execute $sql_condicion. " . mysqli_error($conexion);
													}
												?>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
										    <h4>Item</h4>
											<select class="form-control" id="ingreso_item" >
										      	<option value="">Seleccionar</option>
									    		<?php

													$sql2 = "SELECT * FROM tipo_item ORDER BY tipo_item ASC";
													mysql_query("SET NAMES 'utf8'");
													if($result2 = mysqli_query($conexion, $sql2)){
													    if(mysqli_num_rows($result2) > 0){
													        $i = 0;
													        while($row2 = mysqli_fetch_array($result2)){
												?>
												<option value="<?php echo (utf8_encode($row2['tipo_item']));?>"><?php echo (utf8_encode($row2['tipo_item']));?></option>
												<?php
													        }
													        mysqli_free_result($result2);
													    } else{
													        echo "No hay datos para mostrar.";
													    }
													} else{
													    echo "ERROR: Could not able to execute $sql2. " . mysqli_error($conexion);
													}
												?>
											</select>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<h4>Detalle</h4>
											<input type="text" id="ingreso_detalle_cotizacion" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<h4>Proveedor</h4>
											<select class="form-control" id="ingreso_proveedor" >
										      	<option value="">Seleccionar</option>
									    		<?php
													// Attempt select query execution
													$sql_proveedores = "SELECT * FROM proveedores ORDER BY descripcion";
													mysql_query("SET NAMES 'utf8'");
													if($result_proveedores = mysqli_query($conexion, $sql_proveedores)){
													    if(mysqli_num_rows($result_proveedores) > 0){
													        $i = 0;
													        while($row_proveedores = mysqli_fetch_array($result_proveedores)){

													        	?>
													        		<option value="<?php echo ($row_proveedores['id_proveedor']);?>"><?php echo (utf8_encode($row_proveedores['descripcion']));?> | <?php echo (utf8_encode($row_proveedores['razon_social']));?> | <?php echo (utf8_encode($row_proveedores['contacto']));?></option>
													        	<?php
													        }
													        // Free result set
													        mysqli_free_result($result_proveedores);
													    } else{
													        echo "No hay datos para mostrar.";
													    }
													} else{
													    echo "ERROR: Could not able to execute $sql_proveedores. " . mysqli_error($conexion);
													}
												?>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
										    <h4>Forma de Pago</h4>
										    <select class="form-control" id="ingreso_forma_pago" >
										      	<option value="">Seleccionar</option>
									    		<?php
													// Attempt select query execution
													$sql_pago = "SELECT * FROM forma_pago";
													mysql_query("SET NAMES 'utf8'");
													if($result_pago = mysqli_query($conexion, $sql_pago)){
													    if(mysqli_num_rows($result_pago) > 0){
													        $i = 0;
													        while($row_pago = mysqli_fetch_array($result_pago)){
													        	?>
													        		<option value="<?php echo ($row_pago['id']);?>"><?php echo (utf8_encode($row_pago['tipo']));?></option>
													        	<?php
													        }
													        // Free result set
													        mysqli_free_result($result_pago);
													    } else{
													        echo "No hay datos para mostrar.";
													    }
													} else{
													    echo "ERROR: Could not able to execute $sql_pago. " . mysqli_error($conexion);
													}
												?>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
										    <h4>Tiempo de Pago</h4>
										    <div class="input-group">
											    <input type="text" id="ingreso_dias" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required value="90">
											    <div class="input-group-prepend">
													<div class="input-group-text">días</div>
												</div>
											</div>
										    <input type="number" id="id" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" hidden>
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<h4>Cantidad</h4>
											<input type="number" id="ingreso_cantidad" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default" oninput="calculate()">
										</div>
									</div>
									<div class="col-md-5">
										<div class="form-group">
											<h4>Valor unitario</h4>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text">$</div>
												</div>
												<input type="number" class="form-control form-control" id="ingreso_importe_neto" oninput="calculate()">
											</div>
										</div>
									</div>
									<div class="col-md-5">
										<div class="form-group">
											<h4>Total</h4>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text">$</div>
												</div>
												<input type="number" class="form-control form-control importe_total" id="ingreso_importe_total" readonly value="0">
												<div id="codigo_categoria" hidden></div>
												<div id="codigo_proyecto" hidden></div>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<button type="button" class="btn btn-success btn-block" id="boton_guardar_cotizacion"><strong>GUARDAR</strong></button>
									</div>
									<div class="col-md-6">
										<button type="button" class="btn btn-danger btn-block" data-dismiss="modal"><strong>CANCELAR</strong></button>
									</div>
	      						</div>
	      					</div>
	      					</form>
      					</div>
					</div>
				</div>
			</div>

			<!-- Modal Editar Cotización -->
			<div class="modal fade" id="modal_editar_registro" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form id="formulario_carga_cotizacion">
							<div class="modal-body">
								<div class="row">
									<div class="col-md-12"><h2>Editar Cotización</h2></div>
									<div class="col-md-6">
										<div class="form-group">
										    <h4>Condición</h4>
										    <select class="form-control" id="edicion_condicion" >
										      	<option value="">Seleccionar</option>
									    		<?php

													$sql_condicion = "SELECT * FROM condicion_cotizacion ORDER BY nombre_concot ASC";
													mysql_query("SET NAMES 'utf8'");
													if($result_condicion = mysqli_query($conexion, $sql_condicion)){
													    if(mysqli_num_rows($result_condicion) > 0){
													        $i = 0;
													        while($row_condicion = mysqli_fetch_array($result_condicion)){
												?>
												<option value="<?php echo ($row_condicion['id_concot']);?>"><?php echo (utf8_encode($row_condicion['nombre_concot']));?></option>
												<?php
													        }

													        mysqli_free_result($result_condicion);
													    } else{
													        echo "No hay datos para mostrar.";
													    }
													} else{
													    echo "ERROR: Could not able to execute $sql_condicion. " . mysqli_error($conexion);
													}
												?>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
										    <h4>Item</h4>
											<select class="form-control" id="edicion_item" >
										      	<option value="">Seleccionar</option>
									    		<?php

													$sql2 = "SELECT * FROM tipo_item ORDER BY tipo_item ASC";
													mysql_query("SET NAMES 'utf8'");
													if($result2 = mysqli_query($conexion, $sql2)){
													    if(mysqli_num_rows($result2) > 0){
													        $i = 0;
													        while($row2 = mysqli_fetch_array($result2)){
												?>
												<option value="<?php echo (utf8_encode($row2['tipo_item']));?>"><?php echo (utf8_encode($row2['tipo_item']));?></option>
												<?php
													        }
													        mysqli_free_result($result2);
													    } else{
													        echo "No hay datos para mostrar.";
													    }
													} else{
													    echo "ERROR: Could not able to execute $sql2. " . mysqli_error($conexion);
													}
												?>
											</select>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<h4>Detalle</h4>
											<input type="text" id="edicion_detalle_cotizacion" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<h4>Proveedor</h4>
											<select class="form-control" id="edicion_proveedor" >
										      	<option value="">Seleccionar</option>
									    		<?php
													// Attempt select query execution
													$sql_proveedores = "SELECT * FROM proveedores ORDER BY descripcion";
													mysql_query("SET NAMES 'utf8'");
													if($result_proveedores = mysqli_query($conexion, $sql_proveedores)){
													    if(mysqli_num_rows($result_proveedores) > 0){
													        $i = 0;
													        while($row_proveedores = mysqli_fetch_array($result_proveedores)){

													        	?>
													        		<option value="<?php echo ($row_proveedores['id_proveedor']);?>"><?php echo (utf8_encode($row_proveedores['descripcion']));?> | <?php echo (utf8_encode($row_proveedores['razon_social']));?> | <?php echo (utf8_encode($row_proveedores['contacto']));?></option>
													        	<?php
													        }
													        // Free result set
													        mysqli_free_result($result_proveedores);
													    } else{
													        echo "No hay datos para mostrar.";
													    }
													} else{
													    echo "ERROR: Could not able to execute $sql_proveedores. " . mysqli_error($conexion);
													}
												?>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
										    <h4>Forma de Pago</h4>
										    <select class="form-control" id="edicion_forma_pago" >
										      	<option value="">Seleccionar</option>
									    		<?php
													// Attempt select query execution
													$sql_pago = "SELECT * FROM forma_pago";
													mysql_query("SET NAMES 'utf8'");
													if($result_pago = mysqli_query($conexion, $sql_pago)){
													    if(mysqli_num_rows($result_pago) > 0){
													        $i = 0;
													        while($row_pago = mysqli_fetch_array($result_pago)){
													        	?>
													        		<option value="<?php echo ($row_pago['id']);?>"><?php echo (utf8_encode($row_pago['tipo']));?></option>
													        	<?php
													        }
													        // Free result set
													        mysqli_free_result($result_pago);
													    } else{
													        echo "No hay datos para mostrar.";
													    }
													} else{
													    echo "ERROR: Could not able to execute $sql_pago. " . mysqli_error($conexion);
													}
												?>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
										    <h4>Tiempo de Pago</h4>
										    <div class="input-group">
											    <input type="text" id="edicion_dias" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
											    <div class="input-group-prepend">
													<div class="input-group-text">días</div>
												</div>
											</div>
										    <input type="number" id="id" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" hidden>
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<h4>Cantidad</h4>
											<input type="number" id="edicion_cantidad" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default" oninput="calculate_edicion()">
										</div>
									</div>
									<div class="col-md-5">
										<div class="form-group">
											<h4>Valor unitario</h4>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text">$</div>
												</div>
												<input type="number" class="form-control form-control" id="edicion_importe_neto" oninput="calculate_edicion()">
											</div>
										</div>
									</div>
									<div class="col-md-5">
										<div class="form-group">
											<h4>Total</h4>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text">$</div>
												</div>
												<input type="number" class="form-control form-control importe_total" id="edicion_importe_total" readonly value="0">
												<div id="edicion_id_registro" hidden value="0"></div>
												<div id="codigo_proyecto" hidden></div>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<button type="button" class="btn btn-success btn-block" id="boton_editar_cotizacion"><strong>GUARDAR</strong></button>
									</div>
									<div class="col-md-6">
										<button type="button" class="btn btn-danger btn-block" data-dismiss="modal"><strong>CANCELAR</strong></button>
									</div>
	      						</div>
	      					</div>
	      					</form>
      					</div>
					</div>
				</div>
			</div>

		<script type="text/javascript">
			$(document).ready(function(){
				proyecto = document.getElementById('ingreso_id').innerHTML;
				$.ajax({
	                url:"actualizar_adicionales.php",
	                method:"POST",
	                data:'proyecto='+proyecto,
	                success:function(data){
                     	$('#table_adicionales').html(data);
                     	var suma_adicionales = document.getElementById('suma_adicionales').innerHTML;
                     	var consumido = document.getElementById('consumido_total').value;
                     	suma_adicionales = parseFloat(suma_adicionales);
                     	consumido = parseFloat(consumido);
                     	var adicional_total = suma_adicionales + consumido;
                     	adicional_total = parseFloat(adicional_total);
                     	adicional_total = adicional_total.toFixed(2);
                     	document.getElementById('adicionales_total').value = suma_adicionales;
	                }
	           	});

				document.getElementById("formulario_cotizacion").reset();
				document.getElementById("formulario_carga_cotizacion").reset();
				var tipo_estado = document.getElementById('tipo_estado').innerHTML;
				console.log(tipo_estado);
				switch(tipo_estado){
					case "CANCELADO":
						$("#tipo_estado").css("background-color", "#23272b");
						$("#tipo_estado").css("color", "#FFFFFF");
						break;
					case "APROBADO":
						$("#tipo_estado").css("background-color", "#218838");
						$("#tipo_estado").css("color", "#FFFFFF");
						break;
					case "RECHAZADO":
						$("#tipo_estado").css("background-color", "#dc3545");
						$("#tipo_estado").css("color", "#FFFFFF");
						break;
					case "AJUSTAR":
						$("#tipo_estado").css("background-color", "#138496");
						$("#tipo_estado").css("color", "#FFFFFF");
						break;
					case "STAND BY":
						$("#tipo_estado").css("background-color", "#ffc107");
						$("#tipo_estado").css("color", "#212529");
						break;
					case "CON DUDAS":
						$("#tipo_estado").css("background-color", "#23272b");
						$("#tipo_estado").css("color", "#FFFFFF");
						break;
					case "COTIZANDO":
						$("#tipo_estado").css("background-color", "#0069d9");
						$("#tipo_estado").css("color", "#FFFFFF");
						break;
					case "ENTREGADO":
						$("#tipo_estado").css("background-color", "#218838");
						$("#tipo_estado").css("color", "#FFFFFF");
						break;
					case "FRENADO":
						$("#tipo_estado").css("background-color", "#138496");
						$("#tipo_estado").css("color", "#FFFFFF");
						break;
					case "SOLICITAR ADICIONAL":
						$("#tipo_estado").css("background-color", "#ffc107");
						$("#tipo_estado").css("color", "#212529");
						break;
					case "ADICIONAL SOLICITADO":
						$("#tipo_estado").css("background-color", "#ffc107");
						$("#tipo_estado").css("color", "#212529");
						$("#solicitar_adicional").css("display", "none");
				}
			});

			$('#boton_volver').click(function(){
				window.location.href = 'cotizaciones.php';
			});

			$('.modal_cargar_cotizacion').click(function(){
				var id_categoria = $(this).attr('data-id');
				var id_proyecto = $(this).attr('data-proyecto');
				console.log("Modal Cotizacion: ",id_categoria);
				$('#modal_cotizacion').modal('show');
				document.getElementById('codigo_categoria').innerHTML = id_categoria;
				document.getElementById('codigo_proyecto').innerHTML = id_proyecto;
				/*document.getElementById('codigo_categoria').value = id_categoria;*/
			});

			function calculate() {
				var myBox1 = document.getElementById('ingreso_cantidad').value;
				var myBox2 = document.getElementById('ingreso_importe_neto').value;
				var result = document.getElementById('ingreso_importe_total');
				var myResult = myBox1 * myBox2;
				result.value = myResult;
			};

			function calculate_edicion() {
				var myBox1 = document.getElementById('edicion_cantidad').value;
				var myBox2 = document.getElementById('edicion_importe_neto').value;
				var result = document.getElementById('edicion_importe_total');
				var myResult = myBox1 * myBox2;
				result.value = myResult;
			};

			$('#guardar_categoria').click(function(){
				var id_proyecto = document.getElementById('ingreso_id').innerHTML;
				var categoria = $("#ingreso_categoria").val();
				var detalle = $("#ingreso_detalle").val();

				$.ajax({
                     url:"agregar_categoria.php",
                     method:"POST",
                     data: 'id_proyecto='+ id_proyecto+'&categoria='+ categoria+'&detalle='+ detalle,
                     success:function(data){
						window.location.reload(true);
                     }
                });
			});

			$('#boton_guardar_cotizacion').click(function(){
				var id_categoria = document.getElementById('codigo_categoria').innerHTML;
				var id_proyecto = document.getElementById('codigo_proyecto').innerHTML;
				var item = $("#ingreso_item").val();
				var condicion = $("#ingreso_condicion").val();
				var detalle = $("#ingreso_detalle_cotizacion").val();
				var cantidad = $("#ingreso_cantidad").val();
				var importe_neto = $("#ingreso_importe_neto").val();
				var importe_total = $("#ingreso_importe_total").val();

				var proveedor = $("#ingreso_proveedor").val();
				var forma_pago = $("#ingreso_forma_pago").val();
				var dias_pago = $("#ingreso_dias").val();

				if(dias_pago == 0){
					dias_pago = 90;
				}

				$.ajax({
                     url:"agregar_cotizacion.php",
                     method:"POST",
                     data: 'id_proyecto='+ id_proyecto+'&id_categoria='+ id_categoria+'&item='+ item+'&condicion='+ condicion+'&detalle='+ detalle+'&cantidad='+ cantidad+'&importe_neto='+ importe_neto+'&importe_total='+ importe_total+'&proveedor='+ proveedor+'&forma_pago='+ forma_pago+'&dias_pago='+ dias_pago,
                     success:function(data){
                     	$('#formulario_carga_cotizacion').trigger("reset");
						window.location.reload(true);
                     }
                });
			});

			$('.eliminar_categoria').click(function(){
				$('#modal_eliminar_categoria').modal('show');
				var id = $(this).attr('data-id');

				$('#boton_eliminar_categoria').click(function(){
					console.log(id);
					$.ajax({
		                url:"eliminar_categoria.php",
		                method:"POST",
		                data:'id='+id/*+'&saldo_sumar='+saldo_sumar+'&consumido='+consumido+'&id_proyecto='+id_proyecto*/,
		                success:function(data){
		                	$('#modal_eliminar_categoria').modal('hide');
							window.location.reload(true);
		                }
		           });
				});
			});

			$('.eliminar_cotizacion').click(function(){
				$('#modal_eliminar_cotizacion').modal('show');
				var id = $(this).attr('data-id');
				var check = $(this).attr('data-check');
				var id_proyecto = document.getElementById('ingreso_id').innerHTML;
				var valor_resta = $(this).attr('data-total');
				var saldo = $("#saldo_total").val();
				var consumido = document.getElementById('consumido_total').value;

				console.log(check);

				if(check == "1"){
					consumido = parseFloat(consumido);
					valor_resta = parseFloat(valor_resta);
					consumido = consumido - valor_resta;
					saldo = parseFloat(saldo);
					saldo_sumar = saldo + valor_resta;
					console.log("Saldo: ",saldo);
					console.log("Valor a sumar: ",valor_resta);
					console.log("Valor consumido: ",consumido);
					console.log("Disponible: ",saldo_sumar);
					$('#boton_eliminar_cotizacion').click(function(){
						console.log(id);
						$.ajax({
			                url:"eliminar_cotizacion.php",
			                method:"POST",
			                data:'id='+id+'&saldo_sumar='+saldo_sumar+'&consumido='+consumido+'&id_proyecto='+id_proyecto,
			                success:function(data){
			                	$('#modal_eliminar_cotizacion').modal('hide');
								window.location.reload(true);
			                }
			           });
					});
				} else {
					$('#boton_eliminar_cotizacion').click(function(){
						console.log(id);
						$.ajax({
			                url:"eliminar_cotizacion_nocheck.php",
			                method:"POST",
			                data:'id='+id,
			                success:function(data){
			                	$('#modal_eliminar_cotizacion').modal('hide');
								window.location.reload(true);
			                }
			           });
					});
				}
			});

			$('#solicitar_adicional').click(function(){
				$("#lista_cotizaciones").html('');
				$("#monto_adicional").html('');
				$("#motivo_adicional").html('');
				$('#modal_solicitar_adicional').modal('show');
				var proyecto = $(this).attr('data-proyecto');
				$.ajax({
	                url:"cargar_registros_adicional.php",
	                method:"POST",
	                data:'proyecto='+proyecto,
	                success:function(data){
	                	$("#lista_cotizaciones").append(data);
	                	//$('#modal_mensaje').modal('hide');
						//window.location.reload(true);
	                }
	           });
			});

			$('#boton_solicitar_adicional').click(function(){
				var id_proyecto = document.getElementById('ingreso_id').innerHTML;
				var monto_adicional = document.getElementById('monto_adicional').value;
				var motivo_adicional = document.getElementById('motivo_adicional').value;
				var cotizacion = document.getElementById('dropdown_registros').value;

				console.log("Click: ",cotizacion);
				$.ajax({
	                url:"solicitar_adicional.php",
	                method:"POST",
	                data:'cotizacion='+cotizacion+'&id_proyecto='+id_proyecto+'&monto_adicional='+monto_adicional+'&motivo_adicional='+motivo_adicional,
	                success:function(data){
	                	$('#modal_solicitar_adicional').modal('hide');
						window.location.reload(true);
	                }
	           });
			});

			$('.cambio_estado_mensaje').click(function(){
				var estado = $(this).attr('data-estado');
				document.getElementById('texto_cambio_estado').innerHTML = estado;
				$('#modal_mensaje').modal('show');
			});

			$('#boton_mensaje').click(function(){
				var estado = document.getElementById('texto_cambio_estado').innerHTML
				var id = document.getElementById('ingreso_id').innerHTML;
				var mensaje = document.getElementById('motivo_cambio_estado').value;
				$.ajax({
	                url:"enviar_mensaje_registro.php",
	                method:"POST",
	                data:'id='+id+'&estado='+estado+'&mensaje='+mensaje,
	                success:function(data){
	                	$('#modal_mensaje').modal('hide');
						window.location.reload(true);
	                }
	           });
			});

			$('.editar_cotizacion').click(function(){
			    var id_registro = $(this).attr('data-id');
			    console.log("Click id: ",id_registro);
			    $.ajax({
	                url:"cargar_registro.php",
	                method:"POST",
	                data:{id_registro:id_registro},
	                dataType:"json",
	                success:function(data){
	                	$("#edicion_item").val(data.item);
						$("#edicion_condicion").val(data.condicion_registro);
						$("#edicion_detalle_cotizacion").val(data.detalle_registro);
						$("#edicion_cantidad").val(data.cantidad);
						$("#edicion_importe_neto").val(data.importe_neto);
						$("#edicion_importe_total").val(data.importe_total);
						$("#edicion_proveedor").val(data.id_proveedor);
						$("#edicion_forma_pago").val(data.forma_pago);
						$("#edicion_dias").val(data.tiempo_pago);
	                    $('#modal_editar_registro').modal('show');
	                }
	           });
				    $('#boton_editar_cotizacion').click(function(){
					var item = $("#edicion_item").val();
					var condicion = $("#edicion_condicion").val();
					var detalle = $("#edicion_detalle_cotizacion").val();
					var cantidad = $("#edicion_cantidad").val();
					var importe_neto = $("#edicion_importe_neto").val();
					var importe_total = $("#edicion_importe_total").val();
					var proveedor = $("#edicion_proveedor").val();
					var forma_pago = $("#edicion_forma_pago").val();
					var dias_pago = $("#edicion_dias").val();

					$.ajax({
	                     url:"editar_registro.php",
	                     method:"POST",
	                     data: 'id_registro='+ id_registro+'&item='+ item+'&condicion='+ condicion+'&detalle='+ detalle+'&cantidad='+ cantidad+'&importe_neto='+ importe_neto+'&importe_total='+ importe_total+'&proveedor='+ proveedor+'&forma_pago='+ forma_pago+'&dias_pago='+ dias_pago,
	                     success:function(data){
							$('#modal_editar_registro').modal('hide');
							window.location.reload(true);
	                     }
	                });
				});
			});

			/*var totalDeuda = 0;
			var id_registro = 0;
			var registro = 0;
			$(".valor_promedio").each(function(){
				id_categoria = $(".eliminar_categoria").attr("data-id");
				id_registro = id_registro + 1;
				registro = $(this).attr('data-registro');
				totalDeuda+=parseInt($(this).attr('data-valor')) || 0;
				console.log("ID Registro: ",registro);
				console.log("Deuda: ",totalDeuda);
				console.log("Cantidad de cotizaciones: ",id_registro);
			});*/

			$(".checkbox").click(function(){
				var marca = 0;
				console.log("Click en Checkbox para actualizar iconos");
				registro = $(this).attr('data-registro');
				if ($(this).is(":checked")){
					marca = 1;
				}
				$(".eliminar_cotizacion").each(function(){
					check_eliminar = $(this).attr('data-id');
					if(check_eliminar == registro) {
						console.log("Eliminar: ",check_eliminar);
						console.log("Registro: ",registro);
						console.log("Marca: ",marca);
						if (marca == 1){
							$(this).fadeOut();
						} else {
							$(this).fadeIn();
						}
					}
				});

				$(".editar_cotizacion").each(function(){
					check_eliminar = $(this).attr('data-id');
					if(check_eliminar == registro) {
						console.log("Eliminar: ",check_eliminar);
						console.log("Registro: ",registro);
						console.log("Marca: ",marca);
						if (marca == 1){
							$(this).fadeOut();
						} else {
							$(this).fadeIn();
						}
					}
				});
			});

			$(".tiempo_pago_cambio").change(function(){
				var registro = $(this).attr('data-registro');
				var tiempo = $(this).val();
				$.ajax({
	                url:"tiempo_pago_cambio.php",
	                method:"POST",
	                data:'registro='+registro+'&tiempo='+tiempo,
	                success:function(data){
	                	var id_proyecto = document.getElementById('ingreso_id').innerHTML;
	                	$.ajax({
		                     url:'procesar_pagos.php',
		                     type: 'POST',
		                     dataType: 'json',
		                     data: 'id_proyecto='+id_proyecto,
		                     success:function(data){
		                     	$('#pago30').val(data.valor30dias);
		                     	$('#pago60').val(data.valor60dias);
		                     	$('#pago90').val(data.valor90dias);
		                     }
		                });
	                }
	           });
			});


			$(".eliminar_cotizacion").each(function(){
				$(this).css("display", "none");
				if($(this).attr('data-check') == 0) {
					console.log("Muestro");
					$(this).css("display", "inline-block");
				} else{
					console.log("Oculto");
				}
			});

			$(".editar_cotizacion").each(function(){
				$(this).css("display", "none");
				if($(this).attr('data-check') == 0) {
					console.log("Muestro");
					$(this).css("display", "inline-block");
				} else{
					console.log("Oculto");
				}
			});


			$(".checkbox").click(function(){

				sum = 0;
				sum_total = 0;
				total = 0;
				registro = 0;
				chk = 0;
				tiempo = 0;

				tiempo_pago = 0;
				sum_pago = 0;
				sum_total_pago = 0;
				total_pago = 0;

				if ($(this).is(":checked")) {
					chk = 1;
					registro = $(this).attr('data-registro');
					proyecto = document.getElementById('ingreso_id').innerHTML;
					$(this).closest("tr").toggleClass("selected", this.checked);

				} else {
					chk = 0;
					registro = $(this).attr('data-registro');
					proyecto = document.getElementById('ingreso_id').innerHTML;
					$(this).closest("tr").removeClass("selected", this.checked);
					console.log(registro);
				}

				$.each($('input[type="checkbox"]:checked'), function() {
					sum = parseFloat($(this).val());
					sum_total = sum_total + sum;
					total = sum_total.toFixed(2);
					document.getElementById('consumido_total').value = total;
				});

				saldo = document.getElementById('costo_presupuesto_total').value;
				saldo = parseFloat(saldo);
				saldo_total = saldo - total;
				saldo_total = saldo_total.toFixed(2);
				document.getElementById('saldo_total').value = saldo_total;

				var id_proyecto = document.getElementById('ingreso_id').innerHTML;
				var costo_presupuesto_total = document.getElementById('costo_presupuesto_total').value;
				costo_presupuesto_total = parseFloat(costo_presupuesto_total);

				if(costo_presupuesto_total == saldo_total){
					console.log("Pongo consumido en 0");
					document.getElementById('consumido_total').value = "0.00";
					document.getElementById('adicionales_total').value = "0.00";

					document.getElementById('pago30').value = "0.00";
					document.getElementById('pago60').value = "0.00";
					document.getElementById('pago90').value = "0.00";
				}

				$.ajax({
	                url:"actualizar_valores.php",
	                method:"POST",
	                data:'id_proyecto='+id_proyecto+'&total='+total+'&saldo_total='+saldo_total+'&registro='+registro+'&chk='+chk,
	                success:function(data){
	                	console.log("Proyecto actualizado");
	                	var id_proyecto = document.getElementById('ingreso_id').innerHTML;
	                	$.ajax({
		                     url:'procesar_pagos.php',
		                     type: 'POST',
		                     dataType: 'json',
		                     data: 'id_proyecto='+id_proyecto+'&registro='+registro+'&chk='+chk,
		                     success:function(data){
		                     	$('#pago30').val(data.valor30dias);
		                     	$('#pago60').val(data.valor60dias);
		                     	$('#pago90').val(data.valor90dias);
		                     	$.ajax({
					                url:"actualizar_adicionales.php",
					                method:"POST",
					                data:'proyecto='+proyecto,
					                success:function(data){
				                     	$('#table_adicionales').html(data);
				                     	var suma_adicionales = document.getElementById('suma_adicionales').innerHTML;
				                     	var consumido = document.getElementById('consumido_total').value;
				                     	suma_adicionales = parseFloat(suma_adicionales);
				                     	consumido = parseFloat(consumido);
				                     	var adicional_total = suma_adicionales + consumido;
				                     	adicional_total = parseFloat(adicional_total);
				                     	adicional_total = adicional_total.toFixed(2);

				                     	console.log("Adicional + Consumido: ",adicional_total);
				                     	console.log("Adicional: ",suma_adicionales);
				                     	console.log("Consumido :",consumido);
				                     	document.getElementById('adicionales_total').value = suma_adicionales;
					                }
					           	});
		                     }
		                });
	                }
	            });
			});

		</script>
	</body>
</html>
