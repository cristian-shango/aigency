<?php
	include "session.php";
	include "conexion.php";
	mysql_set_charset('utf8');
	date_default_timezone_set("America/Argentina/Buenos_Aires");
?>

<?php
	// Variable para guardar la suma de todos los costos;
	$importe_final = 0;
	$data_ids = array();
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
			<!--script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.1/jspdf.debug.js" integrity="sha384-THVO/sM0mFD9h7dfSndI6TS0PgAGavwKvB5hAxRRvc0o9cPLohB0wb/PTA7LdUHs" crossorigin="anonymous"></script-->
			<script src="js/PDF/jspdf.debug.js"></script>
      <!-- scripts para DataTables -->
      <!--link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.6/b-html5-1.5.6/datatables.min.css"/>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.6/b-html5-1.5.6/datatables.min.js"></script-->
      <!--script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>

      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.6/b-flash-1.5.6/b-html5-1.5.6/datatables.min.css"/>

      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.6/b-flash-1.5.6/b-html5-1.5.6/datatables.min.js"></script-->

      <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
      <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
      <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
      <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
      <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
      <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>

			<style>
				body {
					width: 780px;
				}
				#cuerpo {
					 height: 1092px;
					 display: flex;
					 flex-direction: column;
					 justify-content: space-between;
					 /*height: inherit;*/
		/*		 border: solid 1px red;*/
					 padding: 0 20px;
				/*	 transform: scale(2, 2);*/
				}
				/*
				section {
					border:solid 1px blue
				}
				*/
				img {
					max-width: 100%;
				}
				table {
					font-size: 12px;
				}
			</style>
	</head>
	<body>
		<div id="imprimir">
			<div id="cuerpo">
				<img style="margin:2em 0;" src="images/imprimir/header.png">
				<section id="datos_cliente" class="text-right">
					<?php
						//echo $_GET['id'];

						$sql = "SELECT * FROM proyectos p INNER JOIN clientes c ON p.cliente = c.id_cliente INNER JOIN subtipo_cotizacion sc ON p.subtipo_cotizacion = sc.id_subtipo WHERE id = '".$_GET['id']."'";
						mysql_query("SET NAMES 'utf8'");
						if($q_cl = mysqli_query($conexion, $sql)){
								if(mysqli_num_rows($q_cl) > 0){
										$row = mysqli_fetch_array($q_cl);
										?>

										<div class="col-md-12 border-top"></div>
										<div><span><small><strong>Cliente:</strong></small> </span><span><?php echo $row['nombre']; ?></span></div>
										<div><span><small><strong>Razón social:</strong></small> </span><span><?php echo $row['razon_social']; ?></span></div>
										<div><span><small><strong>CUIT:</strong></small> </span><span><?php echo $row['cuit']; ?></span></div>

										<?php
									}
								}
					?>
					<div class="col-md-12 border-top" style="margin-bottom: 2em;"></div>
				</section>
				<section id="primero">
					<div class="row">
						<div class="table-responsive">
							<table class="table" id="table_format">
								<thead>
									<tr>
										<!--<th scope="col" class="gray">Categoría / Rubro</th>-->
										<th scope="col" class="gray">Condición</th>
										<th scope="col" class="gray">Item</th>
										<th scope="col" class="gray">Detalle</th>
										<th scope="col" class="gray">Cantidad</th>
										<th scope="col" class="gray">Valor unitario</th>
										<th scope="col" class="gray">Total</th>
									</tr>
								</thead>
								<tbody id="interno">
									<?php
										$sql = "SELECT * FROM categorias_cotizaciones WHERE id_proyecto_catcot = '".$_GET['id']."'";
										mysql_query("SET NAMES 'utf8'");
										if($result = mysqli_query($conexion, $sql)){
											$cantidad = mysqli_num_rows($result);
										    if($cantidad > 0){

										        $i = 0;
										        while($row = mysqli_fetch_array($result)){
										        $sub_total = 0;

																$id_catcot = $row['id_catcot'];
																//Para saber si imprimir o no esta tabla...
																$sql_hay_checks = "SELECT count(*) as checks FROM registros WHERE categoria_cotizacion = $id_catcot AND registro_seleccionado = 1";
																$resultado_checks = mysqli_query($conexion, $sql_hay_checks);
																$total_checks = mysqli_fetch_assoc($resultado_checks);
																if ($total_checks['checks']>0){
																	$data_ids.array_push($row['id_catcot']);
														?>
														<!-- Linea q indica CATEGORIA / RUBRO -->
																			<tr class="mostrar_registro" data-id="<?php echo ($row['id_catcot']);?>">
                                        <td></td>
																				<td> <!--colspan="2"-->
																					<span>Categoría / Rubro: <strong><?php echo ($row['nombre_catcot']);?></strong></span>
																				</td>
																				<td><!-- colspan="3"-->
																					<span><strong><?php echo ($row['detalle_catcot']);?></strong></span>
																				</td>
																				<td></td>
																				<td></td>
																				<td></td>
																			</tr>

															<?php
																$id_catcot = $row['id_catcot'];
																$sql_registros = "SELECT * FROM registros r LEFT JOIN condicion_cotizacion c ON r.condicion_registro = c.id_concot WHERE categoria_cotizacion = $id_catcot";
																mysql_query("SET NAMES 'utf8'");
																if($result_registros = mysqli_query($conexion, $sql_registros)){
																    if(mysqli_num_rows($result_registros) > 0){
																        $i = 0;
																        while($row_registros = mysqli_fetch_array($result_registros)){

																					if ($row_registros['registro_seleccionado'] != 0){
																						$importe_final += $row_registros['importe_total'];
																						$sub_total += $row_registros['importe_total'];
																				?>
																						<tr class="selected" data-id="<?php echo ($row['id_catcot']); ?>">
																							<!--<td><strong><?php //echo ($row['nombre_catcot']);?></strong></td>-->
																							<td scope="row"><?php echo (utf8_encode($row_registros['nombre_concot']));?></td>
																							<td scope="row"><?php echo (($row_registros['item']));?></td>
																							<td><?php echo (($row_registros['detalle_registro']));?></td>
																							<td><?php echo ($row_registros['cantidad']);?></td>
																							<td nowrap>$ <span class="valor_precio_cliente"><?php echo ($row_registros['importe_neto']);?></span></td>
																							<td nowrap>$ <span><?php echo ($row_registros['importe_total']);?></span></td>
		<!--																					<td>$ <span class="valor_promedio" data-registro="<?php /* echo ($row['id_catcot']);?>" data-valor="<?php echo ($row_registros['importe_total']);?>"><?php echo ($row_registros['importe_total']); */ ?></span></td>
	-->
																			<!-- <td style="font-weight: bold;"><?php //echo ($row['estado']);?></td> -->
																					</tr>
																		<!-- Buscar si hay adicionales para esta cotización -->
																		<?php
																			$sql = "SELECT monto_adicional, motivo_adicional
																							FROM adicionales
																							WHERE id_proyecto_adicional = '".$_GET['id']."'
																							AND id_cotizacion_adicional = '".$row_registros['id']."'
																							AND aprobado_adicional = 1";
																			//mysql_query("SET NAMES 'utf8'");
																			$adicional = 0;
																			$motivo = "";
																			$q_ad = mysqli_query($conexion, $sql);
																			if (mysqli_num_rows($q_ad)>0){
																				while($r_ad = mysqli_fetch_array($q_ad)){
																					$adicional += $r_ad['monto_adicional'];
																					if ($motivo=="") $motivo = utf8_encode($r_ad['motivo_adicional']);
																					else $motivo .= ", ".utf8_encode($r_ad['motivo_adicional']);
																				}
																				$importe_final += $adicional;
																				$sub_total += $adicional;
																				?>
																					<tr class="selected" data-id="<?php echo ($row['id_catcot']); ?>">
																						<td><small><strong>Adicional:</strong></small></td>
																						<td> <!--colspan="2"--><small>Motivo: <?php echo $motivo; ?></small></td>
    																				<td></td>
																						<td><!-- colspan="2"--></td>
    																				<td></td>
																						<td nowrap>$ <span><small><?php echo $adicional; ?></small></span></td>
																					</tr>
																				<?php
																			}
																			mysqli_free_result($q_ad);
																		?>
																<?php
																						}
																        }
																				?><tr data-id="<?php echo ($row['id_catcot']); ?>"><td><!-- colspan="4"--></td><td></td><td></td><td></td><td><strong>Sub-total</strong></td><td nowrap><strong>$ <?php echo $sub_total; ?></strong></td></tr><?php
																        mysqli_free_result($result_registros);
																    } else{
																        echo "<strong style='font-size: 1.2em;'>No hay cotizaciones cargadas.</strong>";
																    }
																} else{
																		    echo "ERROR: Could not able to execute $sql_registros. " . mysqli_error($conexion);
																	}


																}
										        }

										        mysqli_free_result($result);
										    } else{
										        echo "No hay categorias cargadas.";
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
						<div class="col-md-12 row">
							<div class="col-md-8"></div>
							<div class="col-md-4" id="mostrar_saldo">
								<div class="form-group">
										<h4>Costo total</h4>
										<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">$</div>
										</div>
										<div type="text" class="form-control form-control-lg" id="consumido_total" readonly value="<?php echo ($importe_final);?>"><?php echo ($importe_final);?></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
							<?php
								//echo $_GET['id'];

								$sql = "SELECT * FROM proyectos p INNER JOIN clientes c ON p.cliente = c.id_cliente INNER JOIN subtipo_cotizacion sc ON p.subtipo_cotizacion = sc.id_subtipo WHERE id = '".$_GET['id']."'";
								mysql_query("SET NAMES 'utf8'");
								if($result = mysqli_query($conexion, $sql)){
								    if(mysqli_num_rows($result) > 0){
								        $i = 0;
								        while($row = mysqli_fetch_array($result)){
							?>

						<!--<button onclick="javascript:demoFromHTML();">PDF</button>-->
							<!--div class="container-flex"-->
								<section class="row" style="align-self:flex-end">
									<div class="col-md-12 border-top"></div>
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
												<h4 style="font-size: 1.1em;">Subtipo de Servicio: <span id="ingreso_proyecto" style="font-weight: lighter;"><?php  utf8_encode($row['nombre_subtipo']);?></span></h4>
										</div>
									</div>
									<div class="col-md-3 text-center">
										<div class="form-group">
												<h4 style="font-size: 1.1em;">Proyecto: <span id="ingreso_proyecto" style="font-weight: lighter;"><?php echo ($row['nombre_proyecto']);?></span></h4>
										</div>
									</div>
									<div class="col-md-2 text-center no-imprimir">
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
									<div class="col-md-8">
										<h4 style="font-size: 0.9em;"><?php echo date('d-m-Y, g:i a');?></h4>
									</div>
									<div class="col-md-4">
										<h4 style="font-size: 0.9em; text-align: right;">Hoja <span id="nro_hoja"></span> de <span id="total_hojas"></span></h4>
									</div>
									<div class="col-md-12 border-top"></div>
									<!--<div id="linea"></div>-->
									<img src="images/imprimir/linea.png" style="margin-bottom: 3em;">
								</section>
							<!--/div-->
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


			</div>
		</div>
	</body>

	<script>
		$(document).ready(function(){

      $('#table_format').DataTable({
        dom: 'Bt',
        ordering: false,
        buttons: [
          {
            extend: 'pdfHtml5',
            orientation: 'portrait',
            pageSize: 'A4'
          },
					'excel'
        ],
        rowCallback: function(row, data, index) {

        }
      });


/*
			const H_MAX = 450;

			let data_id_rows = $(document).find('tr[data-id]');

			let dids = {};
			let dats = [];
			let h_dids = [];
			let h_rows = [];
			let total_dids = 0;
			let total_rows = 0;

			$(data_id_rows).each(function(){
				let data = $(this).attr('data-id');
				console.log("data: "+data);
				altura = parseFloat($(this).css('height').slice(0,-2)); //parseFloat($("#imprimir").css('width').slice(0,-2))
				h_rows.push(altura);
				total_rows++;

				if (!(data in dids)) {
					console.log("entramos");
					dids[data] = [this];
					dats.push(data);
					h_dids.push(altura);
					total_dids++;
				} else {
					dids[data].push(this);
					h_dids[total_dids-1] += altura;
				}
			});

			console.log("dids: "+total_dids);

			var nuevo_id = true;
			var salto = false;
			var ix_row = 0;
			var ix_id = 0;
			var loop = 0
			var n = 0;
			var data = '';
			var listenerCanvasReady = true;
			var tagsParaImprimir = [];
			var ix_imp = 0;

			while (loop < total_rows && ix_id < total_dids) {
				console.log(">>> "+loop);
				let h_resto = H_MAX;

				console.log(">>> en on clone");
				//console.log("el doc "+$(doc.body).html());
				let imprimirTag = document.querySelector('#imprimir').cloneNode(true);
				imprimirTag.id += ix_imp++;
				$(imprimirTag).find('#nro_hoja').text(ix_imp);
				let pre = $(imprimirTag).find('#interno');
				$(pre).empty();
				//$('#encabezados').appendTo($(pre));

				data = dats[ix_id];
				console.log(">>> h_dids "+h_dids[ix_id]+" vs h_resto "+h_resto);
				if (nuevo_id && h_dids[ix_id] <= h_resto) {
					console.log(">>> nuevo id "+ix_id);
					// Hoja nueva con id nuevo
					//if (h_dids[ix_id] <= h_resto) {
						// El bloque entero cabe en el espacio (h_resto = H_MAX todavía)
						dids[data].forEach(row => {
							$(pre).append(row);
							n++;
						});
						h_resto -= h_dids[ix_id++];
					//} else {
						// No cabe el bloque entero, asì que hay q partirlo en rows
					//  nuevo_id = false;
					//}
				} else {
					// En esta hoja nueva se arranca con rows q sobran de la hoja anterior
					console.log(">>> continuacion de "+ix_id+" con row "+ix_row);
					salto = false;
					if (ix_row > 0 ) $(pre).append(dids[data][0]);
					console.log(">>> ix_row "+ix_row+" vs id.length "+ dids[data].length)
					while (ix_row < dids[data].length) {
						console.log(">>> h_rows "+h_rows[n]+" h_resto "+h_resto);
						if (h_rows[n] <= h_resto) {
							$(pre).append(dids[data][ix_row++]);
							h_resto -= h_rows[n++];
						} else {
							// no caben mas filas en esta pagina
							console.log(">>> no cabe el row "+ix_row);
							nuevo_id = false;
							salto = true;
							break;
						}
					}
					if (!salto) {
						// Si se terminaron todas las filas <td> del id actual
						console.log(">>> se terminaron los row de "+ix_id);
						ix_row = 0;
						ix_id++;
						nuevo_id = true;
					}
				}

				if (!salto) {
					// La pagina ya tiene contenido. Se agregan bloques mientras quepan enteros.
					while (h_dids[ix_id] <= h_resto) {
						console.log(">>> se agrega a la pagin el id "+ix_id);
						data = dats[ix_id];
						dids[data].forEach(row => {
							$(pre).append(row);
							n++;
						});
						h_resto -= h_dids[ix_id++];
					}
				}
				//listenerCanvasReady = false;

				console.log(">>> Acá va el html2canvas");

				//while (!listenerCanvasReady) {}
				$(imprimirTag).appendTo(document.body);
				tagsParaImprimir.push(imprimirTag);
				loop++;

			}

			var docPDF = new jsPDF('A2','px');
			var hojas = new Array(tagsParaImprimir.length);
			var regresiva = hojas.length;
			var primerHoja = true;

			tagsParaImprimir.forEach(function(tag, ix){

				$(tag).find('#total_hojas').text(tagsParaImprimir.length);

				html2canvas(tag).then(function(canvas, ix){
					console.log("appending canvas nro "+ix);
					$(document.body).append(canvas);

					if(primerHoja) primerHoja = false;
					else docPDF.addPage();

					var img=canvas.toDataURL("image/png");
					//hojas[ix] = img;

					docPDF.addImage(img,'PNG',5,0,780,1092);
					docPDF.save("doc.pdf");
					//listenerCanvasReady = true;
				});

			});


			// $("body").prepend($("<button id='salvar'>guardar pdf</button>"))
			// $("#salvar").click(() => {
			// 	docPDF.addImage(hojas[0],'PNG',5,0);
			// 	for (let ix=1; ix<hojas.length; ix++) {
			// 		docPDF.addPage();
			// 		docPDF.addImage(hojas[ix],'PNG',5,0);
			// 	}
			// 	docPDF.save("doc.pdf");
			// });

			console.log("PDF guardado en doc.pdf");
*/
		});
	</script>
</html>
