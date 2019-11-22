<?php 
	include "conexion.php"; 
	mysql_set_charset('utf8');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Viva Admin | Adicionales</title>
	  	<meta charset="utf-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1">
	  	
	  	<link rel="stylesheet" href="css/normalize.css">
	  	<link rel="stylesheet" href="css/jquery-ui.css">
	  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	  	<link rel="stylesheet" href="css/style.css">
	  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	  	
	  	<script src="js/jquery.min.js"></script>
	  	<script src="js/popper.min.js"></script>
	  	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" crossorigin="anonymous"></script>
	  	
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
						<h3 style="font-size: 3em;">Adicionales</h3>
					</div>
				</div>

				<div class="row">
					<div class="table-responsive">
						<table class="table table-striped" id="table_format">
							<thead>
								<tr>
									<th scope="col">Cotización</th>
									<th scope="col">Detalle</th>
									<th scope="col">Monto pedido</th>
									<th scope="col">Estado</th>
									<th scope="col">Cargo Cliente</th>
								</tr>
							</thead>
							<tbody>
								<?php
									// Attempt select query execution
									$sql = "SELECT * FROM adicionales a INNER JOIN registros r ON a.id_cotizacion_adicional = r.id INNER JOIN condicion_cotizacion cc2 ON  r.condicion_registro = cc2.id_concot WHERE id_proyecto_adicional = '".$_GET['id']."'";
									mysql_query("SET NAMES 'utf8'");
									if($result = mysqli_query($conexion, $sql)){
									    if(mysqli_num_rows($result) > 0){
									        $i = 0;
									        while($row = mysqli_fetch_array($result)){
									        	if($row['adicional_cliente'] == 0){
									        		$adicional_cliente = "NO";
									        	} else {
									        		$adicional_cliente = "SI";
									        	}
								?>
										<tr>
											<td scope="row" style="width: 30%;"><?php echo ($row['detalle_registro']);?></td>
											<td style="width: 25%;"><?php echo ($row['motivo_adicional']);?></td>
											<td style="width: 15%;"><strong>$ <?php echo ($row['monto_adicional']);?></strong></td>
											<?php
												if ($row['aprobado_adicional'] == 0){
											?>
													<td>
														<button class="btn btn-success aprobar_adicional" data-id="<?php echo ($row['id_adicional']);?>" data-monto="<?php echo ($row['monto_adicional']);?>" style="cursor: pointer; width: 15%; display: inline-block; margin-top: 0;"><i class="fas fa-check"></i></button>
														<button class="btn btn-danger denegar_adicional" data-id="<?php echo ($row['id_adicional']);?>" style="cursor: pointer; width: 15%; display: inline-block; margin-top: 0;"><i class="fas fa-ban"></i></button>
													</td>
													<td>
														<input class="form-check-input cargo_cliente" type="checkbox" id="cargo_cliente" style="margin-top: 8px;">
														<label class="form-check-label" for="cargo_cliente">
														</label>
													</td>
											<?php
												} elseif ($row['aprobado_adicional'] == 1){
											?>
													<td><i class="fas fa-check"></i></td>
													<td style="width: 10%;"><strong><?php echo ($adicional_cliente);?></strong></td>
											<?php
												} else {
											?>
													<td><i class="fas fa-ban"></i></td>
													<td></td>
											<?php
												}
											?>
										</tr>
								<?php
									        }
									        // Free result set
									        mysqli_free_result($result);
									    } else{
									        echo "No hay cotizaciones cargadas.";
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
			<section id="bloque_bottom">
				<div class="row">
					<div class="col-md-12 border-top"></div>
					<?php
						//echo $_GET['id'];
						// Attempt select query execution
						$sql = "SELECT * FROM proyectos p LEFT JOIN clientes c ON p.cliente = c.id_cliente WHERE id = '".$_GET['id']."'";
						mysql_query("SET NAMES 'utf8'");
						if($result = mysqli_query($conexion, $sql)){
						    if(mysqli_num_rows($result) > 0){
						        $i = 0;
						        while($row = mysqli_fetch_array($result)){
					?>
								<div class="col-md-4 text-center">
									<div class="form-group">
									    <h4>Cliente: <span id="ingreso_cliente"><?php echo ($row['nombre']);?></span></h4>
									</div>
								</div>
								<div class="col-md-4 text-center">
									<div class="form-group">
									    <h4>Proyecto: <span id="ingreso_proyecto"><?php echo ($row['nombre_proyecto']);?></span></h4>
									</div>
								</div>
								<div class="col-md-4 text-center">
									<div class="form-group">
									    <h4>Estado: <span id="tipo_estado"><?php echo ($row['estado']);?></span></h4>
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
									    <h4>Costo Asignado</h4>
									    <div class="input-group">
											<div class="input-group-prepend">
												<div class="input-group-text">$</div>
											</div>
											<input type="text" class="form-control form-control-lg" id="costo_presupuesto_total" readonly placeholder="<?php echo ($row['costo_presupuestado']);?>">
										</div>
									</div>
								</div>
								<div class="col-md-4" id="mostrar_costo_presupuestado">
									<div class="form-group">
									    <h4>Costo Consumido</h4>
									    <div class="input-group">
											<div class="input-group-prepend">
												<div class="input-group-text">$</div>
											</div>
											<input type="text" class="form-control form-control-lg" id="consumido_total" readonly placeholder="<?php echo ($row['consumido']);?>">
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
											<input type="text" class="form-control form-control-lg" id="saldo_total" readonly placeholder="<?php echo ($row['saldo']);?>">
										</div>
									</div>
								</div>
								<span id="ingreso_id" style="display: none;"><?php echo ($row['id']);?></span>
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
				</div>
			</section>
			<section>
				<div class="row">
					<div class="col-md-10"></div>
					<div class="col-md-2">
				    	<button class="btn btn-block btn-danger" id="boton_volver" style="cursor: pointer;">VOLVER</button>
					</div>
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

		<!-- Modal Aprobar Cotización -->
		<div class="modal fade" id="modal_aprobar_cotizacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">¿Aprobar Cotización?</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-success" id="boton_aprobar_cotizacion" data-dismiss="modal">Aprobar</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="modal_estado_mensaje" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
						<button type="button" class="btn btn-success" id="boton_estado_mensaje">Enviar</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
					</div>
				</div>
			</div>
		</div>

		<script type="text/javascript">
			$(document).ready(function(){
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
						break;
				}
			});

			$('.aprobar_adicional').click(function(){
				var id_proyecto = document.getElementById('ingreso_id').innerHTML;
				var id_adicional = $(this).attr('data-id');
				var monto_adicional = $(this).attr('data-monto');
				var costo = document.getElementById('costo_presupuesto_total').placeholder;
				var consumido = document.getElementById('consumido_total').placeholder;
				var saldo = document.getElementById('saldo_total').placeholder;

				monto_adicional = parseFloat(monto_adicional);
				costo = parseFloat(costo);
				saldo = parseFloat(saldo);

				if($(".cargo_cliente").is(':checked')) {
					
					costo = costo + monto_adicional;
					saldo = saldo + monto_adicional;

					console.log("Costo: ",costo);
					console.log("Consumido: ",consumido);
					console.log("Saldo: ",saldo);

					var cargo_cliente = 1;

				} else {

					saldo = saldo + monto_adicional;

					console.log("Costo: ",costo);
					console.log("Consumido: ",consumido);
					console.log("Saldo: ",saldo);

					var cargo_cliente = 0;
				}

				$.ajax({  
	                url:"aprobar_adicional.php",
	                method:"POST",  
	                data:'id_adicional='+id_adicional+'&id_proyecto='+id_proyecto+'&costo='+costo+'&saldo='+saldo+'&cargo_cliente='+cargo_cliente,
	                success:function(data){
	                	$('#modal_estado_mensaje').modal('hide');
						window.location.reload(true);
	                }
	           	});
			});

			$('.denegar_adicional').click(function(){
				var id_adicional = $(this).attr('data-id');
				$.ajax({  
	                url:"denegar_adicional.php",
	                method:"POST",  
	                data:'id_adicional='+id_adicional,
	                success:function(data){
	                	$('#modal_estado_mensaje').modal('hide');
						window.location.reload(true);
	                }
	           	});
			});

			$('#boton_volver').click(function(){
				window.location.href = 'pedido_cotizacion.php';
			});

			$(document).on("change", ".sumar", function() {
			    var sum = 0;
			    $(".sumar").each(function(){
			        sum += +$(this).val();
			    });
			    $(".importe_bruto").val(sum);
			});

			$('#boton_aprobar_cotizacion').click(function(){
				var id = document.getElementById('ingreso_id').innerHTML;
				var estado = "APROBADO";
				$.ajax({  
	                url:"cambiar_estado.php",
	                method:"POST",  
	                data:'id='+id+'&estado='+estado,
	                success:function(data){
	                	var mensaje = "APROBADO";
						$.ajax({  
			                url:"enviar_mensaje.php",
			                method:"POST",  
			                data:'id='+id+'&estado='+estado+'&mensaje='+mensaje,
			                success:function(data){
			                	$('#modal_estado_mensaje').modal('hide');
								window.location.reload();
			                }
			            });
	                }
	           }); 
			});

			$('.cambio_estado_mensaje').click(function(){
				var estado = $(this).attr('data-estado');
				console.log(estado);
				document.getElementById('texto_cambio_estado').innerHTML = estado;
				$('#modal_estado_mensaje').modal('show');
			});

			$('.cambio_estado_aprobar').click(function(){
				var estado = $(this).attr('data-estado');
				console.log(estado);
				$('#modal_aprobar_cotizacion').modal('show');
			});

			$('#boton_estado_mensaje').click(function(){
				var estado = document.getElementById('texto_cambio_estado').innerHTML
				var id = document.getElementById('ingreso_id').innerHTML;
				var mensaje = document.getElementById('motivo_cambio_estado').value;
				$.ajax({  
	                url:"enviar_mensaje.php",
	                method:"POST",  
	                data:'id='+id+'&estado='+estado+'&mensaje='+mensaje,
	                success:function(data){
	                	$('#modal_estado_mensaje').modal('hide');
						window.location.reload();
	                }
	           }); 
			});

		</script>
	</body>
</html>