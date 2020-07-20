<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title>Dashboard | Melon - Flat &amp; Responsive Admin Template</title>

    <!--=== CSS ===-->

    <!-- Bootstrap -->
    <link href="public/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- jQuery UI -->
    <!--<link href="plugins/jquery-ui/jquery-ui-1.10.2.custom.css" rel="stylesheet" type="text/css" />-->
    <!--[if lt IE 9]>
		<link rel="stylesheet" type="text/css" href="plugins/jquery-ui/jquery.ui.1.10.2.ie.css"/>
	<![endif]-->

    <!-- Theme -->
    <link href="public/assets/css/main.css" rel="stylesheet" type="text/css" />
    <link href="public/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="public/assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="public/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="public/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="public/assets/css/mycss.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="public/assets/css/fontawesome/font-awesome.min.css">

    <!-- Calendar -->

    <link href='public/packages/core/main.css' rel='stylesheet' />
    <link href='public/packages/daygrid/main.css' rel='stylesheet' />
    <link href='public/packages/timegrid/main.css' rel='stylesheet' />
    <!--[if IE 7]>
		<link rel="stylesheet" href="assets/css/fontawesome/font-awesome-ie7.min.css">
	<![endif]-->

    <!--[if IE 8]>
		<link href="assets/css/ie8.css" rel="stylesheet" type="text/css" />
	<![endif]-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>


    <!--=== JavaScript ===-->

    <script type="text/javascript" src="public/assets/js/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="public/assets/js/libs/jquery-1.10.2.min.js"></script> -->

    <!-- CKEditor-->
    <script src="public/ckeditor/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="public/assets/js/loadimg.min.js"></script>
    <script type="text/javascript" src="public/assets/js/myjs.js"></script>
    <script type="text/javascript" src="public/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>

    <script type="text/javascript" src="public/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="public/assets/js/libs/lodash.compat.min.js"></script>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
		<script src="assets/js/libs/html5shiv.js"></script>
	<![endif]-->

    <!-- Smartphone Touch Events -->
    <script type="text/javascript" src="public/plugins/touchpunch/jquery.ui.touch-punch.min.js"></script>
    <script type="text/javascript" src="public/plugins/event.swipe/jquery.event.move.js"></script>
    <script type="text/javascript" src="public/plugins/event.swipe/jquery.event.swipe.js"></script>

    <!-- General -->
    <script type="text/javascript" src="public/assets/js/libs/breakpoints.js"></script>
    <script type="text/javascript" src="public/plugins/respond/respond.min.js"></script>
    <!-- Polyfill for min/max-width CSS3 Media Queries (only for IE8) -->
    <script type="text/javascript" src="public/plugins/cookie/jquery.cookie.min.js"></script>
    <script type="text/javascript" src="public/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script type="text/javascript" src="public/plugins/slimscroll/jquery.slimscroll.horizontal.min.js"></script>

    <!-- Page specific plugins -->
    <!-- Charts -->
    <!--[if lt IE 9]>
		<script type="text/javascript" src="plugins/flot/excanvas.min.js"></script>
	<![endif]-->
    <script type="text/javascript" src="public/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script type="text/javascript" src="public/plugins/flot/jquery.flot.min.js"></script>
    <script type="text/javascript" src="public/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script type="text/javascript" src="public/plugins/flot/jquery.flot.resize.min.js"></script>
    <script type="text/javascript" src="public/plugins/flot/jquery.flot.pie.min.js"></script>
    <script type="text/javascript" src="public/plugins/flot/jquery.flot.time.min.js"></script>
    <script type="text/javascript" src="public/plugins/flot/jquery.flot.growraf.min.js"></script>
    <script type="text/javascript" src="public/plugins/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>

    <script type="text/javascript" src="public/plugins/daterangepicker/moment.min.js"></script>
    <script type="text/javascript" src="public/plugins/daterangepicker/daterangepicker.js"></script>
    <script type="text/javascript" src="public/plugins/blockui/jquery.blockUI.min.js"></script>

    <script type="text/javascript" src="public/plugins/fullcalendar/fullcalendar.min.js"></script>

    <!-- Noty -->
    <script type="text/javascript" src="public/plugins/noty/jquery.noty.js"></script>
    <script type="text/javascript" src="public/plugins/noty/layouts/top.js"></script>
    <script type="text/javascript" src="public/plugins/noty/themes/default.js"></script>

    <!-- Forms -->
    <script type="text/javascript" src="public/plugins/uniform/jquery.uniform.min.js"></script>
    <script type="text/javascript" src="public/plugins/select2/select2.min.js"></script>

    <!-- App -->
    <script type="text/javascript" src="public/assets/js/app.js"></script>
    <script type="text/javascript" src="public/assets/js/plugins.js"></script>
    <script type="text/javascript" src="public/assets/js/plugins.form-components.js"></script>

    <script type="text/javascript" src="public/plugins/datatables/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="public/plugins/datatables/DT_bootstrap.js"></script>
    <script type="text/javascript" src="public/plugins/datatables/responsive/datatables.responsive.js"></script>



    <script>
        $(document).ready(function() {
            "use strict";

            App.init(); // Init layout and core plugins
            Plugins.init(); // Init all plugins
            FormComponents.init(); // Init all form-specific plugins
        });
    </script>
    <script type="text/javascript" src="public/assets/js/chart.min.js"></script>
    <script type="text/javascript" src="public/assets/js/utils.js"></script>
    
    <!-- Demo JS -->
    <script type="text/javascript" src="public/assets/js/custom.js"></script>
    <script type="text/javascript" src="public/assets/js/demo/charts/chart_filled_blue.js"></script>
    <script type="text/javascript" src="public/assets/js/demo/charts/chart_simple.js"></script>

    <!-- Calendar  -->
    <script src='public/packages/core/main.js'></script>
    <script src='public/packages/interaction/main.js'></script>
    <script src='public/packages/daygrid/main.js'></script>
    <script src='public/packages/timegrid/main.js'></script>

</head>

<body>

    <!-- Header -->
    <header class="header navbar navbar-fixed-top" role="banner">
        <!-- Top Navigation Bar -->
        <div class="container">

            <!-- Only visible on smartphones, menu toggle -->
            <ul class="nav navbar-nav">
                <li class="nav-toggle"><a href="javascript:void(0);" title=""><i class="icon-reorder"></i></a></li>
            </ul>

            <!-- Logo -->
            <a class="navbar-brand" href="index.html">
                <img src="public/assets/img/logo.png" alt="logo" />
                <strong>ME</strong>LON
            </a>
            <!-- /logo -->

            <!-- Sidebar Toggler -->
            <a href="#" class="toggle-sidebar bs-tooltip" data-placement="bottom" data-original-title="Toggle navigation">
                <i class="icon-reorder"></i>
            </a>
            <!-- /Sidebar Toggler -->

            <!-- Top Left Menu -->
            <ul class="nav navbar-nav navbar-left hidden-xs hidden-sm">
                <li>
                    <a href="?controller=home&action=home">
						Dashboard
					</a>
                </li>

            </ul>
            <!-- /Top Left Menu -->

            <!-- Top Right Menu -->
            <ul class="nav navbar-nav navbar-right">

                <!-- User Login Dropdown -->
                <li class="dropdown user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!--<img alt="" src="assets/img/avatar1_small.jpg" />-->
                        <i class="icon-male"></i>
                        <span class="username"><?php echo $_SESSION['employee']['fullname'] ?></span>
                        <i class="icon-caret-down small"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="?controller=employees&action=profiledetail"><i class="icon-user"></i> My Profile</a></li>
                        <li><a href="?controller=employees&action=changepasswordemployee"><i class="icon-key"></i>Change password</a></li>
                        <li class="divider"></li>
                        <li><a href="?controller=home&action=logout"><i class="icon-signout "></i> Log Out</a></li>
                    </ul>
                </li>
                <!-- /user login dropdown -->
            </ul>
            <!-- /Top Right Menu -->
        </div>
        <!-- /top navigation bar -->

        <!--=== Project Switcher ===-->
        <div id="project-switcher" class="container project-switcher">
            <div id="scrollbar">
                <div class="handle"></div>
            </div>

            <div id="frame">
                <ul class="project-list">
                    <li>
                        <a href="javascript:void(0);">
                            <span class="image"><i class="icon-desktop"></i></span>
                            <span class="title">Lorem ipsum dolor</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <span class="image"><i class="icon-compass"></i></span>
                            <span class="title">Dolor sit invidunt</span>
                        </a>
                    </li>
                    <li class="current">
                        <a href="javascript:void(0);">
                            <span class="image"><i class="icon-male"></i></span>
                            <span class="title">Consetetur sadipscing elitr</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <span class="image"><i class="icon-thumbs-up"></i></span>
                            <span class="title">Sed diam nonumy</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <span class="image"><i class="icon-female"></i></span>
                            <span class="title">At vero eos et</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <span class="image"><i class="icon-beaker"></i></span>
                            <span class="title">Sed diam voluptua</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <span class="image"><i class="icon-desktop"></i></span>
                            <span class="title">Lorem ipsum dolor</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <span class="image"><i class="icon-compass"></i></span>
                            <span class="title">Dolor sit invidunt</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <span class="image"><i class="icon-male"></i></span>
                            <span class="title">Consetetur sadipscing elitr</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <span class="image"><i class="icon-thumbs-up"></i></span>
                            <span class="title">Sed diam nonumy</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <span class="image"><i class="icon-female"></i></span>
                            <span class="title">At vero eos et</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <span class="image"><i class="icon-beaker"></i></span>
                            <span class="title">Sed diam voluptua</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- /#frame -->
        </div>
        <!-- /#project-switcher -->
    </header>
    <!-- /.header -->

    <div id="container">
        <div id="sidebar" class="sidebar-fixed">
            <div id="sidebar-content">
                <!-- Search Results -->
                <div class="sidebar-search-results">

                    <i class="icon-remove close"></i>
                    <!-- Documents -->
                    <div class="title">
                        Documents
                    </div>
                    <ul class="notifications">
                        <li>
                            <a href="javascript:void(0);">
                                <div class="col-left">
                                    <span class="label label-info"><i class="icon-file-text"></i></span>
                                </div>
                                <div class="col-right with-margin">
                                    <span class="message"><strong>John Doe</strong> received $1.527,32</span>
                                    <span class="time">finances.xls</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <div class="col-left">
                                    <span class="label label-success"><i class="icon-file-text"></i></span>
                                </div>
                                <div class="col-right with-margin">
                                    <span class="message">My name is <strong>John Doe</strong> ...</span>
                                    <span class="time">briefing.docx</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /Documents -->
                    <!-- Persons -->
                    <div class="title">
                        Persons
                    </div>
                    <ul class="notifications">
                        <li>
                            <a href="javascript:void(0);">
                                <div class="col-left">
                                    <span class="label label-danger"><i class="icon-female"></i></span>
                                </div>
                                <div class="col-right with-margin">
                                    <span class="message">Jane <strong>Doe</strong></span>
                                    <span class="time">21 years old</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-search-results -->

                <!--=== Navigation ===-->
                <ul id="nav">
                    <li class="current">
                        <a href="?controller=home&action=home">
                            <i class="icon-dashboard"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="?controller=products&action=list">
                            <i class="icon-desktop"></i> Products
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="?controller=category&action=list">
                                    <i class="icon-angle-right"></i> Categories
                                </a>
                            </li>
                            <li>
                                <a href="?controller=products&action=list">
                                    <i class="icon-angle-right"></i> Products
                                </a>
                            </li>
                            <li>
                                <a href="?controller=brands&action=list">
                                    <i class="icon-angle-right"></i> Brand
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php if($_SESSION['employee']['role'] == "administrator"): ?>
                        <li>
                            <a href="?controller=employees&action=list">
                                <i class="icon-edit"></i> Employees
                            </a>
                        </li>
                    <?php endif; ?>
                    <li>
                        <a href="?controller=products&action=list">
                            <i class="icon-group"></i> Customers Service
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="?controller=customers&action=list">
                                    <i class="icon-angle-right"></i> Customers
                                </a>
                            </li>
                            <li>
                                <a href="?controller=voucher&action=list">
                                    <i class="icon-angle-right"></i> Promotions
                                </a>
                            </li>
                        </ul>
                        <li>
                            <a href="?controller=bill&action=list">
                                <i class="icon-table"></i> Bill
                            </a>
                        </li>
                    </li>
                         <li>
                            <a href="?controller=statistics&action=list">
                                <i class="icon-bar-chart"></i> Statistic
                            </a>
                        </li>
                </ul>

                <div class="sidebar-widget align-center">
                    <div class="btn-group" data-toggle="buttons" id="theme-switcher">
                        <label class="btn active">
                            <input type="radio" name="theme-switcher" data-theme="bright"><i class="icon-sun"></i> Bright
                        </label>
                        <label class="btn">
                            <input type="radio" name="theme-switcher" data-theme="dark"><i class="icon-moon"></i> Dark
                        </label>
                    </div>
                </div>

            </div>
            <div id="divider" class="resizeable"></div>
        </div>
        <!-- /Sidebar -->

        <div id="content">
            <div class="container">
                <!-- Breadcrumbs line -->
                <div class="crumbs">
                    <ul id="breadcrumbs" class="breadcrumb">
                        <li>
                            <i class="icon-home"></i>
                            <a href="index.html">Dashboard</a>
                        </li>
                        <li class="current">
                            <a href="pages_calendar.html" title="">Home</a>
                        </li>
                    </ul>

                </div>
                <!-- /Breadcrumbs line -->

                <div class="row">