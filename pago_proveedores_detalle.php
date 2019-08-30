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
    <style type="text/css">
      #transferencia_bancaria, #cheque {
        display: none;
      }
    </style>
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
        <h1 class="page-title">Detalle de Pago a Proveedor</h1>
        <div class="page-header-actions">
        </div>
      </div>

      <div class="page-content container-fluid">
        <!-- Panel Columns & Select -->
        <div class="panel">
          <div class="panel-body">
            <div class="row row-lg">
              <div class="col-md-12">
                <div class="form-group">
                    <h4>Proveedor</h4>
                    <input type="text" class="form-control form-control" id="proveedor" readonly>
                </div>
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
              <div class="col-md-12">
                <div class="form-group">
                    <h4>Detalle</h4>
                    <textarea row="8" id="detalle" class="form-control" id="detalle" aria-label="Default" aria-describedby="inputGroup-sizing-default" readonly></textarea>
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
              
              <div class="col-md-4">
                <div class="form-group">
                    <h4>Tipo de Factura</h4>
                    <select class="form-control" id="tipo_factura">
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
                    <input type="number" id="numero_factura" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                    <h4>Fecha de Factura</h4>
                    <input type="text" id="fecha_factura" class="form-control datepicker_ff"  aria-label="Default" aria-describedby="inputGroup-sizing-default"data-plugin="datepicker">
                </div>
              </div>
            </div>

              <!--  TABLA DE FORMAS DE PAGO -->

            <div class="row" id="mostrar_pagos"></div>

              <!--  TABLA DE FORMAS DE PAGO -->

            <div id="transferencia_bancaria">
              <div class="row">
                <div class="col-md-12 border-bottom">
                  <h3>Datos de Transferencia Bancaria</h3>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <h4>Banco Origen</h4>
                      <select class="form-control" id="banco_origen">
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
                      <select class="form-control" id="banco_destino">
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
              </div>
            </div>

            <div id="cheque">
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
                    <select class="form-control" id="banco_origen_cheque">
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
                      <input type="number" id="numero_cheque" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <h4>Tipo de Cheque</h4>
                    <select class="form-control" id="tipo_cheque">
                      <option value="">Seleccionar</option>
                      <option value="1">Diferido</option>
                      <option value="1">Al Día</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                      <h4>Fecha Cheque</h4>
                      <input type="text" id="fecha_cheque" class="form-control datepicker_ff"  aria-label="Default" aria-describedby="inputGroup-sizing-default"data-plugin="datepicker">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <h4>Fecha de Pago</h4>
                      <input type="text" id="fecha_pago_cheque" class="form-control datepicker_ff"  aria-label="Default" aria-describedby="inputGroup-sizing-default"data-plugin="datepicker">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="checkbox-custom checkbox-primary">
                    <input type="checkbox" id="cheque_cruzado" checked="">
                    <label for="cheque_cruzado">Cruzado</label>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="checkbox-custom checkbox-primary">
                    <input type="checkbox" id="cheque_orden" checked="">
                    <label for="cheque_orden">A la Órden</label>
                  </div>
                </div>
              
              </div>
            </div>

            <div class="row" style="padding-bottom: 2em;">
              <div class="col-md-12">
                <span class="input-group-text">Adjuntar factura</span>
              </div>
              <div class="col-md-2">
                <span id="factura_no">Todavia no se adjuntaron facturas para este proveedor</span>
                <a href="" id="link_factura" target="_blank"><button type="button" class="btn btn-success btn-block" id="factura_si"><strong><i class='icon wb-order' aria-hidden='true'></i>VER FACTURA</strong></button></a>
              </div>
              <div class="col-md-10"></div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <button type="button" class="btn btn-danger btn-block" id="boton_guardar_proveedor_cotizacion"><strong>POR PAGAR</strong></button>
              </div>

              <div class="col-md-3">
                <button type="button" class="btn btn-warning btn-block"><strong>PAGO DEMORADO</strong></button>
              </div>

              <div class="col-md-4">
                <button type="button" class="btn btn-success btn-block"><strong>CONFIRMAR PAGO</strong></button>
              </div>

              <div class="col-md-2">
                <button type="button" class="btn btn-default btn-block"><strong>VOLVER</strong></button>
              </div>

            </div>
        </div>
        <!-- End Panel Columns & Select -->
      </div>
    </div>
    <!-- End Page -->

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
            url:"traer_registro_pago.php",
            method:"POST",
            data:{id:id},
            dataType:"json",
            success:function(data){
              var pagos_mostrar = "<h4>Plazos de Pago</h4><table class='table table-hover'><thead><tr><th scope='col' class='gray'>Plazo</th><th scope='col' class='gray'>Porcentaje</th><th scope='col' class='gray'>Importe</th><th scope='col' class='gray'>Forma de Pago</th><th scope='col' class='gray'>Fecha de Pago</th><th scope='col' class='gray'>Estado</th></tr></thead><tbody>";

              $("#proveedor").val(data.razon_social);
              $("#importe_bruto").val(data.importe_bruto);
              $("#ot").val(data.id);
              $("#tipo_item").val(data.nombre_item_cotizacion);
              $("#tipo_factura").val(data.tipo_factura);
              $("#numero_factura").val(data.numero_factura);
              $("#fecha_factura").val(data.fecha_factura);
              $("#importe_neto").val(data.importe_neto);
              $("#tipo_iva").val(data.tipo_iva);
              $("#iva").val(data.iva);
              $("#percepcion").val(data.percepcion);

              if (data.archivo_adjunto == "sin_subir" || data.archivo_adjunto == 0){
                $("#factura_no").css("display", "block");
                $("#factura_si").css("display", "none");
              } else {
                $("#factura_no").css("display", "none");
                $("#factura_si").css("display", "block");
                $("#link_factura").attr("href", "uploads/factura_proveedores/factura_proveedor_"+data.archivo_adjunto);
              }

              var pagos = $.parseJSON(data.cotizaciones_pagos);
              $.each(pagos, function(key,value){
                porcentaje = parseFloat(value['porcentaje']);
                importe_total = parseFloat(data.importe_bruto);
                importe = (porcentaje * importe_total)/100;

                var formap = value['forma'];

                switch (formap){
                  case '1':
                    forma_pago = "Efectivo";
                    break;
                  case '2':
                    forma_pago = "Transferencia";
                    break;
                  case '3':
                    forma_pago = "Cheque";
                    break;
                  case '4':
                    forma_pago = "Contrafactura";
                    break;
                  case '5':
                    forma_pago = "Mercado Pago";
                    break;
                  case '6':
                    forma_pago = "Pay Pal";
                    break;
                  case '7':
                    forma_pago = "Otro";
                    break;
                }

                pagos_mostrar +=
                "<tr>"+
                  "<td>"+value['plazo']+" días</td>"+
                  "<td>"+value['porcentaje']+"%</td>"+
                  "<td>$"+importe+"</td>"+
                  "<td>"+forma_pago+"</td>"+
                  "<td>"+value['fecha1'] + "</span></td>"+
                  "<td><span class='badge badge-danger'>POR PAGAR</span></td>"+
                "</tr>";
              });
              pagos_mostrar += "</tbody></table>";
              $('#mostrar_pagos').html(pagos_mostrar);
            }
        });

        $("#forma_pago").change(function () {
          if ($(this).val() == 2){
            $('#transferencia_bancaria').fadeIn();
            $('#cheque').fadeOut();
          }

          if ($(this).val() == 3){
            $('#cheque').fadeIn();
            $('#transferencia_bancaria').fadeOut();
          }

          if ($(this).val() == 1 || $(this).val() == 4 || $(this).val() == 5 || $(this).val() == 6 || $(this).val() == 7){
            $('#cheque').fadeOut();
            $('#transferencia_bancaria').fadeOut();
          }

        });

      });

    </script>
  </body>
</html>
