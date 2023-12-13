@extends('layout.fluidNavbar')
@section('listRepairs')
<div class="mdk-header-layout__content page">
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="material-icons icon-20pt">home</i></a></li>
                <li class="breadcrumb-item" aria-current="page">Servicios Técnicos</li>
                <li class="breadcrumb-item active" aria-current="page">Gestión de Reparaciones</li>
            </ol>
        </nav>
        <h1 class="m-0">Consulta de Reparaciones</h1>
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
            <div class="col-sm-auto">
                <div class="form-group">
                    <label for="filter_status">Filtrar por Estado</label><br>
                        <select id="filter_status" class="custom-select" style="width: 160px;">
                            <option value="Todos">Todos</option>
                            <option value="0">Pendiente</option>
                            <option value="1">En Progreso</option>
                            <option value="2">Reparado</option>
                        </select>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group text-right">
                    <a href="{{route('repairs.createRepair')}}" class="btn btn-success" style="margin-top: 25px;">
                        Nueva Orden de Reparación<i class="material-icons">add</i></a>
                </div>
            </div>
        </div>
    </div>
    <button id="refreshButton" class="btn bg-white border-left border-top border-top-sm-0 rounded-top-0 rounded-top-sm rounded-left-sm-0">
        <i class="material-icons text-primary icon-20pt">refresh</i></button>
</div>
<div class="card">
    <div class="table-responsive">
        <table id="repairTable" class="table mb-0 thead-border-top-0 table-striped">
            <thead>
                <tr>
                    <th class="text-center">
                        <i class="material-icons icon-16pt mr-1">receipt</i><span>No.Reparación</span>
                    </th>
                    <th class="text-center">
                        <i class="material-icons icon-16pt mr-1">business</i><span>Cliente</span>
                    </th>
                    <th class="text-center">
                        <i class="material-icons icon-16pt text-muted mr-1">shop</i><span>Equipo<span>
                    </th>
                    <th class="text-center">
                        <i class="material-icons icon-16pt text-muted mr-1">person</i><span>Técnico(a)<span>
                    </th>
                    <th class="text-center">
                        <i class="material-icons icon-16pt mr-1">today</i><span>Fecha</span>
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
                @foreach($repairs as $repair)
                <tr>
                    <td class="text-center">
                        <div class="badge badge-light">#{{$repair -> idrepair}}</div>
                    </td>
                    <td class="text-center">
                        <a href="{{route('customers.viewCustomer', ['id' => $repair -> idCustomer])}}">
                            {{$repair -> customers -> customerFullName}}</a>
                    </td>
                    <td class="text-center"><strong>{{$repair -> productRepair -> first() -> productName}}<strong></td>
                    <td class="text-center">{{$repair -> technicianAssigned}}</td>
                    <td class="text-center">{{$repair -> dateCreation}}</td>
                    <td class="text-center">
                        @if($repair -> repairStatus == 0)
                            <div class="badge badge-warning">PENDIENTE</div>
                        @elseif($repair -> repairStatus == 1)
                            <div class="badge badge-primary">EN PROGRESO</div>
                        @else
                            <div class="badge badge-success">REPARADO</div>
                        @endif
                    </td>
                    <div class="dropdown ml-auto">
                        <td class="text-center" style="width: 81px;">
                            <a href="{{route('repairs.viewRepair', ['id' => $repair -> idrepair])}}" data-caret="false" class="text-muted" title="Ver Orden de Facturación">
                                <i class="material-icons">visibility</i></a>
                            <a href="{{route('repairs.editRepair', ['id' => $repair -> idrepair])}}" data-caret="false" class="text-muted" title="Editar Orden de Facturación">
                                <i class="material-icons">edit</i></a>
                            <a href="{{route('repairs.deleteRepairOrder', ['id' => $repair -> idrepair])}}" data-id="{{$repair -> idrepair}}" data-caret="false" 
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
<script src="{{asset('HTML/dist/assets/js/repairsOrderList.js')}}"></script>
@endsection
<!-- <script>
    $(document).ready(function() {
        $(".change-status").on("click", function() {
            var button = $(this); // Almacena una referencia al botón

            var repairId = button.data("repair-id");
            var currentStatus = button.data("status");

            // Realiza la solicitud AJAX para actualizar el estado
            $.ajax({
                url: "
                type: "PUT",
                data: {
                    status: currentStatus
                },
                success: function(data) {
                    // Actualiza el texto y el estado del botón en la vista
                    if (currentStatus === 0) {
                        button.removeClass("btn-danger").addClass("btn-success").text("Finalizado");
                        button.data("status", 1);
                    } else {
                        button.removeClass("btn-success").addClass("btn-danger").text("Pendiente");
                        button.data("status", 0);
                    }
                }
            });
        });
    });
</script> -->