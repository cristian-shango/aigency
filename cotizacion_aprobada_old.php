<?php 
	include "session.php";
	include "conexion.php"; 
	mysql_set_charset('utf8');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Viva Admin | Cotización Aprobada</title>
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
						<h3 style="font-size: 3em;">Cotización Aprobada</h3>
					</div>
				</div>

				<div class="row">
					<div class="table-responsive">
						<table class="table table-striped" id="table_format">
							<thead>
								<tr>
									<th scope="col">Categoría</th>
									<th scope="col">Condición</th>
									<th scope="col">Item</th>
									<th scope="col">Detalle</th>
									<th scope="col">Cantidad</th>
									<th scope="col">Valor unitario</th>
									<th scope="col">Valor Total</th>
									<th scope="col">Cargar Proveedor</th>
								</tr>
							</thead>
							<tbody>
								<?php
									// Attempt select query execution
									$sql = "SELECT * FROM registros r INNER JOIN categorias_cotizaciones cc ON r.categoria_cotizacion = cc.id_catcot INNER JOIN condicion_cotizacion cc2 ON  r.condicion_registro = cc2.id_concot WHERE registro_seleccionado = 1 AND id_proyecto = '".$_GET['id']."'";
									mysql_query("SET NAMES 'utf8'");
									if($result = mysqli_query($conexion, $sql)){
									    if(mysqli_num_rows($result) > 0){
									        $i = 0;
									        while($row = mysqli_fetch_array($result)){
									        	if(empty($row['archivo_adjunto'])){
									        		echo "<tr>";
									        	} else {
									        		echo "<tr style='background-color: #93f689;'>";
									        	}
								?>
										
											<td scope="row" style="width: 10%;"><?php echo ($row['nombre_catcot']);?></td>
											<td style="width: 10%;"><?php echo (utf8_encode($row['nombre_concot']));?></td>
											<td style="width: 10%;"><?php echo ($row['item']);?></td>
											<td style="width: 45%; text-align: left;"><?php echo ($row['detalle_registro']);?></td>
											<td style="width: 5%;"><?php echo ($row['cantidad']);?></td>
											<td style="width: 10%;">$ <span class="valor_importe_neto"><?php echo ($row['importe_neto']);?></span></td>
											<td style="width: 10%;">$ <span class="valor_importe_bruto"><?php echo ($row['importe_total']);?></span></td>
											<td style="width: 10%"><i class="fas fa-pencil-alt" data-toggle="modal" data-id="<?php echo ($row['id']);?>"></i></td>
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
						<table class="table" id="table_adicionales"></table>
					</div>
				</div>
			</section>
			<section id="bloque_bottom">
				<div class="row">
					<div class="col-md-12 border-top"></div>
					<?php
						//echo $_GET['id'];
						// Attempt select query execution
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
			<div id="linea"></div>
		</section>

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
					case "NUEVO":
						$("#tipo_estado").css("background-color", "#ffc107");
						$("#tipo_estado").css("color", "#212529");
						break;
				}

			});

			$('#boton_volver').click(function(){
				window.location.href = 'cotizaciones.php';
			});
			
			$('.fa-pencil-alt').click(function(){
				var id = $(this).attr('data-id');
				console.log(id);
				window.location = "cargar_proveedor_cotizacion.php?id="+id;
			});
		</script>
	</body>
</html>