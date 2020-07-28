<!-- INI TAMPILAN INDUKNYA -->
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Chameleon Admin is a modern Bootstrap 4 webapp &amp; admin dashboard html template with a large number of components, elegant design, clean and organized code.">
  <meta name="keywords" content="admin template, Chameleon admin template, dashboard template, gradient admin template, responsive admin template, webapp, eCommerce dashboard, analytic dashboard">
  <meta name="author" content="ThemeSelect">
  <title>SISTEM MONITORING</title>
  <link rel="apple-touch-icon" href="<?= base_url('assets') ?>/theme-assets/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets') ?>/theme-assets/images/ico/favicon.ico">

  <script src="<?= base_url('assets') ?>/theme-assets/jquery/jquery-3.5.1.min.js"></script>

  <!-- datatables dependencies -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/theme-assets/datatables/dataTables.bootstrap4.min.css">

  <link href="<?= base_url('assets') ?>/https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
  <link href="<?= base_url('assets') ?>/https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets') ?>/theme-assets/css/vendors.css">
  <link rel="stylesheet" type="text/css" href=" <?= base_url('assets') ?>/theme-assets/vendors/css/charts/chartist.css">
  <!-- END VENDOR CSS-->
  <!-- BEGIN CHAMELEON  CSS-->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets') ?>/theme-assets/css/app-lite.css">
  <!-- END CHAMELEON  CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets') ?>/theme-assets/css/core/menu/menu-types/vertical-menu.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets') ?>/theme-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets') ?>/theme-assets/css/pages/dashboard-ecommerce.css">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <!-- END Custom CSS-->
</head>

<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-chartbg" data-col="2-columns">

  <!-- fixed-top-->
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light">
    <div class="navbar-wrapper">
      <div class="navbar-container content">
        <div class="collapse navbar-collapse show" id="navbar-mobile">
          <ul class="nav navbar-nav mr-auto float-left">
            <li class="nav-item d-block d-md-none"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="<?= base_url('assets') ?>/#"><i class="ft-menu"></i></a></li>
            <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="<?= base_url('assets') ?>/#"><i class="ficon ft-maximize"></i></a></li>
            <li class="nav-item dropdown navbar-search"><a class="nav-link dropdown-toggle hide" data-toggle="dropdown" href="<?= base_url('assets') ?>/#"><i class="ficon ft-search"></i></a>
              <ul class="dropdown-menu">
                <li class="arrow_box">
                  <form>
                    <div class="input-group search-box">
                      <div class="position-relative has-icon-right full-width">
                        <input class="form-control" id="search" type="text" placeholder="Search here...">
                        <div class="form-control-position navbar-search-close"><i class="ft-x"> </i></div>
                      </div>
                    </div>
                  </form>
                </li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav float-right">
            <!--<li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="<?= base_url('assets') ?>/#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-us"></i><span class="selected-language"></span></a>
                <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                  <div class="arrow_box"><a class="dropdown-item" href="<?= base_url('assets') ?>/#"><i class="flag-icon flag-icon-us"></i> English</a><a class="dropdown-item" href="<?= base_url('assets') ?>/#"><i class="flag-icon flag-icon-cn"></i> Chinese</a><a class="dropdown-item" href="<?= base_url('assets') ?>/#"><i class="flag-icon flag-icon-ru"></i> Russian</a><a class="dropdown-item" href="<?= base_url('assets') ?>/#"><i class="flag-icon flag-icon-fr"></i> French</a><a class="dropdown-item" href="<?= base_url('assets') ?>/#"><i class="flag-icon flag-icon-es"></i> Spanish</a></div>
                </div>
              </li>-->
          </ul>
          <ul class="nav navbar-nav float-right">
            <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="<?= base_url('assets') ?>/#" data-toggle="dropdown"><i class="ficon ft-mail"> </i></a>
              <div class="dropdown-menu dropdown-menu-right">
                <div class="arrow_box_right"><a class="dropdown-item" href="<?= base_url('assets') ?>/#"><i class="ft-book"></i> Read Mail</a><a class="dropdown-item" href="<?= base_url('assets') ?>/#"><i class="ft-bookmark"></i> Read Later</a><a class="dropdown-item" href="<?= base_url('assets') ?>/#"><i class="ft-check-square"></i> Mark all Read </a></div>
              </div>
            </li>
            <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="<?= base_url('assets') ?>/#" data-toggle="dropdown"> <span class="avatar avatar-online"><img src="admin.jpeg" alt="avatar"><i></i></span></a>
              <div class="dropdown-menu dropdown-menu-right">
                <div class="arrow_box_right"><a class="dropdown-item" href="<?= base_url('assets') ?>/#"><span class="avatar avatar-online"><img src="admiin.jpeg" alt="avatar"><span class="user-name text-bold-700 ml-1">Administrator</span></span></a>
                  <div class="dropdown-divider"></div><a class="dropdown-item" href="<?= base_url('assets') ?>/#"><i class="ft-user"></i> Edit Profile</a><a class="dropdown-item" href="<?= base_url('assets') ?>/#"><i class="ft-mail"></i> My Inbox</a><a class="dropdown-item" href="<?= base_url('assets') ?>/#"><i class="ft-check-square"></i> Task</a><a class="dropdown-item" href="<?= base_url('assets') ?>/#"><i class="ft-message-square"></i> Chats</a>
                  <div class="dropdown-divider"></div><a class="dropdown-item" href="<?= base_url('assets') ?>/#"><i class="ft-power"></i> Logout</a>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <!-- ////////////////////////////////////////////////////////////////////////////-->


  <div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true" data-img="<?= base_url('assets') ?>/theme-assets/images/backgrounds/02.jpg">
    <div class="navbar-header">
      <ul class="nav navbar-nav flex-row">
        <li class="nav-item mr-auto"><a class="navbar-brand" href="<?= base_url('assets') ?>/index.html"><img class="brand-logo" alt="kominfo admin logo" src="logo.png">
            <h3 class="brand-text">Sistem Monitoring</h3>
          </a></li>
        <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
      </ul>
    </div>
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class="active"><a href="<?= site_url('dashboard') ?>"><i class="ft-home"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
        </li>
        <li class=" nav-item"><a href="<?= site_url('cek') ?>"><i class="ft-pie-chart"></i><span class="menu-title" data-i18n="">Status</span></a>
        </li>
        <!-- <li class=" nav-item"><a href="<?= base_url('assets') ?>/icons.html"><i class="ft-droplet"></i><span class="menu-title" data-i18n="">Icons</span></a>
          </li>-->
        <li class=" nav-item"><a href="<?= site_url('client') ?>"><i class="ft-layers"></i><span class="menu-title" data-i18n="">Connection</span></a>
        </li>
        <li class=" nav-item"><a href="<?= base_url('assets') ?>/buttons.html"><i class="ft-box"></i><span class="menu-title" data-i18n="">Online</span></a>
        </li>
        <!-- <li class=" nav-item"><a href="<?= base_url('assets') ?>/typography.html"><i class="ft-bold"></i><span class="menu-title" data-i18n="">Typography</span></a>
          </li>
          <li class=" nav-item"><a href="<?= base_url('assets') ?>/tables.html"><i class="ft-credit-card"></i><span class="menu-title" data-i18n="">Tables</span></a>
          </li>
          <li class=" nav-item"><a href="<?= base_url('assets') ?>/form-elements.html"><i class="ft-layout"></i><span class="menu-title" data-i18n="">Form Elements</span></a>
          </li>-->
        <li class=" nav-item"><a href="<?= base_url('assets') ?>/https://themeselection.com/demo/chameleon-admin-template/documentation"><i class="ft-book"></i><span class="menu-title" data-i18n="">Documentation</span></a>
        </li>
      </ul>
    </div>
    <!--<a class="btn btn-danger btn-block btn-glow btn-upgrade-pro mx-1" href="<?= base_url('assets') ?>/https://themeselection.com/products/chameleon-admin-modern-bootstrap-webapp-dashboard-html-template-ui-kit/" target="_blank">Download PRO!</a>-->
    <div class="navigation-background"></div>
  </div>

  <div class="app-content content">
    <div class="content-wrapper">

      <?php $this->load->view($page_view) ?>

    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->


  <footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <div class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">2020 &copy; Copyright <a class="text-bold-800 grey darken-2" href="<?= base_url('assets') ?>/https://themeselection.com" target="_blank">Kepri Cyber System</a></span>
      <ul class="list-inline float-md-right d-block d-md-inline-blockd-none d-lg-block mb-0">
        <li class="list-inline-item"><a class="my-1" href="<?= base_url('assets') ?>/https://themeselection.com/" target="_blank"> Dinas Komunikasi dan Informatika</a></li>
        <!--<li class="list-inline-item"><a class="my-1" href="<?= base_url('assets') ?>/https://themeselection.com/support" target="_blank"> Support</a></li>
          <li class="list-inline-item"><a class="my-1" href="<?= base_url('assets') ?>/https://themeselection.com/products/chameleon-admin-modern-bootstrap-webapp-dashboard-html-template-ui-kit/" target="_blank"> Purchase</a></li>-->
      </ul>
    </div>
  </footer>

  <!-- BEGIN VENDOR JS-->
  <script src="<?= base_url('assets') ?>/theme-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="<?= base_url('assets') ?>/theme-assets/vendors/js/charts/chartist.min.js" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN CHAMELEON  JS-->
  <script src="<?= base_url('assets') ?>/theme-assets/js/core/app-menu-lite.js" type="text/javascript"></script>
  <script src="<?= base_url('assets') ?>/theme-assets/js/core/app-lite.js" type="text/javascript"></script>
  <!-- END CHAMELEON  JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="<?= base_url('assets') ?>/theme-assets/js/scripts/pages/dashboard-lite.js" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->

  <!-- datatables -->
  <script src="<?= base_url('assets') ?>/theme-assets/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('assets') ?>/theme-assets/datatables/dataTables.bootstrap4.min.js"></script>

</body>

</html>