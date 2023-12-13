@extends('layout.fluidNavbar')
@section('editInstallOrder')
<div class="mdk-header-layout__content page">   
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                <li class="breadcrumb-item" aria-current="page">Servicios Técnicos</li>
                <li class="breadcrumb-item active" aria-current="page">Gestión de Instalaciones</li>
            </ol>
        </nav>
        <h1 class="m-0">Modificar Instalación</h1>
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
                            <option value="1" @if($install -> routes -> customers -> customertypeID == 1) selected @endif>Jurídica</option>
                            <option value="2" @if($install -> routes -> customers -> customertypeID == 2) selected @endif>Física</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="customerID">Cédula*</label>
                        <input id="customerID" type="text" class="form-control" name="customerID" placeholder="0-000-000000" value="{{$install -> routes -> customers -> customerID}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="customerFullName">Nombre/Razón Social*</label>
                        <input id="customerFullName" type="text" class="form-control" name="customerFullName" placeholder="Nombre Completo" value="{{$install -> routes -> customers -> customerFullName}}" readonly>
                        <span class="invalid-feedback" id="customerFullName-error">Ingresa un nombre válido.</span>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="customerContact">Contacto*</label>
                        <input id="customerContact" type="text" class="form-control" name="customerContact" placeholder="Contacto" value="{{$install -> routes -> customers -> customerContact}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="customerEmail1">Correo Electrónico 1*</label>
                        <input id="customerEmail1" type="email" class="form-control" name="customerEmail1" placeholder="nombre@correo.com" value="{{$install -> routes -> customers -> customerEmail1}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="customerEmail2">Correo Electrónico 2</label>
                        <input id="customerEmail2" type="email" class="form-control" name="customerEmail2" placeholder="nombre@correo.com" value="{{$install -> routes -> customers -> customerEmail2}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="customerPhone1">Telefono 1*</label>
                        <input id="customerPhone1" type="text" class="form-control" name="customerPhone1" placeholder="0000-0000" value="{{$install -> routes -> customers -> customerPhone1}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="customerPhone2">Telefono 2</label>
                        <input id="customerPhone2" type="text" class="form-control" name="customerPhone2" placeholder="0000-0000" value="{{$install -> routes -> customers -> customerPhone2}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="province">Provincia*</label>
                        <select id="province" name="province" class="custom-select" data-id="{{$install -> routes -> idProvince}}" disabled>
                        </select>
                        <!-- <input id="province" type="text" class="form-control" name="province" placeholder="Provincia" readonly> -->
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="canton">Cantón*</label>
                        <select id="canton" name="canton" class="custom-select" data-id="{{$install -> routes -> idCanton}}" disabled>
                        </select>
                        <!-- <input id="canton" type="text" class="form-control" name="canton" placeholder="Cantón" readonly> -->
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="district">Distrito*</label><br>
                        <select id="district" name="district" class="custom-select" data-id="{{$install -> routes -> idDistrict}}" disabled>
                        </select>
                        <!-- <input id="district" type="text" class="form-control" name="district" placeholder="Distrito" readonly> -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="routeAddress">Dirección de la Instalación</label>
                        <textarea id="routeAddress" type="text" class="form-control" name="routeAddress" placeholder="Dirección Completa.." readonly>{{$install -> routes -> routeAddress}}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="routeType">Tipo de Visita*</label>
                        <input id="routeType" type="text" class="form-control" name="routeType" placeholder="Tipo de Visita" value="{{$install -> routes -> routeType}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="routePriority">Prioridad*</label><br>
                        <input id="routePriority" type="text" class="form-control" name="routePriority" placeholder="Prioridad" value="{{$install -> routes -> routePriority}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="routeTechnicianAssigned">Técnico Asignado*</label><br>
                        <input id="routeTechnicianAssigned" type="text" class="form-control" name="routeTechnicianAssigned" placeholder="Técnico" value="{{$install -> routes -> routeTechnicianAssigned}}" readonly>
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
<div class="card">
    <div class="table-responsive">
        <div class="card-header card-header-large bg-white d-flex align-items-center">
            <h4 class="card-header__title flex m-0">Equipos a Instalar</h4>
            <button id="searchProductButton" class="btn btn-success" data-url="{{route('installorders.getInstallProducts', ['id'])}}"
            data-id="{{$install -> routes -> customers -> idCustomer}}">
                <i class="material-icons">search</i> Buscar Equipos</button>
        </div>
        <table id="selectedProductTable" class="table mb-0 thead-border-top-0 table-striped">
            <thead>
                <tr>
                    <th class="text-center">#Código</th>
                    <th class="text-center">
                        <i class="material-icons icon-16pt text-muted mr-1">shop</i><span>Producto<span>
                    </th>
                    <th class="text-center">Marca</th>
                    <th class="text-center">Modelo</th>
                    <th class="text-center">Serie</th>
                    <th class="text-center">
                        <i class="material-icons icon-16pt text-muted mr-1">class</i><span>Categoría<span>
                    </th>
                    <th class="text-center">Cantidad</th>
                </tr>
            </thead>
            <tbody class="list">
            </tbody>
        </table>
    </div>
</div>
<form id="modifyInstallOrder" method="POST" action="{{route('installorders.updateInstallOrder', ['id' => $install -> idinstallation])}}">
    @csrf
    @method('PUT') <!-- Método PUT para actualizar el Cliente -->
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
                            <label for="idRoute">#Ruta*</label>
                            <input id="idRoute" type="text" class="form-control" name="idRoute" placeholder="No.Ruta" value="{{$install -> routes -> idroute}}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label class="text-label" for="startDate">Fecha de Instalación</label>
                            <input id="startDate" name="startDate" type="date" class="form-control" value="{{$install -> routes -> startDate}}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label class="text-label" for="startTime">Hora Inicio</label>
                            <input id="startTime" name="startTime" type="time" class="form-control" value="{{$install -> routes -> startTime}}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label class="text-label" for="installationStatus">Estado</label>
                            <select id="installationStatus" name="installationStatus" class="custom-select">
                                <option value="0" @if($install -> installationStatus == 0) selected @endif>Pendiente</option>
                                <option value="1" @if($install -> installationStatus == 1) selected @endif>Finalizado</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label class="text-label" for="installationTravelHours">Horas de Traslado*</label>
                            <input id="installationTravelHours" name="installationTravelHours" type="time" class="form-control" value="{{$install -> installationTravelHours}}">
                            <span class="invalid-feedback" id="installationTravelHours-error">Ingresa un valor válido.</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label class="text-label" for="installationEstimateHours">Horas Estimadas de Trabajo*</label>
                            <input id="installationEstimateHours" name="installationEstimateHours" type="time" class="form-control" value="{{$install -> installationEstimateHours}}">
                            <span class="invalid-feedback" id="installationTravelHours-error">Ingresa un valor válido.</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label class="text-label" for="installationTotalHours">Total de Horas</label>
                            <input id="installationTotalHours" name="installationTotalHours" type="time" class="form-control" value="{{$install -> installationTotalHours}}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="installationDetails">Detalles de Instalación*</label><br>
                            @php
                                $details = [
                                    'Instalación de Reloj Marcador',
                                    'Capacitación de uso del Reloj',
                                    'Instalación de Software',
                                    'Capacitación de Software',
                                    'Evacuación de Dudas',
                                ];
                                $selectedDetails = explode(', ', $install->installationDetails);
                            @endphp
                            @foreach ($details as $index => $detail)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="installationDetails[]" id="installDetail{{ $index + 1 }}" value="{{ $detail }}" {{ in_array($detail, $selectedDetails) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="installDetail{{ $index + 1 }}">{{ $detail }}</label>
                                </div>
                            @endforeach
                        </div>
                        <span class="invalid-feedback" id="installationDetails-error">Debes seleccionar al menos un detalle para la instalación.</span>
                    </div>
                </div>                               
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <input type="hidden" id="idCustomer" name="idCustomer" value="{{$install -> routes -> customers -> idCustomer}}">
                            <input type="hidden" name="productData" id="productData">
                            <label for="installationComments">Observaciones de la Instalación*</label>
                            <textarea id="installationComments" type="text" class="form-control" name="installationComments" placeholder="Comentarios de Instalación...">{{$install -> installationComments}}</textarea>
                            <span class="invalid-feedback" id="installationComments-error">Debes ingresar comentarios para la instalación.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-right mb-5">
        <a href="{{route('installorders.listInstallOrders')}}" class="btn btn-danger ml-3">Cancelar</a>
        <button type="submit" class="btn btn-success ml-3">Actualizar</a>
    </div>
</form>
@section('productModalContent')
<div class="table-responsive">
    <table id="productTable" class="table mb-0 thead-border-top-0 table-striped table-hover">
        <thead>
            <tr>
                <th class="text-center">#Boleta Facturación</th>
                <th class="text-center">#Código</th>
                <th class="text-center">
                    <i class="material-icons icon-16pt text-muted mr-1">shop</i><span>Producto<span>
                </th>
                <th class="text-center">Marca</th>
                <th class="text-center">Modelo</th>
                <th class="text-center">Serie</th>
                <th class="text-center">
                    <i class="material-icons icon-16pt text-muted mr-1">class</i><span>Categoría<span>
                </th> 
                <th class="text-center">Cantidad</th>
            </tr>
        </thead>
        <tbody class="list">
        </tbody>
    </table>
</div>
@endsection
<script>
    var selectedProducts = {!! json_encode($selectedProducts) !!};
 </script>
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
<script src="{{asset('HTML/dist/assets/js/installOrderEdit.js')}}"></script>
@endsection