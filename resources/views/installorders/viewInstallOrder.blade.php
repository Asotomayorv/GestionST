@extends('layout.fluidNavbar')
@section('viewInstallOrder')
<div class="mdk-header-layout__content page">   
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                <li class="breadcrumb-item" aria-current="page">Servicios Técnicos</li>
                <li class="breadcrumb-item active" aria-current="page">Gestión de Instalaciones</li>
            </ol>
        </nav>
        <h1 class="m-0">Detalles de Instalación</h1>
    </div>
</div>
<div class="card card-group-row__card pricing__card">
    <div class="card-body d-flex flex-column">
        <div class="text-center">
            <div class="d-flex align-items-center justify-content-center border-bottom-2 flex pb-3">
                <span class="pricing__amount headings-color">{{$install -> routes -> customers -> customerFullName}}</span>
            </div>
        </div>
        <div class="col-lg-12 card-form__body card-body">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <input id="idCustomer" type="hidden" name="idCustomer" value="{{$install -> routes -> customers -> idCustomer}}">
                        <input id="customerAddress2" type="hidden" name="customerAddress2" value="{{$install -> routes -> customers -> customerAddress2}}">
                        <label for="customertypeID">Tipo de Cedula*</label>
                        <select id="customertypeID" name="customertypeID" class="custom-select" disabled>
                            <option value="1" @if($install -> routes -> customers -> customertypeID == 1) selected @endif>Jurídica</option>
                            <option value="2" @if($install -> routes -> customers -> customertypeID == 2) selected @endif>Física</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="customerID">Cédula</label>
                        <input id="customerID" type="text" class="form-control" name="customerID" value="{{$install -> routes -> customers -> customerID}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="customerContact">Contacto</label>
                        <input id="customerContact" type="text" class="form-control" name="customerContact" value="{{$install -> routes -> customers -> customerContact}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="customerTaxes">Paga Impuestos?</label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customerTaxes" name="customerTaxes" @if($install -> routes -> customers -> customerTaxes == 1) checked @endif disabled>
                            <label class="custom-control-label" for="customerTaxes">Sí</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="customerEmail1">Correo Electrónico 1</label>
                        <input id="customerEmail1" type="email" class="form-control" name="customerEmail1" value="{{$install -> routes -> customers -> customerEmail1}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="customerEmail2">Correo Electrónico 2</label>
                        <input id="customerEmail2" type="email" class="form-control" name="customerEmail2" value="{{$install -> routes -> customers -> customerEmail2}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="customerPhone1">Telefono 1</label>
                        <input id="customerPhone1" type="text" class="form-control" name="customerPhone1" value="{{$install -> routes -> customers -> customerPhone1}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="customerPhone2">Telefono 2</label>
                        <input id="customerPhone2" type="text" class="form-control" name="customerPhone2" value="{{$install -> routes -> customers -> customerPhone2}}" readonly>
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
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label class="text-label" for="startTime">Hora Inicio</label>
                        <input id="startTime" name="startTime" type="time" class="form-control" value="{{$install -> routes -> startTime}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label class="text-label" for="installationTravelHours">Horas de Traslado*</label>
                        <input id="installationTravelHours" name="installationTravelHours" type="time" class="form-control" value="{{$install -> installationTravelHours}}" readonly>
                        <span class="invalid-feedback" id="installationTravelHours-error">Ingresa un valor válido.</span>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label class="text-label" for="installationEstimateHours">Horas Estimadas de Trabajo*</label>
                        <input id="installationEstimateHours" name="installationEstimateHours" type="time" class="form-control" value="{{$install -> installationEstimateHours}}" readonly>
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
                                <input class="form-check-input" type="checkbox" name="installationDetails[]" id="installDetail{{ $index + 1 }}" disabled value="{{ $detail }}" {{ in_array($detail, $selectedDetails) ? 'checked' : '' }}>
                                <label class="form-check-label" for="installDetail{{ $index + 1 }}">{{ $detail }}</label>
                            </div>
                        @endforeach
                    </div>
                    <span class="invalid-feedback" id="installationDetails-error">Debes seleccionar al menos un detalle para la instalación.</span>
                </div>
            </div> 
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="text-label" for="installationStatus">Estado de la Instalación</label>
                        <select id="installationStatus" name="installationStatus" class="custom-select" disabled>
                            <option value="0" @if($install -> installationStatus == 0) selected @endif>Pendiente</option>
                            <option value="1" @if($install -> installationStatus == 1) selected @endif>Finalizado</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <input type="hidden" id="idCustomer" name="idCustomer" value="{{$install -> routes -> customers -> idCustomer}}">
                        <input type="hidden" name="productData" id="productData">
                        <label for="installationComments">Observaciones de la Instalación*</label>
                        <textarea id="installationComments" type="text" class="form-control" name="installationComments" readonly placeholder="Comentarios de Instalación...">{{$install -> installationComments}}</textarea>
                        <span class="invalid-feedback" id="installationComments-error">Debes ingresar comentarios para la instalación.</span>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="dateLastEdit">Última Edición</label>
                        <input id="dateLastEdit" type="text" class="form-control" name="dateLastEdit" value="{{$install -> dateLastEdit}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="userLastEdit">Usuario</label>
                        <input id="userLastEdit" type="text" class="form-control" name="userLastEdit" value="{{$install -> userNameLastEdit}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="text-right">
                        <a href="{{route('installorders.listInstallOrders')}}" class="btn btn-primary ml-3">Regresar</a>
                         <!-- <button class="btn btn-primary ml-3" onclick="printInvoice()">Vista Previa</button> -->
                        <a href="{{route('installorders.editInstallOrder', ['id' => $install -> idinstallation])}}" class="btn btn-success ml-3">
                            <i class="material-icons">edit</i> Editar Boleta de Instalación</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="table-responsive">
        <div class="card-header card-header-large bg-white d-flex align-items-center">
            <h4 class="card-header__title flex m-0">Equipos a Instalar</h4>
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
<script>
    var selectedProducts = {!! json_encode($selectedProducts) !!};
 </script>
 <script src="{{asset('HTML/dist/assets/js/viewInstallOrder.js')}}"></script> 
@endsection