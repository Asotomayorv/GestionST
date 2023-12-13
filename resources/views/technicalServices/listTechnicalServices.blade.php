@extends('layout.fluidNavbar')
@section('listTechnicalServices')
<div class="mdk-header-layout__content page">   
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                <li class="breadcrumb-item" aria-current="page">Servicios Técnicos</li>
                <li class="breadcrumb-item active" aria-current="page">Servicios y Mantenimientos</li>
            </ol>
        </nav>
        <h1 class="m-0">Servicios y Mantenimientos</h1>
    </div>
</div>
<div class="card card-form d-flex flex-column flex-sm-row">
    <div class="card-form__body card-body-form-group flex">
        <div class="row">
            <div class="col-sm-auto">
                <div class="form-group">
                    <label for="filter_name">Filtrar por Cliente</label>
                    <input id="filter_name" type="text" class="form-control" placeholder="Cliente">
                </div>
            </div>
            <div class="form-group">
                <label for="filter_technician">Filtrar por Técnico(a)</label><br>
                <select id="filter_technician" class="custom-select" style="width: 200px;">
                    <option value="Todos">Todos</option>
                    @foreach ($technicians as $technician)
                        <option value="{{$technician -> userName . ' ' . $technician -> userLastName1}}">{{$technician -> userName . ' ' . $technician -> userLastName1}}</option>
                    @endforeach
                </select>
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
            <div class="form-group">
                <label for="filter_stock">Estado Servicio</label>
                <div class="custom-control custom-checkbox mt-sm-2">
                    <input type="checkbox" class="custom-control-input" id="inlineFormStatus">
                    <label class="custom-control-label" for="inlineFormStatus">Finalizada</label>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group text-right">
                    <a href="{{route('technicalservices.createTechnicalService')}}" class="btn btn-success" style="margin-top: 25px;">
                        Nueva Orden de Servicio Técnico<i class="material-icons">add</i></a>
                </div>
            </div>
        </div>
    </div>
    <button id="refreshButton" class="btn bg-white border-left border-top border-top-sm-0 rounded-top-0 rounded-top-sm rounded-left-sm-0">
        <i class="material-icons text-primary icon-20pt">refresh</i></button>
</div>
<div class="card">
    <div class="table-responsive">
        <table id="techServiceTable" class="table mb-0 thead-border-top-0 table-striped">
            <thead>
                <tr>
                    <th class="text-center">
                        <i class="material-icons icon-16pt mr-1">receipt</i><span>No.Servicio Técnico</span>
                    </th>
                    <th class="text-center">
                        <i class="material-icons icon-16pt mr-1">map</i><span>No.Ruta</span>
                    </th>
                    <th class="text-center">
                        <i class="material-icons icon-16pt mr-1">business</i><span>Cliente</span>
                    </th>
                    <th class="text-center">
                        <i class="material-icons icon-16pt text-muted mr-1">person</i><span>Técnico(a)<span>
                    </th>
                    <th class="text-center">
                        <i class="material-icons icon-16pt mr-1">today</i><span>Fecha de Visita</span>
                    </th>
                    <th  class="text-center">
                        <i class="material-icons icon-16pt text-muted mr-1">find_replace</i><span>Estado<span>
                    </th>
                    <th>
                        <i class="material-icons icon-16pt mr-1">settings</i><span>Acciones</span>
                    </th>
                </tr>
            </thead>
            <tbody class="list">
                @foreach($techservices as $service)
                <tr>
                    <td class="text-center">
                        <div class="badge badge-light">#{{$service -> idtechnicalServiceOrder}}</div>
                    </td>
                    <td class="text-center">{{$service -> idRoute}}</td>
                    <td class="text-center">
                        <a href="{{route('customers.viewCustomer', ['id' => $service -> routes -> customers -> idCustomer])}}">
                            {{$service -> routes -> customers -> customerFullName}}</a>
                    </td>
                    <td class="text-center">{{$service -> routes -> routeTechnicianAssigned}}</td>
                    <td class="text-center">{{$service -> technicalServiceDate}}</td>
                    <td class="text-center">
                        @if($service->technicalServiceStatus == 0)
                            <div class="badge badge-warning">PENDIENTE</div>
                        @elseif($service->technicalServiceStatus == 1)
                            <div class="badge badge-success">FINALIZADO</div>
                        @else
                            <div class="badge badge-danger">Estado Desconocido</div>
                        @endif
                    </td>
                    <div class="dropdown ml-auto">
                        <td class="text-center" style="width: 81px;">
                            <a href="{{route('technicalservices.viewTechnicalService', ['id' => $service -> idtechnicalServiceOrder])}}" data-caret="false" class="text-muted" title="Ver Orden de Facturación">
                                <i class="material-icons">visibility</i></a>
                            <a href="{{route('technicalservices.editTechnicalService', ['id' => $service -> idtechnicalServiceOrder])}}" data-caret="false" class="text-muted" title="Editar Orden de Facturación">
                                <i class="material-icons">edit</i></a>
                            <a href="{{route('technicalservices.deleteTechnicalService', ['id' => $service -> idtechnicalServiceOrder])}}" data-id="{{$service -> idtechnicalServiceOrder}}" data-caret="false" 
                                class="text-muted" title="Eliminar Boleta de Facturación"><i class="material-icons">delete</i></a>
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
<script src="{{asset('HTML/dist/assets/js/techServiceListOrder.js')}}"></script>
@endsection