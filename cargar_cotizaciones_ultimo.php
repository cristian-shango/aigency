<?php 
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
	</head>
	<body>
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
						<table class="table table-hover table-expandable table-sticky-header" id="table_format">
							<thead>
								<tr>
									<th scope="col">Categoría / Rubro</th>
									<th scope="col">Detalle</th>
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
									        while($row = mysqli_fetch_array($result)){
									        	$id_catcot = $row['id_catcot'];
									        	$sql_contar_registros = "SELECT count(*) as total from registros WHERE categoria_cotizacion = $id_catcot";
												$resultado_contar_registros = mysqli_query($conexion, $sql_contar_registros);
												$datos_contar_registros=mysqli_fetch_assoc($resultado_contar_registros);
								?>
										<tr class="mostrar_registro" data-id="<?php echo ($row['id_catcot']);?>">
											<td scope="row"><strong><?php echo ($row['nombre_catcot']);?></strong></td>
											<td style="text-align: left;"><strong><?php echo ($row['detalle_catcot']);?></strong></td>
											<td><span class="badge badge-danger badge-pill" id="cantidad_registros" data-id="<?php echo ($row['id_catcot']);?>"><?php echo ($datos_contar_registros['total']);?></span></td>
											<td><i class="far fa-trash-alt" data-toggle="modal" data-id="<?php echo ($row['id']);?>" data-valor="<?php echo ($row['importe_total']);?>"></i></td>
										</tr>
										<tr>
											<td colspan="5">
												<table class="table" id="table_format" style="margin-top: 1em;">
													<tbody>
														<tr>
															<th scope="col" class="gray">#</th>
															<th scope="col" class="gray">Condición</th>
															<th scope="col" class="gray">Item</th>
															<th scope="col" class="gray">Detalle</th>
															<th scope="col" class="gray">Cantidad</th>
															<th scope="col" class="gray">Valor unitario</th>
															<th scope="col" class="gray">Total</th>
															<th scope="col" class="gray">Acciones</th>
														</tr>
														<?php
															$id_catcot = $row['id_catcot'];
															$sql_registros = "SELECT * FROM registros r LEFT JOIN condicion_cotizacion c ON r.condicion_registro = c.id_concot WHERE categoria_cotizacion = $id_catcot";
															mysql_query("SET NAMES 'utf8'");
															if($result_registros = mysqli_query($conexion, $sql_registros)){
															    if(mysqli_num_rows($result_registros) > 0){
															        $i = 0;
															        while($row_registros = mysqli_fetch_array($result_registros)){
														?>
																<tr>
																	<td>
																		<?php
																			if ($row_registros['registro_seleccionado'] == 0){
																		?>
																				<input class="form-check-input position-static mostrar_checkbox checkbox" type="checkbox" name="radio_cotizacion_<?php echo ($row['id_catcot']);?>" id="radio_cotizacion" value="<?php echo ($row_registros['importe_total']);?>" data-registro="<?php echo ($row_registros['id']);?>"></td>
																		<?php
																			} else {
																		?>
																				<input class="form-check-input position-static mostrar_checkbox checkbox" type="checkbox" name="radio_cotizacion_<?php echo ($row['id_catcot']);?>" id="radio_cotizacion" value="<?php echo ($row_registros['importe_total']);?>" data-registro="<?php echo ($row_registros['id']);?>" checked></td>
																		<?php
																			}
																		?>
																	<td scope="row"><?php echo ($row_registros['nombre_concot']);?></td>
																	<td scope="row"><?php echo ($row_registros['item']);?></td>
																	<td><?php echo (utf8_encode($row_registros['detalle_registro']));?></td>
																	<td><?php echo ($row_registros['cantidad']);?></td>
																	<td>$ <span class="valor_precio_cliente"><?php echo ($row_registros['importe_neto']);?></span></td>
																	<td>$ <span class="valor_costo_presupuestado"><?php echo ($row_registros['importe_total']);?></span></td>
																	<td><i class="far fa-trash-alt" data-toggle="modal" data-id="<?php echo ($row_registros['id']);?>" data-nombre="<?php echo ($row_registros['nombre']);?>"></i></td>
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
					</div>
				</div>
			</section>
			<section id="bloque_bottom">
				<div class="row">
					<div class="col-md-12 border-top"></div>
					<?php
						//echo $_GET['id'];
						
						$sql = "SELECT * FROM proyectos p LEFT JOIN clientes c ON p.cliente = c.id_cliente WHERE id = '".$_GET['id']."'";  
						mysql_query("SET NAMES 'utf8'");
						if($result = mysqli_query($conexion, $sql)){
						    if(mysqli_num_rows($result) > 0){
						        $i = 0;
						        while($row = mysqli_fetch_array($result)){
					?>
								<div class="col-md-4 text-center">
									<div class="form-group">
									    <h4 style="font-size: 1.1em;">Cliente: <span id="ingreso_cliente" style="font-weight: lighter;"><?php echo ($row['nombre']);?></span></h4>
									</div>
								</div>
								<div class="col-md-4 text-center">
									<div class="form-group">
									    <h4 style="font-size: 1.1em;">Proyecto: <span id="ingreso_proyecto" style="font-weight: lighter;"><?php echo ($row['nombre_proyecto']);?></span></h4>
									</div>
								</div>
								<div class="col-md-4 text-center">
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
								<div class="col-md-4" id="mostrar_costo_presupuestado">
									<div class="form-group">
									    <h4>Costo</h4>
									    <div class="input-group">
											<div class="input-group-prepend">
												<div class="input-group-text">$</div>
											</div>
											<input type="text" class="form-control form-control-lg" id="costo_presupuesto_total" readonly value="<?php echo ($row['costo_presupuestado']);?>">
										</div>
									</div>
								</div>
								<div class="col-md-4" id="mostrar_saldo">
									<div class="form-group">
									    <h4>Consumido</h4>
									    <div class="input-group">
											<div class="input-group-prepend">
												<div class="input-group-text">$</div>
											</div>
											<input type="text" class="form-control form-control-lg" id="consumido_total" readonly value="<?php echo ($row['consumido']);?>">
										</div>
									</div>
								</div>
								<div class="col-md-4" id="mostrar_saldo">
									<div class="form-group">
									    <h4>Saldo</h4>
									    <div class="input-group">
											<div class="input-group-prepend">
												<div class="input-group-text">$</div>
											</div>
											<input type="text" class="form-control form-control-lg" id="saldo_total" readonly value="<?php echo ($row['saldo']);?>">
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
				    	<button class="btn btn-block btn btn-warning clickable" data-estado="SOLICITAR ADICIONAL" style="cursor: pointer;" id="solicitar_adicional">SOLICITAR ADICIONAL</button>
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
		<!-- Modal Eliminar -->
		<div class="modal fade" id="modal_eliminar_cotizacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">¿Borrar Registro?</h5>
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
									<div class="col-md-12">
										<div class="form-group">
										<h4>Proveedor</h4>
										<select class="form-control" id="proveedores" >
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
									<div class="col-md-2">
										<h4>Cantidad</h4>
										<input type="number" id="ingreso_cantidad" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default" oninput="calculate()">	
									</div>
									<div class="col-md-5">
										<h4>Valor unitario</h4>
										<div class="input-group">
											<div class="input-group-prepend">
												<div class="input-group-text">$</div>
											</div>
											<input type="number" class="form-control form-control" id="ingreso_importe_neto" oninput="calculate()">
										</div>
									</div>
									<div class="col-md-5">
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
									<div class="col-md-6">
										<button type="button" class="btn btn-success btn-block" id="boton_guardar_cotizacion"><strong>GUARDAR</strong></button>
									</div>
									<div class="col-md-6">
										<button type="button" class="btn btn-danger btn-block" data-dismiss="modal"><strong>CANCELAR</strong></button>
									</div>
								
	      					</div>
      					</div>
					</div>
				</div>
			</div>

		<script type="text/javascript">
			$(document).ready(function(){
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
						$("#tr_mostrar").css("display", "none");
						$(".fa-trash-alt").css("display", "none");
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
						$(".cambio_estado").css("display", "none");
						break;
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

			$('#guardar_categoria').click(function(){
				var id_proyecto = document.getElementById('ingreso_id').innerHTML;
				var categoria = $("#ingreso_categoria").val();
				var detalle = $("#ingreso_detalle").val();

				$.ajax({  
                     url:"agregar_categoria.php",  
                     method:"POST",
                     data: 'id_proyecto='+ id_proyecto+'&categoria='+ categoria+'&detalle='+ detalle,
                     success:function(data){  
						window.location.reload();
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
				console.log(id_categoria);				
				/*var saldo = $("#saldo_total").val();
				var consumido = $("#consumido_total").val();*/

				/*cantidad = parseFloat(cantidad);
				importe_neto = parseFloat(importe_neto);
				importe_total = parseFloat(importe_total);
				saldo = parseFloat(saldo);
				consumido = parseFloat(consumido);
				consumido_total = consumido + importe_total;
				var saldo_total = saldo - importe_total;*/
				console.log(saldo_total);

				$.ajax({  
                     url:"agregar_cotizacion.php",  
                     method:"POST",
                     data: 'id_proyecto='+ id_proyecto+'&id_categoria='+ id_categoria+'&item='+ item+'&condicion='+ condicion+'&detalle='+ detalle+'&cantidad='+ cantidad+'&importe_neto='+ importe_neto+'&importe_total='+ importe_total/*+'&saldo_total='+ saldo_total+'&consumido_total='+ consumido_total*/,
                     success:function(data){  
                     	$('#formulario_carga_cotizacion').trigger("reset");
						window.location.reload();
                     }  
                });
			});

			$('.fa-trash-alt').click(function(){
				$('#modal_eliminar_cotizacion').modal('show');
				var id = $(this).attr('data-id');
				var id_proyecto = document.getElementById('ingreso_id').innerHTML;
				var valor_resta = $(this).attr('data-valor');
				var saldo = $("#saldo_total").val();
				var consumido = document.getElementById('consumido_total').value;
				consumido = parseFloat(consumido);
				valor_resta = parseFloat(valor_resta);
				consumido = consumido - valor_resta;
				saldo = parseFloat(saldo);
				saldo_sumar = saldo + valor_resta;
				console.log(saldo);
				$('#boton_eliminar_cotizacion').click(function(){
					console.log(id);
					$.ajax({  
		                url:"eliminar_cotizacion.php",  
		                method:"POST",  
		                data:'id='+id+'&saldo_sumar='+saldo_sumar+'&consumido='+consumido+'&id_proyecto='+id_proyecto,
		                success:function(data){
		                	$('#modal_eliminar').modal('hide');
							window.location.reload();
		                }  
		           }); 
				});
			});

			$('#solicitar_adicional').click(function(){
				$('#modal_solicitar_adicional').modal('show');
			});

			$('#boton_solicitar_adicional').click(function(){
				var id_proyecto = document.getElementById('ingreso_id').innerHTML;
				var monto_adicional = document.getElementById('monto_adicional').value;
				var motivo_adicional = document.getElementById('motivo_adicional').value;

				console.log("Click");
				$.ajax({  
	                url:"solicitar_adicional.php",  
	                method:"POST",  
	                data:'id_proyecto='+id_proyecto+'&monto_adicional='+monto_adicional+'&motivo_adicional='+motivo_adicional,
	                success:function(data){
	                	$('#modal_solicitar_adicional').modal('hide');
						window.location.reload();
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
						window.location.reload();
	                }
	           }); 
			});

			$(".checkbox").click(function(){
				sum = 0;
				sum_total = 0;
				total = 0;
				registro = 0;
				chk = 0;

				if ($(this).is(":checked")) {
					chk = 1;
					registro = $(this).attr('data-registro');
				} else {
					chk = 0;
					registro = $(this).attr('data-registro');
				}
				
				$.each($('input[type="checkbox"]:checked'), function() { 
					sum = parseFloat($(this).val());
					sum_total = sum_total + sum;
					total = sum_total.toFixed(2);
					document.getElementById('consumido_total').value = total;
				});

				console.log("Registro: ",registro, ", tiene valor: ",chk);

				saldo = document.getElementById('costo_presupuesto_total').value;
				saldo = parseFloat(saldo);
				saldo_total = saldo - total;
				saldo_total = saldo_total.toFixed(2);
				document.getElementById('saldo_total').value = saldo_total;

				var id_proyecto = document.getElementById('ingreso_id').innerHTML;

				$.ajax({  
	                url:"actualizar_valores.php",  
	                method:"POST",  
	                data:'id_proyecto='+id_proyecto+'&total='+total+'&saldo_total='+saldo_total+'&registro='+registro+'&chk='+chk,
	                success:function(data){
	                	console.log("Proyecto actualizado");
	                }  
	           });
			});
		</script>
	</body>
</html>