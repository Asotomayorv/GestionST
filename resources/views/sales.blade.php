@extends('dashboard.navbar')
@section('sales')
<div class="container page__heading-container">
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item">Facturación</li>
                    <!-- <li class="breadcrumb-item active" aria-current="page">Companies</li> -->
                </ol>
            </nav>
            <h1 class="m-0">Ventas y Cotizaciones</h1>
        </div>
        <!-- <a href="" class="btn btn-success ml-3">Create <i class="material-icons">add</i></a> -->
    </div>
</div>
<div class="container page__container">
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
                        <label for="filter_name">Filtrar por No.Boleta</label>
                        <input id="filter_name" type="text" class="form-control" placeholder="No.Boleta">
                    </div>
                </div>
               <!-- <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="filter_stock">Has Sales</label>
                        <div class="custom-control custom-checkbox mt-sm-2">
                            <input type="checkbox" class="custom-control-input" id="filter_stock" checked="">
                            <label class="custom-control-label" for="filter_stock">Yes</label>
                        </div>
                    </div>
                </div> -->
                <div class="col-sm-auto">
                    <div class="form-group" style="width: 200px;">
                        <label for="filter_date">Filtrar por Fecha</label>
                        <input id="filter_date" type="text" class="form-control" placeholder="Select date ..." value="20/08/2023 to 27/08/2023" data-toggle="flatpickr" data-flatpickr-mode="range" data-flatpickr-alt-format="d/m/Y" data-flatpickr-date-format="d/m/Y">
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <a href="" class="btn btn-success" style="margin-top: 25px;">Nueva Boleta<i class="material-icons">add</i></a>
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
                        <th style="width: 30px;" >No.Boleta</th>
                        <th style="width: 30px;" >Cliente</th>
                        <th style="width: 30px;" >Producto</th>
                        <th style="width: 30px;" >Vendedor</th>
                        <th style="width: 30px;" >Fecha</th>
                        <th style="width: 30px;" >Total</th>
                        <th style="width: 30px;">Acciones</th>
                            <!--<div class="dropdown pull-right">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle">Acciones</a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="material-icons  mr-1">work</i> Update Status</a>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="material-icons  mr-1">pin_drop</i> Add Location</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="material-icons  mr-1">archive</i> Archive</a>
                                </div> 
                            </div> -->
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
                                    <!-- <i class="material-icons icon-16pt mr-1 text-primary">business</i> -->
                                    <a href="#">Perfiles Nacionales</a>
                                </div>
                                <!-- <div class="badge badge-warning ml-2">PRO</div> -->
                            </div>
                            <!-- <div class="d-flex align-items-center">
                                <small class="text-muted"><i class="material-icons icon-16pt mr-1">pin_drop</i> Miami, Florida, USA</small>
                            </div> -->
                        </td>
                        <td class="text-center">Reloj Marcador</td>
                        <td class="text-center">Carlos Martinez</td>
                        <td style="width: 50px;">05/05/2019</td>
                        <td>&#8353;12,402</td>
                        <!-- <td style="width:80px" class="text-center">
                            <i class="material-icons icon-16pt text-muted mr-1">account_circle</i> <a href="#">1</a>
                        </td> -->
                        <div class="dropdown ml-auto">
                            <td>
                                <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <!-- <div class="dropdown-item-text dropdown-item-text--lh">
                                            <div><strong>Adrian Demian</strong></div>
                                            <div>@adriandemian</div>
                                        </div>
                                        <div class="dropdown-divider"></div> -->
                                        <a class="dropdown-item" href="index.html">Ver Boleta</a>
                                        <a class="dropdown-item" href="profile.html">Editar Boleta</a>
                                        <a class="dropdown-item" href="edit-account.html">Eliminar Boleta</a>
                                        <!-- <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="login.html">Logout</a> -->
                                    </div>
                            </td>
                        </div>
                        <!-- <td class="text-right"><strong>$32,124</strong></td> -->
                        <!-- <td><a href="#" class="btn btn-sm btn-link"><i class="material-icons icon-16pt">more_vert</i></a> </td>-->
                        <!-- <td class="ml-auto" style="display: flex; align-items: center;">
                            <a href="#" class="text-muted"><i class="material-icons">visibility</i></a>
                            <a href="#" class="text-muted"><i class="material-icons">edit</i></a>
                            <a href="#" class="text-muted"><i class="material-icons">delete</i></a>
                        </td> -->
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
                                    <!-- <i class="material-icons icon-16pt mr-1 text-primary">business</i> -->
                                    <a href="#">Todo en Frenos y Cluch 2001 S.A.</a>
                                </div>
                                <!-- <div class="badge badge-warning ml-2">PRO</div> -->
                            </div>
                            <!-- <div class="d-flex align-items-center">
                                <small class="text-muted"><i class="material-icons icon-16pt mr-1">pin_drop</i> Miami, Florida, USA</small>
                            </div> -->
                        </td>
                        <td class="text-center">Reloj TS200</td>
                        <td class="text-center">Javier Villaseñor</td>
                        <td style="width: 50px;">05/05/2019</td>
                        <td>&#8353;55,000</td>
                        <!-- <td style="width:80px" class="text-center">
                            <i class="material-icons icon-16pt text-muted mr-1">account_circle</i> <a href="#">1</a>
                        </td> -->
                        <div class="dropdown ml-auto">
                            <td>
                                <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <!-- <div class="dropdown-item-text dropdown-item-text--lh">
                                            <div><strong>Adrian Demian</strong></div>
                                            <div>@adriandemian</div>
                                        </div>
                                        <div class="dropdown-divider"></div> -->
                                        <a class="dropdown-item" href="index.html">Ver Boleta</a>
                                        <a class="dropdown-item" href="profile.html">Editar Boleta</a>
                                        <a class="dropdown-item" href="edit-account.html">Eliminar Boleta</a>
                                        <!-- <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="login.html">Logout</a> -->
                                    </div>
                            </td>
                        </div>
                        <!-- <td class="text-right"><strong>$32,124</strong></td> -->
                        <!-- <td><a href="#" class="btn btn-sm btn-link"><i class="material-icons icon-16pt">more_vert</i></a> </td>-->
                        <!-- <td class="ml-auto" style="display: flex; align-items: center;">
                            <a href="#" class="text-muted"><i class="material-icons">visibility</i></a>
                            <a href="#" class="text-muted"><i class="material-icons">edit</i></a>
                            <a href="#" class="text-muted"><i class="material-icons">delete</i></a>
                        </td> -->
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
                                    <!-- <i class="material-icons icon-16pt mr-1 text-primary">business</i> -->
                                    <a href="#">Muebles EGM</a>
                                </div>
                                <!-- <div class="badge badge-warning ml-2">PRO</div> -->
                            </div>
                            <!-- <div class="d-flex align-items-center">
                                <small class="text-muted"><i class="material-icons icon-16pt mr-1">pin_drop</i> Miami, Florida, USA</small>
                            </div> -->
                        </td>
                        <td class="text-center">Reloj FP70CA</td>
                        <td class="text-center">Johan Morales</td>
                        <td style="width: 50px;">05/05/2019</td>
                        <td>&#8353;250,560</td>
                        <!-- <td style="width:80px" class="text-center">
                            <i class="material-icons icon-16pt text-muted mr-1">account_circle</i> <a href="#">1</a>
                        </td> -->
                        <div class="dropdown ml-auto">
                            <td>
                                <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <!-- <div class="dropdown-item-text dropdown-item-text--lh">
                                            <div><strong>Adrian Demian</strong></div>
                                            <div>@adriandemian</div>
                                        </div>
                                        <div class="dropdown-divider"></div> -->
                                        <a class="dropdown-item" href="index.html">Ver Boleta</a>
                                        <a class="dropdown-item" href="profile.html">Editar Boleta</a>
                                        <a class="dropdown-item" href="edit-account.html">Eliminar Boleta</a>
                                        <!-- <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="login.html">Logout</a> -->
                                    </div>
                            </td>
                        </div>
                        <!-- <td class="text-right"><strong>$32,124</strong></td> -->
                        <!-- <td><a href="#" class="btn btn-sm btn-link"><i class="material-icons icon-16pt">more_vert</i></a> </td>-->
                        <!-- <td class="ml-auto" style="display: flex; align-items: center;">
                            <a href="#" class="text-muted"><i class="material-icons">visibility</i></a>
                            <a href="#" class="text-muted"><i class="material-icons">edit</i></a>
                            <a href="#" class="text-muted"><i class="material-icons">delete</i></a>
                        </td> -->
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
                                    <!-- <i class="material-icons icon-16pt mr-1 text-primary">business</i> -->
                                    <a href="#">Hotel Barceló Occidental Tamarindo</a>
                                </div>
                                <!-- <div class="badge badge-warning ml-2">PRO</div> -->
                            </div>
                            <!-- <div class="d-flex align-items-center">
                                <small class="text-muted"><i class="material-icons icon-16pt mr-1">pin_drop</i> Miami, Florida, USA</small>
                            </div> -->
                        </td>
                        <td class="text-center">Reloj FP80</td>
                        <td class="text-center">Carlos Martinez</td>
                        <td style="width: 50px;">05/05/2019</td>
                        <td>&#8353;100,230</td>
                        <!-- <td style="width:80px" class="text-center">
                            <i class="material-icons icon-16pt text-muted mr-1">account_circle</i> <a href="#">1</a>
                        </td> -->
                        <div class="dropdown ml-auto">
                            <td>
                                <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <!-- <div class="dropdown-item-text dropdown-item-text--lh">
                                            <div><strong>Adrian Demian</strong></div>
                                            <div>@adriandemian</div>
                                        </div>
                                        <div class="dropdown-divider"></div> -->
                                        <a class="dropdown-item" href="index.html">Ver Boleta</a>
                                        <a class="dropdown-item" href="profile.html">Editar Boleta</a>
                                        <a class="dropdown-item" href="edit-account.html">Eliminar Boleta</a>
                                        <!-- <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="login.html">Logout</a> -->
                                    </div>
                            </td>
                        </div>
                        <!-- <td class="text-right"><strong>$32,124</strong></td> -->
                        <!-- <td><a href="#" class="btn btn-sm btn-link"><i class="material-icons icon-16pt">more_vert</i></a> </td>-->
                        <!-- <td class="ml-auto" style="display: flex; align-items: center;">
                            <a href="#" class="text-muted"><i class="material-icons">visibility</i></a>
                            <a href="#" class="text-muted"><i class="material-icons">edit</i></a>
                            <a href="#" class="text-muted"><i class="material-icons">delete</i></a>
                        </td> -->
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
                                    <!-- <i class="material-icons icon-16pt mr-1 text-primary">business</i> -->
                                    <a href="#">Libreria el Shaddai</a>
                                </div>
                                <!-- <div class="badge badge-warning ml-2">PRO</div> -->
                            </div>
                            <!-- <div class="d-flex align-items-center">
                                <small class="text-muted"><i class="material-icons icon-16pt mr-1">pin_drop</i> Miami, Florida, USA</small>
                            </div> -->
                        </td>
                        <td class="text-center">Reloj FA305</td>
                        <td class="text-center">Javier Villaseñor</td>
                        <td style="width: 50px;">05/05/2019</td>
                        <td>&#8353;85,710</td>
                        <!-- <td style="width:80px" class="text-center">
                            <i class="material-icons icon-16pt text-muted mr-1">account_circle</i> <a href="#">1</a>
                        </td> -->
                        <div class="dropdown ml-auto">
                            <td>
                                <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <!-- <div class="dropdown-item-text dropdown-item-text--lh">
                                            <div><strong>Adrian Demian</strong></div>
                                            <div>@adriandemian</div>
                                        </div>
                                        <div class="dropdown-divider"></div> -->
                                        <a class="dropdown-item" href="index.html">Ver Boleta</a>
                                        <a class="dropdown-item" href="profile.html">Editar Boleta</a>
                                        <a class="dropdown-item" href="edit-account.html">Eliminar Boleta</a>
                                        <!-- <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="login.html">Logout</a> -->
                                    </div>
                            </td>
                        </div>
                        <!-- <td class="text-right"><strong>$32,124</strong></td> -->
                        <!-- <td><a href="#" class="btn btn-sm btn-link"><i class="material-icons icon-16pt">more_vert</i></a> </td>-->
                        <!-- <td class="ml-auto" style="display: flex; align-items: center;">
                            <a href="#" class="text-muted"><i class="material-icons">visibility</i></a>
                            <a href="#" class="text-muted"><i class="material-icons">edit</i></a>
                            <a href="#" class="text-muted"><i class="material-icons">delete</i></a>
                        </td> -->
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
                                    <!-- <i class="material-icons icon-16pt mr-1 text-primary">business</i> -->
                                    <a href="#">CCSS Hospital Ciudad Neily</a>
                                </div>
                                <!-- <div class="badge badge-warning ml-2">PRO</div> -->
                            </div>
                            <!-- <div class="d-flex align-items-center">
                                <small class="text-muted"><i class="material-icons icon-16pt mr-1">pin_drop</i> Miami, Florida, USA</small>
                            </div> -->
                        </td>
                        <td class="text-center">20 cintas TS200</td>
                        <td class="text-center">Johan Morales</td>
                        <td style="width: 50px;">05/05/2019</td>
                        <td>&#8353;20,565</td>
                        <!-- <td style="width:80px" class="text-center">
                            <i class="material-icons icon-16pt text-muted mr-1">account_circle</i> <a href="#">1</a>
                        </td> -->
                        <div class="dropdown ml-auto">
                            <td>
                                <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <!-- <div class="dropdown-item-text dropdown-item-text--lh">
                                            <div><strong>Adrian Demian</strong></div>
                                            <div>@adriandemian</div>
                                        </div>
                                        <div class="dropdown-divider"></div> -->
                                        <a class="dropdown-item" href="index.html">Ver Boleta</a>
                                        <a class="dropdown-item" href="profile.html">Editar Boleta</a>
                                        <a class="dropdown-item" href="edit-account.html">Eliminar Boleta</a>
                                        <!-- <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="login.html">Logout</a> -->
                                    </div>
                            </td>
                        </div>
                        <!-- <td class="text-right"><strong>$32,124</strong></td> -->
                        <!-- <td><a href="#" class="btn btn-sm btn-link"><i class="material-icons icon-16pt">more_vert</i></a> </td>-->
                        <!-- <td class="ml-auto" style="display: flex; align-items: center;">
                            <a href="#" class="text-muted"><i class="material-icons">visibility</i></a>
                            <a href="#" class="text-muted"><i class="material-icons">edit</i></a>
                            <a href="#" class="text-muted"><i class="material-icons">delete</i></a>
                        </td> -->
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