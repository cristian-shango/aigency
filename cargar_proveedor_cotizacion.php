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

	  	<script src="js/jquery.min.js"></script>
	  	<script src="js/popper.min.js"></script>
	  	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	  	<script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
    	<link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    	<script src="https://unpkg.com/gijgo@1.9.11/js/messages/messages.es-es.js" type="text/javascript"></script>

    	<script src="https://momentjs.com/downloads/moment.js" type="text/javascript"></script>
	  	
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
						<h3 style="font-size: 3em;">Carga de Proveedor a Cotización</h3>
					</div>
				</div>

				<div class="row">

				<?php
					// Attempt select query execution
					$sql = "SELECT * FROM registros WHERE id = '".$_GET['id']."'";
					mysql_query("SET NAMES 'utf8'");
					if($result = mysqli_query($conexion, $sql)){
					    if(mysqli_num_rows($result) > 0){
					        $i = 0;
					        while($row = mysqli_fetch_array($result)){
				?>
							<div class="col-md-11">
								<h4>Proveedor</h4>
								<select class="form-control" id="proveedores" value="$row['id_proveedor']">
							      	<option value="">Seleccionar</option>
						    		<?php
										// Attempt select query execution
										$sql1 = "SELECT * FROM proveedores ORDER BY descripcion";
										mysql_query("SET NAMES 'utf8'");
										if($result1 = mysqli_query($conexion, $sql1)){
										    if(mysqli_num_rows($result1) > 0){
										        $i = 0;
										        while($row1 = mysqli_fetch_array($result1)){
										        	if($row1['id_proveedor'] == $row['id_proveedor']){
										        	?>
										        		<option value="<?php echo ($row1['id_proveedor']);?>" SELECTED><?php echo (utf8_encode($row1['descripcion']));?> | <?php echo (utf8_encode($row1['razon_social']));?> | <?php echo (utf8_encode($row1['contacto']));?></option>
										        	<?php
										        	} else {
										        	?>
										        		<option value="<?php echo ($row1['id_proveedor']);?>"><?php echo (utf8_encode($row1['descripcion']));?> | <?php echo (utf8_encode($row1['razon_social']));?> | <?php echo (utf8_encode($row1['contacto']));?></option>
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
							<div class="col-md-1">
								<i class="far fa-plus-square" id="agregar_proveedor"></i>
							</div>
							
							<div class="col-md-6">
								<div class="form-group">
								    <h4>OT</h4>
								    <input type="text" class="form-control form-control" id="ot" readonly placeholder="<?php echo ($row['id']);?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								    <h4>Tipo de Item</h4>
								    <input type="text" class="form-control form-control" id="tipo_item" readonly placeholder="<?php echo ($row['item']);?>">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
								    <h4>Detalle</h4>
								    <textarea row="8" id="detalle" class="form-control" id="detalle" aria-label="Default" aria-describedby="inputGroup-sizing-default" readonly placeholder="<?php echo ($row['detalle_registro']);?>"></textarea>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
								    <h4>Forma de Pago</h4>
								    <select class="form-control" id="forma_pago_nuevo" value="$row['forma_pago']">
								      	<option value="">Seleccionar</option>
							    		<?php
											// Attempt select query execution
											$sql1 = "SELECT * FROM forma_pago";
											mysql_query("SET NAMES 'utf8'");
											if($result1 = mysqli_query($conexion, $sql1)){
											    if(mysqli_num_rows($result1) > 0){
											        $i = 0;
											        while($row1 = mysqli_fetch_array($result1)){
											        	if($row1['id'] == $row['forma_pago']){
											        	?>
											        		<option value="<?php echo ($row1['id']);?>" SELECTED><?php echo (utf8_encode($row1['tipo']));?></option>
											        	<?php
											        	} else {
											        	?>
											        		<option value="<?php echo ($row1['id']);?>"><?php echo (utf8_encode($row1['tipo']));?></option>
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
							<div class="col-md-4">
								<div class="form-group">
								    <h4>Tipo de Factura</h4>
								    <select class="form-control" id="tipo_factura_nuevo_registro" value="$row['tipo_factura']">
								      	<option value="">Seleccionar</option>
							    		<?php
											// Attempt select query execution
											$sql1 = "SELECT * FROM tipo_factura ORDER BY tipo_factura";
											mysql_query("SET NAMES 'utf8'");
											if($result1 = mysqli_query($conexion, $sql1)){
											    if(mysqli_num_rows($result1) > 0){
											        $i = 0;
											        while($row1 = mysqli_fetch_array($result1)){
											        	if($row1['tipo_factura'] == $row['tipo_factura']){
											        	?>
											        		<option value="<?php echo ($row1['tipo_factura']);?>" SELECTED><?php echo (utf8_encode($row1['tipo_factura']));?></option>
											        	<?php
											        	} else {
											        	?>
											        		<option value="<?php echo ($row1['tipo_factura']);?>"><?php echo (utf8_encode($row1['tipo_factura']));?></option>
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
							<div class="col-md-4">
								<div class="form-group">
								    <h4>Número de Factura</h4>
								    <input type="number" id="numero_factura_nuevo_registro" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php echo ($row['numero_factura']);?>">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
								    <h4>Fecha de Factura</h4>
								    <input type="text" id="fecha_facturacion" class="form-control datepicker_ff"  aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php echo ($row['fecha_factura']);?>">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
								    <h4>Tiempo de Pago</h4>
								    <div class="input-group">
									    <input type="text" id="tiempo_pago" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php echo ($row['tiempo_pago']);?>">
									    <div class="input-group-prepend">
											<div class="input-group-text">días</div>
										</div>
									</div>
								    <input type="number" id="id" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" hidden>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
								    <h4>Fecha de Pago</h4>
								    <input type="text" id="fecha_pago" class="form-control datepicker_fp"  aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php echo ($row['fecha_pago']);?>">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
								    <h4>Importe Neto</h4>
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">$</div>
										</div>
										<input type="text" class="form-control form-control-lg sumar" id="importe_neto" value="<?php echo ($row['importe_total']);?>">
									</div>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
								    <h4>Tipo IVA</h4>
								    <select class="form-control form-control-lg" id="tipo_iva">
								      	<option value="">Seleccionar</option>
							    		<?php
											// Attempt select query execution
											$sql3 = "SELECT * FROM iva ORDER BY valor_iva ASC";
											mysql_query("SET NAMES 'utf8'");
											if($result3 = mysqli_query($conexion, $sql3)){
											    if(mysqli_num_rows($result3) > 0){
											        $i = 0;
											        while($row3 = mysqli_fetch_array($result3)){
										?>
										<option value="<?php echo ($row3['valor_iva']);?>"><?php echo ($row3['valor_iva']);?>%</option>
										<?php
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

							<div class="col-md-2">
								<div class="form-group">
								    <h4>I.V.A.</h4>
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">$</div>
										</div>
										<input type="text" class="form-control form-control-lg sumar" value="<?php echo ($row['iva']);?>" id="iva" placeholder="<?php echo ($row['iva']);?>">
									</div>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
								    <h4>Percepción</h4>
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">$</div>
										</div>
										<input type="text" class="form-control form-control-lg sumar" value="<?php echo ($row['percepcion']);?>" placeholder="<?php echo ($row['percepcion']);?>" id="percepcion">
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
								    <h4>Importe Bruto</h4>
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">$</div>
										</div>
										<input type="text" id="importe_bruto" class="form-control form-control-lg importe_bruto" readonly value="<?php echo ($row['importe_bruto']);?>">
									</div>
								</div>
							</div>
							<?php
								if(empty($row['archivo_adjunto'])){
							?>
								<div class="col-md-12">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text">Adjuntar factura</span>
										</div>
										<div class="custom-file">
											<input type="file" class="custom-file-input" id="adjunto_nuevo_registro" data-existe="0">
											<label class="custom-file-label" for="adjunto_nuevo_registro"></label>
										</div>
									</div>
								</div>
							<?php
								} else {
							?>
								<div class="col-md-12">
									<a href="/uploads/<?php echo ($row['archivo_adjunto']);?>" target="_blank" style="font-weight: bold;" data-existe="1" id="adjunto_nuevo_registro">VER ARCHIVO ADJUNTO (<?php echo ($row['archivo_adjunto']);?>)</a>
								</div>
							<?php
								}
							?>
							<span style="display: none;" data-id="<?php echo ($row['id']);?>"></span>
							<div class="col-md-6">
								<button type="button" class="btn btn-success btn-block" id="boton_guardar_proveedor_cotizacion" data-id="<?php echo ($row['id']);?>"><strong>GUARDAR</strong></button>
							</div>
							<div class="col-md-6">
								<button type="button" class="btn btn-danger btn-block" id="boton_volver" data-id="<?php echo ($row['id_proyecto']);?>"><strong>VOLVER</strong></button>
							</div>
											
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

			</div>	
			</section>
		</div>
		<!-- Modal Nuevo Ultimo -->
		<div class="modal fade" id="modal_nuevo_proveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form method="POST" id="nuevo_proveedor">
							<div class="row">
								<div class="col-md-12"><h2>Datos del Proveedor</h2></div>
								<div class="col-md-4">
									<div class="form-group">
									    <h4>Servicio</h4>
									    <input type="text" id="servicio_nuevo" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
									</div>
								</div>
								<div class="col-md-8">
									<div class="form-group">
									    <h4>Descripción</h4>
									    <input type="text" id="descripcion_nuevo" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									    <h4>Razón Social</h4>
									    <input type="text" id="razon_social_nuevo" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									    <h4>CUIT</h4>
									    <input type="text" id="cuit_nuevo" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
									    <h4>Contacto</h4>
									    <input type="text" id="contacto_nuevo" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
									    <h4>Teléfono</h4>
									    <input type="text" id="telefono_nuevo" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
									    <h4>Celular</h4>
									    <input type="text" id="celular_nuevo" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
									    <h4>Mail</h4>
									    <input type="text" id="mail_nuevo" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
									    <h4>Sitio Web</h4>
									    <input type="text" id="web_nuevo" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
									    <h4>Ubicación</h4>
									    <input type="text" id="ubicacion_nuevo" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
									    <h4>Observaciones</h4>
									    <input type="text" id="observaciones_nuevo" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
									</div>
								</div>
								
								<div class="col-md-3">
									<div class="form-group">
									    <h4>ISO</h4>
									    <select class="form-control" id="iso_nuevo" >
									      	<option value="">Seleccionar</option>
											<option value="SI">SI</option>
											<option value="NO">NO</option>
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
									    <h4>Forma de Pago</h4>
									    <select class="form-control" id="forma_pago_nuevo">
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
								<div class="col-md-3">
									<div class="form-group">
									    <h4>Tiempo de Cobro</h4>
									    <div class="input-group">
										    <input type="text" id="tiempo_cobro_nuevo" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
										    <div class="input-group-prepend">
												<div class="input-group-text">días</div>
											</div>
										</div>
									    <input type="number" id="id" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" hidden>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
									    <h4>% de Obligatoriedad</h4>
									    <div class="input-group">
											<input type="text" class="form-control" id="obligatoriedad_nuevo">
											<div class="input-group-prepend">
												<div class="input-group-text">%</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
									    <h4>Descripción de Pago</h4>
									    <input type="text" id="descripcion_pago_nuevo" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
									</div>
								</div>
								<div class="col-md-6">
									<button type="button" class="btn btn-success btn-block" id="guardar_nuevo_proveedor"><strong id="texto_guardar">GUARDAR</strong></button>
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
		<script type="text/javascript">

			$("#tipo_iva").change(function(){
				valor = $(this).val();
				importe_neto = document.getElementById('importe_neto').value;
				importe_neto = parseFloat(importe_neto);
				iva = (importe_neto*valor)/100;
				document.getElementById('iva').value = iva;
				importe_bruto = importe_neto + iva;
				$(".importe_bruto").val(importe_bruto);
			});

			$('.datepicker_ff').change(function(){
				var fecha = document.getElementById('fecha_facturacion').value;
				var dias = document.getElementById('tiempo_pago').value;
				dias = parseFloat(dias);
				fecha_calculo = moment(fecha).add(dias, 'days').calendar();
				fecha_calculo = moment(fecha_calculo).format("L");
				console.log(fecha_calculo);
    			document.getElementById('fecha_pago').value = fecha_calculo;
			});

			$('#tiempo_pago').change(function(){
				var fecha = document.getElementById('fecha_facturacion').value;
				var dias = document.getElementById('tiempo_pago').value;
				dias = parseFloat(dias);
				fecha_calculo = moment(fecha).add(dias, 'days').calendar();
				fecha_calculo = moment(fecha_calculo).format("L");
				console.log(fecha_calculo);
    			document.getElementById('fecha_pago').value = fecha_calculo;
			});

			$('#proveedores').change(function(){
				id = $(this).val();
				console.log("Proveedor elegido: "+id);
				$.ajax({  
	                url:"cargar_proveedor.php",  
	                method:"POST",  
	                data:{id:id},
	                dataType:"json",
	                success:function(data){  
	                     $('#forma_pago').val(data.forma_pago);
	                     $('#tiempo_pago').val(data.tiempo_cobro);
	                }  
	           });
			});


			$(document).on("change", ".sumar", function() {
			    var sum = 0;
			    $(".sumar").each(function(){
			        sum += +$(this).val();
			    });
			    $(".importe_bruto").val(sum);
			});

			$('#boton_volver').click(function(){
				var id = $(this).attr('data-id');
				window.location = "cotizacion_aprobada.php?id="+id;
			});

			$('#agregar_proveedor').click(function(){
				$('#modal_nuevo_proveedor').modal('show');
			});
	
			$('#boton_guardar_proveedor_cotizacion').click(function(){
				var id = $(this).attr('data-id');
				var id_proveedor = $("#proveedores").val();
				var tipo_factura = $("#tipo_factura_nuevo_registro").val();
				var numero_factura = $("#numero_factura_nuevo_registro").val();
				var fecha_factura = $("#fecha_facturacion").val();
				var fecha_pactada = $("#fecha_pago").val();
				var importe_neto = $("#importe_neto").val();
				var iva = $("#iva").val();
				var percepcion = $("#percepcion").val();
				var importe_bruto = $("#importe_bruto").val();
				importe_neto = parseFloat(importe_neto);
				iva = parseFloat(iva);
				percepcion = parseFloat(percepcion);
				importe_bruto = parseFloat(importe_bruto);
				var existe = $("#adjunto_nuevo_registro").attr('data-existe');
				console.log(existe);

				if (existe == 0){
					var adjunto = $("#adjunto_nuevo_registro")[0].files[0];
					var archivo_adjunto = adjunto.name;

					if(archivo_adjunto = null){
						archivo_adjunto = null;
						$.ajax({  
						url:"agregar_proveedor_cotizacion.php",  
						method:"POST",
						data: 'id='+id+'&id_proveedor='+id_proveedor+'&tipo_factura='+tipo_factura+'&numero_factura='+numero_factura+'&fecha_factura='+fecha_factura+'&fecha_pactada='+fecha_pactada+'&archivo_adjunto='+archivo_adjunto+'&importe_neto='+importe_neto+'&iva='+iva+'&percepcion='+percepcion+'&importe_bruto='+importe_bruto,
							success:function(data){  
								var file_data = $('#adjunto_nuevo_registro').prop('files')[0]; 	
								var form_data = new FormData();                  
								form_data.append('file', file_data);
								console.log(file_data);
								console.log(form_data);
								$.ajax({
									url: 'subir_archivo.php',
									dataType: 'text',
									cache: false,
									contentType: false,
									processData: false,
									data: form_data,
									type: 'POST',
									success:function(data){
										//window.location.reload();
									}
								});
							}  
						});
					} else {
						$.ajax({  
						url:"agregar_proveedor_cotizacion.php",  
						method:"POST",
						data: 'id='+id+'&id_proveedor='+id_proveedor+'&tipo_factura='+tipo_factura+'&numero_factura='+numero_factura+'&fecha_factura='+fecha_factura+'&fecha_pactada='+fecha_pactada+'&archivo_adjunto='+archivo_adjunto+'&importe_neto='+importe_neto+'&iva='+iva+'&percepcion='+percepcion+'&importe_bruto='+importe_bruto,
							success:function(data){  
								var file_data = $('#adjunto_nuevo_registro').prop('files')[0]; 	
								var form_data = new FormData();                  
								form_data.append('file', file_data);
								console.log(file_data);
								console.log(form_data);
								$.ajax({
									url: 'subir_archivo.php',
									dataType: 'text',
									cache: false,
									contentType: false,
									processData: false,
									data: form_data,
									type: 'POST',
									success:function(data){
										//window.location.reload();
									}
								});
							}  
						});
					}
					
				} else{
					$.ajax({  
						url:"agregar_proveedor_cotizacion_sinimagen.php",  
						method:"POST",
						data: 'id='+id+'&id_proveedor='+id_proveedor+'&tipo_factura='+tipo_factura+'&numero_factura='+numero_factura+'&fecha_factura='+fecha_factura+'&fecha_pactada='+fecha_pactada+'&importe_neto='+importe_neto+'&iva='+iva+'&percepcion='+percepcion+'&importe_bruto='+importe_bruto,
						success:function(data){
							//window.location.reload();
						}
					});
				}

				
			});

            $('#adjunto_nuevo_registro').on('change',function(){
                var fileName = $(this).val();
                fileName = fileName.substring(fileName.lastIndexOf("\\") + 1, fileName.length);
                $(this).next('.custom-file-label').html(fileName);
            });

			var $tipo_factura_nuevo_registro = $('#tipo_factura_nuevo_registro');
			var $numero_factura_nuevo_registro = $('#numero_factura_nuevo_registro');
			var $fecha_facturacion = $('#fecha_facturacion');
			var $fecha_pago = $('#fecha_pago');
		    $iva_nuevo_registro = $('#iva_nuevo_registro');
			$tipo_factura_nuevo_registro.change(function() {
			    if ($tipo_factura_nuevo_registro.val() == 'A') {
			        $iva_nuevo_registro.removeAttr('disabled');
			        $numero_factura_nuevo_registro.removeAttr('disabled');
			        $fecha_facturacion.removeAttr('disabled');
			        $fecha_pago.removeAttr('disabled');
			    } else {
			        $iva_nuevo_registro.attr('disabled', 'disabled').val('');
			        if ($tipo_factura_nuevo_registro.val() == 'Sin Factura') {
			        	$numero_factura_nuevo_registro.attr('disabled', 'disabled').val('');
			        	$fecha_facturacion.attr('disabled', 'disabled').val('');
			        	$fecha_pago.attr('disabled', 'disabled').val('');
			        } else {
			        	$numero_factura_nuevo_registro.removeAttr('disabled');
			        	$fecha_facturacion.removeAttr('disabled');
			        	$fecha_pago.removeAttr('disabled');
			        }
			    }
			    if ($tipo_factura_nuevo_registro.val() == '') {
			    	$iva_nuevo_registro.attr('disabled', 'disabled').val('');
			    	$numero_factura_nuevo_registro.attr('disabled', 'disabled').val('');
			        $fecha_facturacion.attr('disabled', 'disabled').val('');
			        $fecha_pago.attr('disabled', 'disabled').val('');
			    }
			}).trigger('change'); // added trigger to calculate initial tipo_factura_nuevo_registro

			$('#guardar_nuevo_proveedor').click(function(event){				
				var servicio = $("#servicio_nuevo").val();
				var descripcion = $("#descripcion_nuevo").val();
				var razon_social = $("#razon_social_nuevo").val();
				var cuit = $("#cuit_nuevo").val();
				var contacto = $("#contacto_nuevo").val();
				var telefono = $("#telefono_nuevo").val();
				var celular = $("#celular_nuevo").val();
				var mail = $("#mail_nuevo").val();
				var web = $("#web_nuevo").val();
				var observaciones = $("#observaciones_nuevo").val();
				var ubicacion = $("#ubicacion_nuevo").val();
				var iso = $("#iso_nuevo").val();
				var forma_pago = $("#forma_pago_nuevo").val();
				var descripcion_pago = $("#descripcion_pago_nuevo").val();
				var tiempo_cobro = $("#tiempo_cobro_nuevo").val();
				var obligatoriedad = $("#obligatoriedad_nuevo").val();

				

				var dataString = 'servicio='+servicio+'&descripcion='+descripcion+'&razon_social='+razon_social+'&cuit='+cuit+'&contacto='+contacto+'&telefono='+telefono+'&celular='+celular+'&mail='+mail+'&web='+web+'&observaciones='+observaciones+'&ubicacion='+ubicacion+'&iso='+iso+'&forma_pago='+forma_pago+'&descripcion_pago='+descripcion_pago+'&tiempo_cobro='+tiempo_cobro+'&obligatoriedad='+obligatoriedad;

				console.log(dataString);
				$.ajax({  
                     url:"agregar_proveedor.php",  
                     method:"POST",
                     data: dataString,
                     success:function(data){  
						$('#modal_nuevo_proveedor').modal('hide');
						window.location.reload();
                     }  
                });
			});
			
			
			$('#tipo_factura_nuevo_registro').change(function() {
			    if ($('#tipo_factura_nuevo_registro').val() == 'A') {
			        $('#iva').removeAttr('disabled');
			        $('#tipo_iva').removeAttr('disabled');
			        $('#numero_factura').removeAttr('disabled');
			        $('#fecha_facturacion').removeAttr('disabled');
			        $('#percepcion').removeAttr('disabled');
			    } else {
			        $('#iva').attr('disabled', 'disabled').val('');
			        if ($('#tipo_factura_nuevo_registro').val() == 'Sin factura') {
			        	$('#numero_factura').attr('disabled', 'disabled').val('');
			        	$('#fecha_facturacion').attr('disabled', 'disabled').val('');
			        	$('#fecha_cobro').removeAttr('disabled');
			        	$('#iva').attr('disabled', 'disabled').val('');
			        	$('#tipo_iva').attr('disabled', 'disabled').val('');
				        $('#percepcion').attr('disabled', 'disabled').val('');
			        } else {
			        	$('#numero_factura').removeAttr('disabled');
			        	$('#fecha_facturacion').removeAttr('disabled');
			        	$('#tipo_iva').attr('disabled', 'disabled').val('');
			        	$('#fecha_cobro').removeAttr('disabled');
			        	$('#percepcion').attr('disabled', 'disabled').val('');
			        }
			    }
			    if ($('#tipo_factura_nuevo_registro').val() == '') {
			    	$('#iva').attr('disabled', 'disabled').val('');
			    	$('#tipo_iva').attr('disabled', 'disabled').val('');
			    	$('#numero_factura').attr('disabled', 'disabled').val('');
			        $('#fecha_facturacion').attr('disabled', 'disabled').val('');
			        $('#fecha_cobro').attr('disabled', 'disabled').val('');
			        $('#percepcion').attr('disabled', 'disabled').val('');
			    }
			}).trigger('change'); // added trigger to calculate initial tipo_factura

		</script>
		<script>
	        $('.datepicker_ff').datepicker({
	            uiLibrary: 'bootstrap4',
	            //format: 'dd/mm/yyyy',
	            locale: 'es-es'
	        });
	        $('.datepicker_fp').datepicker({
	            uiLibrary: 'bootstrap4',
	            //format: 'dd/mm/yyyy',
	            locale: 'es-es'
	        });
	    </script>
	</body>
</html>