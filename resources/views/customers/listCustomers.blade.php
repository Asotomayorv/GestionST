@extends('layout.fluidNavbar')
@section('listCustomers')
<div class="mdk-header-layout__content page">   
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Gestión de Clientes</li>
                </ol>
            </nav>
            <h1 class="m-0">Consulta de Clientes</h1>
        </div>
        <a href="{{route('dashboard')}}" class="btn btn-primary ml-6"><i class="material-icons">arrow_back</i> Inicio</a>
    </div>
</div>
<div class="card card-form d-flex flex-column flex-sm-row">
    <div class="card-form__body card-body-form-group flex">
        <div class="row">
            <div class="col-sm-auto">
                <div class="form-group">
                    <label for="filter_id">Filtrar por Cédula</label>
                    <input id="filter_id" type="text" class="form-control" placeholder="Cédula del Cliente">
                </div>
            </div>
            <div class="col-sm-auto">
                <div class="form-group">
                    <label for="filter_name">Filtrar por Nombre</label>
                    <input id="filter_name" type="text" class="form-control" placeholder="Nombre del Cliente">
                </div>
            </div>
            <div class="col-sm-7">
                <div class="form-group text-right">
                    <a href="{{route('customers.createCustomer')}}" class="btn btn-success" style="margin-top: 25px;">Nuevo Cliente<i class="material-icons">add</i></a>
                </div>
            </div>
        </div>
    </div>
    <button id="refreshButton" class="btn bg-white border-left border-top border-top-sm-0 rounded-top-0 rounded-top-sm rounded-left-sm-0">
        <i class="material-icons text-primary icon-20pt">refresh</i></button>
</div>
<div class="card">
    <div class="table-responsive border-bottom">
        <div class="table-responsive border-bottom">
            <table id="customerTable" class="table mb-0 thead-border-top-0 table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center">
                            <i class="material-icons icon-16pt text-muted mr-1">folder_shared</i><span>Cédula<span>
                        </th>
                        <th class="text-center">
                            <i class="material-icons icon-16pt mr-1">business</i><span>Cliente</span>
                        </th>
                        <th class="text-center">
                            <i class="material-icons icon-16pt text-muted mr-1">account_circle</i><span>Contacto<span>
                        </th>
                        <th  class="text-center">
                            <i class="material-icons icon-16pt text-muted mr-1">email</i><span>Correo<span>
                        </th>
                        <th  class="text-center">
                            <i class="material-icons icon-16pt text-muted mr-1">phone</i><span>Teléfono<span>
                        </th>
                        <th class="text-center">
                            <i class="material-icons icon-16pt mr-1">today</i><span>Última Edición</span>
                        </th>
                        <th>
                            <i class="material-icons icon-16pt mr-1">settings</i><span>Acciones</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                        <tr>
                            <td class="text-center" style="width: 90px;">{{$customer -> customerID}}</td>
                            <td class="text-center"><span>{{$customer -> customerFullName}}</span></td>
                            <td class="text-center">{{$customer -> customerContact}}</td>
                            <td class="text-center">{{$customer -> customerEmail1}}</td>
                            <td class="text-center" style="width: 86px;">{{$customer -> customerPhone1}}</td>
                            <td class="text-center" style="width: 116px;">{{$customer -> dateLastEdit->format('d/m/Y')}}</td>
                            <div class="dropdown ml-auto">
                                <td class="text-center" style="width: 81px;">
                                    <a href="{{route('customers.viewCustomer', ['id' => $customer -> idCustomer])}}" data-caret="false" class="text-muted" title="Ver Cliente">
                                        <i class="material-icons">visibility</i></a>
                                    <a href="{{route('customers.editCustomer', ['id' => $customer -> idCustomer])}}" data-caret="false" class="text-muted" title="Editar Cliente">
                                        <i class="material-icons">edit</i></a>
                                </td>
                            </div>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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
<script src="{{asset('HTML/dist/assets/js/customerFormValidation.js')}}"></script> 
@endsection