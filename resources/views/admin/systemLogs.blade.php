@extends('layout.fluidNavbar')
@section('systemLogs')
<div class="mdk-header-layout__content page">   
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item" aria-current="page">Administración</li>
                    <li class="breadcrumb-item active">Bitácora del Sistema</li>
                </ol>
            </nav>
            <h1 class="m-0">Consulta de Cambios del Sistema</h1>
        </div>
        <a href="{{route('dashboard')}}" class="btn btn-primary ml-6"><i class="material-icons">arrow_back</i> Inicio</a>
    </div>
</div>
<div class="card card-form d-flex flex-column flex-sm-row">
    <div class="card-form__body card-body-form-group flex">
        <div class="row">
            <div class="col-sm-auto">
                <div class="form-group">
                    <label for="filter_user">Filtrar por Usuario</label>
                    <input id="filter_user" type="text" class="form-control" placeholder="Nombre de Usuario">
                </div>
            </div>
            <div class="col-sm-auto">
                <div class="form-group">
                    <label for="filter_category">Filtrar por Evento</label><br>
                    <select id="filter_category" class="custom-select" style="width: 200px;">
                        <option value="all">Todos</option>
                        <option value="NEW_">Nuevo Registro</option>
                        <option value="UPDATE_">Registro Editado</option>
                        <option value="DELETE_">Registro Eliminado</option>
                        <option value="_LOG">Acceso al sistema</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-auto">
                <div class="form-group">
                    <label for="dateFilter">Filtrar por Fecha</label><br>
                    <select id="dateFilter" class="custom-select" style="width: 160px;">
                        <option value="all">Todos</option>
                        <option value="today">Hoy</option>
                        <option value="yesterday">Ayer</option>
                        <option value="thisWeek">Esta Semana</option>
                        <option value="thisMonth">Este Mes</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <button id="refreshButton" class="btn bg-white border-left border-top border-top-sm-0 rounded-top-0 rounded-top-sm rounded-left-sm-0">
        <i class="material-icons text-primary icon-20pt">refresh</i></button>
</div>
<div class="card">
    <div class="table-responsive">
        <table id="auditLogsTable" class="table mb-0 thead-border-top-0 table-striped">
            <thead>
                <tr>
                    <th class="text-center">
                        <i class="material-icons icon-16pt text-muted mr-1">folder_shared</i><span>Usuario<span>
                    </th>
                    <th class="text-center">
                        <i class="material-icons icon-16pt text-muted mr-1">repeat</i><span>Evento<span>
                    </th>
                    <th class="text-center">
                        <i class="material-icons icon-16pt text-muted mr-1">comment</i><span>Mensaje<span>
                    </th>
                    <th class="text-center">
                        <i class="material-icons icon-16pt mr-1">today</i><span>Fecha</span>
                    </th>
                </tr>
            </thead>
            <tbody class="list">
                @foreach($logs as $log)
                <tr>
                    <td class="text-center" style="width: 98px;">{{$log -> users -> systemUser}}</td>
                    <td class="text-center">{{$log -> userAction}}</td>
                    <td class="text-center">{{$log -> userEvent}}</td>
                    <td class="text-center" style="width: 165px;">{{$log -> dateCreation}}</td>
                    <!-- <td>
                        <div class="badge badge-success">ACCESO AL SISTEMA</div>
                    </td> -->
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script src="{{asset('HTML/dist/assets/js/auditLogs.js')}}"></script> 
@endsection