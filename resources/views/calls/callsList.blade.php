@extends('layout.fluidNavbar')
@section('callsList')
<div class="mdk-header-layout__content page">   
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Gestión de Llamadas</li>
            </ol>
        </nav>
        <h1 class="m-0">Llamadas Registradas</h1>
    </div>
</div>
<div class="card card-form d-flex flex-column flex-sm-row">
    <div class="card-form__body card-body-form-group flex">
        <div class="row">
            <div class="col-sm-auto">
                <div class="form-group">
                    <label for="filter_name">Filtrar por Nombre</label>
                    <input id="filter_name" type="text" class="form-control" placeholder="Nombre del Cliente">
                </div>
            </div>
            <div class="col-sm-auto">
                <div class="form-group">
                    <label for="filter_category">Filtrar por Asunto</label><br>
                    <select id="filter_category" class="custom-select" style="width: 200px;">
                        <option value="all">Todos</option>
                        <option value="all">Servicio Técnico</option>
                        <option value="all">Suministros</option>
                        <option value="all">Ventas</option>
                        <option value="all">Ofiequipos</option>
                        <option value="all">Asistencia al cliente</option>
                        <option value="all">Otros</option>
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
                    <a href="{{route('calls.newCall')}}" class="btn btn-success ml-3">Nueva Llamada <i class="material-icons">add</i></a>
                </div>
            </div>
        </div>
    </div>
    <button class="btn bg-white border-left border-top border-top-sm-0 rounded-top-0 rounded-top-sm rounded-left-sm-0"><i class="material-icons text-primary icon-20pt">refresh</i></button>
</div>
<div class="card">
    <div class="table-responsive" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>
        <table class="table mb-0 thead-border-top-0 table-striped">
            <thead>
                <tr>
                    <th style="width: 5px;">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input js-toggle-check-all" data-target="#companies" id="customCheckAll">
                            <label class="custom-control-label" for="customCheckAll"><span class="text-hide">Toggle all</span></label>
                        </div>
                    </th>
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
                    <th class="text-center" style="width: 101px;">Teléfono</th>
                    <th  class="text-center">Asunto</th>
                    <th  class="text-center">Estado</th>
                </tr>
            </thead>
            <tbody class="list" id="companies">
                @foreach($calls as $call)
                <tr>
                    <td class="text-center">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input js-check-selected-row" id="{{$call -> idCall}}">
                            <label class="custom-control-label" for="{{$call -> idCall}}"><span class="text-hide">Check</span></label>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center">
                                <a href="#">{{$call -> idCustomer}}</a>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">{{$call -> dateCreation}}</td>
                    <td class="text-center">{{$call -> customers -> customerName}}</td>
                    <td class="text-center">{{$call -> customers -> customerEmail1}}</td> 
                    <td class="text-center">{{$call -> customers -> customerPhone1}}</td>
                    <td class="text-center"><strong>{{$call -> callSubject}}</strong></td>
                    <td>
                        <div class="badge badge-danger" style="margin-left: 25px;">{{$call -> callStatus}}</div>
                    </td>
                    <div class="dropdown ml-auto">
                        <td>
                            <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="index.html">Ver detalle Llamada</a>
                                    <a class="dropdown-item" href="{{route('calls.callEdit', ['id' => $call -> idCall])}}">Editar Llamada</a>
                                    <a class="dropdown-item" href="{{route('calls.deleteCall', ['id' => $call -> idCall])}}">Eliminar Llamada</a>
                                </div>
                        </td>
                    </div>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-body text-right">
        15 <span class="text-muted">de 1,430</span> <a href="#" class="text-muted-light"><i class="material-icons ml-1">arrow_forward</i></a>
    </div>
</div>
@endsection