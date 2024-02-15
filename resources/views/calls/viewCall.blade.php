@extends('layout.fluidNavbar')
@section('viewCall')
<div class="mdk-header-layout__content page">   
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Gestión de Llamadas</li>
                </ol>
            </nav>
            <h1 class="m-0">Detalle de Llamada</h1>
        </div>
        <a href="{{route('calls.callsList')}}" class="btn btn-primary ml-6"><i class="material-icons">arrow_back</i> Regresar</a>
    </div>
</div>
<div class="card card-group-row__card pricing__card">
    <div class="card-body d-flex flex-column">
        <div class="text-center">
            <div class="d-flex align-items-center justify-content-center border-bottom-2 flex pb-3">
                <span class="pricing__amount headings-color">{{$call -> customers -> customerFullName}}</span>
            </div>
        </div>
        <div class="col-lg-12 card-form__body card-body">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <input id="idCustomer" type="hidden" name="idCustomer" value="{{$call -> customers -> idCustomer}}">
                        <input id="customerAddress2" type="hidden" name="customerAddress2" value="{{$call -> customers -> customerAddress2}}">
                        <label for="customertypeID">Tipo de Cedula*</label>
                        <select id="customertypeID" name="customertypeID" class="custom-select" disabled>
                            <option value="1" @if($call -> customers -> customertypeID == 1) selected @endif>Jurídica</option>
                            <option value="2" @if($call -> customers -> customertypeID == 1) selected @endif>Física</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="customerID">Cédula</label>
                        <input id="customerID" type="text" class="form-control" name="customerID" value="{{$call -> customers -> customerID}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="customerContact">Contacto</label>
                        <input id="customerContact" type="text" class="form-control" name="customerContact" value="{{$call -> customers -> customerContact}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="customerTaxes">Paga Impuestos?</label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customerTaxes" name="customerTaxes" @if($call -> customers -> customerTaxes == 1) checked @endif disabled>
                            <label class="custom-control-label" for="customerTaxes">Sí</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="customerEmail1">Correo Electrónico 1</label>
                        <input id="customerEmail1" type="email" class="form-control" name="customerEmail1" value="{{$call -> customers -> customerEmail1}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="customerEmail2">Correo Electrónico 2</label>
                        <input id="customerEmail2" type="email" class="form-control" name="customerEmail2" value="{{$call -> customers -> customerEmail2}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="customerPhone1">Telefono 1</label>
                        <input id="customerPhone1" type="text" class="form-control" name="customerPhone1" value="{{$call -> customers -> customerPhone1}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="customerPhone2">Telefono 2</label>
                        <input id="customerPhone2" type="text" class="form-control" name="customerPhone2" value="{{$call -> customers -> customerPhone2}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="customerAddress1"> Direccion 1*</label>
                        <textarea id="customerAddress1" type="text" class="form-control" name="customerAddress1" placeholder="Dirección Completa" readonly>{{$call -> customers -> customerAddress1}}</textarea>
                        <span class="invalid-feedback" id="customerAddress1-error">Ingresa una dirección.</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <input type="hidden" id="idCustomer" name="idCustomer" value="{{$call -> customers -> idCustomer}}">
                        <label for="callSubject">Asunto*</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="callSubject" id="callSubject" value="Asistencia al Cliente" {{ $call->callSubject == 'Asistencia al Cliente' ? 'checked' : '' }} disabled>
                            <label class="form-check-label" for="callSubject">Asistencia al Cliente</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="callSubject" id="callSubject" value="Servicio Técnico" {{ $call->callSubject == 'Servicio Técnico' ? 'checked' : '' }} disabled>
                            <label class="form-check-label" for="callSubject">Servicio Técnico</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="callSubject" id="callSubject" value="Suministros" {{ $call->callSubject == 'Suministros' ? 'checked' : '' }} disabled>
                            <label class="form-check-label" for="callSubject">Suministros</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="callSubject" id="callSubject" value="Ventas" {{ $call->callSubject == 'Ventas' ? 'checked' : '' }} disabled>
                            <label class="form-check-label" for="callSubject">Ventas</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="callSubject" id="callSubject" value="Ofiequipos" {{ $call->callSubject == 'Ofiequipos' ? 'checked' : '' }} disabled>
                            <label class="form-check-label" for="callSubject">Ofiequipos</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="callSubject" id="callSubject" value="Bit-Office" {{ $call->callSubject == 'Bit-Office' ? 'checked' : '' }} disabled>
                            <label class="form-check-label" for="callSubject">Bit-Office</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="callSubject" id="callSubject" value="Otros" {{ $call->callSubject == 'Otros' ? 'checked' : '' }} disabled>
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
                        <select id="callStatus" name="callStatus" class="custom-select" disabled>
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
                        <select id="callMarketing" name="callMarketing" class="custom-select" disabled>
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
                        <textarea id="callComments" type="text" class="form-control" name="callComments" placeholder="Comentarios de la llamada..." readonly>{{$call -> callComments}}</textarea>
                        <span class="invalid-feedback" id="callComments-error">Debes ingresar una observación o comentario.</span>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="dateLastEdit">Última Edición</label>
                        <input id="dateLastEdit" type="text" class="form-control" name="dateLastEdit" value="{{$call -> dateLastEdit->format('d-m-Y')}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="userLastEdit">Usuario</label>
                        <input id="userLastEdit" type="text" class="form-control" name="userLastEdit" value="{{$call -> userNameLastEdit}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="text-right">
                        <a href="{{route('calls.callsList')}}" class="btn btn-primary ml-3">Regresar</a>
                        <a href="{{route('calls.callEdit', ['id' => $call -> idCall])}}" class="btn btn-success ml-3">
                            <i class="material-icons">edit</i> Editar Llamada</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-large bg-white d-flex align-items-center">
                <h4 class="card-header__title flex m-0">Comentarios de Llamada</h4>
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
@endsection