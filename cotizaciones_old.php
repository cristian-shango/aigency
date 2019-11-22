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
						<h3 class="vivashango">VIVADMIN</h3>
					</div>
					<div class="col-md-6 text-right">
						<h3 style="font-size: 3em;">Cotizaciones</h3>
					</div>
				</div>

				<div class="row">
					<div class="table-responsive">
						<table class="table table-hover" id="table_format">
							<thead>
								<tr>
									<th scope="col" style="width: 10%;">Cliente</th>
									<th scope="col" style="width: 15%;">Proyecto</th>
									<th scope="col" style="width: 15%;">Producto</th>
									<th scope="col" style="width: 15%;">Subtipo de Servicio</th>
									<th scope="col" style="width: 35%;">Detalle</th>
									<th scope="col" style="width: 10%;">Fecha de Entrega</th>
									<th scope="col" style="width: 10%;">Hora de Entrega</th>
									<th scope="col" style="width: 10%;">Costo</th>
									<th scope="col" style="width: 10%;">Saldo</th>
									<th scope="col" style="width: 10%;">Estado</th>
								</tr>
							</thead>
							<tbody>
								<?php
									// Attempt select query execution
									$sql = "SELECT * FROM proyectos p INNER JOIN subtipo_cotizacion sc ON p.subtipo_cotizacion = sc.id_subtipo LEFT JOIN clientes c ON p.cliente = c.id_cliente ";
									mysql_query("SET NAMES 'utf8'");
									if($result = mysqli_query($conexion, $sql)){
									    if(mysqli_num_rows($result) > 0){
									        $i = 0;
									        while($row = mysqli_fetch_array($result)){
								?>
										<tr class="clickable_row" data-id="<?php echo ($row['id']);?>" data-estado="<?php echo ($row['estado']);?>">
											<td scope="row"><?php echo ($row['nombre']);?></td>
											<td><?php echo ($row['nombre_proyecto']);?></td>
											<td><?php echo ($row['producto_proyecto']);?></td>
											<td><?php echo utf8_encode($row['nombre_subtipo']);?></td>
											<td style="text-align: left;"><?php echo ($row['detalle']);?></td>
											<td><?php echo ($row['fecha_entrega']);?></td>
											<td><?php echo ($row['hora_interno']);?>:<?php echo ($row['minutos_interno']);?></td>
											<td>$ <span class="valor_costo_presupuestado"><?php echo ($row['costo_presupuestado']);?></span></td>
											<td>$ <span class="valor_saldo"><?php echo ($row['saldo']);?></span></td>
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
				<div class="container-flex">
					<div class="row">
						<div class="col-md-10"></div>
						<div class="col-md-2">
					    	<button class="btn btn-block btn-lg btn-danger clickable" id="boton_volver" style="cursor: pointer;">VOLVER</button>
						</div>
					</div>
				</div>
			</section>
		</div>
		<section>
			<div id="linea"></div>
		</section>
		<script type="text/javascript">
			$('#boton_volver').click(function(){
				window.location.href = 'home.php';
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
		<script type="text/javascript">
			$(".clickable_row").click(function() {
		        id = $(this).data("id");
		        estado = $(this).data("estado");
		        if (estado == "APROBADO" || estado == "FACTURADO"){
		        	window.location = "cotizacion_aprobada.php?id="+id;
		        } else{
		        	window.location = "cargar_cotizaciones.php?id="+id;
		        }
		    });
		</script>
	</body>
</html>