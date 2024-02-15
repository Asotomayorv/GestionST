@extends('layout.fluidNavbar')
@section('technicalServices')
<div class="mdk-header-layout__content page">   
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Servicios Técnicos</li>
                </ol>
            </nav>
            <h1 class="m-0">Categorías de Servicio</h1>
        </div>
        <a href="{{route('dashboard')}}" class="btn btn-primary ml-6"><i class="material-icons">arrow_back</i> Regresar</a>
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
                <a href="{{route('installorders.listInstallOrders')}}" class="text-dark">
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
                <a href="{{route('technicalservices.listTechnicalServices')}}" class="text-dark">
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
                <a href="{{route('repairs.listRepairs')}}" class="text-dark">
                    <strong>Reparaciones</strong>
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 card-group-row__col">
        <div class="card card-group-row__card">
            <div class="p-2 d-flex flex-row align-items-center">
                <div class="avatar avatar-xs mr-2">
                    <span class="avatar-title rounded-circle text-center bg-warning">
                        <i class="material-icons text-white icon-18pt">assignment</i>
                    </span>
                </div>
                <a href="{{route('qualityControl.listQA')}}" class="text-dark">
                    <strong>Control de Calidad</strong>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 col-md-3">
        <div class="card stories-card-popular">
            <img src="{{asset('HTML/dist/assets/images/stories/instalacion.jpg')}}" alt="" class="card-img"> 
            <!-- <div class="stories-card-popular__content">
                <div class="stories-card-popular__title card-body">
                    <h4 class="card-title m-0"><a href="{{route('installorders.listInstallOrders')}}">Instalaciones</a></h4>
                </div>
            </div> -->
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="card stories-card-popular">
            <img src="{{asset('HTML/dist/assets/images/stories/mantenimiento.jpg')}}" alt="" class="card-img"> 
            <!--  <div class="stories-card-popular__content">
                <div class="stories-card-popular__title card-body">
                    <h4 class="card-title m-0"><a href="{{route('technicalservices.listTechnicalServices')}}">Servicios y Mantenimientos</a></h4>
                </div>
            </div> -->
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="card stories-card-popular">
            <img src="{{asset('HTML/dist/assets/images/stories/reparacion.jpg')}}" alt="" class="card-img"> 
            <!--  <div class="stories-card-popular__content">
                <div class="stories-card-popular__title card-body">
                    <h4 class="card-title m-0"><a href="{{route('repairs.listRepairs')}}">Reparaciones</a></h4>
                </div>
            </div> -->
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="card stories-card-popular">
            <img src="{{asset('HTML/dist/assets/images/stories/calidad.jpeg')}}" alt="" class="card-img"> 
            <!--  <div class="stories-card-popular__content">
                <div class="stories-card-popular__title card-body">
                    <h4 class="card-title m-0"><a href="{{route('qualityControl.listQA')}}">Control de Calidad</a></h4>
                </div>
            </div> -->
        </div>
    </div>
</div>
@endsection