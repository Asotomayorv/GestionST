@extends('layout.fluidNavbar')
@section('callEdit')
<div class="mdk-header-layout__content page">   
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Gestión de Llamadas</li>
            </ol>
        </nav>
        <h1 class="m-0">Modificar Llamada</h1>
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
                <input id="idCustomer" type="hidden" name="idCustomer" value="{{$call -> customers -> idCustomer}}">
                <input id="customerTaxes" type="hidden" name="customerTaxes" value="{{$call -> customers -> customerTaxes}}">
                <input id="customerAddress2" type="hidden" name="customerAddress2" value="{{$call -> customers -> customerAddress2}}">
                <div class="col">
                    <div class="form-group">
                        <label for="customertypeID">Tipo de Cedula*</label>
                        <select id="customertypeID" name="customertypeID" class="custom-select" disabled>
                            <option value="1" @if($call -> customers -> customertypeID == 1) selected @endif>Jurídica</option>
                            <option value="2" @if($call -> customers -> customertypeID == 2) selected @endif>Física</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="customerID">Cédula*</label>
                        <input id="customerID" type="text" class="form-control" name="customerID" placeholder="0-000-000000" value="{{$call -> customers -> customerID}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="customerFullName">Nombre/Razón Social*</label>
                        <input id="customerFullName" type="text" class="form-control" name="customerFullName" placeholder="Nombre Completo" value="{{$call -> customers -> customerFullName}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="customerContact">Contacto*</label>
                        <input id="customerContact" type="text" class="form-control" name="customerContact" placeholder="Contacto" value="{{$call -> customers -> customerContact}}"readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="customerEmail1">Correo Electrónico 1*</label>
                        <input id="customerEmail1" type="email" class="form-control" name="customerEmail1" placeholder="nombre@correo.com" value="{{$call -> customers -> customerEmail1}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="customerEmail2">Correo Electrónico 2</label>
                        <input id="customerEmail2" type="email" class="form-control" name="customerEmail2" placeholder="nombre@correo.com" value="{{$call -> customers -> customerEmail2}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="customerPhone1">Telefono 1*</label>
                        <input id="customerPhone1" type="text" class="form-control" name="customerPhone1" placeholder="0000-0000" value="{{$call -> customers -> customerPhone1}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="customerPhone2">Telefono 2</label>
                        <input id="customerPhone2" type="text" class="form-control" name="customerPhone2" placeholder="0000-0000" value="{{$call -> customers -> customerPhone2}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="customerAddress1"> Direccion 1*</label>
                        <textarea id="customerAddress1" type="text" class="form-control" name="customerAddress1" placeholder="Dirección Completa" readonly>{{$call -> customers -> customerAddress1}}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="text-right">
                        <button class="btn btn-primary ml-3" id="modifyClientButton1" data-toggle="modal" data-target="#modifyClientModal">
                            Actualizar Datos</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<form method="POST" id="callForm" action="{{route('calls.updateCall', ['id' => $call -> idCall])}}">
    @csrf
    @method('PUT') <!-- Método PUT para actualizar el usuario -->
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
                            <input type="hidden" id="idCustomer" name="idCustomer" value="{{$call -> customers -> idCustomer}}">
                            <label for="callSubject">Asunto*</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="callSubject" id="callSubject" value="Asistencia al Cliente" {{ $call->callSubject == 'Asistencia al Cliente' ? 'checked' : '' }}>
                                <label class="form-check-label" for="callSubject">Asistencia al Cliente</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="callSubject" id="callSubject" value="Servicio Técnico" {{ $call->callSubject == 'Servicio Técnico' ? 'checked' : '' }}>
                                <label class="form-check-label" for="callSubject">Servicio Técnico</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="callSubject" id="callSubject" value="Suministros" {{ $call->callSubject == 'Suministros' ? 'checked' : '' }}>
                                <label class="form-check-label" for="callSubject">Suministros</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="callSubject" id="callSubject" value="Ventas" {{ $call->callSubject == 'Ventas' ? 'checked' : '' }}>
                                <label class="form-check-label" for="callSubject">Ventas</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="callSubject" id="callSubject" value="Ofiequipos" {{ $call->callSubject == 'Ofiequipos' ? 'checked' : '' }}>
                                <label class="form-check-label" for="callSubject">Ofiequipos</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="callSubject" id="callSubject" value="Bit-Office" {{ $call->callSubject == 'Bit-Office' ? 'checked' : '' }}>
                                <label class="form-check-label" for="callSubject">Bit-Office</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="callSubject" id="callSubject" value="Otros" {{ $call->callSubject == 'Otros' ? 'checked' : '' }}>
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
                                <option value="Pendiente" {{ $call->callStatus == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                                <option value="En Proceso" {{ $call->callStatus == 'En Proceso' ? 'selected' : '' }}>En Proceso</option>
                                <option value="Solucionado" {{ $call->callStatus == 'Solucionado' ? 'selected' : '' }}>Solucionado</option>
                                <option value="Cotizar" {{ $call->callStatus == 'Cotizar' ? 'selected' : '' }}>Cotizar</option>
                                <option value="Devolver Llamada" {{ $call->callStatus == 'Devolver Llamada' ? 'selected' : '' }}>Devolver Llamada</option>
                                <option value="Esperar Llamada" {{ $call->callStatus == 'Esperar Llamada' ? 'selected' : '' }}>Esperar Llamada</option>
                                <option value="Asignado a Ruta Visita Técnica" {{ $call->callStatus == 'Asignado a Ruta Visita Técnica' ? 'selected' : '' }}>Asignado a Ruta Visita Técnica</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="callMarketing">¿Cómo supo de Nosotros?*</label><br>
                            <select id="callMarketing" name="callMarketing" class="custom-select">
                                <option value="No indicó" {{ $call->callMarketing == 'No indicó' ? 'selected' : '' }}>No indicó</option>
                                <option value="Página Web" {{ $call->callMarketing == 'Página Web' ? 'selected' : '' }}>Página Web</option>
                                <option value="Redes Sociales" {{ $call->callMarketing == 'Redes Sociales' ? 'selected' : '' }}>Redes Sociales</option>
                                <option value="Referencia de otro cliente" {{ $call->callMarketing == 'Referencia de otro cliente' ? 'selected' : '' }}>Referencia de otro cliente</option>
                                <option value="Referencia de empleado" {{ $call->callMarketing == 'Referencia de empleado' ? 'selected' : '' }}>Referencia de empleado</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="callComments">Consulta Realizada</label>
                            <textarea id="callComments" type="text" class="form-control" name="callComments" placeholder="Comentarios de la llamada...">{{$call -> callComments}}</textarea>
                            <span class="invalid-feedback" id="callComments-error">Debes ingresar una observación o comentario.</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <div class="text-right">
                                <a href="{{route('calls.callsList')}}" class="btn btn-danger ml-3">Cancelar</a>
                                <button type"submit" class="btn btn-success ml-3">Actualizar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-large bg-white d-flex align-items-center">
                <h4 class="card-header__title flex m-0">Comentarios de Llamada</h4>
                <button id="createCommentButton" class="btn btn-success"><i class="material-icons">comment_add</i></button>
            </div>
            <table class="table table-striped border-bottom mb-0">
                <thead>
                    <tr>
                        <th class="text-center">
                            <i class="material-icons icon-16pt mr-1">today</i><span>Fecha</span>
                        </th>
                        <th class="text-center">
                            <i class="material-icons icon-16pt text-muted mr-1">account_circle</i><span>Usuario<span>
                        </th>
                        <th  class="text-left">
                            <i class="material-icons icon-16pt text-muted mr-1">comment</i><span>Comentario<span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($commentsCall as $comments)
                <tr>
                    <td class="text-left" style="width: 108px;">{{$comments -> dateCreation ->format('d-m-Y')}}</td>
                    <td class="text-center" style="width: 108px;"><strong>{{$comments -> userNameLastEdit}}</strong></td>
                    <td class="text-left">{{$comments -> commentCall}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
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
                            <input id="modifyCustomerID" type="text" class="form-control" name="modifyCustomerID" placeholder="0-000-000000">
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
@section('createCommentModal')
<form id="addCommentForm" method="POST" data-url="{{route('calls.newCommentCall')}}">
    @csrf
    <div class="card card-form">
        <div class="row no-gutters">
            <div class="col-lg-12 card-form__body card-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <input type="hidden" id="idCall" name="idCall" value="{{$call -> idCall}}">
                            <label for="commentCall">Nuevo Comentario</label>
                            <textarea id="commentCall" type="text" class="form-control" name="commentCall" placeholder="Nuevo Comentario de Llamada..."></textarea>
                            <span class="invalid-feedback" id="commentCall-error">Debes ingresar una observación.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
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
<script src="{{asset('HTML/dist/assets/js/callFormValidation.js')}}"></script>
@endsection