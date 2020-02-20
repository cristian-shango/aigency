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

    <title>AiGency | Pagos</title>

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
        <link rel="stylesheet" href="design/global/vendor/bootstrap-datepicker/bootstrap-datepicker.css">
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
    <script src="js/numeros/numeros.js" type="text/javascript"></script>
    <script src="js/numeros/factura.js" type="text/javascript"></script>

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
        <h1 class="page-title">Pagos</h1>
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
                <div>
                  <div class="example table-responsive">
                    <table class="table border-tabla" id="tabla_proveedores_confirmados"></table>
                    <input type="text" id="id_registro" data-id="<?php echo $_GET['id']; ?>" hidden>
                  </div>
                </div>
                <!-- End Example Basic Columns -->
              </div>
              <div class="col-md-3">
                <button type="button" class="btn btn-success btn-block generar_reporte"><i class="icon wb-download" aria-hidden="true"></i><strong>DESCARGAR EXCEL</strong></button>
              </div>
              <div class="col-md-7"></div>
              <div class="col-md-2">
                <button type="button" class="btn btn-danger btn-block boton_volver"><i class="icon wb-back" aria-hidden="true"></i><strong>VOLVER</strong></button>
              </div>
              <div class="col-md-12">
                <span id="tabla_reporte_generado" style="display: none;"></span>
              </div>
          </div>
        </div>
        <!-- End Panel Columns & Select -->
      </div>
    </div>
    <!-- End Page -->

    <!-- Modal Detalle de Pago a Proveedor-->
    <div class="modal fade" id="modal_detalle_pago_proveedor" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-center" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="row row-lg">
              <div class="col-md-4">
                <div class="form-group">
                    <h4>Proveedor</h4>
                    <input type="text" class="form-control" id="proveedor_modal" readonly>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                    <h4>Razón Social</h4>
                    <input type="text" class="form-control" id="razon_social_modal" readonly>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                    <h4>CUIT</h4>
                    <input type="text" class="form-control" id="cuit_modal" readonly>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <h4>OP (Orden de Pago)</h4>
                    <input type="text" class="form-control" id="op_modal" readonly>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <h4>Item</h4>
                    <input type="text" class="form-control" id="item_modal" readonly>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                    <h4>Importe Neto</h4>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">$</div>
                    </div>
                    <input type="text" class="form-control form-control-lg" id="importe_neto_modal" readonly>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                    <h4>IVA</h4>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">$</div>
                    </div>
                    <input type="text" class="form-control form-control-lg" id="iva_modal" readonly>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                    <h4>Percepción</h4>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">$</div>
                    </div>
                    <input type="text" class="form-control form-control-lg" id="percepcio_modal" readonly>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                    <h4>Importe Bruto</h4>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">$</div>
                    </div>
                    <input type="text" class="form-control form-control-lg" id="importe_bruto_modal" readonly>
                  </div>
                </div>
              </div>
              
              <div class="col-md-2">
                <div class="form-group">
                    <h4>Tipo de Factura</h4>
                    <input type="text" class="form-control" id="tipo_factura_modal" readonly>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                    <h4>Número de Factura</h4>
                    <input type="number" id="numero_factura_modal" class="form-control" readonly>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                    <h4>Fecha de Factura</h4>
                    <input type="text" id="fecha_factura_modal" class="form-control" readonly>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                    <h4>Tiempo de Pago</h4>
                    <div class="input-group">
                      <input type="text" id="tiempo_pago_modal" class="form-control" readonly>
                      <div class="input-group-prepend">
                        <div class="input-group-text">&nbsp;días</div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                    <h4>Fecha de Pago</h4>
                    <input type="text" id="fecha_pago_modal" class="form-control" readonly>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                    <h4>Forma de Pago</h4>
                    <input type="text" id="forma_pago_modal" class="form-control" readonly>
                </div>
              </div>
            </div>
            <hr />
            <!-- CHEQUE -->
            <div id="formulario_cheque" style="display: none;">
              <div class="row">
                <div class="col-md-12 border-bottom">
                  <h3>Datos de Cheque</h3>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <h4>Monto Pagado</h4>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">$</div>
                      </div>
                      <input type="text" class="form-control form-control-lg sumar" id="monto_pagado_cheque">
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <h4>Monto Retenido</h4>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">$</div>
                      </div>
                      <input type="text" class="form-control form-control-lg sumar" id="monto_retenido_cheque">
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <h4>Monto Total</h4>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">$</div>
                      </div>
                      <input type="text" class="form-control form-control-lg sumar" id="monto_total_cheque">
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <h4>Banco Origen</h4>
                    <select class="form-control" id="forma_pago_nuevo">
                        <option value="">Seleccionar</option>
                      <?php
                      // Attempt select query execution
                      $sql_banco = "SELECT * FROM bancos ORDER BY nombre";
                      mysql_query("SET NAMES 'utf8'");
                      if($result_banco = mysqli_query($conexion, $sql_banco)){
                          if(mysqli_num_rows($result_banco) > 0){
                              $i = 0;
                              while($row_banco = mysqli_fetch_array($result_banco)){
                                ?>
                                  <option value="<?php echo ($row_banco['id_banco']);?>"><?php echo (utf8_encode($row_banco['nombre']));?></option>
                                <?php
                              }
                              // Free result set
                              mysqli_free_result($result_banco);
                          } else{
                              echo "No hay datos para mostrar.";
                          }
                      } else{
                          echo "ERROR: Could not able to execute $sql_banco. " . mysqli_error($conexion);
                      }
                    ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                      <h4>Número de Cheque</h4>
                      <input type="number" id="numero_factura_nuevo_registro" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <h4>Tipo de Cheque</h4>
                    <select class="form-control" id="forma_pago_nuevo">
                      <option value="">Seleccionar</option>
                      <option value="1">Diferido</option>
                      <option value="1">Al Día</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                      <h4>Fecha Cheque</h4>
                      <input type="date" id="emision_transferencia" class="form-control datepicker_ff"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <h4>Fecha de Pago</h4>
                      <input type="date" id="ejecucion_transferencia" class="form-control datepicker_ff"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="checkbox-custom checkbox-primary">
                    <input type="checkbox" id="inputChecked" checked="">
                    <label for="inputChecked">Cruzado</label>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="checkbox-custom checkbox-primary">
                    <input type="checkbox" id="inputChecked" checked="">
                    <label for="inputChecked">A la Órden</label>
                  </div>
                </div>
              </div>
            </div>
            <!-- CHEQUE -->
            <!-- TRANSFERENCIA -->
            <div id="formulario_transferencia">
              <div class="row">
                <div class="col-md-12 border-bottom">
                  <h3>Datos de Transferencia Bancaria</h3>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <h4>Banco Origen</h4>
                      <select class="form-control" id="banco_origen_transferencia">
                          <option value="">Seleccionar</option>
                        <?php
                        // Attempt select query execution
                        $sql_banco = "SELECT * FROM bancos ORDER BY nombre";
                        mysql_query("SET NAMES 'utf8'");
                        if($result_banco = mysqli_query($conexion, $sql_banco)){
                            if(mysqli_num_rows($result_banco) > 0){
                                $i = 0;
                                while($row_banco = mysqli_fetch_array($result_banco)){
                                  ?>
                                    <option value="<?php echo ($row_banco['id_banco']);?>"><?php echo (utf8_encode($row_banco['nombre']));?></option>
                                  <?php
                                }
                                // Free result set
                                mysqli_free_result($result_banco);
                            } else{
                                echo "No hay datos para mostrar.";
                            }
                        } else{
                            echo "ERROR: Could not able to execute $sql_banco. " . mysqli_error($conexion);
                        }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <h4>Banco Destino</h4>
                      <select class="form-control" id="banco_destino_transferencia">
                          <option value="">Seleccionar</option>
                        <?php
                        // Attempt select query execution
                        $sql_banco = "SELECT * FROM bancos ORDER BY nombre";
                        mysql_query("SET NAMES 'utf8'");
                        if($result_banco = mysqli_query($conexion, $sql_banco)){
                            if(mysqli_num_rows($result_banco) > 0){
                                $i = 0;
                                while($row_banco = mysqli_fetch_array($result_banco)){
                                  ?>
                                    <option value="<?php echo ($row_banco['id_banco']);?>"><?php echo (utf8_encode($row_banco['nombre']));?></option>
                                  <?php
                                }
                                // Free result set
                                mysqli_free_result($result_banco);
                            } else{
                                echo "No hay datos para mostrar.";
                            }
                        } else{
                            echo "ERROR: Could not able to execute $sql_banco. " . mysqli_error($conexion);
                        }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <h4>Emisión Transferencia</h4>
                      <input type="text" id="emision_transferencia" class="form-control datepicker_ff"  aria-label="Default" aria-describedby="inputGroup-sizing-default"data-plugin="datepicker">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <h4>Ejecución Transferencia</h4>
                      <input type="text" id="ejecucion_transferencia" class="form-control datepicker_ff"  aria-label="Default" aria-describedby="inputGroup-sizing-default"data-plugin="datepicker">
                  </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                    <h4>Importe Bruto a Transferir</h4>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">$</div>
                    </div>
                    <input type="text" class="form-control form-control-lg" id="importe_bruto_transferencia">
                  </div>
                </div>
              </div>
              </div>
            </div>
            <!-- TRANSFERENCIA -->

            <hr />
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                    <h4>Observaciones</h4>
                    <textarea row="8" id="observaciones_modal" class="form-control" readonly></textarea>
                </div>
              </div>
              <br />
              <div class="col-md-12" id="mostrar_archivo_adjunto">
                <h4><a href="" target="_blank" id="archivo_adjunto"><i class="icon wb-file" aria-hidden="true" style="font-size: 20px;"></i>VER FACTURA ADJUNTA</a></h4>
              </div>
              <div class="col-md-3">
                <button type="button" class="btn btn-danger btn-block definir_pago" data-pago="PP"><strong>POR PAGAR</strong></button>
              </div>

              <div class="col-md-3">
                <button type="button" class="btn btn-warning btn-block definir_pago" data-pago="PD"><strong>PAGO DEMORADO</strong></button>
              </div>

              <div class="col-md-4">
                <button type="button" class="btn btn-success btn-block definir_pago" data-pago="PC"><strong>PAGO CONFIRMADO</strong></button>
              </div>

              <div class="col-md-2">
                <button type="button" class="btn btn-default btn-block definir_pago" data-dismiss="modal"><strong>CERRAR</strong></button>
              </div>
              <span style="margin-bottom: 1em;"></span>
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
        <script src="design/global/vendor/bootstrap-datepicker/bootstrap-datepicker.js"></script>
        <script src="design/global/vendor/dropify/dropify.min.js"></script>


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
        let id = '<?php echo $_GET['id'];?>';
        console.log(id);
        $.ajax({
            type: "GET",
            url:"ajax/mostrar_proveedores_confirmados.php?id="+id,
            success:function(data){
                $('#tabla_proveedores_confirmados').html(data);
                funciones_pagos();
                console.log("Ejecuto función funciones_pagos");
            }
        });
      });
    </script>

    <script type="text/javascript">
      function funciones_pagos(){ 

        MergeCommonRows_pagos($('#tabla_proveedores_confirmados'));

        $(".ver_proveedores").click(function() {
            id = $(this).data("id");
            window.location = "pago_proveedores.php?id="+id;
        });
        asociareventonumerable();
        $(".numerable").each(function(){abandonar(this);});

        $(".ver_factura").click(function() {
          archivo = $(this).data("id");
          console.log("Muestro factura: ",archivo);
        });

        $(".boton_volver").click(function() {
          window.location = document.referrer;
        });



        $(".generar_reporte").click(function() { 
          let id = '<?php echo $_GET['id'];?>';
          let cliente = $(".tr_cliente").data("cliente");
          console.log(cliente);
          $.ajax({
            type: "GET",
            url:"ajax/reporte_mostrar_pagos_proveedores.php?id="+id,
            success:function(data){
              console.log(data);
              $('#tabla_reporte_generado').html(data);
              let excel_data = $('#tabla_reporte_generado').html();  
              let page = "generar_excel.php?data=" + excel_data + "&filename="+cliente+"_reporte_pago_a_proveedores.xls";  
              window.location = page;
              //MergeCommonRows_pagos($('#tabla_reporte_generado'));
              //$('#modal_reporte_generado').modal('show');
            }
          });
        });

        $(".definir_pago").click(function() {
          id = $(this).data("pago");
          tipo_pago = $(this).data("tipo_pago");
          console.log("Gestion pago: ",id);
          console.log("Tipo de pago: ",tipo_pago);
          // Agarro todos los inputs, de todos los tipos de pago y en el AJAX proceso dependiendo el tipo de pago que haya elegido.

        });

        /*$(".descargar_reporte").click(function() {
          console.log("Genero Excel");
          let excel_data = $('#tabla_reporte_generado').html();  
          let page = "generar_excel.php?data=" + excel_data + "&filename=reporte_pago_a_proveedores.xls";  
          window.location = page;
        }); */       

        $(".ver_modal_proveedor").click(function() {
          id = $(this).data("id");
          //window.location = "pago_proveedores_detalle.php?id="+id;
          console.log("Muestro modal: ",id);
          $.ajax({
            type: "GET",
            url:"ajax/detalle_proveedor_confirmado.php",
            method:"POST",
            data:{id:id},
            dataType:"json",
            success:function(data){
              $("#op_modal").val('');
              $("#item_modal").val('');
              $("#proveedor_modal").val('');
              $("#razon_social_modal").val('');
              $("#cuit_modal").val('');
              $("#importe_neto_modal").val('');
              $("#iva_modal").val('');
              $("#percepcion_modal").val('');
              $("#importe_bruto_modal").val('');
              $("#tipo_factura_modal").val('');
              $("#numero_factura_modal").val('');
              $("#fecha_factura_modal").val('');
              $("#tiempo_pago_modal").val('');
              $("#fecha_pago_modal").val('');
              $("#forma_pago_modal").val('');

              $("#item_modal").val(data.nombre_item_cotizacion);
              $('#modal_detalle_pago_proveedor').modal('show');
              $("#op_modal").val(data.id_factura_cotizacion);
              $("#proveedor_modal").val(data.contacto);
              $("#razon_social_modal").val(data.razon_social_proveedor);
              $("#cuit_modal").val(data.cuit);
              $("#importe_neto_modal").val(data.importe_neto_cotizacion);
              $("#iva_modal").val(data.iva_cotizacion);
              $("#percepcion_modal").val(data.percepcion_cotizacion);
              $("#importe_bruto_modal").val(data.importe_bruto_cotizacion);
              $("#tipo_factura_modal").val(data.tipo_factura);
              $("#numero_factura_modal").val(data.numero_factura_cotizacion);
              $("#fecha_factura_modal").val(data.fecha_factura_cotizacion);
              $("#tiempo_pago_modal").val(data.tiempo_pago_cotizacion);
              $("#fecha_pago_modal").val(data.fecha_pago_cotizacion);
              $("#forma_pago_modal").val(data.tipo);

              var tipo_de_pago_switch = data.id_forma_pago_cotizacion;
              console.log(tipo_de_pago_switch);

              if (tipo_de_pago_switch == 1){
                console.log("Pago en Efectivo");
                $("#formulario_efectivo").css("display", "block");
                $("#formulario_transferencia").css("display", "none");
                $("#formulario_cheque").css("display", "none");
              }
              if (tipo_de_pago_switch == 2){
                console.log("Pago con Transferencia");
                $("#formulario_cheque").css("display", "none");
                $("#formulario_transferencia").css("display", "block");
                $(".definir_pago").attr("data-tipo_pago", "TR");
              }

              if (tipo_de_pago_switch == 3){
                console.log("Pago con Cheque");
                $("#formulario_transferencia").css("display", "none");
                $("#formulario_cheque").css("display", "block");
                $(".definir_pago").attr("data-tipo_pago", "CH");
                $("#monto_pagado_cheque").val(data.importe_bruto_cotizacion);
                $("#monto_total_cheque").val(data.importe_bruto_cotizacion);
              }

              if (tipo_de_pago_switch == 4){
                console.log("Pago Contrafactura");
                $("#formulario_contrafactura").css("display", "block");
                $("#formulario_transferencia").css("display", "none");
                $("#formulario_cheque").css("display", "none");
              }

              if (tipo_de_pago_switch == 5){
                console.log("Pago con MercadoPago");
                $("#formulario_mercadopago").css("display", "block");
                $("#formulario_transferencia").css("display", "none");
                $("#formulario_cheque").css("display", "none");
              }

              if (tipo_de_pago_switch == 6){
                console.log("Pago con PayPal");
                $("#formulario_paypal").css("display", "block");
                $("#formulario_transferencia").css("display", "none");
                $("#formulario_cheque").css("display", "none");
              }

              if (tipo_de_pago_switch == 7){
                console.log("Pago con Otro medio");
                $("#formulario_otro_medio").css("display", "block");
                $("#formulario_transferencia").css("display", "none");
                $("#formulario_cheque").css("display", "none");
              }

              if (tipo_de_pago_switch == 8){
                console.log("Pago de Caja Chica");
                $("#formulario_caja_chica").css("display", "block");
                $("#formulario_transferencia").css("display", "none");
                $("#formulario_cheque").css("display", "none");
              }
            }
          });
        });

        
      };

      function MergeCommonRows_pagos(table, firstOnly) {
        var firstColumnBrakes = [];   
        for(var i=2; i<=5; i++){
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

    </script>
  </body>
</html>
