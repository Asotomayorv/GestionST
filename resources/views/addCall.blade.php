@extends('dashboard.navbar')
@section('addCall')
    <div class="container  page__heading-container">
        <div class="page__heading">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Llamadas</li>
                </ol>
            </nav>
            <h1 class="m-0">Registrar Nueva Llamada</h1>
        </div>
    </div>
    <div class="container page__container">
        <div class="card card-form">
            <div class="row no-gutters">
                <div class="col-lg-4 card-body">
                    <p><strong class="headings-color">Información del Cliente</strong></p>
                    <p class="text-muted">Ingresa los datos del cliente.</p>
                </div>
                <div class="col-lg-8 card-form__body card-body">
                    <div class="row">
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
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="fname">Contacto</label>
                                <input id="fname" type="text" class="form-control" placeholder="Contacto">
                            </div>
                        </div>
                    </div>
                    <div class="row">
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
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="country">Estado</label><br>
                                <select id="country" class="custom-select" style="width: auto;">
                                    <option value="usa">Pendiente</option>
                                    <option value="usa">En Proceso</option>
                                    <option value="usa">Solucionado</option>
                                    <option value="usa">Cotizar</option>
                                    <option value="usa">Asignado a Ruta</option>
                                    <option value="usa">Devolver Llamada</option>
                                </select>
                                <!-- <small class="form-text text-muted">The country is not visible to other users.</small> -->
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="country">¿Cómo supo de Nosotros?</label><br>
                                <select id="country" class="custom-select" style="width: auto;">
                                    <option value="usa">No indicó</option>
                                    <option value="usa">Guía Telefónica</option>
                                    <option value="usa">Página Web</option>
                                    <option value="usa">Redes Sociales</option>
                                    <option value="usa">Referencia otro Cliente</option>
                                </select>
                                <!-- <small class="form-text text-muted">The country is not visible to other users.</small> -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="customCheck1">Asunto</label>
                                <div class="custom-control custom-checkbox" style="diplay: flex">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1" checked="">
                                    <label class="custom-control-label" for="customCheck1">Servicio Técnico</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="desc">Descripción de la LLamada</label>
                        <textarea id="desc" rows="4" class="form-control" placeholder="Dirección..."></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right mb-5">
            <a href="{{route('calls.list')}}" class="btn btn-success">Guardar</a>
        </div>
    </div>
@endsection