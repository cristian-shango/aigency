<?php 
	include "session.php";
	include "conexion.php"; 
	mysql_set_charset('utf8');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Viva Admin | Facturar Proyecto</title>
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

    	<script src="http://momentjs.com/downloads/moment.js" type="text/javascript"></script>
    	
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
						<h3 style="font-size: 2em;">Proyecto facturado</h3>
					</div>
				</div>

				<div class="row">

				<?php
					// Attempt select query execution
					$sql = "SELECT * FROM administracion a LEFT JOIN proyectos p ON a.id_proyecto = p.id LEFT JOIN clientes c ON p.cliente = c.id_cliente WHERE id_proyecto = '".$_GET['id']."'";
					mysql_query("SET NAMES 'utf8'");
					if($result = mysqli_query($conexion, $sql)){
					    if(mysqli_num_rows($result) > 0){
					        $i = 0;
					        while($row = mysqli_fetch_array($result)){
							?>
							<div class="col-md-4">
								<div class="form-group">
								    <h4>Cliente</h4>
								    <input type="text" class="form-control form-control" readonly value="<?php echo ($row['nombre']);?>">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
								    <h4>OT</h4>
								    <input type="text" class="form-control form-control" id="id_proyecto" readonly value="<?php echo ($row['id_proyecto']);?>">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
								    <h4>Proyecto</h4>
								    <input type="text" class="form-control form-control" readonly value="<?php echo ($row['nombre_proyecto']);?>">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
								    <h4>Detalle</h4>
								    <textarea row="8" id="detalle" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" readonly placeholder="<?php echo ($row['detalle']);?>"></textarea>
								</div>
							</div>
							<div class="col-md-3">
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
							<div class="col-md-3">
								<div class="form-group">
								    <h4>Precio</h4>
								    <div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">$</div>
										</div>
										<input type="text" class="form-control form-control-lg" id="precio_total" readonly value="<?php echo ($row['precio']);?>">
									</div>
								</div>
							</div>
							<div class="col-md-3">
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
							<div class="col-md-3">
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
							<div class="col-md-4">
								<div class="form-group">
								    <h4>Forma de Cobro</h4>
								    <select class="form-control" id="forma_pago" >
								      	<option value="">Seleccionar</option>
							    		<?php
											// Attempt select query execution
											$sql1 = "SELECT * FROM forma_pago";
											mysql_query("SET NAMES 'utf8'");
											if($result1 = mysqli_query($conexion, $sql1)){
											    if(mysqli_num_rows($result1) > 0){
											        $i = 0;
											        while($row1 = mysqli_fetch_array($result1)){
											        	if($row1['tipo'] == $row['forma_cobro']){
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
								    <select class="form-control" id="tipo_factura">
								      	<option value="">Seleccionar</option>
							    		<?php
											// Attempt select query execution
											$sql2 = "SELECT * FROM tipo_factura ORDER BY tipo_factura ASC";
											mysql_query("SET NAMES 'utf8'");
											if($result2 = mysqli_query($conexion, $sql2)){
											    if(mysqli_num_rows($result2) > 0){
											        $i = 0;
											        while($row2 = mysqli_fetch_array($result2)){
											        	if($row2['tipo_factura'] == $row['tipo_factura']){
											        	?>
											        		<option value="<?php echo ($row2['tipo_factura']);?>" SELECTED><?php echo (utf8_encode($row2['tipo_factura']));?></option>
											        	<?php
											        	} else {
											        	?>
											        		<option value="<?php echo ($row2['tipo_factura']);?>"><?php echo (utf8_encode($row2['tipo_factura']));?></option>
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
							<?php
								if (($row['oc_cliente']) == "SI"){
							?>
								<div class="col-md-2">
									<div class="form-group">
									    <h4>Número de Factura</h4>
									    <input type="number" id="numero_factura" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php echo ($row['numero_factura']);?>">
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
									    <h4>Número de OC</h4>
									    <input type="number" id="numero_oc" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="">
									</div>
								</div>
							<?php
								} else {
							?>
									<div class="col-md-4">
										<div class="form-group">
										    <h4>Número de Factura</h4>
										    <input type="number" id="numero_factura" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php echo ($row['numero_factura']);?>">
										</div>
									</div>
							<?php
								}
							?>
							<div class="col-md-4">
								<div class="form-group">
								    <h4>Fecha de Factura</h4>
								    <input type="text" id="fecha_facturacion" class="form-control datepicker_ff"  aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php echo ($row['fecha_facturacion']);?>">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
								    <h4>Tiempo de Cobro</h4>
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
								    <h4>Fecha de Cobro</h4>
								    <input type="text" id="fecha_cobro" class="form-control datepicker_fp"  aria-label="Default" aria-describedby="inputGroup-sizing-default" value="">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
								    <h4>Importe Neto</h4>
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">$</div>
										</div>
										<input type="text" class="form-control form-control-lg sumar" id="importe_neto" value="<?php echo ($row['precio']);?>">
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
										<input type="text" class="form-control form-control-lg sumar" value="" id="iva">
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
										<input type="text" class="form-control form-control-lg sumar" value="" id="percepcion">
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
										<input type="text" id="importe_bruto" class="form-control form-control-lg importe_bruto" readonly value="<?php echo ($row['precio']);?>">
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
				<div class="col-md-2">
			    	<button class="btn btn-block btn btn-primary clickable" id="boton_facturar" data-estado="FACTURAR" style="cursor: pointer;">FACTURAR</button>
				</div>
				<div class="col-md-2">
			    	<button class="btn btn-block btn btn-success clickable cobrado" data-estado="COBRADO" style="cursor: pointer;">COBRADO</button>
				</div>
				<div class="col-md-2">
			    	<button class="btn btn-block btn btn-info clickable liberar_fondos" data-estado="FONDOS LIBERADOS" style="cursor: pointer;">LIBERAR FONDOS</button>
				</div>
				<div class="col-md-2">
			    	
				</div>
				<div class="col-md-2">
			    	
				</div>
				<div class="col-md-2">
			    	<button class="btn btn-block btn btn-danger clickable" id="boton_volver" style="cursor: pointer;">VOLVER</button>
				</div>
			</div>	
			</section>
		</div>

		<section>
			<div id="linea"></div>
		</section>

		
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
    			document.getElementById('fecha_cobro').value = fecha_calculo;
			});


			$(document).on("change", ".sumar", function() {
			    var sum = 0;
			    $(".sumar").each(function(){
			        sum += +$(this).val();
			    });
			    $(".importe_bruto").val(sum);
			});


			$('#boton_volver').click(function(){	
				window.location = "administracion.php";
			});
	
			$('#boton_facturar').click(function(){
				id_proyecto = document.getElementById('id_proyecto').value;
				tipo_factura = document.getElementById('tipo_factura').value; 
				numero_factura = document.getElementById('numero_factura').value;

				if($('#numero_oc').val()){
					numero_oc = document.getElementById('numero_oc').value;
				} else {
					numero_oc = 0;
				}
				
				fecha_facturacion = document.getElementById('fecha_facturacion').value;
				fecha_pago = document.getElementById('fecha_cobro').value;
				importe_neto = document.getElementById('importe_neto').value;
				tipo_iva = document.getElementById('tipo_iva').value;
				iva = document.getElementById('iva').value;
				percepcion = document.getElementById('percepcion').value;
				importe_bruto = document.getElementById('importe_bruto').value;
				forma_pago = document.getElementById('forma_pago').value;

				$.ajax({  
	                url: "agregar_facturacion.php",
	                method:"POST",  
	                data:'id_proyecto='+id_proyecto+'&tipo_factura='+tipo_factura+'&numero_factura='+numero_factura+'&numero_oc='+numero_oc+'&fecha_facturacion='+fecha_facturacion+'&fecha_pago='+fecha_pago+'&importe_neto='+importe_neto+'&tipo_iva='+tipo_iva+'&iva='+iva+'&percepcion='+percepcion+'&importe_bruto='+importe_bruto+'&forma_pago='+forma_pago,
	                success:function(data){
						window.location = "administracion.php";
	                }  
	           });
			});

            $('#adjunto_nuevo_registro').on('change',function(){
                var fileName = $(this).val();
                fileName = fileName.substring(fileName.lastIndexOf("\\") + 1, fileName.length);
                $(this).next('.custom-file-label').html(fileName);
            });

			var $tipo_factura = $('#tipo_factura');
			
			var $numero_factura = $('#numero_factura');
			var $fecha_facturacion = $('#fecha_facturacion');
			var $fecha_cobro = $('#fecha_cobro');
			var $importe_neto = $('#importe_neto');
			var $iva = $('#iva');
			var $tipo_iva = $('#tipo_iva');
			var $percepcion = $('#percepcion');


			$tipo_factura.change(function() {
			    if ($tipo_factura.val() == 'A') {
			        $iva.removeAttr('disabled');
			        $tipo_iva.removeAttr('disabled');
			        $numero_factura.removeAttr('disabled');
			        $fecha_facturacion.removeAttr('disabled');
			        $percepcion.removeAttr('disabled');
			    } else {
			        $iva.attr('disabled', 'disabled').val('');
			        if ($tipo_factura.val() == 'Sin factura') {
			        	$numero_factura.attr('disabled', 'disabled').val('');
			        	$fecha_facturacion.attr('disabled', 'disabled').val('');
			        	$fecha_cobro.removeAttr('disabled');
			        	$iva.attr('disabled', 'disabled').val('');
			        	$tipo_iva.attr('disabled', 'disabled').val('');
				        $percepcion.attr('disabled', 'disabled').val('');
			        } else {
			        	$numero_factura.removeAttr('disabled');
			        	$fecha_facturacion.removeAttr('disabled');
			        	$tipo_iva.attr('disabled', 'disabled').val('');
			        	$fecha_cobro.removeAttr('disabled');
			        	$fecha_facturacion.removeAttr('disabled');
			        	$percepcion.attr('disabled', 'disabled').val('');
			        }
			    }
			    if ($tipo_factura.val() == '') {
			    	$iva.attr('disabled', 'disabled').val('');
			    	$tipo_iva.attr('disabled', 'disabled').val('');
			    	$numero_factura.attr('disabled', 'disabled').val('');
			        $fecha_facturacion.attr('disabled', 'disabled').val('');
			        $fecha_cobro.attr('disabled', 'disabled').val('');
			        $percepcion.attr('disabled', 'disabled').val('');
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