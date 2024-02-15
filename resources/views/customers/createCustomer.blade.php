@extends('layout.fluidNavbar')
@section('createCustomer')
<div class="mdk-header-layout__content page">   
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Gestión de Clientes</li>
                </ol>
            </nav>
            <h1 class="m-0">Registrar Nuevo Cliente</h1>
        </div>
        <a href="{{route('customers.listCustomers')}}" class="btn btn-primary ml-6"><i class="material-icons">arrow_back</i> Regresar</a>
    </div>
</div>
<form id="registerCustomer" method="POST" action="{{route('customers.register')}}">
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
                            <label for="customertypeID">Tipo de Cedula*</label>
                            <select id="customertypeID" name="customertypeID" class="custom-select" required>
                                <option value="1">Jurídica</option>
                                <option value="2">Física</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="customerID">Cédula*</label>
                            <input id="customerID" type="text" class="form-control" name="customerID" placeholder="0-000-000000">
                            <span class="invalid-feedback" id="customerID-error">Ingresa la cédula en un formato válido (e.g., 1-2345-6789)</span>
                            <span class="invalid-feedback" id="customerLegalID-error">Ingresa la cédula en un formato válido (e.g., 1-234-567890)</span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="customerTaxes">¿Paga Impuestos?</label>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customerTaxes" name="customerTaxes" value="1" checked="">
                                <label class="custom-control-label" for="customerTaxes">Sí</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="customerFullName">Nombre/Razón Social*</label>
                            <input id="customerFullName" type="text" class="form-control" name="customerFullName" placeholder="Nombre Completo">
                            <span class="invalid-feedback" id="customerFullName-error">Ingresa un nombre válido.</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="customerContact">Contacto*</label>
                            <input id="customerContact" type="text" class="form-control" name="customerContact" placeholder="Contacto">
                            <span class="invalid-feedback" id="customerLastName-error">Ingresa un contacto válido.</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="customerEmail1">Correo Electrónico 1*</label>
                            <input id="customerEmail1" type="email" class="form-control" name="customerEmail1" placeholder="nombre@correo.com">
                            <span class="invalid-feedback" id="customerEmail1-error">Ingresa un correo electrónico válido.</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="customerEmail2">Correo Electrónico 2</label>
                            <input id="customerEmail2" type="email" class="form-control" name="customerEmail2" placeholder="nombre@correo.com">
                            <span class="invalid-feedback" id="customerEmail2-error">Ingresa un correo electrónico válido.</span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="customerPhone1">Telefono 1*</label>
                            <input id="customerPhone1" type="text" class="form-control" name="customerPhone1" placeholder="0000-0000">
                            <span class="invalid-feedback" id="customerPhone1-error">Ingresa un teléfono en formato válido (e.g., 8888-8888).</span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="customerPhone2">Telefono 2</label>
                            <input id="customerPhone2" type="text" class="form-control" name="customerPhone2" placeholder="0000-0000">
                            <span class="invalid-feedback" id="customerPhone2-error">Ingresa un teléfono en formato válido (e.g., 8888-8888).</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                       <div class="form-group">
                            <label for="customerAddress1"> Direccion 1*</label>
                            <textarea id="customerAddress1" type="text" class="form-control" name="customerAddress1" placeholder="Dirección Completa"></textarea>
                            <span class="invalid-feedback" id="customerAddress1-error">Ingresa una dirección.</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                       <div class="form-group">
                            <label for="customerAddress2"> Direccion 2</label>
                            <textarea id="customerAddress2" type="text" class="form-control" name="customerAddress2" placeholder="Dirección Completa"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-right mb-5">
        <a href="{{route('customers.listCustomers')}}" class="btn btn-danger ml-3">Cancelar</a>
        <button type="submit" class="btn btn-success ml-3">Registrar</a>
    </div>
</form>
<!-- Mensajes al usuario -->
@if (session('createError'))
    <script>
        $(document).ready(function() {
            toastr.warning("{{session('createError')}}", "Error al registrar al cliente");
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
<script src="{{asset('HTML/dist/assets/js/customerFormValidation.js')}}"></script> 
@endsection