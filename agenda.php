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

    <title>AiGency | Agenda</title>

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
        <link rel="stylesheet" href="design/global/vendor/fullcalendar/fullcalendar.css">
        <link rel="stylesheet" href="design/global/vendor/bootstrap-datepicker/bootstrap-datepicker.css">
        <link rel="stylesheet" href="design/global/vendor/bootstrap-touchspin/bootstrap-touchspin.css">
        <link rel="stylesheet" href="design/global/vendor/jquery-selective/jquery-selective.css">
        <link rel="stylesheet" href="design/assets/examples/css/apps/calendar.css">


    <!-- Fonts -->
    <link rel="stylesheet" href="design/global/fonts/web-icons/web-icons.min.css">
    <link rel="stylesheet" href="design/global/fonts/brand-icons/brand-icons.min.css">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

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
  <body class="animsition app-calendar page-aside-left">
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
          <img class="navbar-brand-logo" src="design/assets/images/logo.png" title="AiGency">
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
                        <a class="animsition-link" href="../layouts/menu-collapsed-alt.html">
                          <span class="site-menu-title">Pagos</span>
                        </a>
                      </li>
                      <li class="site-menu-item">
                        <a class="animsition-link" href="../layouts/menu-expended.html">
                          <span class="site-menu-title">Facturación</span>
                        </a>
                      </li>
                      <li class="site-menu-item">
                        <a class="animsition-link" href="../layouts/grids.html">
                          <span class="site-menu-title">Bancos</span>
                        </a>
                      </li>
                      <li class="site-menu-item">
                        <a class="animsition-link" href="../layouts/layout-grid.html">
                          <span class="site-menu-title">Gastos</span>
                        </a>
                      </li>
                      <li class="site-menu-item">
                        <a class="animsition-link" href="../layouts/headers.html">
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
        <div class="page-aside-inner page-aside-scroll">
          <div data-role="container">
            <div data-role="content">
              <section class="page-aside-section">
                <h5 class="page-aside-title">FILTRAR POR AREA</h5>
                <div class="list-group has-actions">
                  <?php
                    $sql_area = "SELECT * FROM agenda_area";
                    mysql_query("SET NAMES 'utf8'");
                    if($result_area = mysqli_query($conexion, $sql_area)){
                        if(mysqli_num_rows($result_area) > 0){
                            $i = 0;
                            while($row_area = mysqli_fetch_array($result_area)){
                              $id_contar = $row_area['id_agenda_area'];
                              $sql_contar_agenda = "SELECT count(*) as total from agenda_proyectos WHERE ap_area = $id_contar";
                        $resultado_contar_agenda = mysqli_query($conexion, $sql_contar_agenda);
                        $datos_contar_agenda=mysqli_fetch_assoc($resultado_contar_agenda);
                  ?>
                  <div class="list-group-item" data-plugin="editlist">
                    <div class="list-content">
                      <span class="item-right"><strong><?php echo ($datos_contar_agenda['total']);?></strong></span>
                      <span class="list-text"><i class="wb-medium-point <?php echo utf8_encode($row_area['agenda_color_area']);?>-600 mr-10" aria-hidden="true"></i><?php echo utf8_encode($row_area['agenda_tipo_area']);?></span>
                    </div>
                  </div>
                  <?php
                            }
                            mysqli_free_result($result_area);
                        } else{
                            echo "<strong style='font-size: 1.2em;'>No hay cotizaciones cargadas.</strong>";
                        }
                    } else{
                            echo "ERROR: Could not able to execute $sql_area. " . mysqli_error($conexion);
                      }
                  ?>
                </div>
              </section>
              <section class="page-aside-section">
                <h5 class="page-aside-title">PROYECTOS</h5>
                <div class="list-group calendar-list">
                  <?php
                    $sql_proyectos = "SELECT * FROM agenda_proyectos ap INNER JOIN agenda_area aa ON ap.ap_area = aa.id_agenda_area";
                    mysql_query("SET NAMES 'utf8'");
                    if($result_proyectos = mysqli_query($conexion, $sql_proyectos)){
                        if(mysqli_num_rows($result_proyectos) > 0){
                            $i = 0;
                            while($row_proyectos = mysqli_fetch_array($result_proyectos)){
                  ?>
                            <a class="list-group-item calendar-event" data-title="<?php echo utf8_encode($row_proyectos['pa_tarea']);?>" data-stick=true
                              data-color="red-600" href="javascript:void(0)">
                              <i class="wb-medium-point <?php echo utf8_encode($row_proyectos['agenda_color_area']);?>-600 mr-10" aria-hidden="true"></i><?php echo utf8_encode($row_proyectos['pa_tarea']);?>
                            </a>
                  <?php
                        }
                        mysqli_free_result($result_proyectos);
                      }
                    }
                  ?>
                  <a id="addNewEventBtn" class="list-group-item" href="javascript:void(0)"> <i class="icon wb-plus" aria-hidden="true"></i> Agregar Proyecto </a>
                </div>
              </section>
            </div>
          </div>
        </div>
      </div>

      <div class="page-main">
        <div class="calendar-container">
          <div id="calendar"></div>

          <!--AddEvent Dialog -->
          <div class="modal fade" id="addNewEvent" aria-hidden="true" aria-labelledby="addNewEvent"
            role="dialog" tabindex="-1">
            <div class="modal-dialog modal-simple">
              <form class="modal-content form-horizontal" action="#" method="post" role="form">
                <div class="modal-header">
                  <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
                  <h4 class="modal-title">New Event</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="ename">Name:</label>
                    <div class="col-md-10">
                      <input type="text" class="form-control" id="ename" name="ename">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="starts">Starts:</label>
                    <div class="col-md-10">
                      <div class="input-group">
                        <input type="text" class="form-control" id="starts" data-container="#addNewEvent"
                          data-plugin="datepicker">
                        <span class="input-group-addon">
                          <i class="icon wb-calendar" aria-hidden="true"></i>
                        </span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="ends">Ends:</label>
                    <div class="col-md-10">
                      <div class="input-group">
                        <input type="text" class="form-control" id="ends" data-container="#addNewEvent"
                          data-plugin="datepicker">
                        <span class="input-group-addon">
                          <i class="icon wb-calendar" aria-hidden="true"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="repeats">Repeats:</label>
                    <div class="col-md-10">
                      <input type="text" class="form-control" id="repeats" name="repeats" data-plugin="TouchSpin"
                        data-min="0" data-max="10" value="0" />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="form-control-label col-md-2">Color:</label>
                    <div class="col-md-10">
                      <ul class="color-selector">
                        <li class="bg-blue-600">
                          <input type="radio" checked name="eventColorChosen" id="eventColorChosen2">
                          <label for="eventColorChosen2"></label>
                        </li>
                        <li class="bg-green-600">
                          <input type="radio" name="eventColorChosen" id="eventColorChosen3">
                          <label for="eventColorChosen3"></label>
                        </li>
                        <li class="bg-cyan-600">
                          <input type="radio" name="eventColorChosen" id="eventColorChosen4">
                          <label for="eventColorChosen4"></label>
                        </li>
                        <li class="bg-orange-600">
                          <input type="radio" name="eventColorChosen" id="eventColorChosen5">
                          <label for="eventColorChosen5"></label>
                        </li>
                        <li class="bg-red-600">
                          <input type="radio" name="eventColorChosen" id="eventColorChosen6">
                          <label for="eventColorChosen6"></label>
                        </li>
                        <li class="bg-blue-grey-600">
                          <input type="radio" name="eventColorChosen" id="eventColorChosen7">
                          <label for="eventColorChosen7"></label>
                        </li>
                        <li class="bg-purple-600">
                          <input type="radio" name="eventColorChosen" id="eventColorChosen8">
                          <label for="eventColorChosen8"></label>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="people">People:</label>
                    <div class="col-md-10">
                      <select id="eventPeople" multiple="multiple" class="plugin-selective"></select>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <div class="form-actions">
                    <button class="btn btn-primary" data-dismiss="modal" type="button">Add this event</button>
                    <a class="btn btn-sm btn-white" data-dismiss="modal" href="javascript:void(0)">Cancel</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- End AddEvent Dialog -->

          <!-- Edit Dialog -->
          <div class="modal fade" id="editNewEvent" aria-hidden="true" aria-labelledby="editNewEvent"
            role="dialog" tabindex="-1" data-show="false">
            <div class="modal-dialog modal-simple">
              <form class="modal-content form-horizontal" action="#" method="post" role="form">
                <div class="modal-header">
                  <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
                  <h4 class="modal-title">Edit Event</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="editEname">Name:</label>
                    <div class="col-md-10">
                      <input type="text" class="form-control" id="editEname" name="editEname">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="editStarts">Starts:</label>
                    <div class="col-md-10">
                      <div class="input-group">
                        <input type="text" class="form-control" id="editStarts" name="editStarts" data-container="#editNewEvent"
                          data-plugin="datepicker">
                        <span class="input-group-addon">
                          <i class="icon wb-calendar" aria-hidden="true"></i>
                        </span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="editEnds">Ends:</label>
                    <div class="col-md-10">
                      <div class="input-group">
                        <input type="text" class="form-control" id="editEnds" data-container="#editNewEvent"
                          data-plugin="datepicker">
                        <span class="input-group-addon">
                          <i class="icon wb-calendar" aria-hidden="true"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="editRepeats">Repeats:</label>
                    <div class="col-md-10">
                      <input type="text" class="form-control" id="editRepeats" name="repeats" data-plugin="TouchSpin"
                        data-min="0" data-max="10" value="0" />
                    </div>
                  </div>
                  <div class="form-group row" id="editColor">
                    <label class="form-control-label col-md-2">Color:</label>
                    <div class="col-md-10">
                      <ul class="color-selector">
                        <li class="bg-blue-600">
                          <input type="radio" data-color="blue|600" name="colorChosen" id="editColorChosen2">
                          <label for="editColorChosen2"></label>
                        </li>
                        <li class="bg-green-600">
                          <input type="radio" data-color="green|600" name="colorChosen" id="editColorChosen3">
                          <label for="editColorChosen3"></label>
                        </li>
                        <li class="bg-cyan-600">
                          <input type="radio" data-color="cyan|600" name="colorChosen" id="editColorChosen4">
                          <label for="editColorChosen4"></label>
                        </li>
                        <li class="bg-orange-600">
                          <input type="radio" data-color="orange|600" name="colorChosen" id="editColorChosen5">
                          <label for="editColorChosen4"></label>
                        </li>
                        <li class="bg-red-600">
                          <input type="radio" data-color="red|600" name="colorChosen" id="editColorChosen6">
                          <label for="editColorChosen6"></label>
                        </li>
                        <li class="bg-blue-grey-600">
                          <input type="radio" data-color="blue-grey|600" name="colorChosen" id="editColorChosen7">
                          <label for="editColorChosen7"></label>
                        </li>
                        <li class="bg-purple-600">
                          <input type="radio" data-color="purple|600" name="colorChosen" id="editColorChosen8">
                          <label for="editColorChosen8"></label>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="editPeople">People:</label>
                    <div class="col-md-10">
                      <select id="editPeople" multiple="multiple" class="plugin-selective"></select>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <div class="form-actions">
                    <button class="btn btn-primary" data-dismiss="modal" type="button">Save</button>
                    <button class="btn btn-danger" data-dismiss="modal" type="button">Delete</button>
                    <a class="btn btn-sm btn-white" data-dismiss="modal" href="javascript:void(0)">Cancel</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- End EditEvent Dialog -->

          <!--AddCalendar Dialog -->
          <div class="modal fade" id="addNewCalendar" aria-hidden="true" aria-labelledby="addNewCalendar"
            role="dialog" tabindex="-1">
            <div class="modal-dialog modal-simple">
              <form class="modal-content form-horizontal" action="#" method="post" role="form">
                <div class="modal-header">
                  <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
                  <h4 class="modal-title">New Calendar</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="ename">Name:</label>
                    <div class="col-md-10">
                      <input type="text" class="form-control" id="ename" name="ename">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="form-control-label col-md-2">Color:</label>
                    <div class="col-md-10">
                      <ul class="color-selector">
                        <li class="bg-blue-600">
                          <input type="radio" checked name="colorChosen" id="colorChosen2">
                          <label for="colorChosen2"></label>
                        </li>
                        <li class="bg-green-600">
                          <input type="radio" name="colorChosen" id="colorChosen3">
                          <label for="colorChosen3"></label>
                        </li>
                        <li class="bg-cyan-600">
                          <input type="radio" name="colorChosen" id="colorChosen4">
                          <label for="colorChosen4"></label>
                        </li>
                        <li class="bg-orange-600">
                          <input type="radio" name="colorChosen" id="colorChosen5">
                          <label for="colorChosen5"></label>
                        </li>
                        <li class="bg-red-600">
                          <input type="radio" name="colorChosen" id="colorChosen6">
                          <label for="colorChosen6"></label>
                        </li>
                        <li class="bg-blue-grey-600">
                          <input type="radio" name="colorChosen" id="colorChosen7">
                          <label for="colorChosen7"></label>
                        </li>
                        <li class="bg-purple-600">
                          <input type="radio" name="colorChosen" id="colorChosen8">
                          <label for="colorChosen8"></label>
                        </li>
                      </ul>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="people">People:</label>
                    <div class="col-md-10">
                      <select id="people" multiple="multiple" class="plugin-selective"></select>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <div class="form-actions">
                    <button class="btn btn-primary" data-dismiss="modal" type="button">Create</button>
                    <a class="btn btn-sm btn-white" data-dismiss="modal" href="javascript:void(0)">Cancel</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- End AddCalendar Dialog -->
        </div>
      </div>
    </div>

    <!-- Site Action -->
    <div class="site-action" data-plugin="actionBtn">
      <button type="button" class="site-action-toggle btn-raised btn btn-success btn-floating">
        <i class="front-icon wb-plus animation-scale-up" aria-hidden="true"></i>
        <i class="back-icon wb-trash animation-scale-up" aria-hidden="true"></i>
      </button>
    </div>
    <!-- End Site Action -->

    <!-- Add Calendar Form -->
    <div class="modal fade" id="addNewCalendarForm" aria-hidden="true" aria-labelledby="addNewCalendarForm"
      role="dialog" tabindex="-1">
      <div class="modal-dialog modal-simple">
        <form class="modal-content" action="#" method="post" role="form">
          <div class="modal-header">
            <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
            <h4 class="modal-title">Create New Calendar</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label class="form-control-label mb-15" for="name">Calendar name:</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Calendar name">
            </div>
            <div class="form-group">
              <label class="form-control-label mb-15" for="name">Choice people to your project:</label>
              <select multiple="multiple" class="plugin-selective"></select>
            </div>
          </div>
          <div class="modal-footer">
            <div class="form-actions">
              <button class="btn btn-primary" data-dismiss="modal" type="button">Create</button>
              <a class="btn btn-sm btn-white" data-dismiss="modal" href="javascript:void(0)">Cancel</a>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- End Add Calendar Form -->


    <!-- Footer -->
    <footer class="site-footer">
      <div class="site-footer-legal">© 2019</div>
    </footer>
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
        <script src="design/global/vendor/jquery-ui/jquery-ui.min.js"></script>
        <script src="design/global/vendor/moment/moment.min.js"></script>
        <script src="design/global/vendor/fullcalendar/fullcalendar.js"></script>
        <script src="design/global/vendor/jquery-selective/jquery-selective.min.js"></script>
        <script src="design/global/vendor/bootstrap-datepicker/bootstrap-datepicker.js"></script>
        <script src="design/global/vendor/bootstrap-touchspin/bootstrap-touchspin.min.js"></script>
        <script src="design/global/vendor/bootbox/bootbox.js"></script>

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
        <script src="design/global/js/Plugin/bootstrap-touchspin.js"></script>
        <script src="design/global/js/Plugin/bootstrap-datepicker.js"></script>
        <script src="design/global/js/Plugin/material.js"></script>
        <script src="design/global/js/Plugin/action-btn.js"></script>
        <script src="design/global/js/Plugin/editlist.js"></script>
        <script src="design/global/js/Plugin/bootbox.js"></script>
        <script src="design/assets/js/Site.js"></script>
        <script src="design/assets/js/App/Calendar.js"></script>

        <script src="design/assets/examples/js/apps/calendar.js"></script>
  </body>
</html>
