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

    <title>AiGency | Carga de Cotizaciones</title>

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
        <link rel="stylesheet" href="design/global/vendor/bootstrap-datepicker/bootstrap-datepicker.css">
        <link rel="stylesheet" href="design/global/vendor/bootstrap-table/bootstrap-table.css">
        <link rel="stylesheet" href="design/global/vendor/select2/select2.css">
        <link rel="stylesheet" href="design/assets/examples/css/forms/advanced.css">
        <link rel="stylesheet" href="design/global/vendor/blueimp-file-upload/jquery.fileupload.css">
        <link rel="stylesheet" href="design/global/vendor/dropify/dropify.css">


    <!-- Fonts -->
    <link rel="stylesheet" href="design/global/fonts/web-icons/web-icons.min.css">
    <link rel="stylesheet" href="design/global/fonts/brand-icons/brand-icons.min.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="design/global/vendor/select2/select2.full.min.js"></script>
    <script src="design/assets/examples/js/forms/advanced.js"></script>
    <script src="https://momentjs.com/downloads/moment.js" type="text/javascript"></script>

    <!--[if lt IE 9]>
    <script src="design/global/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->

    <!--[if lt IE 10]>
    <script src="design/global/vendor/media-match/media.match.min.js"></script>
    <script src="design/global/vendor/respond/respond.min.js"></script>
    <![endif]-->

    <!-- Scripts -->
    <script src="design/global/vendor/breakpoints/breakpoints.js"></script>
    <!-- Scripts para la carga de Cotizaciones desde Excel -->
    <script src="js/excel/dist/cpexcel.js"></script>
    <script src="js/excel/shim.js"></script>
    <script src="js/excel/jszip.js"></script>
    <script src="js/excel/xlsx.js"></script>
    <script src="js/pagos/pagos.js"></script>
    <script src="js/numeros/numeros.js"></script>
    <script src="js/pagos/utiles_tabla.js"></script>
    <script>
      Breakpoints();
    </script>
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

    <!--div class="site-menubar">
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
      </div></div-->    <div class="site-gridmenu">
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

        <div class="page-aside-inner">
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
                      <h5>Precio Objetivo</h5>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">$</div>
                        </div>
                        <input type="text" class="form-control numerable" id="costo_presupuesto_total" readonly value="<?php echo ($row['costo_presupuestado']);?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <h5>Costo</h5>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">$</div>
                        </div>
                        <input type="text" class="form-control numerable" id="consumido_total" readonly value="<?php echo ($row['consumido']);?>">
                      </div>
                    </div>
                  </div>
                  <div class="cotizacion_pagos_totales">
                  	<div id="mostrar_costo_presupuestado" class="cotizacion_pagos_totales_plazo col-md-12">
                    	<div class="form-group">
                        	<h5 class="cotizacion_pagos_totales_label"></h5>
                        	<div class="input-group">
                        		<div class="input-group-prepend">
                          			<div class="input-group-text">$</div>
                        		</div>
                        		<input type="text" class="form-control numerable cotizacion_pagos_totales_monto" readonly>
                      		</div>
                		</div>
                  	</div>
                </div>
                  <!--div class="col-md-12">
                    <div class="form-group">
                      <h5>Diferencia</h5>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">$</div>
                        </div>
                        <input type="text" class="form-control numerable" id="saldo_total" readonly value="<?php echo ($row['saldo']);?>">
                      </div>
                    </div>
                </div-->
                  <!-- <div class="col-md-12">
                    <div class="form-group">
                      <h5>Adicionales</h5>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">$</div>
                        </div>
                        <input type="text" class="form-control numerable" id="adicionales_total" readonly value="0.00">
                      </div>
                    </div>
                  </div> -->
                </div>

                <!-- Inputs que muestran los pagos a 30, 60 y 90 días. -->

                <?php
                  //echo $_GET['id'];

                  $sql_dias = "SELECT * FROM registros WHERE registro_seleccionado = 1 AND id_proyecto = '".$_GET['id']."'";
                  mysql_query("SET NAMES 'utf8'");
                  if($result_dias = mysqli_query($conexion, $sql_dias)){
                      if(mysqli_num_rows($result_dias)){
                          $i = 0;
                          $valor30dias = 0;
                          $valor60dias = 0;
                          $valor90dias = 0;
                          $importe_total30 = 0;
                          $importe_total60 = 0;
                          $importe_total90 = 0;
                          while($row_dias = mysqli_fetch_array($result_dias)){
                            if($row_dias['tiempo_pago'] <= 30 AND $row_dias['tiempo_pago'] >= 0) {
                              $importe_total30 = floatval($row_dias['importe_total']);
                              $valor30dias = $valor30dias + $importe_total30;
                            }
                            if ($row_dias['tiempo_pago'] <= 89 AND $row_dias['tiempo_pago'] >= 31) {
                              $importe_total60 = floatval($row_dias['importe_total']);
                              $valor60dias = $valor60dias + $importe_total60;
                            }
                            if ($row_dias['tiempo_pago'] >= 90) {
                              $importe_total90 = floatval($row_dias['importe_total']);
                              $valor90dias = $valor90dias + $importe_total90;
                            }
                          }
                          mysqli_free_result($result_dias);
                      } else{

                      }
                  } else{

                  }
                ?>

                

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
            <button class="btn btn-block btn btn-danger clickable cambio_estado_mensaje" data-estado="1" style="cursor: pointer;">NUEVO</button>
            <button class="btn btn-block btn btn-primary clickable cambio_estado_mensaje" data-estado="2" style="cursor: pointer;">COTIZANDO</button>
            <button class="btn btn-block btn btn-success clickable cambio_estado_mensaje" data-estado="3" style="cursor: pointer;">ENTREGADO</button>
            <button class="btn btn-block btn btn-info clickable cambio_estado_mensaje" data-estado="8" style="cursor: pointer;">STAND BY</button>
            <button class="btn btn-block btn-outline btn-warning clickable actualizar_cotizacion" id="boton_actualizar" style="cursor: pointer; opacity: 0;">ACTUALIZAR</button>
            <!-- <?php
              $sql_contar_adicionales = "SELECT count(*) as total from adicionales WHERE aprobado_adicional = 0 AND id_proyecto_adicional = '".$_GET['id']."'";
              $resultado_contar_adicionales = mysqli_query($conexion, $sql_contar_adicionales);
              $datos_contar_adicionales=mysqli_fetch_assoc($resultado_contar_adicionales);
            ?>
              <button class="btn btn-block btn btn-warning clickable" data-estado="SOLICITAR ADICIONAL" data-proyecto="<?php echo ($_GET['id']); ?>" style="cursor: pointer;" id="solicitar_adicional">SOLICITAR ADICIONAL <strong>(<?php echo ($datos_contar_adicionales['total']);?>)</strong></button>
              <?php
              ?> -->
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
                      <table class="table border-tabla" id="tabla_cotizaciones"></table>
                      <!-- NUEVA TABLA -->
                      <table class="table" id="table_adicionales"></table>
                    </div>
                  </div>
                  <!-- End Example Basic Columns -->
                </div>

                <!-- Botón para descargar Excel -->
                <div class="col-md-12">
                  <button class="btn btn-info" onclick="boton()" style="margin-bottom:20px;">A EXCEL</button>
                </div>

                <!-- Espacio para carga de cotizaciones desde Excel -->
              	<div class="col-md-12" id="cargaExcel">
              		<div class="col-md-12" id="drop">
              			Arrastre y suelte el archivo de planilla de cálculo aquí
                    <p>
                      ( .xlsx, .xls, .xlsm, .xlsb, .ods )
                    </p>
              		</div>
              		<input class="" type="file" name="xlfile" id="xlf" />
                  <label class="btn btn-primary" for="xlf">Elegir archivo</label>
                </div>
                <div class="col-md-12" id="cargando" style="display: none;">
                  <div class="col-md-12 cargando">
                    Cargando planilla...
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
    <div class="modal fade" id="modal_mensaje" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-center" role="document">
        <div class="modal-content">
          <form name="formulario_mensaje">
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <h4>Comentarios:</h4>
                    <textarea row="8" id="motivo_cambio_estado" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"></textarea>
                    <input type="text" name="estado" id="estado_cotizacion" hidden data-estado="0">
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

    <!-- MODAL ESCRIBIR MENSAJE ITEM -->
    <div class="modal fade" id="modal_mensaje_item" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-center" role="document">
        <div class="modal-content">
          <form name="formulario_mensaje">
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <h4>Mensaje</h4>
                    <textarea row="10" id="escribir_mensaje_item" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" maxlength="140"></textarea><br>
                    <input type="file" id="archivo_comentario">
                  </div>
                </div>
              </div>
            </div>
          </form>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" id="boton_mensaje_item">Enviar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          </div>
        </div>
      </div>
    </div>

    <!-- MODAL MOSTRAR MENSAJE ITEM -->
    <div class="modal fade" id="modal_mostrar_mensaje_item" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-center" role="document">
        <div class="modal-content">
          <form name="formulario_mensaje">
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <h4>Mensaje</h4>
                    <textarea row="10" id="mostrar_mensaje_item" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" maxlength="140" readonly></textarea>
                  </div>
                </div>
              </div>
            </div>
          </form>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

      <!-- Modal Editar Cotización -->
      <!--div class="modal fade" id="modal_editar_registro" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-center" role="document">
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
                      <input type="text" id="edicion_id_item" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default" hidden>
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


                                          <div class="cotizacion_pagos_container" data-id_registro="" data-id_proyecto="">
                                          <button type="button" class="btn btn-default cotizacion_pagos_ver_interfaz" data-toggle="modal">PAGOS</button>

                                          <!-- Modal Editar Pagos >
                                          <div class="modal fade cotizacion_pagos_interfaz" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-center" role="document">
                                              <div class="modal-content">
                                                <div class="modal-body">
                                                  <div class="row">
                                                    <div class="col-md-12"><h3>Editar Pagos</h3></div>
                                                      <table>
                                                        <tbody class="cotizacion_pagos_lista">
                                                          <tr><th>Pago</th><th>Porcentaje</th><th>Forma</th></tr>
                                                          <tr class="cotizacion_pagos_data" data-id_pago="">
                                                            <td><select class="cotizacion_pagos_plazo"><option>plazo...</option></select></td>
                                                            <td><input type="number" max="100" width="4" class="cotizacion_pagos_porcentaje" style="width:50px;"></input></td>
                                                            <td><select class="cotizacion_pagos_forma"><option>forma...</option></select></td>
                                                            <td><input type="text" class="cotizacion_pagos_monto numerable" width="9" readonly></input></td>
                                                            <td><button class="cotizacion_pagos_borrar">borrar</button></td>
                                                          </tr>
                                                        </tbody>
                                                      </table>
                                                      <span><button class="cotizacion_pagos_mostrar_agregar_pago btn">+</button></span>
                                                      <span><button class="cotizacion_pagos_guardar btn">guardar</button></span>
                                                      <span><button class="cotizacion_pagos_cancelar btn">cancelar</button></span>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>


                        <!--h4>Forma de Pago</h4>
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
                      </select->
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
                        <input type="text" class="form-control form-control numerable" id="edicion_importe_neto" oninput="calculate_edicion()">
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
                        <input type="text" class="form-control form-control importe_total numerable" id="edicion_importe_total" readonly value="0">
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
      </div-->
      </div>

    <!-- Modal Eliminar Categoría-->
    <div class="modal fade" id="modal_cotizacion_error" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-center" role="document">
        <div class="modal-content">
          <div class="modal-footer">
            <h3 style="text-align: center;">Se han encontrado Items que no tienen una cotización asignada o hay mas de una.<br><span style="text-decoration: underline; font-size: 0.75em;">Tiene que seleccionarse una por item.</span></h3>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Solicitar Adicional -->
    <div class="modal fade" id="modal_solicitar_adicional" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-center" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <h3>Solicitar Adicional</h3>
                <div class="form-group">
                    <h4>Seleccione cotización</h4>
                  <span id="lista_cotizaciones"></span>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                    <h4>Ingrese monto</h4>
                    <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">$</div>
                    </div>
                    <input type="text" class="form-control form-control-lg numerable" id="monto_adicional">
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <h4>Motivo</h4>
                  <textarea row="8" id="motivo_adicional" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" id="boton_solicitar_adicional">Solicitar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Editar Cotización -->
    <div class="modal fade cotizacion_pagos_group" id="modal_cargar_proveedor" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-center" role="document">
        <div class="modal-content">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#tab_editar_cotizacion" role="tab" aria-controls="editar"
                  aria-selected="true">EDITAR COTIZACIÓN</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#tab_cargar_proveedor" role="tab" aria-controls="proveedor"
                  aria-selected="false">CARGA DE FACTURAS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#tab_editar_pagos" role="tab" aria-controls="pagos"
                  aria-selected="false">PLAZOS DE PAGO</a>
              </li>
            </ul>
            <div class="tab-content" id="TabContent">
            <div class="tab-pane fade show active" id="tab_editar_cotizacion" role="tabpanel" aria-labelledby="editar-tab">
                <div id="modal_editar_registro">
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
                        <input type="text" id="edicion_id_item" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default" hidden>
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
                        <h4>Proveedor</h4>
                        <select class="form-control" id="edicion_proveedor" data-plugin="select2" style="width: 100%;">
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
                                        <option value="<?php echo ($row_proveedores['id_proveedor']);?>"><?php echo $row_proveedores['descripcion'];?> | <?php echo $row_proveedores['razon_social'];?> | <?php echo $row_proveedores['contacto'];?></option>
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
                          <input type="text" class="form-control form-control" id="edicion_importe_neto" oninput="calculate_edicion()">
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
                          <input type="text" class="form-control form-control importe_total cotizacion_pagos_total" id="edicion_importe_total" readonly value="0" oninput="calculate_edicion()">
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
                <div class="tab-pane fade" id="tab_cargar_proveedor" role="tabpanel" aria-labelledby="proveedor-tab">

                  <form id="formulario_carga_cotizacion">
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-md-12"><h3>Proveedor</h3></div>
                        <div class="col-md-5">
                          <h4>Nombre Fantasia</h4>
                          <input type="text" name="razon_social" id="nombre_fantasia" class="form-control proveedores" placeholder="Ingrese el nombre de fantasia" style="display:none">
                          <select class="form-control" id="proveedores1">
                                <option value="">Seleccionar</option>
                              <?php
                              // Attempt select query execution
                              $sql1 = "SELECT nombre_fantasia FROM proveedores where nombre_fantasia IS NOT NULL ORDER BY nombre_fantasia";
                              mysql_query("SET NAMES 'utf8'");
                              if($result1 = mysqli_query($conexion, $sql1)){
                                  if(mysqli_num_rows($result1) > 0){
                                      $i = 0;
                                      while($row1 = mysqli_fetch_array($result1)){
                                        ?>
                                          <option value="<?php echo ($row1['id_proveedor']);?>"><?php echo ($row1['nombre_fantasia']);?> </option>
                                        <?php
                                      }
                                      // Free result set
                                      mysqli_free_result($result1);
                                  } else{
                                      echo "No hay datos para mostrar.";
                                  }
                              } else{
                                  echo "ERROR: Could not able to execute $sql1. " . mysqli_error($conexion);
                              }
                            ?>
                          </select>
                        </div>

                        <div class="col-md-5">
                          <h4>Razon Social</h4>
                          <input type="text" name="razon_social" id="razon_social" class="form-control proveedores" placeholder="Ingrese la razon social" style="display:none">
                          <select class="form-control" id="proveedores2">
                                <option value="">Seleccionar</option>
                              <?php
                              // Attempt select query execution
                              $sql1 = "SELECT razon_social FROM proveedores where razon_social <>'' ORDER BY razon_social";
                              mysql_query("SET NAMES 'utf8'");
                              if($result1 = mysqli_query($conexion, $sql1)){
                                  if(mysqli_num_rows($result1) > 0){
                                      $i = 0;
                                      while($row1 = mysqli_fetch_array($result1)){
                                        ?>
                                          <option value="<?php echo ($row1['id_proveedor']);?>"><?php echo ($row1['razon_social']);?></option>
                                        <?php
                                      }
                                      // Free result set
                                      mysqli_free_result($result1);
                                  } else{
                                      echo "No hay datos para mostrar.";
                                  }
                              } else{
                                  echo "ERROR: Could not able to execute $sql1. " . mysqli_error($conexion);
                              }
                            ?>
                          </select>
                          
                        </div>

                        

                        

                        <div class="col-md-1">          

                          
                          <i class="far fa-plus-square" id="agregar_proveedor" ></i>

                          <button type="button" class="btn btn-success btn-block" id="boton_guardar_proveedor_nombre"><strong>GUARDAR</strong></button>
                         
                        </div>

                        

                        <div class="col-md-6">
                          <div class="form-group">
                              <h4>OT</h4>
                              <input type="text" class="form-control form-control" id="ot" readonly>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <h4>Item</h4>
                              <input type="text" class="form-control form-control" id="tipo_item" readonly>
                          </div>
                        </div>
                        
                        <div class="col-md-4">
                          <div class="form-group">
                              <h4>Forma de Pago</h4>
                              <select class="form-control" id="forma_pago_nuevo">
                                  <option value="">Seleccionar</option>
                                <?php
                                // Attempt select query execution
                                $sql1 = "SELECT * FROM forma_pago";
                                mysql_query("SET NAMES 'utf8'");
                                if($result1 = mysqli_query($conexion, $sql1)){
                                    if(mysqli_num_rows($result1) > 0){
                                        $i = 0;
                                        while($row1 = mysqli_fetch_array($result1)){
                                          ?>
                                            <option value="<?php echo ($row1['id']);?>"><?php echo (utf8_encode($row1['tipo']));?></option>
                                          <?php
                                        }
                                        // Free result set
                                        mysqli_free_result($result1);
                                    } else{
                                        echo "No hay datos para mostrar.";
                                    }
                                } else{
                                    echo "ERROR: Could not able to execute $sql1. " . mysqli_error($conexion);
                                }
                              ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                              <h4>Tipo de Factura</h4>
                              <select class="form-control" id="tipo_factura_nuevo_registro">
                                  <option value="">Seleccionar</option>
                                <?php
                                // Attempt select query execution
                                $sql1 = "SELECT * FROM tipo_factura ORDER BY tipo_factura";
                                mysql_query("SET NAMES 'utf8'");
                                if($result1 = mysqli_query($conexion, $sql1)){
                                    if(mysqli_num_rows($result1) > 0){
                                        $i = 0;
                                        while($row1 = mysqli_fetch_array($result1)){
                                          ?>
                                            <option value="<?php echo ($row1['tipo_factura']);?>"><?php echo (utf8_encode($row1['tipo_factura']));?></option>
                                          <?php
                                        }
                                        // Free result set
                                        mysqli_free_result($result1);
                                    } else{
                                        echo "No hay datos para mostrar.";
                                    }
                                } else{
                                    echo "ERROR: Could not able to execute $sql1. " . mysqli_error($conexion);
                                }
                              ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                              <h4>Número de Factura</h4>
                              <input type="number" id="numero_factura_nuevo_registro" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                              <h4>Fecha de Factura</h4>
                              <input type="text" id="fecha_facturacion" class="form-control datepicker_ff"  aria-label="Default" aria-describedby="inputGroup-sizing-default"data-plugin="datepicker">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                              <h4>Tiempo de Pago</h4>
                              <div class="input-group">
                                <input type="text" id="tiempo_pago" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                <div class="input-group-prepend">
                                <div class="input-group-text"> días</div>
                              </div>
                            </div>
                              <input type="number" id="id" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" hidden>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                              <h4>Fecha de Pago</h4>
                              <input type="text" id="fecha_pago" class="form-control datepicker_fp"  aria-label="Default" aria-describedby="inputGroup-sizing-default" data-plugin="datepicker">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                              <h4>Importe Neto</h4>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">$</div>
                              </div>
                              <input type="text" class="form-control form-control-lg sumar" id="importe_neto">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                              <h4>Tipo IVA</h4>
                              <select class="form-control form-control-lg" id="tipo_iva">
                                  <option value="">Seleccionar</option>
                                <?php
                                // Attempt select query execution
                                $sql3 = "SELECT * FROM iva ORDER BY valor_iva ASC";
                                mysql_query("SET NAMES 'utf8'");
                                if($result3 = mysqli_query($conexion, $sql3)){
                                    if(mysqli_num_rows($result3) > 0){
                                        $i = 0;
                                        while($row3 = mysqli_fetch_array($result3)){
                              ?>
                              <option value="<?php echo ($row3['valor_iva']);?>"><?php echo ($row3['valor_iva']);?>%</option>
                              <?php
                                        }
                                        // Free result set
                                        mysqli_free_result($result3);
                                    } else{
                                        echo "No hay datos para mostrar.";
                                    }
                                } else{
                                    echo "ERROR: Could not able to execute $sql3. " . mysqli_error($conexion);
                                }
                              ?>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-2">
                          <div class="form-group">
                              <h4>I.V.A.</h4>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">$</div>
                              </div>
                              <input type="text" class="form-control form-control-lg sumar" id="iva">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                              <h4>Percepción</h4>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">$</div>
                              </div>
                              <input type="text" class="form-control form-control-lg sumar" id="percepcion">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                              <h4>Importe Bruto</h4>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">$</div>
                              </div>
                              <input type="text" id="importe_bruto" class="form-control form-control-lg importe_bruto" readonly>
                            </div>
                          </div>
                        </div>
                        <?php
                          if(empty($row['archivo_adjunto'])){
                        ?>
                          <div class="col-md-12">
                            <span class="input-group-text">Adjuntar factura</span>
                          </div>
                          <div class="col-md-12">
                              <input type="file"  class="upload_file" data-plugin="dropify" data-default-file=""/>
                          </div>
                        <?php
                          } else {
                        ?>
                          <div class="col-md-12">
                            <span class="input-group-text">Adjuntar factura</span>
                          </div>
                          <div class="col-md-12">
                              <input type="file"  class="upload_file" data-plugin="dropify" data-default-file=""/>
                          </div>
                        <?php
                          }
                        ?>

                        <div class="col-md-6">
                          <button type="button" class="btn btn-success btn-block" id="boton_guardar_proveedor_cotizacion"><strong>GUARDAR</strong></button>
                        </div>
                        <div class="col-md-6">
                          <button type="button" class="btn btn-danger btn-block" data-dismiss="modal"><strong>CANCELAR</strong></button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- Tab de carga y edicion de pagos -->
                <div class="tab-pane fade" id="tab_editar_pagos" role="tabpanel" aria-labelledby="pagos-tab">
                  <div class="modal-body">
                    <div class="row" id="cotizacion_pagos_avatar">
                        <div class="col-md-12 cotizacion_pagos_container" data-id_registro="" data-id_proyecto="">
                          <div class="col-md-12"><h3>Editar Pagos</h3></div>
                            <div class="col-md-12">
                              <table class="col-md-12">
                                <tbody class="cotizacion_pagos_lista">
                                  <tr><th class="gray">Pago</th><th class="gray">Porcentaje</th><th class="gray">Forma</th><th class="gray">Fecha 1</th><th class="gray">Fecha 2</th><th class="gray">Fecha 3</th><th class="gray">Monto</th><th class="gray">Total</th><th class="gray"></th></tr>
                                  <tr class="cotizacion_pagos_data" data-id_pago="">
                                    <td><select class="form-control cotizacion_pagos_plazo"><option>PLAZO...</option></select></td>
                                    <td><input type="text" class="form-control cotizacion_pagos_porcentaje"></td>
                                    <td><select class="form-control cotizacion_pagos_forma"><option>FORMA...</option></select></td>
                                    <td><input type="text" class="form-control cotizacion_pagos_fecha1" placeholder="fecha 1"></td>
                                    <td><input type="text" class="form-control cotizacion_pagos_fecha2" placeholder="fecha 2"></td>
                                    <td><input type="text" class="form-control cotizacion_pagos_fecha3" placeholder="fecha 3"></td>
                                    <td><input type="text" class="form-control cotizacion_pagos_monto numerable" width="9" readonly></td>
                                    <td><input type="text" id="cotizacion_pagos_total" class="form-control cotizacion_pagos_total" width="9" readonly></td>
                                    <td><button type="button" class="btn btn-primary btn-block cotizacion_pagos_borrar"><i class="icon wb-trash" aria-hidden="true"></i></button></td>
                                  </tr>
                                </tbody>
                              </table>
                              <span><button class="cotizacion_pagos_guardar btn col-md-5" data-dismiss="modal">GUARDAR</button></span>
                              <span><button class="cotizacion_pagos_cancelar btn btn-danger col-md-4" data-dismiss="modal">CANCELAR</button></span>
                              <span><button class="cotizacion_pagos_mostrar_agregar_pago btn btn-info col-md-3">AGREGAR</button></span>
                            </div>
                          </div>
                      </div>
                  </div>
                </div>
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
        <script src="design/global/vendor/dropify/dropify.min.js"></script>
        <script src="design/global/vendor/bootstrap-datepicker/bootstrap-datepicker.js"></script>

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
        <script src="design/global/js/Plugin/bootstrap-datepicker.js"></script>
        <script src="design/global/js/Plugin/dropify.js"></script>

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

       let proyecto = document.getElementById('ingreso_id').innerHTML;

        $.ajax({
            url:"ajax_cotizaciones_1.php",
            method:"POST",
            data:'proyecto='+proyecto,
            success:function(data){
                $('#tabla_cotizaciones').html(data);
                //if ($(data).find("tr").length>2) $('#cargaExcel').hide();
                MergeCommonRows($('#tabla_cotizaciones'));
                funciones_cotizaciones();
                total_cotizacion();
                $('#tabla_cotizaciones .numerable').each(function(ix, tag){ abandonar(tag); });
            }
        });

        /*$.ajax({
            url:"actualizar_adicionales.php",
            method:"POST",
            data:'proyecto='+proyecto,
            success:function(data){
                $('#table_adicionales').html(data);
                var suma_adicionales = document.getElementById('suma_adicionales').innerHTML;
                var consumido = document.getElementById('consumido_total').value;
                suma_adicionales = parseFloat(suma_adicionales);
                consumido = pasarafloat(consumido);
                var adicional_total = suma_adicionales + consumido;
                adicional_total = parseFloat(adicional_total);
                adicional_total = adicional_total.toFixed(2);
                document.getElementById('adicionales_total').value = suma_adicionales;
                $(".numerable").each(function(){abandonar(this);})
            }
        });*/

        var tipo_estado = document.getElementById('tipo_estado').innerHTML;

        console.log(tipo_estado);
        switch(tipo_estado){
          case "NUEVO":
            $("#tipo_estado").css("background-color", "#ff4c52");
            $("#tipo_estado").css("color", "#FFFFFF");
            break;
          case "CANCELADO":
            $("#tipo_estado").css("background-color", "#23272b");
            $("#tipo_estado").css("color", "#FFFFFF");
            break;
          case "APROBADO":
            $("#tipo_estado").css("background-color", "#218838");
            $("#tipo_estado").css("color", "#FFFFFF");
            $("#boton_actualizar").css("opacity", "1");
            break;
          case "CONFIRMADO":
            $("#tipo_estado").css("background-color", "#218838");
            $("#tipo_estado").css("color", "#FFFFFF");
            $("#boton_actualizar").css("opacity", "1");
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
        $("input[oninput='calculate_edicion()']").on({
          blur: calculate_edicion,
          change: calculate_edicion,
          keyup: calculate_edicion
        });

      });

      function calculate() {
        //puntear(document.getElementById('ingreso_importe_neto'));
        var myBox1 = document.getElementById('ingreso_cantidad').value;
        var myBox2 = document.getElementById('ingreso_importe_neto').value;
        var myBox3 = document.getElementById('ingreso_jornadas').value;
        var result = document.getElementById('ingreso_importe_total');
        var myResult = myBox1 * myBox2 * myBox3;
        result.value = myResult;
        //console.log("en calculate: ", result.value);
        //abandonar(result);

      };
      function calculate_edicion() {
        //puntear(document.getElementById('edicion_importe_neto'));
        var myBox1 = document.getElementById('edicion_cantidad').value;
        var myBox2 = document.getElementById('edicion_importe_neto').value;
        var myBox3 = document.getElementById('edicion_jornadas').value;
        var result = document.getElementById('edicion_importe_total');
        var myResult = myBox1 * myBox2 * myBox3;
        result.value = myResult;
        //console.log("en calculate_edicion: ", myBox2, result.value);
        //abandonar(result);
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

      
      $("#agregar_proveedor").click(function(){
        $("#proveedores2").toggle({
        duration: 25,
    });
        $("#razon_social").toggle({
        duration: 25,
    });
        $("#proveedores1").toggle({
        duration: 25,
    });
        $("#nombre_fantasia").toggle({
        duration: 25,
    });
                 
        });

        
        

      $('#boton_guardar_cotizacion').click(function(){
        var id_categoria = document.getElementById('codigo_categoria').innerHTML;
        var id_proyecto = document.getElementById('codigo_proyecto').innerHTML;
        var item = $("#ingreso_item").val();
        var condicion = $("#ingreso_condicion").val();
        var detalle = null;
        var cantidad = $("#ingreso_cantidad").val();
        var importe_neto = pasarafloat($("#ingreso_importe_neto").val());
        var importe_total = pasarafloat($("#ingreso_importe_total").val());
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

      $('#boton_guardar_proveedor_cotizacion').click(function(){
          var id = $("#ot").val();
          var id_proveedor = $("#proveedores").val();
          var nombre_fantasia = $("#proveedores1").val();
          var forma_pago = $("#forma_pago_nuevo").val();
          var tipo_factura = $("#tipo_factura_nuevo_registro").val();
          var numero_factura = $("#numero_factura_nuevo_registro").val();
          var fecha_factura = $("#fecha_facturacion").val();
          var fecha_pactada = $("#fecha_pago").val();
          var importe_neto = $("#importe_neto").val();
          var iva = $("#iva").val();
          var percepcion = $("#percepcion").val();
          var importe_bruto = $("#importe_bruto").val();

          var archivo_adjunto = $('.upload_file').val();

          if (archivo_adjunto == ''){
            var archivo_adjunto = "sin_subir";
          } else {
            var adjunto = $(".upload_file")[0].files[0];
            var archivo_adjunto = adjunto.name;
          }

          importe_neto = parseFloat(importe_neto);
          iva = parseFloat(iva);
          percepcion = parseFloat(percepcion);
          importe_bruto = parseFloat(importe_bruto);


          $.ajax({
            url:"agregar_proveedor_cotizacion.php",
            method:"POST",
            data: 'id='+id+'&id_proveedor='+id_proveedor+'&forma_pago='+forma_pago+'&tipo_factura='+tipo_factura+'&numero_factura='+numero_factura+'&fecha_factura='+fecha_factura+'&fecha_pactada='+fecha_pactada+'&archivo_adjunto='+archivo_adjunto+'&importe_neto='+importe_neto+'&iva='+iva+'&percepcion='+percepcion+'&importe_bruto='+importe_bruto,
            success:function(data){
              $('#formulario_carga_cotizacion')[0].reset();
              var drEvent = $('.upload_file').dropify();
              drEvent = drEvent.data('dropify');
              drEvent.resetPreview();
              drEvent.clearElement();
              $.ajax({
                  url:"ajax_mostrar_cotizaciones_aprobadas.php",
                  method:"POST",
                  data:'proyecto='+proyecto,
                  success:function(data){
                      $('#modal_cargar_proveedor').modal('hide');
                  }
              });
            }
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
        var monto_adicional = pasarafloat(document.getElementById('monto_adicional').value);
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
        var texto_estado = $(this).text();
        var estado = $(this).attr("data-estado");
        console.log(estado);
        if(estado == "3"){
          let proyecto = '<?php echo $_GET['id'];?>';
          console.log("Cambio de estado: ",proyecto);
          $.ajax({
            url:"ajax/comprobar_item_marcado.php",
            method:"POST",
            data:'proyecto='+proyecto,
            success:function(data){
              console.log(data);
              if(data == "null"){
                $('#modal_mensaje').modal('show');
                $("#estado_cotizacion").val(estado);
              } else {
                $('#modal_cotizacion_error').modal('show');
                $("#estado_cotizacion").val(estado);
              }
            }
          });
        } else {
          $('#modal_mensaje').modal('show');
          $("#estado_cotizacion").val(estado);
        }
      });

      $('#boton_mensaje').click(function(){
        var id = document.getElementById('ingreso_id').innerHTML;
        var mensaje = document.getElementById('motivo_cambio_estado').value;
        var estado = document.getElementById('estado_cotizacion').value;
        console.log(estado);
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
          cargar_editar_cotizacion(id_registro);
    });

    function cargar_editar_cotizacion(id_registro){
          console.log("Click id: ",id_registro);
          $.ajax({
          url:"cargar_registro.php",
          method:"POST",
          data:{id_registro:id_registro},
          dataType:"json",
          success:function(data){
            $("#edicion_rubro").val(data.rubro_cotizacion);
            $("#edicion_categoria").val(data.categoria_cotizacion);
            $("#edicion_item").val(data.nombre_item_cotizacion);
            $("#edicion_condicion").val(data.condicion_registro);
            $("#edicion_jornadas").val(data.jornadas_registro);
            $("#edicion_detalle_cotizacion").val(data.detalle_registro);
            $("#edicion_cantidad").val(data.cantidad);
            $("#edicion_importe_neto").val(data.importe_neto); abandonar($("#edicion_importe_neto")[0]);
            $("#edicion_importe_total").val(data.importe_total); abandonar($("#edicion_importe_total")[0]);
            $("#edicion_proveedor").val(data.id_proveedor);
            $("#edicion_forma_pago").val(data.forma_pago);
            $("#edicion_dias").val(data.tiempo_pago);
            $("#edicion_id_registro").val(data.id);
            $("#edicion_id_item").val(data.item);
            $(".numerable").each(function(){abandonar(this);});
            if (data.registro_seleccionado == 1){
	        	$("#edicion_jornadas").attr("disabled", true);
	        	$("#edicion_cantidad").attr("disabled", true);
	        	$("#edicion_importe_neto").attr("disabled", true);
            } else {
            	$('#edicion_jornadas').removeAttr('disabled');
            	$('#edicion_cantidad').removeAttr('disabled');
            	$('#edicion_importe_neto').removeAttr('disabled');
            }
            //$('#modal_editar_registro').modal('show');
          }
        });



          $('#boton_editar_cotizacion').click(function(){
          var rubro = $("#edicion_rubro").val();
          var categoria = $("#edicion_categoria").val();
          var item = $("#edicion_item").val();
          var id_item = $("#edicion_id_item").val();
          var condicion = $("#edicion_condicion").val();
          var detalle = $("#edicion_detalle_cotizacion").val();
          var cantidad = $("#edicion_cantidad").val();
          var jornadas = $("#edicion_jornadas").val();
          var importe_neto = pasarafloat($("#edicion_importe_neto").val());
          var importe_total = pasarafloat($("#edicion_importe_total").val());
          var proveedor = $("#edicion_proveedor").val();
          var forma_pago = $("#edicion_forma_pago").val();
          var dias_pago = $("#edicion_dias").val();
          var id_registro = $("#edicion_id_registro").val();
          $.ajax({
           url:"editar_registro.php",
           method:"POST",
           data: 'id_registro='+ id_registro+'&rubro='+ rubro+'&categoria='+ categoria+'&item='+ item+'&id_item='+ id_item+'&condicion='+ condicion+'&detalle='+ detalle+'&jornadas='+ jornadas+'&cantidad='+ cantidad+'&importe_neto='+ importe_neto+'&importe_total='+ importe_total+'&proveedor='+ proveedor+'&forma_pago='+ forma_pago+'&dias_pago='+ dias_pago,
			success:function(data){
              $('#modal_editar_registro').modal('hide');
              $('#modal_cargar_proveedor').modal('hide');
              /*proyecto = document.getElementById('ingreso_id').innerHTML;
              $.ajax({
                url:"ajax_cotizaciones_1.php",
                method:"POST",
                data:'proyecto='+proyecto,
                success:function(data){
                  $('#tabla_cotizaciones').html(data);
                  funciones_cotizaciones();
                }
              });*/
           	}
     	});
      });
    }

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
          sum = pasarafloat($(this).val());
          sum_total = sum_total + sum;
          total = sum_total.toFixed(2);
          document.getElementById('consumido_total').value = total;
        });
        saldo = document.getElementById('costo_presupuesto_total').value;
        saldo = pasarafloat(saldo);
        saldo_total = saldo - total;
        saldo_total = saldo_total.toFixed(2);
        //document.getElementById('saldo_total').value = saldo_total;
        var id_proyecto = document.getElementById('ingreso_id').innerHTML;
        var costo_presupuesto_total = document.getElementById('costo_presupuesto_total').value;
        costo_presupuesto_total = pasarafloat(costo_presupuesto_total);
        /*if(costo_presupuesto_total == saldo_total){
          console.log("Pongo consumido en 0");
          document.getElementById('consumido_total').value = "0,00";
          document.getElementById('adicionales_total').value = "0,00";
          document.getElementById('pago30').value = "0,00";
          document.getElementById('pago60').value = "0,00";
          document.getElementById('pago90').value = "0,00";
        }*/
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
                              consumido = pasarafloat(consumido);
                              var adicional_total = suma_adicionales + consumido;
                              adicional_total = parseFloat(adicional_total);
                              adicional_total = adicional_total.toFixed(2);
                              console.log("Adicional + Consumido: ",adicional_total);
                              console.log("Adicional: ",suma_adicionales);
                              console.log("Consumido :",consumido);
                              document.getElementById('adicionales_total').value = suma_adicionales;
                              $(".numerable").each(function(){abandonar(this);})
                          }
                      });
                         }
                    });
                  }
              });
      });
    </script>

    <script type="text/javascript">

      function MergeCommonRows(table, firstOnly) {/*
        var firstColumnBrakes = [];
        for (let i=2; i<=4; i++) {
            var previous = null, cellToExtend = null, rowspan = 1;
            table.find("tr.cotizacion_pagos_group > td:nth-child(" + i + ")").each(function(index, el){
                //console.log("i", i, " index ", index, " text ", $(el).text())
                if (previous == $(el).text() && $(el).text() !== "" && $.inArray(index, firstColumnBrakes) === -1) {
                    $(el).addClass('hidden');
                    cellToExtend.attr("rowspan", (rowspan = rowspan+1));
                }else{
                    if(firstOnly == 'first only'){
                        if(i === 1) firstColumnBrakes.push(index);
                    }else{
                        if($.inArray(index, firstColumnBrakes) === -1) firstColumnBrakes.push(index);
                    }
                    if (i == 2) $(el).addClass('primerRubro');
                    if (i == 3) $(el).addClass('primerCategoria');
                    rowspan = 1;
                    previous = $(el).text();
                    cellToExtend = $(el);
                }
            });
        }
        agregarSubtotales(table);*/
      }

      function agregarSubtotales(table) {
          //console.log(table.find(".primerRubro"));
          table.find(".primerRubro").parents('.cotizacion_pagos_group + tr').before($('<tr><td/><td>Subtotales</td><td colspan="7"/><td/></tr>').addClass('subtotalRubro'));
          table.find(".primerRubro").each(function(ix, rubro) {
              let $tr = $(rubro).parents('tr');

              let total = 0;
              let promedios = [];
              let promediosConCheck = [];
              let conteos = []
              let conteosConCheck = [];
              let anterior = undefined;

              while ($tr.length && !$tr.hasClass("subtotalRubro")) {
                  // Sólo se consideran los registros checkeados
                  let item_actual = $tr.find('[data-item]').data('item');
                  let total_actual = pasarafloat($tr.find('.cotizacion_pagos_total').text());
                  if (item_actual == anterior) {
                      promedios[promedios.length - 1] += total_actual;
                      conteos[conteos.length - 1] += 1;
                      if ($tr.find(".cotizacion_pagos_checked")[0].checked) {
                          promediosConCheck[promedios.length - 1] += total_actual;
                          conteosConCheck[conteos.length - 1] += 1;
                      }
                  } else {
                      promedios.push(total_actual);
                      conteos.push(1);
                      if ($tr.find(".cotizacion_pagos_checked")[0].checked) {
                          promediosConCheck.push(total_actual);
                          conteosConCheck.push(1);
                      }
                  }
                  anterior = item_actual;
                  $tr = $tr.next();
              }
              if (conteosConCheck.length > 0) {
                  promedios = promediosConCheck;
                  conteos = conteosConCheck;
              }
              for (let i=0; i<promedios.length; i++) {
                  console.log("premedios y conteos ", promedios[i], conteos[i]);
                  total += promedios[i]/conteos[i];
              }
              $total = $('<span></span>')
                            .appendTo($tr.find('td:last-child').empty())
                            .addClass('subtotalRubroMonto numerable')
                            .before($('<span>$</span>'))
                            .text(total);
              $total.text(completar(puntearTexto($total.text())));
          });
      }

      function total_cotizacion(total_cotizacion){
        valor = 0;
        total_cotizacion = 0;
        $(".subtotal_rubro").each(function(){
            valor = $(this).text();
            valor_float = pasarafloat(valor);
            total_cotizacion = total_cotizacion + valor_float;
            console.log(valor);
            console.log(total_cotizacion);
        });
        total_cotizacion = total_cotizacion.toFixed(2);

        $('#total_cotizacion').html(total_cotizacion);
        $('#consumible_total').html(total_cotizacion);
      }

      function funciones_cotizaciones(){

        $('.mensaje_item').click(function(e){
          let registro = $(this).attr('data-registro');
          let item = $(this).attr('data-item');
          let mensaje = $(this).attr('data-mensaje');
          let proyecto = '<?php echo $_GET['id'];?>';

          console.log("Proyecto: ",proyecto);

          if(mensaje == 0){
            $('#modal_mensaje_item').modal('show');
            $('#boton_mensaje_item').click(function(){
              let texto_mensaje = document.getElementById('escribir_mensaje_item').value;
              let archivo_comentario= document.getElementById('archivo_comentario').files[0].name;
              
              $.ajax({
                url:"ajax/guardar_mensaje_cotizacion.php",
                method:"POST",
                data:'registro='+registro+'&texto_mensaje='+texto_mensaje+'&archivo_comentario='+archivo_comentario,
                success:function(data){
                  $.ajax({
                    url:"ajax_cotizaciones_1.php",
                    method:"POST",
                    data:'proyecto='+proyecto,
                    success:function(data){
                      $('#escribir_mensaje_item').val('');
                      $('#modal_mensaje_item').modal('hide');
                      $('#tabla_cotizaciones').html(data);
                      funciones_cotizaciones();
                      total_cotizacion();
                $('#tabla_cotizaciones .numerable').each(function(ix, tag){ abandonar(tag); });
                      //$('#tabla_cotizaciones .numerable').each(function(ix, tag){ abandonar(tag); });
                    }
                  });
                }
              });
            });
          } else {
            $.ajax({
              url:"ajax/cargar_mensaje_cotizacion.php",
              method:"POST",
              dataType:"json",
              data:'registro='+registro,
              success:function(data){
                $("#mostrar_mensaje_item").val(data.texto_mensaje_cotizacion);
                $('#modal_mostrar_mensaje_item').modal('show');
              }
            });
          }
        });

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

        $("#ingreso_rubro").select2({
          tags: true
        });

        $("#ingreso_categoria").select2({
          tags: true
        });

        $("#ingreso_condicion").select2({
          tags: true
        });

        $("#edicion_proveedor").select2({
          tags: true,
          dropdownParent: $("#modal_editar_registro")
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

        $('#boton_actualizar').click(function(){
          var proyecto = '<?php echo $_GET['id'];?>';
          $.ajax({
            url:"ajax/actualizar_cotizacion.php",
            method:"POST",
            data: 'proyecto='+ proyecto,
            success:function(data){
              console.log("Proyecto actualizado");
            }
          });
        });

        

        $('#ingreso_condicion').change(function(){
          var condicion = $(this).val();
          console.log("Cambio condición: ",condicion);
          if(condicion == 2){
            $('#ingreso_jornadas').attr('disabled', 'disabled').val(1);
          } else {
             $('#ingreso_jornadas').removeAttr('disabled');
          }
        });

        $('#edicion_condicion').change(function(){
          var condicion = $(this).val();
          console.log("Cambio condición: ",condicion);
          if(condicion == 2){
            $('#edicion_jornadas').attr('disabled', 'disabled').val(1);
          } else {
             $('#edicion_jornadas').removeAttr('disabled');
          }
        });

        $('#boton_guardar_cotizacion').click(function(){
          console.log("Guardar cotizacion");
          var proyecto = '<?php echo $_GET['id'];?>';
          var rubro = $("#ingreso_rubro").val();
          var categoria = $("#ingreso_categoria").val();
          var item = $("#ingreso_item").val();
          var condicion = $("#ingreso_condicion").val();
          var detalle = $("#ingreso_detalle_cotizacion").val();
          var jornada = $("#ingreso_jornadas").val();
          var cantidad = $("#ingreso_cantidad").val();
          var importe_neto = pasarafloat($("#ingreso_importe_neto").val());
          var importe_total = pasarafloat($("#ingreso_importe_total").val());
          /*var proveedor = $("#ingreso_proveedor").val();
          var forma_pago = $("#ingreso_forma_pago").val();*/
          //var dias_pago = $("#ingreso_dias").val();
          //var pagos = cotizacion_pagos.guardable();
          //var pagos = '{"0":{"plazo":"90","porcentaje":"100","forma":"3","fecha1":"","fecha2":"undefined"}}';
          $.ajax({
            url:"agregar_cotizacion_manual.php",
            method:"POST",
            data: 'proyecto='+ proyecto+'&rubro='+ rubro+'&categoria='+ categoria+'&item='+ item+'&condicion='+ condicion+'&detalle='+ detalle+'&jornada='+ jornada+'&cantidad='+ cantidad+'&importe_neto='+ importe_neto+'&importe_total='+ importe_total,//+'&pagos=' + pagos,
            success:function(data){
                console.log(data);
              //window.location.reload(true);
              $.ajax({
                url:"ajax_cotizaciones_1.php",
                method:"POST",
                data:'proyecto='+proyecto,
                success:function(data){
                  $('#tabla_cotizaciones').html(data);
                  funciones_cotizaciones();
                  total_cotizacion();
                $('#tabla_cotizaciones .numerable').each(function(ix, tag){ abandonar(tag); });
                  //$('#tabla_cotizaciones .numerable').each(function(ix, tag){ abandonar(tag); });
                }
              });
          },
          error:function(error){
              console.log(error);
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
          var id = $(this).closest('[data-registro]').data('registro');
          console.log(id);
          $.ajax({
            url:"eliminar_cotizacion_nocheck.php",
            method:"POST",
            data:'id='+id,
            success:function(data){
                console.log(data);
              $('#modal_eliminar_cotizacion').modal('hide');
              $.ajax({
                url:"ajax_cotizaciones_1.php",
                method:"POST",
                data:'proyecto='+proyecto,
                success:function(data){
                  $('#tabla_cotizaciones').html(data);
                  funciones_cotizaciones();
                  total_cotizacion();
                $('#tabla_cotizaciones .numerable').each(function(ix, tag){ abandonar(tag); });
                  //$('#tabla_cotizaciones .numerable').each(function(ix, tag){ abandonar(tag); });
                }
              });
          },
          error:function(data){ console.log(data); }
          });
        });


        $('.editar_cotizacion').click(function(id_item){
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
              $("#edicion_item").val(data.nombre_item_cotizacion);
              $("#edicion_condicion").val(data.condicion_registro);
              $("#edicion_detalle_cotizacion").val(data.detalle_registro);
              console.log(data.jornadas_registro);
              $("#edicion_jornadas").val(data.jornadas_registro);
              $("#edicion_cantidad").val(data.cantidad);
              $("#edicion_importe_neto").val(data.importe_neto); abandonar($("#edicion_importe_neto"));
              $("#edicion_importe_total").val(data.importe_total); abandonar($("#edicion_importe_total"));
              $("#edicion_proveedor").val(data.id_proveedor);
              $("#edicion_forma_pago").val(data.forma_pago);
              $("#edicion_dias").val(data.tiempo_pago);
              $("#edicion_id_registro").val(id_registro);
              $(".numerable").each(function(){abandonar(this);});
              //$('#modal_editar_registro').modal('show');
              $("#edicion_id_item").val(data.item);
            }
          });
        });

        $('#boton_editar_cotizacion').click(function(){
          var proyecto = document.getElementById('ingreso_id').innerHTML;
          var rubro = $("#edicion_rubro").val();
          var categoria = $("#edicion_categoria").val();
          var item = $("#edicion_item").val();
          var id_item = $("#edicion_id_item").val();
          var condicion = $("#edicion_condicion").val();
          var detalle = $("#edicion_detalle_cotizacion").val();
          var cantidad = $("#edicion_cantidad").val();
          var jornadas = $("#edicion_jornadas").val();
          var importe_neto = parseFloat($("#edicion_importe_neto").val());
          var importe_total = parseFloat($("#edicion_importe_total").val());
          var proveedor = $("#edicion_proveedor").val();
          var forma_pago = $("#edicion_forma_pago").val();
          var dias_pago = $("#edicion_dias").val();
          var id_registro = $("#edicion_id_registro").val();
          $.ajax({
           url:"editar_registro.php",
           method:"POST",
           data: 'id_registro='+ id_registro+'&rubro='+ rubro+'&categoria='+ categoria+'&item='+ item+'&id_item='+ id_item+'&condicion='+ condicion+'&detalle='+ detalle+'&jornadas='+ jornadas+'&cantidad='+ cantidad+'&importe_neto='+ importe_neto+'&importe_total='+ importe_total+'&proveedor='+ proveedor+'&forma_pago='+ forma_pago+'&dias_pago='+ dias_pago,
           success:function(data){
            $('#modal_editar_registro').modal('hide');
            $('#modal_cargar_proveedor').hide();
            $.ajax({
                url:"ajax_cotizaciones_1.php",
                method:"POST",
                data:'proyecto='+proyecto,
                success:function(data){
                  $('#tabla_cotizaciones').html(data);
                  funciones_cotizaciones();
                  total_cotizacion();
                $('#tabla_cotizaciones .numerable').each(function(ix, tag){ abandonar(tag); });
                  //$('#tabla_cotizaciones .numerable').each(function(ix, tag){ abandonar(tag); });
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
          saldo = pasarafloat(saldo);
          saldo_total = saldo - total;
          saldo_total = saldo_total.toFixed(2);

          //document.getElementById('saldo_total').value = saldo_total;

          var id_proyecto = document.getElementById('ingreso_id').innerHTML;
          var costo_presupuesto_total = document.getElementById('costo_presupuesto_total').value;
          costo_presupuesto_total = pasarafloat(costo_presupuesto_total);

          /*if(costo_presupuesto_total == saldo_total){
            console.log("Pongo consumido en 0");
            document.getElementById('consumido_total').value = "0,00";
            document.getElementById('adicionales_total').value = "0,00";
            document.getElementById('pago30').value = "0,00";
            document.getElementById('pago60').value = "0,00";
            document.getElementById('pago90').value = "0,00";
          }*/
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
                  $(".numerable").each(function(){abandonar(this);});
                    $.ajax({
                      url:"ajax_cotizaciones_1.php",
                      method:"POST",
                      data:'proyecto='+proyecto,
                      success:function(data){
                          $('#tabla_cotizaciones').html(data);
                          //if ($(data).find("tr").length>2) $('#cargaExcel').hide();
                          MergeCommonRows($('#tabla_cotizaciones'));
                          funciones_cotizaciones();
                          total_cotizacion();
                $('#tabla_cotizaciones .numerable').each(function(ix, tag){ abandonar(tag); });
                          //$('#tabla_cotizaciones .numerable').each(function(ix, tag){ abandonar(tag); });
                      }
                    });
                  /*$.ajax({
                    url:"actualizar_adicionales.php",
                    method:"POST",
                    data:'proyecto='+proyecto,
                    success:function(data){
                      $('#table_adicionales').html(data);
                      var suma_adicionales = document.getElementById('suma_adicionales').innerHTML;
                      var consumido = document.getElementById('consumido_total').value;
                      suma_adicionales = parseFloat(suma_adicionales);
                      consumido = pasarafloat(consumido);
                      var adicional_total = suma_adicionales + consumido;
                      adicional_total = parseFloat(adicional_total);
                      adicional_total = adicional_total.toFixed(2);
                      console.log("Adicional + Consumido: ",adicional_total);
                      console.log("Adicional: ",suma_adicionales);
                      console.log("Consumido :",consumido);
                      document.getElementById('adicionales_total').value = suma_adicionales;
                    }
                  });*/
                }
              });
            }
          });
        });

        $('.seleccion_item').click(function(){
          var registro = $(this).attr('data-id_registro');
          var rubro = $(this).attr('data-rubro');
          var categoria = $(this).attr('data-categoria');
          var item = $(this).attr('data-item');

          console.log("Rubro: ",rubro);
          console.log("Categoria: ",categoria);
          console.log("Item: ",item);
          console.log("Registro: ",registro);

          $('#ingreso_rubro').val(rubro).trigger('change');
          $('#ingreso_categoria').val(categoria).trigger('change');
          $('#ingreso_item').val(item);

          $('html, body').animate({
            scrollTop: $("#tr_mostrar").offset().top
          }, 1000);

        });

        $(".numerable").each(function(){abandonar(this);});

        $('.cargar_proveedor_cotizacion').click(function(){
          var id = $(this).attr('data-id');
          console.log("Cargando modal para registro ", id);
          $.ajax({
              url:"traer_cotizaciones.php",
              method:"POST",
              data:{id:id},
              dataType:"json",
              success:function(data){
                $('#modal_cargar_proveedor').attr('data-registro', id).modal('show');
                $('#proveedores').val(data.id_proveedor);
                $('#ot').val(data.id);
                $('#tipo_item').val(data.nombre_item_cotizacion);
                $('#detalle').val(data.detalle_registro);
                $('#importe_neto').val(data.importe_total);
                $('#forma_pago_nuevo').val(data.forma_pago);
                $('#tiempo_pago').val(data.tiempo_pago);
                $('.upload_file').attr('data-default-file',data.archivo_adjunto);
                $("#tipo_factura_nuevo_registro").val(data.tipo_factura);
                $("#numero_factura_nuevo_registro").val(data.numero_factura);
                $("#fecha_facturacion").val(data.fecha_factura);
                $("#fecha_pago").val(data.fecha_pago);
                $("#importe_neto").val(data.importe_total);
                $("#iva").val(data.iva);
                $("#percepcion").val(data.percepcion);
                $("#importe_bruto").val(data.importe_bruto);
                $("#cotizacion_pagos_avatar .cotizacion_pagos_container").attr("data-id_registro", id);
                cotizacion_pagos.cargar_avatar();
              }
          });
          console.log('.editar_cotizacion[data-id='+id+']');
          cargar_editar_cotizacion(id);
        });

        $("#tipo_iva").change(function(){
          valor = $(this).val();
          importe_neto = document.getElementById('importe_neto').value;
          importe_neto = parseFloat(importe_neto);
          iva = (importe_neto*valor)/100;
          document.getElementById('iva').value = iva;
          importe_bruto = importe_neto + iva;
          $(".importe_bruto").val(importe_bruto);
        });

        $('#fecha_facturacion').change(function(){
          var fecha = document.getElementById('fecha_facturacion').value;
          var dias = document.getElementById('tiempo_pago').value;
          dias = parseFloat(dias);
          fecha_calculo = moment(fecha).add(dias, 'days').calendar();
          fecha_calculo = moment(fecha_calculo).format("L");
          console.log(fecha_calculo);
            document.getElementById('fecha_pago').value = fecha_calculo;
        });

        $('#tiempo_pago').change(function(){
          var fecha = document.getElementById('fecha_facturacion').value;
          var dias = document.getElementById('tiempo_pago').value;
          dias = parseFloat(dias);
          fecha_calculo = moment(fecha).add(dias, 'days').calendar();
          fecha_calculo = moment(fecha_calculo).format("L");
          console.log(fecha_calculo);
            document.getElementById('fecha_pago').value = fecha_calculo;
        });

        $('#proveedores').change(function(){
          id = $(this).val();
          console.log("Proveedor elegido: "+id);
          $.ajax({
            url:"cargar_proveedor.php",
            method:"POST",
            data:{id:id},
            dataType:"json",
            success:function(data){
              $('#forma_pago_nuevo').val(data.forma_pago);
              $('#tiempo_pago').val(data.tiempo_cobro);
            }
          });
        });

        $('#tipo_factura_nuevo_registro').change(function() {
          if ($('#tipo_factura_nuevo_registro').val() == 'A') {
              $('#iva').removeAttr('disabled');
              $('#tipo_iva').removeAttr('disabled');
              $('#numero_factura_nuevo_registro').removeAttr('disabled');
              $('#fecha_facturacion').removeAttr('disabled');
              $('#percepcion').removeAttr('disabled');
          } else {
              $('#iva').attr('disabled', 'disabled').val('');
              if ($('#tipo_factura_nuevo_registro').val() == 'Sin factura') {
                $('#numero_factura_nuevo_registro').attr('disabled', 'disabled').val('');
                $('#fecha_facturacion').attr('disabled', 'disabled').val('');
                $('#fecha_cobro').removeAttr('disabled');
                $('#iva').attr('disabled', 'disabled').val('');
                $('#tipo_iva').attr('disabled', 'disabled').val('');
                $('#percepcion').attr('disabled', 'disabled').val('');
              } else {
                $('#numero_factura_nuevo_registro').removeAttr('disabled');
                $('#fecha_facturacion').removeAttr('disabled');
                $('#tipo_iva').attr('disabled', 'disabled').val('');
                $('#fecha_cobro').removeAttr('disabled');
                $('#percepcion').attr('disabled', 'disabled').val('');
              }
          }
          if ($('#tipo_factura_nuevo_registro').val() == '') {
            $('#iva').attr('disabled', 'disabled').val('');
            $('#tipo_iva').attr('disabled', 'disabled').val('');
            $('#numero_factura_nuevo_registro').attr('disabled', 'disabled').val('');
              $('#fecha_facturacion').attr('disabled', 'disabled').val('');
              $('#fecha_cobro').attr('disabled', 'disabled').val('');
              $('#percepcion').attr('disabled', 'disabled').val('');
          }
        }).trigger('change'); // added trigger to calculate initial tipo_factura

        $(".upload_file").change(function(){
          var fd = new FormData();
          var files = $('.upload_file')[0].files[0];
          fd.append('file',files);
          console.log(fd);
          uploadData(fd);
        });

        function uploadData(formdata){
          $.ajax({
            url: 'subir_archivo.php',
            type: 'post',
            data: formdata,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response){
            }
          });
        }

        $("#archivo_comentario").change(function(){
          var fd = new FormData();
          var files = $('#archivo_comentario')[0].files[0];
          fd.append('file',files);
          console.log(fd);
          uploadData_comentario(fd);
        });

        function uploadData_comentario(formdata){
          $.ajax({
            url: 'subir_archivo_comentarios.php',
            type: 'post',
            data: formdata,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response){
            }
          });
        }

        


        $(document).on("change", ".sumar", function() {
          var sum = 0;
          $(".sumar").each(function(){
              sum += +$(this).val();
          });
          $(".importe_bruto").val(sum);
        });
        // Inicializa el modulo de utilidades de tabla
        utiles_tabla.set_table($("#tabla_cotizaciones td"));
        // Inicializa el modulo de plazos de pagos
        cotizacion_pagos.inicio(<?php echo $_GET['id']; ?>);
    }
    </script>

    <script>
      $('.datepicker_ff').datepicker({
        uiLibrary: 'bootstrap4',
        locale: 'es-es'
      });
      $('.datepicker_fp').datepicker({
        uiLibrary: 'bootstrap4',
        locale: 'es-es'
      });
    </script>

    <!-- Script para la carga de Cotizaciones desde Excel -->
    <script>
    /**
     * Get the URL parameters
     * source: https://css-tricks.com/snippets/javascript/get-url-variables/
     * @param  {String} url The URL
     * @return {Object}     The URL parameters
     */
/*
    var getParams = function (url) {
    	var params = {};
    	var parser = document.createElement('a');
    	parser.href = url;
    	var query = parser.search.substring(1);
    	var vars = query.split('&');
    	for (var i = 0; i < vars.length; i++) {
    		var pair = vars[i].split('=');
    		params[pair[0]] = decodeURIComponent(pair[1]);
    	}
    	return params;
    };
    // Get parameters from the current URL
    let params = getParams(window.location.href);
    let id_proyecto;
    $(document).ready(function(){
    	id_proyecto = params['id'];
    	console.log("ID del proyecto: ", id_proyecto);
    });

    */
    var X = XLSX;
    var XW = {
    	/* worker message */
    	msg: 'xlsx',
    	/* worker scripts */
    	worker: 'js/excel/xlsxworker.js'
    };

    var global_wb;

    var process_wb = (function() {

    	function desMerge(wb){
    		wb.SheetNames.forEach(function(shName){
    			var ws = wb.Sheets[shName];
    			if (ws.hasOwnProperty('!merges')){
    				var mergArr = ws['!merges'];
    				var mergResto = [];
    				console.log ("cant de merges: ", mergArr.length);
    				//console.log(XLSX.utils.decode_range(ws['!ref']));
    				mergArr.forEach(function(m){
    					//console.log(XLSX.utils.encode_range(m));
    					if (m.s.c == m.e.c){
    						for (let i=m.s.r; i<m.e.r; i++){
    							ws[XLSX.utils.encode_cell({c:m.s.c, r:i+1})] = ws[XLSX.utils.encode_cell(m.s)];
    						}
    					} else {
    						mergResto.push(m);
    					}
    				});
    				ws['!merges'] = mergResto;
    			}
    		});
    	}

    	function checkSubTotal(cadena){
    		let regexp = /.*total.*/i;
    		return regexp.test(cadena);
    	}

    	function checkRubro(rubro){
    		let url = "esta_el_rubro.php";
    		let id_rubro = "";
        let rub = /[\w]+/.test(rubro) ? rubro.trim() : "sin definir";
    		$.ajax({
    			url: url,
    			method: 'get',
    			data: {
    				rubro: rub
    			},
    			dataType: 'json',
    			async: false,
    			success: function(resp){
    				//console.log(resp);
    				id_rubro = resp[0];
    			},
    			error: function(error){
    				console.log(error);
    			}
    		});
    		return id_rubro;
    	}
      

    	function checkCategoria(categoria){
    		let url = "esta_la_categoria.php";
    		let id_categoria = "";
        let cat = /[\w]+/.test(categoria) ? categoria.trim() : "sin definir";
        //console.log("Test", categoria, cat, /[\w]+/.test(categoria));
    		$.ajax({
    			url: url,
    			method: 'get',
    			data: {
    				categoria: cat
    			},
    			dataType: 'json',
    			async: false,
    			success: function(resp){
    				//console.log(resp);
    				id_categoria = resp[0];
    			},
    			error: function(error){
    				console.log(error);
    			}
    		});
    		return id_categoria;
    	}

    	function numCondicion(strCondicion){
    		if (/^alq.*/i.test(strCondicion)) return 1;
    		else if (/^compr.*/i.test(strCondicion)) return 2;
    		else if (/^c.*ntr.*t.*/i.test(strCondicion)) return 3;
        else return "";
    	}

    	function guardarDatos(data){
        console.log("Este item ",data[2]," esta bueno? ", /[\w]+/.test(data[2]))
    		if ( checkSubTotal(data[0]) || !/[\w]+/.test(data[2]) ) {
    			console.log("Subtotal o total encontrado o linea inválida: ", data[0], data[2])
    		} else {
    			console.log("ID de rubro: ", checkRubro(data[0]));
    			console.log("ID de categoria: ", checkCategoria(data[1]));
    			console.log("Guardando a base de datos");
    			guardarCotizacion(data);
    		}
    	}

    	function guardarCotizacion(data){
    		let id_proyecto = '<?php echo $_GET['id'];?>';
    		let id_rubro = checkRubro(data[0]);
    		let id_categoria = checkCategoria(data[1]);
    		let item = data[2];
    		let condicion = numCondicion(data[3]);
    		let detalle = data[4];
    		let jornada = data[5];
    		let cantidad = data[6];
    		var importe_neto = data[7];
    		var importe_total = data[8];
    		var proveedor = '';
    		var forma_pago = '';
    		var dias_pago = 90;

    		$.ajax({
    			 url:"agregar_cotizacion_manual.php",
    			 method:"POST",
    			 data: 'proyecto='+ id_proyecto+'&rubro='+id_rubro+'&categoria='+ id_categoria+'&item='+ item+'&condicion='+ condicion+'&detalle='+ detalle+'&cantidad='+ cantidad+'&jornada='+ jornada+'&importe_neto='+ importe_neto+'&importe_total='+ importe_total+'&proveedor='+ proveedor+'&forma_pago='+ forma_pago+'&dias_pago='+ dias_pago,
    			 success:function(data){
    					console.log(data);
    				},
    				error: function(error){
    					console.log(error);
    				}
    		});
    	}

    	function buscarCotizaciones(wb){
    		wb.SheetNames.forEach(function(shName){
    			var ws = wb.Sheets[shName];
    			var ref = XLSX.utils.decode_range(ws['!ref']);
    			console.log(ref);
    			for (let row = ref.s.r; row<=ref.e.r; row++){
    				let col = 8;
    				if (typeof ws[XLSX.utils.encode_cell({c:col, r:row})] !== 'undefined'){
    					if (ws[XLSX.utils.encode_cell({c:col, r:row})].t=='n') {
    						let data = new Array(9);
    						data[8] = ws[XLSX.utils.encode_cell({c:col, r:row})].v;
    						for (let j=0; j<8; j++){
    							data[j] = typeof ws[XLSX.utils.encode_cell({c:j, r:row})] === 'undefined'? '' : ws[XLSX.utils.encode_cell({c:j, r:row})].v;
    						}
    						console.log(data.join(', '));
    						guardarDatos(data);
    					}
    				}
    			}
    		});
    	}

    	return function process_wb(wb) {
    		//console.log("id dentro de funcion ",id_proyecto);
    		console.log(wb);
    		desMerge(wb);
    		buscarCotizaciones(wb);
            $.ajax({
                url:"ajax_cotizaciones_1.php",
                method:"POST",
                data:'proyecto=<?php echo $_GET["id"]; ?>',
                success:function(data){
                    $('#tabla_cotizaciones').html(data);
                    $('#cargando').hide();
                    /*
                    if ($(data).find("tr").length>2) $('#cargaExcel').hide();
                    else $('#cargaExcel').show();*/
                    $('#cargaExcel').show();
                    MergeCommonRows($('#tabla_cotizaciones'));
                    funciones_cotizaciones();
                    boton();
                    //$('#tabla_cotizaciones .numerable').each(function(ix, tag){ abandonar(tag); });
                }
            });
    	};
    })();

    var do_file = (function() {

    	var xw = function xw(data, cb) {
    		var worker = new Worker(XW.worker);
    		worker.onmessage = function(e) {
    			switch(e.data.t) {
    				case 'ready': break;
    				case 'e': console.error(e.data.d); break;
    				case XW.msg: cb(JSON.parse(e.data.d)); break;
    			}
    		};
    		worker.postMessage({d:data,b:rABS?'binary':'array'});
    	};

    	return function do_file(files) {
    		rABS = typeof FileReader !== "undefined" && (FileReader.prototype||{}).readAsBinaryString;
    		use_worker = typeof Worker !== 'undefined';
    		var f = files[0];
    		var reader = new FileReader();
    		reader.onload = function(e) {
          $('#cargaExcel').hide();
          $('#cargando').show();
    			if(typeof console !== 'undefined') console.log("onload", new Date(), rABS, use_worker);
    			var data = e.target.result;
    			if(!rABS) data = new Uint8Array(data);
    			if(use_worker) xw(data, process_wb);
    			else process_wb(X.read(data, {type: rABS ? 'binary' : 'array'}));
    		};
    		if(rABS) reader.readAsBinaryString(f);
    		else reader.readAsArrayBuffer(f);
    	};
    })();

    (function() {
    	var drop = document.getElementById('drop');
    	if(!drop.addEventListener) return;

    	function handleDrop(e) {
    		e.stopPropagation();
    		e.preventDefault();
    		do_file(e.dataTransfer.files);
    	}

    	function handleDragover(e) {
    		e.stopPropagation();
    		e.preventDefault();
    		e.dataTransfer.dropEffect = 'copy';
    	}

    	drop.addEventListener('dragenter', handleDragover, false);
    	drop.addEventListener('dragover', handleDragover, false);
    	drop.addEventListener('drop', handleDrop, false);
    })();

    (function() {
    	var xlf = document.getElementById('xlf');
    	if(!xlf.addEventListener) return;
    	function handleFile(e) { do_file(e.target.files); }
    	xlf.addEventListener('change', handleFile, false);
    })();
    </script>
    <script>
        function getValues(data, id='') {
          var header = [];
          var lista = [];
          var mergeRubro = [];
          var mergeCategoria = [];
          var fila = 0;
          let categoria_anterior = "";
          data['orden'].forEach( col => {
            header.push(data['encabezados'][col]);
          });
          lista = [header];
          let rangoCategoria = [ 0, 0 ];
          for (let rub in data['rubros']){
            let rangoRubro = [ fila ];
            console.log("rubro: "+rub);
            let nombre = data['rubros'][rub]['nombre_catcot'];
            // Primero se guardan las cotizaciones regulares
            data['rubros'][rub]['cotizaciones'].forEach(cot => {
              let catLista = [];
              data['orden'].forEach( col => {
                  catLista.push(cot[col]);
              });
              lista.push(catLista);
              console.log(fila, catLista);
              if (cot['nombre_catcot']==categoria_anterior) {
                rangoCategoria[1]=fila;
              } else {
                mergeCategoria.push(rangoCategoria);
                rangoCategoria = [fila, fila];
                categoria_anterior = cot['nombre_catcot'];
              }
              fila++;
            });
            mergeCategoria.push(rangoCategoria);
            // Despues se agregan los adicionales
            rangoCategoria = [ fila, fila ];
            if ('adicional' in data['rubros'][rub]) {
              data['rubros'][rub]['adicional'].forEach(function(adicional) {
                lista.push([ nombre, 'adicional', adicional['item'], adicional['detalle_registro'], adicional['cantidad'], adicional['importe_neto'], adicional['importe_total'], adicional['motivo'], adicional['adicional'] ]);
                if(fila>rangoCategoria[1]) rangoCategoria[1]=fila;
                fila++;
              });
            }
            // Y finalmente el sub-total
            lista.push([ nombre, 'sub total',,,,,,, data['rubros'][rub]['sub_total'] ]);
            mergeCategoria.push(rangoCategoria);
            rangoRubro.push(fila);
            mergeRubro.push(rangoRubro);
            fila++;
          }
          console.log("rangos a unir ");
          console.log(mergeRubro);
          console.log(mergeCategoria)
          lista.push([ 'Total',,,,,,,, data['total'] ]);
          lista.push([ 'Presupuestado',,,,,,,, data['presupuestado'] ]);
          // al final de todo se agregan los datos del cliente
          lista.push([]);
          lista.push(['ID proyecto', id]);
          lista.push(['cliente', data.cliente.nombre]);
          lista.push(['razon social', data.cliente.razon_social]);
          lista.push(['cuit', data.cliente.cuit]);
          lista.push(['proyecto', data.cliente.proyecto]);
          lista.push(['producto', data.cliente.producto]);
          lista.push(['subtipo de servicio', data.cliente.servicio]);
          lista.push([,,,, 'fecha', data.fecha]);
          return {
                  'header'  : header,
                  'data'    : lista,
                  'merge'   : [mergeRubro, mergeCategoria]
                 };
        }

        function mergeToRange(merge) {
          let mergeList = [];
          merge.forEach(function(mer, ix) {
            mer.forEach(function(m) {
              if (m[0]<m[1]) mergeList.push( { s:{r:m[0]+1,c:ix}, e:{r:m[1]+1,c:ix}} );
            });
          })
          console.log(mergeList);
          return mergeList;
        }

        function aExcel(data, id) {
          //console.log(getValues(data));
          var wb = XLSX.utils.book_new();
          var tabla = getValues(data, id);
          var ws = XLSX.utils.aoa_to_sheet(tabla.data);
          console.log("por pasar el merge");
          //ws['!ref'] = "A1:Z50";
          ws['!merges'] = mergeToRange(tabla.merge);
          console.log("por agregar hoja al libro " + ws['!merges']);
          XLSX.utils.book_append_sheet(wb, ws, 'cotizaciones');

          if(typeof require !== 'undefined') XLSX = require('xlsx');
          XLSX.writeFile(wb, 'cotizaciones_'+data.cliente.nombre+'_id-'+id+'_'+data.fecha.replace(':',"'")+'.xlsx');
        }

        


        function boton(){
          let id=<?php echo $_GET['id']; ?>;

          $.ajax({
            url: "datos_tabla_cotizaciones.php",
            data: {id: id},
            method: "GET",
            dataType: "json",
            success: function(data) {
              console.log(data);
              aExcel(data, id);
              //window.location.assign("www.google.com.ar"); //<?php echo $_SERVER["HTTP_REFERER"]; ?>");
            },
            error: function(erre) {
              console.log("Error en GET a "+this.url);
              console.log(erre);
            },
            beforeSend: function() {
              console.log("Pidiendo datos...");
            }
          });
        }

        
    </script>
   
  </body>
</html>


