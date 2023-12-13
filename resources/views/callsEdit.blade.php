@extends('layout.fluidNavbar')
@section('createInstallOrder')
<div class="mdk-header-layout__content page">   
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                <li class="breadcrumb-item" aria-current="page">Servicios Técnicos</li>
                <li class="breadcrumb-item active" aria-current="page">Gestión de Instalaciones</li>
            </ol>
        </nav>
        <h1 class="m-0">Registrar Nueva Boleta de Instalación</h1>
    </div>
</div>
<div class="card card-form">
    <div class="row no-gutters">
        <div class="col-lg-3 card-body">
            <p><strong class="headings-color">Datos de la Ruta</strong></p>
            <p class="text-muted">Ingresa los datos de la Ruta:</p>
        </div>
        <div class="col-lg-9 card-form__body card-body">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="idRoute">#Ruta*</label>
                        <input id="idRoute" type="text" class="form-control" name="idRoute" placeholder="No.Ruta" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="customertypeID">Tipo de Cedula*</label>
                        <select id="customertypeID" name="customertypeID" class="custom-select" disabled>
                            <option value="1">Jurídica</option>
                            <option value="2">Física</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="customerID">Cédula*</label>
                        <input id="customerID" type="text" class="form-control" name="customerID" placeholder="0-000-000000" readonly>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#clientSearchModal" 
                        id="searchClientButton" style="margin-top: 25px;" title="Buscar Cliente">
                            <i class="material-icons">search</i></button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="customerFullName">Nombre/Razón Social*</label>
                        <input id="customerFullName" type="text" class="form-control" name="customerFullName" placeholder="Nombre Completo" readonly>
                        <span class="invalid-feedback" id="customerFullName-error">Ingresa un nombre válido.</span>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="customerContact">Contacto*</label>
                        <input id="customerContact" type="text" class="form-control" name="customerContact" placeholder="Contacto" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="customerEmail1">Correo Electrónico 1*</label>
                        <input id="customerEmail1" type="email" class="form-control" name="customerEmail1" placeholder="nombre@correo.com" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="customerEmail2">Correo Electrónico 2</label>
                        <input id="customerEmail2" type="email" class="form-control" name="customerEmail2" placeholder="nombre@correo.com" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="customerPhone1">Telefono 1*</label>
                        <input id="customerPhone1" type="text" class="form-control" name="customerPhone1" placeholder="0000-0000" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="customerPhone2">Telefono 2</label>
                        <input id="customerPhone2" type="text" class="form-control" name="customerPhone2" placeholder="0000-0000" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="province">Provincia*</label>
                        <input id="province" type="text" class="form-control" name="province" placeholder="Provincia" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="canton">Cantón*</label>
                        <input id="canton" type="text" class="form-control" name="canton" placeholder="Cantón" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="distric">Distrito*</label><br>
                        <input id="distric" type="text" class="form-control" name="distric" placeholder="Distrito" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="routeAddress">Dirección de la Instalación</label>
                        <textarea id="routeAddress" type="text" class="form-control" name="routeAddress" placeholder="Dirección Completa.." readonly></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="routeType">Tipo de Visita*</label>
                        <input id="routeType" type="text" class="form-control" name="routeType" placeholder="Tipo de Visita" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="routePriority">Prioridad*</label><br>
                        <input id="routePriority" type="text" class="form-control" name="routePriority" placeholder="Prioridad" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="routeTechnicianAssigned">Técnico Asignado*</label><br>
                        <input id="routeTechnicianAssigned" type="text" class="form-control" name="routeTechnicianAssigned" placeholder="Técnico" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label class="text-label" for="startDate">Fecha Inicio</label>
                        <input id="startDate" name="startDate" type="date" class="form-control" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label class="text-label" for="startTime">Hora Inicio</label>
                        <input id="startTime" name="startTime" type="time" class="form-control" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="text-right">
                        <button class="btn btn-primary ml-3" id="modifyClientButton" data-toggle="modal" data-target="#modifyClientModal">
                            Actualizar Datos</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<form id="registerInstallOrder" method="POST" action="{{route('installorders.register')}}">
    @csrf
    <div class="card card-form">
        <div class="row no-gutters">
            <div class="col-lg-3 card-body">
                <p><strong class="headings-color">Información de la Instalación</strong></p>
                <p class="text-muted">Ingresa los datos de la nueva instalación.</p>
            </div>
            <div class="col-lg-9 card-form__body card-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="installationComments">Comentarios de la Instalación*</label>
                            <input id="installationComments" type="text" class="form-control" name="installationComments" placeholder="Inserte sus comentarios...">
                            <span class="invalid-feedback" id="installationComments-error">Ingrese sus comentarios en formato válido.</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="installationType">Tipo de Instalación*</label>
                            <input id="installationType" type="text" class="form-control" name="installationType" placeholder="Tipo de Instalación">
                            <span class="invalid-feedback" id="installationType-error">Ingresa un Tipo válido.</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col">
                        <div class="form-group">
                            <label for="installationEstimateHours">Horas Estimadas de la Instalación</label>
                            <input id="installationEstimateHours" type="text" class="form-control" name="installationEstimateHours" placeholder="Ingrese las horas respectivas">
                            <span class="invalid-feedback" id="installationEstimateHours-error">Ingresa un número válido.</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="installationTravelHours">Horas Estimadas de Viaje</label>
                            <input id="installationTravelHours" type="text" class="form-control" name="installationTravelHours" placeholder="Ingrese las horas respectivas">
                            <span class="invalid-feedback" id="installationTravelHours-error">Ingresa un número válido.</span>
                        </div>
                    </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="installationTotalHours">Horas Totales de la Instalación</label>
                            <input id="installationTotalHours" type="text" class="form-control" name="installationTotalHours" placeholder="Ingrese las horas totales">
                            <span class="invalid-feedback" id="installationTotalHours-error">Ingresa un número válido.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-right mb-5">
        <a href="{{route('installorders.listInstallOrders')}}" class="btn btn-danger ml-3">Cancelar</a>
        <button type="submit" id="submitBtn" class="btn btn-success ml-3">Registrar</button>
    </div>
</form>
@section('clientModalContent')
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
                </tr>
            </thead>
            <tbody class="list">
                @foreach($routes as $route)
                <tr data-customer-email2="{{$route -> customers -> customerEmail2}}" data-customer-phone2="{{$route -> customers -> customerPhone2}}" 
                    data-customer-typeid="{{$route -> customers -> customertypeID}}" data-customer-id="{{$route -> customers -> idCustomer}}"
                    data-customer-taxes="{{$route -> customers -> customerTaxes}}" data-customer-address2="{{$route -> customers -> customerAddress2}}"
                    data-customer-address1="{{$route -> customers -> customerAddress1}}">
                        <td class="text-center">{{$route -> customers -> customerID}}</td>
                        <td class="text-center">{{$route -> customers -> customerFullName}}</td>
                        <td class="text-center">{{$route -> customers -> customerContact}}</td>
                        <td class="text-center">{{$route -> customers -> customerEmail1}}</td>
                        <td class="text-center">{{$route -> customers -> customerPhone1}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
<!-- Mensajes al usuario -->
@if (session('createError'))
    <script>
        $(document).ready(function() {
            toastr.warning("{{ session('createError') }}", "Error al registrar el proveedor");
        });
    </script>
@endif
@if (session('validationError'))
    <script>
        $(document).ready(function() {
            toastr.warning("{{ session('validationError') }}", "Error de validación");
        });
    </script>
@endif
<script src="{{asset('HTML/dist/assets/js/installOrderFormValidation.js')}}"></script> 
@endsection