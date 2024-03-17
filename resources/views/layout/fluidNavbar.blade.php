<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>GestionOperativaST</title>
     <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- DataTable -->
    <link rel="stylesheet" type="text/css" href="https:///cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <!-- JQuery Validation Custom -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

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
    <!-- DateRangePicker -->
    <link type="text/css" href="{{asset('HTML/dist/assets/vendor/daterangepicker.css')}}" rel="stylesheet">
    <!-- Vector Maps -->
    <link type="text/css" href="{{asset('HTML/dist/assets/vendor/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
    <!-- FullCalendar -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.0/main.es.js"></script>
    <link type="text/css" href="{{asset('HTML/dist/assets/vendor/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet">
    <!-- Toastr -->
    <link type="text/css" href="{{asset('HTML/dist/assets/vendor/toastr.min.css')}}" rel="stylesheet">
</head>
<body class="layout-fluid layout-sticky-subnav">
    <div class="preloader"></div>
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
                                        <span class="text-light">{{session('userName')}} {{session('userLastName1')}}</span>
                                    </span>
                                </a>
                                <div id="account_menu" class="dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-item-text dropdown-item-text--lh">
                                        <div><strong>{{session('userRole')}}</strong></div>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{route('dashboard')}}">Inicio</a>
                                    <a class="dropdown-item" href="{{route('auth.showUpdatePasswordForm')}}">Cambiar Contraseña</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Cerrar Sesión</a>
                                    <form id="logout-form" action="{{route('auth.logout')}}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
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
            <div class="page__header page__header-nav">
                <div class="container-fluid page__container">
                    <div class="navbar navbar-secondary navbar-light navbar-expand-sm p-0">
                        <button class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#navbarsExample03" type="button">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="navbar-collapse collapse" id="navbarsExample03">
                            <ul class="nav navbar-nav">
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                        <i class="sidebar-menu-icon material-icons">phone</i>Gestión de LLamadas</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('calls.callsList')}}">Consultar Llamadas</a>
                                        <a class="dropdown-item" href="{{route('calls.newCall')}}">Registrar Llamada Entrante</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                        <i class="sidebar-menu-icon material-icons">map</i>Agenda de Rutas</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('routes.listRoutes')}}">Consultar Rutas</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                        <i class="sidebar-menu-icon material-icons">build</i>Servicios Técnicos</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('installorders.listInstallOrders')}}">Instalaciones</a>
                                        <a class="dropdown-item" href="{{route('technicalservices.listTechnicalServices')}}">Servicios y Mantenimientos</a>
                                        <a class="dropdown-item" href="{{route('repairs.listRepairs')}}">Reparaciones</a>
                                        <a class="dropdown-item" href="{{route('repairs.listProductRepair')}}">Equipos en Reparación</a>
                                        <a class="dropdown-item" href="{{route('qualityControl.listQA')}}">Control de Calidad</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                        <i class="sidebar-menu-icon material-icons">payment</i>Facturación</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('billingOrders.listBillingOrders')}}">Consultar Ventas</a>
                                        <a class="dropdown-item" href="{{route('productWarranty.productWarrantyList')}}">Garantías</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                        <i class="sidebar-menu-icon material-icons">list</i>Inventario</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('products.productsList')}}">Consultar Inventario</a>
                                        <a class="dropdown-item" href="{{route('products.newProduct')}}">Registrar Nuevo Producto</a>
                                        <a class="dropdown-item" href="{{route('suppliers.listSuppliers')}}">Consultar Proveedores</a>
                                        <a class="dropdown-item" href="{{route('suppliers.createSupplier')}}">Registrar Nuevo Proveedor</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                        <i class="sidebar-menu-icon material-icons">group</i>Clientes</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('customers.listCustomers')}}">Consultar Clientes</a>
                                        <a class="dropdown-item" href="{{route('customers.createCustomer')}}">Registrar Nuevo Cliente</a>
                                    </div>
                                </li>
                                @if(session('userRole') == 'Administrador')
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                        <i class="sidebar-menu-icon material-icons">description</i>Administración</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('admin.listUsers')}}">Gestión de Usuarios</a>
                                        <a class="dropdown-item" href="{{route('admin.systemLogs')}}">Bitácora del Sistema</a>
                                        <a class="dropdown-item" href="{{route('reports.graphics')}}">Reportes</a>
                                    </div>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid page__container">
                @yield('home')
                @yield('technicalServices')
                @yield('billingServices')
                @yield('stockServices')
                @yield('adminServices')
                @yield('updatePassword')
                @yield('systemLogs')
                @yield('usersList')
                @yield('userRegister')
                @yield('viewUser')
                @yield('listCustomers')
                @yield('viewCustomer')
                @yield('createCustomer')
                @yield('editCustomer')
                @yield('callsList')
                @yield('callRegister')
                @yield('callRegisterId')
                @yield('viewCall')
                @yield('callEdit')
                @yield('listSuppliers')
                @yield('createSupplier')
                @yield('editSupplier')
                @yield('viewSupplier')
                @yield('productsList')
                @yield('productRegister')
                @yield('productEdit')
                @yield('productView')
                @yield('listRoutes')
                @yield('listBillingOrders')
                @yield('createBillingOrders')
                @yield('editBillingOrders')
                @yield('viewBillingOrder')
                @yield('productWarrantyList')
                @yield('createProductWarranty')
                @yield('editProductWarranty')
                @yield('viewProductWarranty')
                @yield('listTechnicalServices')
                @yield('createTechnicalService')
                @yield('editTechnicalService')
                @yield('viewTechnicalService')
                @yield('listInstallOrders')
                @yield('createInstallOrder')
                @yield('editInstallOrder')
                @yield('viewInstallOrder')
                @yield('createRepair')
                @yield('listRepairs')
                @yield('editRepair')
                @yield('viewRepair')
                @yield('listProductRepair')
                @yield('viewProductRepair')
                @yield('createProductRepair')
                @yield('editProductRepair')
                @yield('listQA')
                @yield('registerQA')
                @yield('editQA')
                @yield('viewQA')
                @yield('graphics')
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
    <div id="app-settings">
        <app-settings layout-active="fixed" :layout-location="{
            'default': 'ui-modals.html',
            'fixed': 'fixed-ui-modals.html',
            'fluid': 'fluid-ui-modals.html',
            'mini': 'mini-ui-modals.html'
        }"></app-settings>
    </div>
    <div class="mdk-drawer  js-mdk-drawer" id="default-drawer" data-align="end">
        <div class="mdk-drawer__content">
            <div class="sidebar sidebar-light sidebar-left simplebar" data-simplebar>
                <div class="d-flex align-items-center sidebar-p-a border-bottom sidebar-account">
                    <a href="fluid-profile.html" class="flex d-flex align-items-center text-underline-0 text-body">
                        <span class="flex d-flex flex-column">
                            <strong>{{session('userName')}} {{session('userLastName1')}}</strong>
                        </span>
                    </a>
                    <div class="dropdown ml-auto">
                        <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-item-text dropdown-item-text--lh">
                                <div>{{session('userRole')}}</div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('dashboard')}}">Inicio</a>
                            <a class="dropdown-item" href="{{route('auth.showUpdatePasswordForm')}}">Cambiar Contraseña</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('auth.logout')}}">Cerrar Sesión</a>
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
                                <a class="sidebar-menu-button" href="{{route('calls.callsList')}}">
                                    <span class="sidebar-menu-text">Consultar Llamadas</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="{{route('calls.newCall')}}">
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
                                <a class="sidebar-menu-button" href="{{route('routes.listRoutes')}}">
                                    <span class="sidebar-menu-text">Consultar Rutas</span>
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
                                <a class="sidebar-menu-button" href="{{route('installorders.listInstallOrders')}}">
                                    <span class="sidebar-menu-text">Instalaciones</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="{{route('technicalservices.listTechnicalServices')}}">
                                    <span class="sidebar-menu-text">Servicios y Mantenimientos</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="{{route('repairs.listRepairs')}}">
                                    <span class="sidebar-menu-text">Reparaciones</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="{{route('repairs.listProductRepair')}}">
                                    <span class="sidebar-menu-text">Equipos en Reparación</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="{{route('qualityControl.listQA')}}">
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
                                <a class="sidebar-menu-button" href="{{route('billingOrders.listBillingOrders')}}">
                                    <span class="sidebar-menu-text">Consultar Ventas</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item active">
                                <a class="sidebar-menu-button" href="{{route('productWarranty.productWarrantyList')}}">
                                    <span class="sidebar-menu-text">Garantías</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" data-toggle="collapse" href="#stock_menu">
                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">list</i>
                            <span class="sidebar-menu-text">Inventario</span>
                            <span class="ml-auto sidebar-menu-toggle-icon"></span>
                        </a>
                        <ul class="sidebar-submenu collapse" id="stock_menu">
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="{{route('products.productsList')}}">
                                    <span class="sidebar-menu-text">Consultar Inventario</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item active">
                                <a class="sidebar-menu-button" href="{{route('products.newProduct')}}">
                                    <span class="sidebar-menu-text">Registrar Nuevo Producto</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="{{route('suppliers.listSuppliers')}}">
                                    <span class="sidebar-menu-text">Consultar Proveedores</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="{{route('suppliers.createSupplier')}}">
                                    <span class="sidebar-menu-text">Registrar Nuevo Proveedor</span>
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
                                <a class="sidebar-menu-button" href="{{route('customers.listCustomers')}}">
                                    <span class="sidebar-menu-text">Consultar Clientes</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item active">
                                <a class="sidebar-menu-button" href="{{route('customers.createCustomer')}}">
                                    <span class="sidebar-menu-text">Registrar Nuevo Cliente</span>
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
                                <a class="sidebar-menu-button" href="{{route('admin.listUsers')}}">
                                    <span class="sidebar-menu-text">Gestión de Usuarios</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="{{route('admin.systemLogs')}}">
                                    <span class="sidebar-menu-text">Bitácora del Sistema</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item active">
                                <a class="sidebar-menu-button" href="{{route('reports.graphics')}}">
                                    <span class="sidebar-menu-text">Reportes</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- DataTable -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
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

    <!-- Modal de Confirmación para cambiar el estado del usuario -->
    <div class="modal" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Confirmar Cambio de Estado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de cambiar el estado de este registro?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success" id="confirmButton">Confirmar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Confirmación para eliminar elementos -->
    <div class="modal" id="confirmationDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmationDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationDeleteModalLabel">Confirmar Eliminación del Registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro que desea eliminar este registro?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success" id="confirmDeleteButton">Confirmar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para buscar y seleccionar clientes -->
    <div class="modal fade" id="clientSearchModal" tabindex="-1" role="dialog" aria-labelledby="clientSearchModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="clientSearchModalLabel">Buscar Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @yield('clientModalContent')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button id="confirmSelectButton" type="button" class="btn btn-success" data-dismiss="modal">Seleccionar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para buscar y seleccionar clientes -->
    <div class="modal fade" id="productSearchModal" tabindex="-1" role="dialog" aria-labelledby="productSearchModal" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productSearchModalLabel">Buscar Productos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @yield('productModalContent')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button id="confirmProductSelectedButton" type="button" class="btn btn-success" data-dismiss="modal">Seleccionar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para buscar y seleccionar clientes -->
    <div class="modal fade" id="productRepairSearchModal" tabindex="-1" role="dialog" aria-labelledby="productRepairSearchModal" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productRepairSearchModalLabel">Buscar Productos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @yield('productRepairModalContent')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button id="confirmRepairProductSelectedButton" type="button" class="btn btn-success" data-dismiss="modal">Seleccionar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para registrar un nuevo cliente -->
    <div class="modal fade" id="createClientModal" tabindex="-1" role="dialog" aria-labelledby="createClientModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createClientModalLabel">Registrar Nuevo Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @yield('createClientModal')
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button id="registerClientButton" class="btn btn-success">Registrar</button>
                </div> -->
            </div>
        </div>
    </div>  

    <!-- Modal para modificar el cliente seleccionado -->
    <div class="modal fade" id="modifyClientModal" tabindex="-1" role="dialog" aria-labelledby="modifyClientModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modifyClientModalLabel">Modificar Datos del Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @yield('modifyClientModal')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button id="updateClientButton" class="btn btn-success">Actualizar</button>
                </div>
            </div>
        </div>
    </div>    

    <!-- Modal para registrar un nuevo comentario a una llamada existente -->
    <div class="modal fade" id="createCommentModal" tabindex="-1" role="dialog" aria-labelledby="createCommentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createCommentModalLabel">Nuevo Comentario en Llamada</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @yield('createCommentModal')
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button id="registerCommentButton" class="btn btn-success">Registrar Comentario</button>
                </div> -->
            </div>
        </div>
    </div>  

    <!-- Modal para registrar un nuevo evento en la ruta -->
    <div class="modal fade" id="createRouteModal" tabindex="-1" role="dialog" aria-labelledby="createRouteModal" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createRouteModal">Nueva Ruta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @yield('createRouteModal')
                </div>
            </div>
        </div>
    </div> 

    <!-- Modal para registrar un nuevo evento en la ruta -->
    <div class="modal fade" id="modifyRouteModal" tabindex="-1" role="dialog" aria-labelledby="modifyRouteModal" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modifyRouteModal">Modificar Ruta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @yield('modifyRouteModal')
                </div>
            </div>
        </div>
    </div> 

    <!-- List.js -->
    <script src="{{asset('HTML/dist/assets/vendor/list.min.js')}}"></script>
    <script src="{{asset('HTML/dist/assets/js/list.js')}}"></script>
    <!-- Flatpickr -->
    <script src="{{asset('HTML/dist/assets/vendor/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset('HTML/dist/assets/js/flatpickr.js')}}"></script>
    <!-- DateRangePicker -->
    <script src="{{asset('HTML/dist/assets/vendor/moment.min.js')}}"></script>
    <script src="{{asset('HTML/dist/assets/vendor/daterangepicker.js')}}"></script>
    <script src="{{asset('HTML/dist/assets/js/daterangepicker.js')}}"></script>
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
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/locale/es.js"></script>
     <!-- Toastr -->
     <script src="{{asset('HTML/dist/assets/vendor/toastr.min.js')}}"></script>
     <script src="{{asset('HTML/dist/assets/js/toastr.js')}}"></script>
     <!-- My js 
     <script src="{{asset('HTML/dist/assets/js/userFormValidation.js')}}"></script>  -->
</body>
</html>