@extends('layout.fluidNavbar')
@section('createSupplier')
<div class="mdk-header-layout__content page">   
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item" aria-current="page">Bodega</li>
                    <li class="breadcrumb-item active">Gestión de Proveedores</li>
                </ol>
            </nav>
            <h1 class="m-0">Registrar Nuevo Proveedor</h1>
        </div>
        <a href="{{route('suppliers.listSuppliers')}}" class="btn btn-primary ml-6"><i class="material-icons">arrow_back</i> Regresar</a>
    </div>
</div>
<form id="registerSupplier" method="POST" action="{{route('suppliers.register')}}">
    @csrf
    <div class="card card-form">
        <div class="row no-gutters">
            <div class="col-lg-3 card-body">
                <p><strong class="headings-color">Información del proveedor</strong></p>
                <p class="text-muted">Ingresa los datos del nuevo proveedor.</p>
            </div>
            <div class="col-lg-9 card-form__body card-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="supplierID">Cédula Jurídica*</label>
                            <input id="supplierID" type="text" class="form-control" name="supplierID" placeholder="0-000-000000">
                            <span class="invalid-feedback" id="supplierID-error">Ingresa la cédula en un formato válido (e.g., 1-234-567890).</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="supplierPhone1">Telefono 1*</label>
                            <input id="supplierPhone1" type="text" class="form-control" name="supplierPhone1" placeholder="0000-0000">
                            <span class="invalid-feedback" id="supplierPhone1-error">Ingresa un teléfono en formato válido (e.g., 8888-8888).</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="supplierPhone2">Telefono 2</label>
                            <input id="supplierPhone2" type="text" class="form-control" name="supplierPhone2" placeholder="0000-0000">
                            <span class="invalid-feedback" id="supplierPhone2-error">Ingresa un teléfono en formato válido (e.g., 8888-8888).</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="supplierName">Nombre del proveedor*</label>
                            <input id="supplierName" type="text" class="form-control" name="supplierName" placeholder="Nombre del Proveedor">
                            <span class="invalid-feedback" id="supplierName-error">Ingresa un Nombre válido.</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="supplierContact">Contacto*</label>
                            <input id="supplierContact" type="text" class="form-control" name="supplierContact" placeholder="Contacto del Proveedor">
                            <span class="invalid-feedback" id="supplierContact-error">Ingresa un Contacto válido.</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="supplierEmail1">Correo Electrónico 1*</label>
                            <input id="supplierEmail1" type="email" class="form-control" name="supplierEmail1" placeholder="proveedor@correo.com">
                            <span class="invalid-feedback" id="supplierEmail1-error">Ingresa un correo electrónico válido.</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="supplierEmail2">Correo Electrónico 2</label>
                            <input id="supplierEmail2" type="email" class="form-control" name="supplierEmail2" placeholder="proveedor@correo.com">
                            <span class="invalid-feedback" id="supplierEmail2-error">Ingresa un correo electrónico válido.</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="supplierAddress">Dirección*</label>
                            <textarea id="supplierAddress" type="text" class="form-control" name="supplierAddress" placeholder="Direccion del proveedor.."></textarea>
                            <span class="invalid-feedback" id="supplierAddress-error">Ingresa una direccion válida.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-right mb-5">
        <a href="{{route('suppliers.listSuppliers')}}" class="btn btn-danger ml-3">Cancelar</a>
        <button type="submit" id="submitBtn" class="btn btn-success ml-3">Registrar</button>
    </div>
</form>
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
<script src="{{asset('HTML/dist/assets/js/supplierFormValidation.js')}}"></script> 
@endsection