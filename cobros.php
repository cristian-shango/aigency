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

    <title>AiGency | Cobros</title>

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
        <h1 class="page-title">Cobros</h1>
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
                    <table class="table table-hover" id="tabla_proyectos"></table>
                  </div>
                </div>
                <!-- End Example Basic Columns -->
              </div>
          </div>
        </div>
        <!-- End Panel Columns & Select -->
      </div>
    </div>
    <!-- End Page -->

    <!-- Modal Editar Cotización -->
    <div class="modal fade" id="modal_facturar_proyecto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg modal-center" role="document">
        <div class="modal-content">

            <div class="modal-body">
              <div class="row">
                <div class="col-md-12"><h3>Facturar Proyecto</h3></div>
                <div class="col-md-4">
                  <div class="form-group">
                      <h4>Cliente</h4>
                      <input type="text" class="form-control form-control" id="cliente" readonly>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <h4>OT</h4>
                      <input type="text" class="form-control form-control" id="ot" readonly>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <h4>Proyecto</h4>
                      <input type="text" class="form-control form-control" id="proyecto" readonly>
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
                      <h4>Costo Inicial</h4>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">$</div>
                      </div>
                      <input type="text" class="form-control form-control-lg" id="costo_inicial" readonly>
                    </div>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                      <h4>Precio</h4>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">$</div>
                      </div>
                      <input type="text" class="form-control form-control-lg" id="precio" readonly>
                    </div>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                      <h4>Consumido</h4>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">$</div>
                      </div>
                      <input type="text" class="form-control form-control-lg" id="consumido" readonly>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <h4>Diferencia</h4>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">$</div>
                      </div>
                      <input type="text" class="form-control form-control-lg" id="diferencia" readonly>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <h4>Costo + Markup</h4>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">$</div>
                      </div>
                      <input type="text" class="form-control form-control-lg" id="costo_markup" readonly>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <h4>Forma de Cobro</h4>
                      <select class="form-control" id="forma_cobro">
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
                      <select class="form-control" id="tipo_factura">
                          <option value="0">Seleccionar</option>
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
                <div class="col-md-2">
                  <div class="form-group">
                      <h4>Número de Factura</h4>
                      <input type="text" id="numero_factura" class="form-control factura"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                      <h4>Número de OC</h4>
                      <input type="number" id="numero_oc" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <h4>Fecha de Factura</h4>
                      <input type="date" id="fecha_factura" class="form-control datepicker_ff"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <h4>Tiempo de Cobro</h4>
                      <div class="input-group">
                        <input type="text" id="tiempo_cobro" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                        <div class="input-group-prepend">
                        <div class="input-group-text">&nbsp;días</div>
                      </div>
                    </div>
                      <input type="number" id="id" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" hidden>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <h4>Fecha de Cobro</h4>
                      <input type="date" id="fecha_cobro" class="form-control datepicker_fp"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
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
                          <option value="0">Seleccionar</option>
                        <?php
                        // Attempt select query execution
                        $sql3 = "SELECT * FROM iva ORDER BY valor_iva ASC";
                        mysql_query("SET NAMES 'utf8'");
                        if($result3 = mysqli_query($conexion, $sql3)){
                            if(mysqli_num_rows($result3) > 0){
                                $i = 0;
                                while($row3 = mysqli_fetch_array($result3)){
                      ?>
                      <option value="<?php echo ($row3['id_iva']);?>"><?php echo ($row3['valor_iva']);?>%</option>
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
                <!-----------------------dropify----------------------------------------------------------------------------->
                <?php
                  if(empty($row['archivo_adjunto'])){
                ?>
                  <div class="col-md-12">
                    <span class="input-group-text">Adjuntar factura</span>
                  </div>
                  <div class="col-md-12">
                      <input type="file" class="upload_file" data-plugin="dropify" data-default-file=""/>
                  </div>
                <?php
                  } else {
                ?>
                  <div class="col-md-12">
                    <span class="input-group-text">Adjuntar factura</span>
                  </div>
                  <div class="col-md-12">
                      <input type="file" class="upload_file" data-plugin="dropify" data-default-file=""/>
                  </div>
                <?php
                  }
                ?> 

                <div class="col-md-3">
                  <button class="btn btn-block btn-success cambio_proyecto" data-estado="12" style="cursor: pointer;">FACTURADO</button>
                </div>
                <div class="col-md-3">
                  <button class="btn btn-block btn-warning cambio_proyecto" data-estado="14" style="cursor: pointer;">COBRADO</button>
                </div>
                <div class="col-md-3">
                  <button class="btn btn-block btn-info cambio_proyecto" data-estado="17" style="cursor: pointer;">LIBERAR FONDOS</button>
                </div>
                <div class="col-md-3">
                  <button type="button" class="btn btn-danger btn-block" data-dismiss="modal"><strong>CANCELAR</strong></button>
                </div>
              </div>
            </div>
          </form>
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

        $.ajax({
            type: "GET",
            url:"ajax_facturar_proyecto.php",
            success:function(data){
                $('#tabla_proyectos').html(data);
                funciones_cotizaciones();
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
        //$(".numerable");
        $('.facturar_proyecto').click(function(){
          var id = $(this).attr('data-id');
          $.ajax({
              url:"traer_proyectos.php",
              method:"POST",
              data:{id:id},
              dataType:"json",
              success:function(data){
                $('#modal_facturar_proyecto').modal('show');
                $('#cliente').val(data.nombre);
                $('#ot').val(data.id);
                $('#proyecto').val(data.producto_proyecto);
                $('#detalle').val(data.detalle);
                $('#costo_inicial').val(data.costo_presupuestado);
                $('#precio').val(data.precio);
                $('#consumido').val(data.consumido);
                $('.upload_file').attr('data-default-file',data.archivo_adjunto);
                $("#diferencia").val(data.saldo);
                $("#costo_markup").val(data.precio_markup);
                $("#forma_cobro").val(data.forma_pago);
                if (data.tipo_factura == 'A') {
                  $('#iva').removeAttr('disabled');
                  $('#tipo_iva').removeAttr('disabled');
                  $('#numero_factura').removeAttr('disabled');
                  $('#fecha_factura').removeAttr('disabled');
                  $('#fecha_cobro').removeAttr('disabled');
                  $('#percepcion').removeAttr('disabled');
                }
                $("#tipo_factura").val(data.tipo_factura);

                $("#numero_factura").val(data.numero_factura);
                if (data.numero_oc == ""){
                  $('#numero_oc').attr('disabled', 'disabled').val('');
                } else {
                  $("#numero_oc").val(data.numero_oc);
                }
                $("#fecha_factura").val(data.fecha_factura);
                $("#tiempo_cobro").val(data.tiempo_pago);
                $("#fecha_cobro").val(data.fecha_cobro);
                $("#importe_neto").val(data.precio_markup);
                $("#tipo_iva").val(data.tipo_iva);
                $("#iva").val(data.iva);
                $("#percepcion").val(data.percepcion);
                $("#importe_bruto").val(data.importe_bruto);
              }
          });
        });

        $('.cambio_proyecto').click(function(){
          var estado = $(this).attr('data-estado');
          var id_proyecto = document.getElementById("ot").value;
          var forma_cobro = document.getElementById("forma_cobro").value;
          var tipo_factura = document.getElementById("tipo_factura").value;
          var numero_factura = document.getElementById("numero_factura").value;
          var numero_oc = document.getElementById("numero_oc").value;
          var fecha_factura = document.getElementById("fecha_factura").value;
          var tiempo_cobro = document.getElementById("tiempo_cobro").value;
          var fecha_cobro = document.getElementById("fecha_cobro").value;
          var importe_neto = document.getElementById("importe_neto").value;
          var tipo_iva = document.getElementById("tipo_iva").value;
          var iva = document.getElementById("iva").value;
          var percepcion = document.getElementById("percepcion").value;
          var importe_bruto = document.getElementById("importe_bruto").value;

          importe_neto = pasarafloat(importe_neto).toFixed(2);
          iva = pasarafloat(iva).toFixed(2);
          percepcion = pasarafloat(percepcion).toFixed(2);
          importe_bruto = pasarafloat(importe_bruto).toFixed(2);

          $.ajax({
            url: "/ajax/procesar_cobro.php",
            method:"POST",
            data:'id_proyecto='+id_proyecto+'&forma_cobro='+forma_cobro+'&tipo_factura='+tipo_factura+'&numero_factura='+numero_factura+'&numero_oc='+numero_oc+'&fecha_factura='+fecha_factura+'&tiempo_cobro='+tiempo_cobro+'&fecha_cobro='+fecha_cobro+'&importe_neto='+importe_neto+'&iva='+iva+'&percepcion='+percepcion+'&importe_bruto='+importe_bruto+'&estado='+estado+'&tipo_iva='+tipo_iva,
            success:function(data){
              $.ajax({
                type: "GET",
                url:"ajax_facturar_proyecto.php",
                success:function(data){
                    $('#modal_facturar_proyecto').modal('hide');
                    $('#tabla_proyectos').html(data);
                    funciones_cotizaciones();
                }
              });
            },

          });
        });

        $("#tipo_iva").change(function(){
          valor = $(this).val();
          importe_neto = document.getElementById('importe_neto').value;
          importe_neto = pasarafloat(importe_neto);
          iva = (importe_neto*valor)/100;
          document.getElementById('iva').value = iva;
          importe_bruto = importe_neto + iva;
          $(".importe_bruto").val(importe_bruto);
        });

        $('#fecha_factura').change(function(){
          var fecha = document.getElementById('fecha_factura').value;
          var dias = document.getElementById('tiempo_cobro').value;
          dias = pasarafloat(dias);
          fecha_calculo = moment(fecha).add(dias, 'days').calendar();
          fecha_calculo = moment(fecha_calculo).format("L");
          console.log(fecha_calculo);
            document.getElementById('fecha_cobro').value = fecha_calculo;
        });

        $('#tiempo_cobro').change(function(){
          var fecha = document.getElementById('fecha_factura').value;
          var dias = document.getElementById('tiempo_cobro').value;
          dias = pasarafloat(dias);
          fecha_calculo = moment(fecha).add(dias, 'days').calendar();
          fecha_calculo = moment(fecha_calculo).format("L");
          console.log(fecha_calculo);
            document.getElementById('fecha_cobro').value = fecha_calculo;
        });

        $(document).on("change", ".sumar", function() {
          var sum = 0;
          $(".sumar").each(function(){
              sum += +$(this).val();
          });
          $(".importe_bruto").val(sum);
        });

        $('#tipo_factura').change(function() {
          if ($('#tipo_factura').val() == 'A') {
              $('#iva').removeAttr('disabled');
              $('#tipo_iva').removeAttr('disabled');
              $('#numero_factura').removeAttr('disabled');
              $('#fecha_factura').removeAttr('disabled');
              $('#fecha_cobro').removeAttr('disabled');
              $('#percepcion').removeAttr('disabled');
          } else {
              $('#iva').attr('disabled', 'disabled').val('');
              if ($('#tipo_factura').val() == 'Sin factura') {
                $('#numero_factura').attr('disabled', 'disabled').val('');
                $('#fecha_factura').attr('disabled', 'disabled').val('');
                $('#fecha_cobro').removeAttr('disabled');
                $('#iva').attr('disabled', 'disabled').val('');
                $('#tipo_iva').attr('disabled', 'disabled').val('');
                $('#percepcion').attr('disabled', 'disabled').val('');
              } else {
                $('#numero_factura').removeAttr('disabled');
                $('#fecha_factura').removeAttr('disabled');
                $('#tipo_iva').attr('disabled', 'disabled').val('');
                $('#fecha_cobro').removeAttr('disabled');
                $('#percepcion').attr('disabled', 'disabled').val('');
              }
          }
          if ($('#tipo_factura').val() == '') {
            $('#iva').attr('disabled', 'disabled').val('');
            $('#tipo_iva').attr('disabled', 'disabled').val('');
            $('#numero_factura').attr('disabled', 'disabled').val('');
              $('#fecha_factura').attr('disabled', 'disabled').val('');
              $('#fecha_cobro').attr('disabled', 'disabled').val('');
              $('#percepcion').attr('disabled', 'disabled').val('');
          }
        }).trigger('change'); // added trigger to calculate initial tipo_factura
        asociareventonumerable();
        $(".numerable").each(function(){abandonar(this);})
      }


      $(".upload_file").change(function(){
          var fd = new FormData();
          var files = $('.upload_file')[0].files[0];
          fd.append('file',files);
          console.log(fd);
          uploadData(fd);
        });

        function uploadData(formdata){
          $.ajax({
            url: 'subir_archivo_shango.php',
            type: 'post',
            data: formdata,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response){
            }
          });
        }

    </script>
  </body>
</html>
