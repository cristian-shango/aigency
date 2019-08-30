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

        $(".dropdown_rubro").select2({
          tags: true
        });

        $(".dropdown_categoria").select2({
          tags: true
        });

        $(".dropdown_item").select2({
          tags: true
        });

        $(".dropdown_condicion").select2({
          tags: true
        });

        $("#ingreso_dias").select2({
          tags: true
        });

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

        document.getElementById("formulario_cotizacion").reset();
        document.getElementById("formulario_carga_cotizacion").reset();
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
      $('#boton_volver').click(function(){
        window.location.href = 'cotizaciones.php';
      });
      $('.modal_cargar_cotizacion').click(function(){
        var id_categoria = $(this).attr('data-id');
        var id_proyecto = $(this).attr('data-proyecto');
        console.log("Modal Cotizacion: ",id_categoria);
        $('#modal_cotizacion').modal('show');
        document.getElementById('codigo_categoria').innerHTML = id_categoria;
        document.getElementById('codigo_proyecto').innerHTML = id_proyecto;
        /*document.getElementById('codigo_categoria').value = id_categoria;*/
      });
      
      function calculate() {
        var myBox1 = document.getElementById('ingreso_cantidad').value; 
        var myBox2 = document.getElementById('ingreso_importe_neto').value;
        var myBox3 = document.getElementById('ingreso_jornadas').value;
        var result = document.getElementById('ingreso_importe_total');  
        var myResult = myBox1 * myBox2 * myBox3;
        result.value = myResult;
      };
      function calculate_edicion() {
        var myBox1 = document.getElementById('edicion_cantidad').value; 
        var myBox2 = document.getElementById('edicion_importe_neto').value;
        var myBox3 = document.getElementById('edicion_jornadas').value;
        var result = document.getElementById('edicion_importe_total');  
        var myResult = myBox1 * myBox2 * myBox3;
        result.value = myResult;
      };
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
      $('#boton_guardar_cotizacion').click(function(){
        var id_categoria = document.getElementById('codigo_categoria').innerHTML;
        var id_proyecto = document.getElementById('codigo_proyecto').innerHTML;
        var item = $("#ingreso_item").val();
        var condicion = $("#ingreso_condicion").val();
        var detalle = $("#ingreso_detalle_cotizacion").val();
        var cantidad = $("#ingreso_cantidad").val();
        var importe_neto = $("#ingreso_importe_neto").val();
        var importe_total = $("#ingreso_importe_total").val();
        var proveedor = $("#ingreso_proveedor").val();
        var forma_pago = $("#ingreso_forma_pago").val();
        var dias_pago = $("#ingreso_dias").val();
        if(dias_pago == 0){
          dias_pago = 90;
        }
        
        $.ajax({  
                     url:"agregar_cotizacion.php",  
                     method:"POST",
                     data: 'id_proyecto='+ id_proyecto+'&id_categoria='+ id_categoria+'&item='+ item+'&condicion='+ condicion+'&detalle='+ detalle+'&cantidad='+ cantidad+'&importe_neto='+ importe_neto+'&importe_total='+ importe_total+'&proveedor='+ proveedor+'&forma_pago='+ forma_pago+'&dias_pago='+ dias_pago,
                     success:function(data){  
                      $('#formulario_carga_cotizacion').trigger("reset");
            window.location.reload(true);
                     }  
                });
      });
      $('.eliminar_categoria').click(function(){
        $('#modal_eliminar_categoria').modal('show');
        var id = $(this).attr('data-id');
        
        $('#boton_eliminar_categoria').click(function(){
          console.log(id);
          $.ajax({  
                    url:"eliminar_categoria.php",  
                    method:"POST",  
                    data:'id='+id/*+'&saldo_sumar='+saldo_sumar+'&consumido='+consumido+'&id_proyecto='+id_proyecto*/,
                    success:function(data){
                      $('#modal_eliminar_categoria').modal('hide');
              window.location.reload(true);
                    }  
               }); 
        });
      });

      $('#solicitar_adicional').click(function(){
        $("#lista_cotizaciones").html('');
        $("#monto_adicional").html('');
        $("#motivo_adicional").html('');
        $('#modal_solicitar_adicional').modal('show');
        var proyecto = $(this).attr('data-proyecto');
        $.ajax({  
                  url:"cargar_registros_adicional.php",
                  method:"POST",  
                  data:'proyecto='+proyecto,
                  success:function(data){
                    $("#lista_cotizaciones").append(data);
                    //$('#modal_mensaje').modal('hide');
            //window.location.reload(true);
                  }
             });
      });
      $('#boton_solicitar_adicional').click(function(){
        var id_proyecto = document.getElementById('ingreso_id').innerHTML;
        var monto_adicional = document.getElementById('monto_adicional').value;
        var motivo_adicional = document.getElementById('motivo_adicional').value;
        var cotizacion = document.getElementById('dropdown_registros').value;
        console.log("Click: ",cotizacion);
        $.ajax({  
                  url:"solicitar_adicional.php",  
                  method:"POST",  
                  data:'cotizacion='+cotizacion+'&id_proyecto='+id_proyecto+'&monto_adicional='+monto_adicional+'&motivo_adicional='+motivo_adicional,
                  success:function(data){
                    $('#modal_solicitar_adicional').modal('hide');
            window.location.reload(true);
                  }  
             });
      });
      $('.cambio_estado_mensaje').click(function(){
        var estado = $(this).attr('data-estado');
        document.getElementById('texto_cambio_estado').innerHTML = estado;
        $('#modal_mensaje').modal('show');
      });
      $('#boton_mensaje').click(function(){
        var estado = document.getElementById('texto_cambio_estado').innerHTML
        var id = document.getElementById('ingreso_id').innerHTML;
        var mensaje = document.getElementById('motivo_cambio_estado').value;
        $.ajax({  
                  url:"enviar_mensaje_registro.php",
                  method:"POST",  
                  data:'id='+id+'&estado='+estado+'&mensaje='+mensaje,
                  success:function(data){
                    $('#modal_mensaje').modal('hide');
            window.location.reload(true);
                  }
             }); 
      });


      $('.editar_cotizacion').click(function(){
          var id_registro = $(this).attr('data-id');
          console.log("Click id: ",id_registro);
          $.ajax({
          url:"cargar_registro.php",  
          method:"POST",  
          data:{id_registro:id_registro},  
          dataType:"json",  
          success:function(data){
            $("#edicion_rubro").val(data.rubro_cotizacion);
            $("#edicion_categoria").val(data.categoria_cotizacion);
            $("#edicion_item").val(data.item);
            $("#edicion_condicion").val(data.condicion_registro);
            $("#edicion_detalle_cotizacion").val(data.detalle_registro);
            $("#edicion_cantidad").val(data.cantidad);
            $("#edicion_importe_neto").val(data.importe_neto);
            $("#edicion_importe_total").val(data.importe_total);
            $("#edicion_proveedor").val(data.id_proveedor);
            $("#edicion_forma_pago").val(data.forma_pago);
            $("#edicion_dias").val(data.tiempo_pago);
            $('#modal_editar_registro').modal('show');
          }  
        });

          $('#boton_editar_cotizacion').click(function(){
          var item = $("#edicion_item").val();
          var condicion = $("#edicion_condicion").val();
          var detalle = $("#edicion_detalle_cotizacion").val();
          var cantidad = $("#edicion_cantidad").val();
          var importe_neto = $("#edicion_importe_neto").val();
          var importe_total = $("#edicion_importe_total").val();
          var proveedor = $("#edicion_proveedor").val();
          var forma_pago = $("#edicion_forma_pago").val();
          var dias_pago = $("#edicion_dias").val();
          $.ajax({  
                       url:"editar_registro.php",  
                       method:"POST",
                       data: 'id_registro='+ id_registro+'&item='+ item+'&condicion='+ condicion+'&detalle='+ detalle+'&cantidad='+ cantidad+'&importe_neto='+ importe_neto+'&importe_total='+ importe_total+'&proveedor='+ proveedor+'&forma_pago='+ forma_pago+'&dias_pago='+ dias_pago,
                       success:function(data){  
              $('#modal_editar_registro').modal('hide');
              window.location.reload(true);
                       }  
                  });
        });
      });
      /*var totalDeuda = 0;
      var id_registro = 0;
      var registro = 0;
      $(".valor_promedio").each(function(){
        id_categoria = $(".eliminar_categoria").attr("data-id");
        id_registro = id_registro + 1;
        registro = $(this).attr('data-registro');
        totalDeuda+=parseInt($(this).attr('data-valor')) || 0;
        console.log("ID Registro: ",registro);
        console.log("Deuda: ",totalDeuda);
        console.log("Cantidad de cotizaciones: ",id_registro);
      });*/
      
      $(".checkbox").click(function(){
        var marca = 0;
        console.log("Click en Checkbox para actualizar iconos");
        registro = $(this).attr('data-registro');
        if ($(this).is(":checked")){
          marca = 1;
        }
        $(".eliminar_cotizacion").each(function(){
          check_eliminar = $(this).attr('data-id');
          if(check_eliminar == registro) {
            console.log("Eliminar: ",check_eliminar);
            console.log("Registro: ",registro);
            console.log("Marca: ",marca);
            if (marca == 1){
              $(this).fadeOut();
            } else {
              $(this).fadeIn();
            }
          }
        });
        $(".editar_cotizacion").each(function(){
          check_eliminar = $(this).attr('data-id');
          if(check_eliminar == registro) {
            console.log("Eliminar: ",check_eliminar);
            console.log("Registro: ",registro);
            console.log("Marca: ",marca);
            if (marca == 1){
              $(this).fadeOut();
            } else {
              $(this).fadeIn();
            }
          }
        });
      });
      $(".tiempo_pago_cambio").change(function(){
        var registro = $(this).attr('data-registro');
        var tiempo = $(this).val();
        $.ajax({  
                  url:"tiempo_pago_cambio.php",
                  method:"POST",  
                  data:'registro='+registro+'&tiempo='+tiempo,
                  success:function(data){
                    var id_proyecto = document.getElementById('ingreso_id').innerHTML;
                    $.ajax({  
                         url:'procesar_pagos.php',  
                         type: 'POST',
                         dataType: 'json',
                         data: 'id_proyecto='+id_proyecto,
                         success:function(data){
                          $('#pago30').val(data.valor30dias);
                          $('#pago60').val(data.valor60dias);
                          $('#pago90').val(data.valor90dias);
                         }  
                    });
                  }
             });
      });
      $(".eliminar_cotizacion").each(function(){
        $(this).css("display", "none");
        if($(this).attr('data-check') == 0) {
          console.log("Muestro");
          $(this).css("display", "inline-block");
        } else{
          console.log("Oculto");
        }
      });
      $(".editar_cotizacion").each(function(){
        $(this).css("display", "none");
        if($(this).attr('data-check') == 0) {
          console.log("Muestro");
          $(this).css("display", "inline-block");
        } else{
          console.log("Oculto");
        }
      });
    
      $(".checkbox").click(function(){
        sum = 0;
        sum_total = 0;
        total = 0;
        registro = 0;
        chk = 0;
        tiempo = 0;
        tiempo_pago = 0;
        sum_pago = 0;
        sum_total_pago = 0;
        total_pago = 0;
        
        if ($(this).is(":checked")) {
          chk = 1;
          registro = $(this).attr('data-registro');
          proyecto = document.getElementById('ingreso_id').innerHTML;
          $(this).closest("tr").toggleClass("selected", this.checked);
          
        } else {
          chk = 0;
          registro = $(this).attr('data-registro');
          proyecto = document.getElementById('ingreso_id').innerHTML;
          $(this).closest("tr").removeClass("selected", this.checked);
          console.log(registro);
        }
        
        $.each($('input[type="checkbox"]:checked'), function() {
          sum = parseFloat($(this).val());
          sum_total = sum_total + sum;
          total = sum_total.toFixed(2);
          document.getElementById('consumido_total').value = total;
        });
        saldo = document.getElementById('costo_presupuesto_total').value;
        saldo = parseFloat(saldo);
        saldo_total = saldo - total;
        saldo_total = saldo_total.toFixed(2);
        document.getElementById('saldo_total').value = saldo_total;
        var id_proyecto = document.getElementById('ingreso_id').innerHTML;
        var costo_presupuesto_total = document.getElementById('costo_presupuesto_total').value;
        costo_presupuesto_total = parseFloat(costo_presupuesto_total);
        if(costo_presupuesto_total == saldo_total){
          console.log("Pongo consumido en 0");
          document.getElementById('consumido_total').value = "0.00";
          document.getElementById('adicionales_total').value = "0.00";
          document.getElementById('pago30').value = "0.00";
          document.getElementById('pago60').value = "0.00";
          document.getElementById('pago90').value = "0.00";
        }
        $.ajax({  
                  url:"actualizar_valores.php",  
                  method:"POST",  
                  data:'id_proyecto='+id_proyecto+'&total='+total+'&saldo_total='+saldo_total+'&registro='+registro+'&chk='+chk,
                  success:function(data){
                    console.log("Proyecto actualizado");
                    var id_proyecto = document.getElementById('ingreso_id').innerHTML;
                    $.ajax({  
                         url:'procesar_pagos.php',  
                         type: 'POST',
                         dataType: 'json',
                         data: 'id_proyecto='+id_proyecto+'&registro='+registro+'&chk='+chk,
                         success:function(data){
                          $('#pago30').val(data.valor30dias);
                          $('#pago60').val(data.valor60dias);
                          $('#pago90').val(data.valor90dias);
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
                              console.log("Adicional + Consumido: ",adicional_total);
                              console.log("Adicional: ",suma_adicionales);
                              console.log("Consumido :",consumido);
                              document.getElementById('adicionales_total').value = suma_adicionales;
                          }  
                      });
                         }  
                    });
                  }  
              });
      });
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

        var proyecto = document.getElementById('ingreso_id').innerHTML;

        $(".dropdown_rubro").select2({
          tags: true
        });

        $(".dropdown_categoria").select2({
          tags: true
        });

        $(".dropdown_condicion").select2({
          tags: true
        });

        $("#ingreso_dias").select2({
          tags: true
        });

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
                    window.location.reload();
                }
              });
            }
          }); 
        });

        $('#boton_guardar_cotizacion').click(function(){
          console.log("Guardar cotizacion");
          var proyecto = document.getElementById('ingreso_id').innerHTML;
          var rubro = $("#ingreso_rubro").val();
          var categoria = $("#ingreso_categoria").val();
          var item = $("#ingreso_item").val();
          var condicion = $("#ingreso_condicion").val();
          var detalle = $("#ingreso_detalle_cotizacion").val();
          var jornada = $("#ingreso_jornadas").val();
          var cantidad = $("#ingreso_cantidad").val();
          var importe_neto = $("#ingreso_importe_neto").val();
          var importe_total = $("#ingreso_importe_total").val();
          /*var proveedor = $("#ingreso_proveedor").val();
          var forma_pago = $("#ingreso_forma_pago").val();*/
          var dias_pago = $("#ingreso_dias").val();
          $.ajax({  
            url:"agregar_cotizacion.php",  
            method:"POST",
            data: 'proyecto='+ proyecto+'&rubro='+ rubro+'&categoria='+ categoria+'&item='+ item+'&condicion='+ condicion+'&detalle='+ detalle+'&jornada='+ jornada+'&cantidad='+ cantidad+'&importe_neto='+ importe_neto+'&importe_total='+ importe_total+'&dias_pago='+ dias_pago,
            success:function(data){  
              //window.location.reload(true);
              $.ajax({  
                url:"ajax_mostrar_cotizaciones.php",  
                method:"POST",  
                data:'proyecto='+proyecto,
                success:function(data){
                  $('#tabla_cotizaciones').html(data);
                  funciones_cotizaciones();
                }  
              });
            }  
          });
        });

        $('.eliminar_categoria').click(function(){
          $('#modal_eliminar_categoria').modal('show');
          var id = $(this).attr('data-id');  
          $('#boton_eliminar_categoria').click(function(){
            console.log(id);
            $.ajax({  
              url:"eliminar_categoria.php",  
              method:"POST",  
              data:'id='+id/*+'&saldo_sumar='+saldo_sumar+'&consumido='+consumido+'&id_proyecto='+id_proyecto*/,
              success:function(data){
                $('#modal_eliminar_categoria').modal('hide');
                window.location.reload(true);
              }  
            }); 
          });
        });

        $('#boton_eliminar_cotizacion_').click(function(){
          var id = $("#edicion_id_registro").val();
          console.log(id);
          $.ajax({  
            url:"eliminar_cotizacion_nocheck.php",  
            method:"POST",  
            data:'id='+id,
            success:function(data){
              $('#modal_eliminar_cotizacion').modal('hide');
              $.ajax({  
                url:"ajax_mostrar_cotizaciones.php",  
                method:"POST",  
                data:'proyecto='+proyecto,
                success:function(data){
                  $('#tabla_cotizaciones').html(data);
                  funciones_cotizaciones();
                }  
              });
            }  
          }); 
        });
        

        $('.editar_cotizacion').click(function(){
          var id_registro = $(this).attr('data-id');
          console.log("Click id: ",id_registro);
          $.ajax({
            url:"cargar_registro.php",  
            method:"POST",  
            data:{id_registro:id_registro},  
            dataType:"json",  
            success:function(data){
              $("#edicion_rubro").val(data.rubro_cotizacion);
              $("#edicion_categoria").val(data.categoria_cotizacion);
              $("#edicion_item").val(data.item);
              $("#edicion_condicion").val(data.condicion_registro);
              $("#edicion_detalle_cotizacion").val(data.detalle_registro);
              $("#edicion_jornadas").val(data.jornadas_registro);
              $("#edicion_cantidad").val(data.cantidad);
              $("#edicion_importe_neto").val(data.importe_neto);
              $("#edicion_importe_total").val(data.importe_total);
              $("#edicion_proveedor").val(data.id_proveedor);
              $("#edicion_forma_pago").val(data.forma_pago);
              $("#edicion_dias").val(data.tiempo_pago);
              $("#edicion_id_registro").val(id_registro);
              $('#modal_editar_registro').modal('show');
            }  
          });
        });

        $('#boton_editar_cotizacion').click(function(){
          var proyecto = document.getElementById('ingreso_id').innerHTML;
          var rubro = $("#edicion_rubro").val();
          var categoria = $("#edicion_categoria").val();
          var item = $("#edicion_item").val();
          var condicion = $("#edicion_condicion").val();
          var detalle = $("#edicion_detalle_cotizacion").val();
          var cantidad = $("#edicion_cantidad").val();
          var jornadas = $("#edicion_jornadas").val();
          var importe_neto = $("#edicion_importe_neto").val();
          var importe_total = $("#edicion_importe_total").val();
          var proveedor = $("#edicion_proveedor").val();
          var forma_pago = $("#edicion_forma_pago").val();
          var dias_pago = $("#edicion_dias").val();
          var id_registro = $("#edicion_id_registro").val();
          $.ajax({  
           url:"editar_registro.php",  
           method:"POST",
           data: 'id_registro='+ id_registro+'&rubro='+ rubro+'&categoria='+ categoria+'&item='+ item+'&condicion='+ condicion+'&detalle='+ detalle+'&jornadas='+ jornadas+'&cantidad='+ cantidad+'&importe_neto='+ importe_neto+'&importe_total='+ importe_total+'&proveedor='+ proveedor+'&forma_pago='+ forma_pago+'&dias_pago='+ dias_pago,
           success:function(data){  
            $('#modal_editar_registro').modal('hide');
            $.ajax({  
                url:"ajax_mostrar_cotizaciones.php",  
                method:"POST",  
                data:'proyecto='+proyecto,
                success:function(data){
                  $('#tabla_cotizaciones').html(data);
                  funciones_cotizaciones();
                }  
              });
            }  
          });
        });

        $(".checkbox").click(function(){
          var marca = 0;
          console.log("Click en Checkbox para actualizar iconos");
          registro = $(this).attr('data-registro');
          if ($(this).is(":checked")){
            marca = 1;
          }
          $(".eliminar_cotizacion").each(function(){
            check_eliminar = $(this).attr('data-id');
              if(check_eliminar == registro) {
                console.log("Eliminar: ",check_eliminar);
                console.log("Registro: ",registro);
                console.log("Marca: ",marca);
                if (marca == 1){
                  $(this).fadeOut();
                } else {
                  $(this).fadeIn();
                }
              }
          });
          $(".editar_cotizacion").each(function(){
            check_eliminar = $(this).attr('data-id');
            if(check_eliminar == registro) {
              console.log("Eliminar: ",check_eliminar);
              console.log("Registro: ",registro);
              console.log("Marca: ",marca);
              if (marca == 1){
                $(this).fadeOut();
              } else {
                $(this).fadeIn();
              }
            }
          });
        });

        $(".tiempo_pago_cambio").change(function(){
          var registro = $(this).attr('data-registro');
          var tiempo = $(this).val();
          $.ajax({  
            url:"tiempo_pago_cambio.php",
            method:"POST",  
            data:'registro='+registro+'&tiempo='+tiempo,
            success:function(data){
              var id_proyecto = document.getElementById('ingreso_id').innerHTML;
              $.ajax({  
                url:'procesar_pagos.php',  
                type: 'POST',
                dataType: 'json',
                data: 'id_proyecto='+id_proyecto,
                success:function(data){
                  $('#pago30').val(data.valor30dias);
                  $('#pago60').val(data.valor60dias);
                  $('#pago90').val(data.valor90dias);
                }  
              });
            }
          });
        });

        $(".eliminar_cotizacion").each(function(){
          $(this).css("display", "none");
          if($(this).attr('data-check') == 0) {
            console.log("Muestro");
            $(this).css("display", "inline-block");
          } else{
            console.log("Oculto");
          }
        });

        $(".editar_cotizacion").each(function(){
          $(this).css("display", "none");
          if($(this).attr('data-check') == 0) {
            console.log("Muestro");
            $(this).css("display", "inline-block");
          } else{
            console.log("Oculto");
          }
        });

        $(".checkbox").click(function(){
          sum = 0;
          sum_total = 0;
          total = 0;
          registro = 0;
          chk = 0;
          tiempo = 0;
          tiempo_pago = 0;
          sum_pago = 0;
          sum_total_pago = 0;
          total_pago = 0;
          
          if ($(this).is(":checked")) {
            chk = 1;
            registro = $(this).attr('data-registro');
            proyecto = document.getElementById('ingreso_id').innerHTML;
            $(this).closest("tr").toggleClass("selected", this.checked);
            
          } else {
            chk = 0;
            registro = $(this).attr('data-registro');
            proyecto = document.getElementById('ingreso_id').innerHTML;
            $(this).closest("tr").removeClass("selected", this.checked);
            console.log(registro);
          }
          
          $.each($('input[type="checkbox"]:checked'), function() {
            sum = parseFloat($(this).val());
            sum_total = sum_total + sum;
            total = sum_total.toFixed(2);
            document.getElementById('consumido_total').value = total;
          });
          
          saldo = document.getElementById('costo_presupuesto_total').value;
          saldo = parseFloat(saldo);
          saldo_total = saldo - total;
          saldo_total = saldo_total.toFixed(2);
          
          document.getElementById('saldo_total').value = saldo_total;
          
          var id_proyecto = document.getElementById('ingreso_id').innerHTML;
          var costo_presupuesto_total = document.getElementById('costo_presupuesto_total').value;
          costo_presupuesto_total = parseFloat(costo_presupuesto_total);
          
          if(costo_presupuesto_total == saldo_total){
            console.log("Pongo consumido en 0");
            document.getElementById('consumido_total').value = "0.00";
            document.getElementById('adicionales_total').value = "0.00";
            document.getElementById('pago30').value = "0.00";
            document.getElementById('pago60').value = "0.00";
            document.getElementById('pago90').value = "0.00";
          }
          $.ajax({  
            url:"actualizar_valores.php",  
            method:"POST",  
            data:'id_proyecto='+id_proyecto+'&total='+total+'&saldo_total='+saldo_total+'&registro='+registro+'&chk='+chk,
            success:function(data){
              console.log("Proyecto actualizado");
              var id_proyecto = document.getElementById('ingreso_id').innerHTML;
              $.ajax({  
                url:'procesar_pagos.php',  
                type: 'POST',
                dataType: 'json',
                data: 'id_proyecto='+id_proyecto+'&registro='+registro+'&chk='+chk,
                success:function(data){
                  $('#pago30').val(data.valor30dias);
                  $('#pago60').val(data.valor60dias);
                  $('#pago90').val(data.valor90dias);
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
                      console.log("Adicional + Consumido: ",adicional_total);
                      console.log("Adicional: ",suma_adicionales);
                      console.log("Consumido :",consumido);
                      document.getElementById('adicionales_total').value = suma_adicionales;
                    }  
                  });
                }  
              });
            }  
          });
        });

        $('.seleccion_item').click(function(){
          var rubro = $(this).attr('data-rubro');
          var categoria = $(this).attr('data-categoria');
          var item = $(this).attr('data-item');  

          console.log("Rubro: ",rubro);
          console.log("Categoria: ",categoria);
          console.log("Item: ",item);

          $('#ingreso_rubro').val(rubro).trigger('change');
          $('#ingreso_categoria').val(categoria).trigger('change');
          $('#ingreso_item').val(item);

          $('html, body').animate({
            scrollTop: $("#tr_mostrar").offset().top
          }, 1000);

        });
    }
    </script>
  </body>
</html>