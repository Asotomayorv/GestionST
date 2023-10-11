@extends('layout.fluidNavbar')
@section('home')
<div class="mdk-header-layout__content page">   
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item active" aria-current="page">Inicio</li>
            </ol>
        </nav>
        <h1 class="m-0">Principal</h1>
    </div>
</div>
<div class="my-3"><strong class="text-dark-gray">Módulos del Sistema</strong></div>
    <div class="row">
        <div class="col-sm-6 col-md-4">
            <div class="card stories-card-popular">
                <img src="{{asset('HTML/dist/assets/images/stories/teleasistencia.jpg')}}" alt="" class="card-img"> 
                <div class="stories-card-popular__content">
                    <div class="stories-card-popular__title card-body">
                        <h4 class="card-title m-0"><a href="{{route('calls.callsList')}}">Gestión de LLamadas</a></h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="card stories-card-popular">
                <img src="{{asset('HTML/dist/assets/images/stories/rutas.jpg')}}" alt="" class="card-img"> 
                <div class="stories-card-popular__content">
                    <div class="stories-card-popular__title card-body">
                        <h4 class="card-title m-0"><a href="{{route('route.schedule')}}">Agenda de Rutas</a></h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="card stories-card-popular">
                <img src="{{asset('HTML/dist/assets/images/stories/servicio_tecnico.jpg')}}" alt="" class="card-img"> 
                <div class="stories-card-popular__content">
                    <div class="stories-card-popular__title card-body">
                        <h4 class="card-title m-0"><a href="{{route('technical.services')}}">Servicios Técnicos</a></h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="card stories-card-popular">
                <img src="{{asset('HTML/dist/assets/images/stories/facturacion.jpg')}}" alt="" class="card-img"> 
                <div class="stories-card-popular__content">
                    <div class="stories-card-popular__title card-body">
                        <h4 class="card-title m-0"><a href="{{route('billing.sales')}}">Facturación</a></h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="card stories-card-popular">
                <img src="{{asset('HTML/dist/assets/images/stories/clientes.jpg')}}" alt="" class="card-img"> 
                <div class="stories-card-popular__content">
                    <div class="stories-card-popular__title card-body">
                        <h4 class="card-title m-0"><a href="{{route('customers.listCustomers')}}">Clientes</a></h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="card stories-card-popular">
                <img src="{{asset('HTML/dist/assets/images/stories/inventario.jpg')}}" alt="" class="card-img"> 
                <div class="stories-card-popular__content">
                    <div class="stories-card-popular__title card-body">
                        <h4 class="card-title m-0"><a href="{{route('stock.inventory')}}">Bodega</a></h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="card stories-card-popular">
                <img src="{{asset('HTML/dist/assets/images/stories/gestión.jpg')}}" alt="" class="card-img"> 
                <div class="stories-card-popular__content">
                    <div class="stories-card-popular__title card-body">
                        <h4 class="card-title m-0"><a href="{{route('admin.listUsers')}}">Administración</a></h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="card stories-card-popular">
                <img src="{{asset('HTML/dist/assets/images/stories/reportes.jpg')}}" alt="" class="card-img"> 
                <div class="stories-card-popular__content">
                    <div class="stories-card-popular__title card-body">
                        <h4 class="card-title m-0"><a href="">Reportes y Bitácoras</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mensajes al usuario -->
@if (session('password_success'))
    <script>
        $(document).ready(function() {
            toastr.success("{{ session('password_success') }}", "¡Cambio Exitoso!");
        });
    </script>
@endif
@endsection