@extends('layout.fluidNavbar')
@section('calendar')
<div class="mdk-header-layout__content page">   
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Agenda de Rutas</li>
            </ol>
        </nav>
        <h1 class="m-0">Calendario</h1>
    </div>
</div>
<div class="card card-form d-flex flex-column flex-sm-row">
    <div class="card-form__body card-body-form-group flex">
        <div class="row">
            <div class="col-sm-auto">
                <div class="form-group">
                    <label for="filter_name">Filtrar por Técnico</label>
                    <input id="filter_name" type="text" class="form-control" placeholder="Nombre del Técnico">
                </div>
            </div>
            <div class="col-sm-auto">
                <div class="form-group">
                    <label for="filter_category">Filtrar por Estado</label><br>
                    <select id="filter_category" class="custom-select" style="width: 200px;">
                        <option value="all">Todos</option>
                        <option value="all">Pendiente</option>
                        <option value="all">En Proceso</option>
                        <option value="all">Finalizado</option>
                        <option value="all">Cancelado</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-auto">
                <div class="form-group">
                    <label for="filter_category">Filtrar por Tipo de Servicio</label><br>
                    <select id="filter_category" class="custom-select" style="width: 200px;">
                        <option value="all">Instalaciones</option>
                        <option value="all">Servicio Técnico</option>
                        <option value="all">Mantenimiento Preventivo</option>
                        <option value="all">Reparaciones</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-auto">
                <div class="form-group" style="width: 200px;">
                    <label for="filter_date">Filtrar por Fecha</label>
                    <input id="filter_date" type="text" class="form-control" placeholder="Select date ..." value="20/08/2023 to 27/08/2023" data-toggle="flatpickr" data-flatpickr-mode="range" data-flatpickr-alt-format="d/m/Y" data-flatpickr-date-format="d/m/Y">
                </div>
            </div>
            <div class="col-sm-auto">
                <div class="form-group">
                    <a href="" class="btn btn-success" style="margin-top: 25px;">Nueva Ruta<i class="material-icons">add</i></a>
                </div>
            </div>
        </div>
    </div>
    <button class="btn bg-white border-left border-top border-top-sm-0 rounded-top-0 rounded-top-sm rounded-left-sm-0"><i class="material-icons text-primary icon-20pt">refresh</i></button>
</div>
<div class="row">
    <div class="col-lg-9">
        <div class="card card-body">
            <div id="calendar" data-toggle="fullcalendar"></div>
        </div>
    </div> <!-- end col -->
    <div class="col-lg-3">
        <div id="external-events">
            <p class="text-muted">Arrastre el evento o haga click en el calendario.</p>
            <div class="external-event bg-success" data-class="bg-success">
                <i class="mr-2 material-icons">drag_handle</i>
                <span class="external-event__title">Instalación</span>
            </div>
            <div class="external-event bg-info" data-class="bg-info">
                <i class="mr-2 material-icons">drag_handle</i>
                <span class="external-event__title">Servicio Técnico</span>
            </div>
            <div class="external-event bg-warning" data-class="bg-warning">
                <i class="mr-2 material-icons">drag_handle</i>
                <span class="external-event__title">Mantenimiento Preventivo</span>
            </div>
            <div class="external-event bg-danger" data-class="bg-danger">
                <i class="mr-2 material-icons">drag_handle</i>
                <span class="external-event__title">Reparación</span>
            </div>
        </div>
    </div> <!-- end col-->
</div> <!-- end row -->
</div>
<!-- App Settings FAB -->
<div id="app-settings">
<app-settings layout-active="fixed" :layout-location="{
'default': 'app-fullcalendar.html',
'fixed': 'fixed-app-fullcalendar.html',
'fluid': 'fluid-app-fullcalendar.html',
'mini': 'mini-app-fullcalendar.html'
}"></app-settings>
</div>
@endsection