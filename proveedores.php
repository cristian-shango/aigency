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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" type="text/css" href="design/global/css/star-rating-svg.css">
    
  
  <link rel="stylesheet" href="design/global/css/proveedores.css">
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
      <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script> 
      <script src="design/global/js/jquery.star-rating-svg.js"></script>
      
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
        <h1 class="page-title">Proveedores</h1>
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
                    <table id="tabla_proveedores" class="table table-hover table-bordered table-responsive">
                      <thead>
                        <tr>
							<th scope="col"></th>
							<th scope="col" style="width: 10%">Servicio</th>
							<th scope="col" style="width: 10%">Descripción</th>
							<th scope="col" style="width: 20%">Razón Social</th>
							<th scope="col" style="width: 10%">Contacto</th>							
							<th scope="col" style="width: 10%">Celular</th>
              <th scope="col" style="width: 15%">Mail</th>
              <th scope="col" style="width: 20%">Valoración</th>
                        </tr>
                      </thead>
                      <tbody>
					  <?php
						// Attempt select query execution
						$sql = "SELECT * FROM proveedores ORDER BY servicio";
						mysql_query("SET NAMES 'utf8'");
						if($result = mysqli_query($conexion, $sql)){
						    if(mysqli_num_rows($result) > 0){
						        $i = 0;
						        while($row = mysqli_fetch_array($result)){
						?>
									<tr >
										<th scope="row">
											<?php
												if($row['disponibilidad'] == "DISPONIBLE"){
											?>
												<span class="dot-disponible"></span>
											<?php
												}
												if($row['disponibilidad'] == "OCUPADO"){
											?>
												<span class="dot-ocupado"></span>
											<?php
												}
												if($row['disponibilidad'] == "DESCARTADO"){
											?>
												<span class="dot-descartado"></span>
											<?php
												}
												if($row['disponibilidad'] == ""){
											?>
												<span class="dot-disponible"></span>
											<?php
												}
											?></th>
										<td class="editar" data-toggle="modal" data-id="<?php echo ($row['id_proveedor']);?>" style="cursor: pointer;"><?php echo (($row['servicio']));?></td>
										<td class="editar" data-toggle="modal" data-id="<?php echo ($row['id_proveedor']);?>" style="cursor: pointer;"><?php echo (($row['descripcion']));?></td>
										<td class="editar" data-toggle="modal" data-id="<?php echo ($row['id_proveedor']);?>" style="cursor: pointer;"><?php echo (($row['razon_social']));?></td>

										<td class="editar" data-toggle="modal" data-id="<?php echo ($row['id_proveedor']);?>" style="cursor: pointer;"><?php echo (($row['contacto']));?></td>										
										<td class="editar" data-toggle="modal" data-id="<?php echo ($row['id_proveedor']);?>" style="cursor: pointer;"><?php echo (($row['celular']));?></td>
                    <td class="editar" data-toggle="modal" data-id="<?php echo ($row['id_proveedor']);?>" style="cursor: pointer;"><a href="mailto:<?php echo (($row['mail']));?>"><?php echo (($row['mail']));?></a></td>
                    <td >                                        
                    <div class="my-rating" data-rating="<?php echo (($row['ranking']));?>"></div><p><?php echo (($row['ranking']));?></p>            
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
        <div class="site-action" data-plugin="actionBtn">
          <button type="button" class="site-action-toggle btn-raised btn btn-success btn-floating" id="boton_nuevo_proveedor" data-toggle="modal" data-target="#modal_nuevo">
            <i class="front-icon wb-plus animation-scale-up" aria-hidden="true"></i>
            <i class="back-icon wb-close animation-scale-up" aria-hidden="true"></i>
          </button>
        </div>
        <!-- End Site Action -->
      </div>
    </div>
    <!-- End Page -->

			<!-- Modal Nuevo Ultimo -->
			<div class="modal fade" id="modal_nuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>

            
						<div class="modal-body">
							<form method="POST" id="nuevo_proveedor">
								<input type="number" id="id_editar_en_nuevo" hidden>
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
										    <h4>Nombre Fantasia</h4>
										    <input type="text" id="nombre_fantasia_nuevo" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
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
             

                  <div class="col-md-12">
										<div class="form-group">
                        <h4>Calificación</h4>
                        <div class="calificacion_proveedor">
                        <div>
                        <h4>Tiempo</h4>
                        <span class="my-rating-9" data-rating="0"> </span>
                        <span id="ranking_tiempo" class="live-rating" > </span>
                        <!--<select class="form-control" id="ranking_tiempo">
										      	<option value="">Seleccionar</option>
												<option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                      </select>-->
                    </div>
                     <div>
                        <h4>Calidad</h4>
                        <span class="my-rating-10" data-rating="0"> </span>
                        <span id="ranking_calidad" class="live-rating" > </span>
                        <!--<select class="form-control" id="ranking_calidad" >
										      	<option value="">Seleccionar</option>
												<option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                      </select>-->
                    </div>
                     <div>
                        <h4>Precio</h4>
                        <span class="my-rating-11" data-rating="0"> </span>
                        <span id="ranking_precio" class="live-rating" > </span>
                        <!--<select class="form-control" id="ranking_precio" >
										      	<option value="">Seleccionar</option>
												<option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                      </select>-->
                    </div>
                     </div>
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

			<!-- Modal Eliminar -->
			<div class="modal fade" id="modal_eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered " role="document">
					<div class="modal-content">
					<h5 class="modal-title" id="exampleModalLongTitle">¿Borrar Proveedor?</h5>
						
						<div class="modal-footer">
							<button type="button" class="btn btn-success" id="boton_eliminar_cliente">Aceptar</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
						</div>
					</div>
				</div>
			</div>
   
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
    	<script src="design/global/vendor/moment/moment.min.js"></script>
    
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
    <script src="js/proveedores.js"></script>
    <script src="design/assets/examples/js/tables/bootstrap.js"></script> 
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/r-2.2.3/datatables.min.css"/>
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/r-2.2.3/datatables.min.js"></script>   	

    <script type="text/javascript">
    	$(document).ready(function() {
		    $('.table').DataTable( {
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
		});
    </script>   
    
    <script>
    $(".my-rating").starRating({
    starSize: 25,
    readOnly: true,    
});

$(".my-rating-9").starRating({
    initialRating: 0,
    starSize: 25,
    disableAfterRate: false,
    onHover: function(currentIndex, currentRating, $el){
      $('#ranking_tiempo').text(currentIndex);
    },
    onLeave: function(currentIndex, currentRating, $el){
      $('#ranking_tiempo').text(currentRating);
    }
  });

  $(".my-rating-10").starRating({
    initialRating: 0,
    starSize: 25,
    disableAfterRate: false,
    onHover: function(currentIndex, currentRating, $el){
      $('#ranking_calidad').text(currentIndex);
    },
    onLeave: function(currentIndex, currentRating, $el){
      $('#ranking_calidad').text(currentRating);
    }
  });

  $(".my-rating-11").starRating({
    initialRating: 0,
    starSize: 25,
    disableAfterRate: false,
    onHover: function(currentIndex, currentRating, $el){
      $('#ranking_precio').text(currentIndex);
    },
    onLeave: function(currentIndex, currentRating, $el){
      $('#ranking_precio').text(currentRating);
    }
  });
</script>
  </body>
</html>
