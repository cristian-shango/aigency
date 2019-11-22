<?php 
	include "conexion.php"; 
	mysql_set_charset('utf8');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Viva Admin | Proyectos</title>
	  	<meta charset="utf-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1">
	  	
	  	<link rel="stylesheet" href="css/normalize.css">
	  	<link rel="stylesheet" href="css/jquery-ui.css">
	  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	  	<link rel="stylesheet" href="css/style.css">
	  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	  	
	  	<script src="js/jquery.min.js"></script>
	  	<script src="js/popper.min.js"></script>
	  	<script src="js/ddtf.js"></script>
	  	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>	  	
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
						<h3 style="font-size: 3em;">Proyectos</h3>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12"><h4>Proyectos</h4></div>
					<div class="table-responsive">
						<table class="table table-striped" id="table_format">
							<thead>
								<tr>
									<th scope="col">Cliente</th>
									<th scope="col">Proyecto</th>
									<th scope="col">Detalle</th>
									<th scope="col">Costo Asignado</th>
									<th scope="col">Precio Cliente</th>
									<th scope="col">Fecha de Cobro</th>
									<th scope="col">Saldo</th>
									<th scope="col">Editar</th>
									<th scope="col">Ver</th>
									<th scope="col">Eliminar</th>
								</tr>
							</thead>
							<tbody>
								<?php
									// Attempt select query execution
									$sql = "SELECT * FROM proyectos";
									mysql_query("SET NAMES 'utf8'");
									if($result = mysqli_query($conexion, $sql)){
									    if(mysqli_num_rows($result) > 0){
									        $i = 0;
									        while($row = mysqli_fetch_array($result)){
								?>
										<tr>
											<td scope="row"><?php echo ($row['cliente']);?></td>
											<td><?php echo ($row['nombre']);?></td>
											<td><?php echo ($row['detalle']);?></td>
											<td class="valor_costo_presupuestado"><?php echo ($row['costo_presupuestado']);?></td>
											<td class="valor_precio_cliente"><?php echo ($row['precio']);?></td>
											<td><?php echo ($row['fecha_cobro']);?></td>
											<td class="valor_saldo_total"><?php echo ($row['saldo']);?></td>
											<td><i class="fas fa-edit" data-toggle="modal" data-id="<?php echo ($row['id']);?>"></i></td>
											<td><i class="far fa-eye"></i></td>
											<td><i class="far fa-trash-alt" data-toggle="modal" data-id="<?php echo ($row['id']);?>" data-nombre="<?php echo ($row['nombre']);?>"></i></td>
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

					<div class="col-md-9">
				    	<button class="btn btn-block btn-lg btn-success" id="boton_nuevo_proyecto" style="cursor: pointer;" data-toggle="modal" data-target="#modal_nuevo_proyecto">Nuevo Proyecto</button>
					</div>
					<div class="col-md-3">
				    	<button class="btn btn-block btn-lg btn-danger" id="boton_volver" style="cursor: pointer;">Volver</button>
					</div>
				</div>
			</section>
			<section id="bloque_bottom" class="border-top">
				<div class="container-flex">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
							    <h4>Costo Asignado Total</h4>
							    <div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text">$</div>
									</div>
									<input type="text" class="form-control form-control-lg" id="costo_presupuesto_total" readonly placeholder="3.500.000">
								</div>
							</div>
						</div>	
						<div class="col-md-4">
							<div class="form-group">
							    <h4>Precio Cliente Total</h4>
							    <div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text">$</div>
									</div>
									<input type="text" class="form-control form-control-lg" id="precio_total" readonly placeholder="200.000">
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
									<input type="text" class="form-control form-control-lg" id="saldo_total" readonly placeholder="200.000">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="linea"></div>
			</section>
			<!-- Modal Eliminar -->
			<div class="modal fade" id="modal_eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">¿Borrar Cliente?</h5>
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
								<div class="col-md-12"><h2>Nuevo Proyecto</h2></div>
								<div class="col-md-6">
									<div class="form-group">
									    <h4>Cliente</h4>
									    <select class="form-control" id="dropdown_cliente_nuevo" >
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
									    <h4>Proyecto</h4>
									    <input type="text" id="nuevo_proyecto" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
									    <h4>Detalle</h4>
									    <textarea row="8" id="nuevo_detalle" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"></textarea>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
									    <h4>Costo Presupuestado</h4>
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
									<div class="col-md-12"><h2>Editar Proyecto</h2></div>
									<div class="col-md-6">
										<div class="form-group">
										    <h4>Cliente</h4>
										    <select class="form-control" id="cliente_dropdown_editar_proyecto" >
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
									<!-- <div class="col-md-6">
										<div class="form-group">
										    <h4>Cliente</h4>
										    <input type="text" id="cliente_dropdown_editar_proyecto" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
										</div>
									</div> -->
									<div class="col-md-6">
										<div class="form-group">
										    <h4>Proyecto</h4>
										    <input type="text" id="nombre_editar_proyecto" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
										    <h4>Detalle</h4>
										    <textarea row="8" id="detalle_editar_proyecto" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"></textarea>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
										    <h4>Costo Presupuestado</h4>
										    <div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text">$</div>
												</div>
												<input type="number" class="form-control form-control-lg" id="editar_costo_presupuestado">
												<input type="number" id="id_editar_proyecto" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" hidden>
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
		</div>
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
				window.location.href = "index.php";
			});

			$('#boton_guardar_proyecto').click(function(event){

				var cliente = $("#dropdown_cliente_nuevo").val();
				console.log(cliente);
				var nombre = $("#nuevo_proyecto").val();
				var detalle = $("#nuevo_detalle").val();
				var costo_presupuestado = $("#nuevo_costo_presupuestado").val();

				var dataString = 'nombre='+nombre+'&cliente='+cliente+'&detalle='+detalle+'&costo_presupuestado='+costo_presupuestado;

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
	                     $('#nombre_editar_proyecto').val(data.nombre);
	                     $('#cliente_dropdown_editar_proyecto').val(data.cliente);
	                     $('#detalle_editar_proyecto').val(data.detalle);
	                     $('#editar_costo_presupuestado').val(data.costo_presupuestado);
	                     $('#id_editar_proyecto').val(data.id);
	                     $('#modal_editar_proyecto').modal('show');
	                     console.log(data.nombre);
	                }  
	           }); 
			});

			$('#boton_editar_proyecto').click(function(event){				
				var cliente = $("#cliente_dropdown_editar_proyecto").val();
				var nombre = $("#nombre_editar_proyecto").val();
				var detalle = $("#detalle_editar_proyecto").val();
				var costo_presupuestado = $("#editar_costo_presupuestado").val();
				var id = $("#id_editar_proyecto").val();
				console.log(id);
				var dataString = 'nombre='+nombre+'&cliente='+cliente+'&detalle='+detalle+'&costo_presupuestado='+costo_presupuestado+'&id='+id;

				console.log(dataString);
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

		</script>
		<script>
			$('#table_format').ddTableFilter();
		</script>
	</body>
</html>