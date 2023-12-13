@extends('layout.fluidNavbar')
@section('guarantees')
<div class="mdk-header-layout__content page">   
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Facturación</li>
            </ol>
        </nav>
        <h1 class="m-0">Garantías</h1>
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
                    <label for="filter_name">Filtrar por #Revisión</label>
                    <input id="filter_name" type="text" class="form-control" placeholder="#Revisión">
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
                    <a href="" class="btn btn-success" style="margin-top: 25px;">Nueva Revisión<i class="material-icons">add</i></a>
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
                    <th >#Revisión</th>
                    <th class="text-center">
                        <i class="material-icons icon-16pt mr-1">business</i><span>Cliente</span>
                    </th>
                    <th >
                        <i class="material-icons icon-16pt mr-1">today</i><span>Fecha</span>
                    </th>
                    <th class="text-center">
                        <i class="material-icons icon-16pt text-muted mr-1">work</i> <span>Equipo<span>
                    </th>
                    <th class="text-center">Serie</th>
                    <th class="text-center">Plazo Garantía</th>
                    <th >#Factura</th>
                    <th >Estado</th>
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
                        <div class="badge badge-light">#29177</div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center">
                                <a href="#">Perfiles Nacionales</a>
                            </div>
                        </div>
                    </td>
                    <td >05/05/2019</td>
                    <td class="text-center">Lector de Rondas</td>
                    <td class="text-center">466</td>
                    <td class="text-center"><strong>12 meses</strong></td>
                    <td>
                        <div class="badge badge-light">#29177</div>
                    </td>
                    <td>
                        <div class="badge badge-danger">PENDIENTE</div>
                    </td>
                    <div class="dropdown ml-auto">
                        <td>
                            <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="index.html">Ver Detalle Revisión</a>
                                    <a class="dropdown-item" href="profile.html">Editar Revisión</a>
                                    <a class="dropdown-item" href="edit-account.html">Cancelar Revisión</a>
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
                        <div class="badge badge-light">#29178</div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center">
                                <a href="#">CCSS Hospital Ciudad Neily </a>
                            </div>
                        </div>
                    </td>
                    <td >05/05/2019</td>
                    <td class="text-center">Detector de Metal</td>
                    <td class="text-center">DM0114</td>
                    <td class="text-center"><strong>12 meses</strong></td>
                    <td>
                        <div class="badge badge-light">#29178</div>
                    </td>
                    <td>
                        <div class="badge badge-danger">PENDIENTE</div>
                    </td>
                    <div class="dropdown ml-auto">
                        <td>
                            <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="index.html">Ver Detalle Revisión</a>
                                    <a class="dropdown-item" href="profile.html">Editar Revisión</a>
                                    <a class="dropdown-item" href="edit-account.html">Cancelar Revisión</a>
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
                        <div class="badge badge-light">#29179</div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center">
                                <a href="#">Libreria el Shaddai</a>
                            </div>
                        </div>
                    </td>
                    <td >05/05/2019</td>
                    <td class="text-center">Reloj Biométrico</td>
                    <td class="text-center">ZXLK02317810</td>
                    <td class="text-center"><strong>12 meses</strong></td>
                    <td>
                        <div class="badge badge-light">#29179</div>
                    </td>
                    <td>
                        <div class="badge badge-success">FINALIZADO</div>
                    </td>
                    <div class="dropdown ml-auto">
                        <td>
                            <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="index.html">Ver Detalle Revisión</a>
                                    <a class="dropdown-item" href="profile.html">Editar Revisión</a>
                                    <a class="dropdown-item" href="edit-account.html">Cancelar Revisión</a>
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
                        <div class="badge badge-light">#29180</div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center">
                                <a href="#">Hotel Barceló Occidental Tamarindo</a>
                            </div>
                        </div>
                    </td>
                    <td >05/05/2019</td>
                    <td class="text-center">Reloj Facial</td>
                    <td class="text-center">3929203760382</td>
                    <td class="text-center"><strong>12 meses</strong></td>
                    <td>
                        <div class="badge badge-light">#29180</div>
                    </td>
                    <td>
                        <div class="badge badge-danger">FINALIZADO</div>
                    </td>
                    <div class="dropdown ml-auto">
                        <td>
                            <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="index.html">Ver Detalle Revisión</a>
                                    <a class="dropdown-item" href="profile.html">Editar Revisión</a>
                                    <a class="dropdown-item" href="edit-account.html">Cancelar Revisión</a>
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
                        <div class="badge badge-light">#29181</div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center">
                                <a href="#">Muebles EGM</a>
                            </div>
                        </div>
                    </td>
                    <td >05/05/2019</td>
                    <td class="text-center">Reloj Marcador</td>
                    <td class="text-center">1922830 </td>
                    <td class="text-center"><strong>12 meses</strong></td>
                    <td>
                        <div class="badge badge-light">#29181</div>
                    </td>
                    <td>
                        <div class="badge badge-danger">PENDIENTE</div>
                    </td>
                    <div class="dropdown ml-auto">
                        <td>
                            <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="index.html">Ver Detalle Revisión</a>
                                    <a class="dropdown-item" href="profile.html">Editar Revisión</a>
                                    <a class="dropdown-item" href="edit-account.html">Cancelar Revisión</a>
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
                        <div class="badge badge-light">#291827</div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center">
                                <a href="#">Todo en Frenos y Cluch 2001 S. A.</a>
                            </div>
                        </div>
                    </td>
                    <td >05/05/2019</td>
                    <td class="text-center">Reloj de Huella Dactilar</td>
                    <td class="text-center">SP0000002968</td>
                    <td class="text-center"><strong>12 meses</strong></td>
                    <td>
                        <div class="badge badge-light">#291827</div>
                    </td>
                    <td>
                        <div class="badge badge-success">FINALIZADO</div>
                    </td>
                    <div class="dropdown ml-auto">
                        <td>
                            <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="index.html">Ver Detalle Revisión</a>
                                    <a class="dropdown-item" href="profile.html">Editar Revisión</a>
                                    <a class="dropdown-item" href="edit-account.html">Cancelar Revisión</a>
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