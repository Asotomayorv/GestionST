@extends('layout.fluidNavbar')
@section('listRoutes')
<div class="mdk-header-layout__content page">   
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Agenda de Rutas</li>
            </ol>
        </nav>
        <h1 class="m-0">Calendario</h1>
    </div>
</div>
<div class="card card-form d-flex flex-column flex-sm-row">
    <div class="card-form__body card-body-form-group flex">
        <div class="row">
            <div class="col-sm-auto">
                <div class="form-group">
                    <label for="filter_name">Filtrar por Técnico</label>
                    <input id="filter_name" type="text" class="form-control" placeholder="Nombre del Técnico">
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
            <div class="col-sm-auto">
                <div class="form-group">
                    <a href="" class="btn btn-success" style="margin-top: 25px;">Nueva Ruta<i class="material-icons">add</i></a>
                </div>
            </div>
        </div>
    </div>
    <button class="btn bg-white border-left border-top border-top-sm-0 rounded-top-0 rounded-top-sm rounded-left-sm-0"><i class="material-icons text-primary icon-20pt">refresh</i></button>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-body">
            <div id="calendar" data-toggle="fullcalendar"></div>
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
<form id="createClientForm" method="POST" data-url="{{route('customers.registerModal')}}">
    @csrf
    <div class="card card-form">
        <div class="row no-gutters">
            <div class="col-lg-3 card-body">
                <p><strong class="headings-color">Datos del cliente</strong></p>
                <p class="text-muted">Ingresa los datos del cliente.</p>
            </div>
            <div class="col-lg-9 card-form__body card-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="createCustomertypeID">Tipo de Cedula*</label>
                            <select id="createCustomertypeID" name="createCustomertypeID" class="custom-select">
                                <option value="1">Jurídica</option>
                                <option value="2">Física</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="createCustomerID">Cédula*</label>
                            <input id="createCustomerID" type="text" class="form-control" name="createCustomerID" placeholder="0-000-000000">
                            <span class="invalid-feedback" id="createCustomerID-error">Ingresa la cédula en un formato válido (e.g., 1-2345-6789)</span>
                            <span class="invalid-feedback" id="createCustomerLegalID-error">Ingresa la cédula en un formato válido (e.g., 1-234-567890)</span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="createCustomerTaxes">Paga Impuestos?</label>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="createCustomerTaxes" name="createCustomerTaxes" value="1" checked="">
                                <label class="custom-control-label" for="createCustomerTaxes">Sí</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="createCustomerFullName">Nombre/Razón Social*</label>
                            <input id="createCustomerFullName" type="text" class="form-control" name="createCustomerFullName" placeholder="Nombre Completo">
                            <span class="invalid-feedback" id="createCustomerFullName-error">Ingresa un nombre válido.</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="createCustomerContact">Contacto*</label>
                            <input id="createCustomerContact" type="text" class="form-control" name="createCustomerContact" placeholder="Contacto">
                            <span class="invalid-feedback" id="createCustomerContact-error">Ingresa un contacto válido.</span>
                        </div>
                    </div>
                </div>
                <div class="row">
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
                </div>
                <div class="row">
                    <div class="col">
                       <div class="form-group">
                            <label for="createCustomerAddress2"> Direccion 2</label>
                            <textarea id="createCustomerAddress2" type="text" class="form-control" name="createCustomerAddress2" placeholder="Dirección Completa"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
<script src="{{asset('HTML/dist/assets/js/calendar.js')}}"></script>
@endsection