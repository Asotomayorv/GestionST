@extends('layout.fluidNavbar')
@section('callsList')
<div class="mdk-header-layout__content page">
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Gestión de Llamadas</li>
                </ol>
            </nav>
            <h1 class="m-0">Llamadas Registradas</h1>
        </div>
        <a href="{{route('dashboard')}}" class="btn btn-primary ml-6"><i class="material-icons">arrow_back</i> Inicio</a>
    </div>
</div>
<div class="card card-form d-flex flex-column flex-sm-row">
    <div class="card-form__body card-body-form-group flex">
        <div class="row">
            <div class="col-sm-auto">
                <div class="form-group">
                    <label for="filter_name">Filtrar por Nombre</label>
                    <input id="filter_name" type="text" class="form-control" placeholder="Nombre del Cliente" style="width: 160px;">
                </div>
            </div>
            <div class="col-sm-auto">
                <div class="form-group">
                    <label for="filter_subject">Filtrar por Asunto</label><br>
                    <select id="filter_subject" class="custom-select" style="width: 160px;">
                        <option value="Todos">Todos</option>
                        <option value="Asistencia al Cliente">Asistencia al Cliente</option>
                        <option value="Servicio Técnico">Servicio Técnico</option>
                        <option value="Suministros">Suministros</option>
                        <option value="Ventas">Ventas</option>
                        <option value="Ofiequipos">Ofiequipos</option>
                        <option value="Bit-Office">Bit-Office</option>
                        <option value="Otros">Otros</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-auto">
                <div class="form-group">
                    <label for="filter_status">Filtrar por Estado</label><br>
                    <select id="filter_status" class="custom-select" style="width: 160px;">
                        <option value="Todos">Todos</option>
                        <option value="Pendiente">Pendiente</option>
                        <option value="En Proceso">En Proceso</option>
                        <option value="Solucionado">Solucionado</option>
                        <option value="Cotizar">Cotizar</option>
                        <option value="Devolver Llamada">Devolver Llamada</option>
                        <option value="Esperar Llamada">Esperar Llamada</option>
                        <option value="Asignado a Ruta Visita Técnica">Asignado a Ruta Visita Técnica</option>
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
            <!-- <div class="col-sm-auto">
                <div class="form-group" style="width: 200px;">
                    <label for="filter_date">Filtrar por Fecha</label>
                    <input id="filter_date" type="text" class="form-control" placeholder="Fecha" value="" data-toggle="flatpickr" data-flatpickr-mode="range" data-flatpickr-alt-format="d/m/Y" data-flatpickr-date-format="d/m/Y">
                </div>
            </div> -->
            <div class="col-sm-4">
                <div class="form-group text-right">
                    <a href="{{route('calls.newCall')}}" class="btn btn-success ml-3" style="margin-top: 25px;">
                        Nueva Llamada <i class="material-icons">add</i></a>
                </div>
            </div>
        </div>
    </div>
    <button id="refreshButton" class="btn bg-white border-left border-top border-top-sm-0 rounded-top-0 rounded-top-sm rounded-left-sm-0">
        <i class="material-icons text-primary icon-20pt">refresh</i></button>
</div>
<div class="card">
    <div class="table-responsive">
        <table id="callsTable" class="table mb-0 thead-border-top-0 table-striped">
            <thead>
                <tr>
                    <th class="text-center">
                        <i class="material-icons icon-16pt mr-1">business</i><span>Cliente</span>
                    </th>
                    <th class="text-center">
                        <i class="material-icons icon-16pt mr-1">today</i><span>Fecha</span>
                    </th>
                    <th  class="text-center">
                        <i class="material-icons icon-16pt text-muted mr-1">account_circle</i><span>Contacto<span>
                    </th>
                    <th  class="text-center">
                        <i class="material-icons icon-16pt text-muted mr-1">email</i><span>Correo<span>
                    </th>
                    <th  class="text-center">
                        <i class="material-icons icon-16pt text-muted mr-1">phone</i><span>Teléfono<span>
                    </th>
                    <th  class="text-center">
                        <i class="material-icons icon-16pt text-muted mr-1">work</i><span>Asunto<span>
                    </th>
                    <th  class="text-center">
                        <i class="material-icons icon-16pt text-muted mr-1">find_replace</i><span>Estado<span>
                    </th>
                    <th>
                        <i class="material-icons icon-16pt mr-1">settings</i><span>Acciones</span>
                    </th>
                </tr>
            </thead>
            <tbody class="list" id="companies">
                @foreach($calls as $call)
                <tr>
                    <td class="text-center">
                        <a href="{{route('customers.viewCustomer', ['id' => $call -> customers -> idCustomer])}}">{{$call -> customers -> customerFullName}}</a>
                    </td>
                    <td class="text-center" style="width: 74px;">{{$call -> dateCreation}}</td>
                    <td class="text-center">{{$call -> customers -> customerContact}}</td> 
                    <td class="text-center">{{$call -> customers -> customerEmail1}}</td> 
                    <td class="text-center" style="width: 86px;">{{$call -> customers -> customerPhone1}}</td>
                    <td class="text-center"><strong>{{$call -> callSubject}}</strong></td>
                    <td class="text-center">
                        <div class="badge badge-{{$call -> callStatus == 'Pendiente' ? 'danger' 
                                        : ($call -> callStatus == 'En Proceso' ? 'warning' 
                                        : ($call -> callStatus == 'Solucionado' ? 'success'
                                        : ($call -> callStatus == 'Cotizar' ? 'info' 
                                        : ($call -> callStatus == 'Devolver Llamada' ? 'secondary'
                                        : ($call -> callStatus == 'Esperar Llamada' ? 'dark'
                                        : ($call -> callStatus == 'Asignado a Ruta Visita Técnica' ? 'primary' : 'light'))))))}}">{{$call -> callStatus}}</div>
                    </td>
                    <div class="dropdown ml-auto">
                        <td class="text-center" style="width: 81px;">
                            <a href="{{route('calls.viewCall', ['id' => $call -> idCall])}}" data-caret="false" class="text-muted" title="Ver LLamada">
                                <i class="material-icons">visibility</i></a>
                            <a href="{{route('calls.callEdit', ['id' => $call -> idCall])}}" data-caret="false" class="text-muted" title="Editar LLamada">
                                <i class="material-icons">edit</i></a>
                            <a href="{{route('calls.deleteCall', ['id' => $call -> idCall])}}" data-id="{{$call -> idCall}}" data-caret="false" class="text-muted" title="Eliminar Llamada">
                                <i class="material-icons">delete</i></a>
                        </td>
                    </div>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- Mensajes al usuario -->
@if (session('createSuccess'))
    <script>
        $(document).ready(function() {
            toastr.success("{{ session('createSuccess') }}", "¡Registro Exitoso!");
        });
    </script>
@endif
@if (session('updateSuccess'))
    <script>
        $(document).ready(function() {
            toastr.success("{{ session('updateSuccess') }}", "¡Actualización Exitosa!");
        });
    </script>
@endif
<script src="{{asset('HTML/dist/assets/js/callsList.js')}}"></script> 
@endsection