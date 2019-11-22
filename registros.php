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
		<link rel="stylesheet" href="css/lightbox.min.css">
	  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	  	
	  	<script src="js/jquery.min.js"></script>
	  	<script src="js/popper.min.js"></script>
	  	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" crossorigin="anonymous"></script>
	  	<script src="js/lightbox.min.js"></script>
	  	
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
					<div class="col-md-6">
						<div class="form-group">
						    <h4>Cliente</h4>
						    <select class="form-control" id="dropdown_cliente" onChange="traer_proyectos();">
						    		<option value="">Seleccionar</option>
						    		<?php
										// Attempt select query execution
										$sql = "SELECT * FROM clientes";
										mysql_query("SET NAMES 'utf8'");
										if($result = mysqli_query($conexion, $sql)){
										    if(mysqli_num_rows($result) > 0){
										        $i = 0;
										        while($row = mysqli_fetch_array($result)){
									?>
									<option value="<?php echo ($row['nombre']);?>"><?php echo ($row['nombre']);?></option>
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
					<div class="col-md-6">
						<div class="form-group">
						    <div id="traer_proyectos"></div>
						</div>
					</div>
					
					<div class="col-md-12" id="mostrar_registros_titulo"><h4>Listado de Cotizaciones</h4></div>
					<div class="table-responsive" id="mostrar_registros">
						<table class="table table-striped">
							<thead>
								<tr>
									<th scope="col">Detalle</th>
									<th scope="col">Item</th>
									<!-- <th scope="col">OT</th> -->
									<th scope="col">Tipo Factura</th>
									<!-- <th scope="col">Nº Factura</th>
									<th scope="col">Fecha Factura</th>
									<th scope="col">Fecha Pactada</th> -->
									<th scope="col">Imp. Neto</th>
									<th scope="col">I.V.A.</th>
									<th scope="col">Perc.</th>
									<th scope="col">Imp. Bruto</th>
									<th scope="col">Adjunto</th>
									<th scope="col">Editar</th>
									<th scope="col">Borrar</th>
									<th scope="col">Estado</th>
								</tr>
							</thead>
							<tbody id="traer_registros"></tbody>
						</table>
					</div>
				</div>
			</section>
			<section id="bloque_bottom" class="border-top">
				<div class="container-flex">
					<div class="row">
						<div class="col-md-2">
					    	<button class="btn btn-block btn-lg btn-success" class="boton_nuevo_registro" style="cursor: pointer;"><i class="fas fa-plus"></i> NUEVO</button>
						</div>
						<div class="col-md-2">
					    	<button class="btn btn-block btn-lg btn-warning" class="boton_nuevo_registro" style="cursor: pointer;">EN PROCESO</button>
						</div>
						<div class="col-md-2">
					    	<button class="btn btn-block btn-lg btn-primary" class="boton_nuevo_registro" style="cursor: pointer;">ENTREGADO</button>
						</div>
						<div class="col-md-2">
					    	<button class="btn btn-block btn-lg btn-secondary" class="boton_nuevo_registro" style="cursor: pointer;">FRENADO</button>
						</div>
						<div class="col-md-2"></div>
						<div class="col-md-2">
					    	<button class="btn btn-block btn-lg btn-danger clickable" id="boton_volver" style="cursor: pointer;"><i class="fas fa-home"></i> VOLVER</button>
						</div>
						<div id="traer_costo_proyecto"></div>
						<div class="col-md-6" id="mostrar_costo_presupuestado">
							<div class="form-group">
							    <h4>Costo Presupuestado</h4>
							    <div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text">$</div>
									</div>
									<input type="text" class="form-control form-control-lg" id="costo_presupuesto_total" readonly placeholder="0">
								</div>
							</div>
						</div>
						<div class="col-md-6" id="mostrar_saldo">
							<div class="form-group">
							    <h4>Saldo</h4>
							    <div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text">$</div>
									</div>
									<input type="text" class="form-control form-control-lg" id="saldo_total" readonly placeholder="0">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="linea"></div>
			</section>
			<!-- Modal Eliminar -->
			<div class="modal fade" id="modal_eliminar_registro" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">¿Borrar Registro?</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
						</div>
					</div>
				</div>
			</div>

			<!-- Modal Nuevo registro -->
			<div class="modal fade" id="modal_nuevo_registro" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form method="POST" id="nuevo_registro" name="nuevo_registro">
								<div class="row">
									<div class="col-md-12"><h2>Nueva Cotización</h2></div>
									<div class="col-md-6">
										<div class="form-group">
										    <h4>Tipo de Item</h4>
										    <select class="form-control" id="item_nuevo_registro" >
										      	<option value="">Seleccionar</option>
												<option value="Alquiler">Alquiler</option>
												<option value="Servicio">Servicio</option>
												<option value="Varios">Varios</option>
												<option value="Otro">Otro</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
										    <h4>OT</h4>
										    <input type="number" id="ot_nuevo_registro" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
										    <h4>Detalle</h4>
										    <textarea row="8" id="detalle_nuevo_registro" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"></textarea>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
										    <h4>Tipo de Factura</h4>
										    <select class="form-control" id="tipo_factura_nuevo_registro" >
										      	<option value="">Seleccionar</option>
												<option value="A">A</option>
												<option value="C">C</option>
												<option value="Sin Factura">Sin Factura</option>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
										    <h4>Número de Factura</h4>
										    <input type="number" id="numero_factura_nuevo_registro" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
										    <h4>Fecha de Factura</h4>
										    <input type="text" id="fecha_factura_nuevo_registro" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="DD/MM/AAAA">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
										    <h4>Fecha Pactada</h4>
										    <input type="text" id="fecha_pactada_nuevo_registro" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="DD/MM/AAAA">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
										    <h4>Importe Neto</h4>
										    <div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text">$</div>
												</div>
												<input type="number" class="form-control form-control-lg sumar" id="importe_neto_nuevo_registro">
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
										    <h4>I.V.A.</h4>
										    <div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text">$</div>
												</div>
												<input type="number" class="form-control form-control-lg sumar" id="iva_nuevo_registro">
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
										    <h4>Percepción</h4>
										    <div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text">$</div>
												</div>
												<input type="number" class="form-control form-control-lg sumar" id="percepcion_nuevo_registro">
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
										    <h4>Importe Bruto</h4>
										    <div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text">$</div>
												</div>
												<input type="number" readonly class="form-control form-control-lg importe_bruto" id="importe_bruto_nuevo_registro">
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text">Adjuntar archivo</span>
											</div>
											<div class="custom-file">
												<input type="file" class="custom-file-input" id="adjunto_nuevo_registro">
												<label class="custom-file-label" for="adjunto_nuevo_registro"></label>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<button type="button" class="btn btn-success btn-block" id="boton_guardar_nuevo_registro"><strong>GUARDAR</strong></button>
									</div>
									<div class="col-md-6">
										<button type="button" class="btn btn-danger btn-block" data-dismiss="modal"><strong>CANCELAR</strong></button>
									</div>
		      					</div>
		      				</form>
      					</div>
					</div>
				</div>
			</div>

			<!-- Modal Editar -->
			<div class="modal fade" id="modal_editar_registro" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12"><h2>Edición de Cotización</h2></div>
								<div class="col-md-4">
									<div class="form-group">
									    <h4>Razón Social</h4>
									    <input type="number" id="objetivo" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
									    <h4>Tipo de Item</h4>
									    <select class="form-control" id="dropdown_items" >
									      	<option value="">Seleccionar</option>
											<option value="Alquiler">Alquiler</option>
											<option value="Servicio">Servicio</option>
											<option value="Varios">Varios</option>
											<option value="Otro">Otro</option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
									    <h4>OT</h4>
									    <input type="number" id="objetivo" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
									    <h4>Detalle</h4>
									    <textarea row="8" id="motivo_tematica" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"></textarea>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
									    <h4>Tipo de Factura</h4>
									    <select class="form-control" id="dropdown_dias" >
									      	<option value="">Seleccionar</option>
											<option value="A">"A"</option>
											<option value="C">"C"</option>
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
									    <h4>Número de Factura</h4>
									    <input type="number" id="objetivo" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
									    <h4>Fecha de Factura</h4>
									    <input type="text" id="objetivo" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="DD/MM/AAAA">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
									    <h4>Fecha Pactada</h4>
									    <input type="text" id="objetivo" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="DD/MM/AAAA">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
									    <h4>Importe Neto</h4>
									    <div class="input-group">
											<div class="input-group-prepend">
												<div class="input-group-text">$</div>
											</div>
											<input type="number" class="form-control form-control-lg" id="inlineFormInputGroupUsername">
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
									    <h4>I.V.A.</h4>
									    <div class="input-group">
											<div class="input-group-prepend">
												<div class="input-group-text">$</div>
											</div>
											<input type="number" class="form-control form-control-lg" id="inlineFormInputGroupUsername">
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
									    <h4>Percepción</h4>
									    <div class="input-group">
											<div class="input-group-prepend">
												<div class="input-group-text">$</div>
											</div>
											<input type="number" class="form-control form-control-lg" id="inlineFormInputGroupUsername">
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
									    <h4>Importe Bruto</h4>
									    <div class="input-group">
											<div class="input-group-prepend">
												<div class="input-group-text">$</div>
											</div>
											<input type="number" class="form-control form-control-lg" id="inlineFormInputGroupUsername">
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text">Subir archivo</span>
										</div>
										<div class="custom-file">
											<input type="file" class="custom-file-input" id="inputGroupFile01">
											<label class="custom-file-label" for="inputGroupFile01"></label>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<button type="button" class="btn btn-success btn-block " data-dismiss="modal"><strong>GUARDAR</strong></button>
								</div>
								<div class="col-md-6">
									<button type="button" class="btn btn-danger btn-block " data-dismiss="modal"><strong>CANCELAR</strong></button>
								</div>
	      					</div>
      					</div>
					</div>
				</div>
			</div>
			<!-- MODAL IMAGEN ADJUNTA -->
			<div class="modal fade" id="modal_image" tabindex="-1" role="dialog" aria-labelledby="modal_imagen" aria-hidden="true">
			    <div class="modal-body">
			        <img class = "image_modal" src="#">
			    </div>
			</div>
		</div>
		<script type="text/javascript">
			$('#boton_volver').click(function(){
				window.location.href = 'home.php';
			});

			function traer_proyectos() { // Call to ajax function
			    var cliente = $('#dropdown_cliente').val();
			    var dataString = 'dropdown_cliente='+cliente;
			    $.ajax({
			        type: "POST",
			        url: "traer_proyectos.php", // Name of the php files
			        data: {cliente:cliente},
			        success: function(html)
			        {
			            $("#traer_proyectos").html(html);
			        }
			    });
			};

			function traer_registros(){ // Call to ajax function
				$('#mostrar_registros_titulo').fadeIn();
				$('#mostrar_registros').fadeIn();
			    var proyecto = $('#dropdown_proyectos').val();
			    var dataString = 'proyecto='+proyecto;
			    $.ajax({
			        type: "POST",
			        url: "traer_registros.php",
			        data: {proyecto:proyecto},
			        success: function(html)
			        {
			            $("#traer_registros").html(html);
			            $('.boton_nuevo_registro').fadeIn();
			            $('#mostrar_costo_presupuestado').fadeIn();
			            $('#mostrar_saldo').fadeIn();
			            var proyecto = $('#dropdown_proyectos').val();
					    var dataString = 'proyecto='+proyecto;
					    console.log(dataString);
					    $.ajax({
					        type: "POST",
					        url: "traer_costo_proyecto.php", // Name of the php files
					        data: {proyecto:proyecto},
					        success: function(html)
					        {
					            $("#traer_costo_proyecto").html(html);
					            var costo_presupuesto_total = $('#valor_costo_presupuestado').text();
							    console.log(costo_presupuesto_total);
								var valor_saldo_total = 0;
								$('.valor_saldo_total').each(function(){
								    valor_saldo_total += parseFloat($(this).text());  // Or this.innerHTML, this.innerText
								    console.log(valor_saldo_total);
								    var this_input_box = document.getElementById("saldo_total");
								    valor_saldo_total2 = (costo_presupuesto_total - valor_saldo_total);
								    console.log(costo_presupuesto_total);
								    console.log(valor_saldo_total2);
									this_input_box.placeholder = valor_saldo_total2;
								});

								if (valor_saldo_total == 0){
									var this_input_box = document.getElementById("saldo_total");
									this_input_box.placeholder = 0;
									var proyecto = $('#dropdown_proyectos').val();
									var saldo = 0;
						        	$.ajax({
								        type: "POST",
								        url: "actualizar_saldo.php", // Name of the php files
								        data: 'proyecto='+ proyecto+'&saldo='+ saldo
								    });
								} else {
									var proyecto = $('#dropdown_proyectos').val();
									var saldo = $('#saldo_total').attr('placeholder');
						        	$.ajax({
								        type: "POST",
								        url: "actualizar_saldo.php", // Name of the php files
								        data: 'proyecto='+ proyecto+'&saldo='+ saldo
								    });
								}

								

								var this_input_box = document.getElementById("costo_presupuesto_total");
								this_input_box.placeholder = costo_presupuesto_total;
					        }
					    });
			        }
			    });
			};

			$('#boton_nuevo_registro').click(function(){
				var frm = document.getElementsByName('nuevo_registro')[0];
			   	frm.reset();
				$('#modal_nuevo_registro').modal('show');
			});
			
			$('#boton_guardar_nuevo_registro').click(function(){
				var cliente = $("#dropdown_cliente").val();
				var proyecto = $("#dropdown_proyectos").val();
				var item = $("#item_nuevo_registro").val();
				var numero_ot = $("#ot_nuevo_registro").val();
				var detalle = $("#detalle_nuevo_registro").val();
				var tipo_factura = $("#tipo_factura_nuevo_registro").val();
				var numero_factura = $("#numero_factura_nuevo_registro").val();
				var fecha_factura = $("#fecha_factura_nuevo_registro").val();
				var fecha_pactada = $("#fecha_pactada_nuevo_registro").val();
				var importe_neto = $("#importe_neto_nuevo_registro").val();
				var iva = $("#iva_nuevo_registro").val();
				var percepcion = $("#percepcion_nuevo_registro").val();
				var importe_bruto = $("#importe_bruto_nuevo_registro").val();
				var adjunto = document.getElementById("adjunto_nuevo_registro").files[0].name;

				$.ajax({  
                     url:"agregar_registro.php",  
                     method:"POST",
                     data: 'cliente='+ cliente+'&proyecto='+ proyecto+'&item='+ item+'&numero_ot='+ numero_ot+'&detalle='+ detalle+'&tipo_factura='+ tipo_factura+'&numero_factura='+ numero_factura+'&fecha_factura='+ fecha_factura+'&fecha_pactada='+ fecha_pactada+'&importe_neto='+ importe_neto+'&iva='+ iva+'&percepcion='+ percepcion+'&importe_bruto='+ importe_bruto+'&adjunto='+ adjunto,
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
							data: form_data
							/*type: 'post'*/
						});
						$('#modal_nuevo_registro').modal('hide');
						window.location.reload();
                     }  
                });
			});

            $('#adjunto_nuevo_registro').on('change',function(){
                var fileName = $(this).val();
                fileName = fileName.substring(fileName.lastIndexOf("\\") + 1, fileName.length);
                $(this).next('.custom-file-label').html(fileName);
            });

            $(document).on("change", ".sumar", function() {
			    var sum = 0;
			    $(".sumar").each(function(){
			        sum += +$(this).val();
			    });
			    $(".importe_bruto").val(sum);
			});

			var $tipo_factura_nuevo_registro = $('#tipo_factura_nuevo_registro');
			var $numero_factura_nuevo_registro = $('#numero_factura_nuevo_registro');
			var $fecha_factura_nuevo_registro = $('#fecha_factura_nuevo_registro');
			var $fecha_pactada_nuevo_registro = $('#fecha_pactada_nuevo_registro');
		    $iva_nuevo_registro = $('#iva_nuevo_registro');
			$tipo_factura_nuevo_registro.change(function() {
			    if ($tipo_factura_nuevo_registro.val() == 'A') {
			        $iva_nuevo_registro.removeAttr('disabled');
			        $numero_factura_nuevo_registro.removeAttr('disabled');
			        $fecha_factura_nuevo_registro.removeAttr('disabled');
			        $fecha_pactada_nuevo_registro.removeAttr('disabled');
			    } else {
			        $iva_nuevo_registro.attr('disabled', 'disabled').val('');
			        if ($tipo_factura_nuevo_registro.val() == 'Sin Factura') {
			        	$numero_factura_nuevo_registro.attr('disabled', 'disabled').val('');
			        	$fecha_factura_nuevo_registro.attr('disabled', 'disabled').val('');
			        	$fecha_pactada_nuevo_registro.attr('disabled', 'disabled').val('');
			        } else {
			        	$numero_factura_nuevo_registro.removeAttr('disabled');
			        	$fecha_factura_nuevo_registro.removeAttr('disabled');
			        	$fecha_pactada_nuevo_registro.removeAttr('disabled');
			        }
			    }
			    if ($tipo_factura_nuevo_registro.val() == '') {
			    	$iva_nuevo_registro.attr('disabled', 'disabled').val('');
			    	$numero_factura_nuevo_registro.attr('disabled', 'disabled').val('');
			        $fecha_factura_nuevo_registro.attr('disabled', 'disabled').val('');
			        $fecha_pactada_nuevo_registro.attr('disabled', 'disabled').val('');
			    }
			}).trigger('change'); // added trigger to calculate initial tipo_factura_nuevo_registro

			$('.fa-trash-alt').click(function(e){
				console.log("SEEEEEEE");

			});

			
				/*$('#modal_eliminar_registro').modal('show');
				var id = $(this).attr('data-id');
				console.log(id);
				$.ajax({  
	                url:"eliminar_registro.php",  
	                method:"POST",  
	                data:'id='+id,
	                success:function(data){
	                	$('#modal_eliminar_registro').modal('hide');
						window.location.reload();
	                }  
	           	});*/ 
			

		</script>
		<script>
			lightbox.option({
				'resizeDuration': 200,
				'wrapAround': true,
				'fadeDuration': 200
			})
		</script>
	</body>
</html>