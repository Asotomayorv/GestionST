<!DOCTYPE html>
<html lang="en" dir="ltr">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>GestionOperativaST</title>
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
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-133433427-1');
</script>
    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
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
<body class="layout-fluid layout-sticky-subnav">
    <div class="preloader"></div>
    <!-- Header Layout -->
    <div class="mdk-header-layout js-mdk-header-layout">
        <!-- Header -->
        <div id="header" class="mdk-header bg-dark js-mdk-header m-0" data-fixed>
            <div class="mdk-header__content">
                <div class="navbar navbar-expand-sm navbar-main navbar-dark bg-dark pr-0 pr-0" id="navbar" data-primary>
                    <div class="container-fluid page__container">
                        <!-- Navbar toggler -->
                        <button class="navbar-toggler navbar-toggler-custom navbar-toggler-right d-block" type="button" data-toggle="sidebar">
                            <span class="material-icons">apps</span>
                        </button>
                        <!-- Navbar Brand -->
                        <a href="{{route('dashboard')}}" class="navbar-brand ">
                            <span>Gestion Operativa ST</span>
                        </a>
                        <ul class="nav navbar-nav ml-auto d-none d-md-flex">
                        </ul>
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
                                        <div>@Departamento</div>
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
            <div class="page__header page__header-nav">
                <div class="container-fluid page__container">
                    <div class="navbar navbar-secondary navbar-light navbar-expand-sm p-0">
                        <button class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#navbarsExample03" type="button">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="navbar-collapse collapse" id="navbarsExample03">
                            <ul class="nav navbar-nav">
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Gestión de LLamadas</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('calls.list')}}">Consultar Llamadas</a>
                                        <a class="dropdown-item" href="{{route('calls.add')}}">Registrar Nueva Llamada Entrante</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Agenda de Rutas</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('route.schedule')}}">Consultar Rutas</a>
                                        <a class="dropdown-item" href="fluid-app-fullcalendar.html">Agendar Nueva Ruta</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Servicios Técnicos</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('technical.installations')}}">Instalaciones</a>
                                        <a class="dropdown-item" href="{{route('technical.maintenance')}}">Servicios y Mantenimientos</a>
                                        <a class="dropdown-item" href="{{route('technical.repairs')}}">Reparaciones</a>
                                        <a class="dropdown-item" href="{{route('technical.quality')}}">Control de Calidad</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Facturación</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('billing.sales')}}">Consultar Ventas</a>
                                        <a class="dropdown-item" href="{{route('billing.guarantees')}}">Garantías</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Bodega</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('stock.inventory')}}">Consultar Inventario</a>
                                        <a class="dropdown-item" href="fluid-dashboard.html">Registrar Nuevo Equipo</a>
                                        <a class="dropdown-item" href="{{route('stock.suppliers')}}">Consultar Proveedores</a>
                                        <a class="dropdown-item" href="mini-dashboard.html">Registrar Nuevo Proveedor</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Clientes</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('client.list')}}">Consultar Clientes</a>
                                        <a class="dropdown-item" href="fluid-dashboard.html">Registrar Cliente</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Administración</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('admin.employees')}}">Gestión de Usuarios</a>
                                        <a class="dropdown-item" href="fluid-dashboard.html">Reportes</a>
                                        <a class="dropdown-item" href="{{route('admin.systemLogs')}}">Bitácora del Sistema</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid page__container">
                @yield('home')
                @yield('userAccount')
                @yield('callsList')
                @yield('addCall')
                @yield('calendar')
                @yield('installations')
                @yield('technicalServices')
                @yield('repairs')
                @yield('maintenance')
                @yield('quality')
                @yield('customers')
                @yield('users')
                @yield('systemLogs')
                @yield('sales')
                @yield('guarantees')
                @yield('suppliers')
                @yield('inventory')
            </div>
        <!-- // END header-layout__content -->
    </div>
    <!-- // END header-layout -->
    <!-- App Settings FAB -->
    <div id="app-settings">
        <app-settings layout-active="fluid" :layout-location="{
      'default': 'index.html',
      'fixed': 'fixed-dashboard.html',
      'fluid': 'fluid-dashboard.html',
      'mini': 'mini-dashboard.html'
    }"></app-settings>
    </div>
    <div class="mdk-drawer  js-mdk-drawer" id="default-drawer" data-align="end">
        <div class="mdk-drawer__content">
            <div class="sidebar sidebar-light sidebar-left simplebar" data-simplebar>
                <div class="d-flex align-items-center sidebar-p-a border-bottom sidebar-account">
                    <a href="fluid-profile.html" class="flex d-flex align-items-center text-underline-0 text-body">
                        <span class="flex d-flex flex-column">
                            <strong>Usuario</strong>
                        </span>
                    </a>
                    <div class="dropdown ml-auto">
                        <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-item-text dropdown-item-text--lh">
                                <div><strong>Usuario</strong></div>
                                <div>@Departamento</div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('dashboard')}}">Inicio</a>
                            <a class="dropdown-item" href="{{route('password.change')}}">Cambiar Contraseña</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('user.login')}}">Cerrar Sesión</a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-heading sidebar-m-t">Menu</div>
                <ul class="sidebar-menu">
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" data-toggle="collapse" href="#calls_menu">
                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">phone</i>
                            <span class="sidebar-menu-text">Gestión de LLamadas</span>
                            <span class="ml-auto sidebar-menu-toggle-icon"></span>
                        </a>
                        <ul class="sidebar-submenu collapse show " id="calls_menu">
                            <li class="sidebar-menu-item active">
                                <a class="sidebar-menu-button" href="{{route('calls.list')}}">
                                    <span class="sidebar-menu-text">Consultar Llamadas</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="{{route('calls.add')}}">
                                    <span class="sidebar-menu-text">Registrar Llamada Entrante</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" data-toggle="collapse" href="#routes_menu">
                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">map</i>
                            <span class="sidebar-menu-text">Agenda de Rutas</span>
                            <span class="ml-auto sidebar-menu-toggle-icon"></span>
                        </a>
                        <ul class="sidebar-submenu collapse" id="routes_menu">
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="{{route('route.schedule')}}">
                                    <span class="sidebar-menu-text">Consultar Rutas</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="fluid-app-projects.html">
                                    <span class="sidebar-menu-text">Registrar Ruta</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" data-toggle="collapse" href="#technical_menu">
                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">build</i>
                            <span class="sidebar-menu-text">Servicios Técnicos</span>
                            <span class="ml-auto sidebar-menu-toggle-icon"></span>
                        </a>
                        <ul class="sidebar-submenu collapse" id="technical_menu">
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="{{route('technical.installations')}}">
                                    <span class="sidebar-menu-text">Instalaciones</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="{{route('technical.maintenance')}}">
                                    <span class="sidebar-menu-text">Servicios y Mantenimientos</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="{{route('technical.repairs')}}">
                                    <span class="sidebar-menu-text">Reparaciones</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="{{route('technical.quality')}}">
                                    <span class="sidebar-menu-text">Control de Calidad</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" data-toggle="collapse" href="#billing_menu">
                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">payment</i>
                            <span class="sidebar-menu-text">Facturación</span>
                            <span class="ml-auto sidebar-menu-toggle-icon"></span>
                        </a>
                        <ul class="sidebar-submenu collapse" id="billing_menu">
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="{{route('billing.sales')}}">
                                    <span class="sidebar-menu-text">Consultar Ventas</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item active">
                                <a class="sidebar-menu-button" href="{{route('billing.guarantees')}}">
                                    <span class="sidebar-menu-text">Garantías</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" data-toggle="collapse" href="#stock_menu">
                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">list</i>
                            <span class="sidebar-menu-text">Bodega</span>
                            <span class="ml-auto sidebar-menu-toggle-icon"></span>
                        </a>
                        <ul class="sidebar-submenu collapse" id="stock_menu">
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="{{route('stock.inventory')}}">
                                    <span class="sidebar-menu-text">Consultar Inventario</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item active">
                                <a class="sidebar-menu-button" href="fluid-dashboard.html">
                                    <span class="sidebar-menu-text">Registrar Equipo</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="{{route('stock.suppliers')}}">
                                    <span class="sidebar-menu-text">Consultar Proveedores</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="">
                                    <span class="sidebar-menu-text">Registrar Proveedor</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" data-toggle="collapse" href="#customers_menu">
                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">group</i>
                            <span class="sidebar-menu-text">Clientes</span>
                            <span class="ml-auto sidebar-menu-toggle-icon"></span>
                        </a>
                        <ul class="sidebar-submenu collapse" id="customers_menu">
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="{{route('client.list')}}">
                                    <span class="sidebar-menu-text">Consultar Clientes</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item active">
                                <a class="sidebar-menu-button" href="fluid-dashboard.html">
                                    <span class="sidebar-menu-text">Registrar Cliente</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" data-toggle="collapse" href="#admin_menu">
                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">description</i>
                            <span class="sidebar-menu-text">Administración</span>
                            <span class="ml-auto sidebar-menu-toggle-icon"></span>
                        </a>
                        <ul class="sidebar-submenu collapse" id="admin_menu">
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="{{route('admin.employees')}}">
                                    <span class="sidebar-menu-text">Gestión de Usuarios</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item active">
                                <a class="sidebar-menu-button" href="fluid-dashboard.html">
                                    <span class="sidebar-menu-text">Reportes</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="{{route('admin.systemLogs')}}">
                                    <span class="sidebar-menu-text">Bitácora del Sistema</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
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
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success save-event">Guardar</button>
                    <button type="button" class="btn btn-danger delete-event" data-dismiss="modal">Borrar</button>
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