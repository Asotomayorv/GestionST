<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inicio</title>
    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">
    <!-- Simplebar -->
    <link type="text/css" href="{{asset('HTML/dist/assets/vendor/simplebar.min.css')}}" rel="stylesheet">
    <!-- App CSS -->
    <link type="text/css" href="{{asset('HTML/dist/assets/css/app.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('HTML/dist/assets/css/app.rtl.css')}}" rel="stylesheet">
    <!-- Material Design Icons -->
    <link type="text/css" href="{{asset('HTML/dist/assets/css/vendor-material-icons.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('HTML/dist/assets/css/vendor-material-icons.rtl.css')}}" rel="stylesheet">
    <!-- Font Awesome FREE Icons -->
    <link type="text/css" href="{{asset('HTML/dist/assets/css/vendor-fontawesome-free.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('HTML/dist/assets/css/vendor-fontawesome-free.rtl.css')}}" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-133433427-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-133433427-1');
    </script>
    <!-- Facebook Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '327167911228268');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=327167911228268&ev=PageView&noscript=1" /></noscript>
    <!-- End Facebook Pixel Code -->
    <!-- Dropzone -->
    <link type="text/css" href="{{asset('HTML/dist/assets/css/vendor-dropzone.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('HTML/dist/assets/css/vendor-dropzone.rtl.css')}}" rel="stylesheet">
    <!-- Flatpickr -->
    <link type="text/css" href="{{asset('HTML/dist/assets/css/vendor-flatpickr.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('HTML/dist/assets/css/vendor-flatpickr.rtl.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('HTML/dist/assets/css/vendor-flatpickr-airbnb.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('HTML/dist/assets/css/vendor-flatpickr-airbnb.rtl.css')}}" rel="stylesheet">
    <!-- Vector Maps -->
    <link type="text/css" href="{{asset('HTML/dist/assets/vendor/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
    <!-- FullCalendar -->
    <link type="text/css" href="{{asset('HTML/dist/assets/vendor/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet">
</head>
<body class="layout-fixed">
    <div class="preloader"></div>
    <!-- Header Layout -->
    <div class="mdk-header-layout js-mdk-header-layout">
        <!-- Header -->
        <div id="header" class="mdk-header bg-dark js-mdk-header m-0" data-fixed data-effects="waterfall">
            <div class="mdk-header__content">
                <div class="navbar navbar-expand-sm navbar-main navbar-dark bg-dark  pr-0" id="navbar" data-primary>
                    <div class="container">
                        <!-- Navbar toggler -->
                        <button class="navbar-toggler navbar-toggler-right d-block d-md-none" type="button" data-toggle="sidebar">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <!-- Navbar Brand -->
                        <a href="{{route('dashboard')}}" class="navbar-brand ">
                            <!--<img class="navbar-brand-icon" src="assets/images/stack-logo-white.svg" width="22" alt="Stack">-->
                            <span>Gestión Operativa ST</span>
                        </a>
                        <!--
                        <form class="search-form d-none d-sm-flex flex" action="fixed-index.html">
                            <button class="btn" type="submit" role="button"><i class="material-icons">search</i></button>
                            <input type="text" class="form-control" placeholder="Search">
                        </form>
                        <ul class="nav navbar-nav ml-auto d-none d-md-flex">
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="material-icons">help_outline</i> Get Help
                                </a>
                            </li>
                            <li class="nav-item mr-3">
                                <a href="fixed-pricing.html" class="btn btn-outline-warning">
                                    <i class="material-icons">star</i> PRO
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="#notifications_menu" class="nav-link dropdown-toggle" data-toggle="dropdown" data-caret="false">
                                    <i class="material-icons nav-icon navbar-notifications-indicator">notifications</i>
                                </a>
                                <div id="notifications_menu" class="dropdown-menu dropdown-menu-right navbar-notifications-menu">
                                    <div class="dropdown-item d-flex align-items-center py-2">
                                        <span class="flex navbar-notifications-menu__title m-0">Notifications</span>
                                        <a href="javascript:void(0)" class="text-muted"><small>Clear all</small></a>
                                    </div>
                                    <div class="navbar-notifications-menu__content" data-simplebar>
                                        <div class="py-2">
    
                                            <div class="dropdown-item d-flex">
                                                <div class="mr-3">
                                                    <div class="avatar avatar-sm" style="width: 32px; height: 32px;">
                                                        <img src="assets/images/256_daniel-gaffey-1060698-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                                    </div>
                                                </div>
                                                <div class="flex">
                                                    <a href="">A.Demian</a> left a comment on <a href="">Stack</a><br>
                                                    <small class="text-muted">1 minute ago</small>
                                                </div>
                                            </div>
                                            <div class="dropdown-item d-flex">
                                                <div class="mr-3">
                                                    <a href="#">
                                                        <div class="avatar avatar-xs" style="width: 32px; height: 32px;">
                                                            <span class="avatar-title bg-purple rounded-circle"><i class="material-icons icon-16pt">person_add</i></span>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="flex">
                                                    New user <a href="#">Peter Parker</a> signed up.<br>
                                                    <small class="text-muted">1 hour ago</small>
                                                </div>
                                            </div>
                                            <div class="dropdown-item d-flex">
                                                <div class="mr-3">
                                                    <a href="#">
                                                        <div class="avatar avatar-xs" style="width: 32px; height: 32px;">
                                                            <span class="avatar-title rounded-circle">JD</span>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="flex">
                                                    <a href="#">Big Joe</a> <small class="text-muted">wrote:</small><br>
                                                    <div>Hey, how are you? What about our next meeting</div>
                                                    <small class="text-muted">2 minutes ago</small>
                                                </div>
                                            </div>
    
                                            <div class="dropdown-item d-flex">
                                                <div class="mr-3">
                                                    <div class="avatar avatar-sm" style="width: 32px; height: 32px;">
                                                        <img src="assets/images/256_daniel-gaffey-1060698-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                                    </div>
                                                </div>
                                                <div class="flex">
                                                    <a href="">A.Demian</a> left a comment on <a href="">Stack</a><br>
                                                    <small class="text-muted">1 minute ago</small>
                                                </div>
                                            </div>
                                            <div class="dropdown-item d-flex">
                                                <div class="mr-3">
                                                    <a href="#">
                                                        <div class="avatar avatar-xs" style="width: 32px; height: 32px;">
                                                            <span class="avatar-title bg-purple rounded-circle"><i class="material-icons icon-16pt">person_add</i></span>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="flex">
                                                    New user <a href="#">Peter Parker</a> signed up.<br>
                                                    <small class="text-muted">1 hour ago</small>
                                                </div>
                                            </div>
                                            <div class="dropdown-item d-flex">
                                                <div class="mr-3">
                                                    <a href="#">
                                                        <div class="avatar avatar-xs" style="width: 32px; height: 32px;">
                                                            <span class="avatar-title rounded-circle">JD</span>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="flex">
                                                    <a href="#">Big Joe</a> <small class="text-muted">wrote:</small><br>
                                                    <div>Hey, how are you? What about our next meeting</div>
                                                    <small class="text-muted">2 minutes ago</small>
                                                </div>
                                            </div>
    
                                            <div class="dropdown-item d-flex">
                                                <div class="mr-3">
                                                    <div class="avatar avatar-sm" style="width: 32px; height: 32px;">
                                                        <img src="assets/images/256_daniel-gaffey-1060698-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                                    </div>
                                                </div>
                                                <div class="flex">
                                                    <a href="">A.Demian</a> left a comment on <a href="">Stack</a><br>
                                                    <small class="text-muted">1 minute ago</small>
                                                </div>
                                            </div>
                                            <div class="dropdown-item d-flex">
                                                <div class="mr-3">
                                                    <a href="#">
                                                        <div class="avatar avatar-xs" style="width: 32px; height: 32px;">
                                                            <span class="avatar-title bg-purple rounded-circle"><i class="material-icons icon-16pt">person_add</i></span>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="flex">
                                                    New user <a href="#">Peter Parker</a> signed up.<br>
                                                    <small class="text-muted">1 hour ago</small>
                                                </div>
                                            </div>
                                            <div class="dropdown-item d-flex">
                                                <div class="mr-3">
                                                    <a href="#">
                                                        <div class="avatar avatar-xs" style="width: 32px; height: 32px;">
                                                            <span class="avatar-title rounded-circle">JD</span>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="flex">
                                                    <a href="#">Big Joe</a> <small class="text-muted">wrote:</small><br>
                                                    <div>Hey, how are you? What about our next meeting</div>
                                                    <small class="text-muted">2 minutes ago</small>
                                                </div>
                                            </div>
    
                                        </div>
                                    </div>
                                    <a href="javascript:void(0);" class="dropdown-item text-center navbar-notifications-menu__footer">View All</a>
                                </div>
                            </li>
                        </ul> -->
                        <ul class="nav navbar-nav d-none d-sm-flex border-left navbar-height align-items-center">
                            <li class="nav-item dropdown">
                                <a href="#account_menu" class="nav-link dropdown-toggle" data-toggle="dropdown" data-caret="false">
                                    <span class="ml-1 d-flex-inline">
                                        <span class="text-light">Usuario</span>
                                    </span>
                                </a>
                                <div id="account_menu" class="dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-item-text dropdown-item-text--lh">
                                        <div><strong>Usuario</strong></div>
                                        <div>@tipoperfil</div>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{route('dashboard')}}">Inicio</a>
                                    <a class="dropdown-item" href="{{route('password.change')}}">Cambiar Contraseña</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{route('user.login')}}">Cerrar Sesión</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- // END Header -->
        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content page">
            <div class="page__header mb-0">
                <div class="container page__container">
                    <div class="navbar navbar-secondary navbar-light navbar-expand-sm p-0">
                        <button class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#navbarsExample03" type="button">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="navbar-collapse collapse" id="navbarsExample03">
                            <ul class="nav navbar-nav">
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">LLamadas</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('calls.list')}}">Consultar Llamadas</a>
                                        <a class="dropdown-item" href="{{route('calls.add')}}">Nueva Llamada</a>
                                        <a class="dropdown-item" href="fixed-staff.html">Reporte de Llamadas</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Rutas</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('route.schedule')}}">Consultar Rutas</a>
                                        <a class="dropdown-item" href="fixed-app-projects.html">Nueva Ruta</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Servicio Técnico</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('technical.installations')}}">Instalaciones</a>
                                        <a class="dropdown-item" href="fixed-stories.html">Servicio Técnico</a>
                                        <a class="dropdown-item" href="fixed-discussions.html">Mantenimiento Preventivo</a>
                                        <a class="dropdown-item" href="fixed-payout.html">Reparaciones</a>
                                        <a class="dropdown-item" href="fixed-invoice.html">Control de Calidad</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Facturación</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('sales.billing')}}">Ventas/Cotizaciones</a>
                                        <a class="dropdown-item" href="fixed-ui-alerts.html">Garantías</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Clientes</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('client.list')}}">Consultar Clientes</a>
                                        <a class="dropdown-item" href="fluid-dashboard.html">Ingresar Cliente</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Inventario</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="index.html">Consultar Equipos</a>
                                        <a class="dropdown-item" href="fluid-dashboard.html">Ingresar Equipo</a>
                                        <a class="dropdown-item" href="{{route('stock.suppliers')}}">Consultar Proveedores</a>
                                        <a class="dropdown-item" href="fixed-dashboard.html">Ingresar Proveedor</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Administración</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('employees.list')}}">Gestión de Usuarios</a>
                                        <a class="dropdown-item" href="fluid-dashboard.html">Reportes</a>
                                        <a class="dropdown-item" href="fixed-dashboard.html">Bitácoras</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- // END Header Layout -->
    @yield('home')
    @yield('userAccount')
    @yield('callsList')
    @yield('addCall')
    @yield('calendar')
    @yield('technicalServices')
    @yield('customers')
    @yield('users')
    @yield('installations')
    @yield('sales')
    @yield('suppliers')
    <!-- App Settings FAB -->
    <div id="app-settings">
        <app-settings layout-active="fixed" :layout-location="{
      'default': 'index.html',
      'fixed': 'fixed-dashboard.html',
      'fluid': 'fluid-dashboard.html',
      'mini': 'mini-dashboard.html'
    }"></app-settings>
    </div>
    <!-- jQuery -->
    <script src="{{asset('HTML/dist/assets/vendor/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('HTML/dist/assets/vendor/popper.min.js')}}"></script>
    <script src="{{asset('HTML/dist/assets/vendor/bootstrap.min.js')}}"></script>
    <!-- Simplebar -->
    <script src="{{asset('HTML/dist/assets/vendor/simplebar.min.js')}}"></script>
    <!-- DOM Factory -->
    <script src="{{asset('HTML/dist/assets/vendor/dom-factory.js')}}"></script>
    <!-- MDK -->
    <script src="{{asset('HTML/dist/assets/vendor/material-design-kit.js')}}"></script>
    <!-- App -->
    <script src="{{asset('HTML/dist/assets/js/toggle-check-all.js')}}"></script>
    <script src="{{asset('HTML/dist/assets/js/check-selected-row.js')}}"></script>
    <script src="{{asset('HTML/dist/assets/js/dropdown.js')}}"></script>
    <script src="{{asset('HTML/dist/assets/js/sidebar-mini.js')}}"></script>
    <script src="{{asset('HTML/dist/assets/js/app.js')}}"></script>
    <!-- App Settings (safe to remove) -->
    <script src="{{asset('HTML/dist/assets/js/app-settings.js')}}"></script>

    <!-- Add New Event MODAL -->
    <div class="modal fade" id="event-modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header pr-4 pl-4 border-bottom-0 d-block">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Agregar nueva Ruta</h4>
                </div>
                <div class="modal-body pt-3 pr-4 pl-4">
                </div>
                <div class="text-right pb-4 pr-4">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Guardar</button>
                    <button type="button" class="btn btn-success save-event">Guardar</button>
                    <button type="button" class="btn btn-danger delete-event" data-dismiss="modal">Cancelar</button>
                </div>
            </div> <!-- end modal-content-->
        </div> <!-- end modal dialog-->
    </div>
    <!-- end modal-->
    <!-- Modal Add Category -->
    <div class="modal fade" id="add-category" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 d-block">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Añadir Tipo de Visita</h4>
                </div>
                <div class="modal-body p-4">
                    <form>
                        <div class="form-group">
                            <label class="control-label">Category Name</label>
                            <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Selecciona la Prioridad</label>
                            <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                <option value="primary">Normal</option>
                                <option value="success">Terminado</option>
                                <option value="danger">Pendiente</option>
                                <option value="warning">En Proceso</option>
                            </select>
                        </div>
                    </form>
                    <div class="text-right">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary ml-1 save-category" data-dismiss="modal">Guardar</button>
                    </div>
                </div> <!-- end modal-body-->
            </div> <!-- end modal-content-->
        </div> <!-- end modal dialog-->
    </div>
    <!-- end modal-->

    <!-- List.js -->
    <script src="{{asset('HTML/dist/assets/vendor/list.min.js')}}"></script>
    <script src="{{asset('HTML/dist/assets/js/list.js')}}"></script>
    <!-- Flatpickr -->
    <script src="{{asset('HTML/dist/assets/vendor/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset('HTML/dist/assets/js/flatpickr.js')}}"></script>
    <!-- Global Settings -->
    <script src="{{asset('HTML/dist/assets/js/settings.js')}}"></script>
    <!-- Chart.js -->
    <script src="{{asset('HTML/dist/assets/vendor/Chart.min.js')}}"></script>
    <!-- App Charts JS -->
    <script src="{{asset('HTML/dist/assets/js/charts.js')}}"></script>
    <!-- Chart Samples -->
    <script src="{{asset('HTML/dist/assets/js/page.dashboard.js')}}"></script>
    <!-- Vector Maps -->
    <script src="{{asset('HTML/dist/assets/vendor/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('HTML/dist/assets/vendor/jqvmap/maps/jquery.vmap.world.js')}}"></script>
    <script src="{{asset('HTML/dist/assets/js/vector-maps.js')}}"></script>
    <!-- jQuery UI (for draggable) -->
    <script src="{{asset('HTML/dist/assets/vendor/jquery-ui.min.js')}}"></script>
    <!-- Moment.js -->
    <script src="{{asset('HTML/dist/assets/vendor/moment.min.js')}}"></script>
    <!-- FullCalendar -->
    <script src="{{asset('HTML/dist/assets/vendor/fullcalendar/fullcalendar.min.js')}}"></script>
    <script src="{{asset('HTML/dist/assets/js/fullcalendar.js')}}"></script>
</body>
</html>