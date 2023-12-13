@extends('layout.fluidNavbar')
@section('listRoutes')
<div class="mdk-header-layout__content page">   
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Agenda de Rutas</li>
                </ol>
            </nav>
            <h1 class="m-0">Calendario</h1>
        </div>
        <a href="{{route('dashboard')}}" class="btn btn-primary ml-6"><i class="material-icons">arrow_back</i> Regresar</a>
    </div>
</div>
<!-- <div class="card card-form d-flex flex-column flex-sm-row">
    <div class="card-form__body card-body-form-group flex">
        <div class="row">
            <div class="col-sm-auto">
                <div class="form-group">
                    <label for="filter_technician">Filtrar por Técnico Asignado</label><br>
                    <select id="filter_technician" class="custom-select">
                        <option value="all">Todos</option>
                        @foreach ($technicians as $technician)
                            <option value="{{$technician -> userName . ' ' . $technician -> userLastName1}}">{{$technician -> userName . ' ' . $technician -> userLastName1}}</option>
                        @endforeach
                    </select>
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
        </div>
    </div>
    <button id="refreshButton" class="btn bg-white border-left border-top border-top-sm-0 rounded-top-0 rounded-top-sm rounded-left-sm-0">
        <i class="material-icons text-primary icon-20pt">refresh</i></button>
</div> -->
<div class="row">
    <div class="col-lg-12">
        <div class="card card-body">
            <div id="routeCalendar" data-route-url="{{route('routes.showEvents')}}"></div>
        </div>
    </div> <!-- end col -->
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
@section('createRouteModal')
<form id="createRouteForm" method="POST" action="{{route('routes.createRoute')}}">
    @csrf
    <div class="card card-form">
        <div class="row no-gutters">
            <div class="col-lg-3 card-body">
                <p><strong class="headings-color">Datos de la ruta</strong></p>
                <p class="text-muted">Ingresa los datos de la ruta.</p>
            </div>
            <div class="col-lg-9 card-form__body card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="createCustomertypeID">Tipo de Cedula*</label>
                            <select id="createCustomertypeID" name="createCustomertypeID" class="custom-select">
                                <option value="1">Jurídica</option>
                                <option value="2">Física</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="searchCustomer">Buscar Cliente por Cédula*</label>
                        <div class="search-form search-form--light">
                            <input type="text" class="form-control" id="searchCustomer" placeholder="0-000-000000">
                            <button id="searchButton" data-url="{{route('customers.findCustomer', ['id'])}}" 
                                class="btn" type="button" role="button"><i class="material-icons">search</i></button>
                        </div>
                        <span class="invalid-feedback" id="searchCustomer-error">Ingresa la cédula en un formato válido (e.g., 1-2345-6789)</span>
                        <span class="invalid-feedback" id="searchCustomerLegalID-error">Ingresa la cédula en un formato válido (e.g., 1-234-567890)</span>
                    </div>
                    <!-- <div class="col">
                        <div class="form-group">
                            <label for="routeStatus">Estado*</label><br>
                            <select id="routeStatus" name="routeStatus" class="custom-select" disabled>
                                <option value="Pendiente" selected>Pendiente</option>
                                <option value="En Proceso">En Proceso</option>
                                <option value="Finalizado">Finalizado</option>
                            </select>
                        </div>
                    </div> -->
                    <!-- <div class="col">
                        <div class="form-group">
                            <label for="createCustomerID">Cédula*</label>
                            <input id="createCustomerID" type="text" class="form-control" name="createCustomerID" placeholder="0-000-000000">
                            <span class="invalid-feedback" id="createCustomerID-error">Ingresa la cédula en un formato válido (e.g., 1-2345-6789)</span>
                            <span class="invalid-feedback" id="createCustomerLegalID-error">Ingresa la cédula en un formato válido (e.g., 1-234-567890)</span>
                        </div>
                    </div> -->
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <input id="idCustomer" name="idCustomer" type="hidden" value="">
                            <label for="createCustomerFullName">Nombre/Razón Social*</label>
                            <input id="createCustomerFullName" type="text" class="form-control" name="createCustomerFullName" placeholder="Nombre Completo" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="createCustomerContact">Contacto*</label>
                            <input id="createCustomerContact" type="text" class="form-control" name="createCustomerContact" placeholder="Contacto" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="province">Provincia*</label>
                            <select id="province" name="province" class="custom-select">
                                <option value="">Seleccionar Provincia</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="canton">Cantón*</label><br>
                            <select id="canton" name="canton" class="custom-select">
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="distric">Distrito*</label><br>
                            <select id="distric" name="distric" class="custom-select">
                                <option value="">Seleccionar Distrito</option>
                            <span class="invalid-feedback" id="distric-error">Debes seleccionar un distrito.</span>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="routeAddress">Dirección</label>
                            <textarea id="routeAddress" type="text" class="form-control" name="routeAddress" placeholder="Dirección Completa.."></textarea>
                            <span class="invalid-feedback" id="routeAddress-error">Ingresa una dirección válida.</span>
                        </div>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="createCustomerEmail1">Correo Electrónico 1*</label>
                            <input id="createCustomerEmail1" type="email" class="form-control" name="createCustomerEmail1" placeholder="nombre@correo.com">
                            <span class="invalid-feedback" id="createCustomerEmail1-error">Ingresa un correo electrónico válido.</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="createCustomerEmail2">Correo Electrónico 2</label>
                            <input id="createCustomerEmail2" type="email" class="form-control" name="createCustomerEmail2" placeholder="nombre@correo.com">
                            <span class="invalid-feedback" id="createCustomerEmail2-error">Ingresa un correo electrónico válido.</span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="createCustomerPhone1">Telefono 1*</label>
                            <input id="createCustomerPhone1" type="text" class="form-control" name="createCustomerPhone1" placeholder="0000-0000">
                            <span class="invalid-feedback" id="createCustomerPhone1-error">Ingresa un teléfono en formato válido (e.g., 8888-8888).</span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="createCustomerPhone2">Telefono 2</label>
                            <input id="createCustomerPhone2" type="text" class="form-control" name="createCustomerPhone2" placeholder="0000-0000">
                            <span class="invalid-feedback" id="createCustomerPhone2-error">Ingresa un teléfono en formato válido (e.g., 8888-8888).</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                       <div class="form-group">
                            <label for="createCustomerAddress1"> Direccion 1*</label>
                            <textarea id="createCustomerAddress1" type="text" class="form-control" name="createCustomerAddress1" placeholder="Dirección Completa"></textarea>
                            <span class="invalid-feedback" id="createCustomerAddress1-error">Ingresa una dirección.</span>
                        </div>
                    </div>
                </div> -->
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="routeType">Tipo de Visita*</label>
                            <select id="routeType" name="routeType" class="custom-select">
                                <option value="Soporte Técnico">Soporte Técnico</option>
                                <option value="Instalación">Instalación</option>
                                <option value="Mantenimiento Preventivo">Mantenimiento Preventivo</option>
                                <option value="Capacitación">Capacitación</option>
                                <option value="Demostración">Demostración</option>
                                <option value="Gira">Gira</option>
                                <option value="Reunión">Reunión</option>
                                <option value="Mensajería">Mensajería</option>
                                <option value="Visita Venta">Visita Venta</option>
                                <option value="Visita Gobierno">Visita Gobierno</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="routePriority">Prioridad*</label><br>
                            <select id="routePriority" name="routePriority" class="custom-select">
                                <option value="Baja">Baja</option>
                                <option value="Media">Media</option>
                                <option value="Alta">Alta</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="routeTechnicianAssigned">Técnico Asignado*</label><br>
                            <select id="routeTechnicianAssigned" name="routeTechnicianAssigned" class="custom-select">
                                @foreach ($technicians as $technician)
                                    <option value="{{$technician -> userName . ' ' . $technician -> userLastName1}}">{{$technician -> userName . ' ' . $technician -> userLastName1}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- <div class="col">
                        <div class="form-group">
                            <label class="text-label" for="startDate">Fecha Inicio</label>
                            <input id="startDate" name="startDate" type="text" class="form-control" data-toggle="daterangepicker" 
                            data-daterangepicker-drops="up" data-daterangepicker-single-date-picker="true">
                        </div>
                    </div> -->
                    <div class="col">
                        <div class="form-group">
                            <label class="text-label" for="startDate">Fecha Inicio</label>
                            <input id="startDate" name="startDate" type="date" class="form-control" >
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label class="text-label" for="startTime">Hora Inicio</label>
                            <input id="startTime" name="startTime" type="time" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- <div class="col">
                        <div class="form-group">
                            <label class="text-label" for="endDate">Fecha Finalización</label>
                            <input id="endDate" name="endDate" type="text" class="form-control" data-toggle="daterangepicker" data-daterangepicker-drops="up" data-daterangepicker-single-date-picker="true">
                        </div>
                    </div> -->
                    <div class="col">
                        <div class="form-group">
                            <label class="text-label" for="endDate">Fecha Finalización</label>
                            <input id="endDate" name="endDate" type="date" class="form-control">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label class="text-label" for="endTime">Hora Finalización</label>
                            <input id="endTime" name="endTime" type="time" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="routeComments">Observaciones*</label>
                            <textarea id="routeComments" type="text" class="form-control" name="routeComments" placeholder="Comentarios..."></textarea>
                            <span class="invalid-feedback" id="routeComments-error">Debes ingresar observaciones/comentarios.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-right">
        <button type="button" class="btn btn-danger ml-3" data-dismiss="modal">Cancelar</button>
        <button id="registerRouteButton" type="submit" class="btn btn-success ml-3">Registrar Ruta</button>
    </div>
</form>
@endsection
@section('modifyRouteModal')
<form id="modifyRouteForm" method="POST" action="{{route('routes.updateRoute', ['id'])}}">
    @csrf
    @method('PUT') <!-- Método PUT para actualizar el usuario -->
    <div class="card card-form">
        <div class="row no-gutters">
            <div class="col-lg-3 card-body">
                <p><strong class="headings-color">Datos de la ruta</strong></p>
                <p class="text-muted">Ingresa los datos de la ruta.</p>
            </div>
            <div class="col-lg-9 card-form__body card-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <input id="idCustomer" name="idCustomer" type="hidden" value="">
                            <input id="idRoute" name="idRoute" type="hidden" value="">
                            <label for="createCustomerFullName">Nombre/Razón Social*</label>
                            <input id="createCustomerFullName" type="text" class="form-control" name="createCustomerFullName" placeholder="Nombre Completo" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="createCustomerContact">Contacto*</label>
                            <input id="createCustomerContact" type="text" class="form-control" name="createCustomerContact" placeholder="Contacto" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="routeStatus">Estado*</label><br>
                            <select id="routeStatus" name="routeStatus" class="custom-select">
                                <option value="Pendiente">Pendiente</option>
                                <option value="En Proceso">En Proceso</option>
                                <option value="Finalizado">Finalizado</option>
                                <option value="Cancelado">Cancelado</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="modifyProvince">Provincia*</label>
                            <select id="modifyProvince" name="modifyProvince" class="custom-select">
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="modifyCanton">Cantón*</label><br>
                            <select id="modifyCanton" name="modifyCanton" class="custom-select">
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="modifyDistric">Distrito</label><br>
                            <select id="modifyDistric" name="modifyDistric" class="custom-select">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="modifyRouteAddress"> Direccion</label>
                            <textarea id="modifyRouteAddress" type="text" class="form-control" name="modifyRouteAddress" placeholder="Dirección Completa.."></textarea>
                            <span class="invalid-feedback" id="modifyRouteAddress-error">Ingresa una dirección.</span>
                        </div>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="createCustomerEmail1">Correo Electrónico 1*</label>
                            <input id="createCustomerEmail1" type="email" class="form-control" name="createCustomerEmail1" placeholder="nombre@correo.com">
                            <span class="invalid-feedback" id="createCustomerEmail1-error">Ingresa un correo electrónico válido.</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="createCustomerEmail2">Correo Electrónico 2</label>
                            <input id="createCustomerEmail2" type="email" class="form-control" name="createCustomerEmail2" placeholder="nombre@correo.com">
                            <span class="invalid-feedback" id="createCustomerEmail2-error">Ingresa un correo electrónico válido.</span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="createCustomerPhone1">Telefono 1*</label>
                            <input id="createCustomerPhone1" type="text" class="form-control" name="createCustomerPhone1" placeholder="0000-0000">
                            <span class="invalid-feedback" id="createCustomerPhone1-error">Ingresa un teléfono en formato válido (e.g., 8888-8888).</span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="createCustomerPhone2">Telefono 2</label>
                            <input id="createCustomerPhone2" type="text" class="form-control" name="createCustomerPhone2" placeholder="0000-0000">
                            <span class="invalid-feedback" id="createCustomerPhone2-error">Ingresa un teléfono en formato válido (e.g., 8888-8888).</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                       <div class="form-group">
                            <label for="createCustomerAddress1"> Direccion 1*</label>
                            <textarea id="createCustomerAddress1" type="text" class="form-control" name="createCustomerAddress1" placeholder="Dirección Completa"></textarea>
                            <span class="invalid-feedback" id="createCustomerAddress1-error">Ingresa una dirección.</span>
                        </div>
                    </div>
                </div> -->
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="routeType">Tipo de Visita*</label>
                            <select id="routeType" name="routeType" class="custom-select">
                                <option value="Soporte Técnico">Soporte Técnico</option>
                                <option value="Instalación">Instalación</option>
                                <option value="Capacitación">Capacitación</option>
                                <option value="Demostración">Demostración</option>
                                <option value="Gira">Gira</option>
                                <option value="Reunión">Reunión</option>
                                <option value="Mensajería">Mensajería</option>
                                <option value="Visita Venta">Visita Venta</option>
                                <option value="Visita Gobierno">Visita Gobierno</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="routePriority">Prioridad*</label><br>
                            <select id="routePriority" name="routePriority" class="custom-select">
                                <option value="Baja">Baja</option>
                                <option value="Media">Media</option>
                                <option value="Alta">Alta</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="routeTechnicianAssigned">Técnico Asignado*</label><br>
                            <select id="routeTechnicianAssigned" name="routeTechnicianAssigned" class="custom-select">
                                @foreach ($technicians as $technician)
                                    <option value="{{$technician -> userName . ' ' . $technician -> userLastName1}}">{{$technician -> userName . ' ' . $technician -> userLastName1}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- <div class="col">
                        <div class="form-group">
                            <label class="text-label" for="startDate">Fecha Inicio</label>
                            <input id="startDate" name="startDate" type="text" class="form-control" data-toggle="daterangepicker" 
                            data-daterangepicker-drops="up" data-daterangepicker-single-date-picker="true">
                        </div>
                    </div> -->
                    <div class="col">
                        <div class="form-group">
                            <label class="text-label" for="startDate">Fecha Inicio</label>
                            <input id="startDate" name="startDate" type="date" class="form-control" >
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label class="text-label" for="startTime">Hora Inicio</label>
                            <input id="startTime" name="startTime" type="time" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- <div class="col">
                        <div class="form-group">
                            <label class="text-label" for="endDate">Fecha Finalización</label>
                            <input id="endDate" name="endDate" type="text" class="form-control" data-toggle="daterangepicker" data-daterangepicker-drops="up" data-daterangepicker-single-date-picker="true">
                        </div>
                    </div> -->
                    <div class="col">
                        <div class="form-group">
                            <label class="text-label" for="endDate">Fecha Finalización</label>
                            <input id="endDate" name="endDate" type="date" class="form-control">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label class="text-label" for="endTime">Hora Finalización</label>
                            <input id="endTime" name="endTime" type="time" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="modifyRouteComments">Observaciones*</label>
                            <textarea id="modifyRouteComments" type="text" class="form-control" name="modifyRouteComments" placeholder="Comentarios..."></textarea>
                            <span class="invalid-feedback" id="modifyRouteComments-error">Debe ingresar observaciones/comentarios.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-right">
        <button type="button" class="btn btn-danger ml-3" data-dismiss="modal">Cancelar</button>
        <button id="modifyRouteButton" type="submit" class="btn btn-success ml-3">Modificar Ruta</button>
    </div>
</form>
@endsection
<!-- Mensajes al usuario -->
@if (session('createError'))
    <script>
        $(document).ready(function() {
            toastr.warning("{{session('createError')}}", "Error al registrar la ruta");
        });
    </script>
@endif
@if (session('validationError'))
    <script>
        $(document).ready(function() {
            toastr.warning("{{session('validationError')}}", "Error de validación");
        });
    </script>
@endif
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
<!-- Mensajes al usuario -->
@if (session('updateError'))
<script>
$(document).ready(function() {
    toastr.warning("{{ session('updateError') }}", "Error de Actualización");
});
</script>
@endif
<script src="{{asset('HTML/dist/assets/js/calendar.js')}}"></script>
@endsection