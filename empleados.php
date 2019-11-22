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
    
    <title>AiGency | Empleados</title>
    
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
        <link rel="stylesheet" href="design/global/vendor/bootstrap-datepicker/bootstrap-datepicker.css">
    
    
    <!-- Fonts -->
    <link rel="stylesheet" href="design/global/fonts/web-icons/web-icons.min.css">
    <link rel="stylesheet" href="design/global/fonts/brand-icons/brand-icons.min.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/trumbowyg/dist/trumbowyg.min.js"></script>
    <script type="text/javascript" src="js/trumbowyg/dist/langs/es_ar.min.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/currencyformatter.js/2.2.0/currencyFormatter.js" integrity="sha256-lCXqGxPAQbTux1a9+jYZBXKJwb4amDg9c2MbtVk0Sec=" crossorigin="anonymous"></script>  
         
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
    <?php require "barra_lateral.php"; echo $html_barra_lateral; ?>

    <!-- Page -->
    <div class="page">
      <div class="page-header">
        <h1 class="page-title">Listado de Empleados</h1>
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
                                    <th scope="col" style="width: 9%">Apellido</th>
									<th scope="col" style="width: 9%">Nombre</th>
									<th scope="col" style="width: 6%">Estado Civil</th>
									<th scope="col" style="width: 2%">Hijos</th>
									<th scope="col" style="width: 12%">Direccion</th>
									
									<th scope="col" style="width: 6%">Fecha Nacimiento</th>
									<!--<th scope="col" style="width: 6%">Telefono</th>-->
									<th scope="col" style="width: 6%">Celular</th>
									<th scope="col" style="width: 9%">Mail</th>
									<th scope="col" style="width: 9%">CUIL</th>
									<th scope="col" style="width: 9%">Centro Costo</th>
									<th scope="col" style="width: 9%">Convenio Colectivo</th>
									<th scope="col" style="width: 6%">Remuneracion Bruta</th>
									<th scope="col" style="width: 9%">Jornada</th>
									<!--<th scope="col" style="width: 9%">Banco</th>
									<th scope="col" style="width: 9%">CBU</th>
									<th scope="col" style="width: 9%">Obra Social</th>
									<th scope="col" style="width: 6%">Fecha Ingreso</th>-->
									<th colspan="4">Acciones</th>
									
								</tr>
                      </thead>
                      <tbody>
					  <?php
									// Attempt select query execution
									$sql = "SELECT * FROM empleados ORDER BY apellido";
									mysql_query("SET NAMES 'utf8'");
									if($result = mysqli_query($conexion, $sql)){
									    if(mysqli_num_rows($result) > 0){
									        $i = 0;
									        while($row = mysqli_fetch_array($result)){
								?>
										<tr>
											<td></td>
											<td scope="row"><?php echo (($row['apellido']));?></td>
											<td><?php echo (($row['nombre']));?></td>
											<td><?php echo (($row['estadoCivil']));?></td>
											<td><?php echo (($row['hijos']));?></td>
											<td><?php echo (($row['direccion']));?></td>

											<td><?php echo (($row['nacimiento']));?></td>

											
											<td><?php echo (($row['celular']));?></td>
                                            <td><a href="mailto:<?php echo (($row['mail']));?>"><?php echo (($row['mail']));?></a></td>
											<td><?php echo (($row['cuil']));?></td>
											<td><?php echo (($row['centroCosto']));?></td>
											<td><?php echo (($row['convenioColectivo']));?></td>
											<td><?php echo (($row['remuneracionBruta']));?></td>
											<td><?php echo (($row['jornada']));?></td>

<!------------------------------------------------------------------------------------------------------->
								<td>
								<button type="button" class="btn btn-success ver2 " data-toggle="modal" data-id="<?php echo ($row['id']);?>"><i class="icon wb-eye" aria-hidden="true"></i></button>
								</td>

                              <td><button type="button" class="btn btn-default editar" data-toggle="modal" data-id="<?php echo ($row['id']);?>"><i class="icon wb-edit" aria-hidden="true"></i></button></td>			                            
                                  
                              
                              <td>
                                <button type="button" class="btn btn-info eliminar" data-id="<?php echo ($row['id']);?>"><i class="icon wb-trash" aria-hidden="true"></i></button>
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
          <button type="button" class="site-action-toggle btn-raised btn btn-success btn-floating" id="boton_nuevo_empleado_abajo" data-toggle="modal" data-target="#modal_nuevo_proyecto">
            <i class="front-icon wb-plus animation-scale-up" aria-hidden="true"></i>
            <i class="back-icon wb-close animation-scale-up" aria-hidden="true"></i>
          </button>
        </div>
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
							<form method="POST" id="actualizar_empleado">
								<div class="row">
									<div class="col-md-12"><h2>Datos del Empleado</h2></div>
									<div class="col-md-4">
										<div class="form-group">
										    <h4>Apellido</h4>
										    <input type="text" id="ver_apellido" class="form-control" aria-label="Default" aria-describeby="inputGroup-sizing-default" readonly></input>
										</div>
									</div>

									<div class="col-md-8">
										<div class="form-group">
										    <h4>Nombre</h4>
										    <input type="text" id="ver_nombre" class="form-control" aria-label="Default" aria-describeby="inputGroup-sizing-default" readonly></input>
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
										    <h4>Estado Civil</h4>
										    <input type="text" id="ver_estadoCivil" class="form-control" aria-label="Default" aria-describeby="inputGroup-sizing-default" readonly></input>
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
										    <h4>Hijos</h4>
										    <input type="text" id="ver_hijos" class="form-control" aria-label="Default" aria-describeby="inputGroup-sizing-default" readonly></input>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
										    <h4>Direccion</h4>
										    <input type="text" id="ver_direccion" class="form-control" aria-label="Default" aria-describeby="inputGroup-sizing-default" readonly></input>
										</div>
									</div>


									<div class="col-md-6">
										<div class="form-group">
										    <h4>Fecha de Nacimiento</h4>
										    <input type="date" id="ver_nacimiento" class="form-control" aria-label="Default" aria-describeby="inputGroup-sizing-default" readonly></input>
										</div>
									</div>


									<div class="col-md-4">
										<div class="form-group">
										    <h4>Telefono</h4>
										    <input type="text" id="ver_telefono" class="form-control" aria-label="Default" aria-describeby="inputGroup-sizing-default" readonly></input>
										</div>
									</div>


									<div class="col-md-4">
										<div class="form-group">
										    <h4>Celular</h4>
										    <input type="text" id="ver_celular" class="form-control" aria-label="Default" aria-describeby="inputGroup-sizing-default" readonly></input>
										</div>
									</div>


									<div class="col-md-4">
										<div class="form-group">
										    <h4>Mail</h4>
										    <input type="text" id="ver_mail" class="form-control" aria-label="Default" aria-describeby="inputGroup-sizing-default" readonly></input>
										</div>
									</div>


									<div class="col-md-4">
										<div class="form-group">
										    <h4>CUIL</h4>
										    <input type="text" id="ver_cuil" class="form-control" aria-label="Default" aria-describeby="inputGroup-sizing-default" readonly></input>
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
										    <h4>Centro Costo</h4>
										    <input type="text" id="ver_centroCosto" class="form-control" aria-label="Default" aria-describeby="inputGroup-sizing-default" readonly></input>
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
										    <h4>Convenio Colectivo</h4>
										    <input type="text" id="ver_convenioColectivo" class="form-control" aria-label="Default" aria-describeby="inputGroup-sizing-default" readonly></input>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
										    <h4>Remuneracion Bruta</h4>
										    <input type="text" id="ver_remuneracionBruta" class="form-control" aria-label="Default" aria-describeby="inputGroup-sizing-default" readonly></input>
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
										    <h4>Jornada</h4>
										    <input type="text" id="ver_jornada" class="form-control" aria-label="Default" aria-describeby="inputGroup-sizing-default" readonly></input>
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
										    <h4>Banco</h4>
										    <input type="text" id="ver_banco" class="form-control" aria-label="Default" aria-describeby="inputGroup-sizing-default" readonly></input>
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
										    <h4>CBU</h4>
										    <input type="text" id="ver_cbu" class="form-control" aria-label="Default" aria-describeby="inputGroup-sizing-default" readonly></input>
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
										    <h4>Obra Social</h4>
										    <input type="text" id="ver_obraSocial" class="form-control" aria-label="Default" aria-describeby="inputGroup-sizing-default" readonly></input>
										</div>
									</div>


									<div class="col-md-6">
										<div class="form-group">
										    <h4>Fecha de Ingreso</h4>
										    <input type="date" id="ver_ingreso" class="form-control" aria-label="Default" aria-describeby="inputGroup-sizing-default" readonly></input>
										</div>
									</div>									
									
		      					</div>
		      				</form>
      					</div>
					</div>
				</div>
			</div>


				<!-- Modal Eliminar -->
		
		<div class="modal fade" id="modal_eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-center " role="document">
          <div class="modal-content">
		  <h5 class="modal-title" id="exampleModalLongTitle">¿Borrar Empleado?</h5>
            <div class="modal-header">
              
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" id="boton_eliminar_empleado">Aceptar</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
          </div>
        </div>
      </div>

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
							<form method="POST" id="nuevo_empleado">
								<input type="number" id="id_editar_en_nuevo" hidden>
								<div class="row">
									<div class="col-md-12"><h2>Datos del Empleado</h2></div>
									<div class="col-md-4">
										<div class="form-group">
										    <h4>Apellido</h4>
										    <input type="text" id="apellido_nuevo" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
										</div>
									</div>

									<div class="col-md-8">
										<div class="form-group">
										    <h4>Nombre</h4>
										    <input type="text" id="nombre_nuevo" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
										</div>
									</div>

									<div class="col-md-3">
										<div class="form-group">
										    <h4>Estado Civil</h4>
										    <select class="form-control" id="estadoCivil_nuevo" >
										      	<option value="">Seleccionar</option>
												<option value="Soltero/a">Soltero/a</option>
												<option value="Casado/a">Casado/a</option>
												<option value="Otro">Otro</option>
											</select>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
										    <h4>Hijos</h4>
										    <input type="text" id="hijos_nuevo" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
										</div>
									</div>


									<div class="col-md-6">
										<div class="form-group">
										    <h4>Direccion</h4>
										    <input type="text" id="direccion_nuevo" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
										</div>
									</div>


									<div class="col-md-6">
										<div class="form-group">
										    <h4>Fecha de Nacimiento</h4>
										    <input type="date" id="nacimiento_nuevo" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
										</div>
									</div>


									<div class="col-md-4">
										<div class="form-group">
										    <h4>Telefono</h4>
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

									<div class="col-md-6">
										<div class="form-group">
										    <h4>CUIL</h4>
										    <input type="text" id="cuil_nuevo" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
										    <h4>Centro Costo</h4>
										    <input type="text" id="centroCosto_nuevo" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
										    <h4>Convenio Colectivo</h4>
										    <input type="text" id="convenioColectivo_nuevo" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
										</div>
									</div>


									<div class="col-md-4">
										<div class="form-group">
										    <h4>Remuneracion Bruta</h4>
										    <input type="text" id="remuneracionBruta_nuevo" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
										</div>
									</div>

									<div class="col-md-3">
										<div class="form-group">
										    <h4>Jornada</h4>
										    <select class="form-control" id="jornada_nuevo" >
										      	<option value="">Seleccionar</option>
												<option value="Completa">Completa</option>
												<option value="Media">Media</option>
												<option value="Otro">Otro</option>
											</select>
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
										    <h4>Banco</h4>
										    <input type="text" id="banco_nuevo" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
										</div>
									</div>
									

									<div class="col-md-4">
										<div class="form-group">
										    <h4>CBU</h4>
										    <input type="text" id="cbu_nuevo" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
										</div>
									</div>
									
									<div class="col-md-4">
										<div class="form-group">
										    <h4>Obra Social</h4>
										    <input type="text" id="obraSocial_nuevo" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
										</div>
									</div>


									<div class="col-md-4">
										<div class="form-group">
										    <h4>Fecha de Ingreso</h4>
										    <input type="date" id="ingreso_nuevo" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
										</div>
									</div>									

																		
									<div class="col-md-6">
										<button type="button" class="btn btn-success btn-block" id="guardar_nuevo_empleado"><strong id="texto_guardar">GUARDAR</strong></button>
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

		
	  
	
<!--Scripts Modales-->
<script type="text/javascript">
			$('#boton_volver, #boton_volver_abajo').click(function(){
				window.location.href = 'home.php';
			});

			$('#boton_nuevo_empleado, #boton_nuevo_empleado_abajo').click(function(){
				console.log("popup empleado");
				$('#id_editar_en_nuevo').val(-1);
				$('#modal_nuevo').modal('show');
			});

			$('.editar').click(function(){
				var id = $(this).attr('data-id');
				console.log(id);
				$.ajax({
	                url:"cargar_empleado.php",
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
											 $('#apellido_nuevo').val(data.apellido);
											 $('#nombre_nuevo').val(data.nombre);
											 $('#estadoCivil_nuevo').val(data.estadoCivil);
											 $('#hijos_nuevo').val(data.hijos);
											 $('#direccion_nuevo').val(data.direccion);
											 $('#nacimiento_nuevo').val(data.nacimiento);
											 $('#telefono_nuevo').val(data.telefono);
											 $('#celular_nuevo').val(data.celular);
											 $('#mail_nuevo').val(data.mail);
											 $('#cuil_nuevo').val(data.cuil);
											 $('#centroCosto_nuevo').val(data.centroCosto);
											 $('#convenioColectivo_nuevo').val(data.convenioColectivo);
											 $('#remuneracionBruta_nuevo').val(data.remuneracionBruta);
											 $('#jornada_nuevo').val(data.jornada);
											 $('#banco_nuevo').val(data.banco);
											 $('#cbu_nuevo').val(data.cbu);
											 $('#obraSocial_nuevo').val(data.obraSocial);
											 $('#ingreso_nuevo').val(data.ingreso);
	                     $('#modal_nuevo').modal('show');
	                     console.log("id del empleado: ", data.id, id);
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


			$('#guardar_nuevo_empleado').click(function(event){
				var id = $("#id_editar_en_nuevo").val();
				var apellido =($("#apellido_nuevo").val());
				var nombre =($("#nombre_nuevo").val());
				var estadoCivil =($("#estadoCivil_nuevo").val());
				var hijos = $("#hijos_nuevo").val();
				var direccion = $("#direccion_nuevo").val();
				var nacimiento =($("#nacimiento_nuevo").val());
				var telefono = $("#telefono_nuevo").val();
				var celular = $("#celular_nuevo").val();
				var mail = $("#mail_nuevo").val();
				var cuil = $("#cuil_nuevo").val();
				var centroCosto =($("#centroCosto_nuevo").val());
				var convenioColectivo =($("#convenioColectivo_nuevo").val());
				var remuneracionBruta = $("#remuneracionBruta_nuevo").val();
				var jornada =($("#jornada_nuevo").val());
				var banco =($("#banco_nuevo").val());
				var cbu = $("#cbu_nuevo").val();
				var obraSocial = $("#obraSocial_nuevo").val();
				var ingreso = $("#ingreso_nuevo").val();
				console.log("id ",id);

				var url = (id < 0) ? "agregar_empleado.php" : "editar_empleado.php";
				console.log("url ", url);

				var dataString = 'id='+id+'&apellido='+apellido+'&nombre='+nombre+'&estadoCivil='+estadoCivil+'&hijos='+hijos+'&direccion='+direccion+'&nacimiento='+nacimiento+'&telefono='+telefono+'&celular='+celular+'&mail='+mail+'&cuil='+cuil+'&centroCosto='+centroCosto+'&convenioColectivo='+convenioColectivo+'&remuneracionBruta='+remuneracionBruta+'&jornada='+jornada+'&banco='+banco+'&cbu='+cbu+'&obraSocial='+obraSocial+'&ingreso='+ingreso;

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
				$('#boton_eliminar_empleado').click(function(){
					console.log(id);
					$.ajax({
		                url:"eliminar_empleado.php",
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

	

			

			$('.ver2').click(function(){
			    var id = $(this).attr('data-id');
			    console.log("Click id: ",id);
			    $.ajax({
	                url:"cargar_empleado.php",
	                method:"POST",
	                data:{id:id},
	                dataType:"json",
	                success:function(data){
	                    $('#ver_apellido').val(data.apellido);
	                    $('#ver_nombre').val(data.nombre);
	                    $('#ver_estadoCivil').val(data.estadoCivil);
	                    $('#ver_hijos').val(data.hijos);
	                    $('#ver_direccion').val(data.direccion);
						$('#ver_nacimiento').val(data.nacimiento);
	                    $('#ver_telefono').val(data.telefono);
	                    $('#ver_celular').val(data.celular);
	                    $('#ver_mail').val(data.mail);
	                    $('#ver_cuil').val(data.cuil);
	                    $('#ver_centroCosto').val(data.centroCosto);
	                    $('#ver_convenioColectivo').val(data.convenioColectivo);
	                    $('#ver_remuneracionBruta').val(data.remuneracionBruta);
	                    $('#ver_jornada').val(data.jornada);
	                    $('#ver_banco').val(data.banco);
	                    $('#ver_cbu').val(data.cbu);
						$('#ver_obraSocial').val(data.obraSocial);
						$('#ver_ingreso').val(data.ingreso);

	                    $("#boton_enviar_mail").click(function(){
	                    	window.location="mailto:"+data.mail;
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
				        "info": "Mostrando _START_ a _END_ de _TOTAL_ empleados",
				        "infoEmpty": "Mostrando 0 to 0 of 0 empleados",
				        "infoFiltered": "(Filtrado de _MAX_ total empleados)",
				        "infoPostFix": "",
				        "thousands": ",",
				        "lengthMenu": "Mostrar _MENU_ empleados",
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
        <script src="design/global/vendor/bootstrap-datepicker/bootstrap-datepicker.js"></script>
    
    <!-- Scripts -->
    


    <script src="js/pedido_cotizacion.js"></script>

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
        <script src="design/global/js/Plugin/bootstrap-datepicker.js"></script>
        <script src="design/assets/examples/js/tables/bootstrap.js"></script>
  </body>
</html>
