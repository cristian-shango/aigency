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
						<h3 style="font-size: 3em;">Cotizaciones</h3>
					</div>
				</div>

				<div class="row">
					<div class="table-responsive">
						<table class="table table-striped" id="table_format">
							<thead>
								<tr>
									<th scope="col">Item</th>
									<th scope="col">Cantidad</th>
									<th scope="col">Detalle</th>
									<th scope="col">Valor unitario</th>
									<th scope="col">Total</th>
									<th scope="col">Acciones</th>
								</tr>
							</thead>
							<tbody>
								<?php
									// Attempt select query execution
									$sql = "SELECT * FROM registros WHERE id_proyecto = '".$_GET['id']."'";
									mysql_query("SET NAMES 'utf8'");
									if($result = mysqli_query($conexion, $sql)){
									    if(mysqli_num_rows($result) > 0){
									        $i = 0;
									        while($row = mysqli_fetch_array($result)){
								?>
										<tr>
											<td scope="row"><?php echo ($row['item']);?></td>
											<td><?php echo ($row['cantidad']);?></td>
											<td style="text-align: left;"><?php echo ($row['detalle']);?></td>											
											<td>$ <span class="valor_importe_neto"><?php echo ($row['importe_neto']);?></span></td>
											<td>$ <span class="valor_importe_total" class="sumar_consumo"><?php echo ($row['importe_total']);?></span></td>
											<td><i class="far fa-trash-alt" data-toggle="modal" data-id="<?php echo ($row['id']);?>" data-valor="<?php echo ($row['importe_total']);?>"></i></td>
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

								<form id="formulario_cotizacion">
									<tr id="tr_mostrar">
										<td scope="row" style="width: 15%">
											<select class="form-control" id="ingreso_item" >
									      	<option value="">Seleccionar</option>
								    		<?php
												// Attempt select query execution
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
												        // Free result set
												        mysqli_free_result($result22);
												    } else{
												        echo "No hay datos para mostrar.";
												    }
												} else{
												    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conexion);
												}
											?>
										</select>
										</td>
										<td style="width: 5%">
											<input type="number" id="ingreso_cantidad" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default" oninput="calculate()">
										</td>
										<td style="width: 45%">
											<input type="text" id="ingreso_detalle" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
										</td>
										<td style="width: 15%">
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text">$</div>
												</div>
												<input type="number" class="form-control form-control" id="ingreso_importe_neto" oninput="calculate()">
											</div>
										</td>
										<td style="width: 15%">
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text">$</div>
												</div>
												<input type="number" class="form-control form-control importe_total" id="ingreso_importe_total" readonly value="0">
											</div>
										</td>
										<td style="width: 5%">
											<i class="far fa-plus-square" id="guardar_cotizacion"></i>
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
						        // Free result set
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
						// Attempt select query execution
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
						        // Free result set
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

		<script type="text/javascript">
			$(document).ready(function(){
/*
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
				});*/

				document.getElementById("formulario_cotizacion").reset();
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

			function calculate() {
				var myBox1 = document.getElementById('ingreso_cantidad').value;	
				var myBox2 = document.getElementById('ingreso_importe_neto').value;
				var result = document.getElementById('ingreso_importe_total');	
				var myResult = myBox1 * myBox2;
				result.value = myResult;
			};

			$('#guardar_cotizacion').click(function(){
				var id_proyecto = document.getElementById('ingreso_id').innerHTML;
				var item = $("#ingreso_item").val();
				var detalle = $("#ingreso_detalle").val();
				var cantidad = $("#ingreso_cantidad").val();
				var importe_neto = $("#ingreso_importe_neto").val();
				var importe_total = $("#ingreso_importe_total").val();
				var saldo = $("#saldo_total").val();
				var consumido = $("#consumido_total").val();

				cantidad = parseFloat(cantidad);
				importe_neto = parseFloat(importe_neto);
				importe_total = parseFloat(importe_total);
				saldo = parseFloat(saldo);
				consumido = parseFloat(consumido);
				consumido_total = consumido + importe_total;
				var saldo_total = saldo - importe_total;
				console.log(saldo_total);

				$.ajax({  
                     url:"agregar_cotizacion.php",  
                     method:"POST",
                     data: 'id_proyecto='+ id_proyecto+'&item='+ item+'&detalle='+ detalle+'&cantidad='+ cantidad+'&importe_neto='+ importe_neto+'&importe_total='+ importe_total+'&saldo_total='+ saldo_total+'&consumido_total='+ consumido_total,
                     success:function(data){  
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

			/*$('.cambio_estado').click(function(){
				var estado = $(this).attr('data-estado');
				var id = document.getElementById('ingreso_id').innerHTML;
				console.log(estado);
				$.ajax({  
	                url:"cambiar_estado.php",  
	                method:"POST",  
	                data:'id='+id+'&estado='+estado,
	                success:function(data){
						window.location.reload();
	                }  
	           }); 
			});*/

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

		</script>
	</body>
</html>