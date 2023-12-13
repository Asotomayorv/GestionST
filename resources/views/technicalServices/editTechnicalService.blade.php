@extends('layout.fluidNavbar')
@section('editTechnicalService')
<div class="mdk-header-layout__content page">   
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                <li class="breadcrumb-item" aria-current="page">Servicios Técnicos</li>
                <li class="breadcrumb-item active" aria-current="page">Servicios y Mantenimientos</li>
            </ol>
        </nav>
        <h1 class="m-0">Modificar Boleta de Servicio Técnico</h1>
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
                        <label for="customertypeID">Tipo de Cedula*</label>
                        <select id="customertypeID" name="customertypeID" class="custom-select" disabled>
                            <option value="1" @if($techservice -> routes -> customers -> customertypeID == 1) selected @endif>Jurídica</option>
                            <option value="2" @if($techservice -> routes -> customers -> customertypeID == 2) selected @endif>Física</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="customerID">Cédula*</label>
                        <input id="customerID" type="text" class="form-control" name="customerID" placeholder="0-000-000000" value="{{$techservice -> routes -> customers -> customerID}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="customerFullName">Nombre/Razón Social*</label>
                        <input id="customerFullName" type="text" class="form-control" name="customerFullName" placeholder="Nombre Completo" value="{{$techservice -> routes -> customers -> customerFullName}}" readonly>
                        <span class="invalid-feedback" id="customerFullName-error">Ingresa un nombre válido.</span>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="customerContact">Contacto*</label>
                        <input id="customerContact" type="text" class="form-control" name="customerContact" placeholder="Contacto" value="{{$techservice -> routes -> customers -> customerContact}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="customerEmail1">Correo Electrónico 1*</label>
                        <input id="customerEmail1" type="email" class="form-control" name="customerEmail1" placeholder="nombre@correo.com" value="{{$techservice -> routes -> customers -> customerEmail1}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="customerEmail2">Correo Electrónico 2</label>
                        <input id="customerEmail2" type="email" class="form-control" name="customerEmail2" placeholder="nombre@correo.com" value="{{$techservice -> routes -> customers -> customerEmail2}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="customerPhone1">Telefono 1*</label>
                        <input id="customerPhone1" type="text" class="form-control" name="customerPhone1" placeholder="0000-0000" value="{{$techservice -> routes -> customers -> customerPhone1}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="customerPhone2">Telefono 2</label>
                        <input id="customerPhone2" type="text" class="form-control" name="customerPhone2" placeholder="0000-0000" value="{{$techservice -> routes -> customers -> customerPhone2}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="province">Provincia*</label>
                        <select id="province" name="province" class="custom-select" data-id="{{$techservice -> routes -> idProvince}}" disabled>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="canton">Cantón*</label>
                        <select id="canton" name="canton" class="custom-select" data-id="{{$techservice -> routes -> idCanton}}" disabled>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="district">Distrito*</label><br>
                        <select id="district" name="district" class="custom-select" data-id="{{$techservice -> routes -> idDistrict}}" disabled>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="routeAddress">Dirección de la Instalación</label>
                        <textarea id="routeAddress" type="text" class="form-control" name="routeAddress" placeholder="Dirección Completa.." readonly>{{$techservice -> routes -> routeAddress}}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="routeType">Tipo de Visita*</label>
                        <input id="routeType" type="text" class="form-control" name="routeType" placeholder="Tipo de Visita" value="{{$techservice -> routes -> routeType}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="routePriority">Prioridad*</label><br>
                        <input id="routePriority" type="text" class="form-control" name="routePriority" placeholder="Prioridad" value="{{$techservice -> routes -> routePriority}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="routeTechnicianAssigned">Técnico Asignado*</label><br>
                        <input id="routeTechnicianAssigned" type="text" class="form-control" name="routeTechnicianAssigned" placeholder="Técnico" value="{{$techservice -> routes -> routeTechnicianAssigned}}" readonly>
                    </div>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col">
                    <div class="text-right">
                        <button class="btn btn-primary ml-3" id="modifyClientButton" data-toggle="modal" data-target="#modifyClientModal">
                            Actualizar Datos</button>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>
<form id="modifyTechnicalService" method="POST" action="{{route('technicalservices.updateTechnicalService', ['id' => $techservice -> idtechnicalServiceOrder])}}">
    @csrf
    @method('PUT') <!-- Método PUT para actualizar el Cliente -->
    <div class="card card-form">
        <div class="row no-gutters">
            <div class="col-lg-3 card-body">
                <p><strong class="headings-color">Información del Servicio Técnico</strong></p>
                <p class="text-muted">Modifique los datos y luego haga click en "Actualizar".</p>
            </div>
            <div class="col-lg-9 card-form__body card-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="idRoute">#Ruta*</label>
                            <input id="idRoute" type="text" class="form-control" name="idRoute" placeholder="No.Ruta" value="{{$techservice -> routes -> idroute}}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label class="text-label" for="startDate">Fecha de Visita</label>
                            <input id="startDate" name="startDate" type="date" class="form-control" value="{{$techservice -> routes -> startDate}}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label class="text-label" for="startTime">Hora Inicio</label>
                            <input id="startTime" name="startTime" type="time" class="form-control" value="{{$techservice -> routes -> startTime}}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label class="text-label" for="technicalServiceStatus">Estado</label>
                            <select id="technicalServiceStatus" name="technicalServiceStatus" class="custom-select">
                                <option value="0" @if($techservice -> technicalServiceStatus == 0) selected @endif>Pendiente</option>
                                <option value="1" @if($techservice -> technicalServiceStatus == 1) selected @endif>Finalizado</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label class="text-label" for="technicalServiceTravelHours">Horas de Traslado*</label>
                            <input id="technicalServiceTravelHours" name="technicalServiceTravelHours" type="time" class="form-control" value="{{$techservice -> technicalServiceTravelHours}}">
                            <span class="invalid-feedback" id="technicalServiceTravelHours-error">Ingresa un valor válido.</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label class="text-label" for="technicalServiceEstimateHours">Horas Estimadas de Trabajo*</label>
                            <input id="technicalServiceEstimateHours" name="technicalServiceEstimateHours" type="time" class="form-control" value="{{$techservice -> technicalServiceEstimateHours}}">
                            <span class="invalid-feedback" id="technicalServiceEstimateHours-error">Ingresa un valor válido.</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label class="text-label" for="technicalServiceTotalHours">Total de Horas</label>
                            <input id="technicalServiceTotalHours" name="technicalServiceTotalHours" type="time" class="form-control" value="{{$techservice -> technicalServiceTotalHours}}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <input type="hidden" id="idCustomer" name="idCustomer" value="{{$techservice -> routes -> customers -> idCustomer}}">
                            <label for="technicalServiceComments">Observaciones de la Visita*</label>
                            <textarea id="technicalServiceComments" type="text" class="form-control" name="technicalServiceComments" placeholder="Comentarios de Instalación...">{{$techservice -> technicalServiceComments}}</textarea>
                            <span class="invalid-feedback" id="technicalServiceComments-error">Debes ingresar comentarios para la instalación.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-right mb-5">
        <a href="{{route('technicalservices.listTechnicalServices')}}" class="btn btn-danger ml-3">Cancelar</a>
        <button type="submit" class="btn btn-success ml-3">Actualizar</a>
    </div>
</form>
<!-- Mensajes al usuario -->
@if (session('updateError'))
<script>
    $(document).ready(function() {
        toastr.warning("{{ session('updateError') }}", "Error de Actualización");
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
<script src="{{asset('HTML/dist/assets/js/techServiceEditForm.js')}}"></script>
@endsection