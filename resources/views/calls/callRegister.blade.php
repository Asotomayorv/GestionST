@extends('layout.fluidNavbar')
@section('callRegister')
<div class="mdk-header-layout__content page">   
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Gestión de LLamadas</li>
            </ol>
        </nav>
        <h1 class="m-0">Registrar Llamada Entrante</h1>
    </div>
</div>
<div class="card card-form">
    <div class="row no-gutters">
        <div class="col-lg-3 card-body">
            <p><strong class="headings-color">Datos del cliente</strong></p>
            <p class="text-muted">Ingresa los datos del cliente:</p>
        </div>
        <div class="col-lg-9 card-form__body card-body">
            <div class="row">
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
                <div class="col-md-1">
                    <div class="form-group">
                        <button type="button" class="btn btn-success" data-toggle="modal" id="createClientButton"
                        style="margin-top: 25px;" title="Registrar Nuevo Cliente"><i class="material-icons">person_add</i></button>
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
                        <label for="customerAddress1"> Direccion 1*</label>
                        <textarea id="customerAddress1" type="text" class="form-control" name="customerAddress1" placeholder="Dirección Completa" readonly></textarea>
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
<form method="POST" id="callForm" action="{{route('calls.register')}}">
    @csrf 
    <div class="card card-form">
        <div class="row no-gutters">
            <div class="col-lg-3 card-body">
                <p><strong class="headings-color">Detalles de la Llamada</strong></p>
                <p class="text-muted">Ingrese los datos de la llamada:</p>
            </div>
            <div class="col-lg-9 card-form__body card-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <input type="hidden" id="idCustomer" name="idCustomer" value="">
                            <label for="callSubject">Asunto*</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="callSubject" id="callSubject" value="Asistencia al Cliente">
                                <label class="form-check-label" for="callSubject">Asistencia al Cliente</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="callSubject" id="callSubject" value="Servicio Técnico">
                                <label class="form-check-label" for="callSubject">Servicio Técnico</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="callSubject" id="callSubject" value="Suministros">
                                <label class="form-check-label" for="callSubject">Suministros</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="callSubject" id="callSubject" value="Ventas">
                                <label class="form-check-label" for="callSubject">Ventas</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="callSubject" id="callSubject" value="Ofiequipos">
                                <label class="form-check-label" for="callSubject">Ofiequipos</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="callSubject" id="callSubject" value="Bit-Office">
                                <label class="form-check-label" for="callSubject">Bit-Office</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="callSubject" id="callSubject" value="Otros">
                                <label class="form-check-label" for="callSubject">Otros</label>
                            </div>
                        </div>
                        <span class="invalid-feedback" id="callSubject-error">Debes seleccionar al menos un asunto.</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="callStatus">Estado*</label>
                            <select id="callStatus" name="callStatus" class="custom-select">
                                <option value="Pendiente">Pendiente</option>
                                <option value="En Proceso">En Proceso</option>
                                <option value="Solucionado">Solucionado</option>
                                <option value="Cotizar">Cotizar</option>
                                <option value="Devolver Llamada">Devolver Llamada</option>
                                <option value="Esperar Llamada">Esperar Llamada</option>
                                <option value="Asignado a Ruta Visita Técnica">Asignado a Ruta Visita Técnica</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="callMarketing">¿Cómo supo de Nosotros?*</label><br>
                            <select id="callMarketing" name="callMarketing" class="custom-select">
                                <option value="No indicó">No indicó</option>
                                <option value="Página Web">Página Web</option>
                                <option value="Redes Sociales">Redes Sociales</option>
                                <option value="Referencia de otro cliente">Referencia de otros clientes</option>
                                <option value="Referencia de empleado">Referencia de empleado</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="callComments">Consulta Realizada</label>
                            <textarea id="callComments" type="text" class="form-control" name="callComments" placeholder="Comentarios de la llamada..."></textarea>
                            <span class="invalid-feedback" id="callComments-error">Debes ingresar una observación o comentario.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="text-right mb-5">
    <a href="{{route('calls.callsList')}}" class="btn btn-danger ml-3">Cancelar</a>
    <button type"submit" class="btn btn-success ml-3">Guardar</button>
</div>
</form>
<!-- Mensajes al usuario -->
@if (session('createError'))
    <script>
        $(document).ready(function() {
            toastr.warning("{{session('createError')}}", "Error al registrar la llamada");
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
            <tbody class="list" id="staff">
                @foreach($customers as $customer)
                <tr data-customer-email2="{{$customer -> customerEmail2}}" data-customer-phone2="{{$customer -> customerPhone2}}" 
                    data-customer-typeid="{{$customer -> customertypeID}}" data-customer-id="{{$customer -> idCustomer}}"
                    data-customer-taxes="{{$customer -> customerTaxes}}" data-customer-address2="{{$customer -> customerAddress2}}"
                    data-customer-address1="{{$customer -> customerAddress1}}">
                        <td class="text-center">{{$customer -> customerID}}</td>
                        <td class="text-center">{{$customer -> customerFullName}}</td>
                        <td class="text-center">{{$customer -> customerContact}}</td>
                        <td class="text-center" style="width: 14px;">{{$customer -> customerEmail1}}</td>
                        <td class="text-center">{{$customer -> customerPhone1}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
<!--  @section('customerModalContent')
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
            <tbody class="list" id="staff">
            </tbody>
        </table>
    </div>
</div>
@endsection -->
@section('createClientModal')
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
@section('modifyClientModal')
<form id="modifyClientForm" method="POST" data-url="{{route('customers.updateCustomerModal', ['id'])}}">
    @csrf
    @method('PUT') <!-- Método PUT para actualizar el Cliente -->
    <div class="card card-form">
        <div class="row no-gutters">
            <div class="col-lg-3 card-body">
                <p><strong class="headings-color">Información del cliente</strong></p>
                <p class="text-muted">Modifique los datos y luego haga click en "Actualizar".</p>
            </div>
            <div class="col-lg-9 card-form__body card-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="modifyCustomertypeID">Tipo de Cedula*</label>
                            <select id="modifyCustomertypeID" name="modifyCustomertypeID" class="custom-select" required>
                                <option value="1">Jurídica</option>
                                <option value="2">Física</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="modifyCustomerID">Cédula*</label>
                            <input id="modifyCustomerID" type="text" class="form-control" name="modifyCustomerID" placeholder="0-000-000000" required>
                            <span class="invalid-feedback" id="modifyCustomerID-error">Ingresa la cédula en un formato válido (e.g., 1-2345-6789)</span>
                            <span class="invalid-feedback" id="modifyCustomerLegalID-error">Ingresa la cédula en un formato válido (e.g., 1-234-567890)</span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="modifyCustomerTaxes">Paga Impuestos?</label>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="modifyCustomerTaxes" name="modifyCustomerTaxes" value="1">
                                <label class="custom-control-label" for="modifyCustomerTaxes">Sí</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="modifyCustomerFullName">Nombre/Razón Social*</label>
                            <input id="modifyCustomerFullName" type="text" class="form-control" name="modifyCustomerFullName" placeholder="Nombre Completo" required>
                            <span class="invalid-feedback" id="modifyCustomerFullName-error">Ingresa un nombre válido.</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="modifyCustomerContact">Contacto*</label>
                            <input id="modifyCustomerContact" type="text" class="form-control" name="modifyCustomerContact" placeholder="Contacto" required>
                            <span class="invalid-feedback" id="modifyCustomerContact-error">Ingresa un contacto válido.</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="modifyCustomerEmail1">Correo Electrónico 1*</label>
                            <input id="modifyCustomerEmail1" type="email" class="form-control" name="modifyCustomerEmail1" placeholder="nombre@correo.com" required>
                            <span class="invalid-feedback" id="modifyCustomerEmail1-error">Ingresa un correo electrónico válido.</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="modifyCustomerEmail2">Correo Electrónico 2</label>
                            <input id="modifyCustomerEmail2" type="email" class="form-control" name="modifyCustomerEmail2" placeholder="nombre@correo.com">
                            <span class="invalid-feedback" id="modifyCustomerEmail2-error">Ingresa un correo electrónico válido.</span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="modifyCustomerPhone1">Telefono 1*</label>
                            <input id="modifyCustomerPhone1" type="text" class="form-control" name="modifyCustomerPhone1" placeholder="0000-0000" required>
                            <span class="invalid-feedback" id="modifyCustomerPhone1-error">Ingresa un teléfono en formato válido (e.g., 8888-8888).</span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="modifyCustomerPhone2">Telefono 2</label>
                            <input id="modifyCustomerPhone2" type="text" class="form-control" name="modifyCustomerPhone2" placeholder="0000-0000" >
                            <span class="invalid-feedback" id="modifyCustomerPhone2-error">Ingresa un teléfono en formato válido (e.g., 8888-8888).</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="modifyCustomerAddress1"> Direccion 1*</label>
                            <textarea id="modifyCustomerAddress1" type="text" class="form-control" name="modifyCustomerAddress1" placeholder="Dirección Completa"></textarea>
                            <span class="invalid-feedback" id="modifyCustomerAddress1-error">Ingresa una dirección.</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="modifyCustomerAddress2"> Direccion 2</label>
                            <textarea id="modifyCustomerAddress2" type="text" class="form-control" name="modifyCustomerAddress2" placeholder="Dirección Completa"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
<script src="{{asset('HTML/dist/assets/js/callFormValidation.js')}}"></script>
@endsection