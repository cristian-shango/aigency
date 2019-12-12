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
    
    <title>AiGency | Cotización confirmada</title>
    
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
    <script src="js/numeros/numeros.js"></script>
    <script src="js/pagos/utiles_tabla.js"></script>

    <style>
      #drop, .cargando {
        border:2px dashed #bbb;
        -moz-border-radius:5px;
        -webkit-border-radius:5px;
        border-radius:5px;
        padding: 25px;
        text-align:center;
        font:20pt bold;
        font-family: inherit;
        color:#bbb
        margin: 10px;
      }
      #drop {
        padding-bottom: 10px;
      }
      #drop p {
        font-size: 12pt;
        margin: 0;
        line-height: 2em;
        vertical-align: bottom;
      }
      #xlf {
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
      }
      #xlf ~ label {
        margin: 20px 0;
      }
      .pagos_completo, .pagos_parcial, .pagos_vacio {
          color: white;
      }
      .pagos_completo {
          background-color: #28d17c;
          border-color: #28d17c;
      }
      .pagos_parcial {
          background-color: orange;
          border-color: orange;
      }
      .pagos_vacio {
          background-color: #e4eaec;
          border-color: #e4eaec;
          color: black;
      }
      .tr_subtotal_categoria {
          color: #FF0000;
          /*background-color: #DDD;*/
          font-size: 1.1em;
          /*line-height: 90%;*/
      }
      .tr_subtotal_rubro {
          color: #FFF;
          background-color: #AAA;
          font-style: bolder;
          font-size: 1.3em;
          line-height: 95%;
      }
      .tr_subtotal_rubro>td, .tr_subtotal_categoria>td {
          border: 0 !important;
      }
    </style>
    
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
            
            $sql = "SELECT * FROM proyectos p INNER JOIN clientes c ON p.cliente = c.id_cliente INNER JOIN subtipo_cotizacion sc ON p.subtipo_cotizacion = sc.id_subtipo LEFT JOIN estados e ON p.estado = e.id_estados WHERE id = '".$_GET['id']."'";  
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
                  <div class="col-md-12"><h5>Estado: <span id="tipo_estado" style="font-weight: lighter;"><?php echo ($row['nombre_estado']);?></span></h5></div>
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
                  <!-- <div class="col-md-12">
                    <div class="form-group">
                      <h5>Adicionales</h5>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">$</div>
                        </div>
                        <input type="text" class="form-control" id="adicionales_total" readonly value="0.00">
                      </div>
                    </div>
                  </div> -->
                  <div class="col-md-12">
                    <div class="form-group">
                      <h5>Precio Objetivo</h5>
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
            <button class="btn btn-block btn btn-success clickable cambio_estado_aprobar" data-estado="5" style="cursor: pointer;">APROBAR</button>
            <button class="btn btn-block btn btn-danger clickable cambio_estado_mensaje" data-estado="6" style="cursor: pointer;">RECHAZAR</button>
            <button class="btn btn-block btn btn-info clickable cambio_estado_mensaje" data-estado="7" style="cursor: pointer;">AJUSTAR</button>
            <button class="btn btn-block btn btn-warning clickable cambio_estado_mensaje" data-estado="8" style="cursor: pointer;">STAND BY</button>
            <button class="btn btn-block btn btn-dark clickable cambio_estado_mensaje" data-estado="9" style="cursor: pointer;">CANCELAR</button> 
            <button class="btn btn-block btn btn-default clickable buscar_cambios" style="cursor: pointer;">BUSCAR CAMBIOS EN LA COTIZACIÓN</button>
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
                      <ul class="nav nav-tabs nav-tabs-line tabs-line-top" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <a class="nav-link" id="home-tab" data-toggle="tab" href="#tab_cotizacion_produccion" role="tab" aria-controls="editar"
                            aria-selected="true">COTIZACIÓN PRODUCCIÓN</a>
                        </li>
                        <li class="nav-item" role="presentation">
                          <?php
                          $id = $_GET['id'];
                          $sql_cantidad_cambios = "SELECT COUNT(*) AS cantidad_cambios FROM registros WHERE estado_registro <> 1 AND id_proyecto = '$id'";

                          $resultado_cantidad_cambios = mysqli_query($conexion, $sql_cantidad_cambios);
                          $datos_cantidad_cambios = mysqli_fetch_assoc($resultado_cantidad_cambios);

                          ?>
                          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#tab_cotizacion_confirmada" role="tab" aria-controls="editar"
                            aria-selected="true">COTIZACIÓN CONFIRMADA <span class="badge badge-pill badge-danger cantidad_cambios"><?php echo ($datos_cantidad_cambios['cantidad_cambios']);?></span></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#tab_cotizacion_cliente" role="tab" aria-controls="proveedor"
                            aria-selected="false">COTIZACIÓN A ENVIAR AL CLIENTE</a>
                        </li>
                      </ul>
                      <div class="tab-content" id="TabContent">
                        <div class="tab-pane fade" id="tab_cotizacion_produccion" role="tabpanel" aria-labelledby="proveedor-tab">
                          <table class="table border-tabla" id="tabla_cotizaciones"></table>
                        </div>
                        <div class="tab-pane fade show active" id="tab_cotizacion_confirmada" role="tabpanel" aria-labelledby="editar-tab">
                          <table class="table border-tabla" id="tabla_confirmada"></table>
                          
                          <table class="table border-tabla" id="mostrar_cambios"></table>
                        </div>
                        <div class="tab-pane fade" id="tab_cotizacion_cliente" role="tabpanel" aria-labelledby="proveedor-tab">
                          <table class="table border-tabla" id="tabla_cliente_markup"></table>
                        </div>
                      </div>
                      <!-- NUEVA TABLA -->
                      <!-- <table class="table" id="table_adicionales"></table> -->
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
      <div class="modal-dialog modal-center" role="document">
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
            <button type="button" class="btn btn-success" id="boton_mensaje">ENVIAR</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Aprobar Cotización -->
    <div class="modal fade" id="modal_aprobar_cotizacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-center" role="document">
        <div class="modal-content">
          <div class="modal-body">            
              <h4>¿Aprobar Cotización?</h4>
              <label for="fecha_inicio">Fecha Inicio:</label>
              <input type="date" name="fecha_inicio" id="fecha_inicio">
              <label for="fecha_culminacion">Fecha Culminacion:</label>
              <input type="date" name="fecha_culminacion" id="fecha_culminacion">
              
              <!--<h5>(ESTAR SEGURO SEGURO EH)</h5>-->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" id="boton_aprobar_cotizacion" data-dismiss="modal">APROBAR</button>
              <button type="button" class="btn btn-danger" id="boton_ignorar_cotizacion" data-dismiss="modal">CANCELAR</button>            
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Cambios Registros -->
    <div class="modal fade" id="modal_cambios_registros" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-center" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <h4>La cotización cambió.<br>¿Desea actualizarla?</h4>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" id="boton_actualizar_items_modificados">ACTUALIZAR</button>
            <button type="button" class="btn btn-danger" id="boton_ignorar_items_modificados" data-dismiss="modal">IGNORAR</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Sin Cambios Registros -->
    <div class="modal fade" id="modal_sin_cambios_registros" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-center" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <h4>No hay items modificados.</h4>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Empty Markup -->
    <div class="modal fade" id="modal_empty_markup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-center" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <h4 id="cambio_texto">Hay items que no tiene markup hecho.<br>Por favor completar todos.</h4>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal_estado_mensaje" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-center" role="document">
        <div class="modal-content">
          <form name="formulario_mensaje">
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <h4>Cambio de Estado: <span id="texto_cambio_estado"></span></h4>
                    <h4>Motivo</h4>
                    <textarea row="8" id="motivo_cambio_estado" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"></textarea>
                  </div>
                </div>
              </div>
            </div>
          </form>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" id="boton_estado_mensaje">ENVIAR</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
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
        let id = <?php echo $_GET['id']; ?>;
        $.ajax({  
            url:"ajax/mostrar_cotizaciones_confirmadas.php",
            method:"POST",  
            data:'proyecto='+proyecto,
            success:function(data_1){
              $('#tabla_confirmada').html(data_1);
              $.ajax({  
                  url:"ajax/mostrar_cotizaciones_cliente_markup.php",
                  method:"POST",  
                  data:'proyecto='+proyecto,
                  success:function(data_2){
                    $('#tabla_cliente_markup').html(data_2);
                    $(".numerable").each(function(){abandonar(this);});
                    $.ajax({
                      url:"ajax/mostrar_cotizaciones_actuales.php",
                      method:"POST",
                      data:'proyecto='+proyecto,
                      success:function(data_3){
                        $('#tabla_cotizaciones').html(data_3);
                        //if ($(data).find("tr").length>2) $('#cargaExcel').hide();
                        MergeCommonRows($('#tabla_cotizaciones'));
                        $.ajax({  
                          url:"ajax/comprobar_cambios_registros.php",  
                          method:"POST",
                          data: 'id='+id,
                          success:function(data_4){
                            $('#mostrar_cambios').html(data_4);
                            funciones_cotizaciones();
                            $('#tabla_cotizaciones .numerable').each(function(ix, tag){ abandonar(tag); });
                            $('#mostrar_cambios .numerable').each(function(ix, tag){ abandonar(tag); });
                            $('#tabla_confirmada .numerable').each(function(ix, tag){ abandonar(tag); });
                            $('#tabla_cliente_markup .numerable').each(function(ix, tag){ abandonar(tag); });
                              
                              //$('#modal_cambios_registros').modal('show');
                            }
                        }); 
                      }
                    });  
                  }  
              });
            }
          });

        /*proyecto = document.getElementById('ingreso_id').innerHTML;
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
        });*/

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

        MergeCommonRows($('#tabla_cliente_markup'));
        MergeCommonRows($('#tabla_confirmada'));

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
          let id=<?php echo $_GET['id']; ?>;
          console.log(id);
          marca = 0;
          $('.ingreso_markup').each(function() {
              if(!$(this).val()){
                $('#modal_empty_markup').modal('show');  
                marca = 1;
                return false;
              } else {
                marca = 0;
              }
          });
          if (marca == 0){
            $.ajax({  
              url:"ajax/comprobar_cambios_registros.php",  
              method:"POST",
              data: 'id='+id,
              success:function(response){
                console.log(response);
                if (response == 'NO'){
                  $('#modal_aprobar_cotizacion').modal('show');
                } else {
                  $('#modal_cambios_registros').modal('show');
                }
              }  
            });
          }
        }); 

        $('#boton_actualizar_items_modificados').click(function(){
          let id=<?php echo $_GET['id']; ?>;
          $.ajax({  
            url:"ajax/actualizar_cambios_registros.php",
            method:"POST",
            data: 'id='+ id,
            success:function(data){  
              $('#modal_cambios_registros').modal('hide');
              $.ajax({  
                url:"ajax/mostrar_cotizaciones_cliente_markup.php",
                method:"POST",  
                data:'proyecto='+proyecto,
                success:function(data){
                  $('#tabla_cliente_markup').html(data);
                  MergeCommonRows($('#tabla_cliente_markup'));
                  funciones_cotizaciones();
                }  
              });
            }
          });
        });

        $('#boton_ignorar_items_modificados').click(function(){
          let id=<?php echo $_GET['id']; ?>;
          $.ajax({  
            url:"ajax/ignorar_cambios_registros.php",
            method:"POST",
            data: 'id='+ id,
            success:function(data){  
              $('#modal_cambios_registros').modal('hide');
            }
          });
        });

        $('.buscar_cambios').click(function(){
          let id=<?php echo $_GET['id']; ?>;
          $.ajax({  
            url:"ajax/comprobar_cambios_registros.php",  
            method:"POST",
            data: 'id='+id,
            success:function(response){
              console.log(response);
              if (response == 'NO'){
                $('#modal_sin_cambios_registros').modal('show');
              } else {
                $('#modal_cambios_registros').modal('show');
              }
            }  
          }); 
        });

          

        $('#boton_aprobar_cotizacion').click(function(){
          let id=<?php echo $_GET['id']; ?>;
          let fecha_inicio=$('#fecha_inicio').val();
          let fecha_culminacion= $('#fecha_culminacion').val();
          
          var estado = "5";
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
                    data: 'id='+ id +'&fecha_inicio='+fecha_inicio +'&fecha_culminacion='+fecha_culminacion,
                    success:function(data){
                      console.log(fecha_inicio); 
                      console.log(fecha_culminacion);  
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
            var $tblrows = $("#tabla_cliente_markup tbody tr");

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