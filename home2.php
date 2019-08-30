<?php
  include "session.php";
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
    
    <title>AiGency | Principal</title>
    
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
        <link rel="stylesheet" href="design/global/vendor/chartist/chartist.css">
        <link rel="stylesheet" href="design/global/vendor/aspieprogress/asPieProgress.css">
        <link rel="stylesheet" href="design/assets/examples/css/dashboard/v2.css">
    
    
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
  <body class="animsition dashboard">
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
            <li class="nav-item dropdown dropdown-fw dropdown-mega">
              <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false" data-animation="fade"
                role="button">Mega <i class="icon wb-chevron-down-mini" aria-hidden="true"></i></a>
              <div class="dropdown-menu" role="menu">
                <div class="mega-content">
                  <div class="row">
                    <div class="col-md-4">
                      <h5>UI Kit</h5>
                      <ul class="blocks-2">
                        <li class="mega-menu m-0">
                          <ul class="list-icons">
                            <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                              <a
                                href="../advanced/animation.html">Animation</a>
                            </li>
                            <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                              <a
                                href="../uikit/buttons.html">Buttons</a>
                            </li>
                            <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                              <a
                                href="../uikit/colors.html">Colors</a>
                            </li>
                            <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                              <a
                                href="../uikit/dropdowns.html">Dropdowns</a>
                            </li>
                            <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                              <a
                                href="../uikit/icons.html">Icons</a>
                            </li>
                            <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                              <a
                                href="../advanced/lightbox.html">Lightbox</a>
                            </li>
                          </ul>
                        </li>
                        <li class="mega-menu m-0">
                          <ul class="list-icons">
                            <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                              <a
                                href="../uikit/modals.html">Modals</a>
                            </li>
                            <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                              <a
                                href="../uikit/panel-structure.html">Panels</a>
                            </li>
                            <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                              <a
                                href="../structure/overlay.html">Overlay</a>
                            </li>
                            <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                              <a
                                href="../uikit/tooltip-popover.html ">Tooltips</a>
                            </li>
                            <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                              <a
                                href="../advanced/scrollable.html">Scrollable</a>
                            </li>
                            <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                              <a
                                href="../uikit/typography.html">Typography</a>
                            </li>
                          </ul>
                        </li>
                      </ul>
                    </div>
                    <div class="col-md-4">
                      <h5>Media
                        <span class="badge badge-pill badge-success">4</span>
                      </h5>
                      <ul class="blocks-3">
                        <li>
                          <a class="thumbnail m-0" href="javascript:void(0)">
                            <img class="w-full" src="design/global/photos/placeholder.png" alt="..." />
                          </a>
                        </li>
                        <li>
                          <a class="thumbnail m-0" href="javascript:void(0)">
                            <img class="w-full" src="design/global/photos/placeholder.png" alt="..." />
                          </a>
                        </li>
                        <li>
                          <a class="thumbnail m-0" href="javascript:void(0)">
                            <img class="w-full" src="design/global/photos/placeholder.png" alt="..." />
                          </a>
                        </li>
                        <li>
                          <a class="thumbnail m-0" href="javascript:void(0)">
                            <img class="w-full" src="design/global/photos/placeholder.png" alt="..." />
                          </a>
                        </li>
                        <li>
                          <a class="thumbnail m-0" href="javascript:void(0)">
                            <img class="w-full" src="design/global/photos/placeholder.png" alt="..." />
                          </a>
                        </li>
                        <li>
                          <a class="thumbnail m-0" href="javascript:void(0)">
                            <img class="w-full" src="design/global/photos/placeholder.png" alt="..." />
                          </a>
                        </li>
                      </ul>
                    </div>
                    <div class="col-md-4">
                      <h5 class="mb-0">Accordion</h5>
                      <!-- Accordion -->
                      <div class="panel-group panel-group-simple" id="siteMegaAccordion" aria-multiselectable="true"
                        role="tablist">
                        <div class="panel">
                          <div class="panel-heading" id="siteMegaAccordionHeadingOne" role="tab">
                            <a class="panel-title" data-toggle="collapse" href="#siteMegaCollapseOne" data-parent="#siteMegaAccordion"
                              aria-expanded="false" aria-controls="siteMegaCollapseOne">
                              Collapsible Group Item #1
                            </a>
                          </div>
                          <div class="panel-collapse collapse" id="siteMegaCollapseOne" aria-labelledby="siteMegaAccordionHeadingOne"
                            role="tabpanel">
                            <div class="panel-body">
                              De moveat laudatur vestra parum doloribus labitur sentire partes, eripuit praesenti
                              congressus ostendit alienae, voluptati ornateque accusamus
                              clamat reperietur convicia albucius.
                            </div>
                          </div>
                        </div>
                        <div class="panel">
                          <div class="panel-heading" id="siteMegaAccordionHeadingTwo" role="tab">
                            <a class="panel-title collapsed" data-toggle="collapse" href="#siteMegaCollapseTwo"
                              data-parent="#siteMegaAccordion" aria-expanded="false"
                              aria-controls="siteMegaCollapseTwo">
                              Collapsible Group Item #2
                            </a>
                          </div>
                          <div class="panel-collapse collapse" id="siteMegaCollapseTwo" aria-labelledby="siteMegaAccordionHeadingTwo"
                            role="tabpanel">
                            <div class="panel-body">
                              Praestabiliorem. Pellat excruciant legantur ullum leniter vacare foris voluptate
                              loco ignavi, credo videretur multoque choro fatemur mortis
                              animus adoptionem, bello statuat expediunt naturales.
                            </div>
                          </div>
                        </div>
    
                        <div class="panel">
                          <div class="panel-heading" id="siteMegaAccordionHeadingThree" role="tab">
                            <a class="panel-title collapsed" data-toggle="collapse" href="#siteMegaCollapseThree"
                              data-parent="#siteMegaAccordion" aria-expanded="false"
                              aria-controls="siteMegaCollapseThree">
                              Collapsible Group Item #3
                            </a>
                          </div>
                          <div class="panel-collapse collapse" id="siteMegaCollapseThree" aria-labelledby="siteMegaAccordionHeadingThree"
                            role="tabpanel">
                            <div class="panel-body">
                              Horum, antiquitate perciperet d conspectum locus obruamus animumque perspici probabis
                              suscipere. Desiderat magnum, contenta poena desiderant
                              concederetur menandri damna disputandum corporum.
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- End Accordion -->
                    </div>
                  </div>
                </div>
              </div>
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
      <div class="page-header h-300 mb-30">
        <div class="text-center blue-grey-800 m-0 mt-50">
          <div class="font-size-50 mb-30 blue-grey-800">Mount Mckinley</div>
          <ul class="list-inline font-size-14">
            <li class="list-inline-item">
              <i class="icon wb-map mr-5" aria-hidden="true"></i> Central and southern
              Alaska
            </li>
            <li class="list-inline-item ml-20">
              <i class="icon wb-heart mr-5" aria-hidden="true"></i> 26,428
            </li>
          </ul>
        </div>
      </div>

      <div class="page-content container-fluid">
        <div class="row" data-plugin="matchHeight" data-by-row="true">
          <div class="col-xxl-3 col-xl-4">
            <!-- Panel Web Designer -->
            <div class="card card-shadow">
              <div class="card-block text-center bg-white p-40">
                <div class="avatar avatar-100 mb-20">
                  <img src="design/global/portraits/1.jpg" alt="">
                </div>
                <p class="font-size-20 blue-grey-700">Breno Bitencourt</p>
                <p class="blue-grey-400 mb-20">Web Designer</p>
                <p class="mb-35">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer
                  nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed
                  nisi. </p>
                <ul class="list-inline font-size-18 mb-35">
                  <li class="list-inline-item">
                    <a class="blue-grey-400" href="javascript:void(0)">
                  <i class="icon bd-twitter" aria-hidden="true"></i>
                </a>
                  </li>
                  <li class="list-inline-item ml-10">
                    <a class="blue-grey-400" href="javascript:void(0)">
                  <i class="icon bd-facebook" aria-hidden="true"></i>
                </a>
                  </li>
                  <li class="list-inline-item ml-10">
                    <a class="blue-grey-400" href="javascript:void(0)">
                  <i class="icon bd-dribbble" aria-hidden="true"></i>
                </a>
                  </li>
                  <li class="list-inline-item ml-10">
                    <a class="blue-grey-400" href="javascript:void(0)">
                  <i class="icon bd-instagram" aria-hidden="true"></i>
                </a>
                  </li>
                </ul>
                <button type="button" class="btn btn-primary px-40">Follow</button>
              </div>
            </div>
            <!-- End Panel Web Designer -->
          </div>

          <div class="col-xxl-6 col-xl-8">
            <!-- Panel Traffic -->
            <div class="card card-shadow example-responsive" id="widgetLinearea">
              <div class="card-block p-30" style="min-width:480px;">
                <div class="row pb-20" style="height:calc(100% - 322px);">
                  <div class="col-md-8 col-sm-6">
                    <div class="blue-grey-700">YOUR TRAFFIC VIEWS</div>
                  </div>
                  <div class="col-md-4 col-sm-6">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="counter counter-md">
                          <div class="counter-number-group text-nowrap">
                            <span class="counter-number">76</span>
                            <span class="counter-number-related">%</span>
                          </div>
                          <div class="counter-label blue-grey-400">PC Browser</div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="counter counter-md">
                          <div class="counter-number-group text-nowrap">
                            <span class="counter-number">24</span>
                            <span class="counter-number-related">%</span>
                          </div>
                          <div class="counter-label blue-grey-400">Mobile Phone</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="ct-chart mb-30" style="height:270px;"></div>
                <ul class="list-inline text-center mb-0">
                  <li class="list-inline-item">
                    <i class="icon wb-large-point blue-200 mr-10" aria-hidden="true"></i>                    PC BROWSER
                  </li>
                  <li class="list-inline-item ml-35">
                    <i class="icon wb-large-point teal-200 mr-10" aria-hidden="true"></i>                    MOBILE PHONE
                  </li>
                </ul>
              </div>
            </div>
            <!-- End Panel Traffic -->
          </div>

          <div class="col-xxl-3">
            <div class="row h-full">
              <div class="col-xxl-12 col-lg-6 h-p50 h-only-lg-p100 h-only-xl-p100">
                <!-- Panel Overall Sales -->
                <div class="card card-shadow card-inverse bg-blue-600 white">
                  <div class="card-block p-30">
                    <div class="counter counter-lg counter-inverse text-left">
                      <div class="counter-label mb-20">
                        <div>OVERALL SALES</div>
                        <div>Lorem ipsum dolor sit amet</div>
                      </div>
                      <div class="counter-number-group mb-15">
                        <span class="counter-number-related">$</span>
                        <span class="counter-number">14,000</span>
                      </div>
                      <div class="counter-label">
                        <div class="progress progress-xs mb-10 bg-blue-800">
                          <div class="progress-bar progress-bar-info bg-white" style="width: 42%" aria-valuemax="100"
                            aria-valuemin="0" aria-valuenow="42" role="progressbar">
                            <span class="sr-only">42%</span>
                          </div>
                        </div>
                        <div class="counter counter-sm text-left">
                          <div class="counter-number-group">
                            <span class="counter-number font-size-14">42%</span>
                            <span class="counter-number-related font-size-14">HIGHER THAN LAST MONTH</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Panel Overall Sales -->
              </div>

              <div class="col-xxl-12 col-lg-6 h-p50 h-only-lg-p100 h-only-xl-p100">
                <!-- Panel Today's Sales -->
                <div class="card card-shadow card-inverse bg-red-600 white">
                  <div class="card-block p-30">
                    <div class="counter counter-lg counter-inverse text-left">
                      <div class="counter-label mb-20">
                        <div>TODAY'S SALES</div>
                        <div>Lorem ipsum dolor sit amet</div>
                      </div>
                      <div class="counter-number-group mb-10">
                        <span class="counter-number-related">$</span>
                        <span class="counter-number">41,160</span>
                      </div>
                      <div class="counter-label">
                        <div class="progress progress-xs mb-10 bg-red-800">
                          <div class="progress-bar progress-bar-info bg-white" style="width: 70%" aria-valuemax="100"
                            aria-valuemin="0" aria-valuenow="70" role="progressbar">
                            <span class="sr-only">70%</span>
                          </div>
                        </div>
                        <div class="counter counter-sm text-left">
                          <div class="counter-number-group">
                            <span class="counter-number font-size-14">70%</span>
                            <span class="counter-number-related font-size-14">HIGHER THAN LAST MONTH</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Panel Today's Sales -->
              </div>
            </div>
          </div>
        </div>

        <div class="row" data-plugin="matchHeight" data-by-row="true">
          <div class="col-xl-4 col-lg-6">
            <!-- Panel Followers -->
            <div class="panel" id="followers">
              <div class="panel-heading">
                <h3 class="panel-title">
                  Followers
                </h3>
                <div class="panel-actions panel-actions-keep">
                  <div class="dropdown">
                    <a class="panel-action" id="examplePanelDropdown" data-toggle="dropdown" href="#"
                      aria-expanded="false" role="button"><i class="icon wb-more-vertical" aria-hidden="true"></i></a>
                    <div class="dropdown-menu dropdown-menu-bullet dropdown-menu-right" aria-labelledby="examplePanelDropdown"
                      role="menu">
                      <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-flag" aria-hidden="true"></i> Action</a>
                      <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-print" aria-hidden="true"></i> Another action</a>
                      <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-heart" aria-hidden="true"></i> Something else here</a>
                      <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-share" aria-hidden="true"></i> Separated link</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <ul class="list-group list-group-dividered list-group-full h-300" data-plugin="scrollable">
                  <div data-role="container">
                    <div data-role="content">
                      <li class="list-group-item">
                        <div class="media">
                          <div class="pr-20">
                            <a class="avatar avatar-online" href="javascript:void(0)">
                              <img src="design/global/portraits/9.jpg" alt="">
                              <i></i>
                            </a>
                          </div>
                          <div class="media-body w-full">
                            <div class="float-right">
                              <button type="button" class="btn btn-outline btn-default btn-sm">Follow</button>
                            </div>
                            <div>
                              <span>Willard Wood</span>
                            </div>
                            <small>@heavybutterfly920</small>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item">
                        <div class="media">
                          <div class="pr-20">
                            <a class="avatar avatar-away" href="javascript:void(0)">
                              <img src="design/global/portraits/10.jpg" alt="">
                              <i></i>
                            </a>
                          </div>
                          <div class="media-body w-full">
                            <div class="float-right">
                              <button type="button" class="btn btn-success btn-sm"><i class="icon wb-check" aria-hidden="true"></i>Following</button>
                            </div>
                            <div>
                              <span>Ronnie Ellis</span>
                            </div>
                            <small>@kingronnie24</small>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item">
                        <div class="media">
                          <div class="pr-20">
                            <a class="avatar avatar-busy" href="javascript:void(0)">
                              <img src="design/global/portraits/11.jpg" alt="">
                              <i></i>
                            </a>
                          </div>
                          <div class="media-body w-full">
                            <div class="float-right">
                              <button type="button" class="btn btn-outline btn-default btn-sm">Follow</button>
                            </div>
                            <div>
                              <span>Gwendolyn Wheeler</span>
                            </div>
                            <small>@perttygirl66</small>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item">
                        <div class="media">
                          <div class="pr-20">
                            <a class="avatar avatar-off" href="javascript:void(0)">
                              <img src="design/global/portraits/12.jpg" alt="">
                              <i></i>
                            </a>
                          </div>
                          <div class="media-body w-full">
                            <div class="float-right">
                              <button type="button" class="btn btn-outline btn-default btn-sm">Follow</button>
                            </div>
                            <div>
                              <span>Daniel Russell</span>
                            </div>
                            <small>@danieltiger08</small>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item">
                        <div class="media">
                          <div class="pr-20">
                            <a class="avatar avatar-online" href="javascript:void(0)">
                              <img src="design/global/portraits/9.jpg" alt="">
                              <i></i>
                            </a>
                          </div>
                          <div class="media-body w-full">
                            <div class="float-right">
                              <button type="button" class="btn btn-outline btn-default btn-sm">Follow</button>
                            </div>
                            <div>
                              <span>Willard Wood</span>
                            </div>
                            <small>@heavybutterfly920</small>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item">
                        <div class="media">
                          <div class="pr-20">
                            <a class="avatar avatar-away" href="javascript:void(0)">
                              <img src="design/global/portraits/10.jpg" alt="">
                              <i></i>
                            </a>
                          </div>
                          <div class="media-body w-full">
                            <div class="float-right">
                              <button type="button" class="btn btn-success btn-sm"><i class="icon wb-check" aria-hidden="true"></i>Following</button>
                            </div>
                            <div>
                              <span>Ronnie Ellis</span>
                            </div>
                            <small>@kingronnie24</small>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item">
                        <div class="media">
                          <div class="pr-20">
                            <a class="avatar avatar-busy" href="javascript:void(0)">
                              <img src="design/global/portraits/11.jpg" alt="">
                              <i></i>
                            </a>
                          </div>
                          <div class="media-body w-full">
                            <div class="float-right">
                              <button type="button" class="btn btn-outline btn-default btn-sm">Follow</button>
                            </div>
                            <div>
                              <span>Gwendolyn Wheeler</span>
                            </div>
                            <small>@perttygirl66</small>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item">
                        <div class="media">
                          <div class="pr-20">
                            <a class="avatar avatar-off" href="javascript:void(0)">
                              <img src="design/global/portraits/12.jpg" alt="">
                              <i></i>
                            </a>
                          </div>
                          <div class="media-body w-full">
                            <div class="float-right">
                              <button type="button" class="btn btn-outline btn-default btn-sm">Follow</button>
                            </div>
                            <div>
                              <span>Daniel Russell</span>
                            </div>
                            <small>@danieltiger08</small>
                          </div>
                        </div>
                      </li>
                    </div>
                  </div>
                </ul>
              </div>
            </div>
            <!-- End Panel Followers -->
          </div>

          <div class="col-xl-4 col-lg-6">
            <!-- Panel Tickets -->
            <div class="panel">
              <div class="panel-heading">
                <h3 class="panel-title">Tickets</h3>
                <div class="panel-actions panel-actions-keep">
                  <div class="dropdown">
                    <a class="panel-action" id="examplePanelDropdown" data-toggle="dropdown" href="#"
                      aria-expanded="false" role="button"><i class="icon wb-more-vertical" aria-hidden="true"></i></a>
                    <div class="dropdown-menu dropdown-menu-bullet dropdown-menu-right" aria-labelledby="examplePanelDropdown"
                      role="menu">
                      <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-flag" aria-hidden="true"></i> Action</a>
                      <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-print" aria-hidden="true"></i> Another action</a>
                      <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-heart" aria-hidden="true"></i> Something else here</a>
                      <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-share" aria-hidden="true"></i> Separated link</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <ul class="list-group list-group-dividered list-group-full h-300" data-plugin="scrollable">
                  <div data-role="container">
                    <div data-role="content">
                      <li class="list-group-item justify-content-between">
                        <small class="badge badge-round badge-info float-right">Completed</small>
                        <p>
                          <span>Server unavaible</span>
                          <span>[13060]</span>
                        </p>
                        <small>Opened by
                          <a class="hightlight" href="javascript:void(0)">
                            <span class="avatar avatar-xs">
                              <img src="design/global/portraits/1.jpg" alt="">
                            </span>
                            <span>Herman Beck</span>
                          </a>
                          <time datetime="2018-07-01T08:55">2 hours ago</time>
                        </small>
                      </li>
                      <li class="list-group-item justify-content-between">
                        <small class="badge badge-round badge-warning float-right">Pendening</small>
                        <p>
                          <span>Mobile App Problem</span>
                          <span>[13061]</span>
                        </p>
                        <small>Opened by
                          <a class="hightlight" href="javascript:void(0)">
                            <span class="avatar avatar-xs">
                              <img src="design/global/portraits/2.jpg" alt="">
                            </span>
                            <span>Mary Adams</span>
                          </a>
                          <time datetime="2018-07-01T07:55">1 hour ago</time>
                        </small>
                      </li>
                      <li class="list-group-item justify-content-between">
                        <small class="badge badge-round badge-primary float-right">In progress</small>
                        <p>
                          <span>IE8 problem</span>
                          <span>[13062]</span>
                        </p>
                        <small>Opened by
                          <a class="hightlight" href="javascript:void(0)">
                            <span class="avatar avatar-xs">
                              <img src="design/global/portraits/3.jpg" alt="">
                            </span>
                            <span>Caleb Richards</span>
                          </a>
                          <time datetime="2018-06-28T21:05">3 days ago</time>
                        </small>
                      </li>
                      <li class="list-group-item justify-content-between">
                        <small class="badge badge-round badge-danger float-right">Rejected</small>
                        <p>
                          <span>Respoonsive problem</span>
                          <span>[13063]</span>
                        </p>
                        <small>Opened by
                          <a class="hightlight" href="javascript:void(0)">
                            <span class="avatar avatar-xs">
                              <img src="design/global/portraits/4.jpg" alt="">
                            </span>
                            <span>June Lane</span>
                          </a>
                          <time datetime="2018-06-27T13:05">4 days ago</time>
                        </small>
                      </li>
                      <li class="list-group-item justify-content-between">
                        <small class="badge badge-round badge-info float-right">Completed</small>
                        <p>
                          <span>Server unavaible</span>
                          <span>[13060]</span>
                        </p>
                        <small>Opened by
                          <a class="hightlight" href="javascript:void(0)">
                            <span class="avatar avatar-xs">
                              <img src="design/global/portraits/5.jpg" alt="">
                            </span>
                            <span>Herman Beck</span>
                          </a>
                          <time datetime="2018-07-01T08:55">2 hours ago</time>
                        </small>
                      </li>
                      <li class="list-group-item justify-content-between">
                        <small class="badge badge-round badge-warning float-right">Pendening</small>
                        <p>
                          <span>Mobile App Problem</span>
                          <span>[13061]</span>
                        </p>
                        <small>Opened by
                          <a class="hightlight" href="javascript:void(0)">
                            <span class="avatar avatar-xs">
                              <img src="design/global/portraits/6.jpg" alt="">
                            </span>
                            <span>Mary Adams</span>
                          </a>
                          <time datetime="2018-07-01T07:55">1 hour ago</time>
                        </small>
                      </li>
                      <li class="list-group-item justify-content-between">
                        <small class="badge badge-round badge-primary float-right">In progress</small>
                        <p>
                          <span>IE8 problem</span>
                          <span>[13062]</span>
                        </p>
                        <small>Opened by
                          <a class="hightlight" href="javascript:void(0)">
                            <span class="avatar avatar-xs">
                              <img src="design/global/portraits/7.jpg" alt="">
                            </span>
                            <span>Caleb Richards</span>
                          </a>
                          <time datetime="2018-06-28T21:05">3 days ago</time>
                        </small>
                      </li>
                      <li class="list-group-item justify-content-between">
                        <small class="badge badge-round badge-danger float-right">Rejected</small>
                        <p>
                          <span>Respoonsive problem</span>
                          <span>[13063]</span>
                        </p>
                        <small>Opened by
                          <a class="hightlight" href="javascript:void(0)">
                            <span class="avatar avatar-xs">
                              <img src="design/global/portraits/8.jpg" alt="">
                            </span>
                            <span>June Lane</span>
                          </a>
                          <time datetime="2018-06-27T13:05">4 days ago</time>
                        </small>
                      </li>
                    </div>
                  </div>
                </ul>
              </div>
            </div>
            <!-- End Panel Tickets -->
          </div>

          <div class="col-xl-4 col-lg-12">
            <!-- Panel Title -->
            <div class="card card-shadow" id="widgetGmap">
              <div class="map h-full" id="gmap"></div>
            </div>
            <!-- End Panel Title -->
          </div>
        </div>
      </div>
    </div>
    <!-- End Page -->

    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>



    <!-- Footer -->
    <footer class="site-footer">
      <div class="site-footer-legal">© 2018 <a href="http://themeforest.net/item/remark-responsive-bootstrap-admin-template/11989202">Remark</a></div>
      <div class="site-footer-right">
        Crafted with <i class="red-600 wb wb-heart"></i> by <a href="https://themeforest.net/user/creation-studio">Creation Studio</a>
      </div>
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
        <script src="design/global/vendor/chartist/chartist.min.js"></script>
        <script src="design/global/vendor/gmaps/gmaps.js"></script>
        <script src="design/global/vendor/matchheight/jquery.matchHeight-min.js"></script>
    
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
        <script src="design/global/js/Plugin/gmaps.js"></script>
        <script src="design/global/js/Plugin/matchheight.js"></script>
        <script src="design/global/js/Plugin/asscrollable.js"></script>
    
        <script src="design/assets/examples/js/dashboard/v2.js"></script>
  </body>
</html>
