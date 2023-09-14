@extends('layout.fluidNavbar')
@section('technicalServices')
<div class="mdk-header-layout__content page">   
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Servicios Técnicos</li>
            </ol>
        </nav>
        <h1 class="m-0">Categorías de Servicio</h1>
    </div>
</div>
<div class="row card-group-row">
    <div class="col-lg-3 col-md-4 card-group-row__col">
        <div class="card card-group-row__card">
            <div class="p-2 d-flex flex-row align-items-center">
                <div class="avatar avatar-xs mr-2">
                    <span class="avatar-title rounded-circle text-center bg-primary">
                        <i class="material-icons text-white icon-18pt">cloud_download</i>
                    </span>
                </div>
                <a href="{{route('technical.installations')}}" class="text-dark">
                    <strong>Instalaciones</strong>
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 card-group-row__col">
        <div class="card card-group-row__card">
            <div class="p-2 d-flex flex-row align-items-center">
                <div class="avatar avatar-xs mr-2">
                    <span class="avatar-title rounded-circle text-center">
                        <i class="material-icons text-white icon-18pt">build</i>
                    </span>
                </div>
                <a href="{{route('technical.maintenance')}}" class="text-dark">
                    <strong>Servicios y Mantenimientos</strong>
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 card-group-row__col">
        <div class="card card-group-row__card">
            <div class="p-2 d-flex flex-row align-items-center">
                <div class="avatar avatar-xs mr-2">
                    <span class="avatar-title rounded-circle text-center bg-success">
                        <i class="material-icons text-white icon-18pt">gavel</i>
                    </span>
                </div>
                <a href="{{route('technical.repairs')}}" class="text-dark">
                    <strong>Reparaciones</strong>
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 card-group-row__col">
        <div class="card card-group-row__card">
            <div class="p-2 d-flex flex-row align-items-center">
                <div class="avatar avatar-xs mr-2">
                    <span class="avatar-title rounded-circle text-center bg-primary">
                        <i class="material-icons text-white icon-18pt">assignment</i>
                    </span>
                </div>
                <a href="{{route('technical.quality')}}" class="text-dark">
                    <strong>Control de Calidad</strong>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="trello-board__tasks" data-toggle="dragula" data-dragula-containers='["#trello-tasks-1", "#trello-tasks-2", "#trello-tasks-3", "#trello-tasks-4"]'>
    <div class="card bg-light border">
        <div class="card-header card-header-sm bg-white">
            <h4 class="card-header__title">Instalaciones (3)</h4>
        </div>
        <div class="card-body p-2">
            <div class="trello-board__tasks-list card-list" id="trello-tasks-1">
                <div class="trello-board__tasks-item card shadow-none border">
                    <div class="p-3">
                        <p class="m-0 d-flex align-items-center">
                            <strong>Perfiles Nacionales</strong> <span class="badge badge-primary ml-auto">BAJA</span></p>
                        <p class="d-flex align-items-center mb-2">
                            <i class="material-icons icon-16pt mr-2 text-muted">person</i>
                            <span class="text-muted mr-3">Martin Muñoz</span>
                        </p>
                        <div class="media align-items-center">
                            <div class="media-left mr-2">
                                <i class="material-icons icon-16pt mr-2 text-muted">local_shipping</i>
                                <span class="text-muted mr-3">Alberto Alvarado</span>
                            </div>
                            <div class="media-body">
                                <a href="{{route('route.schedule')}}">Ver Ruta</a>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="trello-board__tasks-item card shadow-none border">
                    <div class="p-3">
                        <p class="m-0 d-flex align-items-center">
                            <strong>CCSS Hospital Ciudad Neily</strong> <span class="badge badge-warning ml-auto">MEDIA</span></p>
                        <p class="d-flex align-items-center mb-2">
                            <i class="material-icons icon-16pt mr-2 text-muted">person</i>
                            <span class="text-muted mr-3">Jimmy Garcia Alvarado</span>
                        </p>
                        <div class="media align-items-center">
                            <div class="media-left mr-2">
                                <i class="material-icons icon-16pt mr-2 text-muted">local_shipping</i>
                                <span class="text-muted mr-3">Gustavo Campos</span>
                            </div>
                            <div class="media-body">
                                <a href="{{route('route.schedule')}}">Ver Ruta</a>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="trello-board__tasks-item card shadow-none border">
                    <div class="p-3">
                        <p class="m-0 d-flex align-items-center">
                            <strong>Libreria el Shaddai</strong> <span class="badge badge-danger ml-auto">ALTA</span></p>
                        <p class="d-flex align-items-center mb-2">
                            <i class="material-icons icon-16pt mr-2 text-muted">person</i>
                            <span class="text-muted mr-3">Noemy Gonzalez</span>
                        </p>
                        <div class="media align-items-center">
                            <div class="media-left mr-2">
                                <i class="material-icons icon-16pt mr-2 text-muted">local_shipping</i>
                                <span class="text-muted mr-3">Michelle Mora</span>
                            </div>
                            <div class="media-body">
                                <a href="{{route('route.schedule')}}">Ver Ruta</a>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="trello-board__tasks">
    <div class="card bg-light border">
        <div class="card-header card-header-sm bg-white">
            <h4 class="card-header__title">Servicios Técnicos (2)</h4>
        </div>
        <div class="card-body p-2">
            <div class="trello-board__tasks-list card-list" id="trello-tasks-2">
                <div class="trello-board__tasks-item card shadow-none border">
                    <div class="p-3">
                        <p class="m-0 d-flex align-items-center">
                            <strong>Hotel Barceló Occidental Tamarindo</strong> <span class="badge badge-danger ml-auto">ALTA</span></p>
                        <p class="d-flex align-items-center mb-2">
                            <i class="material-icons icon-16pt mr-2 text-muted">person</i>
                            <span class="text-muted mr-3">Paola Brenes</span>
                        </p>
                        <div class="media align-items-center">
                            <div class="media-left mr-2">
                                <i class="material-icons icon-16pt mr-2 text-muted">local_shipping</i>
                                <span class="text-muted mr-3">Rene Diaz</span>
                            </div>
                            <div class="media-body">
                                <a href="{{route('route.schedule')}}">Ver Ruta</a>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="trello-board__tasks-item card shadow-none border">
                    <div class="p-3">
                        <p class="m-0 d-flex align-items-center">
                            <strong>Muebles EGM</strong> <span class="badge badge-warning ml-auto">MEDIA</span></p>
                        <p class="d-flex align-items-center mb-2">
                            <i class="material-icons icon-16pt mr-2 text-muted">person</i>
                            <span class="text-muted mr-3">Wagner Guerrero Marín</span>
                        </p>
                        <div class="media align-items-center">
                            <div class="media-left mr-2">
                                <i class="material-icons icon-16pt mr-2 text-muted">local_shipping</i>
                                <span class="text-muted mr-3">Sandra Vasquez</span>
                            </div>
                            <div class="media-body">
                                <a href="{{route('route.schedule')}}">Ver Ruta</a>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="trello-board__tasks">
    <div class="card bg-light border">
        <div class="card-header card-header-sm bg-white">
            <h4 class="card-header__title">Reparaciones (1)</h4>
        </div>
        <div class="card-body p-2">
            <div class="trello-board__tasks-list card-list" id="trello-tasks-2">
                <div class="trello-board__tasks-item card shadow-none border">
                    <div class="p-3">
                        <p class="m-0 d-flex align-items-center">
                            <strong>Todo en Frenos y Cluch 2001 S.A.</strong> <span class="badge badge-danger ml-auto">ALTA</span></p>
                        <p class="d-flex align-items-center mb-2">
                            <i class="material-icons icon-16pt mr-2 text-muted">person</i>
                            <span class="text-muted mr-3">Martin Muñoz</span>
                        </p>
                        <div class="media align-items-center">
                            <div class="media-left mr-2">
                                <i class="material-icons icon-16pt mr-2 text-muted">local_shipping</i>
                                <span class="text-muted mr-3">Rene Diaz</span>
                            </div>
                            <div class="media-body">
                                <a href="{{route('route.schedule')}}">Ver Ruta</a>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection