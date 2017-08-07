<!DOCTYPE html>
<html lang="en">

<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title') - {{ config('app.name') }}</title>
    <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Phoenixcoded">
    <meta name="keywords" content="flat ui, admin , Flat ui, Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="Phoenixcoded">
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/themify-icons/themify-icons.css') }}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/icofont/css/icofont.css') }}">
    <!-- flag icon framework css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/pages/flag-icon/flag-icon.min.css') }}">   
    <!-- Menu-Search css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/pages/menu-search/css/component.css') }}">
    <!-- Notification.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/pages/notification/notification.css') }}">
    <!-- Animate.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/animate.css/animate.css') }}">
    @stack('cssplugins')
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <!--color css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/color/color-1.css') }}" id="color" />
    <style type="text/css">
        .dataTables_length{float: left;}
        .toolbar{float: left;}
    </style>
</head>

<body class="menu-static">
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div></div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <!-- Menu header start -->
    <nav class="navbar header-navbar">
        <div class="navbar-wrapper">
            <div class="navbar-logo">
                <a class="mobile-menu" id="mobile-collapse" href="#!">
                    <i class="ti-menu"></i>
                </a>
                <a class="mobile-search morphsearch-search" href="#">
                    <i class="ti-search"></i>
                </a>
                <a href="{{ url('') }}">
                    <img class="img-fluid" src="{{ asset('assets/images/logo.png') }}" alt="Theme-Logo" />
                </a>
                <a class="mobile-options">
                    <i class="ti-more"></i>
                </a>
            </div>
            <div class="navbar-container container-fluid">
                <div>
                    <ul class="nav-left">
                        <li>
                            <a id="collapse-menu" href="#">
                                <i class="ti-menu"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#!" onclick="javascript:toggleFullScreen()">
                                <i class="ti-fullscreen"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav-right">
                        <li class="header-notification">
                            <a href="#!">
                                <i class="ti-bell"></i>
                                <span class="badge">5</span>
                            </a>
                            <ul class="show-notification">
                                <li>
                                    <h6>Notifications</h6>
                                    <label class="label label-danger">New</label>
                                </li>
                                <li>
                                    <div class="media">
                                        <img class="d-flex align-self-center" src="assets/images/user.png" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <h5 class="notification-user">John Doe</h5>
                                            <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                            <span class="notification-time">30 minutes ago</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media">
                                        <img class="d-flex align-self-center" src="assets/images/user.png" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <h5 class="notification-user">Joseph William</h5>
                                            <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                            <span class="notification-time">30 minutes ago</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media">
                                        <img class="d-flex align-self-center" src="assets/images/user.png" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <h5 class="notification-user">Sara Soudein</h5>
                                            <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                            <span class="notification-time">30 minutes ago</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="user-profile header-notification">
                            <a href="#!">
                                <img src="{{ asset('assets/images/user.png') }}" alt="User-Profile-Image">
                                <span>{{ Auth::user()->name }}</span>
                                <i class="ti-angle-down"></i>
                            </a>
                            <ul class="show-notification profile-notification">
                                <li>
                                    <a href="user-profile.html">
                                        <i class="ti-user"></i> Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        <i class="ti-layout-sidebar-left"></i>Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Menu header end -->
    @include('layouts.flatable-menu')
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-header">
                <div class="page-header-title">
                    <h4>Inside Finance</h4>
                    <span>Hati-hatilah dengan pengeluaran kecil. Keretakan kecil dapat menenggelamkan kapal besar. – <i>Benjamin Franklin</i></span>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{ url('home') }}">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                @yield('breadcrumb')
                    </ul>
                </div>
            </div>
            <div class="page-body">
            @yield('content')
            </div>
        </div>
    </div>
    <!-- Required Jquery -->
    <script type="text/javascript" src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/tether/dist/js/tether.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{ asset('bower_components/modernizr/modernizr.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/modernizr/feature-detects/css-scrollbars.js') }}"></script>
    <!-- classie js -->
    <script type="text/javascript" src="{{ asset('bower_components/classie/classie.js') }}"></script>
    <!-- notification js -->
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap-growl.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/custom/notif.js') }}"></script>
    @stack('jsplugins')
    <!-- Custom js -->
    <script type="text/javascript" src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>
