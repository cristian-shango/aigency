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
                
                <div id="mostrar_costo_presupuestado" class="col-md-12">
                  <div class="form-group">
                      <h5>Pago a 30 días</h5>
                      <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">$</div>
                      </div>
                      <input type="text" class="form-control" id="pago30" readonly value="<?php echo ($valor30dias);?>">
                    </div>
                  </div>
                </div>

                <div id="mostrar_costo_presupuestado" class="col-md-12">
                  <div class="form-group">
                      <h5>Pago a 60 días</h5>
                      <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">$</div>
                      </div>
                      <input type="text" class="form-control" id="pago60" readonly value="<?php echo ($valor60dias);?>">
                    </div>
                  </div>
                </div>

                <div id="mostrar_costo_presupuestado" class="col-md-12">
                  <div class="form-group">
                      <h5>Pago a 90 días</h5>
                      <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">$</div>
                      </div>
                      <input type="text" class="form-control" id="pago90" readonly value="<?php echo ($valor90dias);?>">
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
          <!-- <div class="col-md-12">
            <button class="btn btn-block btn btn-primary clickable cambio_estado_mensaje" data-estado="COTIZANDO" style="cursor: pointer;">COTIZANDO</button>
            <button class="btn btn-block btn btn-success clickable cambio_estado_mensaje" data-estado="ENTREGADO" style="cursor: pointer;">ENTREGADO</button>
            <button class="btn btn-block btn btn-info clickable cambio_estado_mensaje" data-estado="FRENADO" style="cursor: pointer;">FRENADO</button>
            <?php
              $sql_contar_adicionales = "SELECT count(*) as total from adicionales WHERE aprobado_adicional = 0 AND id_proyecto_adicional = '".$_GET['id']."'";
              $resultado_contar_adicionales = mysqli_query($conexion, $sql_contar_adicionales);
              $datos_contar_adicionales=mysqli_fetch_assoc($resultado_contar_adicionales);
            ?>
              <button class="btn btn-block btn btn-warning clickable" data-estado="SOLICITAR ADICIONAL" data-proyecto="<?php echo ($_GET['id']); ?>" style="cursor: pointer;" id="solicitar_adicional">SOLICITAR ADICIONAL <strong>(<?php echo ($datos_contar_adicionales['total']);?>)</strong></button>
              <?php
              ?>
          </div> -->
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
            </div>
          </div>
          <!-- End Panel Columns & Select -->
        </div>
      </div>
    </div>
    <!-- End Page -->

    <!-- Modal Editar Cotización -->
    <div class="modal fade" id="modal_cargar_proveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <form id="formulario_carga_cotizacion">
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12"><h3>Proveedor</h3></div>
                <div class="col-md-11">
                  <h4>Proveedor</h4>
                  <select class="form-control" id="proveedores">
                        <option value="">Seleccionar</option>
                      <?php
                      // Attempt select query execution
                      $sql1 = "SELECT * FROM proveedores ORDER BY servicio";
                      mysql_query("SET NAMES 'utf8'");
                      if($result1 = mysqli_query($conexion, $sql1)){
                          if(mysqli_num_rows($result1) > 0){
                              $i = 0;
                              while($row1 = mysqli_fetch_array($result1)){
                                ?>
                                  <option value="<?php echo ($row1['id_proveedor']);?>"><?php echo ($row1['servicio']);?> | <?php echo ($row1['descripcion']);?> | <?php echo ($row1['razon_social']);?> | <?php echo ($row1['contacto']);?></option>
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
                  <i class="far fa-plus-square" id="agregar_proveedor"></i>
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
        proyecto = document.getElementById('ingreso_id').innerHTML;

        $.ajax({  
            url:"ajax_mostrar_cotizaciones_aprobadas.php",  
            method:"POST",  
            data:'proyecto='+proyecto,
            success:function(data){
                $('#tabla_cotizaciones').html(data);
                MergeCommonRows($('#tabla_cotizaciones'));
                funciones_cotizaciones();
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
      
      function calculate() {
        var myBox1 = document.getElementById('ingreso_cantidad').value; 
        var myBox2 = document.getElementById('ingreso_importe_neto').value;
        var myBox3 = document.getElementById('ingreso_jornadas').value;
        var result = document.getElementById('ingreso_importe_total');  
        var myResult = myBox1 * myBox2 * myBox3;
        result.value = myResult;
      };
      
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

      $('#boton_guardar_proveedor_cotizacion').click(function(){
          var id = $("#ot").val();
          var id_proveedor = $("#proveedores").val();
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
                      $('#tabla_cotizaciones').html(data);
                      MergeCommonRows($('#tabla_cotizaciones'));
                      funciones_cotizaciones();
                  }  
              });
            }  
          });
        });

      function funciones_cotizaciones(){
        $('.cargar_proveedor_cotizacion').click(function(){
          var id = $(this).attr('data-id');
          $.ajax({  
              url:"traer_cotizaciones.php",  
              method:"POST",  
              data:{id:id},
              dataType:"json",
              success:function(data){  
                $('#modal_cargar_proveedor').modal('show');
                $('#proveedores').val(data.id_proveedor);
                $('#ot').val(data.id);
                $('#tipo_item').val(data.item);
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
              }  
          });
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

        $(document).on("change", ".sumar", function() {
          var sum = 0;
          $(".sumar").each(function(){
              sum += +$(this).val();
          });
          $(".importe_bruto").val(sum);
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
  </body>
</html>