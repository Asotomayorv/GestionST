@extends('layout.fluidNavbar')
@section('listProductRepair')
<div class="mdk-header-layout__content page">   
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                <li class="breadcrumb-item" aria-current="page">Servicios Técnicos</li>
                <li class="breadcrumb-item active" aria-current="page">Productos en Reparación</li>
            </ol>
        </nav>
        <h1 class="m-0">Equipos en Proceso de Reparación</h1>
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
            <div class="col-sm-auto">
                <div class="form-group">
                    <label for="filter_id">Filtrar por No.Reparación</label>
                    <input id="filter_id" type="text" class="form-control" placeholder="No.Boleta Facturación">
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
            <div class="col-sm-3">
                <div class="form-group text-right">
                    <a href="{{route('repairs.createProductRepair')}}" class="btn btn-success" style="margin-top: 25px;">
                        Iniciar Reparación <i class="material-icons">add</i></a>
                </div>
            </div>
        </div>
    </div>
    <button id="refreshButton" class="btn bg-white border-left border-top border-top-sm-0 rounded-top-0 rounded-top-sm rounded-left-sm-0">
        <i class="material-icons text-primary icon-20pt">refresh</i></button>
</div>
<div class="card">
    <div class="table-responsive">
        <table id="productRepairTable" class="table mb-0 thead-border-top-0 table-striped">
            <thead>
                <tr>
                    <th class="text-center">
                        <i class="material-icons icon-16pt mr-1">receipt</i><span>No.Boleta Reparación</span>
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
                    <th>
                        <i class="material-icons icon-16pt mr-1">settings</i><span>Acciones</span>
                    </th>
                </tr>
            </thead>
            <tbody class="list" id="companies">
                @foreach($repairDetails as $repairDetail)
                <tr>
                    <td class="text-center">
                        <a href="{{route('repairs.viewRepair', ['id' => $repairDetail -> productRepair -> repairOrders -> idrepair])}}">
                            #{{$repairDetail -> productRepair -> repairOrders -> idrepair}}</a>
                    </td>
                    <td class="text-center">
                        <a href="{{route('customers.viewCustomer', ['id' => $repairDetail -> productRepair -> repairOrders -> idCustomer])}}">
                            {{$repairDetail -> productRepair -> repairOrders -> customers -> customerFullName}}</a>
                    </td>
                    <td class="text-center"><strong>{{$repairDetail -> productRepair -> productName}}<strong></td>
                    <td class="text-center">{{$repairDetail -> productRepair -> repairOrders -> technicianAssigned}}</td>
                    <td class="text-center">{{$repairDetail -> productRepair -> repairOrders -> dateCreation}}</td>
                    <div class="dropdown ml-auto">
                        <td class="text-center" style="width: 81px;">
                            <a href="{{route('repairs.viewProductRepair', ['id' => $repairDetail -> idRepairDetails])}}" data-caret="false" class="text-muted" title="Ver Trabajo de Reparación">
                                <i class="material-icons">visibility</i></a>
                            <a href="{{route('repairs.editProductRepair', ['id' => $repairDetail -> idRepairDetails])}}" data-caret="false" class="text-muted" title="Editar Trabajo de Reparación">
                                <i class="material-icons">edit</i></a>
                            <a href="{{route('repairs.deleteProductRepairOrder', ['id' => $repairDetail -> idRepairDetails])}}" data-id="{{$repairDetail -> idRepairDetails}}" data-caret="false" 
                                class="text-muted" title="Eliminar Trabajo de Reparación"><i class="material-icons">delete</i></a>
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
@if (session('deleteError'))
<script>
    $(document).ready(function() {
        toastr.warning("{{ session('deleteError') }}", "Error al eliminar el registro");
    });
</script>
@endif 
<script src="{{asset('HTML/dist/assets/js/listProductRepair.js')}}"></script>
@endsection