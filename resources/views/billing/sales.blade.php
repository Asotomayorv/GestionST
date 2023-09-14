@extends('layout.fluidNavbar')
@section('sales')
<div class="mdk-header-layout__content page">   
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Facturación</li>
            </ol>
        </nav>
        <h1 class="m-0">Ventas y Cotizaciones</h1>
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
                    <label for="filter_name">Filtrar por #Boleta</label>
                    <input id="filter_name" type="text" class="form-control" placeholder="#Boleta">
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
                    <a href="" class="btn btn-success" style="margin-top: 25px;">Nueva Solicitud<i class="material-icons">add</i></a>
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
                    <th >#Boleta</th>
                    <th class="text-center">
                        <i class="material-icons icon-16pt mr-1">business</i><span>Cliente</span>
                    </th>
                    <th  class="text-center">
                        <i class="material-icons icon-16pt text-muted mr-1">shopping_cart</i><span>Equipo<span>
                    </th>
                    <th  class="text-center">
                        <i class="material-icons icon-16pt text-muted mr-1">account_circle</i><span>Vendedor<span>
                    </th>
                    <th class="text-center">
                        <i class="material-icons icon-16pt mr-1">today</i><span>Fecha</span>
                    </th>
                    <th class="text-center">
                        <i class="material-icons icon-16pt mr-1">attach_money</i><span>Total</span>
                    </th>
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
                    <td class="text-center">Reloj Marcador</td>
                    <td class="text-center">Carlos Martinez</td>
                    <td class="text-center">05/05/2019</td>
                    <td class="text-center">&#8353;12,402.00</td>
                    <div class="dropdown ml-auto">
                        <td>
                            <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="index.html">Ver Boleta</a>
                                    <a class="dropdown-item" href="profile.html">Editar Boleta</a>
                                    <a class="dropdown-item" href="edit-account.html">Eliminar Boleta</a>
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
                                <a href="#">Todo en Frenos y Cluch 2001 S.A.</a>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">Reloj TS200</td>
                    <td class="text-center">Javier Villaseñor</td>
                    <td class="text-center">05/05/2019</td>
                    <td class="text-center">&#8353;55,000.00</td>
                    <div class="dropdown ml-auto">
                        <td>
                            <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="index.html">Ver Boleta</a>
                                    <a class="dropdown-item" href="profile.html">Editar Boleta</a>
                                    <a class="dropdown-item" href="edit-account.html">Eliminar Boleta</a>
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
                                <a href="#">Muebles EGM</a>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">Reloj FP70CA</td>
                    <td class="text-center">Johan Morales</td>
                    <td class="text-center">05/05/2019</td>
                    <td class="text-center">&#8353;250,560.00</td>
                    <div class="dropdown ml-auto">
                        <td>
                            <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="index.html">Ver Boleta</a>
                                    <a class="dropdown-item" href="profile.html">Editar Boleta</a>
                                    <a class="dropdown-item" href="edit-account.html">Eliminar Boleta</a>
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
                    <td class="text-center">Reloj FP80</td>
                    <td class="text-center">Carlos Martinez</td>
                    <td class="text-center">05/05/2019</td>
                    <td class="text-center">&#8353;100,230.00</td>
                    <div class="dropdown ml-auto">
                        <td>
                            <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="index.html">Ver Boleta</a>
                                    <a class="dropdown-item" href="profile.html">Editar Boleta</a>
                                    <a class="dropdown-item" href="edit-account.html">Eliminar Boleta</a>
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
                                <a href="#">Libreria el Shaddai</a>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">Reloj FA305</td>
                    <td class="text-center">Javier Villaseñor</td>
                    <td class="text-center">05/05/2019</td>
                    <td class="text-center">&#8353;85,710.00</td>
                    <div class="dropdown ml-auto">
                        <td>
                            <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="index.html">Ver Boleta</a>
                                    <a class="dropdown-item" href="profile.html">Editar Boleta</a>
                                    <a class="dropdown-item" href="edit-account.html">Eliminar Boleta</a>
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
                        <div class="badge badge-light">#29182</div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center">
                                <a href="#">CCSS Hospital Ciudad Neily</a>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">20 cintas TS200</td>
                    <td class="text-center">Johan Morales</td>
                    <td class="text-center">05/05/2019</td>
                    <td class="text-center">&#8353;20,565.00</td>
                    <div class="dropdown ml-auto">
                        <td>
                            <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="index.html">Ver Boleta</a>
                                    <a class="dropdown-item" href="profile.html">Editar Boleta</a>
                                    <a class="dropdown-item" href="edit-account.html">Eliminar Boleta</a>
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
</div>
@endsection