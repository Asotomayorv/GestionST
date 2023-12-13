@extends('layout.fluidNavbar')
@section('adminServices')
<div class="mdk-header-layout__content page">   
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Administración</li>
                </ol>
            </nav>
            <h1 class="m-0">Categorías de Servicio</h1>
        </div>
        <a href="{{route('dashboard')}}" class="btn btn-primary ml-6"><i class="material-icons">arrow_back</i> Regresar</a>
    </div>
</div>
<div class="row card-group-row">
    <div class="col-lg-4 col-md-4 card-group-row__col">
        <div class="card card-group-row__card">
            <div class="p-2 d-flex flex-row align-items-center">
                <div class="avatar avatar-xs mr-2">
                    <span class="avatar-title rounded-circle text-center bg-primary">
                        <i class="material-icons text-white icon-18pt">group</i>
                    </span>
                </div>
                <a href="{{route('admin.listUsers')}}" class="text-dark">
                    <strong>Gestión de Usuarios</strong>
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 card-group-row__col">
        <div class="card card-group-row__card">
            <div class="p-2 d-flex flex-row align-items-center">
                <div class="avatar avatar-xs mr-2">
                    <span class="avatar-title rounded-circle text-center bg-warning">
                        <i class="material-icons text-white icon-18pt">description</i>
                    </span>
                </div>
                <a href="{{route('admin.systemLogs')}}" class="text-dark">
                    <strong>Bitácora del Sistema</strong>
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 card-group-row__col">
        <div class="card card-group-row__card">
            <div class="p-2 d-flex flex-row align-items-center">
                <div class="avatar avatar-xs mr-2">
                    <span class="avatar-title rounded-circle text-center bg-success">
                        <i class="material-icons text-white icon-18pt">assessment</i>
                    </span>
                </div>
                <a href="{{route('admin.systemLogs')}}" class="text-dark">
                    <strong>Reportes</strong>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4 col-md-4">
        <div class="card stories-card-popular">
            <img src="{{asset('HTML/dist/assets/images/stories/empleados.jpg')}}" alt="" class="card-img">
        </div>
    </div>
    <div class="col-sm-4 col-md-4">
        <div class="card stories-card-popular">
            <img src="{{asset('HTML/dist/assets/images/stories/bitacora.jpg')}}" alt="" class="card-img"> 
        </div>
    </div>
    <div class="col-sm-4 col-md-4">
        <div class="card stories-card-popular">
            <img src="{{asset('HTML/dist/assets/images/stories/reportes.jpg')}}" alt="" class="card-img"> 
        </div>
    </div>
</div>
@endsection