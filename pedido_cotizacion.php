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
    
    <title>AiGency | Pedido de Cotizaciones</title>
    
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
        <h1 class="page-title">Pedido de Cotizaciones</h1>
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
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Cliente</th>
                          <th>Producto</th>
                          <th>Proyecto</th>
                          <th>Tipo de Proyecto</th>
                          <th>Subtipo</th>
                          <th>Fecha Interna</th>
                          <th>Hora Interna</th>
                          <th>Fecha Cliente</th>
                          <th>Hora Cliente</th>
                          <th>Precio</th>
                          <th>Costo</th>
                          <th colspan="4">Acciones</th>
                          <th style="text-align: center;">Estado</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          // Attempt select query execution
                          $sql = "SELECT * FROM proyectos p LEFT JOIN clientes c ON p.cliente = c.id_cliente LEFT JOIN tipo_cotizacion t ON p.tipo_cotizacion = t.id_tipo_cotizacion LEFT JOIN subtipo_cotizacion s ON p.subtipo_cotizacion = s.id_subtipo LEFT JOIN estados e ON p.estado = e.id_estados";
                          mysql_query("SET NAMES 'utf8'");
                          if($result = mysqli_query($conexion, $sql)){
                              if(mysqli_num_rows($result) > 0){
                                  $i = 0;
                                  while($row = mysqli_fetch_array($result)){
                        ?>
                            <tr>
                              <td><?php echo ($row['id']);?></td>
                              <td scope="row"><?php echo ($row['nombre']);?></td>
                              <td><?php echo ($row['producto_proyecto']);?></td>
                              <td><?php echo ($row['nombre_proyecto']);?></td>
                              <td><?php echo (utf8_encode($row['tipo_cotizacion']));?></td>
                              <td><?php echo (utf8_encode($row['nombre_subtipo']));?></td>
                              <td><?php echo ($row['fecha_entrega']);?></td>
                              <td><?php echo ($row['hora_interno']);?></td>
                              <td><?php echo ($row['fecha_envio']);?></td>
                              <td><?php echo ($row['hora_cliente']);?></td>
                              <td>$ <span class="valor_precio_cliente"><?php echo  ($row['precio']);?></span></td>
                              <td>$ <span class="valor_costo_presupuestado"><?php echo ($row['costo_presupuestado']);?></span></td>
                              <!-- <td>$ <span class="valor_saldo_total"><?php echo ($row['saldo']);?></span></td> -->
                              <td><button type="button" class="btn btn-default editar" data-toggle="modal" data-id="<?php echo ($row['id']);?>"><i class="icon wb-edit" aria-hidden="true"></i></button></td>
                              <?php
                                if($row['estado'] == 3 OR $row['estado'] == 4 OR $row['estado'] == 5 OR $row['estado'] == 6 OR $row['estado'] == 7 OR $row['estado'] == 8 OR $row['estado'] == 9){
                              ?>
                                  <td>
                                    <button type="button" class="btn btn-success ver" data-toggle="modal" data-id="<?php echo ($row['id']);?>" data-estado="<?php echo ($row['estado']);?>"><i class="icon wb-eye" aria-hidden="true"></i></button>
                                  </td>
                              <?php
                                } else{
                              ?>
                                  <td></td>
                              <?php
                                }
                              ?>
                              <?php
                                if($row['adicional'] == 1){
                              ?>
                                  <td>
                                    <button type="button" class="btn btn-warning click_adicional" data-id="<?php echo ($row['id']);?>"><i class="icon wb-plus" aria-hidden="true"></i></button>
                              <?php
                                } else{
                              ?>
                                  <td></td>
                              <?php
                                }
                              ?>
                              <td>
                                <button type="button" class="btn btn-info eliminar" data-id="<?php echo ($row['id']);?>"><i class="icon wb-trash" aria-hidden="true"></i></button>
                              </td>
                              <td style="font-weight: bold; text-align: center !important;">
                                <?php
                                  $estado = $row['estado'];
                                  $nombre_estado = $row['nombre_estado'];
                                  

                                  switch($estado){
                                    case "1":
                                      echo "<span class='badge badge-danger'>".$nombre_estado."</span>";
                                      break;
                                    case "2":
                                      echo "<span class='badge badge-primary'>".$nombre_estado."</span>";
                                      break;
                                    case "3":
                                      echo "<span class='badge badge-success'>".$nombre_estado."</span>";
                                      break;
                                    case "4":
                                      echo "<span class='badge badge-success'>".$nombre_estado."</span>";
                                      break;
                                    case "5":
                                      echo "<span class='badge badge-success'>".$nombre_estado."</span>";
                                      break;
                                    case "6":
                                      echo "<span class='badge badge-dark'>".$nombre_estado."</span>";
                                      break;
                                    case "7":
                                      echo "<span class='badge badge-info'>".$nombre_estado."</span>";
                                      break;
                                    case "8":
                                      echo "<span class='badge badge-warning'>".$nombre_estado."</span>";
                                      break;
                                    case "9":
                                      echo "<span class='badge badge-dark'>".$nombre_estado."</span>";
                                      break;
                                    case "10":
                                      echo "<span class='badge badge-warning'>".$nombre_estado."</span>";
                                      break;
                                    case "11":
                                      echo "<span class='badge badge-danger'>".$nombre_estado."</span>";
                                      break;
                                    case "12":
                                      echo "<span class='badge badge-success'>".$nombre_estado."</span>";
                                      break;
                                    case "13":
                                      echo "<span class='badge badge-warning'>".$nombre_estado."</span>";
                                      break;
                                    case "14":
                                      echo "<span class='badge badge-success'>".$nombre_estado."</span>";
                                      break;
                                    case "15":
                                      echo "<span class='badge badge-info'>".$nombre_estado."</span>";
                                      break;
                                    case "16":
                                      echo "<span class='badge badge-info'>".$nombre_estado."</span>";
                                      break;
                                    case "17":
                                      echo "<span class='badge badge-warning'>".$nombre_estado."</span>";
                                      break;
                                  }
                                ?>
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
          <button type="button" class="site-action-toggle btn-raised btn btn-success btn-floating" id="boton_nuevo_proyecto" data-toggle="modal" data-target="#modal_nuevo_proyecto">
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
              <h4>¿Borrar Pedido de Cotización?</h4>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" id="boton_eliminar_cliente">Aceptar</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal Nuevo Proyecto -->
      <div class="modal fade" id="modal_nuevo_proyecto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-center modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12"><h2>Nuevo Pedido de Cotización</h2></div>
                <div class="col-md-4">
                  <div class="form-group">
                      <h4>Cliente</h4>
                      <select class="form-control" id="dropdown_cliente_nuevo" >
                          <option value="">Seleccionar</option>
                        <?php
                        // Attempt select query execution
                        $sql = "SELECT * FROM clientes ORDER BY nombre";
                        mysql_query("SET NAMES 'utf8'");
                        if($result = mysqli_query($conexion, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                $i = 0;
                                while($row2 = mysqli_fetch_array($result)){
                      ?>
                      <option value="<?php echo ($row2['id_cliente']);?>"><?php echo (utf8_encode($row2['nombre']));?></option>
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
                <div class="col-md-2">
                  <div class="form-group">
                      <h4>Fecha de Entrega Interna</h4>
                      <input type="date" id="nuevo_fecha_entrega" class="form-control datepicker_fecha_entrega"  aria-label="Default" aria-describedby="inputGroup-sizing-default" >
                  </div>
                </div>
                <div class="col-md-1">
                  <div class="form-group">
                      <h4>Hora</h4>
                      <input type="time" id="hora_interno" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                  </div>
                </div>
                <!--<div class="col-md-1">
                  <div class="form-group">
                      <h4>Minutos</h4>
                      <input type="number" id="minutos_interno" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                  </div>
                </div>-->
                <div class="col-md-2">
                  <div class="form-group">
                      <h4>Fecha de Entrega a Cliente</h4>
                      <input type="date" id="nuevo_fecha_envio" class="form-control datepicker_fecha_envio"  aria-label="Default" aria-describedby="inputGroup-sizing-default" >
                  </div>
                </div>
                <div class="col-md-1">
                  <div class="form-group">
                      <h4>Hora</h4>
                      <input type="time" id="hora_cliente" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                  </div>
                </div>
                <!--<div class="col-md-1">
                  <div class="form-group">
                      <h4>Minutos</h4>
                      <input type="number" id="minutos_cliente" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                  </div>
                </div>-->
                <div class="col-md-3">
                  <div class="form-group">
                      <h4>Producto</h4>
                      <input type="text" id="nuevo_producto" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <h4>Proyecto</h4>
                      <input type="text" id="nuevo_proyecto" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <h4>Tipo de Servicio</h4>
                      <select class="form-control" id="dropdown_tipo_cotizacion_nuevo" >
                          <option value="">Seleccionar</option>
                        <?php
                        // Attempt select query execution
                        $sql1 = "SELECT * FROM tipo_cotizacion ORDER BY tipo_cotizacion ASC";
                        mysql_query("SET NAMES 'utf8'");
                        if($result1 = mysqli_query($conexion, $sql1)){
                            if(mysqli_num_rows($result1) > 0){
                                $i = 0;
                                while($row2 = mysqli_fetch_array($result1)){
                      ?>
                      <option value="<?php echo ($row2['id_tipo_cotizacion']);?>"><?php echo (utf8_encode($row2['tipo_cotizacion']));?></option>
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
                <div class="col-md-3">
                  <div class="form-group">
                      <h4>Subtipo de Servicio</h4>
                      <select class="form-control" id="dropdown_subtipo_cotizacion_nuevo" >
                          <option value="">Seleccionar</option>
                        <?php
                        // Attempt select query execution
                        $sql2 = "SELECT * FROM subtipo_cotizacion ORDER BY nombre_subtipo ASC";
                        mysql_query("SET NAMES 'utf8'");
                        if($result2 = mysqli_query($conexion, $sql2)){
                            if(mysqli_num_rows($result2) > 0){
                                $i = 0;
                                while($row3 = mysqli_fetch_array($result2)){
                      ?>
                      <option value="<?php echo ($row3['id_subtipo']);?>"><?php echo (utf8_encode($row3['nombre_subtipo']));?></option>
                      <?php
                                }
                                // Free result set
                                mysqli_free_result($result2);
                            } else{
                                echo "No hay datos para mostrar.";
                            }
                        } else{
                            echo "ERROR: Could not able to execute $sql2. " . mysqli_error($conexion);
                        }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                      <h4>Detalle</h4>
                      <textarea row="8" id="nuevo_detalle" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"></textarea>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <h4>Precio Objetivo</h4>
                      <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">$</div>
                      </div>
                      <input  type="number"  class="form-control form-control-lg "  id="nuevo_precio_cliente">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <h4>Costo Objetivo</h4>
                      <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">$</div>
                      </div>
                      <input  type="number"  class="form-control form-control-lg "  id="nuevo_costo_presupuestado">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <button type="button" class="btn btn-success btn-block" id="boton_guardar_proyecto"><strong>GUARDAR</strong></button>
                </div>
                <div class="col-md-6">
                  <button type="button" class="btn btn-danger btn-block " data-dismiss="modal"><strong>CANCELAR</strong></button>
                </div>
                  </div>
                </div>
          </div>
        </div>
      </div>

      <!-- Modal Editar Proyecto -->
      <div class="modal fade" id="modal_editar_proyecto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-center modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <form method="POST" id="actualizar_proyecto">
                <div class="row">
                  <div class="col-md-12"><h2>Editar Pedido de Cotización</h2></div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <h4>Cliente</h4>
                        <select class="form-control" id="cliente_dropdown_editar_proyecto" >
                            <option value="">Seleccionar</option>
                          <?php
                          // Attempt select query execution
                          $sql1 = "SELECT * FROM clientes ORDER BY nombre";
                          mysql_query("SET NAMES 'utf8'");
                          if($result1 = mysqli_query($conexion, $sql1)){
                              if(mysqli_num_rows($result1) > 0){
                                  $i = 0;
                                  while($row1 = mysqli_fetch_array($result1)){
                                    if($row1['cliente'] == $row['id_cliente']){
                                    ?>
                                      <option value="<?php echo ($row1['id_cliente']);?>" SELECTED><?php echo (utf8_encode($row1['nombre']));?></option>
                                    <?php
                                    } else {
                                    ?>
                                      <option value="<?php echo ($row1['id_cliente']);?>"><?php echo (utf8_encode($row1['nombre']));?></option>
                                    <?php
                                    }
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
                        <h4>Fecha de Entrega Interna</h4>
                        <input type="date" id="fecha_entrega_editar_proyecto" class="form-control datepicker_fecha_entrega_editar"  aria-label="Default" aria-describedby="inputGroup-sizing-default" >
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                        <h4>Hora</h4>
                        <input type="time" id="hora_interno_editar" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>
                  </div>
                  <!--<div class="col-md-1">
                    <div class="form-group">
                        <h4>Minutos</h4>
                        <input type="number" id="minutos_interno_editar" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>
                  </div>-->
                  <div class="col-md-2">
                    <div class="form-group">
                        <h4>Fecha de Entrega a Cliente</h4>
                        <input type="date" id="fecha_envio_editar_proyecto" class="form-control datepicker_fecha_envio_editar"  aria-label="Default" aria-describedby="inputGroup-sizing-default" >
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                        <h4>Hora</h4>
                        <input type="time" id="hora_cliente_editar" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>
                  </div>
                 <!-- <div class="col-md-1">
                    <div class="form-group">
                        <h4>Minutos</h4>
                        <input type="number" id="minutos_cliente_editar" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>
                  </div>-->
                  <div class="col-md-3">
                    <div class="form-group">
                        <h4>Producto</h4>
                        <input type="text" id="producto_editar_proyecto" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                        <h4>Proyecto</h4>
                        <input type="text" id="nombre_editar_proyecto" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                        <h4>Tipo de Servicio</h4>
                        <select class="form-control" id="dropdown_tipo_cotizacion_editar" >
                            <option value="">Seleccionar</option>
                          <?php
                          // Attempt select query execution
                          $sql2 = "SELECT * FROM tipo_cotizacion ORDER BY tipo_cotizacion ASC";
                          mysql_query("SET NAMES 'utf8'");
                          if($result2 = mysqli_query($conexion, $sql2)){
                              if(mysqli_num_rows($result2) > 0){
                                  $i = 0;
                                  while($row2 = mysqli_fetch_array($result2)){
                                if($row2['tipo_cotizacion'] == $row['tipo_cotizacion']){
                                      ?>
                                        <option value="<?php echo ($row2['id_tipo_cotizacion']);?>" SELECTED><?php echo (utf8_encode($row2['tipo_cotizacion']));?></option>
                                      <?php
                                      } else {
                                      ?>
                                        <option value="<?php echo ($row2['id_tipo_cotizacion']);?>"><?php echo (utf8_encode($row2['tipo_cotizacion']));?></option>
                                      <?php
                                      }
                                  }
                                  // Free result set
                                  mysqli_free_result($result2);
                              } else{
                                  echo "No hay datos para mostrar.";
                              }
                          } else{
                              echo "ERROR: Could not able to execute $sql2. " . mysqli_error($conexion);
                          }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                  <div class="form-group">
                      <h4>Subtipo de Servicio</h4>
                      <select class="form-control" id="dropdown_subtipo_cotizacion_editar" >
                          <option value="">Seleccionar</option>
                        <?php
                        // Attempt select query execution
                        $sql3 = "SELECT * FROM subtipo_cotizacion ORDER BY nombre_subtipo ASC";
                        mysql_query("SET NAMES 'utf8'");
                        if($result3 = mysqli_query($conexion, $sql3)){
                            if(mysqli_num_rows($result3) > 0){
                                $i = 0;
                                while($row4 = mysqli_fetch_array($result3)){
                                  if($row4['id_subtipo_cotizacion'] == $row['subtipo_cotizacion']){
                                  ?>
                                    <option value="<?php echo ($row4['id_subtipo']);?>" SELECTED><?php echo (utf8_encode($row4['nombre_subtipo']));?></option>
                                  <?php
                                  } else {
                                  ?>
                                    <option value="<?php echo ($row4['id_subtipo']);?>"><?php echo (utf8_encode($row4['nombre_subtipo']));?></option>
                                  <?php
                                  }
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
                  <div class="col-md-12">
                    <div class="form-group">
                        <h4>Detalle</h4>
                        <textarea row="8" id="detalle_editar_proyecto" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"></textarea>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <h4>Precio</h4>
                        <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">$</div>
                        </div>
                        <input class="money" type="text" class="form-control form-control-lg" id="precio_cliente_editar_proyecto">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <h4>Costo</h4>
                        <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">$</div>
                        </div>
                        <input  type="number" class="form-control form-control-lg " id="editar_costo_presupuestado">
                        <input type="number" id="id_editar_proyecto" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" hidden>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <h4>Consumido</h4>
                        <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">$</div>
                        </div>
                        <input type="number" class="form-control form-control-lg" id="editar_consumido" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <button type="button" class="btn btn-success btn-block" id="boton_editar_proyecto"><strong>GUARDAR</strong></button>
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
      <!-- Modal Solicitar Adicional -->
      <div class="modal fade" id="modal_solicitar_adicional" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-center modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle" style="margin-left: 15px;">Solicitud de Adicional</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  <span id="mostrar_adicionales"></span>
                  <div class="form-group">
                      <h4>Monto solicitado</h4>
                      <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">$</div>
                      </div>
                      <input type="number" class="form-control form-control-lg" id="mostrar_monto_adicional" value="0" readonly>
                      <input type="number" class="form-control form-control-lg" id="id_proyecto_adicional" value="0" hidden>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <h4>Motivo</h4>
                    <textarea row="8" id="mostrar_motivo_adicional" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="0" readonly></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" id="boton_aprobar_adicional">Aprobar</button>
              <button type="button" class="btn btn-danger" id="boton_denegar_adicional">Denegar</button>
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
