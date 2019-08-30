<?php
	include "session.php";
	include "conexion.php";
	mysql_set_charset('utf8');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Viva Admin | Pedido de Cotización</title>
	  	<meta charset="utf-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1">

	  	<link rel="stylesheet" href="css/normalize.css">
	  	<link rel="stylesheet" href="css/jquery-ui.css">
	  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	  	<link rel="stylesheet" href="css/style.css">
	  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

	  	<script src="js/jquery.min.js"></script>
	  	<script src="js/popper.min.js"></script>
	  	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	  	<script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
    	<link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    	<script src="https://unpkg.com/gijgo@1.9.11/js/messages/messages.es-es.js" type="text/javascript"></script>

    	<script src="js/trumbowyg/dist/trumbowyg.min.js"></script>
		<script type="text/javascript" src="js/trumbowyg/dist/langs/es_ar.min.js"></script>
    	<link rel="stylesheet" href="js/trumbowyg/dist/ui/trumbowyg.min.css">
			<script>
					function aExcel() {
						window.open("pedido_cotizacion_a_excel.php?id=<?php echo $_GET['id']; ?>");
					}
					function aPDF() {
						//window.open("pedido_cotizacion_a_pdf.php?id=<?php echo $_GET['id']; ?>");
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
						<h3 style="font-size: 3em;">Cotizaciones Pedidas</h3>
					</div>
				</div>

				<div class="row">
					<div class="table-responsive">
						<table class="table table-striped" id="table_format">
							<thead>
								<tr>
									<th scope="col">Cliente</th>
									<th scope="col">Producto</th>
									<th scope="col">Proyecto</th>
									<th scope="col">Tipo de Proyecto</th>
									<th scope="col">Subtipo</th>
									<th scope="col">Fecha Interna</th>
									<th scope="col">Hora Interna</th>
									<th scope="col">Fecha Cliente</th>
									<th scope="col">Hora Cliente</th>
									<th scope="col">Precio</th>
									<th scope="col">Costo</th>
									<th scope="col">Saldo</th>
									<th scope="col" colspan="4">Acciones</th>
									<!-- <th scope="col"></th>
									<th scope="col"></th>
									<th scope="col"></th> -->
									<th scope="col">Estado</th>
								</tr>
							</thead>
							<tbody>
								<?php
									// Attempt select query execution
									$sql = "SELECT * FROM proyectos p LEFT JOIN clientes c ON p.cliente = c.id_cliente LEFT JOIN tipo_cotizacion t ON p.tipo_cotizacion = t.id_tipo_cotizacion LEFT JOIN subtipo_cotizacion s ON p.subtipo_cotizacion = s.id_subtipo";
									mysql_query("SET NAMES 'utf8'");
									if($result = mysqli_query($conexion, $sql)){
									    if(mysqli_num_rows($result) > 0){
									        $i = 0;
									        while($row = mysqli_fetch_array($result)){
								?>
										<tr>
											<td scope="row"><?php echo ($row['nombre']);?></td>
											<td><?php echo ($row['producto_proyecto']);?></td>
											<td><?php echo ($row['nombre_proyecto']);?></td>
											<td><?php echo (utf8_encode($row['tipo_cotizacion']));?></td>
											<td><?php echo (utf8_encode($row['nombre_subtipo']));?></td>
											<td><?php echo ($row['fecha_entrega']);?></td>
											<td><?php echo ($row['hora_interno']);?>:<?php echo ($row['minutos_interno']);?></td>
											<td><?php echo ($row['fecha_envio']);?></td>
											<td><?php echo ($row['hora_cliente']);?>:<?php echo ($row['minutos_cliente']);?></td>
											<td>$ <span class="valor_precio_cliente"><?php echo ($row['precio']);?></span></td>
											<td>$ <span class="valor_costo_presupuestado"><?php echo ($row['costo_presupuestado']);?></span></td>
											<td>$ <span class="valor_saldo_total"><?php echo ($row['saldo']);?></span></td>
											<td><i class="fas fa-edit" data-toggle="modal" data-id="<?php echo ($row['id']);?>"></i></td>
											<?php
												if($row['estado'] == "ENTREGADO" OR $row['estado'] == "APROBADO" OR $row['estado'] == "RECHAZADO" OR $row['estado'] == "AJUSTAR" OR $row['estado'] == "STAND BY" OR $row['estado'] == "CANCELADO"){
											?>
													<td><i class="far fa-eye" data-id="<?php echo ($row['id']);?>" alt="Revisar cotización"></i></td>
											<?php
												} else{
											?>
													<td></td>
											<?php
												}
											?>
											<?php
												if($row['adicional'] == 1){
											?>
													<td><i class="fas fa-dollar-sign click_adicional" data-id="<?php echo ($row['id']);?>" alt="Adicional pedido"></i></td>
											<?php
												} else{
											?>
													<td></td>
											<?php
												}
											?>
											<td><i class="far fa-trash-alt" data-toggle="modal" data-id="<?php echo ($row['id']);?>" data-nombre="<?php echo ($row['nombre']);?>" alt="Eliminar"></i></td>
											<td style="font-weight: bold;"><?php echo ($row['estado']);?></td>
										</tr>
								<?php
									        }
									        // Free result set
									        mysqli_free_result($result);
									    } else{
									        echo "No hay datos para mostrar.";
									    }
									} else{
									    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conexion);
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</section>
			<section id="bloque_bottom" class="border-top">
				<div class="row">
					<div class="col-md-2">
				    	<button class="btn btn-block btn-lg btn-success" id="boton_nuevo_proyecto" style="cursor: pointer;" data-toggle="modal" data-target="#modal_nuevo_proyecto">NUEVO</button>
					</div>
					<div class="col-md-8"></div>
					<div class="col-md-2">
				    	<button class="btn btn-block btn-lg btn-danger" id="boton_volver" style="cursor: pointer;">VOLVER</button>
					</div>
					<div class="col-md-4">
						<div class="form-group">
						    <h4>Precio Total</h4>
						    <div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text">$</div>
								</div>
								<input type="text" class="form-control form-control-lg" id="precio_total" readonly placeholder="0">
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
						    <h4>Costo Total</h4>
						    <div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text">$</div>
								</div>
								<input type="text" class="form-control form-control-lg" id="costo_presupuesto_total" readonly placeholder="0">
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
						    <h4>Saldo Total</h4>
						    <div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text">$</div>
								</div>
								<input type="text" class="form-control form-control-lg" id="saldo_total" readonly placeholder="0">
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- Modal Eliminar -->
			<div class="modal fade" id="modal_eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">¿Borrar Pedido de Cotización?</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-success" id="boton_eliminar_cliente">Aceptar</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
						</div>
					</div>
				</div>
			</div>

			<!-- Modal Nuevo Proyecto -->
			<div class="modal fade" id="modal_nuevo_proyecto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12"><h2>Nuevo Pedido de Cotización</h2></div>
								<div class="col-md-3">
									<div class="form-group">
									    <h4>Cliente</h4>
									    <select class="form-control" id="dropdown_cliente_nuevo" >
									      	<option value="">Seleccionar</option>
								    		<?php
												// Attempt select query execution
												$sql = "SELECT * FROM clientes ORDER BY nombre";
												mysql_query("SET NAMES 'utf8'");
												if($result = mysqli_query($conexion, $sql)){
												    if(mysqli_num_rows($result) > 0){
												        $i = 0;
												        while($row2 = mysqli_fetch_array($result)){
											?>
											<option value="<?php echo ($row2['id_cliente']);?>"><?php echo (utf8_encode($row2['nombre']));?></option>
											<?php
												        }
												        // Free result set
												        mysqli_free_result($result);
												    } else{
												        echo "No hay datos para mostrar.";
												    }
												} else{
												    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conexion);
												}
											?>
										</select>
									</div>
								</div>
								<div class="col-md-1">
									<i class="far fa-plus-square" id="agregar_cliente"></i>
								</div>
								<div class="col-md-2">
									<div class="form-group">
									    <h4>Fecha de Entrega Interna</h4>
									    <input type="text" id="nuevo_fecha_entrega" class="form-control datepicker_fecha_entrega"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
									</div>
								</div>
								<div class="col-md-1">
									<div class="form-group">
									    <h4>Hora</h4>
									    <input type="number" id="hora_interno" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
									</div>
								</div>
								<div class="col-md-1">
									<div class="form-group">
									    <h4>Minutos</h4>
									    <input type="number" id="minutos_interno" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
									    <h4>Fecha de Entrega a Cliente</h4>
									    <input type="text" id="nuevo_fecha_envio" class="form-control datepicker_fecha_envio"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
									</div>
								</div>
								<div class="col-md-1">
									<div class="form-group">
									    <h4>Hora</h4>
									    <input type="number" id="hora_cliente" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
									</div>
								</div>
								<div class="col-md-1">
									<div class="form-group">
									    <h4>Minutos</h4>
									    <input type="number" id="minutos_cliente" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
									    <h4>Producto</h4>
									    <input type="text" id="nuevo_producto" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
									    <h4>Proyecto</h4>
									    <input type="text" id="nuevo_proyecto" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
									    <h4>Tipo de Servicio</h4>
									    <select class="form-control" id="dropdown_tipo_cotizacion_nuevo" >
									      	<option value="">Seleccionar</option>
								    		<?php
												// Attempt select query execution
												$sql1 = "SELECT * FROM tipo_cotizacion ORDER BY tipo_cotizacion ASC";
												mysql_query("SET NAMES 'utf8'");
												if($result1 = mysqli_query($conexion, $sql1)){
												    if(mysqli_num_rows($result1) > 0){
												        $i = 0;
												        while($row2 = mysqli_fetch_array($result1)){
											?>
											<option value="<?php echo ($row2['id_tipo_cotizacion']);?>"><?php echo (utf8_encode($row2['tipo_cotizacion']));?></option>
											<?php
												        }
												        // Free result set
												        mysqli_free_result($result1);
												    } else{
												        echo "No hay datos para mostrar.";
												    }
												} else{
												    echo "ERROR: Could not able to execute $sql1. " . mysqli_error($conexion);
												}
											?>
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
									    <h4>Subtipo de Servicio</h4>
									    <select class="form-control" id="dropdown_subtipo_cotizacion_nuevo" >
									      	<option value="">Seleccionar</option>
								    		<?php
												// Attempt select query execution
												$sql2 = "SELECT * FROM subtipo_cotizacion ORDER BY nombre_subtipo ASC";
												mysql_query("SET NAMES 'utf8'");
												if($result2 = mysqli_query($conexion, $sql2)){
												    if(mysqli_num_rows($result2) > 0){
												        $i = 0;
												        while($row3 = mysqli_fetch_array($result2)){
											?>
											<option value="<?php echo ($row3['id_subtipo']);?>"><?php echo (utf8_encode($row3['nombre_subtipo']));?></option>
											<?php
												        }
												        // Free result set
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
									    <textarea row="8" id="nuevo_detalle" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"></textarea>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									    <h4>Precio Objetivo</h4>
									    <div class="input-group">
											<div class="input-group-prepend">
												<div class="input-group-text">$</div>
											</div>
											<input type="number" class="form-control form-control-lg" id="nuevo_precio_cliente">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									    <h4>Costo Objetivo</h4>
									    <div class="input-group">
											<div class="input-group-prepend">
												<div class="input-group-text">$</div>
											</div>
											<input type="number" class="form-control form-control-lg" id="nuevo_costo_presupuestado">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<button type="button" class="btn btn-success btn-block" id="boton_guardar_proyecto"><strong>GUARDAR</strong></button>
								</div>
								<div class="col-md-6">
									<button type="button" class="btn btn-danger btn-block " data-dismiss="modal"><strong>CANCELAR</strong></button>
								</div>
	      					</div>
      					</div>
					</div>
				</div>
			</div>

			<!-- Modal Editar Proyecto -->
			<div class="modal fade" id="modal_editar_proyecto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form method="POST" id="actualizar_proyecto">
								<div class="row">
									<div class="col-md-12"><h2>Editar Pedido de Cotización</h2></div>
									<div class="col-md-4">
										<div class="form-group">
										    <h4>Cliente</h4>
										    <select class="form-control" id="cliente_dropdown_editar_proyecto" >
										      	<option value="">Seleccionar</option>
									    		<?php
													// Attempt select query execution
													$sql1 = "SELECT * FROM clientes ORDER BY nombre";
													mysql_query("SET NAMES 'utf8'");
													if($result1 = mysqli_query($conexion, $sql1)){
													    if(mysqli_num_rows($result1) > 0){
													        $i = 0;
													        while($row1 = mysqli_fetch_array($result1)){
													        	if($row1['cliente'] == $row['id_cliente']){
													        	?>
													        		<option value="<?php echo ($row1['id_cliente']);?>" SELECTED><?php echo (utf8_encode($row1['nombre']));?></option>
													        	<?php
													        	} else {
													        	?>
													        		<option value="<?php echo ($row1['id_cliente']);?>"><?php echo (utf8_encode($row1['nombre']));?></option>
													        	<?php
													        	}
													        }
													        // Free result set
													        mysqli_free_result($result1);
													    } else{
													        echo "No hay datos para mostrar.";
													    }
													} else{
													    echo "ERROR: Could not able to execute $sql1. " . mysqli_error($conexion);
													}
												?>
											</select>
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
										    <h4>Fecha de Entrega Interna</h4>
										    <input type="text" id="fecha_entrega_editar_proyecto" class="form-control datepicker_fecha_entrega_editar"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
										</div>
									</div>
									<div class="col-md-1">
										<div class="form-group">
										    <h4>Hora</h4>
										    <input type="number" id="hora_interno_editar" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
										</div>
									</div>
									<div class="col-md-1">
										<div class="form-group">
										    <h4>Minutos</h4>
										    <input type="number" id="minutos_interno_editar" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
										    <h4>Fecha de Entrega a Cliente</h4>
										    <input type="text" id="fecha_envio_editar_proyecto" class="form-control datepicker_fecha_envio_editar"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
										</div>
									</div>
									<div class="col-md-1">
										<div class="form-group">
										    <h4>Hora</h4>
										    <input type="number" id="hora_cliente_editar" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
										</div>
									</div>
									<div class="col-md-1">
										<div class="form-group">
										    <h4>Minutos</h4>
										    <input type="number" id="minutos_cliente_editar" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
										    <h4>Producto</h4>
										    <input type="text" id="producto_editar_proyecto" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
										    <h4>Proyecto</h4>
										    <input type="text" id="nombre_editar_proyecto" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
										    <h4>Tipo de Servicio</h4>
										    <select class="form-control" id="dropdown_tipo_cotizacion_editar" >
										      	<option value="">Seleccionar</option>
									    		<?php
													// Attempt select query execution
													$sql2 = "SELECT * FROM tipo_cotizacion ORDER BY tipo_cotizacion ASC";
													mysql_query("SET NAMES 'utf8'");
													if($result2 = mysqli_query($conexion, $sql2)){
													    if(mysqli_num_rows($result2) > 0){
													        $i = 0;
													        while($row2 = mysqli_fetch_array($result2)){
																if($row2['tipo_cotizacion'] == $row['tipo_cotizacion']){
														        	?>
														        		<option value="<?php echo ($row2['id_tipo_cotizacion']);?>" SELECTED><?php echo (utf8_encode($row2['tipo_cotizacion']));?></option>
														        	<?php
														        	} else {
														        	?>
														        		<option value="<?php echo ($row2['id_tipo_cotizacion']);?>"><?php echo (utf8_encode($row2['tipo_cotizacion']));?></option>
														        	<?php
														        	}
													        }
													        // Free result set
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
									<div class="col-md-3">
									<div class="form-group">
									    <h4>Subtipo de Servicio</h4>
									    <select class="form-control" id="dropdown_subtipo_cotizacion_editar" >
									      	<option value="">Seleccionar</option>
								    		<?php
												// Attempt select query execution
												$sql3 = "SELECT * FROM subtipo_cotizacion ORDER BY nombre_subtipo ASC";
												mysql_query("SET NAMES 'utf8'");
												if($result3 = mysqli_query($conexion, $sql3)){
												    if(mysqli_num_rows($result3) > 0){
												        $i = 0;
												        while($row4 = mysqli_fetch_array($result3)){
												        	if($row4['id_subtipo_cotizacion'] == $row['subtipo_cotizacion']){
												        	?>
												        		<option value="<?php echo ($row4['id_subtipo']);?>" SELECTED><?php echo (utf8_encode($row4['nombre_subtipo']));?></option>
												        	<?php
												        	} else {
												        	?>
												        		<option value="<?php echo ($row4['id_subtipo']);?>"><?php echo (utf8_encode($row4['nombre_subtipo']));?></option>
												        	<?php
												        	}
												        }
												        // Free result set
												        mysqli_free_result($result3);
												    } else{
												        echo "No hay datos para mostrar.";
												    }
												} else{
												    echo "ERROR: Could not able to execute $sql3. " . mysqli_error($conexion);
												}
											?>
										</select>
									</div>
								</div>
									<div class="col-md-12">
										<div class="form-group">
										    <h4>Detalle</h4>
										    <textarea row="8" id="detalle_editar_proyecto" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"></textarea>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
										    <h4>Precio</h4>
										    <div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text">$</div>
												</div>
												<input type="number" class="form-control form-control-lg" id="precio_cliente_editar_proyecto">
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
										    <h4>Costo</h4>
										    <div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text">$</div>
												</div>
												<input type="number" class="form-control form-control-lg" id="editar_costo_presupuestado">
												<input type="number" id="id_editar_proyecto" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" hidden>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
										    <h4>Consumido</h4>
										    <div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text">$</div>
												</div>
												<input type="number" class="form-control form-control-lg" id="editar_consumido" readonly>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<button type="button" class="btn btn-success btn-block" id="boton_editar_proyecto"><strong>GUARDAR</strong></button>
									</div>
									<div class="col-md-6">
										<button type="button" class="btn btn-danger btn-block " data-dismiss="modal"><strong>CANCELAR</strong></button>
									</div>
		      					</div>
		      				</form>
      					</div>
					</div>
				</div>
			</div>
			<!-- Modal Solicitar Adicional -->
			<div class="modal fade" id="modal_solicitar_adicional" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle" style="margin-left: 15px;">Solicitud de Adicional</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12">
									<span id="mostrar_adicionales"></span>
									<div class="form-group">
									    <h4>Monto solicitado</h4>
									    <div class="input-group">
											<div class="input-group-prepend">
												<div class="input-group-text">$</div>
											</div>
											<input type="number" class="form-control form-control-lg" id="mostrar_monto_adicional" value="0" readonly>
											<input type="number" class="form-control form-control-lg" id="id_proyecto_adicional" value="0" hidden>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<h4>Motivo</h4>
										<textarea row="8" id="mostrar_motivo_adicional" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="0" readonly></textarea>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-success" id="boton_aprobar_adicional">Aprobar</button>
							<button type="button" class="btn btn-danger" id="boton_denegar_adicional">Denegar</button>
						</div>
					</div>
				</div>
			</div>

			<!-- Modal Nuevo Cliente-->
			<div class="modal fade" id="modal_nuevo_cliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form method="POST" id="nuevo_cliente" name="nuevo_cliente">
								<div class="row">
									<div class="col-md-12"><h2>Nuevo Cliente</h2></div>
									<div class="col-md-6">
										<div class="form-group">
										    <h4>Nombre de Fantasía</h4>
										    <input type="text" id="nombre_cliente_nuevo" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
										    <h4>CUIT</h4>
										    <input type="text" id="cuit_cliente_nuevo" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
										</div>
									</div>
									<div class="col-md-9">
										<div class="form-group">
										    <h4>Razón Social</h4>
										    <input type="text" id="razon_social_cliente_nuevo" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
										    <input type="number" id="id" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" hidden>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-check" style="margin-top: 48px;">
											<input class="form-check-input" type="checkbox" id="nuevo_oc" style="margin-top: 8px;">
											<label class="form-check-label" for="nuevo_oc">
												<h4>¿Necesita OC?</h4>
											</label>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
										    <h4>Tiempo de Cobro</h4>
										    <div class="input-group">
											    <input type="text" id="tiempo_pago_cliente_nuevo" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
											    <div class="input-group-prepend">
													<div class="input-group-text">días</div>
												</div>
											</div>
										    <input type="number" id="id" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" hidden>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
										    <h4>Forma de Cobro</h4>
										    <select class="form-control" id="dropdown_forma_pago_nuevo" >
									      	<option value="">Seleccionar</option>
								    		<?php
												// Attempt select query execution
												$sql = "SELECT * FROM forma_pago";
												mysql_query("SET NAMES 'utf8'");
												if($result = mysqli_query($conexion, $sql)){
												    if(mysqli_num_rows($result) > 0){
												        $i = 0;
												        while($row = mysqli_fetch_array($result)){
											?>
											<option value="<?php echo ($row['tipo']);?>"><?php echo ($row['tipo']);?></option>
											<?php
												        }
												        // Free result set
												        mysqli_free_result($result);
												    } else{
												        echo "No hay datos para mostrar.";
												    }
												} else{
												    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conexion);
												}
											?>
										</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
										    <h4>Porcentaje de Ocurrencia</h4>
										    <div class="input-group">
												<input type="text" class="form-control" id="porcentaje_ocurrencia_nuevo">
												<div class="input-group-prepend">
													<div class="input-group-text">%</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<button type="button" class="btn btn-success btn-block" id="boton_agregar"><strong id="texto_guardar">GUARDAR</strong></button>
									</div>
									<div class="col-md-6">
										<button type="button" class="btn btn-danger btn-block" id="cancelar_cliente_nuevo"><strong>CANCELAR</strong></button>
									</div>
		      					</div>
		      				</form>
      					</div>
					</div>
				</div>
			</div>
		</div>
		<section>
			<div id="linea"></div>
		</section>
		<script type="text/javascript">
			$(document).ready(function(){
				var suma_costo_presupuestado = 0;
				$('.valor_costo_presupuestado').each(function(){
				    suma_costo_presupuestado += parseFloat($(this).text());  // Or this.innerHTML, this.innerText
				    console.log(suma_costo_presupuestado);
				    var this_input_box = document.getElementById("costo_presupuesto_total");
					this_input_box.placeholder = suma_costo_presupuestado;
				});

				var valor_saldo_total = 0;
				$('.valor_saldo_total').each(function(){
				    valor_saldo_total += parseFloat($(this).text());  // Or this.innerHTML, this.innerText
				    console.log(valor_saldo_total);
				    var this_input_box = document.getElementById("saldo_total");
					this_input_box.placeholder = valor_saldo_total;
				});

				var valor_precio_cliente = 0;
				$('.valor_precio_cliente').each(function(){
				    valor_precio_cliente += parseFloat($(this).text());  // Or this.innerHTML, this.innerText
				    console.log(valor_precio_cliente);
				    var this_input_box = document.getElementById("precio_total");
					this_input_box.placeholder = valor_precio_cliente;
				});
			});


			$("#boton_volver").click(function(){
				window.location.href = "home.php";
			});

			$('#boton_guardar_proyecto').click(function(event){

				var cliente = $("#dropdown_cliente_nuevo").val();
				var tipo_cotizacion = $("#dropdown_tipo_cotizacion_nuevo").val();
				var subtipo_cotizacion = $("#dropdown_subtipo_cotizacion_nuevo").val();
				var nombre = $("#nuevo_proyecto").val();
				var producto = $("#nuevo_producto").val();
				var detalle = $("#nuevo_detalle").val();
				var costo_presupuestado = $("#nuevo_costo_presupuestado").val();
				var detalle = $("#nuevo_detalle").val();
				var nuevo_fecha_entrega = $("#nuevo_fecha_entrega").val();
				var nuevo_fecha_envio = $("#nuevo_fecha_envio").val();
				var nuevo_precio_cliente = $("#nuevo_precio_cliente").val();

				var hora_interno = $("#hora_interno").val();
				var minutos_interno = $("#minutos_interno").val();

				var hora_cliente = $("#hora_cliente").val();
				var minutos_cliente = $("#minutos_cliente").val();

				var dataString = 'nombre='+nombre+'&producto='+producto+'&cliente='+cliente+'&detalle='+detalle+'&tipo_cotizacion='+tipo_cotizacion+'&subtipo_cotizacion='+subtipo_cotizacion+'&costo_presupuestado='+costo_presupuestado+'&nuevo_fecha_entrega='+nuevo_fecha_entrega+'&nuevo_fecha_envio='+nuevo_fecha_envio+'&nuevo_precio_cliente='+nuevo_precio_cliente+'&hora_interno='+hora_interno+'&minutos_interno='+minutos_interno+'&hora_cliente='+hora_cliente+'&minutos_cliente='+minutos_cliente;

				console.log(dataString);
				$.ajax({
                     url:"agregar_proyecto.php",
                     method:"POST",
                     data: dataString,
                     success:function(data){
						$('#modal_nuevo_proyecto').modal('hide');
						window.location.reload();
                     }
                });
			});

			$('.fa-edit').click(function(){
				var id = $(this).attr('data-id');
				console.log(id);
				$.ajax({
	                url:"cargar_proyecto.php",
	                method:"POST",
	                data:{id:id},
	                dataType:"json",
	                success:function(data){
	                	$('#detalle_editar_proyecto').trumbowyg('html', data.detalle);
	                     $('#nombre_editar_proyecto').val(data.nombre_proyecto);
	                     $('#producto_editar_proyecto').val(data.producto_proyecto);
	                     $('#cliente_dropdown_editar_proyecto').val(data.cliente);
	                     //$('#detalle_editar_proyecto').val(data.detalle);
	                     $('#editar_costo_presupuestado').val(data.costo_presupuestado);
	                     $('#id_editar_proyecto').val(data.id);
	                     $('#precio_cliente_editar_proyecto').val(data.precio);
	                     $('#fecha_entrega_editar_proyecto').val(data.fecha_entrega);
	                     $('#fecha_envio_editar_proyecto').val(data.fecha_envio);
	                     $('#editar_consumido').val(data.consumido);
	                     $('#hora_interno_editar').val(data.hora_interno);
	                     $('#minutos_interno_editar').val(data.minutos_interno);
	                     $('#hora_cliente_editar').val(data.hora_cliente);
	                     $('#minutos_cliente_editar').val(data.minutos_cliente);
	                     $('#modal_editar_proyecto').modal('show');
	                     $('#dropdown_tipo_cotizacion_editar').val(data.tipo_cotizacion);
	                     $('#dropdown_subtipo_cotizacion_editar').val(data.subtipo_cotizacion);
	                }
	           });
			});

			$('.click_adicional').click(function(){
				id = $(this).data("id");
		        console.log(id);
		        window.location = "ver_adicionales.php?id="+id;

				/*var id = $(this).attr('data-id');
				console.log(id);
				$.ajax({
	                url:"cargar_adicional.php",
	                method:"POST",
	                data:{id:id},
	                dataType:"json",
	                success:function(data){
	                	$("#mostrar_adicionales").html(data);
	                    $('#modal_solicitar_adicional').modal('show');
	                }
	           }); */
			});

			$('#boton_editar_proyecto').click(function(event){
				var cliente = $("#cliente_dropdown_editar_proyecto").val();
				var nombre = $("#nombre_editar_proyecto").val();
				var producto = $("#producto_editar_proyecto").val();
				var detalle = $("#detalle_editar_proyecto").val();
				var costo_presupuestado = $("#editar_costo_presupuestado").val();
				var id = $("#id_editar_proyecto").val();
				var fecha_entrega = $("#fecha_entrega_editar_proyecto").val();
				var fecha_envio = $("#fecha_envio_editar_proyecto").val();
				var precio_cliente = $("#precio_cliente_editar_proyecto").val();
				var consumido = $('#editar_consumido').val();
				var tipo_cotizacion = $("#dropdown_tipo_cotizacion_editar").val();
				var subtipo_cotizacion = $("#dropdown_subtipo_cotizacion_editar").val();

				var hora_interno = $("#hora_interno_editar").val();
				var minutos_interno = $("#minutos_interno_editar").val();

				var hora_cliente = $("#hora_cliente_editar").val();
				var minutos_cliente = $("#minutos_cliente_editar").val();

				costo_presupuestado = parseFloat(costo_presupuestado);
				precio_cliente = parseFloat(precio_cliente);
				consumido = parseFloat(consumido);

				saldo = costo_presupuestado - consumido;



				var dataString = 'nombre='+nombre+'&cliente='+cliente+'&producto='+producto+'&detalle='+detalle+'&costo_presupuestado='+costo_presupuestado+'&fecha_entrega='+fecha_entrega+'&fecha_envio='+fecha_envio+'&precio_cliente='+precio_cliente+'&id='+id+'&saldo='+saldo+'&tipo_cotizacion='+tipo_cotizacion+'&subtipo_cotizacion='+subtipo_cotizacion+'&hora_interno='+hora_interno+'&minutos_interno='+minutos_interno+'&hora_cliente='+hora_cliente+'&minutos_cliente='+minutos_cliente;
				console.log(dataString);
				console.log(precio_cliente);
				$.ajax({
                     url:"editar_proyecto.php",
                     method:"POST",
                     data: dataString,
                     success:function(data){
						$('#modal_editar_proyecto').modal('hide');
						window.location.reload();
                     }
                });
			});

			$('.fa-trash-alt').click(function(){
				$('#modal_eliminar').modal('show');
				var id = $(this).attr('data-id');
				var nombre = $(this).attr('data-nombre');
				$('#boton_eliminar_cliente').click(function(){
					console.log(id);
					$.ajax({
		                url:"eliminar_proyecto.php",
		                method:"POST",
		                data:'id='+id+'&nombre='+nombre,
		                success:function(data){
		                	$('#modal_eliminar').modal('hide');
							window.location.reload();
		                }
		           });
				});
			});

			$('#boton_aprobar_adicional').click(function(event){
				var monto_adicional = $("#mostrar_monto_adicional").val();
				var id_proyecto = $('#id_proyecto_adicional').val();
				monto_adicional = parseFloat(monto_adicional);
				console.log(monto_adicional);
				var dataString = 'monto_adicional='+monto_adicional+'&id_proyecto='+id_proyecto;

				$.ajax({
                     url:"aprobar_adicional.php",
                     method:"POST",
                     data: dataString,
                     success:function(data){
						$('#modal_solicitar_adicional').modal('hide');
						//window.location.reload();
						var estado = "NUEVO";
						var id = $('#id_proyecto_adicional').val();
						console.log(estado);
						$.ajax({
			                url:"cambiar_estado.php",
			                method:"POST",
			                data:'id='+id+'&estado='+estado,
			                success:function(data){
								window.location.reload();
			                }
			           });
                     }
                });
			});

			$('#boton_nuevo_cliente').click(function(){
				var frm = document.getElementsByName('nuevo_cliente')[0];
			   frm.reset();
			});

			$('#agregar_cliente').click(function(){
				$('#modal_nuevo_proyecto').modal('hide');
				$('#modal_nuevo_cliente').modal('show');
			});


			$('#cancelar_cliente_nuevo').click(function(){
				$('#modal_nuevo_cliente').modal('hide');
				$('#modal_nuevo_proyecto').modal('show');
			});

			$('#boton_agregar').click(function(event){
				var nombre = $("#nombre_cliente_nuevo").val();
				var razon_social = $("#razon_social_cliente_nuevo").val();
				var cuit = $("#cuit_cliente_nuevo").val();
				var id = $("#id").val();
				var tiempo_pago = $("#tiempo_pago_cliente_nuevo").val();
				var forma_pago = $("#dropdown_forma_pago_nuevo").val();
				var porcentaje_ocurrencia = $("#porcentaje_ocurrencia_nuevo").val();

				var nuevo_oc = document.getElementById("nuevo_oc");
				if (nuevo_oc.checked) {
					nuevo_oc = "SI";
				} else {
					nuevo_oc = "NO";
				};

				var dataString = 'nombre='+nombre+'&razon_social='+razon_social+'&cuit='+cuit+'&id='+id+'&tiempo_pago='+tiempo_pago+'&forma_pago='+forma_pago+'&porcentaje_ocurrencia='+porcentaje_ocurrencia+'&nuevo_oc='+nuevo_oc;

				console.log(dataString);
				$.ajax({
                     url:"agregar_cliente.php",
                     method:"POST",
                     data: dataString,
                     success:function(data){
						$('#modal_nuevo_cliente').modal('hide');
						window.location.reload(true);
						$('#modal_nuevo_proyecto').modal('show');
                     }
                });
			});

		</script>
		<script>
	        $('.datepicker_fecha_entrega').datepicker({
	            uiLibrary: 'bootstrap4',
	            format: 'dd/mm/yyyy',
	            locale: 'es-es'
	        });
	        $('.datepicker_fecha_envio').datepicker({
	            uiLibrary: 'bootstrap4',
	            format: 'dd/mm/yyyy',
	            locale: 'es-es'
	        });
	        $('.datepicker_fecha_entrega_editar').datepicker({
	            uiLibrary: 'bootstrap4',
	            format: 'dd/mm/yyyy',
	            locale: 'es-es'
	        });
	        $('.datepicker_fecha_envio_editar').datepicker({
	            uiLibrary: 'bootstrap4',
	            format: 'dd/mm/yyyy',
	            locale: 'es-es'
	        });
	    </script>

	    <script type="text/javascript">
			$(".fa-eye").click(function() {
		        id = $(this).data("id");
		        console.log(id);
		        window.location = "ver_cotizaciones.php?id="+id;
		    });
		</script>
		<script type="text/javascript">
			$('#nuevo_detalle').trumbowyg({
				lang: 'es_ar',
				autogrow: true
			});

			$('#detalle_editar_proyecto').trumbowyg({
				lang: 'es_ar',
				autogrow: true
			});
		</script>
	</body>
</html>
