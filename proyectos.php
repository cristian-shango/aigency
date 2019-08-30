<?php 
  include "session.php";
  include "conexion.php"; 
  mysql_set_charset('utf8');
?>
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">
    
    <title>AiGency | Proveedores</title>
    
    <link rel="apple-touch-icon" href="design/assets/images/apple-touch-icon.png">
    <link rel="shortcut icon" href="design/assets/images/favicon.ico">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="design/global/css/bootstrap.min.css">
    <link rel="stylesheet" href="design/global/css/bootstrap-extend.min.css">
    <link rel="stylesheet" href="design/assets/css/site.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    
    <!-- Plugins -->
    <link rel="stylesheet" href="design/global/vendor/animsition/animsition.css">
    <link rel="stylesheet" href="design/global/vendor/asscrollable/asScrollable.css">
    <link rel="stylesheet" href="design/global/vendor/switchery/switchery.css">
    <link rel="stylesheet" href="design/global/vendor/intro-js/introjs.css">
    <link rel="stylesheet" href="design/global/vendor/slidepanel/slidePanel.css">
    <link rel="stylesheet" href="design/global/vendor/flag-icon-css/flag-icon.css">
        <link rel="stylesheet" href="design/global/vendor/bootstrap-table/bootstrap-table.css">
    
    
    <!-- Fonts -->
    <link rel="stylesheet" href="design/global/fonts/web-icons/web-icons.min.css">
    <link rel="stylesheet" href="design/global/fonts/brand-icons/brand-icons.min.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/trumbowyg/dist/trumbowyg.min.js"></script>
    <script type="text/javascript" src="js/trumbowyg/dist/langs/es_ar.min.js"></script>            
      <link rel="stylesheet" href="js/trumbowyg/dist/ui/trumbowyg.min.css">

    <!--[if lt IE 9]>
    <script src="design/global/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->
    
    <!--[if lt IE 10]>
    <script src="design/global/vendor/media-match/media.match.min.js"></script>
    <script src="design/global/vendor/respond/respond.min.js"></script>
    <![endif]-->
    
    <!-- Scripts -->
    <script src="design/global/vendor/breakpoints/breakpoints.js"></script>
    <script>
      Breakpoints();
    </script>
  </head>
  <body class="animsition">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">
    
      <div class="navbar-header">
        <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
          data-toggle="menubar">
          <span class="sr-only">Toggle navigation</span>
          <span class="hamburger-bar"></span>
        </button>
        <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
          data-toggle="collapse">
          <i class="icon wb-more-horizontal" aria-hidden="true"></i>
        </button>
        <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
          <img class="navbar-brand-logo" src="design/assets/images/logo.png" title="Remark">
          <span class="navbar-brand-text hidden-xs-down"> AiGency</span>
        </div>
        <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-search"
          data-toggle="collapse">
          <span class="sr-only">Toggle Search</span>
          <i class="icon wb-search" aria-hidden="true"></i>
        </button>
      </div>
    
      <div class="navbar-container container-fluid">
        <!-- Navbar Collapse -->
        <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
          <!-- Navbar Toolbar -->
          <ul class="nav navbar-toolbar">
            <li class="nav-item hidden-float" id="toggleMenubar">
              <a class="nav-link" data-toggle="menubar" href="#" role="button">
                <i class="icon hamburger hamburger-arrow-left">
                  <span class="sr-only">Toggle menubar</span>
                  <span class="hamburger-bar"></span>
                </i>
              </a>
            </li>
            <li class="nav-item hidden-sm-down" id="toggleFullscreen">
              <a class="nav-link icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
                <span class="sr-only">Toggle fullscreen</span>
              </a>
            </li>
            <li class="nav-item hidden-float">
              <a class="nav-link icon wb-search" data-toggle="collapse" href="#" data-target="#site-navbar-search"
                role="button">
                <span class="sr-only">Toggle Search</span>
              </a>
            </li>
          </ul>
          <!-- End Navbar Toolbar -->
    
          <!-- Navbar Toolbar Right -->
          <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
            <li class="nav-item dropdown">
              <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false"
                data-animation="scale-up" role="button">
                <span><?php echo $_SESSION["fullname"]; ?></span>
                <span class="avatar avatar-online">
                  <img src="design/global/portraits/5.jpg" alt="...">
                  <i></i>
                </span>
              </a>
              <div class="dropdown-menu" role="menu">
                <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> Perfil</a>
                <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-settings" aria-hidden="true"></i> Ajustes</a>
                <div class="dropdown-divider" role="presentation"></div>
                <a class="dropdown-item" href="php/logout.php" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> Salir</a>
              </div>
            </li>
          </ul>
          <!-- End Navbar Toolbar Right -->
        </div>
        <!-- End Navbar Collapse -->
    
        <!-- Site Navbar Seach -->
        <div class="collapse navbar-search-overlap" id="site-navbar-search">
          <form role="search">
            <div class="form-group">
              <div class="input-search">
                <i class="input-search-icon wb-search" aria-hidden="true"></i>
                <input type="text" class="form-control" name="site-search" placeholder="Search...">
                <button type="button" class="input-search-close icon wb-close" data-target="#site-navbar-search"
                  data-toggle="collapse" aria-label="Close"></button>
              </div>
            </div>
          </form>
        </div>
        <!-- End Site Navbar Seach -->
      </div>
    </nav>
    <div class="site-menubar">
      <div class="site-menubar-body">
        <div>
          <div>
            <ul class="site-menu" data-plugin="menu">
              <li class="site-menu-category">Menú Principal</li>
              <li class="site-menu-item has-sub">
                <a href="home.php">
                  <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>
                  <span class="site-menu-title">Home</span>
                </a>
              </li>
              <li class="site-menu-item has-sub">
                <a href="agenda.php">
                  <i class="site-menu-icon wb-calendar" aria-hidden="true"></i>
                  <span class="site-menu-title">Agenda</span>
                </a>
              </li>
              <li class="site-menu-item has-sub">
                <a href="proyectos.php">
                  <i class="site-menu-icon wb-list-bulleted" aria-hidden="true"></i>
                  <span class="site-menu-title">Proyectos</span>
                </a>
              </li>
              <li class="site-menu-item has-sub">
                <a href="pedido_cotizacion.php">
                  <i class="site-menu-icon wb-add-file" aria-hidden="true"></i>
                  <span class="site-menu-title">Pedido de Cotización</span>
                </a>
              </li>
              <li class="site-menu-item has-sub">
                <a href="cotizaciones.php">
                  <i class="site-menu-icon wb-order" aria-hidden="true"></i>
                  <span class="site-menu-title">Carga de Cotizaciones</span>
                </a>
              </li>
              <li class="site-menu-item has-sub">
                <a href="javascript:void(0)">
                        <i class="site-menu-icon wb-extension" aria-hidden="true"></i>
                        <span class="site-menu-title">Administración</span>
                                <span class="site-menu-arrow"></span>
                    </a>
                    <ul class="site-menu-sub">
                      <li class="site-menu-item">
                        <a class="animsition-link" href="#">
                          <span class="site-menu-title">Cobros</span>
                        </a>
                      </li>
                      <li class="site-menu-item">
                        <a class="animsition-link" href="#">
                          <span class="site-menu-title">Pagos</span>
                        </a>
                      </li>
                      <li class="site-menu-item">
                        <a class="animsition-link" href="#">
                          <span class="site-menu-title">Facturación</span>
                        </a>
                      </li>
                      <li class="site-menu-item">
                        <a class="animsition-link" href="#">
                          <span class="site-menu-title">Bancos</span>
                        </a>
                      </li>
                      <li class="site-menu-item">
                        <a class="animsition-link" href="#">
                          <span class="site-menu-title">Gastos</span>
                        </a>
                      </li>
                      <li class="site-menu-item">
                        <a class="animsition-link" href="#">
                          <span class="site-menu-title">Sueldos</span>
                        </a>
                      </li>
                    </ul>
              </li>
              <li class="site-menu-item has-sub">
                <a href="proyeccion.php">
                  <i class="site-menu-icon wb-graph-up" aria-hidden="true"></i>
                  <span class="site-menu-title">Proyección</span>
                </a>
              </li>
              <li class="site-menu-item has-sub">
                <a href="proveedores.php">
                  <i class="site-menu-icon wb-hammer" aria-hidden="true"></i>
                  <span class="site-menu-title">Proveedores</span>
                </a>
              </li>
              <li class="site-menu-item has-sub">
                <a href="clientes.php">
                  <i class="site-menu-icon wb-wrench" aria-hidden="true"></i>
                  <span class="site-menu-title">Clientes</span>
                </a>
              </li>
              <li class="site-menu-item has-sub">
                <a href="usuarios.php">
                  <i class="site-menu-icon wb-user" aria-hidden="true"></i>
                  <span class="site-menu-title">Usuarios</span>
                </a>
              </li>
            </ul>  
          </div>
        </div>
      </div>
    
      <div class="site-menubar-footer">
        <a href="javascript: void(0);" class="fold-show" data-placement="top" data-toggle="tooltip"
          data-original-title="Settings">
          <span class="icon wb-settings" aria-hidden="true"></span>
        </a>
        <a href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="Lock">
          <span class="icon wb-eye-close" aria-hidden="true"></span>
        </a>
        <a href="php/logout.php" data-placement="top" data-toggle="tooltip" data-original-title="Logout">
          <span class="icon wb-power" aria-hidden="true"></span>
        </a>
      </div></div>    <div class="site-gridmenu">
      <div>
        <div>
          <ul>
            <li>
              <a href="../../apps/mailbox/mailbox.html">
                <i class="icon wb-envelope"></i>
                <span>Mailbox</span>
              </a>
            </li>
            <li>
              <a href="../../apps/calendar/calendar.html">
                <i class="icon wb-calendar"></i>
                <span>Calendar</span>
              </a>
            </li>
            <li>
              <a href="../../apps/contacts/contacts.html">
                <i class="icon wb-user"></i>
                <span>Contacts</span>
              </a>
            </li>
            <li>
              <a href="../../apps/media/overview.html">
                <i class="icon wb-camera"></i>
                <span>Media</span>
              </a>
            </li>
            <li>
              <a href="../../apps/documents/categories.html">
                <i class="icon wb-order"></i>
                <span>Documents</span>
              </a>
            </li>
            <li>
              <a href="../../apps/projects/projects.html">
                <i class="icon wb-image"></i>
                <span>Project</span>
              </a>
            </li>
            <li>
              <a href="../../apps/forum/forum.html">
                <i class="icon wb-chat-group"></i>
                <span>Forum</span>
              </a>
            </li>
            <li>
              <a href="../../index.html">
                <i class="icon wb-dashboard"></i>
                <span>Dashboard</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Page -->
    <div class="page">
      <div class="page-header">
        <h1 class="page-title">Proyectos</h1>
        <div class="page-header-actions">  
        </div>
      </div>

      <div class="page-content container-fluid">
        <!-- Panel Columns & Select -->
        <div class="panel">
          <div class="panel-body">
            <div class="row row-lg">
              <!-- Basic Columns -->
              <div class="col-md-12">
                <!-- Example Basic Columns -->
                <div class="example-wrap">
                  <div class="example table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
						<th scope="col" style="width: 2%"></th>
									<th scope="col" style="width: 9%">Cliente</th>
									<th scope="col" style="width: 9%">Proyecto</th>
									<th scope="col" style="width: 9%">Fecha de Entrega</th>
									<th scope="col" style="width: 11%">Fecha de Envio</th>
									<th scope="col" style="width: 12%">Precio</th>
									<th scope="col" style="width: 16%">Costo</th>
									<th scope="col" style="width: 16%">Saldo</th>
									
                          
                          <th colspan="4">Acciones</th>
                          
                        </tr>
                      </thead>
                      <tbody>
					  <?php
									// Attempt select query execution
									$sql = "SELECT * FROM proyectos where estado=5 ORDER BY nombre_proyecto";
									mysql_query("SET NAMES 'utf8'");
									if($result = mysqli_query($conexion, $sql)){
									    if(mysqli_num_rows($result) > 0){
									        $i = 0;
									        while($row = mysqli_fetch_array($result)){
								?>
										<tr>
											<td></td>
											<td scope="row"><?php echo (($row['cliente']));?></td>
											<td><?php echo (($row['nombre_proyecto']));?></td>
											<td><?php echo (($row['fecha_entrega']));?></td>

											<td><?php echo (($row['fecha_envio']));?></td>

											<td><?php echo (($row['precio']));?></td>
											<td><?php echo (($row['costo_presupuestado']));?></td>
											<td><?php echo (($row['saldo']));?></td>
											<td><a href="mailto:<?php echo (($row['mail']));?>"><?php echo (($row['mail']));?></a></td>
											

											<td>
											<button type="button" class="btn btn-success ver2 " data-toggle="modal" data-id="<?php echo ($row['id_proyecto']);?>"><i class="icon wb-eye" aria-hidden="true"></i></button>
											</td>
											
											
											
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
                <!-- End Example Basic Columns -->
              </div>
          </div>
        </div>
		<!-- End Panel Columns & Select -->
		<!-- Site Action -->
       <!-- <div class="site-action" data-plugin="actionBtn">
          <button type="button" class="site-action-toggle btn-raised btn btn-success btn-floating" id="boton_nuevo_proyecto" data-toggle="modal" data-target="#modal_nuevo">
            <i class="front-icon wb-plus animation-scale-up" aria-hidden="true"></i>
            <i class="back-icon wb-close animation-scale-up" aria-hidden="true"></i>
          </button>
        </div>-->
        <!-- End Site Action -->
      </div>
    </div>
    <!-- End Page -->

   <!-- Modal Ver -->
   <div class="modal fade" id="modal_ver" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
									<div class="col-md-12"><h2>Datos del Proyecto</h2></div>
									<div class="col-md-4">
										<div class="form-group">
										    <h4>Cliente</h4>
										    <input type="text" id="ver_cliente" class="form-control" aria-label="Default" aria-describeby="inputGroup-sizing-default" readonly>
										</div>
									</div>
									<div class="col-md-8">
										<div class="form-group">
										    <h4>Producto</h4>
										    <input type="text" id="ver_producto" class="form-control" aria-label="Default" aria-describeby="inputGroup-sizing-default" readonly>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
										    <h4>Proyecto</h4>
										    <input type="text" id="ver_proyecto" class="form-control" aria-label="Default" aria-describeby="inputGroup-sizing-default" readonly>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
										    <h4>Detalle</h4>
										    <input type="textarea" id="ver_detalle" class="form-control" aria-label="Default" aria-describeby="inputGroup-sizing-default" readonly>
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
										    <h4>Costo</h4>
										    <input type="text" id="ver_costo" class="form-control" aria-label="Default" aria-describeby="inputGroup-sizing-default" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
										    <h4>Precio</h4>
										    <input type="text" id="ver_precio" class="form-control" aria-label="Default" aria-describeby="inputGroup-sizing-default" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
										    <h4>Saldo</h4>
										    <input type="text" id="ver_saldo" class="form-control" aria-label="Default" aria-describeby="inputGroup-sizing-default" readonly>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
										    <h4>Consumido</h4>
										    <input type="text" id="ver_consumido" class="form-control" aria-label="Default" aria-describeby="inputGroup-sizing-default" readonly>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
										    <h4>Fecha Entrega</h4>
										    <input type="date" id="ver_fecha_entrega" class="form-control" aria-label="Default" aria-describeby="inputGroup-sizing-default" readonly>
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

									<div class="col-md-12">
										<div class="form-group">
										    <h4>Fecha Envio</h4>
										    <input type="date" id="ver_fecha_envio" class="form-control" aria-label="Default" aria-describeby="inputGroup-sizing-default" readonly>
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

									
									</div>
									<div class="col-md-2">
										<div class="form-group">
										    <h4>Adicional</h4>
										    <input type="text" id="ver_adicional" class="form-control" aria-label="Default" aria-describeby="inputGroup-sizing-default" readonly>
										</div>
									</div>
												

									<div class="col-md-12">
										<div class="form-group">
										    <h4>Markup</h4>
										    <input type="text" id="ver_markup" class="form-control" aria-label="Default" aria-describeby="inputGroup-sizing-default" readonly>
										</div>
									</div>
		      					</div>
		      				</form>
      					</div>
					</div>
				</div>
			</div>

			

		

		<script type="text/javascript">
			$('#boton_volver, #boton_volver_abajo').click(function(){
				window.location.href = 'home.php';
			});

			$('#boton_nuevo_proveedor, #boton_nuevo_proveedor_abajo').click(function(){
				console.log("popup proveedor");
				$('#id_editar_en_nuevo').val(-1);
				$('#modal_nuevo').modal('show');
			});

			$('.editar').click(function(){
				var id = $(this).attr('data-id');
				console.log(id);
				$.ajax({
	                url:"cargar_proveedor.php",
	                method:"POST",
	                data:{id:id},
	                dataType:"json",
	                success:function(data){
										console.log(data);
										/*
	                     $('#nombre_cliente_editar').val(data.nombre);
	                     $('#razon_social_cliente_editar').val(data.razon_social);
	                     $('#cuit_cliente_editar').val(data.cuit);
	                     $('#tiempo_pago_cliente_editar').val(data.tiempo_pago);
	                     $('#dropdown_forma_pago_editar').val(data.forma_pago);
	                     $('#porcentaje_ocurrencia_editar').val(data.porcentaje_ocurrencia);
										*/
											 $('#id_editar_en_nuevo').val(id);
											 $('#servicio_nuevo').val(data.servicio);
											 $('#descripcion_nuevo').val(data.descripcion);
											 $('#razon_social_nuevo').val(data.razon_social);
											 $('#cuit_nuevo').val(data.cuit);
											 $('#contacto_nuevo').val(data.contacto);
											 $('#telefono_nuevo').val(data.telefono);
											 $('#celular_nuevo').val(data.celular);
											 $('#mail_nuevo').val(data.mail);
											 $('#web_nuevo').val(data.website);
											 $('#ubicacion_nuevo').val(data.ubicacion);
											 $('#observaciones_nuevo').val(data.observaciones);
											 $('#iso_nuevo').val(data.iso);
											 $('#forma_pago_nuevo').val(data.forma_pago);
											 $('#tiempo_cobro_nuevo').val(data.tiempo_cobro);
											 $('#obligatoriedad_nuevo').val(data.obligatoriedad);
											 $('#descripcion_pago_nuevo').val(data.descripcion_pago);
	                     $('#modal_nuevo').modal('show');
	                     console.log("id del proveedor: ", data.id_proveedor, id);
	                },
									error: function(error){
										console.log(error);
									},
									beforeSend: function(){
										console.log(this.url);
									}
	           });
			});

			function escapar(cadena){
				return cadena.replace(/&/g,'%26');
			}


			$('#guardar_nuevo_proveedor').click(function(event){
				var id = $("#id_editar_en_nuevo").val();
				var servicio = escapar($("#servicio_nuevo").val());
				var descripcion = escapar($("#descripcion_nuevo").val());
				var razon_social = escapar($("#razon_social_nuevo").val());
				var cuit = $("#cuit_nuevo").val();
				var contacto = escapar($("#contacto_nuevo").val());
				var telefono = $("#telefono_nuevo").val();
				var celular = $("#celular_nuevo").val();
				var mail = $("#mail_nuevo").val();
				var web = $("#web_nuevo").val();
				var observaciones = escapar($("#observaciones_nuevo").val());
				var ubicacion = escapar($("#ubicacion_nuevo").val());
				var iso = $("#iso_nuevo").val();
				var forma_pago = escapar($("#forma_pago_nuevo").val());
				var descripcion_pago = escapar($("#descripcion_pago_nuevo").val());
				var tiempo_cobro = $("#tiempo_cobro_nuevo").val();
				var obligatoriedad = $("#obligatoriedad_nuevo").val();
				console.log("Id ",id);

				var url = (id < 0) ? "agregar_proveedor.php" : "editar_proveedor.php";
				console.log("url ", url);

				var dataString = 'id='+id+'&servicio='+servicio+'&descripcion='+descripcion+'&razon_social='+razon_social+'&cuit='+cuit+'&contacto='+contacto+'&telefono='+telefono+'&celular='+celular+'&mail='+mail+'&web='+web+'&observaciones='+observaciones+'&ubicacion='+ubicacion+'&iso='+iso+'&forma_pago='+forma_pago+'&descripcion_pago='+descripcion_pago+'&tiempo_cobro='+tiempo_cobro+'&obligatoriedad='+obligatoriedad;

				console.log(dataString);
				$.ajax({
                     url:url,
                     method:"POST",
                     data: dataString,
                     success:function(data){
												$('#modal_nuevo').modal('hide');
												window.location.reload(true);
                     },
										 beforeSend:function(){
											 console.log("Enviando datos a ", this.url);
										 }
                });
			});

			$('.eliminar').click(function(){
				$('#modal_eliminar').modal('show');
				var id = $(this).attr('data-id');
				$('#boton_eliminar_cliente').click(function(){
					console.log(id);
					$.ajax({
		                url:"eliminar_proveedor.php",
		                method:"POST",
		                data:{id:id},
		                success:function(data){
		                	$('#modal_eliminar').modal('hide');
											window.location.reload();
		                },
										error:function(error){
											console.log(error);
										},
										beforeSend:function(){
											console.log("eliminando ",this.url);
										}
		           });
				});
			});

			$(".disponibilidad_proveedor").change(function(){
				var id_proveedor = $(this).attr('data-id');
				var disponibilidad = $(this).val();
				$.ajax({
	                url:"disponibilidad_proveedor.php",
	                method:"POST",
	                data:'id_proveedor='+id_proveedor+'&disponibilidad='+disponibilidad,
	                success:function(data){

	                }
	           });
			});

			$('.ver2').click(function(){
			    var id = $(this).attr('data-id');
			    console.log("Click id: ",id);
			    $.ajax({
	                url:"cargar_proyecto.php",
	                method:"POST",
	                data:{id:id},
	                dataType:"json",
	                success:function(data){
	                    $('#ver_servicio').val(data.servicio);
	                    $('#ver_descripcion').val(data.descripcion);
	                    $('#ver_razon_social').val(data.razon_social);
	                    $('#ver_cuit').val(data.cuit);
	                    $('#ver_contacto').val(data.contacto);
	                    $('#ver_telefono').val(data.telefono);
	                    $('#ver_celular').val(data.celular);
	                    $('#ver_mail').val(data.mail);
	                    $('#ver_web').val(data.website);
	                    $('#ver_observaciones').val(data.observaciones);
	                    $('#ver_ubicacion').val(data.ubicacion);
	                    $('#ver_iso').val(data.iso);
	                    $('#ver_forma_pago').val(data.forma_pago);
	                    $('#ver_forma_pago').attr("disabled", true);
	                    $('#ver_descripcion_pago').val(data.descripcion_pago);

	                    $("#boton_enviar_mail").click(function(){
	                    	window.location="mailto:"+data.mail;
	                    });

	                    $("#boton_visitar_sitio").click(function(){
	                    	window.location.href=data.website;
	                    });

	                    $('#modal_ver').modal('show');
	                }
	           });
			});
		</script>
		<script type="text/javascript">

			$(document).ready(function() {
			    $('#tabla_ordenar').DataTable( {
			        "paging": false,
			        columnDefs: [ {
			            orderable: false,
			            className: 'select-checkbox',
			            targets:   0
			        } ],
			        select: {
			            style:    'multi',
			            selector: 'td:first-child'
			        },
			        language: {
				        "decimal": "",
				        "emptyTable": "No hay información",
				        "info": "Mostrando _START_ a _END_ de _TOTAL_ proveedores",
				        "infoEmpty": "Mostrando 0 to 0 of 0 proveedores",
				        "infoFiltered": "(Filtrado de _MAX_ total proveedores)",
				        "infoPostFix": "",
				        "thousands": ",",
				        "lengthMenu": "Mostrar _MENU_ proveedores",
				        "loadingRecords": "Cargando...",
				        "processing": "Procesando...",
				        "search": "Buscar:",
				        "zeroRecords": "Sin resultados encontrados",
				        "paginate": {
				            "first": "Primero",
				            "last": "Ultimo",
				            "next": "Siguiente",
				            "previous": "Anterior"
				        }
				    }
			    } );
			} );
		</script>
   
    <!-- Core  -->
    <script src="design/global/vendor/babel-external-helpers/babel-external-helpers.js"></script>
    <script src="design/global/vendor/bootstrap/bootstrap.js"></script>
    <script src="design/global/vendor/animsition/animsition.js"></script>
    <script src="design/global/vendor/mousewheel/jquery.mousewheel.js"></script>
    <script src="design/global/vendor/asscrollbar/jquery-asScrollbar.js"></script>
    <script src="design/global/vendor/asscrollable/jquery-asScrollable.js"></script>
    <script src="design/global/vendor/ashoverscroll/jquery-asHoverScroll.js"></script>
    
    <!-- Plugins -->
    <script src="design/global/vendor/switchery/switchery.js"></script>
    <script src="design/global/vendor/intro-js/intro.js"></script>
    <script src="design/global/vendor/screenfull/screenfull.js"></script>
    <script src="design/global/vendor/slidepanel/jquery-slidePanel.js"></script>
        <script src="design/global/vendor/bootstrap-table/bootstrap-table.min.js"></script>
        <script src="design/global/vendor/bootstrap-table/extensions/mobile/bootstrap-table-mobile.js"></script>
    
    <!-- Scripts -->
    <script src="design/global/js/Component.js"></script>
    <script src="design/global/js/Plugin.js"></script>
    <script src="design/global/js/Base.js"></script>
    <script src="design/global/js/Config.js"></script>
    
    <script src="design/assets/js/Section/Menubar.js"></script>
    <script src="design/assets/js/Section/GridMenu.js"></script>
    <script src="design/assets/js/Section/Sidebar.js"></script>
    <script src="design/assets/js/Section/PageAside.js"></script>
    <script src="design/assets/js/Plugin/menu.js"></script>
    
    <script src="design/global/js/config/colors.js"></script>
    <script src="design/assets/js/config/tour.js"></script>
    <script>Config.set('assets', 'design/assets');</script>
    
    <!-- Page -->
    <script src="design/assets/js/Site.js"></script>
    <script src="design/global/js/Plugin/asscrollable.js"></script>
    <script src="design/global/js/Plugin/slidepanel.js"></script>
    <script src="design/global/js/Plugin/switchery.js"></script>
    
        <script src="design/assets/examples/js/tables/bootstrap.js"></script>
  </body>
</html>
