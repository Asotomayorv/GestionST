@extends('dashboard.navbar')
@section('home')
    <div class="container page__heading-container">
        <div class="page__heading d-flex align-items-center">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                        <li class="breadcrumb-item">Inicio</li>
                        <!-- <li class="breadcrumb-item active" aria-current="page">Stories</li> -->
                    </ol>
                </nav>
                <h1 class="m-0">Dashboard</h1>
            </div>
           <!-- <a href="" class="btn btn-success ml-3">New Post</a> -->
        </div>
    </div>
    <div class="container page__container">
        <div class="my-3"><strong class="text-dark-gray">Módulos del Sistema</strong></div>
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="card stories-card-popular">
                    <img src="{{asset('HTML/dist/assets/images/stories/teleasistencia.jpg')}}" alt="" class="card-img"> 
                    <div class="stories-card-popular__content">
                        <!-- <div class="card-body d-flex align-items-center">
                            <div class="avatar-group flex">
                                <div class="avatar avatar-xs" data-toggle="tooltip" data-placement="top" title="Janell D.">
                                    <a href=""><img src="assets/images/256_luke-porter-261779-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle"></a>
                                </div>
                            </div>
                            <a style="text-decoration: none;" class="d-flex align-items-center" href=""><i class="material-icons mr-1" style="font-size: inherit;">remove_red_eye</i> <small>327</small></a>
                        </div> -->
                        <div class="stories-card-popular__title card-body">
                            <!-- <small class="text-muted text-uppercase">blog</small> -->
                            <h4 class="card-title m-0"><a href="{{route('calls.list')}}">Gestión de LLamadas</a></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="card stories-card-popular">
                    <img src="{{asset('HTML/dist/assets/images/stories/rutas.jpg')}}" alt="" class="card-img"> 
                    <div class="stories-card-popular__content">
                        <!-- <div class="card-body d-flex align-items-center">
                            <div class="avatar-group flex">
                                <div class="avatar avatar-xs" data-toggle="tooltip" data-placement="top" title="Janell D.">
                                    <a href=""><img src="assets/images/256_luke-porter-261779-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle"></a>
                                </div>
                            </div>
                            <a style="text-decoration: none;" class="d-flex align-items-center" href=""><i class="material-icons mr-1" style="font-size: inherit;">remove_red_eye</i> <small>327</small></a>
                        </div> -->
                        <div class="stories-card-popular__title card-body">
                            <!-- <small class="text-muted text-uppercase">blog</small> -->
                            <h4 class="card-title m-0"><a href="{{route('route.schedule')}}">Agenda de Rutas</a></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="card stories-card-popular">
                    <img src="{{asset('HTML/dist/assets/images/stories/servicio_tecnico.jpg')}}" alt="" class="card-img"> 
                    <div class="stories-card-popular__content">
                        <!-- <div class="card-body d-flex align-items-center">
                            <div class="avatar-group flex">
                                <div class="avatar avatar-xs" data-toggle="tooltip" data-placement="top" title="Janell D.">
                                    <a href=""><img src="assets/images/256_luke-porter-261779-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle"></a>
                                </div>
                            </div>
                            <a style="text-decoration: none;" class="d-flex align-items-center" href=""><i class="material-icons mr-1" style="font-size: inherit;">remove_red_eye</i> <small>327</small></a>
                        </div> -->
                        <div class="stories-card-popular__title card-body">
                            <!-- <small class="text-muted text-uppercase">blog</small> -->
                            <h4 class="card-title m-0"><a href="{{route('technical.services')}}">Servicios y Mantenimiento</a></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="card stories-card-popular">
                    <img src="{{asset('HTML/dist/assets/images/stories/facturacion.jpg')}}" alt="" class="card-img"> 
                    <div class="stories-card-popular__content">
                        <!-- <div class="card-body d-flex align-items-center">
                            <div class="avatar-group flex">
                                <div class="avatar avatar-xs" data-toggle="tooltip" data-placement="top" title="Janell D.">
                                    <a href=""><img src="assets/images/256_luke-porter-261779-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle"></a>
                                </div>
                            </div>
                            <a style="text-decoration: none;" class="d-flex align-items-center" href=""><i class="material-icons mr-1" style="font-size: inherit;">remove_red_eye</i> <small>327</small></a>
                        </div> -->
                        <div class="stories-card-popular__title card-body">
                            <!-- <small class="text-muted text-uppercase">blog</small> -->
                            <h4 class="card-title m-0"><a href="">Facturación</a></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="card stories-card-popular">
                    <img src="{{asset('HTML/dist/assets/images/stories/clientes.jpg')}}" alt="" class="card-img"> 
                    <div class="stories-card-popular__content">
                        <!-- <div class="card-body d-flex align-items-center">
                            <div class="avatar-group flex">
                                <div class="avatar avatar-xs" data-toggle="tooltip" data-placement="top" title="Janell D.">
                                    <a href=""><img src="assets/images/256_luke-porter-261779-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle"></a>
                                </div>
                            </div>
                            <a style="text-decoration: none;" class="d-flex align-items-center" href=""><i class="material-icons mr-1" style="font-size: inherit;">remove_red_eye</i> <small>327</small></a>
                        </div> -->
                        <div class="stories-card-popular__title card-body">
                            <!-- <small class="text-muted text-uppercase">blog</small> -->
                            <h4 class="card-title m-0"><a href="{{route('client.list')}}">Clientes</a></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="card stories-card-popular">
                    <img src="{{asset('HTML/dist/assets/images/stories/inventario.jpg')}}" alt="" class="card-img"> 
                    <div class="stories-card-popular__content">
                        <!-- <div class="card-body d-flex align-items-center">
                            <div class="avatar-group flex">
                                <div class="avatar avatar-xs" data-toggle="tooltip" data-placement="top" title="Janell D.">
                                    <a href=""><img src="assets/images/256_luke-porter-261779-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle"></a>
                                </div>
                            </div>
                            <a style="text-decoration: none;" class="d-flex align-items-center" href=""><i class="material-icons mr-1" style="font-size: inherit;">remove_red_eye</i> <small>327</small></a>
                        </div> -->
                        <div class="stories-card-popular__title card-body">
                            <!-- <small class="text-muted text-uppercase">blog</small> -->
                            <h4 class="card-title m-0"><a href="">Inventario</a></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="card stories-card-popular">
                    <img src="{{asset('HTML/dist/assets/images/stories/gestión.jpg')}}" alt="" class="card-img"> 
                    <div class="stories-card-popular__content">
                        <!-- <div class="card-body d-flex align-items-center">
                            <div class="avatar-group flex">
                                <div class="avatar avatar-xs" data-toggle="tooltip" data-placement="top" title="Janell D.">
                                    <a href=""><img src="assets/images/256_luke-porter-261779-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle"></a>
                                </div>
                            </div>
                            <a style="text-decoration: none;" class="d-flex align-items-center" href=""><i class="material-icons mr-1" style="font-size: inherit;">remove_red_eye</i> <small>327</small></a>
                        </div> -->
                        <div class="stories-card-popular__title card-body">
                            <!-- <small class="text-muted text-uppercase">blog</small> -->
                            <h4 class="card-title m-0"><a href="">Administración</a></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="card stories-card-popular">
                    <img src="{{asset('HTML/dist/assets/images/stories/reportes.jpg')}}" alt="" class="card-img"> 
                    <div class="stories-card-popular__content">
                        <!-- <div class="card-body d-flex align-items-center">
                            <div class="avatar-group flex">
                                <div class="avatar avatar-xs" data-toggle="tooltip" data-placement="top" title="Janell D.">
                                    <a href=""><img src="assets/images/256_luke-porter-261779-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle"></a>
                                </div>
                            </div>
                            <a style="text-decoration: none;" class="d-flex align-items-center" href=""><i class="material-icons mr-1" style="font-size: inherit;">remove_red_eye</i> <small>327</small></a>
                        </div> -->
                        <div class="stories-card-popular__title card-body">
                            <!-- <small class="text-muted text-uppercase">blog</small> -->
                            <h4 class="card-title m-0"><a href="">Reportes y Bitácoras</a></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection