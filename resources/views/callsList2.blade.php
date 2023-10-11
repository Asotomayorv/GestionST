@extends('layout.fluidNavbar')
@section('callsList2')
<div class="mdk-header-layout__content page">   
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Gestión de Llamadas</li>
            </ol>
        </nav>
        <h1 class="m-0">Llamadas Registradas</h1>
    </div>
</div>
<div class="card card-form d-flex flex-column flex-sm-row">
    <div class="card-form__body card-body-form-group flex">
        <div class="row">
            <div class="col-sm-auto">
                <div class="form-group">
                    <label for="filter_name">Filtrar por Nombre</label>
                    <input id="filter_name" type="text" class="form-control" placeholder="Nombre del Cliente">
                </div>
            </div>
            <div class="col-sm-auto">
                <div class="form-group">
                    <label for="filter_category">Filtrar por Asunto</label><br>
                    <select id="filter_category" class="custom-select" style="width: 200px;">
                        <option value="all">Todos</option>
                        <option value="all">Servicio Técnico</option>
                        <option value="all">Suministros</option>
                        <option value="all">Ventas</option>
                        <option value="all">Ofiequipos</option>
                        <option value="all">Asistencia al cliente</option>
                        <option value="all">Otros</option>
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
                    <a href="{{route('calls.add')}}" class="btn btn-success" style="margin-top: 25px;">Nueva Llamada<i class="material-icons">add</i></a>
                </div>
            </div>
        </div>
    </div>
    <button class="btn bg-white border-left border-top border-top-sm-0 rounded-top-0 rounded-top-sm rounded-left-sm-0"><i class="material-icons text-primary icon-20pt">refresh</i></button>
</div>
<div class="card">
    <div class="table-responsive" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>
        <table class="table mb-0 thead-border-top-0 table-striped">
            <thead>
                <tr>
                    <th style="width: 5px;">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input js-toggle-check-all" data-target="#companies" id="customCheckAll">
                            <label class="custom-control-label" for="customCheckAll"><span class="text-hide">Toggle all</span></label>
                        </div>
                    </th>
                    <th class="text-center">
                        <i class="material-icons icon-16pt mr-1">business</i><span>Cliente</span>
                    </th>
                    <th class="text-center">
                        <i class="material-icons icon-16pt mr-1">today</i><span>Fecha</span>
                    </th>
                    <th  class="text-center">
                        <i class="material-icons icon-16pt text-muted mr-1">account_circle</i><span>Contacto<span>
                    </th>
                    <th  class="text-center">
                        <i class="material-icons icon-16pt text-muted mr-1">email</i><span>Correo<span>
                    </th>
                    <th class="text-center" style="width: 101px;">Teléfono</th>
                    <th  class="text-center">Asunto</th>
                    <th  class="text-center">Estado</th>
                </tr>
            </thead>
            <tbody class="list" id="companies">
                <tr>
                    <td class="text-center">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input js-check-selected-row" id="customCheck1_1">
                            <label class="custom-control-label" for="customCheck1_1"><span class="text-hide">Check</span></label>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center">
                                <a href="#">Perfiles Nacionales</a>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">05/05/2019</td>
                    <td class="text-center">Jorge Diaz</td>
                    <td class="text-center">finanzas@perfilesnacionales.com </td> 
                    <td class="text-center">7014-1284</td>
                    <td class="text-center"><strong>Servicio Técnico</strong></td>
                    <td>
                        <div class="badge badge-danger" style="margin-left: 25px;">PENDIENTE</div>
                    </td>
                    <div class="dropdown ml-auto">
                        <td>
                            <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="index.html">Ver detalle Llamada</a>
                                    <a class="dropdown-item" href="profile.html">Editar Llamada</a>
                                    <a class="dropdown-item" href="edit-account.html">Eliminar Llamada</a>
                                </div>
                        </td>
                    </div>
                </tr>
                <tr>
                    <td class="text-center">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input js-check-selected-row" id="customCheck1_1">
                            <label class="custom-control-label" for="customCheck1_1"><span class="text-hide">Check</span></label>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center">
                                <a href="#">Libreria el Shaddai</a>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">05/05/2019</td>
                    <td class="text-center">Noemy Gonzalez</td>
                    <td class="text-center">noemygz@hormail.com</td> 
                    <td class="text-center">8741-7177</td>
                    <td class="text-center"><strong>Suministros</strong></td>
                    <td>
                        <div class="badge badge-warning" style="margin-left: 25px;">EN PROCESO</div>
                    </td>
                    <div class="dropdown ml-auto">
                        <td>
                            <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="index.html">Ver detalle Llamada</a>
                                    <a class="dropdown-item" href="profile.html">Editar Llamada</a>
                                    <a class="dropdown-item" href="edit-account.html">Eliminar Llamada</a>
                                </div>
                        </td>
                    </div>
                </tr>
                <tr>
                    <td class="text-center">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input js-check-selected-row" id="customCheck1_1">
                            <label class="custom-control-label" for="customCheck1_1"><span class="text-hide">Check</span></label>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center">
                                <a href="#">Muebles EGM</a>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">05/05/2019</td>
                    <td class="text-center">Wagner Guerrero Marín</td>
                    <td class="text-center">mueblesegm@gmail.com </td> 
                    <td class="text-center">8768-7751</td>
                    <td class="text-center"><strong>Ventas</strong></td>
                    <td>
                        <div class="badge badge-secondary" style="margin-left: 25px;">COTIZAR</div>
                    </td>
                    <div class="dropdown ml-auto">
                        <td>
                            <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="index.html">Ver detalle Llamada</a>
                                    <a class="dropdown-item" href="profile.html">Editar Llamada</a>
                                    <a class="dropdown-item" href="edit-account.html">Eliminar Llamada</a>
                                </div>
                        </td>
                    </div>
                </tr>
                <tr>
                    <td class="text-center">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input js-check-selected-row" id="customCheck1_1">
                            <label class="custom-control-label" for="customCheck1_1"><span class="text-hide">Check</span></label>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center">
                                <a href="#">Todo en Frenos y Cluch 2001 S. A.</a>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">05/05/2019</td>
                    <td class="text-center">Martin Muñoz</td>
                    <td class="text-center">martincr2007@gmail.com </td> 
                    <td class="text-center">2285-7878</td>
                    <td class="text-center"><strong>Ofiequipos</strong></td>
                    <td>
                        <div class="badge badge-dark" style="margin-left: 25px;">LLAMAR</div>
                    </td>
                    <div class="dropdown ml-auto">
                        <td>
                            <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="index.html">Ver detalle Llamada</a>
                                    <a class="dropdown-item" href="profile.html">Editar Llamada</a>
                                    <a class="dropdown-item" href="edit-account.html">Eliminar Llamada</a>
                                </div>
                        </td>
                    </div>
                </tr>
                <tr>
                    <td class="text-center">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input js-check-selected-row" id="customCheck1_1">
                            <label class="custom-control-label" for="customCheck1_1"><span class="text-hide">Check</span></label>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center">
                                <a href="#">Enersys M.V.A. Costa Rica S. A.</a>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">05/05/2019</td>
                    <td class="text-center">Cindy Ocampo</td>
                    <td class="text-center">info@enersyscr.com </td> 
                    <td class="text-center">4111-0000</td>
                    <td class="text-center"><strong>Asistencia al Cliente</strong></td>
                    <td>
                        <div class="badge badge-success" style="margin-left: 25px;">SOLUCIONADO</div>
                    </td>
                    <div class="dropdown ml-auto">
                        <td>
                            <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="index.html">Ver detalle Llamada</a>
                                    <a class="dropdown-item" href="profile.html">Editar Llamada</a>
                                    <a class="dropdown-item" href="edit-account.html">Eliminar Llamada</a>
                                </div>
                        </td>
                    </div>
                </tr>
                <tr>
                    <td class="text-center">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input js-check-selected-row" id="customCheck1_1">
                            <label class="custom-control-label" for="customCheck1_1"><span class="text-hide">Check</span></label>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center">
                                <a href="#">Alimentos Exclusivos BKCR S.A</a>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">05/05/2019</td>
                    <td class="text-center">Ricardo Fuentes</td>
                    <td class="text-center">bkmetropoli@burgerkingcr.com </td> 
                    <td class="text-center">8961-9770</td>
                    <td class="text-center"><strong>Servicio Técnico</strong></td>
                    <td>
                        <div class="badge badge-danger" style="margin-left: 25px;">PENDIENTE</div>
                    </td>
                    <div class="dropdown ml-auto">
                        <td>
                            <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="index.html">Ver detalle Llamada</a>
                                    <a class="dropdown-item" href="profile.html">Editar Llamada</a>
                                    <a class="dropdown-item" href="edit-account.html">Eliminar Llamada</a>
                                </div>
                        </td>
                    </div>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="card-body text-right">
        15 <span class="text-muted">de 1,430</span> <a href="#" class="text-muted-light"><i class="material-icons ml-1">arrow_forward</i></a>
    </div>
</div>
@endsection