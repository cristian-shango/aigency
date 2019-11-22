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
    
    <title>AiGency | Clientes</title>
    
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
        <h1 class="page-title">Clientes</h1>
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
                      <thead >
                        <tr>
                          <th>Nombre de Fantasía</th>
                          <th>Razón Social</th>
                          <th>C.U.I.T.</th>
                          <th>Forma de Cobro</th>
                          <th>Tiempo de Cobro</th>
                          <th>Porcentaje de Ocurrencia</th>
                          <th>OC</th>                          
                          <th colspan="4">Acciones</th>
                          
                        </tr>
                      </thead>
                      <tbody>
								<?php
									// Attempt select query execution
									$sql = "SELECT * FROM clientes c INNER JOIN forma_pago fp ON c.forma_pago = fp.id ORDER BY nombre ASC";
									mysql_query("SET NAMES 'utf8'");
									if($result = mysqli_query($conexion, $sql)){
									    if(mysqli_num_rows($result) > 0){
									        $i = 0;
									        while($row = mysqli_fetch_array($result)){
								?>
										<tr>
											<td scope="row"><?php echo ($row['nombre']);?></td>
											<td><?php echo ($row['razon_social']);?></td>
											<td><?php echo ($row['cuit']);?></td>
											<td><?php echo ($row['tipo']);?></td>
											<td><?php echo ($row['tiempo_pago']);?> días</td>
											<td><?php echo ($row['porcentaje_ocurrencia']);?>%</td>
											<td><?php echo ($row['oc_cliente']);?></td>
											

											<td><button type="button" class="btn btn-default editar" data-toggle="modal" data-id="<?php echo ($row['id_cliente']);?>"><i class="icon wb-edit" aria-hidden="true"></i></button></td>		

											
											<td>
                                			<button type="button" class="btn btn-info eliminar" data-id="<?php echo ($row['id_cliente']);?>"><i class="icon wb-trash" aria-hidden="true"></i></button>
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
          <button type="button" class="site-action-toggle btn-raised btn btn-success btn-floating" id="boton_nuevo_cliente" data-toggle="modal" data-target="#modal_nuevo">
            <i class="front-icon wb-plus animation-scale-up" aria-hidden="true"></i>
            <i class="back-icon wb-close animation-scale-up" aria-hidden="true"></i>
          </button>
        </div>
        <!-- End Site Action -->
      </div>
    </div>
    <!-- End Page -->

    <!-- Modal Eliminar -->
      <div class="modal fade" id="modal_eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-center" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <h4>¿Borrar Cliente?</h4>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" id="boton_eliminar_cliente">Aceptar</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal Nuevo Cliente -->
	  <div class="modal fade" id="modal_nuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form method="POST" id="nuevo_cliente" name="nuevo_cliente">
								<div class="row">
									<div class="col-md-12"><h2>Nuevo Cliente</h2></div>
									<div class="col-md-6">
										<div class="form-group">
										    <h4>Nombre de Fantasía</h4>
										    <input type="text" id="nombre_cliente_nuevo" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
										    <h4>CUIT</h4>
										    <input type="text" id="cuit_cliente_nuevo" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
										</div>
									</div>
									<div class="col-md-9">
										<div class="form-group">
										    <h4>Razón Social</h4>
										    <input type="text" id="razon_social_cliente_nuevo" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
										    <input type="number" id="id" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" hidden>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-check" style="margin-top: 48px;">
											<input class="form-check-input" type="checkbox" id="nuevo_oc" style="margin-top: 8px;">
											<label class="form-check-label" for="nuevo_oc">
												<h4>¿Necesita OC?</h4>
											</label>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
										    <h4>Tiempo de Cobro</h4>
										    <div class="input-group">
											    <input type="text" id="tiempo_pago_cliente_nuevo" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
											    <div class="input-group-prepend">
													<div class="input-group-text">días</div>
												</div>
											</div>
										    <input type="number" id="id" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" hidden>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
										    <h4>Forma de Cobro</h4>
										    <select class="form-control" id="dropdown_forma_pago_nuevo" >
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
											<option value="<?php echo ($row['id']);?>"><?php echo ($row['tipo']);?></option>
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
									<div class="col-md-4">
										<div class="form-group">
										    <h4>Porcentaje de Ocurrencia</h4>
										    <div class="input-group">
												<input type="text" class="form-control" id="porcentaje_ocurrencia_nuevo">
												<div class="input-group-prepend">
													<div class="input-group-text">%</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<button type="button" class="btn btn-success btn-block" id="boton_agregar"><strong id="texto_guardar">GUARDAR</strong></button>
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

      <!-- Modal Editar Proyecto -->
	  <div class="modal fade" id="modal_editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form method="POST" id="actualizar_cliente">
								<div class="row">
									<div class="col-md-12"><h2>Edición de Cliente</h2></div>
									<div class="col-md-6">
										<div class="form-group">
										    <h4>Nombre de Fantasía</h4>
										    <input type="text" id="nombre_cliente_editar" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
										    <h4>CUIT</h4>
										    <input type="text" id="cuit_cliente_editar" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
										</div>
									</div>
									<div class="col-md-9">
										<div class="form-group">
										    <h4>Razón Social</h4>
										    <input type="text" id="razon_social_cliente_editar" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
										    <input type="number" id="id_editar" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" hidden>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-check" style="margin-top: 48px;">
											<input class="form-check-input" type="checkbox" id="editar_oc" style="margin-top: 8px;">
											<label class="form-check-label" for="editar_oc">
												<h4>¿Necesita OC?</h4>
											</label>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
										    <h4>Tiempo de Pago</h4>
										    <div class="input-group">
											    <input type="number" id="tiempo_pago_cliente_editar" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
											    <div class="input-group-prepend">
													<div class="input-group-text">días</div>
												</div>
											</div>
										    <input type="number" id="id" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" hidden>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
										    <h4>Forma de Pago</h4>
										    <select class="form-control" id="dropdown_forma_pago_editar" >
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
											<option value="<?php echo ($row['id']);?>"><?php echo ($row['tipo']);?></option>
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
									<div class="col-md-4">
										<div class="form-group">
										    <h4>Porcentaje de Ocurrencia</h4>
										    <div class="input-group">
												<input type="text" class="form-control" id="porcentaje_ocurrencia_editar">
												<div class="input-group-prepend">
													<div class="input-group-text">%</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<button type="button" class="btn btn-success btn-block" id="boton_editar"><strong id="texto_guardar">GUARDAR</strong></button>
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
			$('#boton_volver').click(function(){
				window.location.href = 'home.php';
			});

			$('#boton_nuevo_cliente').click(function(){
				var frm = document.getElementsByName('nuevo_cliente')[0];
			   frm.reset(); 
			});
			
			$('.editar').click(function(){
				var id = $(this).attr('data-id');
				console.log(id);
				$.ajax({  
	                url:"cargar_cliente.php",  
	                method:"POST",  
	                data:{id:id},  
	                dataType:"json",  
	                success:function(data){  
	                     $('#nombre_cliente_editar').val(data.nombre);  
	                     $('#razon_social_cliente_editar').val(data.razon_social);  
	                     $('#cuit_cliente_editar').val(data.cuit);
	                     $('#id_editar').val(data.id_cliente);
	                     $('#tiempo_pago_cliente_editar').val(data.tiempo_pago);
	                     $('#dropdown_forma_pago_editar').val(data.forma_pago);
	                     $('#porcentaje_ocurrencia_editar').val(data.porcentaje_ocurrencia);
	                     	if (data.oc_cliente == "SI"){
	                     		$('#editar_oc').prop("checked", true);
	                     	} else {
	                     		$('#editar_oc').prop("checked", false);
	                     	};
	                     $('#modal_editar').modal('show');
	                     console.log(data.id_cliente);
	                }  
	           }); 
			});

			$('#boton_editar').click(function(event){				
				var nombre = $("#nombre_cliente_editar").val();
				var razon_social = $("#razon_social_cliente_editar").val();
				var cuit = $("#cuit_cliente_editar").val();
				var id = $("#id_editar").val();
				var tiempo_pago = $("#tiempo_pago_cliente_editar").val();
				var forma_pago = $("#dropdown_forma_pago_editar").val();
				var porcentaje_ocurrencia = $("#porcentaje_ocurrencia_editar").val();

				var nuevo_oc = document.getElementById("editar_oc");
				if (nuevo_oc.checked) {
					nuevo_oc = "SI";
				} else {
					nuevo_oc = "NO";
				};

				var dataString = 'nombre='+nombre+'&razon_social='+razon_social+'&cuit='+cuit+'&id='+id+'&tiempo_pago='+tiempo_pago+'&forma_pago='+forma_pago+'&porcentaje_ocurrencia='+porcentaje_ocurrencia+'&nuevo_oc='+nuevo_oc;

				console.log(dataString);
				$.ajax({  
                     url:"editar_cliente.php",
                     method:"POST",
                     data: dataString,
                     success:function(data){  
						$('#modal_editar').modal('hide');
						window.location.reload();
                     }  
                });
			});

			

			$('.fa-trash-alt').click(function(){
				$('#modal_eliminar').modal('show');
				var id = $(this).attr('data-id');
				$('#boton_eliminar_cliente').click(function(){
					console.log(id);
					$.ajax({  
		                url:"eliminar_cliente.php",  
		                method:"POST",  
		                data:{id:id},
		                success:function(data){
		                	$('#modal_eliminar').modal('hide');
							window.location.reload();
		                }  
		           }); 
				});
			});
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
