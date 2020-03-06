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
                    <input type="text" class="form-control" id="item_modal_id" readonly hidden>
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
            <div class="row">
              <div class="col-md-3">
                <div class="form-group" id="forma_pago_aplicada_">
                  <h4>Forma de Pago aplicada</h4>
                  <select class="form-control form-control-lg" id="forma_pago_aplicada">
                    <option value="">Seleccionar</option>
                    <?php
                      // Attempt select query execution
                      $sql1 = "SELECT * FROM forma_pago ORDER BY tipo";
                      mysql_query("SET NAMES 'utf8'");
                      if($result1 = mysqli_query($conexion, $sql1)){
                          if(mysqli_num_rows($result1) > 0){
                              $i = 0;
                              while($row1 = mysqli_fetch_array($result1)){
                                ?>
                                  <option value="<?php echo ($row1['indice_forma_pago']);?>"><?php echo (utf8_encode($row1['tipo']));?></option>
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
            </div>
            <!-- RETENCIONES -->
            <div id="formulario_retenciones" class="retenciones">
              <hr />
              <div class="row">
                <div class="col-md-12 border-bottom">
                  <h3>Retenciones</h3>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <h4>Ganancias</h4>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">$</div>
                      </div>
                      <input type="text" class="form-control form-control-lg" id="ganancias_pp" oninput="calcular_retenciones();" value="0">
                      <input type="text" class="form-control form-control-lg" id="monto_total_oculto" hidden>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <h4>IIBB</h4>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">$</div>
                      </div>
                      <input type="text" class="form-control form-control-lg" id="iibb_pp" oninput="calcular_retenciones();" value="0">
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <h4>Seguridad Social</h4>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">$</div>
                      </div>
                      <input type="text" class="form-control form-control-lg" id="segsoc_pp" oninput="calcular_retenciones();" value="0">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- RETENCIONES -->

            <!-- CHEQUE -->
            <div id="formulario_cheque" class="formularios ch">
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
                      <input type="text" class="form-control form-control-lg monto_pagado_pp_ch limpiar">
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
                      <input type="text" class="form-control form-control-lg monto_retenido_pp_ch limpiar">
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
                      <input type="text" class="form-control form-control-lg monto_total_pp_ch limpiar monto_total_resultado">
                    </div>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <h4>Banco Origen</h4>
                    <select class="form-control form-control-lg id_banco_origen_pp_ch limpiar">
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
                      <input type="number" class="form-control form-control-lg numero_cheque_pp_ch limpiar" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <h4>Tipo de Cheque</h4>
                    <select class="form-control form-control-lg tipo_cheque_pp_ch limpiar">
                      <option value="">Seleccionar</option>
                      <option value="0">Diferido</option>
                      <option value="1">Al Día</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                      <h4>Fecha Cheque</h4>
                      <input type="date" class="form-control form-control-lg fecha_cheque_pp_ch limpiar"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                      <h4>Fecha de Pago</h4>
                      <input type="date" class="form-control form-control-lg fecha_pago_pp_ch limpiar"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                  </div>
                </div>
                <div class="col-md-2" style="padding-top: 2em;">
                  <div class="checkbox-custom checkbox-primary">
                    <input type="checkbox" id="cruzado_cheque_pp" class="cruzado_cheque_pp_ch limpiar" checked="">
                    <label for="cruzado_cheque_pp">Cruzado</label>
                  </div>
                  <div class="checkbox-custom checkbox-primary">
                    <input type="checkbox" id="orden_cheque_pp" class="orden_cheque_pp_ch limpiar" checked="">
                    <label for="orden_cheque_pp">A la Órden</label>
                  </div>
                </div>
              </div>
            </div>
            <!-- CHEQUE -->

            <!-- TRANSFERENCIA -->
            <div id="formulario_transferencia" class="formularios tr">
              <div class="row">
                <div class="col-md-12 border-bottom">
                  <h3>Datos de Transferencia Bancaria</h3>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <h4>Banco Origen</h4>
                      <select class="form-control form-control-lg id_banco_origen_pp_tr limpiar">
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
                      <select class="form-control form-control-lg id_banco_destino_pp_tr limpiar">
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
                      <input type="date" class="form-control form-control-lg fecha_emision_pp_tr limpiar"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <h4>Ejecución Transferencia</h4>
                      <input type="date" class="form-control form-control-lg fecha_ejecucion_pp_tr limpiar"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <h4>Importe Bruto a Transferir</h4>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">$</div>
                      </div>
                      <input type="text" class="form-control form-control-lg monto_total_pp_tr limpiar monto_total_resultado">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <h4>CBU / ALIAS</h4>
                      <input type="text" class="form-control form-control-lg cbu_alias_pp_tr limpiar" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                  </div>
                </div>
              </div>
            </div>
            <!-- TRANSFERENCIA -->

            <!-- EFECTIVO -->
            <div id="formulario_efectivo" class="formularios ef">
              <div class="row">
                <div class="col-md-12 border-bottom">
                  <h3>Datos de Pago en Efectivo</h3>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <h4>Importe a Pagar</h4>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">$</div>
                      </div>
                      <input type="text" class="form-control form-control-lg monto_total_pp_ef limpiar monto_total_resultado">
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <h4>Fecha de Pago</h4>
                      <input type="date" class="form-control form-control-lg fecha_pago_pp_ef limpiar"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                  </div>
                </div>
              </div>
            </div>
            <!-- EFECTIVO -->

            <!-- TARJETA CREDITO -->
            <div id="formulario_tarjeta_credito" class="formularios tc">
              <div class="row">
                <div class="col-md-12 border-bottom">
                  <h3>Datos de Pago con Tarjeta de Crédito</h3>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <h4>Tarjeta de Crédito</h4>
                    <select class="form-control form-control-lg id_tarjeta_credito_pp_tc limpiar">
                        <option value="">Seleccionar</option>
                      <?php
                      // Attempt select query execution
                      $sql_tarjeta_credito = "SELECT * FROM tarjetas_credito tc LEFT JOIN bancos b ON tc.id_banco_tarjeta_credito = b.id_banco  ORDER BY nombre";
                      mysql_query("SET NAMES 'utf8'");
                      if($result_tarjeta_credito = mysqli_query($conexion, $sql_tarjeta_credito)){
                          if(mysqli_num_rows($result_tarjeta_credito) > 0){
                              $i = 0;
                              while($row_tarjeta_credito = mysqli_fetch_array($result_tarjeta_credito)){
                                ?>
                                  <option value="<?php echo ($row_tarjeta_credito['id_tarjeta_credito']);?>"><?php echo (utf8_encode($row_tarjeta_credito['nombre']));?> | <?php echo (utf8_encode($row_tarjeta_credito['tipo_tarjeta_credito']));?></option>
                                <?php
                              }
                              // Free result set
                              mysqli_free_result($result_tarjeta_credito);
                          } else{
                              echo "No hay datos para mostrar.";
                          }
                      } else{
                          echo "ERROR: Could not able to execute $sql_tarjeta_credito. " . mysqli_error($conexion);
                      }
                    ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <h4>Importe a Pagar</h4>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">$</div>
                      </div>
                      <input type="text" class="form-control form-control-lg monto_total_pp_tc limpiar monto_total_resultado">
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <h4>Cuotas</h4>
                    <select class="form-control form-control-lg cuotas_tarjeta_pp_tc limpiar">
                      <option value="">Seleccionar</option>
                      <option value="1">1 cuota</option>
                      <option value="2">2 cuotas</option>
                      <option value="3">3 cuotas</option>
                      <option value="6">6 cuotas</option>
                      <option value="9">9 cuotas</option>
                      <option value="12">12 cuotas</option>
                      <option value="18">18 cuotas</option>
                      <option value="24">24 cuotas</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <h4>Fecha de Pago</h4>
                      <input type="date" class="form-control form-control-lg fecha_pago_pp_tc limpiar"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                  </div>
                </div>

              </div>
            </div>
            <!-- TARJETA CREDITO -->

            <!-- DEBITO AUTOMATICO -->
            <div id="formulario_debito" class="formularios da">
              <div class="row">
                <div class="col-md-12 border-bottom">
                  <h3>Datos de Débito Automático</h3>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <h4>Tarjeta de Crédito</h4>
                    <select class="form-control form-control-lg id_tarjeta_credito_pp_da limpiar">
                        <option value="">Seleccionar</option>
                      <?php
                      // Attempt select query execution
                      $sql_tarjeta_credito = "SELECT * FROM tarjetas_credito tc LEFT JOIN bancos b ON tc.id_banco_tarjeta_credito = b.id_banco  ORDER BY nombre";
                      mysql_query("SET NAMES 'utf8'");
                      if($result_tarjeta_credito = mysqli_query($conexion, $sql_tarjeta_credito)){
                          if(mysqli_num_rows($result_tarjeta_credito) > 0){
                              $i = 0;
                              while($row_tarjeta_credito = mysqli_fetch_array($result_tarjeta_credito)){
                                ?>
                                  <option value="<?php echo ($row_tarjeta_credito['id_tarjeta_credito']);?>"><?php echo (utf8_encode($row_tarjeta_credito['nombre']));?> | <?php echo (utf8_encode($row_tarjeta_credito['tipo_tarjeta_credito']));?></option>
                                <?php
                              }
                              // Free result set
                              mysqli_free_result($result_tarjeta_credito);
                          } else{
                              echo "No hay datos para mostrar.";
                          }
                      } else{
                          echo "ERROR: Could not able to execute $sql_tarjeta_credito. " . mysqli_error($conexion);
                      }
                    ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <h4>Importe a Pagar</h4>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">$</div>
                      </div>
                      <input type="text" class="form-control form-control-lg monto_total_pp_da limpiar monto_total_resultado">
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <h4>Fecha de Pago</h4>
                      <input type="date" class="form-control form-control-lg fecha_pago_pp_da limpiar"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <h4>Tiempo de Renovación</h4>
                      <div class="input-group">
                        <input type="text" class="form-control form-control-lg tiempo_pp_da limpiar">
                        <div class="input-group-prepend">
                          <div class="input-group-text">&nbsp;meses</div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- DEBITO AUTOMATICO -->

            <!-- MERCADOPAGO -->
            <div id="formulario_mercadopago" class="formularios mp">
              <div class="row">
                <div class="col-md-12 border-bottom">
                  <h3>Datos de MercadoPago</h3>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <h4>Importe a Pagar</h4>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">$</div>
                      </div>
                      <input type="text" class="form-control form-control-lg monto_total_pp_mp limpiar monto_total_resultado">
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <h4>Fecha de Pago</h4>
                      <input type="date" class="form-control form-control-lg fecha_pago_pp_mp limpiar"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <h4>Nombre de Usuario</h4>
                    <input type="text" class="form-control form-control-lg usuario_pp_mp limpiar">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <h4>Tarjeta de Crédito utilizada</h4>
                    <select class="form-control form-control-lg id_tarjeta_credito_pp_mp limpiar">
                        <option value="">Seleccionar</option>
                      <?php
                      // Attempt select query execution
                      $sql_tarjeta_credito = "SELECT * FROM tarjetas_credito tc LEFT JOIN bancos b ON tc.id_banco_tarjeta_credito = b.id_banco  ORDER BY nombre";
                      mysql_query("SET NAMES 'utf8'");
                      if($result_tarjeta_credito = mysqli_query($conexion, $sql_tarjeta_credito)){
                          if(mysqli_num_rows($result_tarjeta_credito) > 0){
                              $i = 0;
                              while($row_tarjeta_credito = mysqli_fetch_array($result_tarjeta_credito)){
                                ?>
                                  <option value="<?php echo ($row_tarjeta_credito['id_tarjeta_credito']);?>"><?php echo (utf8_encode($row_tarjeta_credito['nombre']));?> | <?php echo (utf8_encode($row_tarjeta_credito['tipo_tarjeta_credito']));?></option>
                                <?php
                              }
                              // Free result set
                              mysqli_free_result($result_tarjeta_credito);
                          } else{
                              echo "No hay datos para mostrar.";
                          }
                      } else{
                          echo "ERROR: Could not able to execute $sql_tarjeta_credito. " . mysqli_error($conexion);
                      }
                    ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <!-- MERCADOPAGO -->

            <!-- PAYPAL -->
            <div id="formulario_paypal" class="formularios pp">
              <div class="row">
                <div class="col-md-12 border-bottom">
                  <h3>Datos de PayPal</h3>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <h4>Importe a Pagar</h4>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">$</div>
                      </div>
                      <input type="text" class="form-control form-control-lg monto_total_pp_pp limpiar monto_total_resultado">
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <h4>Fecha de Pago</h4>
                      <input type="date" class="form-control form-control-lg fecha_pago_pp_pp limpiar" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <h4>Nombre de Usuario</h4>
                    <input type="text" class="form-control form-control-lg usuario_pp_pp limpiar">
                  </div>
                </div>
              </div>
            </div>
            <!-- PAYPAL -->

            <!-- CONTRAFACTURA -->
            <div id="formulario_contrafactura" class="formularios cf">
              <div class="row">
                <div class="col-md-12 border-bottom">
                  <h3>Datos de Contrafactura</h3>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <h4>Importe a Pagar</h4>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">$</div>
                      </div>
                      <input type="text" class="form-control form-control-lg monto_total_pp_cf limpiar monto_total_resultado">
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <h4>Fecha de entrega de Factura</h4>
                      <input type="date" class="form-control form-control-lg fecha_pago_pp_cf limpiar"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                  </div>
                </div>
              </div>
            </div>
            <!-- CONTRAFACTURA -->
            <hr />
            <div class="row">
              <div class="col-md-12">
                <table class="table border-tabla" id="tabla_pago_proveedores_confirmados"></table>
              </div>
            </div>
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
              <!-- <div class="col-md-3">
                <button type="button" class="btn btn-danger btn-block definir_pago" data-pago="PP"><strong>PAGO PARCIAL</strong></button>
              </div> -->

              <div class="col-md-6">
                <button type="button" class="btn btn-success btn-block definir_pago" data-pago="PC"><i class="wb-check"></i>&nbsp;<strong>PAGAR</strong></button>
              </div>
              <div class="col-md-4">
                <button type="button" class="btn btn-warning btn-block definir_pago" data-pago="PD"><i class="wb-time"></i>&nbsp;<strong>PAGO DEMORADO</strong></button>
              </div>

              <div class="col-md-2">
                <button type="button" class="btn btn-default btn-block" data-dismiss="modal"><strong>CERRAR</strong></button>
              </div>
              <span style="padding-bottom: 1em;">&nbsp;</span>
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
          $(this).prop('disabled', false);
          event.preventDefault();

        	let id_registro_pp = "";
    			let id_factura_pp = "";
    			let id_proyecto_pp = "";
    			let estado_pp = "";
    			let monto_pagado_pp = "";
    			let monto_retenido_pp = "";
    			let monto_total_pp = "";
    			let id_banco_origen_pp = "";
    			let id_banco_destino_pp = "";
    			let numero_cheque_pp = "";
    			let tipo_cheque_pp = "";
    			let fecha_cheque_pp = "";
    			let fecha_pago_pp = "";
    			let cruzado_cheque_pp = "";
    			let orden_cheque_pp = "";
    			let fecha_emision_pp = "";
    			let fecha_ejecucion_pp = "";
    			let cbu_alias_pp = "";
    			let id_tarjeta_credito_pp = "";
    			let cuotas_tarjeta_pp = "";
    			let tiempo_pp = "";
    			let usuario_pp = "";
    			let adjunto_pp = "";

          let ganancias_pp = "";
          let iibb_pp = "";
          let segsoc_pp = "";

        	tipo_pago_elegido = $(this).data("tipo_pago");
        	id_factura_pp = $("#op_modal").val();
          id_registro_pp = $("#item_modal_id").val();
			    id_proyecto_pp = $(".id_proyecto_pp").val();
			    estado_pp = $(this).data("pago");

        	switch (tipo_pago_elegido){
        		case "mp":
        			usuario_pp = $(".usuario_pp_mp").val();	
        			id_tarjeta_credito_pp = $(".id_tarjeta_credito_pp_mp").val();
        			monto_total_pp = $(".monto_total_pp_mp").val();
        			fecha_pago_pp = $(".fecha_pago_pp_mp").val();
        		break;

        		case "ef":
        			monto_total_pp = $(".monto_total_pp_ef").val();
        			fecha_pago_pp = $(".fecha_pago_pp_ef").val();
        		break;

        		case "tr":
        			id_banco_origen_pp = $(".id_banco_origen_pp_tr").val();
        			id_banco_destino_pp = $(".id_banco_destino_pp_tr").val();
        		  fecha_emision_pp = $(".fecha_emision_pp_tr").val();
					    fecha_ejecucion_pp = $(".fecha_ejecucion_pp_tr").val();
					    monto_total_pp = $(".monto_total_pp_tr").val();
					    cbu_alias_pp = $(".cbu_alias_pp_tr").val();
        		break;

        		case "ch":
        			monto_pagado_pp = $(".monto_pagado_pp_ch").val();
    					monto_retenido_pp = $(".monto_retenido_pp_ch").val();
    					monto_total_pp = $(".monto_total_pp_ch").val();
    					id_banco_origen_pp = $(".id_banco_origen_pp_ch").val();		
    					numero_cheque_pp = $(".numero_cheque_pp_ch").val();
    					tipo_cheque_pp = $(".tipo_cheque_pp_ch").val();
    					fecha_cheque_pp = $(".fecha_cheque_pp_ch").val();
    					fecha_pago_pp = $(".fecha_pago_pp_ch").val();
    					cruzado_cheque_pp = $(".cruzado_cheque_pp_ch").val();
    					orden_cheque_pp = $(".orden_cheque_pp_ch").val();
        		break;

        		case "cf":
        			monto_total_pp = $(".monto_total_pp_cf").val();
        			fecha_pago_pp = $(".fecha_pago_pp_cf").val();
        		break;

        		case "pp":
        			usuario_pp = $(".usuario_pp_pp").val();
        			monto_total_pp = $(".monto_total_pp_pp").val();
        			fecha_pago_pp = $(".fecha_pago_pp_pp").val();
        		break;

        		case "tc":
        			id_tarjeta_credito_pp = $(".id_tarjeta_credito_pp_tc").val();
        			monto_total_pp = $(".monto_total_pp_tc").val();
        			cuotas_tarjeta_pp = $(".cuotas_tarjeta_pp_tc").val();
        			fecha_pago_pp = $(".fecha_pago_pp_tc").val();
        		break;

        		case "da":
        			id_tarjeta_credito_pp = $(".id_tarjeta_credito_pp_da").val();
        			monto_total_pp = $(".monto_total_pp_da").val();
        			fecha_pago_pp = $(".fecha_pago_pp_da").val();
        			tiempo_pp = $(".tiempo_pp_da").val();
        		break;

        	};

          importe_bruto_modal = $("#importe_bruto_modal").val();
          importe_bruto_modal = Number(importe_bruto_modal);

          // RETENCIONES

          ganancias_pp = $("#ganancias_pp").val();
          iibb_pp = $("#iibb_pp").val();
          segsoc_pp = $("#segsoc_pp").val();

          //

          importe_bruto_retenciones = Number(monto_total_pp) + Number(ganancias_pp) + Number(iibb_pp) + Number(segsoc_pp);

          console.log("El importe bruto: ",importe_bruto_modal, " deberia ser igual a: ",importe_bruto_retenciones);

          if (importe_bruto_retenciones == importe_bruto_modal){
            console.log("Pago total / confirmado");
            estado_pp = "PC";
          } else {
            console.log("Pago Parcial");
            estado_pp = "PP";
          }


          

          console.log("Gestion pago: ",id_factura_pp);
          console.log("Tipo de pago: ",tipo_pago_elegido);
          // Agarro todos los inputs, de todos los tipos de pago y en el AJAX proceso dependiendo el tipo de pago que haya elegido.

        	$.ajax({
  				url:"ajax/guardar_pago_proveedor_factura.php",
  				method:"POST",

  				data: 'id_registro_pp=' + id_registro_pp + '&id_factura_pp=' + id_factura_pp + '&id_proyecto_pp=' + id_proyecto_pp + '&estado_pp=' + estado_pp + '&monto_pagado_pp=' + monto_pagado_pp + '&monto_retenido_pp=' + monto_retenido_pp + '&monto_total_pp=' + monto_total_pp + '&id_banco_origen_pp=' + id_banco_origen_pp + '&id_banco_destino_pp=' + id_banco_destino_pp + '&numero_cheque_pp=' + numero_cheque_pp + '&tipo_cheque_pp=' + tipo_cheque_pp + '&fecha_cheque_pp=' + fecha_cheque_pp + '&fecha_pago_pp=' + fecha_pago_pp + '&cruzado_cheque_pp=' + cruzado_cheque_pp + '&orden_cheque_pp=' + orden_cheque_pp + '&fecha_emision_pp=' + fecha_emision_pp + '&fecha_ejecucion_pp=' + fecha_ejecucion_pp + '&cbu_alias_pp=' + cbu_alias_pp + '&id_tarjeta_credito_pp=' + id_tarjeta_credito_pp + '&cuotas_tarjeta_pp=' + cuotas_tarjeta_pp + '&tiempo_pp=' + tiempo_pp + '&usuario_pp=' + usuario_pp + '&tipo_pago_elegido=' + tipo_pago_elegido + '&ganancias_pp=' + ganancias_pp + '&iibb_pp=' + iibb_pp + '&segsoc_pp=' + segsoc_pp,
    				success:function(data){
    					$('#modal_detalle_pago_proveedor').modal('hide');
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
    				}
  			   });
        $(this).prop('disabled', true);
        });

        /*$(".descargar_reporte").click(function() {
          console.log("Genero Excel");
          let excel_data = $('#tabla_reporte_generado').html();  
          let page = "generar_excel.php?data=" + excel_data + "&filename=reporte_pago_a_proveedores.xls";  
          window.location = page;
        }); */ 

        $("#forma_pago_aplicada").change(function(){
          $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            pago_factura = 0;
            importe_bruto = 0;
            calculo_saldo_factura = 0;
            console.log(optionValue);

            pago_factura = $("#total_pago_factura").text();
            pago_factura = pago_factura.split('.').join("");
            console.log(pago_factura);
            importe_bruto = $("#importe_bruto_modal").val();
            importe_bruto = parseFloat(importe_bruto);
            calculo_saldo_factura = importe_bruto - pago_factura;

            if(optionValue){
                console.log("Muestro formulario: .",optionValue);
                $(".formularios").hide();
                $("." + optionValue).show();
                $(".definir_pago").attr("data-tipo_pago", optionValue);
                $(".limpiar").val('');
                $(".monto_total_pp_"+optionValue).val(calculo_saldo_factura);
            } else{
                $(".formularios").hide();
            }
        });
        }).change();

        $(".ver_modal_proveedor").click(function() {
          id = $(this).data("id");
          fp = $(this).data("fp");
          ganancias_pp = $("#ganancias_pp").val(0);
          iibb_pp = $("#iibb_pp").val(0);
          segsoc_pp = $("#segsoc_pp").val(0);
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
              $("#item_modal_id").val(data.id_registro_cotizacion);
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
              if (data.id_factura == 1){
                $(".retenciones").show();
              } else {
                $(".retenciones").hide();
              }
              $("#numero_factura_modal").val(data.numero_factura_cotizacion);
              $("#fecha_factura_modal").val(data.fecha_factura_cotizacion);
              $("#tiempo_pago_modal").val(data.tiempo_pago_cotizacion);
              $("#fecha_pago_modal").val(data.fecha_pago_cotizacion);
              $("#forma_pago_modal").val(data.tipo);
              $("#observaciones_modal").val(data.observaciones_cotizacion);

              $(".definir_pago").attr("data-id_factura", data.id_factura_cotizacion);

              forma_pago = data.tipo_pago_elegido_pp;

              if (data.id_factura_cotizacion == data.id_factura_pp){
                
                $(".formularios").hide();
                $("." + forma_pago).show();
                $(".limpiar").val('');
                $('#modal_detalle_pago_proveedor').modal('show');
                $("#forma_pago_aplicada").val(forma_pago);

                $(".definir_pago").attr("data-tipo_pago", forma_pago);

                /*saldo_pago = data.importe_bruto_cotizacion - data.monto_total_pp

                $(".monto_total_pp_"+forma_pago).val(saldo_pago);*/

                $(".monto_pagado_pp_"+forma_pago).val(data.monto_pagado_pp);
                $(".monto_retenido_pp_"+forma_pago).val(data.monto_retenido_pp);
                $(".id_banco_origen_pp_"+forma_pago).val(data.id_banco_origen_pp);
                $(".id_banco_destino_pp_"+forma_pago).val(data.id_banco_destino_pp);
                $(".numero_cheque_pp_"+forma_pago).val(data.numero_cheque_pp);
                $(".tipo_cheque_pp_"+forma_pago).val(data.tipo_cheque_pp);
                $(".fecha_cheque_pp_"+forma_pago).val(data.fecha_cheque_pp);
                $(".fecha_pago_pp_"+forma_pago).val(data.fecha_pago_pp);
                $(".cruzado_cheque_pp_"+forma_pago).val(data.cruzado_cheque_pp);
                $(".orden_cheque_pp_"+forma_pago).val(data.orden_cheque_pp);
                $(".fecha_emision_pp_"+forma_pago).val(data.fecha_emision_pp);
                $(".fecha_ejecucion_pp_"+forma_pago).val(data.fecha_ejecucion_pp);
                $(".cbu_alias_pp_"+forma_pago).val(data.cbu_alias_pp);
                $(".id_tarjeta_credito_pp_"+forma_pago).val(data.id_tarjeta_credito_pp);
                $(".cuotas_tarjeta_pp_"+forma_pago).val(data.cuotas_tarjeta_pp);
                $(".tiempo_pp_"+forma_pago).val(data.tiempo_pp);
                $(".usuario_pp_"+forma_pago).val(data.usuario_pp);

                console.log("Hay un pago hecho para esta factura");

                // TRAIGO PAGOS HECHOS

                id_factura_proveedor = data.id_factura_pp;

                $.ajax({
                  type: "GET",
                  url:"ajax/traer_pagos_factura_proveedor_confirmado.php?id_factura_proveedor="+id_factura_proveedor,
                  success:function(data){
                    pago_factura = 0;
                    importe_bruto = 0;
                    calculo_saldo_factura = 0;
                    $('#tabla_pago_proveedores_confirmados').show();
                    $('#tabla_pago_proveedores_confirmados').html(data);
                    pago_factura = $("#total_pago_factura").text();
                    pago_factura = pago_factura.split('.').join("");
                    console.log(pago_factura);
                    importe_bruto = $("#importe_bruto_modal").val();
                    importe_bruto = parseFloat(importe_bruto);
                    calculo_saldo_factura = importe_bruto - pago_factura;
                    $("#monto_total_oculto").val(calculo_saldo_factura);
                    console.log("Pago Factura: ",calculo_saldo_factura);
                    if (calculo_saldo_factura == 0){
                      $(".formularios").hide();
                      $('#forma_pago_aplicada_').hide();
                    } else {
                      $(".monto_total_pp_"+forma_pago).val(calculo_saldo_factura);
                      $('#forma_pago_aplicada_').show();  
                    }                    
                  }
                });

              } else {
                console.log("No hay un pago hecho para esta factura");
                $('#tabla_pago_proveedores_confirmados').hide();
                $('#forma_pago_aplicada_').show();
                $("#total_pago_factura").text(0);
                $(".formularios").hide();
                $('#modal_detalle_pago_proveedor').modal('show');
                $('#forma_pago_aplicada').prop('selectedIndex',0);
                $(".limpiar").val('');
                $(".monto_total_pp_"+forma_pago).val(data.importe_bruto_cotizacion);
                $(".definir_pago").attr("data-tipo_pago", forma_pago);
                $("#monto_total_oculto").val(data.importe_bruto_cotizacion);
              }

              //

              /*$("#op_modal").val('');
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
              $("#item_modal_id").val(data.id_registro_cotizacion);
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
              if (data.id_factura == 1){
                $(".retenciones").show();
              } else {
                $(".retenciones").hide();
              }
              $("#numero_factura_modal").val(data.numero_factura_cotizacion);
              $("#fecha_factura_modal").val(data.fecha_factura_cotizacion);
              $("#tiempo_pago_modal").val(data.tiempo_pago_cotizacion);
              $("#fecha_pago_modal").val(data.fecha_pago_cotizacion);
              $("#forma_pago_modal").val(data.tipo);
              $("#observaciones_modal").val(data.observaciones_cotizacion);

              $(".definir_pago").attr("data-id_factura", data.id_factura_cotizacion);

              
                console.log("Muestro formulario: .",fp);
                console.log(fp);
                $(".formularios").hide();
                $("."+fp).show();
                $(".limpiar").val('');
                $("#forma_pago_aplicada").val(data.tipo_pago_elegido_pp);
                $(".definir_pago").attr("data-tipo_pago", fp);
                $(".monto_total_pp_"+fp).val(data.importe_bruto_cotizacion);
                $(".monto_pagado_pp_"+fp).val(data.monto_pagado_pp);
                $(".monto_retenido_pp_"+fp).val(data.monto_retenido_pp);
                $(".id_banco_origen_pp_"+fp).val(data.id_banco_origen_pp);
                $(".id_banco_destino_pp_"+fp).val(data.id_banco_destino_pp);
                $(".numero_cheque_pp_"+fp).val(data.numero_cheque_pp);
                $(".tipo_cheque_pp_"+fp).val(data.tipo_cheque_pp);
                $(".fecha_cheque_pp_"+fp).val(data.fecha_cheque_pp);
                $(".fecha_pago_pp_"+fp).val(data.fecha_pago_pp);
                $(".cruzado_cheque_pp_"+fp).val(data.cruzado_cheque_pp);
                $(".orden_cheque_pp_"+fp).val(data.orden_cheque_pp);
                $(".fecha_emision_pp_"+fp).val(data.fecha_emision_pp);
                $(".fecha_ejecucion_pp_"+fp).val(data.fecha_ejecucion_pp);
                $(".cbu_alias_pp_"+fp).val(data.cbu_alias_pp);
                $(".id_tarjeta_credito_pp_"+fp).val(data.id_tarjeta_credito_pp);
                $(".cuotas_tarjeta_pp_"+fp).val(data.cuotas_tarjeta_pp);
                $(".tiempo_pp_"+fp).val(data.tiempo_pp);
                $(".usuario_pp_"+fp).val(data.usuario_pp);*/

                // 

              /*var tipo_de_pago_switch = data.id_forma_pago_cotizacion;
              console.log(tipo_de_pago_switch);

              if (tipo_de_pago_switch == 1){
                console.log("Pago en Efectivo");
                $(".formularios").css("display", "none");
                $("#formulario_efectivo").css("display", "block");
                $(".definir_pago").attr("data-tipo_pago", "EF");

                $(".monto_total_pp").val(data.importe_bruto_cotizacion);
              }
              if (tipo_de_pago_switch == 2){
                console.log("Pago con Transferencia");
                $(".formularios").css("display", "none");
                $("#formulario_transferencia").css("display", "block");
                
                $(".definir_pago").attr("data-tipo_pago", "TR");
                $(".monto_total_pp").val(data.importe_bruto_cotizacion);
              }

              if (tipo_de_pago_switch == 3){
                console.log("Pago con Cheque");
                $(".formularios").css("display", "none");
                $("#formulario_cheque").css("display", "block");

                $(".definir_pago").attr("data-tipo_pago", "CH");
                
                $(".monto_pagado_pp").val(data.importe_bruto_cotizacion);
                $(".monto_total_pp").val(data.importe_bruto_cotizacion);
              }

              if (tipo_de_pago_switch == 4){
                console.log("Pago Contrafactura");
                $(".formularios").css("display", "none");
                $("#formulario_contrafactura").css("display", "block");
                
                $(".definir_pago").attr("data-tipo_pago", "CF");

                $(".monto_total_pp").val(data.importe_bruto_cotizacion);
              }

              if (tipo_de_pago_switch == 5){
                console.log("Pago con MercadoPago");
                $(".formularios").css("display", "none");
                $("#formulario_mercadopago").css("display", "block");
                
                $(".definir_pago").attr("data-tipo_pago", "MP");
                $(".monto_total_pp").val(data.importe_bruto_cotizacion);
              }

              if (tipo_de_pago_switch == 6){
                console.log("Pago con PayPal");
                $(".formularios").css("display", "none");
                $("#formulario_paypal").css("display", "block");
                
                $(".definir_pago").attr("data-tipo_pago", "PP");

                $(".monto_total_pp").val(data.importe_bruto_cotizacion);
              }

              if (tipo_de_pago_switch == 7){
                console.log("Pago con Otro medio");
                $(".formularios").css("display", "none");
                $("#formulario_otro_medio").css("display", "block");
                
                $(".definir_pago").attr("data-tipo_pago", "OM");
              }

              if (tipo_de_pago_switch == 8){
                console.log("Pago de Caja Chica");
                $(".formularios").css("display", "none");
                $("#formulario_caja_chica").css("display", "block");
                
                $(".definir_pago").attr("data-tipo_pago", "CC");
              }

              if (tipo_de_pago_switch == 9){
                console.log("Pago con Tarjeta de Credito");
                $(".formularios").css("display", "none");
                $("#formulario_tarjeta_credito").css("display", "block");
                
                $(".definir_pago").attr("data-tipo_pago", "TC");

                $(".monto_total_pp").val(data.importe_bruto_cotizacion);
              }

              if (tipo_de_pago_switch == 10){
                console.log("Pago con Débito Automático");
                $(".formularios").css("display", "none");
                $("#formulario_debito").css("display", "block");
                
                $(".definir_pago").attr("data-tipo_pago", "DA");

                $(".monto_total_pp").val(data.importe_bruto_cotizacion);
              }*/

              
            }
          });
        });

        
      };

      function calcular_retenciones() {
        //puntear(document.getElementById('ingreso_importe_neto'));
        let ganancias = parseFloat($("#ganancias_pp").val());
        let iibb = parseFloat($("#iibb_pp").val());
        let segsoc = parseFloat($("#segsoc_pp").val());
        let monto_total = parseFloat($("#monto_total_oculto").val());
        let resultado = monto_total - (ganancias + iibb + segsoc);

        console.log(ganancias);
        console.log(iibb);
        console.log(segsoc);
        console.log(resultado);

        $(".monto_total_resultado").val(resultado);
      };

      function MergeCommonRows_pagos(table, firstOnly) {
        var firstColumnBrakes = [];   
        for(var i=2; i<=11; i++){
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
