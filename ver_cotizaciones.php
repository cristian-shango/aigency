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
    
    <title>AiGency | Ver Cotizaciones</title>
    
    <link rel="apple-touch-icon" href="design/assets/images/apple-touch-icon.png">
    <link rel="shortcut icon" href="design/assets/images/favicon.ico">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="design/global/css/bootstrap.min.css">
    <link rel="stylesheet" href="design/global/css/bootstrap-extend.min.css">
    <link rel="stylesheet" href="design/assets/css/site.css">
    
    <!-- Plugins -->
    <link rel="stylesheet" href="design/global/vendor/animsition/animsition.css">
    <link rel="stylesheet" href="design/global/vendor/asscrollable/asScrollable.css">
    <link rel="stylesheet" href="design/global/vendor/switchery/switchery.css">
    <link rel="stylesheet" href="design/global/vendor/intro-js/introjs.css">
    <link rel="stylesheet" href="design/global/vendor/slidepanel/slidePanel.css">
    <link rel="stylesheet" href="design/global/vendor/flag-icon-css/flag-icon.css">
        <link rel="stylesheet" href="design/global/vendor/bootstrap-table/bootstrap-table.css">
        <link rel="stylesheet" href="design/global/vendor/select2/select2.css">
        <link rel="stylesheet" href="design/assets/examples/css/forms/advanced.css">
    
    
    <!-- Fonts -->
    <link rel="stylesheet" href="design/global/fonts/web-icons/web-icons.min.css">
    <link rel="stylesheet" href="design/global/fonts/brand-icons/brand-icons.min.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="design/global/vendor/select2/select2.full.min.js"></script>
    <script src="design/assets/examples/js/forms/advanced.js"></script>
    
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
  <body class="animsition page-aside-static page-aside-right">
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
      <div class="page-aside">

        <div class="page-aside-switch">
          <i class="icon wb-chevron-left" aria-hidden="true"></i>
          <i class="icon wb-chevron-right" aria-hidden="true"></i>
        </div>

        <div class="page-aside-inner page-aside-scroll">
          <div data-role="container">
            <div data-role="content">
              <section class="page-aside-section">
                <?php
            //echo $_GET['id'];
            
            $sql = "SELECT * FROM proyectos p INNER JOIN clientes c ON p.cliente = c.id_cliente INNER JOIN subtipo_cotizacion sc ON p.subtipo_cotizacion = sc.id_subtipo WHERE id = '".$_GET['id']."'";  
            mysql_query("SET NAMES 'utf8'");
            if($result = mysqli_query($conexion, $sql)){
                if(mysqli_num_rows($result) > 0){
                    $i = 0;
                    while($row = mysqli_fetch_array($result)){
          ?>
                <div>
                  <div class="col-md-12"><h5>Cliente: <span id="ingreso_cliente" style="font-weight: lighter;"><?php echo ($row['nombre']);?></span></h5></div>
                  <div class="col-md-12"><h5>Producto: <span id="ingreso_producto" style="font-weight: lighter;"><?php echo ($row['producto_proyecto']);?></span></h5></div>
                  <div class="col-md-12"><h5>Subtipo de Servicio: <span id="ingreso_proyecto" style="font-weight: lighter;"><?php echo utf8_encode($row['nombre_subtipo']);?></span></h5></div>
                  <div class="col-md-12"><h5>Proyecto: <span id="ingreso_proyecto" style="font-weight: lighter;"><?php echo ($row['nombre_proyecto']);?></span></h5></div>
                  <div class="col-md-12"><h5>Estado: <span id="tipo_estado" style="font-weight: lighter;"><?php echo ($row['estado']);?></span></h5></div>
                  <div class="col-md-12"><h5>Detalle del proyecto:<br><span style="font-weight: lighter;"><?php echo ($row['detalle']);?></span></h5></div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <h5>Costo Objetivo</h5>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">$</div>
                        </div>
                        <input type="text" class="form-control" id="costo_presupuesto_total" readonly value="<?php echo ($row['costo_presupuestado']);?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <h5>Costo Real</h5>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">$</div>
                        </div>
                        <input type="text" class="form-control" id="consumido_total" readonly value="<?php echo ($row['consumido']);?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <h5>Diferencia</h5>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">$</div>
                        </div>
                        <input type="text" class="form-control" id="saldo_total" readonly value="<?php echo ($row['saldo']);?>">
                      </div>
                    </div> 
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <h5>Adicionales</h5>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">$</div>
                        </div>
                        <input type="text" class="form-control" id="adicionales_total" readonly value="0.00">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <h5>Costo Final</h5>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">$</div>
                        </div>
                        <input type="text" class="form-control" id="costo_total" readonly value="<?php echo ($row['precio_markup']);?>">
                      </div>
                    </div>
                  </div>
                </div>
                <span id="ingreso_id" style="display: none;"><?php echo ($row['id']);?></span>
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
          <div class="col-md-12">
            <button class="btn btn-block btn btn-success clickable cambio_estado_aprobar" data-estado="APROBADO" style="cursor: pointer;">APROBADA</button>
            <button class="btn btn-block btn btn-danger clickable cambio_estado_mensaje" data-estado="RECHAZADO" style="cursor: pointer;">RECHAZADA</button>
            <button class="btn btn-block btn btn-info clickable cambio_estado_mensaje" data-estado="AJUSTAR" style="cursor: pointer;">AJUSTAR</button>
            <button class="btn btn-block btn btn-warning clickable cambio_estado_mensaje" data-estado="STAND BY" style="cursor: pointer;">STAND BY</button>
            <button class="btn btn-block btn btn-dark clickable cambio_estado_mensaje" data-estado="CANCELADO" style="cursor: pointer;">CANCELADA</button> 
          </div>
              </section>
            </div>
          </div>
        </div>
        <!---page-aside-inner-->
      </div>
      <div class="page-main">
        <div class="page-content">
          <!-- Panel Columns & Select -->
          <div class="panel">
            <div class="panel-body">
              <div class="row row-lg">
                <!-- Basic Columns -->
                <div class="col-md-12">
                  <!-- Example Basic Columns -->
                  <div class="example-wrap">
                    <div class="example table-responsive">
                      <!-- NUEVA TABLA -->
                      <table class="table table-hover border-tabla" id="tabla_cotizaciones"></table>
                      <!-- NUEVA TABLA -->
                      <table class="table" id="table_adicionales"></table>
                    </div>
                  </div>
                  <!-- End Example Basic Columns -->
                </div>
            </div>
            <div class="panel">
              <div class="panel-body">
                <div class="chat-box">
                  <div class="chats">
                    <?php
                      // Attempt select query execution
                      $sql_mensaje = "SELECT * FROM mensajes WHERE id_registro = '".$_GET['id']."'";
                      mysql_query("SET NAMES 'utf8'");
                      if($result_mensaje = mysqli_query($conexion, $sql_mensaje)){
                          if(mysqli_num_rows($result_mensaje) > 0){
                              $i = 0;
                              while($row_mensaje = mysqli_fetch_array($result_mensaje)){
                    ?>
                    <div class="chat chat-left">
                      <div class="chat-avatar">
                        <a class="avatar" data-toggle="tooltip" href="#" data-placement="left" title="" data-original-title="Edward Fletcher">
                          <img src="design/global/portraits/5.jpg" alt="Edward Fletcher">
                        </a>
                      </div>
                      <div class="chat-body">
                        <div class="chat-content">
                          <p>
                            <?php echo ($row_mensaje['mensaje']);?>
                          </p>
                          <p>Estado: <?php echo ($row_mensaje['estado']);?></p>
                          <time class="chat-time" datetime="<?php echo ($row_mensaje['fecha_hora']);?>"><?php echo ($row_mensaje['fecha_hora']);?></time>
                        </div>
                      </div>
                    </div>
                    <?php
                          }
                          mysqli_free_result($result_mensaje);
                        } else{
                          echo "No hay mensajes.";
                        }
                      } else{
                        echo "ERROR: Could not able to execute $sql_mensaje. " . mysqli_error($conexion);
                      }
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Panel Columns & Select -->
        </div>
      </div>
    </div>
    <!-- End Page -->

    <!-- MODAL DE MENSAJES -->
    <div class="modal fade" id="modal_mensaje" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
          <form name="formulario_mensaje">
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  <h4>Cambio de Estado: <span id="texto_cambio_estado"></span></h4>
                  <div class="form-group">
                    <h4>Motivo</h4>
                    <textarea row="8" id="motivo_cambio_estado" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"></textarea>
                  </div>
                </div>
              </div>
            </div>
          </form>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" id="boton_mensaje">Enviar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          </div>
        </div>
      </div>
    </div>
      <!-- Modal Editar Cotización -->
      <div class="modal fade" id="modal_editar_registro" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <form id="formulario_carga_cotizacion">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12"><h3>Editar Cotización</h3></div>
                  <div class="col-md-3">
                    <div class="form-group">
                        <h4>Rubro</h4>
                         <select class="form-control dropdown_rubro_editar" id="edicion_rubro">
                            <option value="">Rubro</option>
                            <?php
                              $sql_rubro_dropdown = "SELECT * FROM rubros_cotizaciones ORDER BY nombre_rubros ASC";
                              mysql_query("SET NAMES 'utf8'");
                              if($result_rubro_dropdown = mysqli_query($conexion, $sql_rubro_dropdown)){
                                if(mysqli_num_rows($result_rubro_dropdown) > 0){
                                    $i = 0;
                                    while($row_rubro_dropdown = mysqli_fetch_array($result_rubro_dropdown)){
                              ?>
                            <option value="<?php echo ($row_rubro_dropdown['id_rubros_cotizaciones']);?>"><?php echo (utf8_encode($row_rubro_dropdown['nombre_rubros']));?></option>
                            <?php
                              }
                              mysqli_free_result($result_rubro_dropdown);
                                  } else{
                                      echo "No hay datos para mostrar.";
                                  }
                              } else{
                            echo "ERROR: Could not able to execute $sql_rubro_dropdown. " . mysqli_error($conexion);
                              }
                            ?>
                          </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                        <h4>Categoría</h4>
                         <select class="form-control dropdown_categoria_editar" id="edicion_categoria">
                            <option value="">Categoría</option>
                            <?php
                            $sql_categorias_dropdown = "SELECT * FROM categorias_cotizaciones ORDER BY nombre_catcot ASC";
                            mysql_query("SET NAMES 'utf8'");
                            if($result_categorias_dropdown = mysqli_query($conexion, $sql_categorias_dropdown)){
                                if(mysqli_num_rows($result_categorias_dropdown) > 0){
                                    $i = 0;
                                    while($row_categorias_dropdown = mysqli_fetch_array($result_categorias_dropdown)){
                            ?>
                            <option value="<?php echo (utf8_encode($row_categorias_dropdown['id_catcot']));?>"><?php echo (utf8_encode($row_categorias_dropdown['nombre_catcot']));?></option>
                            <?php
                                    }
                                    mysqli_free_result($result_categorias_dropdown);
                                } else{
                                    echo "No hay datos para mostrar.";
                                }
                            } else{
                                echo "ERROR: Could not able to execute $sql_categorias_dropdown. " . mysqli_error($conexion);
                            }
                          ?>
                        </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <h4>Item</h4>
                      <input type="text" id="edicion_item" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                        <h4>Condición</h4>
                        <select class="form-control dropdown_condicion_editar" id="edicion_condicion">
                          <option value="">Condición</option>
                          <?php
                            $sql_condicion_dropdown = "SELECT * FROM condicion_cotizacion ORDER BY nombre_concot ASC";
                            mysql_query("SET NAMES 'utf8'");
                            if($result_condicion_dropdown = mysqli_query($conexion, $sql_condicion_dropdown)){
                                if(mysqli_num_rows($result_condicion_dropdown) > 0){
                                    $i = 0;
                                    while($row_condicion_dropdown = mysqli_fetch_array($result_condicion_dropdown)){
                            ?>
                            <option value="<?php echo (utf8_encode($row_condicion_dropdown['id_concot']));?>"><?php echo (utf8_encode($row_condicion_dropdown['nombre_concot']));?></option>
                            <?php
                                    }
                                    mysqli_free_result($result_condicion_dropdown);
                                } else{
                                    echo "No hay datos para mostrar.";
                                }
                            } else{
                                echo "ERROR: Could not able to execute $sql_condicion_dropdown. " . mysqli_error($conexion);
                            }
                          ?>
                        </select>
                    </div>
                  </div>
                  
                  <div class="col-md-12">
                    <div class="form-group">
                      <h4>Detalle</h4>
                      <input type="text" id="edicion_detalle_cotizacion" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <h4>Proveedor</h4>
                      <select class="form-control" id="edicion_proveedor">
                            <option value="">Seleccionar</option>
                          <?php
                          // Attempt select query execution
                          $sql_proveedores = "SELECT * FROM proveedores ORDER BY descripcion";
                          mysql_query("SET NAMES 'utf8'");
                          if($result_proveedores = mysqli_query($conexion, $sql_proveedores)){
                              if(mysqli_num_rows($result_proveedores) > 0){
                                  $i = 0;
                                  while($row_proveedores = mysqli_fetch_array($result_proveedores)){
                                    
                                    ?>
                                      <option value="<?php echo ($row_proveedores['id_proveedor']);?>"><?php echo (utf8_encode($row_proveedores['descripcion']));?> | <?php echo (utf8_encode($row_proveedores['razon_social']));?> | <?php echo (utf8_encode($row_proveedores['contacto']));?></option>
                                    <?php
                                  }
                                  // Free result set
                                  mysqli_free_result($result_proveedores);
                              } else{
                                  echo "No hay datos para mostrar.";
                              }
                          } else{
                              echo "ERROR: Could not able to execute $sql_proveedores. " . mysqli_error($conexion);
                          }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                        <h4>Forma de Pago</h4>
                        <select class="form-control" id="edicion_forma_pago">
                            <option value="">Seleccionar</option>
                          <?php
                          // Attempt select query execution
                          $sql_pago = "SELECT * FROM forma_pago";
                          mysql_query("SET NAMES 'utf8'");
                          if($result_pago = mysqli_query($conexion, $sql_pago)){
                              if(mysqli_num_rows($result_pago) > 0){
                                  $i = 0;
                                  while($row_pago = mysqli_fetch_array($result_pago)){
                                    ?>
                                      <option value="<?php echo ($row_pago['id']);?>"><?php echo (utf8_encode($row_pago['tipo']));?></option>
                                    <?php 
                                  }
                                  // Free result set
                                  mysqli_free_result($result_pago);
                              } else{
                                  echo "No hay datos para mostrar.";
                              }
                          } else{
                              echo "ERROR: Could not able to execute $sql_pago. " . mysqli_error($conexion);
                          }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                        <h4>Tiempo de Pago</h4>
                        <select class="tiempo_pago_cambio form-control" id="edicion_dias" data-registro="<?php echo ($row_registros['id']);?>">
                          <option value="30">30 días</option>
                          <option value="60">60 días</option>
                          <option value="90" selected="selected">90 días</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <h4>Jornadas</h4>
                      <input type="number" id="edicion_jornadas" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default" oninput="calculate_edicion()">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <h4>Cantidad</h4>
                      <input type="number" id="edicion_cantidad" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default" oninput="calculate_edicion()">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <h4>Valor unitario</h4>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">$</div>
                        </div>
                        <input type="number" class="form-control form-control" id="edicion_importe_neto" oninput="calculate_edicion()">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <h4>Total</h4>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">$</div>
                        </div>
                        <input type="number" class="form-control form-control importe_total" id="edicion_importe_total" readonly value="0">
                        <div id="edicion_id_registro" hidden value="0"></div>
                        <div id="codigo_proyecto" hidden></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <button type="button" class="btn btn-success btn-block" id="boton_editar_cotizacion"><strong>GUARDAR</strong></button>
                  </div>
                  <div class="col-md-5">
                    <button type="button" class="btn btn-danger btn-block" data-dismiss="modal"><strong>CANCELAR</strong></button>
                  </div> 
                  <div class="col-md-1">
                    <button type="button" class="btn btn-primary btn-block" id="boton_eliminar_cotizacion_" data-dismiss="modal"><i class='icon wb-trash' aria-hidden='true'></i></button>
                  </div>  
                    </div>
                  </div>
                  </form>
                </div>
          </div>
        </div>
      </div>

    <!-- Modal Eliminar Categoría-->
    <div class="modal fade" id="modal_eliminar_categoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-footer">
            <h4>¿Borrar Categoría?</h4>
            <button type="button" class="btn btn-success" id="boton_eliminar_categoria" data-dismiss="modal">Aceptar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Aprobar Cotización -->
    <div class="modal fade" id="modal_aprobar_cotizacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-footer">
            <div>
              <h4>¿Aprobar Cotización?</h4>
            </div>
            <button type="button" class="btn btn-success" id="boton_aprobar_cotizacion" data-dismiss="modal">Aprobar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal_estado_mensaje" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle" style="margin-left: 15px;">Cambio de Estado: <span id="texto_cambio_estado"></span></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form name="formulario_mensaje">
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <h4>Motivo</h4>
                    <textarea row="8" id="motivo_cambio_estado" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"></textarea>
                  </div>
                </div>
              </div>
            </div>
          </form>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" id="boton_estado_mensaje">Enviar</button>
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
        <script src="design/global/vendor/bootstrap-table/bootstrap-table.min.js"></script>
        <script src="design/global/vendor/bootstrap-table/extensions/mobile/bootstrap-table-mobile.js"></script>
        <script src="design/global/js/Plugin/select2.js"></script>
    
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

    <script>
      (function(document, window, $){
        'use strict';
    
        var Site = window.Site;
        $(document).ready(function(){
          Site.run();
        });
      })(document, window, jQuery);
    </script>

    <script type="text/javascript">
      $(document).ready(function(){

        proyecto = document.getElementById('ingreso_id').innerHTML;

        $.ajax({  
            url:"ajax_mostrar_cotizaciones.php",  
            method:"POST",  
            data:'proyecto='+proyecto,
            success:function(data){
                $('#tabla_cotizaciones').html(data);
                MergeCommonRows($('#tabla_cotizaciones'));
                funciones_cotizaciones();
            }  
        });

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
          case "COTIZANDO":
            $("#tipo_estado").css("background-color", "#3e8ef7");
            $("#tipo_estado").css("color", "#FFFFFF");
            break;
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
          case "SOLICITAR ADICIONAL":
            $("#tipo_estado").css("background-color", "#ffc107");
            $("#tipo_estado").css("color", "#212529");
            break;
          case "ADICIONAL SOLICITADO":
            $("#tipo_estado").css("background-color", "#ffc107");
            $("#tipo_estado").css("color", "#212529");
            $("#solicitar_adicional").css("display", "none"); 
        }
      });

      function calcular_markup_total(){
        var sum = 0;
        $(".total_markup").each(function(){
          sum += +$(this).val();
        });
        $("#costo_total").val(sum);

      }

    </script>

    <script type="text/javascript">
      
      function MergeCommonRows(table, firstOnly) {
        var firstColumnBrakes = [];   
        for(var i=1; i<=3; i++){
            var previous = null, cellToExtend = null, rowspan = 1;
            table.find("td:nth-child(" + i + ")").each(function(index, el){   
                if (previous == $(el).text() && $(el).text() !== "" && $.inArray(index, firstColumnBrakes) === -1) {
                    $(el).addClass('hidden');
                    cellToExtend.attr("rowspan", (rowspan = rowspan+1));
                }else{
                    if(firstOnly == 'first only'){                
                        if(i === 1) firstColumnBrakes.push(index);
                    }else{
                        if($.inArray(index, firstColumnBrakes) === -1) firstColumnBrakes.push(index);
                    }
                    rowspan = 1;
                    previous = $(el).text();
                    cellToExtend = $(el);
                }
            });
        }  
      }

      function funciones_cotizaciones(){

        MergeCommonRows($('#tabla_cotizaciones'));

        $('#guardar_categoria').click(function(){
          var id_proyecto = document.getElementById('ingreso_id').innerHTML;
          var categoria = $("#ingreso_categoria").val();
          var detalle = $("#ingreso_detalle").val();
          $.ajax({  
            url:"agregar_categoria.php",  
            method:"POST",
            data: 'id_proyecto='+ id_proyecto+'&categoria='+ categoria+'&detalle='+ detalle,
                       success:function(data){  
              window.location.reload(true);
                       }  
                  });
        });

        $('.cambio_estado_aprobar').click(function(){
          var estado = $(this).attr('data-estado');
          console.log(estado);
          $('#modal_aprobar_cotizacion').modal('show');
        });

        $('#boton_aprobar_cotizacion').click(function(){
          var id = document.getElementById('ingreso_id').innerHTML;
          var estado = "APROBADO";
          $.ajax({  
            url:"cambiar_estado.php",
            method:"POST",  
            data:'id='+id+'&estado='+estado,
            success:function(data){
              var mensaje = "APROBADO";
              $.ajax({  
                url:"enviar_mensaje.php",
                method:"POST",  
                data:'id='+id+'&estado='+estado+'&mensaje='+mensaje,
                success:function(data){
                  $('#modal_estado_mensaje').modal('hide');
                  $.ajax({  
                    url:"aprobar_proyecto.php",  
                    method:"POST",
                    data: 'id='+ id,
                    success:function(data){  
                      window.location.reload(true);
                    }  
                  });
                }
              });
            }
          }); 
        });

        $('.cambio_estado_mensaje').click(function(){
          var estado = $(this).attr('data-estado');
          console.log(estado);
          document.getElementById('texto_cambio_estado').innerHTML = estado;
          $('#modal_estado_mensaje').modal('show');
        });

        $('#boton_estado_mensaje').click(function(){
          var estado = document.getElementById('texto_cambio_estado').innerHTML
          var id = document.getElementById('ingreso_id').innerHTML;
          var mensaje = document.getElementById('motivo_cambio_estado').value;
          $.ajax({  
            url:"enviar_mensaje.php",
            method:"POST",  
            data:'id='+id+'&estado='+estado+'&mensaje='+mensaje,
            success:function(data){
              $('#modal_estado_mensaje').modal('hide');
              window.location.reload();
            }
          }); 
        });

        $(function () {
            var $tblrows = $("#tabla_cotizaciones tbody tr");

            $tblrows.each(function (index) {
                var $tblrow = $(this);

                $tblrow.find('.ingreso_markup').on('change', function () {

                    //var tipo_markup_td = $tblrow.find('.tipo_markup option:selected').val();
                    var tipo_markup = $tblrow.find('.tipo_markup option:selected').val();

                    console.log(tipo_markup);

                    if (tipo_markup == "0"){
                      var importe_total_markup = $tblrow.find(".importe_total_markup").html();
                      var ingreso_markup = $tblrow.find(".ingreso_markup").val();
                      importe_total_markup = parseFloat(importe_total_markup);
                      ingreso_markup = parseFloat(ingreso_markup);
                      var subTotal_pesos = importe_total_markup + ingreso_markup;
                      $tblrow.find('.total_markup').val(subTotal_pesos);
                      calcular_markup_total();
                      var costo_total = document.getElementById('costo_total').value;
                      var registro = $tblrow.find('.total_markup').attr('data-registro');
                      var valor = $tblrow.find('.total_markup').val();
                      var id_proyecto = document.getElementById('ingreso_id').innerHTML;

                      $.ajax({  
                        url:"editar_markup.php",
                        method:"POST",  
                        data:'registro='+registro+'&ingreso_markup='+ingreso_markup+'&valor='+valor+'&tipo_markup='+tipo_markup+'&costo_total='+costo_total+'&id_proyecto='+id_proyecto,
                        success:function(data){
                        }
                      });

                    } else {
                      var importe_total_markup = $tblrow.find(".importe_total_markup").html();
                      var ingreso_markup = $tblrow.find(".ingreso_markup").val();
                      importe_total_markup = parseFloat(importe_total_markup);
                      ingreso_markup = parseFloat(ingreso_markup);
                      var subTotal_porcentaje = (((importe_total_markup * ingreso_markup)/100) + importe_total_markup);
                      $tblrow.find('.total_markup').val(subTotal_porcentaje);
                      calcular_markup_total();
                      var registro = $tblrow.find('.total_markup').attr('data-registro');
                      var valor = $tblrow.find('.total_markup').val();
                      var costo_total = document.getElementById('costo_total').value;
                      var id_proyecto = document.getElementById('ingreso_id').innerHTML;

                      $.ajax({  
                        url:"editar_markup.php",
                        method:"POST",  
                        data:'registro='+registro+'&ingreso_markup='+ingreso_markup+'&valor='+valor+'&tipo_markup='+tipo_markup+'&costo_total='+costo_total+'&id_proyecto='+id_proyecto,
                        success:function(data){
                        }
                      });
                    }
                });
            });
        });
      }
    </script>
  </body>
</html>