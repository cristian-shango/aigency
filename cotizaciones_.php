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
    
    <title>AiGency | Cotizaciones</title>
    
    <link rel="apple-touch-icon" href="design/assets/images/apple-touch-icon.png">
    <link rel="shortcut icon" href="design/assets/images/favicon.ico">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="design/global/css/bootstrap.min.css">
    <link rel="stylesheet" href="design/global/css/bootstrap-extend.min.css">
    <link rel="stylesheet" href="design/assets/css/site.min.css">
    
    <!-- Plugins -->
    <link rel="stylesheet" href="design/global/vendor/animsition/animsition.css">
    <link rel="stylesheet" href="design/global/vendor/asscrollable/asScrollable.css">
    <link rel="stylesheet" href="design/global/vendor/switchery/switchery.css">
    <link rel="stylesheet" href="design/global/vendor/intro-js/introjs.css">
    <link rel="stylesheet" href="design/global/vendor/slidepanel/slidePanel.css">
    <link rel="stylesheet" href="design/global/vendor/flag-icon-css/flag-icon.css">
        <link rel="stylesheet" href="design/global/vendor/bootstrap-table/bootstrap-table.css">
    
    
    <!-- Fonts -->
    <link rel="stylesheet" href="design/global/fonts/web-icons/web-icons.min.css">
    <link rel="stylesheet" href="design/global/fonts/brand-icons/brand-icons.min.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
    
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
      <div class="page-header">
        <h1 class="page-title">Cotizaciones</h1>
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
                          <th>Proyecto</th>
                          <th>Tipo de Servicio</th>
                          <th>Subtipo de Servicio</th>
                          <th>Detalle</th>
                          <th>Fecha de Entrega</th>
                          <th>Hora de Entrega</th>
                          <th>Costo</th>
                          <th>Saldo</th>
                          <th>Estado</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          // Attempt select query execution
                          $sql = "SELECT * FROM proyectos p INNER JOIN subtipo_cotizacion sc ON p.subtipo_cotizacion = sc.id_subtipo LEFT JOIN clientes c ON p.cliente = c.id_cliente ";
                          mysql_query("SET NAMES 'utf8'");
                          if($result = mysqli_query($conexion, $sql)){
                              if(mysqli_num_rows($result) > 0){
                                  $i = 0;
                                  while($row = mysqli_fetch_array($result)){
                                    $detalle = strlen($row['detalle']) > 50 ? substr($row['detalle'],0,50)."..." : $row['detalle'];
                        ?>
                              <tr>
                              <?php
                                  if ($row['estado'] == "APROBADO"){
                                ?>
                                  <td><a href="cotizacion_aprobada.php?id=<?php echo ($row['id']);?>"><?php echo ($row['id']);?></a></td>
                                <?php
                                  } else {
                                ?>
                                  <td><a href="cargar_cotizaciones.php?id=<?php echo ($row['id']);?>"><?php echo ($row['id']);?></a></td>
                                <?php
                                  }
                                ?>
                              <td scope="row"><?php echo ($row['nombre']);?></td>
                              <td><?php echo ($row['nombre_proyecto']);?></td>
                              <td><?php echo ($row['producto_proyecto']);?></td>
                              <td><?php echo utf8_encode($row['nombre_subtipo']);?></td>
                              <td style="text-align: left;"><?php echo ($detalle);?></td>
                              <td><?php echo ($row['fecha_entrega']);?></td>
                              <td><?php echo ($row['hora_interno']);?>:<?php echo ($row['minutos_interno']);?></td>
                              <td>$ <span class="valor_costo_presupuestado"><?php echo ($row['costo_presupuestado']);?></span></td>
                              <td>$ <span class="valor_saldo"><?php echo ($row['saldo']);?></span></td>
                              <td style="font-weight: bold; text-align: center !important;">
                                 <?php
                                  if ($row['estado'] == "ENTREGADO" OR $row['estado'] == "APROBADO"){
                                ?>
                                    <span class='badge badge-success'><?php echo ($row['estado']);?></span>
                                <?php
                                  }
                                  if ($row['estado'] == "COTIZANDO"){
                                ?>
                                    <span class='badge badge-primary'><?php echo ($row['estado']);?></span>
                                <?php
                                  }
                                  if ($row['estado'] == "AJUSTAR"){
                                ?>
                                    <span class='badge badge-info'><?php echo ($row['estado']);?></span>
                                <?php
                                  }
                                  if ($row['estado'] == "NUEVO"){
                                ?>
                                    <span class='badge badge-danger'><?php echo ($row['estado']);?></span>
                                <?php
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
      </div>
    </div>
    <!-- End Page -->

    <!-- Core  -->
    <script src="design/global/vendor/babel-external-helpers/babel-external-helpers.js"></script>
    <script src="design/global/vendor/jquery/jquery.js"></script>
    <script src="design/global/vendor/popper-js/umd/popper.min.js"></script>
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
  </body>
</html>
