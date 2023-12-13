@extends('layout.fluidNavbar')
@section('viewTechnicalService')
<div class="mdk-header-layout__content page">   
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                <li class="breadcrumb-item" aria-current="page">Servicios Técnicos</li>
                <li class="breadcrumb-item active" aria-current="page">Servicios y Mantenimientos</li>
            </ol>
        </nav>
        <h1 class="m-0">Detalles de Servicio Técnico</h1>
    </div>
</div>
<div class="card card-group-row__card pricing__card">
    <div class="card-body d-flex flex-column">
        <div class="text-center">
            <div class="d-flex align-items-center justify-content-center border-bottom-2 flex pb-3">
                <span class="pricing__amount headings-color">{{$techservice -> routes -> customers -> customerFullName}}</span>
            </div>
        </div>
        <div class="col-lg-12 card-form__body card-body">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <input id="idCustomer" type="hidden" name="idCustomer" value="{{$techservice -> routes -> customers -> idCustomer}}">
                        <input id="customerAddress2" type="hidden" name="customerAddress2" value="{{$techservice -> routes -> customers -> customerAddress2}}">
                        <label for="customertypeID">Tipo de Cedula*</label>
                        <select id="customertypeID" name="customertypeID" class="custom-select" disabled>
                            <option value="1" @if($techservice -> routes -> customers -> customertypeID == 1) selected @endif>Jurídica</option>
                            <option value="2" @if($techservice -> routes -> customers -> customertypeID == 2) selected @endif>Física</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="customerID">Cédula</label>
                        <input id="customerID" type="text" class="form-control" name="customerID" value="{{$techservice -> routes -> customers -> customerID}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="customerContact">Contacto</label>
                        <input id="customerContact" type="text" class="form-control" name="customerContact" value="{{$techservice -> routes -> customers -> customerContact}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="customerTaxes">Paga Impuestos?</label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customerTaxes" name="customerTaxes" @if($techservice -> routes -> customers -> customerTaxes == 1) checked @endif disabled>
                            <label class="custom-control-label" for="customerTaxes">Sí</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="customerEmail1">Correo Electrónico 1</label>
                        <input id="customerEmail1" type="email" class="form-control" name="customerEmail1" value="{{$techservice -> routes -> customers -> customerEmail1}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="customerEmail2">Correo Electrónico 2</label>
                        <input id="customerEmail2" type="email" class="form-control" name="customerEmail2" value="{{$techservice -> routes -> customers -> customerEmail2}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="customerPhone1">Telefono 1</label>
                        <input id="customerPhone1" type="text" class="form-control" name="customerPhone1" value="{{$techservice -> routes -> customers -> customerPhone1}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="customerPhone2">Telefono 2</label>
                        <input id="customerPhone2" type="text" class="form-control" name="customerPhone2" value="{{$techservice -> routes -> customers -> customerPhone2}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="province">Provincia*</label>
                        <select id="province" name="province" class="custom-select" data-id="{{$techservice -> routes -> idProvince}}" disabled>
                        </select>
                        <!-- <input id="province" type="text" class="form-control" name="province" placeholder="Provincia" readonly> -->
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="canton">Cantón*</label>
                        <select id="canton" name="canton" class="custom-select" data-id="{{$techservice -> routes -> idCanton}}" disabled>
                        </select>
                        <!-- <input id="canton" type="text" class="form-control" name="canton" placeholder="Cantón" readonly> -->
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="district">Distrito*</label><br>
                        <select id="district" name="district" class="custom-select" data-id="{{$techservice -> routes -> idDistrict}}" disabled>
                        </select>
                        <!-- <input id="district" type="text" class="form-control" name="district" placeholder="Distrito" readonly> -->
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
                        <label for="idRoute">#Ruta*</label>
                        <input id="idRoute" type="text" class="form-control" name="idRoute" placeholder="No.Ruta" value="{{$techservice -> routes -> idroute}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label class="text-label" for="startDate">Fecha de Instalación</label>
                        <input id="startDate" name="startDate" type="date" class="form-control" value="{{$techservice -> routes -> startDate}}" readonly>
                    </div>
                </div>
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
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label class="text-label" for="startTime">Hora Inicio</label>
                        <input id="startTime" name="startTime" type="time" class="form-control" value="{{$techservice -> routes -> startTime}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label class="text-label" for="installationTravelHours">Horas de Traslado*</label>
                        <input id="installationTravelHours" name="installationTravelHours" type="time" class="form-control" value="{{$techservice -> technicalServiceTravelHours}}" readonly>
                        <span class="invalid-feedback" id="installationTravelHours-error">Ingresa un valor válido.</span>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label class="text-label" for="installationEstimateHours">Horas Estimadas de Trabajo*</label>
                        <input id="installationEstimateHours" name="installationEstimateHours" type="time" class="form-control" value="{{$techservice -> technicalServiceEstimateHours}}" readonly>
                        <span class="invalid-feedback" id="installationTravelHours-error">Ingresa un valor válido.</span>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label class="text-label" for="installationTotalHours">Total de Horas</label>
                        <input id="installationTotalHours" name="installationTotalHours" type="time" class="form-control" value="{{$techservice -> technicalServiceTotalHours}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="text-label" for="installationStatus">Estado de la Instalación</label>
                        <select id="installationStatus" name="installationStatus" class="custom-select" disabled>
                            <option value="0" @if($techservice -> technicalServiceStatus == 0) selected @endif>Pendiente</option>
                            <option value="1" @if($techservice -> technicalServiceStatus == 1) selected @endif>Finalizado</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <input type="hidden" id="idCustomer" name="idCustomer" value="{{$techservice -> routes -> customers -> idCustomer}}">
                        <input type="hidden" name="productData" id="productData">
                        <label for="installationComments">Observaciones de la Instalación*</label>
                        <textarea id="installationComments" type="text" class="form-control" name="installationComments" readonly placeholder="Comentarios de Instalación...">{{$techservice -> technicalServiceComments}}</textarea>
                        <span class="invalid-feedback" id="installationComments-error">Debes ingresar comentarios para la instalación.</span>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="dateLastEdit">Última Edición</label>
                        <input id="dateLastEdit" type="text" class="form-control" name="dateLastEdit" value="{{$techservice -> dateLastEdit}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="userLastEdit">Usuario</label>
                        <input id="userLastEdit" type="text" class="form-control" name="userLastEdit" value="{{$techservice -> userNameLastEdit}}" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="text-right mb-5">
    <a href="{{route('technicalservices.listTechnicalServices')}}" class="btn btn-primary ml-3">Regresar</a>
    <!-- <button class="btn btn-primary ml-3" onclick="printInvoice()">Vista Previa</button> -->
    <a href="{{route('technicalservices.editTechnicalService', ['id' => $techservice -> idtechnicalServiceOrder])}}" class="btn btn-success ml-3">
        <i class="material-icons">edit</i> Editar Boleta de Servicio Técnico</a>
</div>
<script src="{{asset('HTML/dist/assets/js/techServiceEditForm.js')}}"></script>
@endsection