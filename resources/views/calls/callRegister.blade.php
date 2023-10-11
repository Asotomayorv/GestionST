@extends('layout.fluidNavbar')
@section('callRegister')
    <div class="mdk-header-layout__content page">   
        <div class="page__heading">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Llamadas</li>
                </ol>
            </nav>
            <h1 class="m-0">Registrar Nueva Llamada</h1>
        </div>
    </div>
    <form method="POST" action="{{route('calls.register')}}">
    @csrf
        <div class="card card-form">
            <div class="row no-gutters">
                <div class="col-lg-4 card-body">
                    <p><strong class="headings-color">Información del Cliente</strong></p>
                    <p class="text-muted">Ingresa los datos del cliente.</p>
                </div>
                <div class="col-lg-8 card-form__body card-body">
                    <!-- <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="fname">Nombre</label>
                                <input id="fname" type="text" class="form-control" placeholder="Nombre">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="lname">Apellidos</label>
                                <input id="lname" type="text" class="form-control" placeholder="Apellidos">
                            </div>
                        </div>
                    </div>-->
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="idCustomer">Identificación</label>
                                <input id="idCustomer" name="idCustomer" type="text" class="form-control" placeholder="ID">
                            </div>
                        </div>
                    </div>
                    <!--<div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="fname">Correo Electrónico</label>
                                <input id="fname" type="email" class="form-control" placeholder="cliente@email.com">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="fname">Teléfono 1</label>
                                <input id="fname" type="email" class="form-control" placeholder="8888-8888">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="fname">Teléfono 2</label>
                                <input id="fname" type="email" class="form-control" placeholder="8888-8888">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="desc">Dirección</label>
                        <textarea id="desc" rows="4" class="form-control" placeholder="Dirección..."></textarea>
                    </div>-->
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="callStatus">Estado</label><br>
                                <input id="callStatus"  name="callStatus" type="text" class="form-control" placeholder="Estado">
                                <!-- <select id="callStatus" class="custom-select" style="width: auto;">
                                    <option value="Pendiente">Pendiente</option>
                                    <option value="En Proceso">En Proceso</option>
                                    <option value="Solucionado">Solucionado</option>
                                    <option value="Cotizar">Cotizar</option>
                                    <option value="Asignado a Ruta">Asignado a Ruta</option>
                                    <option value="Devolver Llamada">Devolver Llamada</option>
                                </select> -->
                                <!-- <small class="form-text text-muted">The country is not visible to other users.</small> -->
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="callMarketing">¿Cómo supo de Nosotros?</label><br>
                                <input id="callMarketing"  name="callMarketing" type="text" class="form-control" placeholder="Marketing">
                                <!-- <select id="callMarketing" class="custom-select" style="width: auto;">
                                    <option value="No indicó">No indicó</option>
                                    <option value="Guía Telefónica">Guía Telefónica</option>
                                    <option value="Página Web">Página Web</option>
                                    <option value="Redes Sociales">Redes Sociales</option>
                                    <option value="Referencia otro Cliente">Referencia otro Cliente</option>
                                </select> -->
                                <!-- <small class="form-text text-muted">The country is not visible to other users.</small> -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <!--<label for="callSubject">Asunto</label>
                                <div class="custom-control custom-checkbox" style="display: flex">
                                    <input type="checkbox" class="custom-control-input" id="callSubject" checked="">
                                    <label class="custom-control-label" for="callSubject">Servicio Técnico</label>
                                </div>-->
                                <div class="form-group">
                                    <label for="callSubject">Asunto de la Llamada</label><br>
                                    <input id="callSubject" name="callSubject" class="form-control" placeholder="Asunto..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="callComments">Descripción de la LLamada</label>
                        <input id="callComments" name="callComments" rows="4" class="form-control" placeholder="Descripción..."></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right mb-5">
            <button type"submit" class="btn btn-success">Guardar</button>
        </div>
    </form>
@endsection